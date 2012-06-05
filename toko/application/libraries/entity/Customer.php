<?php


class Customer {
   private $id;
   private $nama;
   private $alamat;
   private $telp;
   private $email;
   
   public function __construct($id,$nama,$alamat,$telp,$email) {
       $this->id=$id;
       $this->nama = $nama;
       $this->alamat = $alamat;
       $this->telp = $telp;
       $this->email = $email;
   }
   
   public function getId(){
       return $this->id;
   }
   
   public function setNama($nama){
       $this->nama = $nama;
   }
   public function getNama(){
       return $this->nama;
   }
   public function setAlamat($alamat){
       $this->alamat = $alamat;
   }
   public function getAlamat(){
       return $this->alamat;
   }
   public function setTelp($telp){
       $this->telp = $telp;
   }
   public function getTelp(){
       return $this->telp;
   }
   public function setEmail($email){
       $this->email = $email;
   }
   public function getEmail(){
       return $this->email;
   }
}

?>
