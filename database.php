<?php
// Generate the users array with data from users.json file, if file doesn't exist it will be an empty array
$users_array = json_decode(file_get_contents('users.json'), true);
