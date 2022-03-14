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
    <br>
    <img id="prof_img" style="margin-left:2%;m;width:8%;height:13%;border-radius:100%;" src="../<?= $current_user["profile_image"]; ?>">
    <div style='margin-left:10%;margin-right:10%;'>
        <h2 id="h2">Chat - <?= $current_user['user_name'] ?></h2>
        <div id='chat' style="overflow-y: scroll; height:600px;">
            <table class="table" id="chatTable">

            </table>
        </div>

        <form id="form" onsubmit="submitMsg()">
            <div class="input-group mb-3">
                <input id="message_text" type="text" class="form-control" name="message_text" placeholder="Escribir mensaje">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" name="submit_message" type="submit">Enviar</button>
                </div>
            </div>
        </form>

        <br>
        <a href="../controllers/menu_controller.php"><button class="btn btn-primary">Menú Principal</button></a><br>
        <br>

    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/8.2.8/firebase.js"></script>
<script>
    function scrollChat() {

        document.getElementById('chat').scrollTop = document.getElementById('chat').scrollHeight;
    }
    document.getElementById('message_text').focus();

    var firebaseConfig = {
        apiKey: "AIzaSyDi3O6dTbt4mPUb-wG3dpGGVPkF9ajV8u8",
        authDomain: "first-test-7a493.firebaseapp.com",
        databaseURL: "https://first-test-7a493-default-rtdb.europe-west1.firebasedatabase.app",
        projectId: "first-test-7a493",
        storageBucket: "first-test-7a493.appspot.com",
        messagingSenderId: "37287393443",
        appId: "1:37287393443:web:e545e56834392bdff66716",
        measurementId: "G-BPRBQXKWM4",
    };

    firebase.initializeApp(firebaseConfig);

    function submitMsg() {
        event.preventDefault();
        let chat = firebase.database().ref("chat");
        let name = document.getElementById("h2").innerHTML.substring(7);
        let text = document.getElementById("message_text").value;
        let d = new Date();
        let date =
            String(d.getHours()).padStart(2, "0") +
            ":" +
            String(d.getMinutes()).padStart(2, "0") + " " +
            d.getDate() +
            "/" +
            (d.getMonth() + 1) +
            "/" +
            d.getFullYear();
        let imgSrc = document.getElementById("prof_img").src;
        let img = imgSrc.substring(imgSrc.indexOf('prof'));
        let msg = {
            name: name,
            msg: text,
            date: date,
            img: img
        }

        chat.push(msg);
        document.getElementById("form").reset();
    }

    function getAll() {
        let chat = firebase.database().ref("chat");
        chat.once("value", (snapshot) => {
            snapshot.forEach((e) => {
                let element = e.val();
                let tr = document.createElement('tr');
                tr.innerHTML = " <td style='width:7%;'> <img style='width:75%;height:6%;border-radius:100%;' src='../" + element.img + "' /></td><td><b>" + element.name + " </b></td><td>" + element.msg + "</td><td>" + element.date + "</td>";
                document.getElementById('chatTable').appendChild(tr);
            });
            scrollChat();
        });
    }

    function updateChat() {
        let lastRef = firebase.database().ref("chat").limitToLast(1);

        lastRef.on("value", (snapshot) => {
            snapshot.forEach((e) => {
                let element = e.val();
                let tr = document.createElement('tr');
                tr.innerHTML = " <td style='width:7%;'> <img style='width:75%;height:6%;border-radius:100%;' src='../" + element.img + "' /></td><td><b>" + element.name + " </b></td><td>" + element.msg + "</td><td>" + element.date + "</td>";
                document.getElementById('chatTable').appendChild(tr);
                scrollChat();
            });
        });
    }
    this.onload = () => {
        getAll();

        updateChat();
    }
</script>