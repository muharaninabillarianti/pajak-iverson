<?php

include_once 'Connection.php';

class Customer {

    private $id;
    private $nama;
    private $alamat;
    private $telp;
    private $email;

    public function __construct($id, $nama, $alamat, $telp, $email) {
        $this->id = $id;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->telp = $telp;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setAlamat($alamat) {
        $this->alamat = $alamat;
    }

    public function getAlamat() {
        return $this->alamat;
    }

    public function setTelp($telp) {
        $this->telp = $telp;
    }

    public function getTelp() {
        return $this->telp;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function save() {
        $conn = new Connection();
        $mysqli = $conn->getMysqli();
        $stmt = $mysqli->prepare("INSERT INTO customer(nama,alamat,telp,email) 
            VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $this->nama, $this->alamat, $this->telp, $this->email);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    }

    public function update() {
        $conn = new Connection();
        $mysqli = $conn->getMysqli();
        $stmt = $mysqli->prepare("UPDATE customer SET nama=?,alamat=?,telp=?,
            email=? WHERE
           id=?");
        $stmt->bind_param("ssssi", $this->nama, $this->alamat, $this->telp, 
                $this->email, $this->id);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    }

    public static function delete($id) {
        $conn = new Connection();
        $mysqli = $conn->getMysqli();
        $stmt = $mysqli->prepare("DELETE FROM customer WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    }

    public static function load($id) {
        $conn = new Connection();
        $mysqli = $conn->getMysqli();
        $stmt = $mysqli->prepare("SELECT id,nama,alamat,telp,email 
            FROM customer WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id,$nama,$alamat,$telp,$email);
        $customer = null;
        while($r = $stmt->fetch()){
            $customer = new Customer($id, $nama, $alamat, $telp, $email);
        }
        $stmt->close();
        $mysqli->close();
        return $customer;
    }
    
    public static function loads() {
        $conn = new Connection();
        $mysqli = $conn->getMysqli();
        $stmt = $mysqli->prepare("SELECT id,nama,alamat,telp,email FROM customer");               
        $stmt->execute();
        $stmt->bind_result($id,$nama,$alamat,$telp,$email);
        $customers = array();
        while($r = $stmt->fetch()){
            $customer = new Customer($id, $nama, $alamat, $telp, $email);
            array_push($customers, $customer);
        }
        $stmt->close();
        $mysqli->close();
        return $customers;
    }

}

?>
