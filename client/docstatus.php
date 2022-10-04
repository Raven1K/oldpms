<!doctype html>
<html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <title>Online Lumber Dealer Permitting and Monitoring System</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../fonts/css/all.css">
    <script src="js/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  </head>
  
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
                <a class="dropdown-item" href="#">Logout</a>
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

  <div class="card" style="width: 1000px;  padding: 0; align-items: center;display: flex;margin: auto;margin-top: 5%;">
  <div class="card-body">
  <center>
    <h2 class="text-center" style="font-family: system-ui; font-weight: 600">Status of Documents Uploaded</h2>
    <p style="font-family: system-ui; word-wrap: normal;  width:100%; word-wrap:break-word; font-size: 20px; font-weight: 300;">Click <b>'Browse'</b> to select the corresponding electronic copy of document.<br><span style="color:red;">Note: Only PDF File not larger than 10 MB is allowed.</span></p><br></p>
  </center>

      <table class="table table-striped" style="width: 900px;">
        <tr>
          <th colspan="2" style="background: #597EFB; color: #fff; font-weight: 300;">DOCUMENTS</th>
           <th style="background: #597EFB; color: #fff; font-weight: 300;"> </th>
          <th style="background: #597EFB; color: #fff; font-weight: 300 ;width: 100px;">File Size</th>
        </tr>

        <tr>
            <td style="border-right-color: #fff;">
            <span id="custom-text" style="font-size: 13px; color: #808080;">Application form or duly accompished & sworn/notarized.</span>
            </td>
            <td align="center" style="width: 50px;">
            <p style="font-family: system-ui; background: #32CD32; border-radius: 3px; color: white; width:70px; word-wrap:break-word; font-size: 11px; font-weight: 500;">Accepted</p>
            </td>
             <td align="center">
            <button type="button" id="custom-button" class="btn btn-sm" style="background: #ffaa00; color: white; font-size: 12px; width: 90px; height:30px; font-weight: 500;">Details</button>
            </td>
            <td align="center" style="color: #808080; font-size: 15px;" id="mb1"></td>
        </tr>

        <tr>
            <td style="border-right-color: #fff;">
            <span id="custom-text2" style="font-size: 12px; color: #808080;">Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer</span>
            </td>
           <td align="center">
             <p style="font-family: system-ui; background: #32CD32; border-radius: 3px; color: white; width:70px; word-wrap:break-word; font-size: 11px; font-weight: 500;">Accepted</p>
            </td>
             <td align="center">
                  <button type="button" id="custom-button" class="btn btn-sm" style="background: #ffaa00; color: white; font-size: 12px; width: 90px; height:30px; font-weight: 500;">Details</button>
            </td>
            <td align="center" style="color: #808080; font-size: 15px; "id="mb2"></td>
        </tr>

        <tr>
            <td style="border-right-color: #fff;">
            <span id="custom-text3" style="font-size: 13px; color: #808080;">Mayor's Permit/Business Permit</span>
            </td>
            <td align="center">
            <p style="font-family: system-ui; background: #32CD32; border-radius: 3px; color: white; width:70px; word-wrap:break-word; font-size: 11px; font-weight: 500;">Accepted</p>
            </td>
             <td align="center">
           <button type="button" id="custom-button" class="btn btn-sm" style="background: #ffaa00; color: white; font-size: 12px; width: 90px; height:30px; font-weight: 500;">Details</button>
            </td>
            <td align="center" style="color: #808080; font-size: 15px;"id="mb3"></td>
        </tr>

        <tr>
            <td style="border-right-color: #fff;">
            <span id="custom-text4" style="font-size: 13px; color: #808080;">Annual Business Plan</span>
            </td>
             <td align="center">
            <p style="font-family: system-ui; background: #32CD32; border-radius: 3px; color: white; width:70px; word-wrap:break-word; font-size: 11px; font-weight: 500;">Accepted</p>
            </td>
             <td align="center">
          <button type="button" id="custom-button" class="btn btn-sm" style="background: #ffaa00; color: white; font-size: 12px; width: 90px; height:30px; font-weight: 500;">Details</button>
            </td>
            <td align="center" style="color: #808080; font-size: 15px;"id="mb4"></td>
        </tr>

        <tr>
            <td style="border-right-color: #fff; ">
            <span id="custom-text5" style="font-size: 13px; color: #808080;">Latest Income Tax return</span>
            </td>
           <td align="center">
            <p style="font-family: system-ui; background: red; border-radius: 3px; color: white; width:70px; word-wrap:break-word; font-size: 11px; font-weight: 500;">DisApproved</p>
            </td>
             <td align="center">
          <button type="button" id="custom-button" class="btn btn-sm" style="background: #ffaa00; color: white; font-size: 12px; width: 90px; height:30px; font-weight: 500;">Details</button>
            </td>
            <td align="center" style="color: #808080; font-size: 15px;"id="mb5"></td>
        </tr>

        <tr>
            <td style="border-right-color: #fff;">
            <span id="custom-text6" style="font-size: 13px; color: #808080;">Proof of ownership of the lumberyard or consent/agreement with the owner</span>
            </td>
            <td align="center">
            <p style="font-family: system-ui; background: #32CD32; border-radius: 3px; color: white; width:70px; word-wrap:break-word; font-size: 11px; font-weight: 500;">Accepted</p>
            </td>
             <td align="center">
    <button type="button" id="custom-button" class="btn btn-sm" style="background: #ffaa00; color: white; font-size: 12px; width: 90px; height:30px; font-weight: 500;">Details</button>
            </td>
            <td align="center" style="color: #808080; font-size: 15px;"id="mb6"></td>
        </tr>
      </table>
  </div>
</div>


  </body>
</html>