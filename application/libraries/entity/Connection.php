<?php

class Connection {
    private $mysqli;
    
    public function __construct() {
        $this->mysqli = new mysqli("localhost","root","","dbtoko");
    }
    
    public function getMysqli(){
        return $this->mysqli;
    }
}

?>
