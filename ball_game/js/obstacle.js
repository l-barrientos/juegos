// Obstacle class to generate ball with its properties
class Obstacle {
  #y;
  #x;
  #size;
  #layer;

  // Constructor to generate obstacle object and paint it in html
  constructor(x, y) {
    this.#x = x;
    this.#y = y;
    this.#size = 8;
    this.#layer = document.createElement("div");
    this.#layer.style.cssText =
      "position: absolute;" +
      "background-color: red;" +
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
    Object.freeze(this);
  }

  // X position propertie getter
  getX() {
    return this.#x;
  }

  // Y position propertie getter
  getY() {
    return this.#y;
  }
}
