<?php
session_set_cookie_params([
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();

// Custom error handler
set_error_handler(function($errno, $errstr, $errfile, $errline) {
  $_SESSION['error_message'] = "Error: $errstr in $errfile on line $errline";
});

// Example usage (remove in production)
// trigger_error("Test error!", E_USER_WARNING);
?>
<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  <link rel="icon" href="images/oldpmstabicon.png" type="image/png">
  <!-- Fontawesome Icons-->
  <link rel="stylesheet" href="fonts/css/all.css">

  <!-- Cuztomize Styles-->
  <link rel="stylesheet" href="css/mystyle.css">


  <title>DENR Caraga OLDPMS</title>
    <title>Online Lumber Dealer Registration & Monitoring System</title>

    <!-- add icon link -->
    <link rel="icon" href="images/logoicon.png" type="image/icon type">


  </head>
  <body>
  <?php 
    require_once 'navbar.php';
    require_once 'hdrslide.php';
    require_once 'requirement.php';
    require_once 'about.php';
    require_once 'contact.php';
    require_once 'footer.php';
  ?>

  <?php if (!empty($_SESSION['error_message'])): ?>
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
      <?php echo htmlspecialchars($_SESSION['error_message']); unset($_SESSION['error_message']); ?>
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    </div>
  </div>
  <script>
    window.addEventListener('DOMContentLoaded', function() {
    var toastEl = document.getElementById('errorToast');
    var toast = new bootstrap.Toast(toastEl);
    toast.show();
    });
  </script>
  <?php endif; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
