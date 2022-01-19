<!DOCTYPE html>
<html lang="en">

<head>
      <link rel="icon" type="image/png" href="views/img/kola.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
</head>

<body>
    <!-- Form to sign in with credentials -->
    <form action="./" method="post" id='signInForm'>
        <h2 style='text-align:center;margin-top:2%;'>Iniciar Sesión</h2>
        <div style='margin-left:37%;margin-right:40%;margin-top:1%;'>
            <div class="form-group">
                <label for="userName">Usuario</label>
                <input class="form-control" type="text" name="userName" id="userName" />
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input class="form-control" type="password" name="password" id="password" />
            </div>
            <input class="btn btn-primary" type="submit" value="Enviar" name="signInSubmit" />
        </div>
    </form>

    <!-- Form to sign up -->
    <form action="./" method="post" enctype="multipart/form-data" id="signUpForm" class="signForms">
        <h2 style='text-align:center;margin-top:1%;'>Registrarse</h2>
        <div style='margin-left:37%;margin-right:40%;margin-top:1%;'>
            <div class="form-group">
                <label for="newUserName">Usuario (*)</label>
                <input type="text" class="form-control" name="newUserName" id="newUserName" />
            </div>
            <div class="form-group">
                <label for="newPassword">Contraseña (*)</label>
                <input type="password" class="form-control" name="newPassword" id="newPassword" />
            </div>
            <div class="form-group">
                <label for="newPasswordRepeated">Repite la contraseña (*)</label>
                <input type="password" class="form-control" name="newPasswordRepeated" id="newPasswordRepeated" />
            </div>
            <div class="form-group">
                <label for="profileImage">Imagen de perfil</label><br>
                <input type="file" class="form-control-file" name="profileImage" id="profileImage" onchange="displayImage(this)" /><br>
                <img id='prof' style='width:25%;height:25%;border-radius:100%;' src='profile_images/default.png' /><br><br>
            </div>

            <input type="submit" class="btn btn-primary" value="Enviar" name="signUpSubmit" />
        </div>
    </form>
    <script>
        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#prof').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>
</body>

</html>