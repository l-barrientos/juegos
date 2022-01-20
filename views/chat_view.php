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
        <div id='chat' style="overflow-y: scroll; height:400px;">
            <table class="table" id="messages">

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
    setInterval(() => {
        document.getElementById('messages').innerHTML = '';
        showMessages(document.getElementById('messages'));
    }, 5);

    function showMessages(table) {
        <?php
        $messages_array = $conn->getMessages();
        $i = 0;
        foreach ($messages_array as $msg) {
            $date = date('H:i', strtotime($msg['date']));

        ?>

            let row<?= $i ?> = document.createElement('tr');

            let imgTd<?= $i ?> = document.createElement('td');
            imgTd<?= $i ?>.style = "width:7%;";
            let img<?= $i ?> = document.createElement('img');
            img<?= $i ?>.src = "../<?= $msg['profile_image'] ?>";
            img<?= $i ?>.style = "width:75%;height:6%;border-radius:100%;";
            imgTd<?= $i ?>.appendChild(img<?= $i ?>);
            row<?= $i ?>.appendChild(imgTd<?= $i ?>);

            let tdName<?= $i ?> = document.createElement('td');
            let tdNameText<?= $i ?> = document.createTextNode("<?= $msg['name'] ?>");
            tdName<?= $i ?>.appendChild(tdNameText<?= $i ?>);
            row<?= $i ?>.appendChild(tdName<?= $i ?>);

            let tdMsg<?= $i ?> = document.createElement('td');
            let tdMsgText<?= $i ?> = document.createTextNode("<?= $msg['message'] ?>");
            tdMsg<?= $i ?>.appendChild(tdMsgText<?= $i ?>);
            row<?= $i ?>.appendChild(tdMsg<?= $i ?>);

            let tdDate<?= $i ?> = document.createElement('td');
            let tdDateText<?= $i ?> = document.createTextNode("<?= $date ?>");
            tdDate<?= $i ?>.appendChild(tdDateText<?= $i ?>);
            row<?= $i ?>.appendChild(tdDate<?= $i ?>);

            table.appendChild(row<?= $i ?>);
        <?php $i++;
        } ?>
    }
</script>

</html>