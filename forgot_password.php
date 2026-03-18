<?php
// Prevent Clickjacking by setting X-Frame-Options and Content-Security-Policy headers
header('X-Frame-Options: SAMEORIGIN');
header("Content-Security-Policy: frame-ancestors 'self';");

// 1. Force sessions to only use cookies (prevents session IDs in URLs)
ini_set('session.use_only_cookies', 1);
// 2. Prevent session fixation attacks
ini_set('session.use_strict_mode', 1);

// 3. Set strict cookie parameters for maximum compatibility
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_samesite', 'Strict');

// 4. Set the cookie parameters array (for PHP 7.3+)
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLDRMS | Forgot Password</title>
    <meta name="keywords" content="RB-IIMS ENVIRONMENT SYSTEM" />
    <meta name="description" content="DENR RBCO RIVER BASIN PEMSEA">
    <meta name="author" content="JAWA Production">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        /* General Body and Background */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: linear-gradient(135deg, #0c2461 0%, #1e3799 30%, #4a69bd 70%, #6a89cc 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        /* Background Bubbles Animation */
        .bg-bubbles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            overflow: hidden;
        }
        .bg-bubbles li {
            position: absolute;
            list-style: none;
            display: block;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.15);
            bottom: -160px;
            border-radius: 50%;
            animation: square 25s infinite;
            transition-timing-function: linear;
        }
        .bg-bubbles li:nth-child(1) { left: 10%; animation-delay: 0s; }
        .bg-bubbles li:nth-child(2) { left: 20%; width: 80px; height: 80px; animation-delay: 2s; animation-duration: 17s; }
        .bg-bubbles li:nth-child(3) { left: 25%; animation-delay: 4s; }
        .bg-bubbles li:nth-child(4) { left: 40%; width: 60px; height: 60px; animation-duration: 22s; background-color: rgba(255, 255, 255, 0.25);}
        .bg-bubbles li:nth-child(5) { left: 70%; }
        .bg-bubbles li:nth-child(6) { left: 80%; width: 120px; height: 120px; animation-delay: 3s; background-color: rgba(255, 255, 255, 0.2);}
        .bg-bubbles li:nth-child(7) { left: 32%; width: 160px; height: 160px; animation-delay: 7s;}
        .bg-bubbles li:nth-child(8) { left: 55%; width: 20px; height: 20px; animation-delay: 15s; animation-duration: 40s;}
        @keyframes square {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; border-radius: 50%; }
            100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; border-radius: 50%; }
        }
        /* Login Container (now also for Forgot Password) */
        .login-container {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 450px;
            padding: 40px;
            text-align: center;
            transform: translateY(0);
            transition: transform 0.4s, box-shadow 0.4s;
            overflow: hidden;
        }
        .login-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.3);
        }

        /* Logo and System Info */
        .logo img {
            width: 300px;
            height: 300px;
            object-fit: contain;
            margin-bottom: -85px;
            margin-top: -85px;
        }
        .system-name {
            font-size: 28px;
            margin-top: 0px;
            color: #0c2461; /* Added color */
            font-weight: 700; /* Added font-weight */
        }
        .system-desc {
            color: #4a69bd;
            font-size: 14px;
            font-weight: 500;
        }
        /* Form Elements */
        .forgot-password-form { /* Renamed from .login-form for clarity */
            margin-top: 25px;
        }
        .form-group {
            position: relative;
            margin-bottom: 18px;
        }
        .form-group i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #4a69bd;
            font-size: 18px;
        }
        .form-control {
            width: 100%;
            height: 55px;
            padding: 0 20px 0 50px;
            border: none;
            border-radius: 12px;
            background: #f0f7ff;
            font-size: 16px;
            color: #0c2461;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            border: 2px solid transparent;
        }
        .form-control:focus {
            outline: none;
            border-color: #4a69bd;
            background: #fff;
            box-shadow: 0 5px 15px rgba(74, 105, 189, 0.1);
        }
        .form-control::placeholder {
            color: #a0a0d0;
        }

        /* Buttons */
        .btn-action { /* Unified button style */
            width: 100%;
            height: 55px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%);
            color: white;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s;
            box-shadow: 0 8px 20px rgba(67, 206, 162, 0.4);
            position: relative;
            overflow: hidden;
            margin-top: 20px;
            margin-bottom: 15px;
        }
        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(67, 206, 162, 0.5);
        }
        .btn-action:active {
            transform: translateY(0);
        }
        .btn-action::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 20px;
            height: 200%;
            background: rgba(255, 255, 255, 0.4);
            transform: rotate(25deg);
            transition: all 0.5s;
        }
        .btn-action:hover::after {
            left: 120%;
        }

        /* Back to Login Button */
        .btn-back-to-login {
            background: #0c2461;
            color: white;
            border: 2px solid #0c2461;
            font-size: 16px;
            font-weight: 500;
            padding: 12px 25px;
            border-radius: 12px;
            transition: all 0.3s;
            display: inline-flex; /* Use flex to align icon and text */
            align-items: center;
            gap: 8px; /* Space between icon and text */
            margin-top: 15px;
            text-decoration: none; /* Remove underline for anchor tag */
        }
        .btn-back-to-login:hover {
            background: #1e3799;
            transform: translateY(-3px);
            color: white; /* Keep text white on hover */
        }

        /* Footer */
        .footer {
            margin-top: 35px;
            color: #4a69bd;
            font-size: 14px;
            line-height: 1.6;
        }
        .copyright {
            font-weight: 500;
            color: #0c2461;
        }
        .version {
            background: linear-gradient(to right, #43cea2, #185a9d);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 600;
            margin-top: 5px;
        }
        /* Security Indicator */
        .security-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
            padding: 12px;
            background: #f0f7ff;
            border-radius: 10px;
            font-size: 14px;
            color: #0c2461;
        }
        .security-indicator i {
            color: #43cea2;
            font-size: 18px;
        }

        /* Responsive Adjustments */
        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }
            .system-name {
                font-size: 24px;
            }
        }

        /* Toast Styles */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            pointer-events: none;
        }
        .toast {
            min-width: 280px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            font-family: 'Poppins', sans-serif;
            opacity: 0;
            transition: opacity 0.4s ease-in-out, transform 0.4s ease-in-out;
            transform: translateX(100%);
            margin-bottom: 15px;
            pointer-events: auto;
            border: none;
        }
        .toast.show {
            opacity: 1;
            transform: translateX(0);
        }
        .toast-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 12px 15px;
            border-radius: 10px 10px 0 0;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .toast-header .toast-icon {
            font-size: 1.2em;
        }
        .toast-body {
            padding: 15px;
            font-size: 15px;
            color: #333;
        }
        /* Custom colors for success and error toasts */
        .toast.bg-success-custom {
            background-color: #e6ffed;
            color: #007a3e;
            border: 1px solid #99e6b3;
        }
        .toast.bg-success-custom .toast-header {
            background-color: #4CAF50;
            color: white;
        }
        .toast.bg-danger-custom {
            background-color: #ffe6e6;
            color: #cc0000;
            border: 1px solid #ff9999;
        }
        .toast.bg-danger-custom .toast-header {
            background-color: #f44336;
            color: white;
        }
        .btn-close-white {
            filter: brightness(0) invert(1);
        }

        /* Modal Styles (Adjusted for Bootstrap 5) */
        .modal-header .btn-close {
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
            border: 0;
            border-radius: .25rem;
            opacity: .5;
        }
        .modal-header .btn-close:hover {
            opacity: .75;
        }
        .modal-header .btn-close:focus {
            box-shadow: 0 0 0 .25rem rgba(13,110,253,.25);
            outline: 0;
        }
        /* Override default Bootstrap 4 close button style for the modal */
        .modal-header button.close { /* Targeting the old class to unset properties */
            opacity: 1; /* Reset opacity */
            font-size: 1.5rem; /* Adjust font size */
            font-weight: normal; /* Reset font weight */
            background-color: transparent; /* Ensure transparent background */
            border: none; /* Remove border */
            padding: 0; /* Remove padding */
            margin: 0; /* Remove margin */
            color: inherit; /* Inherit color */
            float: right; /* Keep it on the right */
        }
    </style>
