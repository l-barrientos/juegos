<?php
require_once('../helpers/checkUserLogged.php');
require_once(dirname(__DIR__) . '/db/db.php');
$conn = new Connection();

$messages_array = $conn->getMessages();


if (isset($_POST['submit_message'])) {
    $conn->insertMessage($_COOKIE['user'], $_POST['message_text']);
    header('location: ./chat_controller.php');
}

require_once(dirname(__DIR__) . '/views/chat_view.php');
