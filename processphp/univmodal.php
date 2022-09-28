<?php

session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Demo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>s





<script>
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
</script>
</head>
<body>
<div id="myModal" class="modal fade">
  <form method="post" class="form-control">
    <div class="modal-dialog modal-fullscreen-xxl">
        <div class="modal-content">
            <div class="modal-header">
               <div class="modal-body">
                <div class="form-group">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      main > .container {
        padding: 60px 15px 0;
        }
    </style>

<input type="submit" value="OK" class="btn btn-primary btn-lg mt-3 mb-4" name="btn" data-loading-text="Loading...">

<?php if (isset($_GET['error'])): 
  
  
  if(isset($_POST['btn']))
  {


    $strg1 = "Your Message Has Been Send" ;
    $strg2 = "Invalid password." ;
    $strg3 = "Please Fill in the Blanks" ;
    $strg4 = "The email address is already registered!" ;
    $strg5 = "Password Not Matched" ;
    $strg6 = "Confirm Email Not Match" ;
    
    
    

    $strgGet = $_GET['error'] ;

   if ($strgGet == $strg1){

   header("Location: ../");
   }

   elseif ($strgGet == $strg2){
    header("Location: ../login.php");
  }
  
  elseif ($strgGet == $strg3){
    header("Location: ../register.php");
  }

  elseif ($strgGet == $strg4){
    // echo 'onclick="history.back(-1)" />';
     header("Location: ../register.php");
  }

  elseif ($strgGet == $strg5){
    // echo 'onclick="history.back(-1)" />';
     header("Location: ../register.php");
  }

  elseif ($strgGet == $strg6){
    // echo 'onclick="history.back(-1)" />';
     header("Location: ../register.php");
  }


  



}
  ?>
		<p>   <?php echo $_GET['error']; ?></p>






  <?php
 
?>
	<?php endif ?>
</head>
  <body class="d-flex flex-column">

  <main class="flex-shrink-0">
    <div class="container">

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
