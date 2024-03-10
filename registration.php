<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="registration.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="error.css?v=<?php echo time(); ?>">
    <script src="error.js?v=<?php echo time(); ?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <!-- First Section -->
        <div class="section">
    <form action="register.php" method="post" id="registrationForm">
        <h2>User Details</h2>
        <div class="input-box">
            <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>
        </div>
        <div class="input-box">
            <input type="text" name="first_name" id="first_name" placeholder="First Name" required>
        </div>
        <div class="input-box">
            <input id="phone" type="tel" name="phone" required>
        </div>
        <!-- Other input fields -->
        <div class="input-box">
            <input type="email" name="email" id="email" placeholder="Email" autocomplete="username" required>
            <div class="error-message" id="email-error"></div>
        </div>

        <div class="input-box">
            <input type="password" name="password" id="password" placeholder="Password" autocomplete="new-password" required>
            <i class="ri-eye-off-line login__eye" id="login-eye" onclick="togglePasswordVisibility()"></i>
        </div>
        <div class="input-box">
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Repeat Password" autocomplete="new-password" required>
        <i class="ri-eye-off-line login__eye" id="confirm-eye" onclick="toggleConfirmPasswordVisibility()"></i>
        <div class="error-message" id="password-error">Passwords do not match</div>
    </div>
        <!-- Other input fields -->
    </form>
</div>
            <!-- Second Section -->
            <div class="section">
                <h2>Location Details</h2>
                <div class="input-box">
                    <select name="country" id="country" required>
                        <option value="">Select Country</option>
                    </select>
                </div>
                <div id="location-options"></div>
            </div>
            <!-- Third Section -->
            <div class="address">
                <h2>Address</h2>
                <p>(Optional)</p>
                <div class="input-box">
                    <input type="text" name="lot" id="lot" placeholder="Lot">
                </div>
                <div class="input-box">
                    <input type="text" name="street" id="street" placeholder="Street">
                </div>
                <div class="input-box">
                    <input type="text" name="phase_subdivision" id="phase_subdivision" placeholder="Phase/Subdivision">
                </div>
            </div>
            <!-- Terms and Conditions -->
            <div class="terms">
                <h2>Terms and Conditions</h2>
                <div class="input-box">
                    <label class="checkbox-label">
                        <input type="checkbox" name="terms" id="terms" required>
                        <span style="color: #fff;">I agree to the</span> <a href="#" id="openModal">Terms and Conditions</a>
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <br>
            <div style="width: 100%; text-align: center;">
                <button type="submit" name="register" id="registerBtn" class="btn" disabled>Register</button>
            </div>
            <div class="register-link" style>
                <p>Already have an account? <a href="login.php" style="color: #c18eff;">Login</a></p>
            </div>

        </form>
        
    </div>

    <div class="notification-modal" id="notificationModal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="notificationMessage"></p>
    </div>
</div>

    <!-- Modal -->
<!-- Modal HTML -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="terms-text">
            <!-- Your generated Terms and Conditions text here -->
            <!-- Example: -->
            <h2>Terms and Conditions</h2>
            <br>
            <h3>Introduction</h3>
            <p>These Terms and Conditions govern your use of this website, operated by PhilStudio. By accessing or using the Site, you agree to comply with these Terms. If you do not agree with any part of these Terms, you must not use the Site.</p>
            <br>
            <h3>Use of the Site</h3>
            <p>You are granted permission to access and use the Site for personal, non-commercial purposes. You may not use the Site for any illegal or unauthorized purpose. You agree to abide by all applicable laws and regulations.</p>
            <br>
            <h3>Intellectual Property</h3>
            <p>All content, trademarks, logos, and other intellectual property displayed on the Site are the property of PhilStudio or its licensors. You may not use, reproduce, modify, or distribute any of the content without prior written consent.</p>
            <br>
            <h3>Privacy Policy</h3>
            <p>Your use of the Site is also governed by our Privacy Policy, which outlines how we collect, use, and protect your personal information. By using the Site, you agree to the terms of our Privacy Policy.</p>
            <br>
            <h3>User Accounts</h3>
            <p>If you create an account on the Site, you are responsible for maintaining the confidentiality of your account information and password. You agree to notify us immediately of any unauthorized use of your account.</p>
            <br>
            <h3>Limitation of Liability</h3>
            <p>In no event shall PhilStudio be liable for any damages arising out of your use or inability to use the Site, including but not limited to direct, indirect, incidental, special, or consequential damages.</p>
            <br>
            <h3>Changes to Terms</h3>
            <p>We reserve the right to modify or update these Terms at any time. It is your responsibility to review these Terms periodically for changes. Your continued use of the Site after any changes indicates your acceptance of the updated Terms.</p>
            <br>
            <h3>Governing Law</h3>
            <p>These Terms are governed by and construed in accordance with the laws of United States. Any disputes arising under these Terms shall be subject to the exclusive jurisdiction of the courts in the US.</p>
            <br>
            <p>By using this Site, you acknowledge that you have read, understood, and agree to these Terms and Conditions.</p>
        
        </div>
    </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="registration.js?v=<?php echo time(); ?>"></script>
    <script src="error.js?v=<?php echo time(); ?>"></script>
</body>
</html>
