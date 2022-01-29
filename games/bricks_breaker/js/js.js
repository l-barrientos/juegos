var bricks = new Map();
var n_row = 6;
var n_col = 8;
var stick;
var ball;
var started = false;
var movement;
var timeInterval;
var finished;

var xpos = [];
var difx = 140;
if (window.innerWidth >= 1800) {
  inix = window.innerWidth / 5;
} else {
  inix = window.innerWidth / 13;
}
for (let i = 0; i < 8; i++) {
  xpos[i] = inix + difx * i;
}

var ypos = [];
for (let i = 0; i < 8; i++) {
  ypos[i] = 15 + 65 * i;
}

this.onload = function () {
  document.getElementById("stats").style.visibility = "hidden";
  document.getElementById("start").addEventListener("click", function () {
    start();
    started = true;
  });

  timeInterval = setInterval(() => {
    if (started) {
      updateTime();
    }
  }, 10);

  movement = setInterval(() => {
    if (started) {
      ball.move();
      ball.checkWindowCollision();
      ball.checkStickCollision();
      ball.checkBrickCollision();
      ball.gameOver();

      if (bricks.size == 0) {
        drawBrick();
      }
    }
  }, 5);
};

function start() {
  document.getElementById("menu").remove();
  document.getElementById("stats").style.visibility = "visible";
  drawBrick();

  ball = new Ball();
  stick = new Stick();

  document.addEventListener(
    "mousemove",
    function (event) {
      event.preventDefault();
      stick.mousemove(event.clientX);
    },
    true,
  );
  document.querySelector("*").style = "cursor:none;";
}

function drawBrick() {
  var div;
  let brick;
  let i = 0;
  for (let f = 0; f < n_row; f++) {
    div = document.createElement("div");
    for (let c = 0; c < n_col; c++) {
      brick = new Brick(xpos[c], ypos[f]);
      bricks.set(i, brick);
      i++;
      div.appendChild(brick.layer);
    }
    document.body.appendChild(div);
  }
}

function updateTime() {
  let timeDiv = document.getElementById("time");
  let time = parseFloat(timeDiv.innerHTML.substring(8));
  time += 0.01;
  timeDiv.innerHTML = "Tiempo: " + time.toFixed(2);
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
  let score = parseInt(document.getElementById("score").innerHTML.substring(8));
  let time = parseFloat(
    document.getElementById("time").innerHTML.substring(8),
  ).toFixed(2);

  window.location =
    "../../controllers/save_score_controller.php?score=" +
    score +
    "&time=" +
    time +
    "&game=bricks_breaker";
}
