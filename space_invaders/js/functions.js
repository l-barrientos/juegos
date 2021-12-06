var invaders = new Map();
var invadersCount = 0;
var finished = false;
function sleep(ms) {
  return new Promise((resolve) => setTimeout(resolve, ms));
}

const generateInvaders = async (op, x, v) => {
  let invaderiIndex = invadersCount;

  switch (op) {
    case 1:
      let invader1 = new Invader(x, invaderiIndex);
      invaders.set(invaderiIndex, invader1);
      invader1.move(v);
      await sleep(100);
      let invader2 = new Invader(x - 50, invaderiIndex + 1);
      let invader3 = new Invader(x + 50, invaderiIndex + 2);
      invaders.set(invaderiIndex + 1, invader2);
      invaders.set(invaderiIndex + 2, invader3);
      invader2.move(v);
      invader3.move(v);
      invadersCount += 3;
      break;
    case 2:
      generateInvaders(1, x, v);
      await sleep(250);
      let invader4 = new Invader(x - 75, invaderiIndex + 3);
      let invader5 = new Invader(x, invaderiIndex + 4);
      let invader6 = new Invader(x + 75, invaderiIndex + 5);
      invaders.set(invaderiIndex + 3, invader4);
      invaders.set(invaderiIndex + 4, invader5);
      invaders.set(invaderiIndex + 5, invader6);
      invader4.move(v);
      invader5.move(v);
      invader6.move(v);
      invadersCount += 6;
      break;
    case 3:
      generateInvaders(2, x, v);
      await sleep(400);
      let invader7 = new Invader(x - 115, invaderiIndex + 6);
      let invader8 = new Invader(x - 40, invaderiIndex + 7);
      let invader9 = new Invader(x + 40, invaderiIndex + 8);
      let invader10 = new Invader(x + 115, invaderiIndex + 9);
      invaders.set(invaderiIndex + 6, invader7);
      invaders.set(invaderiIndex + 7, invader8);
      invaders.set(invaderiIndex + 8, invader9);
      invaders.set(invaderiIndex + 9, invader10);
      invader7.move(v);
      invader8.move(v);
      invader9.move(v);
      invader10.move(v);
      invadersCount += 6;
      break;
  }
};

function updateTime() {
  let timeDiv = document.getElementById("time");
  let time = parseFloat(timeDiv.innerHTML.substr(8));
  time += 0.01;
  timeDiv.innerHTML = "Tiempo: " + time.toFixed(2);
}

function gameOver() {
  let gameOverDiv = document.createElement("div");
  gameOverDiv.setAttribute("id", "gameOverDiv");
  gameOverDiv.setAttribute("class", "finish");
  let gameOverP1 = document.createElement("p");
  let gameOverNode1 = document.createTextNode("GAME OVER");
  gameOverP1.appendChild(gameOverNode1);

  let time = document.getElementById("time").innerHTML.substr(8);
  let gameOverP2 = document.createElement("p");
  let gameOverNode2 = document.createTextNode(
    "Has durado " + time + " segundos",
  );
  gameOverP2.appendChild(gameOverNode2);

  let score = document.getElementById("score").innerHTML.substr(8);
  let gameOverP3 = document.createElement("p");
  let gameOverNode3 = document.createTextNode("Puntuación: " + score);
  gameOverP3.appendChild(gameOverNode3);

  let reloadButton = document.createElement("button");
  let relaodButtonNode = document.createTextNode("VOLVER A JUGAR");
  reloadButton.appendChild(relaodButtonNode);
  reloadButton.addEventListener("click", () => {
    location.reload();
  });

  gameOverDiv.appendChild(gameOverP1);
  gameOverDiv.appendChild(gameOverP2);
  gameOverDiv.appendChild(gameOverP3);
  gameOverDiv.appendChild(reloadButton);
  document.body.appendChild(gameOverDiv);

  for (let i = 0; i < 9999; i++) {
    clearInterval(i);
  }
  finished = true;
  saveScore();
}

function getCookie(cName) {
  const name = cName + "=";
  const cDecoded = decodeURIComponent(document.cookie); //to be careful
  const cArr = cDecoded.split("; ");
  let res;
  cArr.forEach((val) => {
    if (val.indexOf(name) === 0) res = val.substring(name.length);
  });
  return res;
}
function saveScore() {
  let userName = getCookie("user").userName;
  let score = parseInt(document.getElementById("score").innerHTML.substr(8));
  let time = parseFloat(
    document.getElementById("time").innerHTML.substr(8),
  ).toFixed(2);

  let userObj = {
    userName: userName,
    score: score,
    time: time,
  };

  jsonScore = JSON.stringify(userObj);
  var blob = new Blob([jsonScore], {
    type: "text/plain;charset=utf-8",
  });

  saveAs(blob, "scores.json");
}
