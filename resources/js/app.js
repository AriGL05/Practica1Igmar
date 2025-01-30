import './bootstrap';

// Callback when reCAPTCHA is successfully completed
window.enableSubmitButton= function() {
    document.getElementById("sign-button").disabled = false; // Enable the button
}

// Callback when reCAPTCHA expires or is not completed
window.disableSubmitButton = function() {
    document.getElementById("sign-button").disabled = true; // Disable the button
}