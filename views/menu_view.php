<?php require_once('../helpers/checkUserLogged.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menú Principal</title>
</head>

<body>
  <br /><br />
  <a href="../games/space_invaders/"><button style="margin-left: 10%" class="btn btn-success">
      SPACE INVADERS
    </button></a>
  <a href="../games/ball_game/"><button style="margin-left: 10%" class="btn btn-success">
      BALL GAME
    </button></a>
  <a href="../controllers/scores_controller.php"><button style="margin-left: 10%" class="btn btn-primary">
      VER PUNTUACIONES
    </button></a>
  <a href="../controllers/edit_profile_controller.php"><button style="margin-left: 10%" class="btn btn-primary">
      EDITAR PERFIL
    </button></a>
<<<<<<< HEAD:views/menu_view.php
  <form style='position:absolute;margin-left:73%;margin-top:-3%;' action="../" method='post'>
=======
  <form style='margin-left:10%;margin-top:5%;' action="../" method='post'>
>>>>>>> 390d87a702b5d25de3314574e15c58dbfd6d91f6:menu/index.php
    <input class="btn btn-danger" type="submit" value="CERRAR SESIÓN" name="logout" />
  </form>

</body>

</html>