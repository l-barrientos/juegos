
<?php
require_once(dirname(__DIR__) . '/db/db.php');
class Score {
    private $db;
    private $user_name;
    private $score;
    private $time;
    private $date;
    function __construct($user_name, $score, $time, $date) {
        $this->user_name = $user_name;
        $this->score = $score;
        $this->time = $time;
        $this->date = date('d/m/y -- H:i');
    }

    //GETTERS ANDS SETTERS
    /* Getter and Setter Db */
    public function getDb() {
        return $this->db;
    }

    public function setDb($db) {
        $this->db = $db;
    }

    /* Getter and Setter User_name */
    public function getUser_name() {
        return $this->user_name;
    }

    public function setUser_name($user_name) {
        $this->user_name = $user_name;
    }

    /* Getter and Setter Score */
    public function getScore() {
        return $this->score;
    }

    public function setScore($score) {
        $this->score = $score;
    }

    /* Getter and Setter Time */
    public function getTime() {
        return $this->time;
    }

    public function setTime($time) {
        $this->time = $time;
    }

    /* Getter and Setter Date */
    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    //METHODS

    public function getAllOrdered($table) {
        $sql = "SELECT * FROM $table ORDER BY score DESC, time ASC ;";
        try {
            return $this->db->query($sql);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function insertScore($table, $id_user, $score, $profile_image) {
        $sql = "INSERT INTO $table (user_name, passwd, profile_image)
        VALUES('$user_name', '$passwd', '$profile_image');";
        try {
            $this->db->exec($sql);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }
}
