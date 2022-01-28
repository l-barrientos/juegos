class Brick {
  constructor(x, y) {
    this.x = x;
    this.y = y;
    this.layer = document.createElement("img");
    this.layer.src = "./img/brick.png";
    this.layer.style.cssText =
      "top:" +
      this.y +
      "px;" +
      "left: " +
      this.x +
      "px;" +
      "height: 40px;" +
      "width: 120px;" +
      "position: absolute;";
    this.xSquare = this.layer.style.width + parseInt("5") + "px";
    this.ySquare = this.layer.style.height + parseInt("5") + "px";
  }
}

class Stick {
  constructor() {
    this.x = window.innerWidth / 2;
    this.layer = document.createElement("img");
    this.layer.src = "./img/stick.png";
    this.layer.style.cssText =
      "top: 90%;" +
      "left: " +
      this.x +
      "px;" +
      "height: 25px;" +
      "width: 150px;" +
      "position: absolute;";

    document.body.appendChild(this.layer);
  }

  mousemove(x) {
    if (x + 180 <= window.innerWidth) {
      this.x = x - 100;
      this.layer.style.left = x + "px";
    }
  }
}

class Ball {
  constructor() {
    this.y = 600;
    this.x = Math.random() * window.innerWidth - 35;
    this.vx = Math.random() * 10 >= 5 ? 2 : -2;
    this.vy = -2;
    this.layer = document.createElement("div");
    this.layer.style.cssText =
      "position:absolute;" +
      "z-index:1;" +
      "background-color: rgb(15, 240, 15); " +
      ";height: 33px;" +
      "width: 33px;" +
      "border-radius: 100%;" +
      "top: " +
      this.y +
      "px;" +
      "left:" +
      this.x +
      "px;";
    document.body.appendChild(this.layer);
  }

  move() {
    this.x = this.x + parseInt(this.vx);
    this.layer.style.left = this.x + "px";

    this.y = this.y + parseInt(this.vy);
    this.layer.style.top = this.y + "px";
  }

  checkStickCollision() {
    if (
      this.x >= stick.layer.offsetLeft &&
      this.x + this.layer.offsetWidth <=
        stick.layer.offsetLeft + stick.layer.offsetWidth &&
      this.y + this.layer.offsetHeight >= stick.layer.offsetTop
    ) {
      this.vy = -this.vy;
    }
  }

  checkWindowCollision() {
    if (
      this.x + this.layer.offsetWidth >= window.innerWidth - 15 ||
      this.x <= 0
    ) {
      this.vx = -this.vx;
    }

    if (this.y <= 0) {
      this.vy = -this.vy;
    }
  }

  checkBrickCollision() {
    let collied = false;
    for (let [i, brick] of bricks.entries()) {
      collied =
        brick.x < this.x + this.layer.offsetWidth &&
        brick.x + brick.layer.offsetWidth > this.x &&
        brick.y < this.y + this.layer.offsetHeight &&
        brick.layer.offsetHeight + brick.y > this.y;

      if (collied) {
        if (
          this.y + this.layer.offsetHeight >
          brick.y + brick.layer.offsetHeight
        ) {
          this.vy = -this.vy;
        }

        if (this.y < brick.y) {
          this.vy = -this.vy;
        }

        if (
          this.x + this.layer.offsetWidth >
          brick.x + brick.layer.offsetWidth
        ) {
          this.vx = -this.vx;
        }

        if (this.x < brick.x) {
          this.vx = -this.vx;
        }

        brick.layer.remove();
        bricks.delete(i);

        let scoreP = document.getElementById("score");
        let scoreNumber = parseInt(scoreP.innerHTML.substring(8));
        scoreNumber++;
        scoreP.innerHTML = "Puntos: " + scoreNumber;

        if (bricks.size % 8 == 0) {
          this.vx > 0 ? (this.vx += 0.5) : (this.vx -= 0.5);
          this.vy > 0 ? (this.vy += 0.5) : (this.vy -= 0.5);
        }
      }
    }
  }

  gameOver() {
    if (this.y >= window.innerHeight - 35) {
      clearInterval(movement);
      clearInterval(timeInterval);

      let gameOverDiv = document.createElement("div");
      gameOverDiv.setAttribute("id", "gameOverDiv");
      gameOverDiv.setAttribute("class", "finish");
      let gameOverP1 = document.createElement("p");
      let gameOverNode1 = document.createTextNode("GAME OVER");
      gameOverP1.appendChild(gameOverNode1);

      let time = document.getElementById("time").innerHTML.substring(8);
      let gameOverP2 = document.createElement("p");
      let gameOverNode2 = document.createTextNode(
        "Has durado " + time + " segundos"
      );
      gameOverP2.appendChild(gameOverNode2);

      let score = document.getElementById("score").innerHTML.substring(8);
      let gameOverP3 = document.createElement("p");
      let gameOverNode3 = document.createTextNode("Puntuación: " + score);
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

      document.body.style.cssText =
        "padding-bottom:45%; padding-top:18%; cursor:auto;";
    }
  }
}
