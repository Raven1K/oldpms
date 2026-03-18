<?php
// Initialize the session
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "processphp/config.php";

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

session_start();

require_once "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Lumber Dealer Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <style>
    :root {
      --primary: #1a5d1a;
      --primary-light: #2e8b57;
      --secondary: #d4a017;
      --light: #f8f9fa;
      --dark: #212529;
      --gray: #6c757d;
      --light-gray: #e9ecef;
      --border-radius: 8px;
      --box-shadow: 0 5px 15px rgba(0,0,0,0.08);
      --transition: all 0.3s ease;
    }
    
    body {
      background: linear-gradient(135deg, #f5f7fa 0%, #e4efe9 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--dark);
    }
    
    .header {
      background: linear-gradient(to right, var(--primary), var(--primary-light));
      color: white;
      padding: 1.5rem 0;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .logo-container {
      display: flex;
      align-items: center;
      gap: 15px;
    }
    
    .logo {
      width: 60px;
      height: 60px;
      background: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    
    .logo i {
      font-size: 30px;
      color: var(--primary);
    }
    
    .main-container {
      max-width: 1000px;
      margin: 2rem auto;
      padding: 0 15px;
    }
    
    .registration-card {
      background: white;
      border-radius: var(--border-radius);
      box-shadow: var(--box-shadow);
      overflow: hidden;
      transition: var(--transition);
    }
    
    .card-header {
      background: white;
      padding: 1.5rem;
      border-bottom: 1px solid var(--light-gray);
    }
    
    .card-body {
      padding: 2rem;
    }
    
    .section-title {
      color: var(--primary);
      margin-bottom: 1.5rem;
      padding-bottom: 0.5rem;
      border-bottom: 2px solid var(--light-gray);
      font-weight: 600;
    }
    
    .form-group {
      margin-bottom: 1.25rem;
    }
    
    .form-label {
      font-weight: 600;
      color: var(--dark);
      margin-bottom: 0.5rem;
    }
    
    .form-control, .form-select {
      border-radius: var(--border-radius);
      padding: 0.75rem 1rem;
      border: 1px solid #ced4da;
      transition: var(--transition);
    }
    
    .form-control:focus, .form-select:focus {
      border-color: var(--primary-light);
      box-shadow: 0 0 0 0.25rem rgba(26, 93, 26, 0.15);
    }
    
    .input-group-text {
      background: var(--light);
      border-radius: var(--border-radius) 0 0 var(--border-radius);
    }
    
    .password-toggle {
      cursor: pointer;
      background: var(--light);
      border-left: none;
      border-radius: 0 var(--border-radius) var(--border-radius) 0;
    }
    
    .file-upload-container {
      border: 2px dashed var(--light-gray);
      border-radius: var(--border-radius);
      padding: 1.5rem;
      text-align: center;
      background: #fafafa;
      transition: var(--transition);
      margin-bottom: 1rem;
    }
    
    .file-upload-container:hover {
      border-color: var(--primary-light);
      background: rgba(26, 93, 26, 0.03);
    }
    
    .file-upload-label {
      display: block;
      cursor: pointer;
      color: var(--gray);
      margin-bottom: 1rem;
    }
    
    .file-upload-label i {
      font-size: 2rem;
      display: block;
      margin-bottom: 0.5rem;
      color: var(--primary);
    }
    
    .file-name {
      font-size: 0.9rem;
      color: var(--gray);
      font-style: italic;
    }
    
    .terms-container {
      max-height: 300px;
      overflow-y: auto;
      padding: 1rem;
      background: var(--light);
      border-radius: var(--border-radius);
      margin: 1.5rem 0;
      border: 1px solid var(--light-gray);
    }
    
    .terms-title {
      color: var(--primary);
      margin-bottom: 1rem;
      font-weight: 700;
    }
    
    .terms-content {
      font-size: 0.9rem;
      line-height: 1.6;
    }
    
    .terms-content b {
      color: var(--primary);
    }
    
    .action-buttons {
      display: flex;
      gap: 1rem;
      margin-top: 2rem;
    }
    
    .btn {
      border-radius: var(--border-radius);
      padding: 0.75rem 1.5rem;
      font-weight: 600;
      transition: var(--transition);
      flex: 1;
    }
    
    .btn-primary {
      background: var(--primary);
      border: none;
    }
    
    .btn-primary:hover {
      background: var(--primary-light);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(26, 93, 26, 0.3);
    }
    
    .btn-outline-secondary {
      border: 1px solid var(--gray);
      color: var(--gray);
    }
    
    .btn-outline-secondary:hover {
      background: var(--light-gray);
    }
    
    .footer {
      text-align: center;
      padding: 2rem 0;
      color: var(--gray);
      font-size: 0.9rem;
      margin-top: 2rem;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .card-body {
        padding: 1.5rem;
      }
      
      .action-buttons {
        flex-direction: column;
      }
    }

    /* Toast styles */
    .toast-container {
        position: fixed;
        top: 1.5rem;
        right: 1.5rem;
        z-index: 1080;
    }

    .toast-header.success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .toast-header.error {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    .toast-body.success {
        color: #155724;
        background-color: #d4edda;
    }

    .toast-body.error {
        color: #721c24;
        background-color: #f8d7da;
    }
  </style>
</head>
<body>

  <div class="main-container">
    <div class="registration-card">
      <div class="card-header">
        <h2 class="mb-0">Create Your Account</h2>
        <p class="text-muted">Register as a lumber dealer to apply for permits online</p>
      </div>
      
      <div class="card-body">
        <form id="registrationForm" action="processphp/prc_clientregister.php" method="post" role="form" enctype="multipart/form-data">
          
          <h3 class="section-title">Personal Information</h3>
          
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="firstname" class="form-label">First Name *</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="mid_name" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="mid_name" name="mid_name" placeholder="Enter middle name">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="lastname" class="form-label">Last Name *</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name" required>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="email" class="form-label">Email Address *</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  <input type="email" class="form-control" id="email" name="email" placeholder="your.email@example.com" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="Cemail" class="form-label">Confirm Email *</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  <input type="email" class="form-control" id="Cemail" name="Cemail" placeholder="Confirm your email" required>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="mobilenum" class="form-label">Mobile Number *</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                  <input type="tel" class="form-control" id="mobilenum" name="mobilenum" placeholder="09XX XXX XXXX" maxlength="11" required>
                </div>
                <div class="form-text">We'll send a verification code to this number</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="accountType" class="form-label">Account Type</label>
                <select class="form-select" id="accountType">
                  <option selected>Individual Dealer</option>
                  <option>Business Entity</option>
                  <option>Corporation</option>
                </select>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="password" class="form-label">Create Password *</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="password" placeholder="Create a strong password" id="password" required autocomplete="new-password">
                  <span class="input-group-text password-toggle" id="togglePassword">
                    <i class="fas fa-eye"></i>
                  </span>
                </div>
                <div class="form-text">Use 8+ characters with a mix of letters, numbers & symbols</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="confirmPassword" class="form-label">Confirm Password *</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="Cpassword" placeholder="Confirm your password" id="confirmPassword" required autocomplete="new-password">
                  <span class="input-group-text password-toggle" id="toggleConfirmPassword">
                    <i class="fas fa-eye"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
          
          <h3 class="section-title mt-5">Address Information</h3>
          
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="province" class="form-label">Province *</label>
                <select class="form-select" id="province" name="province" required>
                  <option selected disabled value="">Select Province</option>
                  <?php
                    $sql = "SELECT * FROM `province` ORDER BY prov_name ASC";
                    $province_query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($province_query, MYSQLI_ASSOC)) : ?>
                    <option value="<?php echo htmlspecialchars($row["prov_code"], ENT_QUOTES, 'UTF-8'); ?>">
                        <?php echo htmlspecialchars($row["prov_name"], ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                    <?php endwhile; ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="citymun" class="form-label">City/Municipality *</label>
                <select class="form-select" id="citymun" name="citymun" required disabled>
                  <option selected disabled>Select City/Municipality</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="brgy" class="form-label">Barangay *</label>
                <select class="form-select" id="brgy" name="brgy" required disabled>
                  <option selected disabled>Select Barangay</option>
                </select>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label for="streetAddress" class="form-label">Street Address *</label>
                <input type="text" class="form-control" id="streetAddress" placeholder="House no., Street name" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="zip" class="form-label">Postal Code</label>
                <input type="text" class="form-control" placeholder="ZIP code" id="zip" name="zips" readonly>
              </div>
            </div>
          </div>
          
          <h3 class="section-title mt-5">Required Documents</h3>
          
          <div class="form-group">
            <label for="validID" class="form-label">Valid ID *</label>
            <div class="file-upload-container">
              <label class="file-upload-label" for="validID">
                <i class="fas fa-cloud-upload-alt"></i>
                Click to upload or drag & drop
                <div class="small">PNG, JPG, PDF up to 5MB</div>
              </label>
              <input type="file" class="d-none" id="validID" name="my_image1" accept=".png, .jpg, .jpeg, .pdf, image/png, image/jpeg, application/pdf" required>
              <div class="d-flex align-items-center justify-content-center gap-2 mt-2">
                <div class="file-name mb-0" id="validIDFileName">No file chosen</div>
                <button type="button" class="btn btn-sm btn-outline-danger d-none" id="removeValidID" title="Remove file" style="padding: 0.1rem 0.4rem; border-radius: 50%;">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <select class="form-select mt-2" id="idType" required>
              <option selected disabled value="">Select ID Type</option>
              <option>Driver's License</option>
              <option>Passport</option>
              <option>PRC ID</option>
              <option>National ID</option>
              <option>Voter's ID</option>
              <option>UMID</option>
              <option>TIN ID</option>
              <option>SSS ID</option>
              <option>GSIS ID</option>
            </select>
          </div>
          
          <div class="form-group mt-4">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="authLetterToggle">
              <label class="form-check-label" for="authLetterToggle">
                <strong>Authorization Letter Required</strong> (Check if registering on behalf of a company)
              </label>
            </div>
            
            <div class="file-upload-container mt-3" id="authLetterContainer" style="display: none;">
              <label class="file-upload-label" for="authLetter">
                <i class="fas fa-file-contract"></i>
                Upload Authorization Letter
                <div class="small">PDF or scanned document (Up to 5MB)</div>
              </label>
              <input type="file" class="d-none" id="authLetter" name="my_image3" accept=".png, .jpg, .jpeg, .pdf, image/png, image/jpeg, application/pdf">
              <div class="d-flex align-items-center justify-content-center gap-2 mt-2">
                <div class="file-name mb-0" id="authLetterFileName">No file chosen</div>
                <button type="button" class="btn btn-sm btn-outline-danger d-none" id="removeAuthLetter" title="Remove file" style="padding: 0.1rem 0.4rem; border-radius: 50%;">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </div>
          
          <h3 class="section-title mt-5">Terms and Conditions</h3>
          
          <div class="terms-container">
            <h5 class="terms-title">Certificate of Registration as Lumber Dealer</h5>
            <div class="terms-content">
              <p><b>1. The holder of this Certificate of Registration must:</b></p>
              <p>1.1 Display the Certificate of Registration within the establishment's premises exposed to public view;</p>
              <p>1.2 Submit monthly stock purchase and disposition reports every fifth (5th) day of the succeeding month;</p>
              <p>1.3 Allow authorized DENR personnel to inspect the premises of its lumberyard for monitoring and evaluation;</p>
              <p>1.4 Provide information essential to forest law enforcement;</p>
              <p>1.5 Issue sales invoices of lumber sold to end-users and assist buyers in securing transport documents;</p>
              <p>1.6 Buy lumber materials only from approved suppliers with complete transport documents;</p>
              <p>1.7 Maintain cleanliness of its lumberyard;</p>
              <p>1.8 File renewal application within sixty (60) days before expiration;</p>
              <p>1.9 Secure resaw permit if using circular/or band saws;</p>
              <p>1.10 Submit additional lumber supply contract within sixty days.</p>
              
              <p><b>ADDITIONAL CONDITIONS:</b></p>
              <p><b>2. For lumber dealer and lumberyard operator</b></p>
              <p>2.1 This certificate authorizes the holder to purchase lumber from its subsisting lumber supplier;</p>
              <p>2.2 This certificate is subject to all rules and regulations that may hereafter be prescribed.</p>
              
              <p><b>3. Prohibitions</b></p>
              <p>3.1 Using the Certificate as subterfuge in shielding lumber stock of dubious origins;</p>
              <p>3.2 Purchasing logs, posts and piles and lumber that were illegally cut;</p>
              <p>3.3 Establishing any wood processing plant without written authority.</p>
              
              <p><b>4. Causes of cancellation</b></p>
              <p>4.1 Commission of any prohibitions and failure to submit requirements;</p>
              <p>4.2 Certificate secured through fraud;</p>
              <p>4.3 Violation of terms and conditions.</p>
              
              <p><b>5. Penal Provision</b></p>
              <p>5.1 Violators shall be penalized by a fine not more than One Thousand pesos (Php1,000.00) or imprisonment of not more than one (1) year, together with cancellation of the Certificate.</p>
            </div>
          </div>
          
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="termsAgreement" required>
              <label class="form-check-label" for="termsAgreement">
                I have read and agree to the <a href="#" class="text-primary">Terms and Conditions</a> for Certificate of Registration as Lumber Dealer
              </label>
            </div>
          </div>
          
          <div class="action-buttons">
            <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
              <i class="fas fa-arrow-left me-2"></i>Back
            </button>
            <button type="submit" class="btn btn-primary g-recaptcha" data-sitekey="6LeTIY0sAAAAAJDzQT7Atu4lR7NsfUH07D8vNPxc" data-callback='onRegisterSubmit' name="btn" id="registerBtn" disabled>
              Register Account<i class="fas fa-arrow-right ms-2"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <footer class="footer">
    <div class="container">
      <p>© <?php echo date("Y"); ?> Department of Environment and Natural Resources. All rights reserved.</p>
      <p class="mb-0">Online Lumber Dealer Permitting and Monitoring System</p>
    </div>
  </footer>

  <div class="toast-container">
    <div id="liveToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body" id="toastBody">
          </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // reCAPTCHA callback
    function onRegisterSubmit(token) {
        document.getElementById("registrationForm").submit();
    }

    // Global Toast Notification Function
    function showToast(message, type) {
        const toastLiveExample = document.getElementById('liveToast');
        const toastBody = document.getElementById('toastBody');
        const toastHeader = toastLiveExample.querySelector('.d-flex'); 

        toastBody.textContent = message;
        
        // Remove previous classes
        toastLiveExample.classList.remove('bg-success', 'bg-danger');
        toastBody.classList.remove('success', 'error');
        toastHeader.classList.remove('success', 'error');

        // Add new classes based on type
        if (type === 'success') {
            toastLiveExample.classList.add('bg-success');
            toastBody.classList.add('success');
            toastHeader.classList.add('success');
        } else if (type === 'error') {
            toastLiveExample.classList.add('bg-danger');
            toastBody.classList.add('error');
            toastHeader.classList.add('error');
        }

        const toast = new bootstrap.Toast(toastLiveExample);
        toast.show();
    }

    // Toggle password visibility
    function togglePasswordVisibility(inputId, toggleElement) {
      const passwordInput = document.getElementById(inputId);
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      toggleElement.querySelector('i').classList.toggle('fa-eye');
      toggleElement.querySelector('i').classList.toggle('fa-eye-slash');
    }

    document.getElementById('togglePassword').addEventListener('click', function() {
      togglePasswordVisibility('password', this);
    });
    
    document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
      togglePasswordVisibility('confirmPassword', this);
    });
    
    // Toggle authorization letter
    document.getElementById('authLetterToggle').addEventListener('change', function() {
      const authLetterContainer = document.getElementById('authLetterContainer');
      const authLetterInput = document.getElementById('authLetter');
      authLetterContainer.style.display = this.checked ? 'block' : 'none';
      authLetterInput.required = this.checked;
    });
    
    // File upload handling with auto-validation and remove functionality
    function handleFileUpload(inputId, fileNameId, removeBtnId) {
        const input = document.getElementById(inputId);
        const fileNameDisplay = document.getElementById(fileNameId);
        const removeBtn = document.getElementById(removeBtnId);
        
        // Define rules
        const maxSize = 5 * 1024 * 1024; // 5MB limit
        const allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];

        // Handle file selection
        input.addEventListener('change', function(e) {
            if(e.target.files.length > 0) {
                const file = e.target.files[0];

                // Auto-remove if type is invalid
                if (!allowedTypes.includes(file.type)) {
                    showToast('Invalid file type! Please upload a PNG, JPG, or PDF.', 'error');
                    resetFileInput();
                    return;
                }

                // Auto-remove if size exceeds 5MB
                if (file.size > maxSize) {
                    showToast('File is too large! Maximum allowed size is 5MB.', 'error');
                    resetFileInput();
                    return;
                }

                // Passed validation
                fileNameDisplay.textContent = file.name;
                removeBtn.classList.remove('d-none'); // Show the remove button
            } else {
                resetFileInput();
            }
        });

        // Handle manual file removal via button
        removeBtn.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent accidental form submission
            resetFileInput();
        });

        // Helper to reset the input field and UI
        function resetFileInput() {
            input.value = ''; // Clear input value
            fileNameDisplay.textContent = 'No file chosen';
            removeBtn.classList.add('d-none'); // Hide the remove button
        }
    }
    
    // Initialize file upload handlers
    handleFileUpload('validID', 'validIDFileName', 'removeValidID');
    handleFileUpload('authLetter', 'authLetterFileName', 'removeAuthLetter');
    
    // Form validation
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        const email = document.getElementById('email');
        const confirmEmail = document.getElementById('Cemail');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');

        // Reset custom validity
        confirmEmail.setCustomValidity('');
        confirmPassword.setCustomValidity('');

        if (email.value !== confirmEmail.value) {
            confirmEmail.setCustomValidity('Emails do not match.');
            showToast('Emails do not match.', 'error');
            event.preventDefault();
        }

        if (password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity('Passwords do not match.');
            showToast('Passwords do not match.', 'error');
            event.preventDefault();
        }
    });

    // Dependent dropdowns for address
    $(document).ready(function() {
      $('#province').on('change', function() {
        var province_id = this.value;
        $('#citymun').prop('disabled', false).html('<option selected disabled>Loading...</option>');
        $('#brgy').prop('disabled', true).html('<option selected disabled>Select Barangay</option>');
        $('#zip').val('');
        $.ajax({
          url: "provstate.php",
          type: "POST",
          data: { province_data: province_id },
          success: function(result) {
            $('#citymun').html(result);
          }
        });
      });

      $('#citymun').on('change', function() {
        var citymun_id = this.value;
        $('#brgy').prop('disabled', false).html('<option selected disabled>Loading...</option>');
        $.ajax({
          url: "provmun.php",
          type: "POST",
          data: { citymun_data: citymun_id },
          success: function(result) {
            $('#brgy').html(result);
          }
        });

        $.ajax({
          url: "provzip.php",
          type: "POST",
          data: { zip_data: citymun_id },
          success: function(result) {
            $('#zip').val(result);
          }
        });
      });

      // Enable/disable register button based on terms agreement
      const termsCheckbox = document.getElementById('termsAgreement');
      const registerButton = document.getElementById('registerBtn');

      termsCheckbox.addEventListener('change', function() {
          registerButton.disabled = !this.checked;
      });

      // Check for session messages on page load and display toast (ADDED XSS PROTECTION HERE)
      <?php if (isset($_SESSION['toast_message'])): ?>
          showToast('<?php echo htmlspecialchars($_SESSION['toast_message'], ENT_QUOTES, 'UTF-8'); ?>', '<?php echo htmlspecialchars($_SESSION['toast_type'] ?? '', ENT_QUOTES, 'UTF-8'); ?>');
          <?php
          // Clear the session variables after displaying the toast
          unset($_SESSION['toast_message']);
          unset($_SESSION['toast_type']);
          ?>
      <?php endif; ?>

    });
 
    // Retain textbox field values on page reload
    document.addEventListener('DOMContentLoaded', function() {
      const formFields = ['firstname', 'mid_name', 'lastname', 'email', 'Cemail', 'mobilenum', 'streetAddress', 'zip'];

      formFields.forEach(function(fieldId) {
        const field = document.getElementById(fieldId);
        if (field) {
          const savedValue = localStorage.getItem(fieldId);
          if (savedValue) {
            field.value = savedValue;
          }

          field.addEventListener('input', function() {
            localStorage.setItem(fieldId, field.value);
          });
        }
      });

      // Clear localStorage on form submission
      const form = document.getElementById('registrationForm');
      form.addEventListener('submit', function() {
        formFields.forEach(function(fieldId) {
          localStorage.removeItem(fieldId);
        });
      });
    });
   </script>
</body>
</html>