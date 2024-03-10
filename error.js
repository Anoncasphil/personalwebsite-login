function togglePasswordVisibility() {
    const passwordInput = document.getElementById("password");
    const eyeIcon = document.getElementById("login-eye");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("ri-eye-off-line");
        eyeIcon.classList.add("ri-eye-line");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("ri-eye-line");
        eyeIcon.classList.add("ri-eye-off-line");
    }
}

function toggleConfirmPasswordVisibility() {
    const confirmPasswordInput = document.getElementById("confirm_password");
    const confirmEyeIcon = document.getElementById("confirm-eye");
    if (confirmPasswordInput.type === "password") {
        confirmPasswordInput.type = "text";
        confirmEyeIcon.classList.remove("ri-eye-off-line");
        confirmEyeIcon.classList.add("ri-eye-line");
    } else {
        confirmPasswordInput.type = "password";
        confirmEyeIcon.classList.remove("ri-eye-line");
        confirmEyeIcon.classList.add("ri-eye-off-line");
    }
}

function checkPasswordMatch() {
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirm_password");
    const errorText = document.getElementById("password-error");

    if (passwordInput.value !== confirmPasswordInput.value) {
        confirmPasswordInput.classList.add("error");
        errorText.style.display = "block";
    } else {
        confirmPasswordInput.classList.remove("error");
        errorText.style.display = "none";
    }
}

document.getElementById("confirm_password").addEventListener("input", checkPasswordMatch);

function checkEmailAvailability() {
    const emailInput = document.getElementById("email");
    const errorText = document.getElementById("email-error");

    // AJAX request
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "check_email.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.status === "taken") {
                    emailInput.classList.add("error");
                    errorText.textContent = response.message;
                    errorText.style.display = "block";
                } else {
                    emailInput.classList.remove("error");
                    errorText.textContent = "";
                    errorText.style.display = "none";
                }
            } else {
                console.error("Error: " + xhr.status);
            }
        }
    };

    // Send the request with email parameter
    xhr.send("email=" + emailInput.value);
}

// Add event listener to trigger email check on input
document.getElementById("email").addEventListener("input", checkEmailAvailability);