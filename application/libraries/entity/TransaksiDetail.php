<?php
include_once 'Product.php';
include_once 'Connection.php';

class TransaksiDetail {
    private $id;
    private $product;
    private $qty;
    private $price;
    
    public function __construct() {    
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setProduct($product){
        if($product instanceof Product){
            $this->product = $product;
        }
    }
    public function getProduct(){
        return $this->product;
    }
    
    public function setQty($qty){
        $this->qty = $qty;
    }
    public function getQty(){
        return $this->qty;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function getPrice(){
        return $this->price;
    }
    
    public static function loadByTransaksiId($id){
        $conn = new Connection();
        $mysqli = $conn->getMysqli(); 
        $stmt = $mysqli->prepare("SELECT id,product_id,qty,price FROM transaksi_detail 
            WHERE transaksi_id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id,$product_id,$qty,$price);
        $details = array();
        while($r = $stmt->fetch()){
            $detail = new TransaksiDetail();
            $detail->setId($id);
            $detail->setProduct(Product::load($product_id));            
            $detail->setQty($qty);
            $detail->setPrice($price);
            array_push($details, $detail);
        }
        $stmt->close();
        $mysqli->close();
        return $details;
    }
    
}

?>
