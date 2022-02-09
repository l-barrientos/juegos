<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../views/img/kola.png">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>

<body>
    <br><br>
    <div style='margin-left:10%;margin-right:10%;'>
        <h2>Chat</h2>
        <div id='chat' style="overflow-y: scroll; height:600px;">
            <table class="table">
                <?php
                foreach ($messages_array as $msg) {
                    $date = date('H:i', strtotime($msg['date']));

                ?>
                    <tr>
                        <td style='width:7%;'> <?= "<img style='width:75%;height:6%;border-radius:100%;' src='" . '../' . $msg['profile_image'] . "' />"; ?></td>
                        <td><b><?= $msg['user_name'] ?></b></td>
                        <td><?= $msg['message'] ?></td>
                        <td><?= $date ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <form action="../controllers/chat_controller.php" method="post">

            <div class="input-group mb-3">
                <input id="message_text" type="text" class="form-control" name="message_text" placeholder="Escribir mensaje" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" name="submit_message" type="submit">Enviar</button>
                </div>
            </div>
        </form>
        <br><br>
        <a href="../controllers/menu_controller.php"><button class="btn btn-primary">Menú Principal</button></a><br>

    </div>
</body>
<script>
    document.getElementById('chat').scrollTop = document.getElementById('chat').scrollHeight;
    document.getElementById('message_text').focus();
</script>

</html>