</head>
<body>
    <ul class="bg-bubbles">
        <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>
    </ul>

    <div class="toast-container">
        </div>

    <div class="login-container">
        <div class="logo">
            <a href="index.php">
                <img src="images/oldpmslogin.png" alt="O-LDPMS Logo">
            </a>
        </div>
        <p class="system-name">Forgot Password</p>
        <p class="system-desc">O-LDPMS | Online Land Dispute Management System</p>

        <?php if (!isset($_GET['code'])): ?>
            <form action="processphp/forgot_password.php" id="forgotPasswordForm" class="forgot-password-form" method="post" role="form" autocomplete="off">
                <h4>Enter your email address to receive a verification code.</h4>
                <hr />
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <input class="form-control" data-val="true" data-val-email="The Email field is not a valid e-mail address." data-val-required="The Email field is required." id="Email" name="email" type="email" value="" placeholder="Your email address" required />
                    <span class="field-validation-valid text-danger" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                </div>
                <button type="submit" class="btn-action g-recaptcha" data-sitekey="6LeTIY0sAAAAAJDzQT7Atu4lR7NsfUH07D8vNPxc" data-callback="onForgotSubmit" name="send_code">
                    <i class="fas fa-paper-plane"></i> Send Code
                </button>
            </form>
        <?php else: ?>
            <form action="processphp/forgot_password.php" class="forgot-password-form" method="post" role="form" autocomplete="off">
                <h4>Enter the 6-digit verification code sent to your email.</h4>
                <hr />
                <div class="form-group">
                    <i class="fas fa-hashtag"></i>
                    <input class="form-control" data-val="true" data-val-required="The Code field is required." id="Code" name="code" type="text" value="" placeholder="Verification code" required />
                    <span class="field-validation-valid text-danger" data-valmsg-for="Code" data-valmsg-replace="true"></span>
                </div>
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email']); ?>">
                <button type="submit" class="btn-action" name="verify_code">
                    <i class="fas fa-check-circle"></i> Verify Code
                </button>
            </form>
        <?php endif; ?>

        <a href="index.php" class="btn-back-to-login">
            <i class="fas fa-arrow-left"></i> Back to Login
        </a>

        <div class="security-indicator">
            <i class="fas fa-shield-alt"></i>
            <span>Secure 256-bit SSL Encrypted Connection</span>
        </div>
        <div class="footer">
            <p class="copyright">DENR CARAGA | © Copyright 2024</p>
            <p class="version">O-LDPMS Version B1.01</p>
        </div>
    </div>

    <?php
    $showModal = isset($_GET['showModal']) && $_GET['showModal'] == 'true';
    ?>
    <div class="modal fade" id="passwordResetModal" tabindex="-1" aria-labelledby="passwordResetModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordResetModalLabel">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="resetPasswordForm" action="reset_password.php" method="POST">
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input autocomplete="off" type="password" class="form-control" id="newPassword" name="newPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input autocomplete="off" type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Confirm Email</label>
                            <input autocomplete="off" type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="resetPasswordForm" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Callback for reCAPTCHA submission
        function onForgotSubmit(token) {
            document.getElementById("forgotPasswordForm").submit();
        }

        // Simple animation effects for input fields
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentNode.style.transform = 'scale(1.02)';
                });
                input.addEventListener('blur', function() {
                    this.parentNode.style.transform = 'scale(1)';
                });
            });

            // Button ripple effect (applied to .btn-action and .btn-back-to-login)
            const buttons = document.querySelectorAll('.btn-action, .btn-back-to-login');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const x = e.clientX - e.target.offsetLeft;
                    const y = e.clientY - e.target.offsetTop;
                    const ripple = document.createElement('span');
                    ripple.classList.add('ripple');
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    this.appendChild(ripple);
                    setTimeout(() => { ripple.remove(); }, 1000);
                });
            });
        });

        // Function to show a toast notification with improved UI
        function showToast(type, message) {
            const toastContainer = document.querySelector('.toast-container');
            const toastElement = document.createElement('div');
            toastElement.classList.add('toast');
            toastElement.setAttribute('role', 'alert');
            toastElement.setAttribute('aria-live', 'assertive');
            toastElement.setAttribute('aria-atomic', 'true');
            toastElement.setAttribute('data-bs-autohide', 'true');
            toastElement.setAttribute('data-bs-delay', '5000'); // Increased delay to 5 seconds

            const headerBgClass = type === 'success' ? 'bg-success-custom' : 'bg-danger-custom';
            const titleText = type === 'success' ? 'Success' : 'Error';
            const iconClass = type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle';

            toastElement.innerHTML = `
                <div class="toast-header ${headerBgClass}">
                    <i class="${iconClass} toast-icon"></i>
                    <strong class="me-auto">${titleText}</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    ${message}
                </div>
            `;

            toastContainer.appendChild(toastElement);

            const toast = new bootstrap.Toast(toastElement);
            toast.show();

            // Optional: Remove the toast from the DOM after it's hidden to keep the DOM clean
            toastElement.addEventListener('hidden.bs.toast', function () {
                toastElement.remove();
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            let shouldClearParams = false;

            if (urlParams.has('error')) {
                const errorMessage = urlParams.get('error');
                showToast('error', errorMessage);
                shouldClearParams = true;
            }
            if (urlParams.has('success')) {
                const successMessage = urlParams.get('success');
                showToast('success', successMessage);
                shouldClearParams = true;
            }

            if (shouldClearParams) {
                const newUrl = window.location.protocol + '//' + window.location.host + window.location.pathname;
                window.history.replaceState({}, document.title, newUrl);
            }

            // Show password reset modal if showModal is true
            <?php if ($showModal): ?>
                var passwordResetModal = new bootstrap.Modal(document.getElementById('passwordResetModal'));
                passwordResetModal.show();
            <?php endif; ?>
        });

        // Password reset validation (for the modal)
        function resetPassword() {
            var newPassword = document.getElementById('newPassword').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (newPassword !== confirmPassword) {
                showToast('error', 'Passwords do not match.'); // Use the new toast function
                return false;
            }
            return true;
        }
    </script>
</body>
</html>