<?php

// Class to create users implementing JsonSerializable to export private properties to JSON file
class User implements JsonSerializable {
    private $userName;
    private $password;
    private $profileImage;
    function __construct($userName, $password, $profileImage) {
        $this->userName = $userName;
        $this->password = $password;
        $this->profileImage = $profileImage;
    }

    /* Getter and Setter Email */
    public function getUserName() {
        return $this->userName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    /* Getter and Setter Password */
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    /* Getter and Setter ProfileImage */
    public function getProfileImage() {
        return $this->profileImage;
    }

    public function setProfileImage($profileImage) {
        $this->profileImage = $profileImage;
    }

    // Method to encode objects to JSON
    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }
}
