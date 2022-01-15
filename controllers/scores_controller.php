<?php
require_once('../helpers/checkUserLogged.php');
require_once(dirname(__DIR__) . '/db/db.php');
require_once(dirname(__DIR__) . '/models/score_model.php');
$conn = new Connection();
$space_invaders_scores = $conn->getScoresOrdered('space_invaders');
$ball_game_scores = $conn->getScoresOrdered('ball_game');
require_once(dirname(__DIR__) . '/views/scores_view.php');

if (isset($_GET["game"])) {
    echo "<a href='../games/" . $_GET['game'] . "'><button class='btn btn-success'>Volver a jugar</button></a>";
}

function checkCurrentUser($score_row) {
    if ($score_row['user_name'] == $_COOKIE['user']) {
        return "style='background-color:#ADD8E6'";
    }
}
