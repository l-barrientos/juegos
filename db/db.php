<?php

class Connection {
    private $host;
    private $user;
    private $pass;
    private $name;
    private $cn;
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
        try {
            $this->cn = new PDO("mysql:dbname=$this->name;host=$this->host", $this->user, $this->pass);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
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

    // USERS *****************
    public function getAllUsers() {
        $sql = "SELECT * FROM users;";
        try {
            $prep = $this->cn->prepare($sql);
            $prep->execute();
            return $prep->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function getUserByUserName($user_name) {
        $sql = "SELECT * FROM users WHERE user_name = '$user_name';";
        try {
            $prep = $this->cn->prepare($sql);
            $prep->execute();
            return $prep->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function insertUser($user) {
        $sql = "INSERT INTO users (user_name, passwd, profile_image)
        VALUES('" . $user->getUser_name() . "', '" . $user->getPasswd() . "', '." . $user->getProfile_image() . "');";
        try {
            $this->cn->exec($sql);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function updateUser($user, $user_name, $passwd, $profile_image) {
        $sql = "UPDATE users 
        SET user_name='$user_name', passwd='$passwd', profile_image='$profile_image'
        WHERE id=" . $user->getId() . "; ";
        try {
            $this->cn->exec($sql);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }


    // SCORES ************************
    public function getScoresOrdered($game) {
        $sql = "SELECT * FROM scores s JOIN users u ON s.id_user=u.id WHERE game ='$game'  ORDER BY score DESC, time ASC ;";
        try {
            $prep = $this->cn->prepare($sql);
            $prep->execute();
            return $prep->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function getScoreByUser($game, $user) {
        $sql = "SELECT * FROM scores WHERE game ='$game' AND id_user = " . $user->getId() . "  ;";
        try {
            $prep = $this->cn->prepare($sql);
            $prep->execute();
            return $prep->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function insertScore($score, $user) {
        $sql = "INSERT INTO scores (game, id_user, score, time, date)
        VALUES ('" . $score->getGame() . "', " . $user->getId() . "," . $score->getScore() . ", " . $score->getTime() . ", '" . $score->getDate() . "');";
        try {
            $this->cn->exec($sql);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function updateScore($last_score, $new_score) {
        $sql = "UPDATE scores 
        SET score=" . $new_score->getScore() . ", time=" . $new_score->getTime() . ", date='" . $new_score->getDate() . "'
        WHERE id=" . $last_score->getId() . ";";
        try {
            $this->cn->exec($sql);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }
}
