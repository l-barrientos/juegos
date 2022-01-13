// Ball class to generate ball with its properties
class Ball {
  #y;
  #x;
  #color;
  #layer;
  #size;

  // Constructor to generate ball object and paint it in html
  constructor(color) {
    this.#y = (window.innerHeight / 4).toFixed();
    this.#x = (window.innerWidth / 2).toFixed();
    this.#color = color;
    this.#size = 30;
    this.#layer = document.createElement("div");
    this.#layer.style.cssText =
      "position:absolute;" +
      "z-index:1;" +
      "background-color:" +
      this.#color +
      ";height: " +
      this.#size +
      "px;" +
      "width:" +
      this.#size +
      "px;" +
      "border-radius: 100%;" +
      "top: " +
      this.#y +
      "px;" +
      "left:" +
      this.#x +
      "px;";
    document.body.appendChild(this.#layer);

    Object.seal(this);
  }

  // Method to move the ball
  move(key, v) {
    switch (key) {
      case "ArrowRight":
        this.#x = parseInt(this.#x) + parseInt(v);
        this.#y -= 0;
        break;
      case "ArrowLeft":
        this.#x -= v;
        this.#y -= 0;
        break;
      case "ArrowUp":
        this.#y -= v;
        this.#x -= 0;
        break;
      case "ArrowDown":
        this.#y = parseInt(this.#y) + parseInt(v);
        this.#x -= 0;
        break;
    }

    // Update ball position
    this.#layer.style.top = this.#y + "px";
    this.#layer.style.left = this.#x + "px";
  }

  // Method to check if the ball has collied to an obstacle
  checkCollision() {
    if (
      this.#x < 0 ||
      this.#x > window.innerWidth - this.#size ||
      this.#y < 0 ||
      this.#y > window.innerHeight - this.#size
    ) {
      return true;
    } else {
      for (let obstacle in obstacles) {
        let xobstacle = obstacles[obstacle].getX();
        let yobstacle = obstacles[obstacle].getY();
        if (
          xobstacle >= this.#x &&
          xobstacle <= this.#x + this.#size &&
          yobstacle >= this.#y &&
          yobstacle <= this.#y + this.#size
        ) {
          return true;
        }
      }
    }
    return false;
  }

  // Method to eat objectives
  eat() {
    for (let [i, objective] of objectives.entries()) {
      if (
        objective.getX() >= this.#x &&
        objective.getX() <= this.#x + this.#size &&
        objective.getY() >= this.#y &&
        objective.getY() <= this.#y + this.#size
      ) {
        objective.eaten();
        objectives.delete(i);
      }
    }
  }
}
