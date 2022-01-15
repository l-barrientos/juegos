<?php
require_once(dirname(__DIR__) . '/db/db.php');
class User implements JsonSerializable {
    private $id;
    private $user_name;
    private $passwd;
    private $profile_image;

    function __construct($user_name, $passwd, $profile_image, $id = '') {
        $this->user_name = $user_name;
        $this->passwd = password_hash($passwd, PASSWORD_DEFAULT);
        $this->profile_image = $profile_image;
        $this->id = $id;
    }

    // GETTERS AND SETTERS
    /* Getter and Setter Id */
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

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

    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }
}
