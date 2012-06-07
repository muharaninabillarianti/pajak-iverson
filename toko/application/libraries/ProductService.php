<?php


include_once 'entity/Product.php';

class ProductService {
    
    public function insertProduct($kode,$nama,$price){
        $product = new Product(null,$kode,$nama,$price);
        $product->save();        
    }
    
    public function updateProduct($id,$kode,$nama,$price){
        $product = Product::load($id);
        $product->setKode($kode);
        $product->setNama($nama);
        $product->setPrice($price);
        $product->update();
    }


    public function loadAllProduct(){
        return Product::loads();
    }
    
    public function loadById($id){
        return Product::load($id);
    }
    
    public function deleteById($id){
        Product::delete($id);
    }
}
 
?>
