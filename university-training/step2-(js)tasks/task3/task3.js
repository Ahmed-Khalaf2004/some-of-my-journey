let randomNumber = Math.floor(Math.random() * 10) + 1;

//styling
document.body.style.display = 'flex';
document.body.style.flexDirection = 'column';
document.body.style.alignItems = 'flex-start';
document.body.style.gap = '12px';
document.body.style.padding = '20px';
document.body.style.fontFamily = 'sans-serif';

const title = document.createElement('h2');
title.textContent = 'Guess a Number (1 - 10)';

const input = document.createElement('input');
input.type = 'number';
input.placeholder = 'guess...';
input.style.padding = '8px';
input.style.fontSize = '16px';

const guessButton = document.createElement('button');
guessButton.textContent = 'Guess';
guessButton.style.padding = '8px 16px';
guessButton.style.fontSize = '16px';
guessButton.style.cursor = 'pointer';

const message = document.createElement('p');
message.style.fontSize = '18px';
message.style.fontWeight = 'bold';

const resetButton = document.createElement('button');
resetButton.textContent = 'Play Again';
resetButton.style.padding = '8px 16px';
resetButton.style.fontSize = '16px';
resetButton.style.cursor = 'pointer';
resetButton.style.display = 'none';

// logic
guessButton.addEventListener('click', () => {
  const userGuess = Number(input.value);

  if (!userGuess || userGuess < 1 || userGuess > 10) {
    message.textContent = 'Please enter a number between 1 and 10.';
    message.style.color = 'orange';
    return;
  }

  if (userGuess < randomNumber) {
    message.textContent = 'Too low!';
    message.style.color = 'red';
  } else if (userGuess > randomNumber) {
    message.textContent = 'Too high!';
    message.style.color = 'red';
  } else {
    message.textContent = 'Correct!';
    message.style.color = 'green';
    resetButton.style.display = 'inline-block';
  }
});

// reset logic
resetButton.addEventListener('click', () => {
  randomNumber = Math.floor(Math.random() * 10) + 1;
  input.value = '';
  message.textContent = '';
  resetButton.style.display = 'none';
});

document.body.append(title, input, guessButton, message, resetButton);