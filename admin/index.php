


<!doctype html>
<html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <title>OLDPMS</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../fonts/css/all.css">
    <script src="js/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  </head>
  
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <input type="file" id="realfile"  hidden="hidden" accept="Application/pdf" value=""/>
    <input type="file" id="realfile2" hidden="hidden" accept="Application/pdf" value=""/>
    <input type="file" id="realfile3" hidden="hidden" accept="Application/pdf" value=""/>
    <input type="file" id="realfile4" hidden="hidden" accept="Application/pdf" value=""/>
    <input type="file" id="realfile5" hidden="hidden" accept="Application/pdf" value=""/>
    <input type="file" id="realfile6" hidden="hidden" accept="Application/pdf" value=""/>

    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
      
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 5px;"> 
  <div class="container-fluid">
     <a href="index.php"><img src="../images/oldpmslogo.png" alt="oldpms" height="40"></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <a class="navbar-brand" href="index.php"><strong>ONLINE LUMBER DEALER PERMITTING & MONITORING SYSTEM</strong></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           <li class="nav-item">
           <a class="nav-link active" aria-current="page" href="#"></a>
           </li>
        </ul>
          <form class="d-flex">
          
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown" style="margin-right: 10px;">
          <a href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-circle-user text-white style"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li>
              <a class="dropdown-item" href="#">Profile</a>



              <form action="../processphp/prc_logout.php"  method="post" role="form" >

               <button class="btn  btn-success" name="Log-out">Logout</button>
               <button class="btn  btn-success" name="btn"> Logout </button>

</form>
     </li>
          </ul>
        </li>
      </ul>
    </div>
           <a class="navbar-brand" style="font-family:Trebuchet MS; color:#312f31; font-size:20px; color: #fff; font-weight: bold;"><b>Juan, Client</b></a>
         </form>
      </div>
    </div>
  </nav>
<div class="bodytime">
    <form action="#" class="form">
      <div class="form-step form-step-active">
        <div class="input-group">
         <div class="container mt-3">
         <div class="row">
          <div class="col">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="Office*" aria-label="Office">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="Enter your full name*" aria-label="Enter your full name" >
          </div>
        </div>
         <div class="row">
          <div class="col">
            <select class="form-select" id="autoSizingSelect" style="margin-top: 10px; width: 330px; ">
              <option selected>Office Role</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>
          <div class="row">
          <div class="col">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="Username*" aria-label="Username">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="Password*" aria-label="Password" >
          </div>
        </div>
          <div class="row">
          <div class="col">
            <select class="form-select" id="autoSizingSelect" style="margin-top: 10px; width: 330px; ">
              <option selected>User Role</option>
              <option value="1">Evaluator</option>
              <option value="2">Reviewer</option>
              <option value="3">CENRO Recommender</option>
              <option value="3">CENRO Approver</option>
              <option value="3">PENRO Reviewer</option>
              <option value="3">PENRO Recommender</option>
              <option value="3">PENRO Approver</option>
              <option value="3">RO Evaluator</option>
              <option value="3">RO Reviewer</option>
              <option value="3">RO Recommender</option>
              <option value="3">RO Approver</option>
              <option value="3">RO Archiver</option>
            </select>
          </div>
        </div>
        <div class="">
        <center><a href="#" class="custom_btn btn-next width-50" style="font-family: system-ui; font-weight: 500; font-size: 16px; margin-top: 50px;">Proceed<i class="fa-solid fa-circle-arrow-right" style="margin-left: 10px;"></i></a></center>
        </div>
      </div>
</div>
</div>
  </body>
</html>