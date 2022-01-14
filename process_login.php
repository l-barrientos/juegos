<?php
// Import data from database.php
include('database.php');
include('user.php');

// Check whether sign in prcoess is done
if (isset($_POST['signInSubmit'])) {
    $validUser = false;

    // Check whether credentials are right
    foreach ($users_array as $user) {
        if ($_POST['userName'] == $user['userName'] && password_verify($_POST['password'], $user['password'])) {
            $validUser = true;
            break;
        }
    }


    // Redirect to the site depending on whether there is an error or not
    if ($validUser) {
        setcookie("user", json_encode($user), time() + 60 * 60 * 24);
        header('Location:menu/');
    } else {
        header('Location:index.php?error=authentication');
    }

    // Check whether sign up prcoess is done
} else if (isset($_POST['signUpSubmit'])) {

    // Check whether there is an empty field
    if (checkEmptyFields($_POST)) {
        header('Location:./?error=emptyField');

        // Check whether password entries match
    } else if ($_POST['newPassword'] != $_POST['newPasswordRepeated']) {
        header('Location: ./?error=passNotMatch');

        // Check whether userName is already used 
    } else if (checkuserNameUsed($_POST['newUserName'], $users_array)) {
        header('Location: ./?error=userNameUsed');

        // If there is no error create new user and push it to data file
    } else {
        if ($_FILES['profileImage']['size'] != 0) {
            $folder = 'profile_images/' . $_POST['newUserName'];
            mkdir($folder);
            $profileImageSrc = $folder . '/' . $_FILES["profileImage"]["name"];
            $res = move_uploaded_file($_FILES['profileImage']['tmp_name'], $profileImageSrc);
            if (!$res) {
                header('Location: ./?error=imgError');
            }
        } else {
            $profileImageSrc = 'profile_images/default.png';
        }
        $newUser = new User($_POST['newUserName'], password_hash($_POST['newPassword'], PASSWORD_DEFAULT), $profileImageSrc);
        setcookie("user", json_encode($newUser), time() + 60 * 60 * 24);
        header('Location:menu/');
        array_push($users_array, $newUser);
        $json = json_encode($users_array);
        file_put_contents('users.json', $json);
    }
}

// Function to check whether an userName is already used
function checkUserNameUsed($newUserName, $users_array) {
    foreach ($users_array as $user) {
        if ($newUserName == $user['userName']) {
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
