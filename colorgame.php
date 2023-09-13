<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bet on Color Dice Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
            max-width: 800px;
        }

        h1 {
            color: #333;
        }

        .game-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            position: relative;
        }

        .dice {
            width: 100px;
            height: 100px;
            background-color: red; /* Initial color */
            border: 2px solid #333;
            margin: 10px;
            position: absolute;
            left: 0;
            transition: left 1s ease-in-out; /* Animation for dice movement */
        }

        .dice:nth-child(2) {
            left: 110px; /* Separation between dice */
        }

        #color-boxes {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            width: 300px;
        }

        .color-box {
            width: 80px;
            height: 80px;
            border: 2px solid #333;
            margin: 10px;
        }

        .red { background-color: red; }
        .white { background-color: white; }
        .blue { background-color: blue; }
        .yellow { background-color: yellow; }
        .green { background-color: green; }
        .pink { background-color: pink; }

        #result {
            font-weight: bold;
            color: #333;
        }

        #start-button, #place-bet {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px;
        }

        #bet-color {
            font-size: 16px;
            padding: 5px;
        }

        #bet-status {
            font-weight: bold;
            margin-top: 10px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bet on Color Dice Game</h1>
        <div class="game-area">
            <div class="dice" id="dice1"></div>
            <div class="dice" id="dice2"></div>
            <div class="color-boxes" id="color-boxes">
                <div class="color-box red"></div>
                <div class="color-box white"></div>
                <div class="color-box blue"></div>
                <div class="color-box yellow"></div>
                <div class="color-box green"></div>
                <div class="color-box pink"></div>
            </div>
            <p id="result"></p>
            <button id="start-button">Roll Dice</button>
            <p>Place your bet on one of the colors:</p>
            <select id="bet-color">
                <option value="red">Red</option>
                <option value="yellow">Yellow</option>
                <option value="green">Green</option>
                <option value="blue">Blue</option>
                <option value="white">White</option>
                <option value="pink">Pink</option>
            </select>
            <select id="bet-color">
                <option value="red">Red</option>
                <option value="yellow">Yellow</option>
                <option value="green">Green</option>
                <option value="blue">Blue</option>
                <option value="white">White</option>
                <option value="pink">Pink</option>
            </select>
            <button id="place-bet">Place Bet</button>
            <p id="bet-status"></p>
        </div>
    </div>
    <script>
const dice1 = document.getElementById('dice1');
const dice2 = document.getElementById('dice2');
const resultMessage = document.getElementById('result');
const startButton = document.getElementById('start-button');
const betButton = document.getElementById('place-bet');
const betStatus = document.getElementById('bet-status');
const betColorSelect = document.getElementById('bet-color');
const colorBoxes = document.querySelectorAll('.color-box');
const colorBoxContainer = document.getElementById('color-boxes');

let gameStarted = false;
let dice1Color = '';
let dice2Color = '';
let diceMovementCompleted = false;

function getRandomColor() {
    const colors = ['red', 'yellow', 'green', 'blue', 'white', 'pink'];
    const randomIndex = Math.floor(Math.random() * colors.length);
    return colors[randomIndex];
}

function rollDice() {
    if (!gameStarted) {
        return;
    }

    dice1Color = getRandomColor();
    dice2Color = getRandomColor();

    dice1.style.backgroundColor = dice1Color;
    dice2.style.backgroundColor = dice2Color;

    moveDice();
}

function moveDice() {
    if (diceMovementCompleted) {
        determineResult();
        return;
    }

    // Randomly select a color box index
    const randomBoxIndex = Math.floor(Math.random() * colorBoxes.length);
    const selectedBox = colorBoxes[randomBoxIndex];

    // Calculate the position of the selected box
    const selectedBoxRect = selectedBox.getBoundingClientRect();
    const colorBoxContainerRect = colorBoxContainer.getBoundingClientRect();

    // Move dice1 to the selected box position
    dice1.style.transition = 'all 1s ease-in-out'; // Faster animation for dice movement
    dice1.style.left = `${selectedBoxRect.left - colorBoxContainerRect.left - 60}px`; // Adjust left position for dice1
    dice1.style.top = `${selectedBoxRect.top - colorBoxContainerRect.top}px`;

    // Move dice2 below dice1 within the selected box
    dice2.style.transition = 'all 1s ease-in-out'; // Faster animation for dice movement
    dice2.style.left = `${selectedBoxRect.left - colorBoxContainerRect.left - 60}px`;
    dice2.style.top = `${selectedBoxRect.top - colorBoxContainerRect.top + 100}px`; // Adjust top position for dice2

    setTimeout(() => {
        diceMovementCompleted = true;
        rollDice();
    }, 1500); // Delay for 0.1 seconds before moving to a selected box
}



function determineResult() {
    if (!dice1Color || !dice2Color) {
        resultMessage.textContent = 'Game is not started yet.';
        return;
    }

    const betColor = betColorSelect.value;

    if (betColor === dice1Color && betColor === dice2Color) {
        resultMessage.textContent = 'You win!';
        betStatus.textContent = `Both dice landed on ${betColor}.`;
    } else {
        resultMessage.textContent = 'You lose!';
        betStatus.textContent = `Dice 1 landed on ${dice1Color} and Dice 2 landed on ${dice2Color}.`;
    }

    startButton.disabled = false;
    betButton.disabled = true;
    gameStarted = false;
    diceMovementCompleted = false;
    dice1Color = '';
    dice2Color = '';
}

startButton.addEventListener('click', () => {
    gameStarted = true;
    startButton.disabled = true;
    betButton.disabled = false;
    resultMessage.textContent = '';
    rollDice();
});

betButton.addEventListener('click', () => {
    determineResult();
});

// Initial setup
dice1.style.backgroundColor = 'red';
dice2.style.backgroundColor = 'red';

    </script>
</body>
</html>
