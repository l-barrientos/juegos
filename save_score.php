<?php
class Score implements JsonSerializable {
    private $userName;
    private $score;
    private $time;
    private $date;
    function __construct($userName, $score, $time) {
        $this->userName = $userName;
        $this->score = $score;
        $this->time = $time;
        $this->date = date('d/m/y -- H:i');
    }
    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }
}
$userName = $_GET['userName'];
$score = $_GET['score'];
$time = $_GET['time'];
$game = $_GET['game'];
$scores = json_decode(file_get_contents($game . '/scores.json'), true);


$exists = false;
foreach ($scores as $key => $user) {
    if ($user['userName'] == $userName) {
        $exists = true;
        break;
    }
}

if (!$exists) {
    $newScore = new Score($userName, $score, $time);
    array_push($scores, $newScore);
} else if ($scores[$key]['score'] < $score) {
    $scores[$key]['score'] = $score;
    $scores[$key]['time'] = $time;
    $scores[$key]['date'] =  date('d/m/y -- H:i');
}

$json = json_encode($scores);
file_put_contents($game . '/scores.json', $json);

header('location:score_history/?game=' . $game);
