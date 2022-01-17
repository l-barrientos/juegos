<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil </title>
</head>

<body>
    <a href="../controllers/menu_controller.php"><button style='position:absolute;margin-left: 3%;margin-top:2%;' class="btn btn-danger">Volver al menú</button></a>
    <h2 style='text-align:center;margin-top:1%;'>Editar perfil</h2>
    <form style='margin-top:1%;margin-left:37%;margin-right:40%;' enctype="multipart/form-data" onreset="resetImage()" action="../controllers/edit_profile_controller.php" method="post">

        <label for="newUserName">Nombre de usuario</label>
        <input type="text" name="newUserName" class="form-control" id="newUserName" value="<?= $user->getUser_name() ?>"><br>

        </div>
        <div class="form-group">
            <label for="profileImage">Foto de perfil</label>
            <input type="file" name="profileImage" class="form-control-file" id="profileImage" onchange="displayImage(this);">
        </div>
        <?php
        echo "<img id='prof' style='width:30%;height:6%;border-radius:100%;' src='" . '../' . $user->getProfile_image() . "' />";
        ?><br><br>
        <input type="submit" name='updateInfo' class="btn btn-primary" value="Guardar">
        <input type="reset" class="btn btn-danger" value="Cancelar">

    </form>

    <h2 style='text-align:center;margin-top:2%;'>Cambiar contraseña</h2>
    <form style='margin-top:1%;margin-left:37%;margin-right:40%;' action="../controllers/edit_profile_controller.php" method="post">

        <label for="currentPasswd">Contraseña actual</label>
        <input type="password" name="currentPasswd" class="form-control" id="currentPasswd"><br>
        <label for="newPasswd">Nueva contraseña</label>
        <input type="password" name="newPasswd" class="form-control" id="newPasswd"><br>
        <label for="repeatedNewPasswd">Repetir nueva contraseña</label>
        <input type="password" name="repeatedNewPasswd" class="form-control" id="repeatedNewPasswd"><br>


        <input type="submit" name='updatePasswd' class="btn btn-primary" value="Guardar">
        <input type="reset" class="btn btn-danger" value="Cancelar">
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

        function resetImage() {
            document.getElementById('prof').src = "../<?= substr($user->getProfile_image(), 1); ?>";
        }
    </script>
</body>

</html>