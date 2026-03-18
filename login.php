<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O-LDPMS | Secure Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <style>
        /* Existing CSS styles remain unchanged */
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

        .logo img {
            width: 300px; /* Adjusted width */
            height: 300px; /* Adjusted height */
            object-fit: contain;
            margin-bottom: -85px; /* **Adjusted: Reduced space below the logo** */
            margin-top: -85px; /* Adjust this value for overall vertical positioning of the logo block */
        }
        .system-name {
            font-size: 28px;
            margin-top: 0px; /* **Adjusted: Reduced/Removed space above the text** */
        }
        .system-desc {
            color: #4a69bd;
            font-size: 14px;
            font-weight: 500;
        }
        .login-form {
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
        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        .remember-me {
            display: flex;
            align-items: center;
        }
        .remember-me input {
            margin-right: 8px;
            accent-color: #4a69bd;
        }
        .remember-me label {
            color: #4a69bd;
            font-size: 15px;
            cursor: pointer;
        }
        .forgot-password {
            color: #4a69bd;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: color 0.3s;
        }
        .forgot-password:hover {
            color: #0c2461;
            text-decoration: underline;
        }
        .btn-login {
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
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(67, 206, 162, 0.5);
        }
        .btn-login:active {
            transform: translateY(0);
        }
        .btn-login::after {
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
        .btn-login:hover::after {
            left: 120%;
        }
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 12px;
        }
        .action-btn {
            flex: 1;
            height: 50px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-register {
            background: #fff;
            color: #4a69bd;
            border: 2px solid #4a69bd;
        }
        .btn-register:hover {
            background: #f0f7ff;
            transform: translateY(-3px);
        }
        .btn-guest {
            background: #0c2461;
            color: white;
            border: 2px solid #0c2461;
        }
        .btn-guest:hover {
            background: #1e3799;
            transform: translateY(-3px);
        }
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
        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }
            .system-name {
                font-size: 24px;
            }
            .action-buttons {
                flex-direction: column;
                gap: 12px;
            }
        }
        /* Adjusted Toast Styles for better UI */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            pointer-events: none; /* Allow clicks to pass through to elements below */
        }
        .toast {
            min-width: 280px; /* Slightly wider */
            border-radius: 12px; /* More rounded corners */
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15); /* Stronger, softer shadow */
            font-family: 'Poppins', sans-serif;
            opacity: 0;
            transition: opacity 0.4s ease-in-out, transform 0.4s ease-in-out; /* Add transform for slide effect */
            transform: translateX(100%); /* Start off-screen to the right */
            margin-bottom: 15px; /* Space between multiple toasts */
            pointer-events: auto; /* Re-enable pointer events for the toast itself */
            border: none; /* Remove default bootstrap border */
        }
        .toast.show {
            opacity: 1;
            transform: translateX(0); /* Slide into view */
        }
        .toast-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05); /* Subtle separator */
            padding: 12px 15px;
            border-radius: 10px 10px 0 0;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px; /* Space between icon and text */
        }
        .toast-header .toast-icon {
            font-size: 1.2em;
        }
        .toast-body {
            padding: 15px;
            font-size: 15px;
            color: #333; /* Darker text for readability */
        }
        /* Custom colors for success and error toasts */
        .toast.bg-success-custom {
            background-color: #e6ffed; /* Light green background */
            color: #007a3e; /* Dark green text */
            border: 1px solid #99e6b3; /* Green border */
        }
        .toast.bg-success-custom .toast-header {
            background-color: #4CAF50; /* Green header */
            color: white;
        }
        .toast.bg-danger-custom {
            background-color: #ffe6e6; /* Light red background */
            color: #cc0000; /* Dark red text */
            border: 1px solid #ff9999; /* Red border */
        }
        .toast.bg-danger-custom .toast-header {
            background-color: #f44336; /* Red header */
            color: white;
        }
        .btn-close-white {
            filter: brightness(0) invert(1); /* Ensures white close button on dark headers */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
        <p class="system-desc">LOG IN FOR CLIENT</p>
        <form class="login-form" id="loginFormId" action="processphp/prclogin.php" method="post" autocomplete="off" role="form">
            <input name="__RequestVerificationToken" type="hidden" value="TusLxdoC-WSu8vJrVyC708Q-VCmwvxcodV1bCLSKxDKuOc10e_n32QEZtvLL0gC62OBGkguEbcvPQAhVk3fwXBKpyPYjqSD2anIRvin4ylc1" />
            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" class="form-control" id="Email" name="email" required placeholder="Enter your email" autofocus>
            </div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" id="Password" name="password" required placeholder="Enter your password">
            </div>
            <div class="options">
                <div class="remember-me">
                    <input type="checkbox" id="RememberMe" name="RememberMe" value="true">
                    <label for="RememberMe">Remember me</label>
                    <input name="RememberMe" type="hidden" value="false" />
                </div>
                <a href="forgot_password.php" class="forgot-password">Forgot password?</a>
            </div>
            <button type="submit" class="btn-login g-recaptcha" data-sitekey="6LeTIY0sAAAAAJDzQT7Atu4lR7NsfUH07D8vNPxc" data-callback="onLoginSubmit" name="btn">
                <i class="fas fa-sign-in-alt"></i> LOG IN
            </button>
            <div class="action-buttons">
                <button type="button" class="action-btn btn-register" onclick="window.location.href='Register2.php'">
                    <i class="fas fa-user-plus"></i> Register
                </button>
            </div>
        </form>
        <div class="security-indicator">
            <i class="fas fa-shield-alt"></i>
            <span>Secure 256-bit SSL Encrypted Connection</span>
        </div>
        <div class="footer">
            <p class="copyright">DENR CARAGA | © Copyright 2024</p>
            <p class="version">O-LDPMS Version B1.01</p>
        </div>
    </div>
    
    <script>
        // Callback function triggered by invisible reCAPTCHA
        function onLoginSubmit(token) {
            document.getElementById("loginFormId").submit();
        }

        // Simple animation effects
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
            // Button ripple effect
            const buttons = document.querySelectorAll('.btn-login, .action-btn');
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
    </script>

    <script>
        // Function to show a toast notification with improved UI
        function showToast(type, message) {
            const toastContainer = document.querySelector('.toast-container');
            const toastElement = document.createElement('div');
            toastElement.classList.add('toast');
            toastElement.setAttribute('role', 'alert');
            toastElement.setAttribute('aria-live', 'assertive');
            toastElement.setAttribute('aria-atomic', 'true');
            toastElement.setAttribute('data-bs-autohide', 'true');
            toastElement.setAttribute('data-bs-delay', '5000'); // Increased delay to 5 seconds for readability

            const headerBgClass = type === 'success' ? 'bg-success-custom' : 'bg-danger-custom'; // Use custom classes
            const titleText = type === 'success' ? 'Success' : 'Error';
            const iconClass = type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle'; // Add icons

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
        });
    </script>
</body>
</html>