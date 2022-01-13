var obstacles = []; // Array to save obstacles
var objectives = new Map(); // Map to save objectives
// Function to generate obstacles
function generateObstacles(maxObstacles) {
  for (let i = 0; i < maxObstacles; i++) {
    let x = (Math.random() * (window.innerWidth - 20)).toFixed();
    let y = (Math.random() * (window.innerHeight - 20)).toFixed();
    let obstacle = new Obstacle(x, y);
    obstacles.push(obstacle);
  }
}

function sleep(ms) {
  return new Promise((resolve) => setTimeout(resolve, ms));
}

// Function to generate objectives
function generateObjectives(maxObjectives) {
  for (let i = 0; i < maxObjectives; i++) {
    let x = (Math.random() * (window.innerWidth - 20)).toFixed();
    let y = (Math.random() * (window.innerHeight - 20)).toFixed();
    let objective = new Objective(x, y);
    objectives.set(i, objective);
  }
}

// Function to update time div
function updateTime() {
  let timeDiv = document.getElementById("time");
  let time = parseFloat(timeDiv.innerHTML.substr(8));
  time += 0.01;
  timeDiv.innerHTML = "Tiempo: " + time.toFixed(2);
}

// Function to check if the game is won
function checkWin() {
  if (objectives.size == 0) {
    return true;
  }
  return false;
}

// Function to generate you win div
function youWin() {
  document.body.style.backgroundColor = "black";
  document.getElementById("time").style.color = "white";
  document.getElementById("points").style.color = "white";

  let youWinDiv = document.createElement("div");
  youWinDiv.setAttribute("id", "youWinDiv");
  youWinDiv.setAttribute("class", "finish");
  let youWinP1 = document.createElement("p");
  let youWinNode1 = document.createTextNode("HAS GANADO");
  youWinP1.appendChild(youWinNode1);

  let time = document.getElementById("time").innerHTML.substr(8);
  let youWinP2 = document.createElement("p");
  let youWinNode2 = document.createTextNode(
    "Has ganado en " + time + " segundos",
  );
  youWinP2.appendChild(youWinNode2);

  let points = document.getElementById("points").innerHTML.substr(8);
  let youWinP3 = document.createElement("p");
  let youWinNode3 = document.createTextNode("Puntuación: " + points);
  youWinP3.appendChild(youWinNode3);

  let reloadButton = document.createElement("button");
  let relaodButtonNode = document.createTextNode("VOLVER A JUGAR");
  reloadButton.appendChild(relaodButtonNode);
  reloadButton.addEventListener("click", () => {
    location.reload();
  });

  let saveButton = document.createElement("button");
  let saveButtonNode = document.createTextNode("GUARDAR PUNTUACIÓN");
  saveButton.appendChild(saveButtonNode);
  saveButton.addEventListener("click", () => {
    saveScore();
  });
  youWinDiv.appendChild(youWinP1);
  youWinDiv.appendChild(youWinP2);
  youWinDiv.appendChild(youWinP3);
  youWinDiv.appendChild(reloadButton);
  youWinDiv.appendChild(saveButton);
  document.body.appendChild(youWinDiv);
}

// Function to generate game over div
async function gameOver() {
  document.body.style.backgroundColor = "black";
  document.getElementById("time").style.color = "white";
  document.getElementById("points").style.color = "white";

  let gameOverDiv = document.createElement("div");
  gameOverDiv.setAttribute("id", "gameOverDiv");
  gameOverDiv.setAttribute("class", "finish");
  let gameOverP1 = document.createElement("p");
  let gameOverNode1 = document.createTextNode("GAME OVER");
  gameOverP1.appendChild(gameOverNode1);

  let time = document.getElementById("time").innerHTML.substring(8);
  let gameOverP2 = document.createElement("p");
  let gameOverNode2 = document.createTextNode(
    "Has durado " + time + " segundos",
  );
  gameOverP2.appendChild(gameOverNode2);

  let points = document.getElementById("points").innerHTML.substring(8);
  let gameOverP3 = document.createElement("p");
  let gameOverNode3 = document.createTextNode("Puntuación: " + points);
  gameOverP3.appendChild(gameOverNode3);

  let reloadButton = document.createElement("button");
  let relaodButtonNode = document.createTextNode("VOLVER A JUGAR");
  reloadButton.appendChild(relaodButtonNode);
  reloadButton.addEventListener("click", () => {
    location.reload();
  });
  let saveButton = document.createElement("button");
  let saveButtonNode = document.createTextNode("GUARDAR PUNTUACIÓN");
  saveButton.appendChild(saveButtonNode);
  saveButton.addEventListener("click", () => {
    saveScore();
  });

  gameOverDiv.appendChild(gameOverP1);
  gameOverDiv.appendChild(gameOverP2);
  gameOverDiv.appendChild(gameOverP3);
  gameOverDiv.appendChild(reloadButton);
  gameOverDiv.appendChild(saveButton);
  document.body.appendChild(gameOverDiv);
}

// Function to check the level chosen by the user
function checkLevel(level) {
  switch (level) {
    case "easy":
      objectivesQuantity = 10;
      timeBreak = 10;
      break;
    case "normal":
      objectivesQuantity = 15;
      timeBreak = 10;
      break;
    case "hard":
      objectivesQuantity = 20;
      timeBreak = 10;
      break;
    case "nightmare":
      objectivesQuantity = 20;
      timeBreak = 5;
      break;
  }
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
  let userName = JSON.parse(getCookie("user")).userName;
  let score = parseInt(
    document.getElementById("points").innerHTML.substring(8),
  );
  let time = parseFloat(
    document.getElementById("time").innerHTML.substring(8),
  ).toFixed(2);

  window.location =
    "../save_score.php?userName=" +
    userName +
    "&score=" +
    score +
    "&time=" +
    time +
    "&game=ball_game";
}
