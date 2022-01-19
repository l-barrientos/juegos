var missiles = new Map();
var missilesCount = 0;
class Ship {
  constructor(initialX) {
    this.x = initialX;
    this.layer = document.createElement("img");
    this.layer.src = "./img/ship.png";
    this.layer.style.position = "absolute";
    this.layer.style.left = this.x + "px";
    this.layer.style.top = "80%";
    this.layer.style.width = "10%";
    document.body.appendChild(this.layer);
  }

  move(key, v) {
    switch (key) {
      case "ArrowRight":
        if (this.x + this.layer.offsetWidth < window.innerWidth-20) {
          this.x = parseInt(this.x) + parseInt(v);
        }
        break;
      case "ArrowLeft":
        if (this.x > 0) {
          this.x -= v;
        }
        break;
    }

    this.layer.style.left = this.x + "px";
  }

  shoot() {
    let index = missilesCount;
    let missile = document.createElement("img");
    missile.style.position = "absolute";
    missile.style.width = "1%";
    missile.style.height = "8%";
    missile.src = "./img/missile.png";
    missile.id = index;
    if (missilesCount % 2 == 0) {
      missile.style.left =
        parseInt(this.x + this.layer.offsetWidth / 2 + 10) + "px";
    } else {
      missile.style.left =
        parseInt(this.x + this.layer.offsetWidth / 2 - 30) + "px";
    }
    missile.style.top = this.layer.style.top;
    document.body.appendChild(missile);
    missiles.set(index, missile);
    missilesCount++;
    let shot = setInterval(() => {
      let top = missile.offsetTop;
      top -= 2;
      missile.style.top = top + "px";

      if (missile.offsetTop + missile.offsetHeight <= 0) {
        missiles.delete(index);
        missile.remove();
        clearInterval(shot);
      }
    }, 5);
  }
  killed() {
    this.layer.src = "img/dead_ship.png";
    gameOver();
  }
  checkKilled() {
    invaders.forEach((invader) => {
      if (
        invader.layer.offsetLeft >= this.layer.offsetLeft &&
        invader.layer.offsetLeft <=
          this.layer.offsetLeft + this.layer.offsetWidth &&
        invader.layer.offsetTop <=
          this.layer.offsetTop + this.layer.offsetHeight &&
        invader.layer.offsetTop >= this.layer.offsetTop
      ) {
        this.killed();
      }
    });
  }
}
