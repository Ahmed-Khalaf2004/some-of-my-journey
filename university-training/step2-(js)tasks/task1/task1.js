// Add CSS styles
const style = document.createElement('style');
style.textContent = `
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .container {
        background: #c2daff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 500px;
    }

    h1 {
        color: #0087ff;
        font-size: 28px;
        margin-bottom: 25px;
        text-align: center;
        font-weight: 600;
        font-family: cursive;
    }

    textarea {
        width: 100%;
        padding: 15px;
        font-size: 16px;
        border: 2px solid #ddd;
        border-radius: 8px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        resize: vertical;
        min-height: 180px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    textarea:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 10px rgba(102, 126, 234, 0.2);
    }

    p {
        margin-top: 15px;
        font-size: 16px;
        font-weight: 500;
        text-align: right;
        transition: color 0.2s ease;
    }

    p.green {
        color: #4CAF50;
    }

    p.orange {
        color: #ff9800;
    }

    p.red {
        color: #f44336;
    }
`;
document.head.appendChild(style);

// Create container
const container = document.createElement('div');
container.className = 'container';
document.body.appendChild(container);

// Create title
let titleEle = document.createElement("h1");
let titleText = document.createTextNode("Live Character Counter");
titleEle.appendChild(titleText);
container.appendChild(titleEle);

// Create textarea
let textAreaField = document.createElement("textarea");
textAreaField.setAttribute("placeholder", "start typing..");
container.appendChild(textAreaField);

// Create counter display
let counterBarEle = document.createElement("p");
container.appendChild(counterBarEle);

// The logic
textAreaField.addEventListener("input", () => {
    const MAX_LIMIT = 200;
    
    if (textAreaField.value.length > MAX_LIMIT) {
        textAreaField.value = textAreaField.value.substring(0, MAX_LIMIT);
    }

    const currentLength = textAreaField.value.length;
    counterBarEle.innerHTML = `Characters: ${currentLength} / ${MAX_LIMIT}`;

    // Change color based on limit
    counterBarEle.classList.remove('green', 'orange', 'red');
    
    if (currentLength >= MAX_LIMIT) {
        counterBarEle.classList.add('red');
    } else if (currentLength >= MAX_LIMIT - 50) {
        counterBarEle.classList.add('orange');
    } else {
        counterBarEle.classList.add('green');
    }
});