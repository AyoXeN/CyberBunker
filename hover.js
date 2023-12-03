function setupLink(linkId, originalText) {
    const textElement = document.getElementById(linkId);
    let hexText = generateRandomHex();
    textElement.textContent = hexText;

    textElement.addEventListener('mouseover', function() {
        let i = 0;
        clearInterval(textElement.intervalId);
        textElement.intervalId = setInterval(function() {
            if (i < originalText.length) {
                textElement.textContent = originalText.substring(0, i + 1);
                i++;
            } else {
                clearInterval(textElement.intervalId);
            }
        }, 400 / originalText.length);
    });

    textElement.addEventListener('mouseout', function() {
        clearInterval(textElement.intervalId);
        hexText = generateRandomHex();
        textElement.textContent = hexText;
    });
}

function generateRandomHex() {
    return '#' + Math.floor(Math.random() * 16777215).toString(16);
}

setupLink('About', 'About');
setupLink('Updates', 'Updates');
setupLink('Login', 'Login');