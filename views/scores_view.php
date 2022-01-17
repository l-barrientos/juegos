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
<<<<<<< HEAD
        <br><br><a href="../views/menu_view.php"><button class="btn btn-primary">Menú Principal</button></a><br><br>

=======
>>>>>>> 390d87a702b5d25de3314574e15c58dbfd6d91f6
        <h2>Space Invaders</h2>
        <table class="table">
            <thead class="thead-light">
                <tr>
<<<<<<< HEAD
                    <th style="width: 13%;">#</th>
=======
                    <th>#</th>
>>>>>>> 390d87a702b5d25de3314574e15c58dbfd6d91f6
                    <th></th>
                    <th>Nombre de usuario</th>
                    <th>Puntuación</th>
                    <th>Tiempo</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
<<<<<<< HEAD
        </table>
        <div style="overflow: scroll; height:500px; margin-top: -17px;">
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
=======
            <?php
            $i = 0;
            foreach ($space_invaders_scores as $row) {
                $i++;
            ?>
                <tr <?= checkCurrentUser($row, $current_user) ?>>
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
                    <td style='width:6%;'>
                        <?php
                        echo "<img style='width:100%;height:6%;border-radius:100%;' src='" . '../' . $row['profile_image'] . "' />";
                        ?>
                    </td>
                    <td style='width:30%;'><?= $row['user_name']; ?></td>
                    <td><?= $row['score']; ?></td>
                    <td><?php
                        echo $row['time'];
                        ?></td>
                    <td>
                        <?php
                        echo $row['date'];
                        ?>
                    </td>

                </tr>
            <?php } ?>
        </table><br><br>

        <h2>Ball Game</h2>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
>>>>>>> 390d87a702b5d25de3314574e15c58dbfd6d91f6
                    <th></th>
                    <th>Nombre de usuario</th>
                    <th>Puntuación</th>
                    <th>Tiempo</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
<<<<<<< HEAD
        </table>
        <div style="overflow: scroll; height:500px; margin-top: -17px;">
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

        <a href="../views/menu_view.php"><button class="btn btn-primary">Menú Principal</button></a><br>
=======
            <?php

            $i = 0;
            foreach ($ball_game_scores as $row) {
                $i++;
            ?>
                <tr <?= checkCurrentUser($row, $current_user) ?>>
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
                    <td style='width:6%;'>
                        <?php
                        echo "<img style='width:100%;height:6%;border-radius:100%;' src='" . '../' . $row['profile_image'] . "' />";
                        ?>
                    </td>
                    <td style='width:30%;'><?= $row['user_name']; ?></td>
                    <td><?= $row['score']; ?></td>
                    <td><?php
                        echo $row['time'];
                        ?></td>
                    <td>
                        <?php
                        echo $row['date'];
                        ?>
                    </td>

                </tr>
            <?php } ?>
        </table><br><br>

        <a href="../views/menu_view.php"><button class="btn btn-primary">Menú Principal</button></a>
>>>>>>> 390d87a702b5d25de3314574e15c58dbfd6d91f6
    </div>
</body>

</html>