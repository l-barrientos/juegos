<?php require_once('../checkUserLogged.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puntuaciones</title>
</head>

<body>
    <div style='margin-left:10%;margin-right:10%;'>
        <h2>Space Invaders</h2>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th></th>
                    <th>Nombre de usuario</th>
                    <th>Puntuación</th>
                    <th>Tiempo</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
            <?php

            $scores = json_decode(file_get_contents('../space_invaders/scores.json'), true);
            $users_db = json_decode(file_get_contents('../users.json'), true);

            $only_scores = array();
            foreach ($scores as $user) {
                $only_scores[$user['userName']] = $user['score'];
            }
            arsort($only_scores, SORT_NUMERIC);
            $i = 0;
            foreach ($only_scores as $userName => $score) {
                $i++;
            ?>
                <tr>
                    <td><?php if ($i == 1) {
                            echo  $i . ' 👑';
                        } else if ($i == 2) {
                            echo $i . ' 🥈';
                        } else if ($i == 3) {
                            echo  $i . ' 🥉';
                        } else {
                            echo $i;
                        }
                        ?></td>
                    <td style='width:10%;'>
                        <?php foreach ($users_db as $row) {
                            if ($userName == $row['userName']) {
                                break;
                            }
                        }
                        echo "<img style='width:100%;height:6%;border-radius:100%;' src='" . '../' . $row['profileImage'] . "' />";
                        ?>
                    </td>
                    <td style='width:30%;'><?= $userName; ?></td>
                    <td><?= $score; ?></td>
                    <td><?php
                        foreach ($scores as $user) {
                            if ($userName == $user['userName']) {
                                echo $user['time'];
                            }
                        }  ?></td>
                    <td>
                        <?php
                        foreach ($scores as $user) {
                            if ($userName == $user['userName']) {
                                echo $user['date'];
                            }
                        }  ?>
                    </td>

                </tr>
            <?php } ?>
        </table><br><br>

        <h2>Ball Game</h2>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th></th>
                    <th>Nombre de usuario</th>
                    <th>Puntuación</th>
                    <th>Tiempo</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
            <?php

            $scores = json_decode(file_get_contents('../ball_game/scores.json'), true);
            $users_db = json_decode(file_get_contents('../users.json'), true);

            $only_scores = array();
            foreach ($scores as $user) {
                $only_scores[$user['userName']] = $user['score'];
            }
            arsort($only_scores, SORT_NUMERIC);
            $j = 0;
            foreach ($only_scores as $userName => $score) {
                $j++;
            ?>
                <tr>
                    <td><?php if ($j == 1) {
                            echo  $j . ' 👑';
                        } else if ($j == 2) {
                            echo $j . ' 🥈';
                        } else if ($j == 3) {
                            echo  $j . ' 🥉';
                        } else {
                            echo $j;
                        }
                        ?></td>
                    <td style='width:10%;'>
                        <?php foreach ($users_db as $row) {
                            if ($userName == $row['userName']) {
                                break;
                            }
                        }
                        echo "<img style='width:100%;height:6%;border-radius:100%;' src='" . '../' . $row['profileImage'] . "' />";
                        ?>
                    </td>
                    <td style='width:30%;'><?= $userName; ?></td>
                    <td><?= $score; ?></td>
                    <td>
                        <?php
                        foreach ($scores as $user) {
                            if ($userName == $user['userName']) {
                                echo $user['time'];
                            }
                        }  ?>
                    </td>
                    <td>
                        <?php
                        foreach ($scores as $user) {
                            if ($userName == $user['userName']) {
                                echo $user['date'];
                            }
                        }  ?>
                    </td>

                </tr>
            <?php } ?>
        </table><br><br>
        <a href="<?php
                    if (isset($_GET["game"])) {
                        echo "../" . $_GET["game"] . "/";
                    } else {
                        echo "../menu/";
                    }

                    ?>"><button class="btn btn-success">Volver a jugar</button></a>
        <a href="../menu/"><button class="btn btn-primary">Menú Principal</button></a>
    </div>
</body>

</html>