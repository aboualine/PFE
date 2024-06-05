document.addEventListener('DOMContentLoaded', function() {
    const signInButton = document.getElementById('signInButton');
    const logInButton = document.getElementById('logInButton');
    const buttonContainer = document.getElementById('div');

    signInButton.addEventListener('click', function() {
        buttonContainer.classList.add('active');
        signInButton.classList.add('active');
        logInButton.classList.remove('active');
    });

    logInButton.addEventListener('click', function() {
        buttonContainer.classList.remove('active');
        logInButton.classList.add('active');
        signInButton.classList.remove('active');
    });

    // Initialize the active button state
    if (buttonContainer.classList.contains('active')) {
        signInButton.classList.add('active');
        logInButton.classList.remove('active');
    } else {
        logInButton.classList.add('active');
        signInButton.classList.remove('active');
    }
});
