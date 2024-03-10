<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forgot.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="error.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="wrapper">
        <h1>Forgot Password</h1>
        <form id="forgotPasswordForm">
            <div class="input-box">
                <input type="email" name="email" id="email" placeholder="Email" autocomplete="username" required>
                <div class="error-message" id="email-error">Email does not exist</div>
            </div>
            <button type="button" id="emailSubmitButton">Submit Email</button>
            <div class="input-box" style="display: none;">
                <input type="text" name="code" id="code" placeholder="Verification Code" required>
                <div class="error-message" id="code-error"></div>
            </div>
            <div class="input-box" style="display: none;">
                <input type="password" name="newPassword" id="newPassword" placeholder="New Password" required>
            </div>
            <div class="input-box" style="display: none;">
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
            </div>
            <button type="button" id="codeSubmitButton" style="display: none;">Verify Code</button>
            <button type="submit" id="submitButton" style="display: none;">Reset Password</button>
        </form>
        <div id="resetMessage"></div>
    </div>
    <script src="forgot_password.js?v=<?php echo time(); ?>"></script>
</body>
</html>
