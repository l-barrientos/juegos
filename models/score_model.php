
<?php
require_once(dirname(__DIR__) . '/db/db.php');
class Score {
    private $id;
    private $id_user;
    private $game;
    private $score;
    private $time;
    private $date;
    function __construct($user, $game,  $score, $time, $id = '') {
        $this->id_user = $user->getId();
        $this->game = $game;
        $this->score = $score;
        $this->time = $time;
        $this->date = date('d/m/y -- H:i');
        $this->id = $id;
    }

    //GETTERS ANDS SETTERS
    /* Getter and Setter Id */
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    /* Getter and Setter Id_user */
    public function getId_user() {
        return $this->id_user;
    }

    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    /* Getter and Setter Game */
    public function getGame() {
        return $this->game;
    }

    public function setGame($game) {
        $this->game = $game;
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






}
