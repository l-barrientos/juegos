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

    <form action="../controllers/edit_profile_controller.php" method="post">
        <div class="form-group">

            <label for="userName">Nombre de usuario</label>
            <p>Hola Mundo</p>
            <input type="text" class="form-control" id="userName" value="<?= $user->getUser_name() ?>">

        </div>
        <div class="form-group">
            <label for="profile_image">Foto de perfil</label>
            <input type="file" class="form-control-file" id="profile_image">
        </div>
        <?php
        echo "<img style='width:100%;height:6%;border-radius:100%;' src='" . '../' . substr($user->getProfile_image(), 1) . "' />";
        ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>