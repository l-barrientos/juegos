<?php

require_once(dirname(__DIR__) . '/db/db.php');
require_once(dirname(__DIR__) . '/models/user_model.php');

$cn = new Connection();
$user_data = $cn->getUserById($_COOKIE['user']);
$user = new User($user_data['user_name'], $user_data['passwd'], $user_data['profile_image'], $user_data['id']);
require_once(dirname(__DIR__) . '/views/menu_view.php');
