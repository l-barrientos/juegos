<?php
require_once(dirname(__DIR__) . '/helpers/dataInputFunctions.php');
// Import data from database.php
require_once(dirname(__DIR__) . '/db/db.php');
require_once(dirname(__DIR__) . '/models/user_model.php');
if (isset($_POST['logout'])) {
    setcookie("user", "", time() - 3600, '/');
    unset($_COOKIE['user']);
}

if (isset($_COOKIE['user'])) {

    header('location:controllers/menu_controller.php');
}
$conn = new Connection();
$users_array = $conn->getAllUsers();

// Check whether sign in prcoess is done
if (isset($_POST['signInSubmit'])) {
    $validUser = false;
    // Check whether credentials are right
    foreach ($users_array as $user) {
        if ($_POST['userName'] == $user['user_name'] && password_verify($_POST['password'], $user['passwd'])) {
            $validUser = true;
            $user = new User($user['user_name'], $user['passwd'], $user['profile_image'], $user['id']);
            break;
        }
    }


    // Redirect to the site depending on whether there is an error or not
    if ($validUser) {
        setcookie("user", $user->getId(), time() + 60 * 60 * 24, '/');
        header('Location:controllers/menu_controller.php');
    } else {
        echo "<p>Error de autenticación: contraseña o nombre de usuario erróneos</p>";
    }

    // Check whether sign up prcoess is done
} else if (isset($_POST['signUpSubmit'])) {

    // Check whether there is an empty field
    if (checkEmptyFields($_POST)) {
        echo "<p>Todos los campos deben estar cumplimentados</p>";

        // Check whether password entries match
    } else if ($_POST['newPassword'] != $_POST['newPasswordRepeated']) {
        echo "<p>Las contraseñas no coinciden</p>";

        // Check whether userName is already used 
    } else if (checkuserNameUsed($_POST['newUserName'], $users_array)) {
        echo "<p>Este nombre de usuario ya está registrado</p>";

        // If there is no error create new user and push it to data file
    } else {
        if ($_FILES['profileImage']['size'] != 0) {
            $folder = 'profile_images/' . $_POST['newUserName'];
            mkdir(dirname(__DIR__) . '/' . $folder);
            $profileImageSrc = $folder . '/' . $_FILES["profileImage"]["name"];
            $res = move_uploaded_file($_FILES['profileImage']['tmp_name'], dirname(__DIR__) . '/' . $profileImageSrc);
            if (!$res) {
                echo "<p>Error al subir imagen de perfil</p>";
            }
        } else {
            $profileImageSrc = 'profile_images/default.png';
        }
        $newUser = new User($_POST['newUserName'], $_POST['newPassword'], $profileImageSrc);
        $newUser->setId($conn->insertUser($newUser));
        setcookie("user", $newUser->getId(), time() + 60 * 60 * 24, '/');
        header('Location:views/menu_view.php');
    }
}
require_once(dirname(__DIR__) . '/views/login_view.php');
