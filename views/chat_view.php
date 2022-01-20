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
        let row = '';
        let imgTd = '';
        let img = '';
        let tdName = '';
        let tdNameText = '';
        let tdMsg = '';
        let tdMsgText = '';
        let tdDate = '';
        let tdDateText = '';
        <?php
        $messages_array = $conn->getMessages();


        foreach ($messages_array as $msg) {
            $date = date('H:i', strtotime($msg['date']));

        ?>

            row = document.createElement('tr');

            imgTd = document.createElement('td');
            imgTd.style = "width:7%;";
            img = document.createElement('img');
            img.src = "../<?= $msg['profile_image'] ?>";
            img.style = "width:75%;height:6%;border-radius:100%;";
            imgTd.appendChild(img);
            row.appendChild(imgTd);

            tdName = document.createElement('td');
            tdNameText = document.createTextNode("<?= $msg['user_name'] ?>");
            tdName.appendChild(tdNameText);
            row.appendChild(tdName);

            tdMsg = document.createElement('td');
            tdMsgText = document.createTextNode("<?= $msg['message'] ?>");
            tdMsg.appendChild(tdMsgText);
            row.appendChild(tdMsg);

            tdDate = document.createElement('td');
            tdDateText = document.createTextNode("<?= $date ?>");
            tdDate.appendChild(tdDateText);
            row.appendChild(tdDate);

            table.appendChild(row);
        <?php
        } ?>
    }
</script>

</html>