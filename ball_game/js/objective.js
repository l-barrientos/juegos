// Objective class to generate ball with its properties
class Objective {
  #y;
  #x;
  #size;
  #layer;

  // Constructor to generate objective object and paint it in html
  constructor(x, y) {
    this.#x = x;
    this.#y = y;
    this.#size = 8;
    this.#layer = document.createElement("div");
    this.#layer.style.cssText =
      "position: absolute;" +
      "background-color: yellow;" +
      "border: 3px solid #28df28;" +
      "border-radius: 100%;" +
      "height: " +
      this.#size +
      "px;" +
      "width: " +
      this.#size +
      "px;" +
      "left: " +
      this.#x +
      "px;" +
      "top: " +
      this.#y +
      "px;";

    document.body.appendChild(this.#layer);

    Object.seal(this);
  }

  // X position propertie getter
  getX() {
    return this.#x;
  }

  // Y position propertie getter
  getY() {
    return this.#y;
  }

  // Function to remove an objective when it's eaten by the ball
  eaten() {
    this.#layer.remove();
    let pointsP = document.getElementById("points");
    let pointsNumber = parseInt(pointsP.innerHTML.substr(8));
    pointsNumber++;
    pointsP.innerHTML = "Puntos: " + pointsNumber;
  }

  // Function to generate objective random movement
  randomMovement() {
    let v = 8;
    let randomFactorX = Math.random() >= 0.5 ? 1 : 0;
    let randomFactorY = Math.random() >= 0.5 ? 1 : 0;

    if (this.#x > window.innerWidth - 30) {
      this.#x -= v;
      this.#y -= 0;
    } else if (this.#x <= 10) {
      this.#x = parseInt(this.#x) + v;
      this.#y -= 0;
    } else {
      switch (randomFactorX) {
        case 0:
          this.#x = parseInt(this.#x) + v;
          this.#y -= 0;
          break;
        case 1:
          this.#x -= v;
          this.#y -= 0;
          break;
      }
    }
    if (this.#y > window.innerHeight - 30) {
      this.#y -= v;
      this.#x -= 0;
    } else if (this.#y <= 10) {
      this.#y = parseInt(this.#y) + v;
      this.#x -= 0;
    } else {
      switch (randomFactorY) {
        case 0:
          this.#y = parseInt(this.#y) + v;
          this.#x -= 0;
          break;
        case 1:
          this.#y -= v;
          this.#x -= 0;
          break;
      }
    }
    this.#layer.style.top = this.#y + "px";
    this.#layer.style.left = this.#x + "px";
  }
}
