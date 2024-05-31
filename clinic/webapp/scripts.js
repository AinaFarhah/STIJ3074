function validateRegistration() {
    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let phone = document.getElementById("phone_number").value;
    let address = document.getElementById("address").value;
    let errorMessage = document.getElementById("errorMessage");

    if (!name || !email || !password || !phone || !address) {
        errorMessage.textContent = "All fields are required.";
        return false;
    }

    if (password.length < 6) {
        errorMessage.textContent = "Password must be at least 6 characters long.";
        return false;
    }

    return true;
}

function validateLogin() {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let errorMessage = document.getElementById("errorMessage");

    if (!email || !password) {
        errorMessage.textContent = "Both fields are required.";
        return false;
    }

    return true;
}