<?php // Function to check whether an userName is already used
function checkUserNameUsed($newUserName, $users_array) {
    foreach ($users_array as $user) {
        if ($newUserName == $user['user_name']) {
            return true;
        }
    }
    return false;
}

// Function to check whether there is an empty field
function checkEmptyFields($method) {
    foreach ($method as $name => $field) {
        if ($name != 'profileImage') {
            if (empty($field)) {
                return true;
            }
        }
    }
    return false;
}
