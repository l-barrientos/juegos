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
    <form action="http://localhost/juegos/controllers/login_controller.php" method="post" id='signInForm'>
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

    <!-- Form to sign up -->
    <form action="http://localhost/juegos/controllers/login_controller.php" method="post" enctype="multipart/form-data" id="signUpForm" class="signForms">
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

</body>

</html>