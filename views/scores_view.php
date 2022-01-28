<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="../views/img/kola.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puntuaciones</title>
</head>

<body>
    <div style='margin-left:10%;margin-right:10%;'>
        <br><br><a href="../controllers/menu_controller.php"><button class="btn btn-primary">Menú Principal</button></a><br><br>
        <h2>Space Invaders</h2>
        <table class=" table">
            <thead class="thead-light">
                <tr>
                    <th style="width: 13%;">#</th>

                    <th></th>
                    <th>Nombre de usuario</th>
                    <th>Puntuación</th>
                    <th>Tiempo</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>

        </table>
        <div style="overflow-y: scroll; height:500px; margin-top: -17px;">
            <table class="table">
                <?php

                $i = 0;
                foreach ($space_invaders_scores as $row) {
                    $i++;
                ?>
                    <tr <?= checkCurrentUser($row, $current_user) ?>>
                        <td style="width: 8%;"><?php if ($i == 1) {
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
                            <?php
                            echo "<img style='width:100%;height:6%;border-radius:100%;' src='" . '../' . $row['profile_image'] . "' />";
                            ?>
                        </td>
                        <td style='width:33%;'><?= $row['user_name']; ?></td>
                        <td style='width:16%;'><?= $row['score']; ?></td>
                        <td style='width:12%;'><?php
                                                echo $row['time'];
                                                ?></td>
                        <td>
                            <?php
                            echo $row['date'];
                            ?>
                        </td>

                    </tr>
                <?php } ?>
            </table>
        </div><br><br>

        <h2>Ball Game</h2>
        <table class=" table">
            <thead class="thead-light">
                <tr>
                    <th style="width: 13%;">#</th>

                    <th></th>
                    <th>Nombre de usuario</th>
                    <th>Puntuación</th>
                    <th>Tiempo</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>

        </table>
        <div style="overflow-y: scroll; height:500px; margin-top: -17px;">
            <table class="table">
                <?php

                $i = 0;
                foreach ($ball_game_scores as $row) {
                    $i++;
                ?>
                    <tr <?= checkCurrentUser($row, $current_user) ?>>
                        <td style="width: 8%;"><?php if ($i == 1) {
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
                            <?php
                            echo "<img style='width:100%;height:6%;border-radius:100%;' src='" . '../' . $row['profile_image'] . "' />";
                            ?>
                        </td>
                        <td style='width:33%;'><?= $row['user_name']; ?></td>
                        <td style='width:16%;'><?= $row['score']; ?></td>
                        <td style='width:12%;'><?php
                                                echo $row['time'];
                                                ?></td>
                        <td>
                            <?php
                            echo $row['date'];
                            ?>
                        </td>

                    </tr>
                <?php } ?>
            </table>
        </div><br><br>

        <h2>Bricks Breaker</h2>
        <table class=" table">
            <thead class="thead-light">
                <tr>
                    <th style="width: 13%;">#</th>

                    <th></th>
                    <th>Nombre de usuario</th>
                    <th>Puntuación</th>
                    <th>Tiempo</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>

        </table>
        <div style="overflow-y: scroll; height:500px; margin-top: -17px;">
            <table class="table">
                <?php

                $i = 0;
                foreach ($bricks_breaker_scores as $row) {
                    $i++;
                ?>
                    <tr <?= checkCurrentUser($row, $current_user) ?>>
                        <td style="width: 8%;"><?php if ($i == 1) {
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
                            <?php
                            echo "<img style='width:100%;height:6%;border-radius:100%;' src='" . '../' . $row['profile_image'] . "' />";
                            ?>
                        </td>
                        <td style='width:33%;'><?= $row['user_name']; ?></td>
                        <td style='width:16%;'><?= $row['score']; ?></td>
                        <td style='width:12%;'><?php
                                                echo $row['time'];
                                                ?></td>
                        <td>
                            <?php
                            echo $row['date'];
                            ?>
                        </td>

                    </tr>
                <?php } ?>
            </table>
        </div><br><br>

        <a href="../controllers/menu_controller.php"><button class="btn btn-primary">Menú Principal</button></a><br>
        <br><br>

    </div>
</body>


</html>