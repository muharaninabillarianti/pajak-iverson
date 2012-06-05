<?php
include_once 'Customer.php';

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

}

?>
