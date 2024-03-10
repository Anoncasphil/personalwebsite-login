<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syntax Saga Login</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
            /* Notification Modal Styles */
    .notification-modal {
        display: none;
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
        height: flex;
    }

    .modal-content {
        background-color: #f44336;
        color: white;
        padding: 20px;
        border-radius: 5px;
        position: relative;
    }

    .close {
        color: white;
        position: absolute;
        top: 5px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    .show {
        display: block;
    }
    </style>
</head>
<body>

<div class="notification-modal" id="notificationModal">
    <div class="modal-content">
        <span class="close" onclick="hideNotification()">&times;</span>
        <p id="notificationMessage"></p>
    </div>
</div>

<div class="wrapper">
    <form id="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1><span>PHIL</span>STUDIO</h1>
        <h2>LOGIN</h2>
        <div class="input-box">
            <input type="text" name="email" placeholder="" required>
            <label for="login-email" class="login__label">Email</label>
        </div>
        <div class="input-box">
            <input type="password" name="password" required class="login__input" id="login-pass" placeholder=" ">
            <label for="login-pass" class="login__label">Password</label>
            <i class="ri-eye-off-line login__eye" id="login-eye" onclick="togglePasswordVisibility()"></i>
        </div>
        <button type="submit" name="loginButton" class="btn">Login</button>
        <div class="register-link">
            <p>Don't have an account? <a href="registration.php" style="color: #c18eff;">Register</a></p>
        </div>
    </form>
</div>

<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["users"] = "yes";
                    $_SESSION["user_id"] = $user["user_id"];
                    $_SESSION["email"] = $user["email"];
                    header("Location: index.php");
                    exit();
                } else {
                    displayNotification("Invalid password");
                }
            } else {
                displayNotification("User not found");
            }
        } else {
            displayNotification("SQL Error");
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);

function displayNotification($message) {
    echo "<script>
            const notification = document.getElementById('notificationMessage');
            notification.innerHTML = '$message';
            const modal = document.getElementById('notificationModal');
            modal.style.display = 'block';
            setTimeout(() => {
                modal.style.display = 'none';
            }, 3000);
        </script>";
}
?>

<script>
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
</script>

</body>
</html>