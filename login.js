document.getElementById("loginButton").addEventListener("click", function() {
    const form = document.getElementById("loginForm");
    const formData = new FormData(form);

    fetch("login_validation.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if(response.ok) {
            window.location.href = response.url;
        } else {
            displayNotification("Invalid credentials. Please try again.");
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

function displayNotification(message) {
    const notification = document.getElementById("notificationMessage");
    notification.innerHTML = message;
    const modal = document.getElementById("notificationModal");
    modal.style.display = "block";
    setTimeout(() => {
        modal.style.display = "none";
    }, 3000);
}

function hideNotification() {
    const modal = document.getElementById("notificationModal");
    modal.style.display = "none";
}

function togglePasswordVisibility() {
    const passwordInput = document.getElementById("login-pass");
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
