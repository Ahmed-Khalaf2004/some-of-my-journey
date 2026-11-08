// styling
document.body.style.display = 'flex';
document.body.style.gap = '10px';
document.body.style.padding = '20px';
document.body.style.transition = 'background-color 0.3s ease';

const colors = [
  { name: 'Red', value: 'crimson' },
  { name: 'Blue', value: 'steelblue' },
  { name: 'Green', value: 'forestgreen' }
];

// create and attach buttons
colors.forEach(({ name, value }) => {
  const button = document.createElement('button');
  button.textContent = name;
  
  // button styling
  button.style.padding = '10px 20px';
  button.style.fontSize = '16px';
  button.style.cursor = 'pointer';

  // event
  button.addEventListener('click', () => {
    document.body.style.backgroundColor = value;
  });

  document.body.appendChild(button);
});

// create reset button
const resetButton = document.createElement('button');
resetButton.textContent = 'Reset';
resetButton.style.cursor = 'pointer';
document.body.appendChild(resetButton);

resetButton.addEventListener('click', () => {
  document.body.style.backgroundColor = '';
});

document.body.appendChild(resetButton);