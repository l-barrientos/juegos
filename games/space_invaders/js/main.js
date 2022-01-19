const dirKeys = ["ArrowLeft", "ArrowRight"];
let moveInterval = 0;
let shootInterval = 0;
let respawnTime = 3000;
var invadersV = 1;
var amo = 5;
this.onload = () => {
  document.getElementById("playButton").focus();
  document.getElementById("playButton").addEventListener("click", startGame);
};

function startGame() {
  playButton.remove();
  setInterval(async () => {
    if (amo == 0) {
      await sleep(500);
      amo = 5;
    }
  }, 5);
  let ship = new Ship(parseInt(window.innerWidth / 2 - 70));
  setInterval(() => {
    ship.checkKilled();
  }, 5);
  generateInvaders(1, window.innerWidth / 2, invadersV);
  setInterval(() => {
    updateTime();
  }, 10);
  let aux = 0;

  setInterval(() => {
    let x;
    do {
      x = parseInt(Math.random() * (window.innerWidth - 200));
    } while (x <= 200);

    if (parseInt(invadersCount / 100) != aux) {
      invadersV += 0.25;
      respawnTime -= 400;
      aux = parseInt(invadersCount / 100);
    }
    if (invadersCount <= 10) {
      generateInvaders(1, x, invadersV);
    } else if (invadersCount <= 100) {
      generateInvaders(2, x, invadersV);
    } else {
      generateInvaders(3, x, invadersV);
    }
  }, respawnTime);
  document.onkeydown = (e) => {
    if (!finished) {
      if (dirKeys.includes(e.key)) {
        clearInterval(moveInterval);
        moveInterval = setInterval(() => {
          ship.move(e.key, 5);
        }, 10);
      } else if (e.key == " ") {
        clearInterval(shootInterval);
        shootInterval = setInterval(() => {
          if (amo != 0) {
            ship.shoot();
            amo--;
          }
        }, 150);
      }
    }
  };
  document.onkeyup = (e) => {
    if (dirKeys.includes(e.key)) {
      clearInterval(moveInterval);
    } else if (e.key == " ") {
      clearInterval(shootInterval);
    }
  };
}
