<?php
require_once(dirname(__DIR__) . 'db/db.php');
class User {
    private $db;
    private $user_name;
    private $passwd;
    private $profile_image;

    function __construct($user_name, $passwd, $profile_image) {
        $cn = new Connection();
        $this->db = $cn->connect();
        $this->user_name = $user_name;
        $this->passwd = password_hash($passwd, PASSWORD_DEFAULT);
        $this->profile_image = $profile_image;
    }

    // GETTERS AND SETTERS
    /* Getter and Setter User_name */
    public function getUser_name() {
        return $this->user_name;
    }

    public function setUser_name($user_name) {
        $this->user_name = $user_name;
    }

    /* Getter and Setter Passwd */
    public function getPasswd() {
        return $this->passwd;
    }

    public function setPasswd($passwd) {
        $this->passwd = $passwd;
    }

    /* Getter and Setter Profile_image */
    public function getProfile_image() {
        return $this->profile_image;
    }

    public function setProfile_image($profile_image) {
        $this->profile_image = $profile_image;
    }

    //METHODS

    //Get all users 

    public function getAll() {
        $sql = "SELECT * FROM users;";
        try {
            return $this->db->query($sql);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function insertUser($user_name, $passwd, $profile_image) {
        $sql = "INSERT INTO users (user_name, passwd, profile_image)
        VALUES('$user_name', '$passwd', '$profile_image');";
        try {
            $this->db->exec($sql);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function updateUser($id, $user_name, $passwd, $profile_image) {
        $sql = "UPDATE users 
        SET user_name='$user_name', passwd='$passwd', profile_image='$profile_image'
        WHERE id=$id; ";
        try {
            $this->db->exec($sql);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }
}
