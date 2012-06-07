<?php
include_once 'Customer.php';
include_once 'Connection.php';
include_once 'TransaksiDetail.php';
class Transaksi {

    private $id;
    private $tanggal;
    private $customer;
    private $faktur;
    private $transaksiDetail = array();

    public function __construct() {
        
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setTanggal($tanggal) {
        $this->tanggal = $tanggal;
    }

    public function getTanggal() {
        return $this->tanggal;
    }

    public function setCustomer($customer) {
        if ($customer instanceof Customer) {
            $this->customer = $customer;
        }
    }

    public function getCustomer() {
        return $this->customer;
    }

    public function setFaktur($faktur) {
        $this->faktur = $faktur;
    }

    public function getFaktur() {
        return $this->faktur;
    }

    public function setTransaksiDetail($transaksi) {
        if (is_array($transaksi))
            $this->transaksiDetail = $transaksi;
    }

    public function getTransaksiDetail() {
        return $this->transaksiDetail;
    }
    
    public function addTransaksiDetail($transaksi){
        if($transaksi instanceof TransaksiDetail){
            array_push($this->transaksiDetail, $transaksi);
        }
    }
    
    public function save(){
        $conn = new Connection();
        $mysqli = $conn->getMysqli();   
        $stmt = $mysqli->prepare("INSERT INTO transaksi(id,tanggal,customer_id,no_faktur)
            VALUES(?,?,?)");
        $stmt->bind_param("isis",$this->id,$this->tanggal,$this->customer->getId(),
                $this->faktur);
        $stmt->execute();
        foreach ($this->transaksiDetail as $detail) {
            $stmt2 = $mysqli->prepare("INSERT INTO transaksi_detail(transaksi_id,
                product_id,qty,price) VALUES(?,?,?,?)");
            $stmt2->bind_param("iiid",$this->id,$detail->getProduct()->getId(),
                    $detail->getId(),$detail->getPrice());
            $stmt2->execute();
            $stmt2->close();
        }
        $stmt->close();
        $mysqli->close();        
    }
    
    public static function load($id){
        $conn = new Connection();
        $mysqli = $conn->getMysqli();  
        $stmt = $mysqli->prepare("SELECT id,tanggal,customer_id,no_faktur 
            FROM transaksi WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id,$tanggal,$customer_id,$no_faktur);
        $trans = null;
        if($r = $stmt->fetch()){
            $trans = new Transaksi();
            $trans->setId($id);
            $trans->setTanggal($tanggal);
            $trans->setCustomer(Customer::load($customer_id));
            $trans->setFaktur($no_faktur); 
            $trans->setTransaksiDetail(TransaksiDetail::loadByTransaksiId($id));
        }
        $stmt->close();
        $mysqli->close();
        return $trans;
    }

    public static function loads(){
        $conn = new Connection();
        $mysqli = $conn->getMysqli();  
        $stmt = $mysqli->prepare("SELECT id,tanggal,customer_id,no_faktur 
            FROM transaksi");       
        $stmt->execute();
        $stmt->bind_result($id,$tanggal,$customer_id,$no_faktur);
        $trans = array();
        while($r = $stmt->fetch()){
            $transaksi = new Transaksi();
            $transaksi->setId($id);
            $transaksi->setTanggal($tanggal);
            $transaksi->setCustomer(Customer::load($customer_id));
            $transaksi->setFaktur($no_faktur); 
            array_push($trans, $transaksi);
        }
        $stmt->close();
        $mysqli->close();
        return $trans;
    }
    
}

?>
