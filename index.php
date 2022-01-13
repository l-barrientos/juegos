<?php if (isset($_POST['logout'])) {
  setcookie("user", "", time() - 3600);
  unset($_COOKIE['user']);
}

if (isset($_COOKIE['user'])) {
  header('location:menu/');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
</head>

<body>
  <!-- Form to sign in with credentials -->
  <form action="process_login.php" method="post" id='signInForm'>

    <h2 style='text-align:center;margin-top:2%;'>Iniciar Sesión</h2>
    <div style='margin-left:45%;margin-top:2%;'>
      <div class="form-group">
        <label for="userName">Usuario:</label>
        <input type="text" name="userName" id="userName" />
      </div>
      <div class="form-group">
        <label for="password">Contraseña: </label>
        <input type="password" name="password" id="password" />
      </div>
      <input type="submit" value="Enviar" name="signInSubmit" />
    </div>
  </form>
  <?php
  // Show when credentials are wrong
  if (isset($_GET['error'])) {
    if ($_GET['error'] == 'authentication') {
      echo "<p id='errorIn' class='error'>Error de autenticación: contraseña o nombre de usuario erróneos</p>";
    }
  }

  ?>

  <!-- Form to sign up -->
  <form action="process_login.php" method="post" enctype="multipart/form-data" id="signUpForm" class="signForms">
    <h2 style='text-align:center;margin-top:4%;'>Registrarse</h2>
    <div style='margin-left:45%;margin-top:2%;'>
      <div class="form-group">
        <label for="newUserName">Usuario:</label>
        <input type="text" name="newUserName" id="newUserName" />
      </div>
      <div class="form-group">
        <label for="newPassword">Contraseña: </label>
        <input type="password" name="newPassword" id="newPassword" />
      </div>
      <div class="form-group">
        <label for="newPasswordRepeated">Repite la contraseña: </label>
        <input type="password" name="newPasswordRepeated" id="newPasswordRepeated" />
      </div>
      <div class="form-group">
        <label for="profileImage">Imagen de perfil:</label>
        <input type="file" name="profileImage" id="profileImage" />
      </div>

      <input type="submit" value="Enviar" name="signUpSubmit" />
    </div>
  </form>
  <?php

  // Show the specific error
  if (isset($_GET['error'])) {
    if ($_GET['error'] == 'passNotMatch') {
      echo "<p id='errorUp' class='error'>Las contraseñas no coinciden</p>";
    } else if ($_GET['error'] == 'userNameUsed') {
      echo "<p id='errorUp' class='error'>Este nombre de usuario ya está registrado</p>";
    } else if ($_GET['error'] == 'emptyField') {
      echo "<p id='errorUp' class='error'>Todos los campos deben estar cumplimentados</p>";
    } else if ($_GET['error'] == 'imgError') {
      echo "<p id='errorUp' class='error'>Error al subir imagen de perfil</p>";
    }
  }

  ?>

</body>

</html>