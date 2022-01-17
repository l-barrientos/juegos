<?php
require_once(dirname(__DIR__) . '/helpers/checkUserLogged.php');
require_once(dirname(__DIR__) . '/helpers/dataInputFunctions.php');

require_once(dirname(__DIR__) . '/db/db.php');
require_once(dirname(__DIR__) . '/models/user_model.php');
$cn = new Connection();

$user_data = $cn->getUserById($_COOKIE['user']);
$user = new User($user_data['user_name'], $user_data['passwd'], $user_data['profile_image'], $user_data['id']);
$users_array = $cn->getAllUsers();
require_once(dirname(__DIR__) . '/views/edit_profile_view.php');

if (isset($_POST['updateInfo'])) {
    if ($_POST['newUserName'] != $user->getUser_name()) {
        if (!checkUserNameUsed($_POST['newUserName'], $users_array)) {
            file_exists('../profile_images/' . $user->getUser_name()) ? rename('../profile_images/' . $user->getUser_name(), '../profile_images/' . $_POST['newUserName']) : '';

            if ($user->getProfile_image() != 'profile_images/default.png') {
                $user->setProfile_image(str_replace($user->getUser_name(), $_POST['newUserName'], $user->getProfile_image()));
            }
            $user->setUser_name($_POST['newUserName']);
        } else {
            echo '<p>Este nombre de usuario ya está registrado</p>';
        }
    }
    if ($_FILES['profileImage']['size'] != 0) {
        $folder = 'profile_images/' . $user->getUser_name();
        file_exists('../' . $folder) ? '' : mkdir('../' . $folder);
        $profileImageSrc = $folder . '/' . $_FILES["profileImage"]["name"];
        $res = move_uploaded_file($_FILES['profileImage']['tmp_name'], '../' . $profileImageSrc);
        if (!$res) {
            echo "<p>Error al subir imagen de perfil</p>";
        } else {
            unlink('../' . $user->getProfile_image());
            $user->setProfile_image($profileImageSrc);
        }
    }
    $cn->updateUserInfo($user, $user->getUser_name(), $user->getProfile_image());
    header('location:./edit_profile_controller.php');
} else if (isset($_POST['updatePasswd'])) {
    if (password_verify($_POST['currentPasswd'], $user->getPasswd())) {
        if ($_POST['newPasswd'] == $_POST['repeatedNewPasswd']) {
            $user->setPasswd(password_hash($_POST[['newPasswd']], PASSWORD_DEFAULT));
            $cn->updateUserPasswd($user, $user->getPasswd());
            echo '<p>Contraseña actualizada correctamente</p>';
        } else {
            echo '<p>Las contraseñas no coinciden</p>';
        }
    } else {
        echo '<p>Contraseña actual incorrecta</p>';
    }
}
