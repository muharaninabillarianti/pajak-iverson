<?php

include_once 'entity/Transaksi.php';
class TransaksiService {
    public function loadAllTransaksi(){
        return Transaksi::loads();
    }
    public function loadById($id){
        return Transaksi::load($id);
    }
}

?>
