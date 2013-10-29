<?php

include_once 'entity/Transaksi.php';
include_once 'entity/Customer.php';
include_once 'entity/TransaksiDetail.php';
include_once 'entity/Product.php';
class TransaksiService {
    public function loadAllTransaksi(){
        return Transaksi::loads();
    }
    public function loadById($id){
        return Transaksi::load($id);
    }
    
    public function insertTransaksi($transaksi){        
        $transaksi->save();
    }


    public function createTransaksi($tanggal,$faktur,$customer_id){
        $transaksi = new Transaksi();
        $transaksi->setTanggal($tanggal);
        $transaksi->setFaktur($faktur);
        $transaksi->setCustomer(Customer::load($customer_id));        
        return $transaksi;
    }
    
    public function createTransaksiDetail($qty,$product){
        $transDetail = new TransaksiDetail();
        $transDetail->setProduct($product);
        $transDetail->setPrice($product->getPrice());
        $transDetail->setQty($qty);
        return $transDetail;
    }
    
}

?>
