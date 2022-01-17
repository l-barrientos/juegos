<?php
require_once('../helpers/checkUserLogged.php');
require_once('../db/db.php');
require_once('../models/score_model.php');
require_once('../models/user_model.php');

$conn = new Connection();


$user_data = $conn->getUserById($_COOKIE['user']);
$user = new User($user_data['user_name'], $user_data['passwd'], $user_data['profile_image'], $user_data['id']);
$newScore = new Score($user, $_GET['game'], $_GET['score'], $_GET['time']);

$score_data = $conn->getScoreByUser($newScore->getGame(), $user);

if ($score_data == null) {
    $conn->insertScore($newScore, $user);
} else if ($newScore->getScore() > $score_data['score']) {
    $lastScore = new Score($user, $score_data['game'], $score_data['score'], $score_data['time'], $score_data['id']);
    $conn->updateScore($lastScore, $newScore);
}


header('location:scores_controller.php?game=' . $_GET['game']);
