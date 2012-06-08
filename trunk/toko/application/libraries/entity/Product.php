<?php

include_once 'Connection.php';

class Product {
    private $id;
    private $kode;
    private $nama;
    private $price;
    private $image;
    
    public function __construct($id,$kode,$nama,$price,$image) {
        $this->id = $id;
        $this->kode = $kode;
        $this->nama = $nama;
        $this->price = $price;
        $this->image = $image;
    }
    
    public function setImage($image){
        $this->image = $image;
    }
    public function getImage($image){
        return $this->image;
    }
    
    
    public function getId(){
        return $this->id;
    }
    
    public function setKode($kode){
        $this->kode = $kode;
    }
    
    public function getKode(){
        return $this->kode;
    }
    
    public function setNama($nama){
        $this->nama = $nama;
    }
    
    public function getNama(){
        return $this->nama;
    }
    
    public function setPrice($price){
        $this->price = $price;
    }
    
    public function getPrice(){
        return $this->price;
    }
    
    public function save(){
        $conn = new Connection();
        $mysqli = $conn->getMysqli();        
        $stmt = $mysqli->prepare("INSERT INTO product(kode,nama,price,image) VALUES(?,?,?,?)");
        $stmt->bind_param("ssds",$this->kode,$this->nama,$this->price,$this->image);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    }
    
    public function update(){
        $conn = new Connection();
        $mysqli = $conn->getMysqli();
        $stmt = $mysqli->prepare("UPDATE product SET kode=?,nama=?,price=? WHERE id=?");
        $stmt->bind_param("ssdi",$this->kode,$this->nama,$this->price,$this->id);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    }
    
    public static function delete($id){
        $conn = new Connection();
        $mysqli = $conn->getMysqli();
        $stmt = $mysqli->prepare("DELETE FROM product WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    }
    
    public static function load($id){
        $conn = new Connection();
        $mysqli = $conn->getMysqli();
        $stmt = $mysqli->prepare("SELECT id,kode,nama,price FROM product WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id,$kode,$nama,$price);
        $product = null;
        while($r = $stmt->fetch()){
            $product = new Product($id, $kode, $nama, $price);
        }
        $stmt->close();
        $mysqli->close();
        return $product;
    }
    
    public static function loads(){
        $conn = new Connection();
        $mysqli = $conn->getMysqli();
        $stmt = $mysqli->prepare("SELECT id,kode,nama,price FROM product");       
        $stmt->execute();
        $stmt->bind_result($id,$kode,$nama,$price);
        $products = array();
        while($r = $stmt->fetch()){
            $product = new Product($id, $kode, $nama, $price,"");
            array_push($products, $product);
        }
        $stmt->close();
        $mysqli->close();
        return $products;
    }
}

?>
