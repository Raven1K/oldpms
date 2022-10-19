<!doctype html>
<html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="cache-control" content="no-cache" />
      <meta http-equiv="Pragma" content="no-cache" />
      <meta http-equiv="Expires" content="-1" />
            
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <title>Online Lumber Dealer Permitting and Monitoring System</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../fonts/css/all.css">
    <script src="js/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>
  
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" > 
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
<div class="timeline">
   <p style="font-size: 30px; font-weight: 600"><i class="fa-solid fa-file"></i> Application Status</p>
   <div class="scroll-bg">
    <div class="scroll-div"style="padding: 10px; width: 780px; height: 800px; overflow: hidden; overflow-y: scroll;">
    <div class="scroll-object">
     <ul>
      <li style="background: #fff;">
        <span style="background: #0d6efd;" id="latestTime"><i class="fa-regular fa-calendar"></i> 28th June 2022</span><br>
        <div class="content">
          <p style="font-size: 12px; margin-left: 2px; color: #888;"><i class="fa-regular fa-clock"></i> 9:02 a.m</p><h5 style="color: #222; font-weight: 600;">Site Validation Schedule for Inspection</h5>
          <p style="color: #222">
            Validation Schedule June 29, 2022 8 a.m Please prepare all the<br>documents for actual verification.<br><br><a href="#" style="text-decoration: none; color: #0d6efd; font-weight: 600; ">Read more..</a>
          </p>
        </div>
      </li>
      <li style="background: #fff;">
        <span style="background: #0d6efd" id="midTime"><i class="fa-regular fa-calendar"></i> 25th June 2022</span>
        <div class="content">
         <p style="font-size: 12px; margin-left: 2px; color: #888;"><i class="fa-regular fa-clock"></i> 3:00 p.m</p><h5 style="color: #222; font-weight: 600;">Service Fee Paid</h5>
          <p style="color: #222">
            Payment received via GCASH.<br>Date posted July 25, 2022 3 p.m<br><br><a href="#" style="text-decoration: none; color: #0d6efd; font-weight: 600;">Read more..</a>
          </p>
        </div>
      </li>
      <li style="background: #fff;">
        <span style="background: #0d6efd" id="oldTime"><i class="fa-regular fa-calendar"></i> 22nd June 2022</span>
        <div class="content">
          <p style="font-size: 12px; margin-left: 2px; color: #888;"><i class="fa-regular fa-clock"></i> 4:30 p.m</p><h5 style="color: #222; font-weight: 600;">Application Accepted</h5>
          <p style="color: #222">
            1. Application form or duly accomplished & sworn/notarized.<br>
            2. Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer<br>
            3. Mayor's Permit/Business Permit<br>
            4. Annual Business Plan<br>
            5. Latest Income Tax Return<br>
            6. Proof of ownership of the lumberyard or consent/agreement with the owner <br><br><a href="#" style="text-decoration: none; color: #0d6efd; font-weight: 600;">Read more..</a>
          </p>
        </div>
      </li>
         </ul>
  </div>
</div>
</div>
</div>
</div>

  </body>
</html>