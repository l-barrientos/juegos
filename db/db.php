<?php

class Connection {
    private $host;
    private $user;
    private $pass;
    private $name;
    function __construct() {

        //WEB HOST CONFIG 
        /*$this->host = 'localhost';
        $this->user = 'root';
        $this->pass = 'SuperRoot00#';
        $this->name = 'games'; */

        //LOCAL HOST CONFIG
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->name = 'games';
    }

    /*GETTERS*/
    public function getHost() {
        return $this->host;
    }
    public function getUser() {
        return $this->user;
    }
    public function getPass() {
        return $this->pass;
    }
    public function getName() {
        return $this->name;
    }

    /*METHODS*/
    public function connect() {
        try {
            $cn = new PDO("mysql:dbname=$this->name;host=$this->host", $this->user, $this->pass);
            return $cn;
        } catch (PDOException $err) {
            echo '<h2>' . $err->getMessage() . '</h2>';
        }
    }
}
