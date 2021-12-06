class Invader {
  constructor(x, id) {
    this.y = 10;
    this.x = x;
    this.layer = document.createElement("img");
    this.layer.id = id;
    let randomColor = parseInt(Math.random() * 3);
    let color;
    if (randomColor == 1) {
      color = "green";
    } else if (randomColor == 2) {
      color = "red";
    } else {
      color = "blue";
    }
    this.layer.src = "./img/invaders.png";
    this.layer.style.position = "absolute";
    this.layer.style.left = this.x + "px";
    this.layer.style.top = this.y + "px";
    this.layer.style.width = "3%";
    this.layer.style.filter = "drop-shadow(10px 10px 10px " + color + ")";
    document.body.appendChild(this.layer);
  }

  move(v) {
    let movement = setInterval(() => {
      this.y += v;
      this.layer.style.top = this.y + "px";
      if (this.y + this.layer.offsetHeight >= window.innerHeight) {
        invaders.delete(parseInt(this.layer.id));
        this.layer.remove();
        clearInterval(movement);
      }
      this.checkKilled(movement);
    }, 5);
  }
  checkKilled(interval) {
    missiles.forEach((missile, missileIndex) => {
      if (
        missile.offsetLeft >= this.layer.offsetLeft &&
        missile.offsetLeft <= this.layer.offsetLeft + this.layer.offsetWidth &&
        missile.offsetTop <= this.layer.offsetTop + this.layer.offsetHeight &&
        missile.offsetTop >= this.layer.offsetTop
      ) {
        missile.remove();
        clearInterval(interval);
        this.killed();
        invaders.delete(parseInt(this.layer.id));
        missiles.delete(missileIndex);
      }
    });
  }

  async killed() {
    this.layer.src = "img/dead_invaders.png";
    let scoreP = document.getElementById("score");
    let scoreNumber = parseInt(scoreP.innerHTML.substr(8));
    scoreNumber++;
    scoreP.innerHTML = "Puntos: " + scoreNumber;
    await sleep(800);
    this.layer.remove();
  }
}
