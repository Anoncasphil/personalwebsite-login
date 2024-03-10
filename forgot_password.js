document.addEventListener("DOMContentLoaded", function() {
    const emailInput = document.getElementById("email");
    const emailError = document.getElementById("email-error");
    const emailSubmitButton = document.getElementById("emailSubmitButton");
    const codeInput = document.getElementById("code");
    const codeError = document.getElementById("code-error");
    const codeSubmitButton = document.getElementById("codeSubmitButton");
    const newPasswordInput = document.getElementById("newPassword");
    const confirmPasswordInput = document.getElementById("confirmPassword");
    const submitButton = document.getElementById("submitButton");
    const resetMessage = document.getElementById("resetMessage");

    emailSubmitButton.addEventListener("click", function() {
        const email = emailInput.value.trim();

        // Clear previous error messages
        emailError.textContent = "";
        codeError.textContent = "";

        // Check if the email is valid
        if (!isValidEmail(email)) {
            emailError.textContent = "Please enter a valid email address.";
            emailError.style.display = "block";
            emailInput.classList.remove("success");
            emailInput.classList.add("error");
            return;
        }

        // Make AJAX request to check email in the database
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "check_email_forgot.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Email exists in the database
                    emailInput.classList.remove("error");
                    emailInput.classList.add("success");
                    emailError.textContent = "";
                    emailError.style.display = "none";

                    // Generate and send verification code
                    const verificationCode = generateVerificationCode();
                    sendVerificationCode(email, verificationCode);

                    // Change form to display code input and "Verify Code" button
                    codeInput.style.display = "block";
                    codeSubmitButton.style.display = "block";
                    emailSubmitButton.style.display = "none";

                } else {
                    // Email does not exist in the database
                    emailInput.classList.remove("success");
                    emailInput.classList.add("error");
                    emailError.textContent = "Email not found. Please check your email.";
                    emailError.style.display = "block";
                }
            } else {
                console.error("Error checking email:", xhr.status);
            }
        };
        xhr.onerror = function() {
            console.error("Error checking email. Please try again later.");
        };
        xhr.send("email=" + encodeURIComponent(email));
    });

    codeSubmitButton.addEventListener("click", function() {
        const code = codeInput.value.trim();

        // Check if the code is correct (you can add more validation if needed)
        if (code === sessionStorage.getItem("verificationCode")) {
            codeInput.classList.remove("error");
            codeError.textContent = "";
            codeError.style.display = "none";

            // Show the password fields
            newPasswordInput.style.display = "block";
            confirmPasswordInput.style.display = "block";
            submitButton.style.display = "block";

            // Hide the code input and "Verify Code" button
            codeInput.style.display = "none";
            codeSubmitButton.style.display = "none";
        } else {
            codeInput.classList.add("error");
            codeError.textContent = "Invalid code. Please try again.";
            codeError.style.display = "block";
        }
    });

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function generateVerificationCode() {
        // Generate a random 4-digit code
        const verificationCode = Math.floor(1000 + Math.random() * 9000);
        
        // Save the code to sessionStorage for validation
        sessionStorage.setItem("verificationCode", verificationCode);
        
        return verificationCode;
    }

    function sendVerificationCode(email, code) {
        const xhr = new XMLHttpRequest();
        const url = "send_verification_email.php";
        
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    console.log("Verification code sent to " + email);
                } else {
                    console.error("Error sending verification code:", response.message);
                }
            } else {
                console.error("Error sending verification code:", xhr.status);
            }
        };
        
        xhr.onerror = function() {
            console.error("Error sending verification code. Please try again later.");
        };
        
        const params = "email=" + encodeURIComponent(email) + "&code=" + encodeURIComponent(code);
        xhr.send(params);
    }
});
