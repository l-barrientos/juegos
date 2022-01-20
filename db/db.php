<?php

class Connection {
    private $host;
    private $user;
    private $pass;
    private $name;
    private $cn;
    function __construct() {

        //WEB HOST CONFIG 
        /* $this->host = 'localhost';
        $this->user = 'hcfwtifi_root';
        $this->pass = 'SuperRoot00#';
        $this->name = 'hcfwtifi_games'; */

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

    public function getUserById($user_id) {
        $sql = "SELECT * FROM users WHERE id = '$user_id';";
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
        VALUES('" . $user->getUser_name() . "', '" . $user->getPasswd() . "', '" . $user->getProfile_image() . "');";
        try {
            $this->cn->exec($sql);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
        try {
            $query = $this->cn->prepare("SELECT id FROM users WHERE user_name ='" . $user->getUser_name() . "';");
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['id'];
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function updateUserInfo($user, $new_user_name, $new_profile_image) {
        $sql = "UPDATE users 
        SET user_name='$new_user_name', profile_image='$new_profile_image'
        WHERE id=" . $user->getId() . "; ";
        try {
            $this->cn->exec($sql);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function updateUserPasswd($user, $new_passwd) {
        $sql = "UPDATE users SET passwd = '$new_passwd' WHERE id =" . $user->getId() . ";";
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
            return $prep->fetch(PDO::FETCH_ASSOC);
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

    // MESSAGES ***************************

    public function getMessages() {
        $sql = "SELECT * FROM messages m JOIN users u ON m.id_user=u.id  ORDER BY date ASC ;";
        try {
            $prep = $this->cn->prepare($sql);
            $prep->execute();
            return $prep->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function insertMessage($id_user, $message) {
        $sql = "INSERT INTO messages (id_user, message)
        VALUES (" . $id_user . ", '" . $message . "');";
        try {
            $this->cn->exec($sql);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }
}
