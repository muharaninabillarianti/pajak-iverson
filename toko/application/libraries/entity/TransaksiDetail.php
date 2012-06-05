<?php
include_once 'Product.php';

class TransaksiDetail {
    private $id;
    private $product;
    private $qty;
    private $price;
    
    public function __construct() {    
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
        return $this->getProduct();
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
    
}

?>
