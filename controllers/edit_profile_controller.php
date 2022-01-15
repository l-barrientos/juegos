<?php
require_once(dirname(__DIR__) . '/helpers/checkUserLogged.php');
require_once(dirname(__DIR__) . '/helpers/dataInputFunctions.php');
require_once(dirname(__DIR__) . '/views/edit_profile_view.php');
require_once(dirname(__DIR__) . '/db/db.php');
require_once(dirname(__DIR__) . '/models/user_model.php');
$cn = new Connection();

$user_data = $cn->getUserByUserName($_COOKIE['user']);
$user = new User($user_data['user_name'], $user_data['passwd'], $user_data['profile_image'], $user_data['id']);
