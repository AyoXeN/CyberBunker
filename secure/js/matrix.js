const characters = [
    0,
    1, 
    2, 
    3, 
    4, 
    5, 
    6, 
    7, 
    8, 
    9,
    "a", 
    "b", 
    "c", 
    "d", 
    "e", 
    "f", 
    "g", 
    "h", 
    "i", 
    "j", 
    "k", 
    "l", 
    "m", 
    "n", 
    "o", 
    "p", 
    "q", 
    "r", 
    "s", 
    "t", 
    "u", 
    "v", 
    "w", 
    "x", 
    "y", 
    "z"
];

const chars = document.querySelector(".matrix");

var cancelled = false;

function singleColumn (){
    if (!cancelled) {
        for(i = 0; i < 60; i++){
            const letters = document.createElement("div");
            letters.innerHTML = "a";
        
            chars.appendChild(letters);
        
            function changeLetters(){
                const x = parseInt(`${Math.floor(Math.random() * characters.length)}`)
                letters.innerHTML = characters[x];
            }
            const letterTimer = setInterval(changeLetters, 100);
            }
    }
}



function matrixEffect(){
    const Matrix = document.createElement("div");
    Matrix.classList.add("matrix");
    Matrix.style.left=`${Math.floor(Math.random() * 100)}%`;

    setInterval(() => {
        Matrix.innerHTML = chars.innerHTML;
    }, 100);

    document.body.appendChild(Matrix);
}

const columnTimer = setTimeout(singleColumn, 800);
const matrixTimer = setInterval(matrixEffect, 800);

setTimeout(() => {
    cancelled = true;
    clearInterval(matrixTimer);
}, 10000);