<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puntuaciones</title>
</head>

<body>
    <table>
        <tr>
            <th>Nombre de usuario</th>
            <th>Puntuación</th>
            <th>Tiempo</th>
        </tr>
        <?php
        $scores = json_decode(file_get_contents('../space_invaders/scores.json'), true);
        $users_db = json_decode(file_get_contents('../users.json'), true);
        foreach ($scores as $user) {
        ?>
            <tr>
                <td><?php foreach ($users_db as $row) {
                        if ($row['userName'] == $user['userName']) {
                            break;
                        }
                    }
                    echo "<img style='width:10%; height:5%;' src='" . '../' . $row['profileImage'] . "' />";
                    ?></td>
                <td><?= $user['userName']; ?></td>
                <td><?= $user['score']; ?></td>
                <td><?= $user['time']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>