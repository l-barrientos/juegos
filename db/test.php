<?php
require_once('db.php');
require_once('../models/user_model.php');
$conn = new Connection();
$user_data = $conn->getUserByUserName('kolaryx');
$user = new User($user_data['user_name'], $user_data['passwd'], $user_data['profile_image'], $user_data['id']);
$scores = $conn->getScoreByUser('space_games', $user);
echo sizeof($scores);
print_r($scores);
foreach ($scores as $score) {
    print("<pre>" . print_r($score, true) . "</pre>");
}
