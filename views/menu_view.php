<?php require_once('../helpers/checkUserLogged.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" type="image/png" href="../views/img/kola.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menú Principal</title>
</head>

<body>
  <img style="margin-left:2%;margin-top:2%;width:13%;height:13%;border-radius:100%;" src="../<?= $user->getProfile_image(); ?>">
  <h1 style="position: absolute; margin-left: 20%; margin-top:-8%;">Bienvenido <?= $user->getUser_name() ?></h1>

  <br /><br />


  <a href="../controllers/scores_controller.php"><button style='margin-left:25%;' class="btn btn-primary">
      VER PUNTUACIONES
    </button></a>
  <a href="../controllers/edit_profile_controller.php"><button style="margin-left: 10%" class="btn btn-primary">
      EDITAR PERFIL
    </button></a>
  <form style=' margin-left:65%;margin-bottom:3%;margin-top:-3%;' action="../" method='post'>

    <input style='margin-left:10%;' class="btn btn-danger" type="submit" value="CERRAR SESIÓN" name="logout" />
  </form>
  <div>
    <a href="../games/space_invaders/"><img style="margin-left:7%;width:15%;height:15%;border-radius:30px;" src="../views/img/space_invaders.jpg"></a>
    <img style="margin-left:15%;width:40%;height:40%;border-radius:10px;" src="../views/img/space_invaders.gif">
  </div>
  <div style="margin-top:5%;">
    <a href=" ../games/ball_game/"><img style="margin-left:7%;width:15%;height:15%;border-radius:30px;" src="../views/img/ball_game.png"></a>
    <img style="margin-left:15%;width:40%;height:40%;border-radius:10px;border:1px solid black;" src="../views/img/ball_game.gif">
  </div>
  <footer style='margin-top:5%;background-color:black; padding:3%;'>
    <p style='text-align:center;color:white'>Desarrollado por Kolaryx&Co</p>
  </footer>
</body>

</html>