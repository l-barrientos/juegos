<?php
require_once('../helpers/checkUserLogged.php');
require_once(dirname(__DIR__) . '/db/db.php');
$conn = new Connection();

$current_user = $conn->getUserById($_COOKIE['user']);


require_once(dirname(__DIR__) . '/views/chat_view.php');
