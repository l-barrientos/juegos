<?php
require_once('../helpers/checkUserLogged.php');
require_once(dirname(__DIR__) . '/db/db.php');
require_once(dirname(__DIR__) . '/models/score_model.php');
$conn = new Connection();
$space_invaders_scores = $conn->getScoresOrdered('space_invaders');
$ball_game_scores = $conn->getScoresOrdered('ball_game');
$current_user = $conn->getUserById($_COOKIE['user']);
require_once(dirname(__DIR__) . '/views/scores_view.php');

if (isset($_GET["game"])) {
<<<<<<< HEAD
    echo "<a href='../games/" . $_GET['game'] . "'><button class='btn btn-success'  style='margin-top: -5.4%; margin-left: 23%;''>Volver a jugar</button></a>";
}

function checkCurrentUser($score_row, $current_user) {
    if ($score_row['user_name'] == $current_user['id']) {
=======
    echo "<a href='../games/" . $_GET['game'] . "'><button class='btn btn-success'>Volver a jugar</button></a>";
}

function checkCurrentUser($score_row, $current_user) {
    if ($score_row['user_name'] == $current_user['user_name']) {
>>>>>>> 390d87a702b5d25de3314574e15c58dbfd6d91f6
        return "style='background-color:#ADD8E6'";
    }
}
