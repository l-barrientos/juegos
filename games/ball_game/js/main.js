var ball;
var speed;
var intervalMove = 0;
var intervalTime = 0;
var intervalCont = 0;
var cont = 0;
var gameStarted = false;
var gameReady = false;
var objectivesQuantity;
var timeBreak;
const validKeys = ["ArrowUp", "ArrowDown", "ArrowLeft", "ArrowRight"];

// ON LOAD
this.onload = function () {
  //Focus on play button
  document.getElementById("playButton").focus();
  // Asign function to generate obstacles on generate obstacles button
  document.getElementById("playButton").addEventListener("click", function () {
    // Get obstacles quantity and generate them
    let obstaclesQuantity = 30;
    let level = "hard";
    checkLevel(level);
    generateObstacles(obstaclesQuantity);
    generateObjectives(objectivesQuantity);

    // Get ball color and generate the ball
    color = "blue";
    ball = new Ball(color);

    // Get  ball speed and change game status
    speed = 2;
    gameReady = true;

    // Hide configuration div
    document.getElementById("config").style.visibility = "hidden";

    // Create time and points div
    let timeP = document.createElement("p");
    timeP.setAttribute("id", "time");
    let timeNode = document.createTextNode("Tiempo: 0.00");
    timeP.appendChild(timeNode);
    document.body.appendChild(timeP);

    let pointsP = document.createElement("p");
    pointsP.setAttribute("id", "points");
    let pointsNode = document.createTextNode("Puntos: 0");
    pointsP.appendChild(pointsNode);
    document.body.appendChild(pointsP);
  });

  // Execute when a key is pressed
  document.onkeydown = function (e) {
    // Check if the key pressed is a direction arrow
    if (validKeys.includes(e.key)) {
      clearInterval(intervalMove);
      intervalMove = setInterval(function () {
        // Check if the ball has collied to an obstacle or if the game is won
        if (!ball.checkCollision() && !checkWin()) {
          ball.move(e.key, speed); // Execute the ball movement
          ball.eat();
          // Check if the game has started yet, if it's first movement, it will start the time counter
          if (!gameStarted) {
            gameStarted = true;
            intervalRandMove = setInterval(function () {
              for (const [i, objective] of objectives.entries()) {
                objective.randomMovement();
              }
            }, 50);
            intervalTime = setInterval(updateTime, 10); // Update time every 0.01 seconds
            // Each (timeBreak) seconds, 10 obstacles will be generated and speed will be increased by 1.5
            intervalCont = setInterval(function () {
              generateObstacles(10);
              speed += 1.5;
            }, timeBreak * 1000);
          }
        } else {
          clearInterval(intervalMove); // Stop ball movement
          clearInterval(intervalTime); // Stop time counter
          clearInterval(intervalCont); // Stop counter to increment the difficulty
          clearInterval(intervalRandMove); // Stop objectives random movement
          ball.checkCollision() ? gameOver() : youWin(); // Execute the game over satatements
        }
      }, 10);
    }
  };
};
