function setupLink(linkId, originalText) {
    const textElement = document.getElementById(linkId);
    let binaryText = generateRandomBinary(originalText.length);
    
    // Typing in binary value when the page is loaded
    typeInBinary();

    // Function to generate random binary code
    function generateRandomBinary(length) {
        let binaryCode = '';
        for (let i = 0; i < 2*length-1; i++) {
            binaryCode += Math.round(Math.random());
        }
        return binaryCode;
    }

    // Function to type in binary value
    function typeInBinary() {
        let i = 0;
        const intervalId = setInterval(function() {
            if (i < binaryText.length) {
                textElement.textContent += binaryText.charAt(i);
                i++;
            } else {
                clearInterval(intervalId);
            }
        }, 75); // Adjust the speed as needed
    }

    // Function to decode to original text
    function decodeToOriginal() {
        let j = 0;
        const decodeIntervalId = setInterval(function() {
            if (j < originalText.length) {
                textElement.textContent = originalText.substring(0, j + 1);
                j++;
            } else {
                clearInterval(decodeIntervalId);
            }
        }, 150); // Adjust the speed as needed
    }

    // Simultaneously decode to original value
    decodeToOriginal();
}

// Example usage
setupLink('welcomeBanner', 'Welcome to CyberBunker! This is a one man honeypot project created to better understand the web security.');