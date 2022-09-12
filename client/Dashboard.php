<!doctype html>
<html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <title>Online Lumber Dealer Registration and Monitoring System</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="fonts/css/all.css">
   <script src="js/script.js" defer></script>
  </head>
  
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->


      
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <div class="container-fluid">
      <a class="navbar-brand"> <i class="fa-solid fa-house text-white"></i></a>
      <a class="navbar-brand" href="#" style="font-family: Candara; color:#312f31; font-size:20px; color: #fff; font-weight: bold;">ONLINE LUMBER DEALER REGISTRATION AND MONITORING SYSTEM</a>
    
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
          <i class="fa-solid fa-bars text-white"></i>
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
           <a class="navbar-brand" style="font-family:Trebuchet MS; color:#312f31; font-size:20px; color: #fff; font-weight: bold;"><b>Welcome, Guest</b></a>
         </form>
      </div>
    </div>
  </nav>

    <form action="#" class="form">
      <!-- Progress bar -->
      <div class="progressbar">
        <div class="progress" id="progress"></div>
        <div
          class="progress-step progress-step-active"
          data-title="Requirements"
        ></div>
        <div class="progress-step" data-title="Basic Information"></div>
        <div class="progress-step" data-title="Attachment"></div>
      </div>

      <!-- Requirements -->
      <div class="form-step form-step-active">
        <div class="input-group">
         <div class="container mt-3">
          <h2 class="text-center" style="font-family: system-ui; font-weight: 600"><i class="fa-regular fa-rectangle-list" style="margin-right: 15px;"></i>Requirements</h2><br>
            <center><p style="font-family: system-ui; background: #d1e7dd; word-wrap: normal;  width:100%; word-wrap:break-word; font-size: 15px; font-weight: 550;"><i>Please download and fill up the forms below. Print the completed forms for notarial purposes. Once<br>notarized, return to the system and locate the REQUIREMENTS FORM Browse to upload the scan copy.<br>you need to have pdf reader installed to open these files.</p></i><br>
            <p style="font-family: system-ui; font-weight: 400; text-align: justify; text-justify: inter-word; font-size: 17px;">
              1. Application form or duly accomplished & sworn/notarized. <a style="color: #0645AD;" href="#"><u>Download Fillable Form</u></a><br>
              2. Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer.<br>
              3. Mayor's Permit/Business Plan<br>
              4. Annual Business Plan<br>
              5. Latest Income Tax Return<br>
              6. Proof of ownership of the lumberyard or consent/agreement with the owner<br><br>
              <strong>Provided after DENR CENRO Personnel site inspection.</strong><br>
              1. Forestry Administrative Fees<br>
              2. Pictures of lumberyard/establishment</p><br></center>
               <center><h4 style="font-family: system-ui; font-weight: 500; font-size: 15px;">Click proceed if all requirements are completed and ready to upload.</h4></center>
            </div>
          </div>
        <div class="">
          <center><a href="#" class="custom_btn btn-next width-50" style="font-family: system-ui; font-weight: 500; font-size: 16px;">Proceed<i class="fa-solid fa-circle-arrow-right" style="margin-left: 10px;"></i></a></center>
        </div>
      </div>

      <!-- Basic Information -->
      <div class="form-step">
        <div class="input-group">
            <h3 class="text-center" style="font-family: system-ui; font-weight: 600;"><u>Permittee's Basic Information</u></h3>
         <div class="row">
          <div class="col"><br>
          <input style="width: 330px;" type="text" class="form-control" placeholder="First Name*" aria-label="First name" >
          </div>
          <div class="col"><br>
          <input style="width: 330px;" type="text" class="form-control" placeholder="Last Name*" aria-label="Last name">
          </div>
        </div>
         <div class="row">
          <div class="col">
            <select class="form-select" id="autoSizingSelect" style="margin-top: 10px; width: 330px; ">
              <option selected>Application Type</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="col">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="Business Name*" aria-label="Business name">
          </div>
        </div>
          <div class="row">
          <div class="col">
            <select class="form-select" id="autoSizingSelect" style="margin-top: 10px; width: 330px; ">
              <option selected>Province</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="col">
            <select class="form-select" id="autoSizingSelect" style="margin-top: 10px; width: 330px; ">
              <option selected>City/Municipality</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>
          <div class="row">
          <div class="col">
            <select class="form-select" id="autoSizingSelect" style="margin-top: 10px; width: 330px; ">
              <option selected>Barangay</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="col">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="Zip Code" aria-label="Zip code">
          </div>
        </div>
          <div class="row">
          <div class="col">
          <input style="width: 685px; margin-top: 10px;" type="text" class="form-control" placeholder="Street/Corner/Purok*" aria-label="Street/corner/purok" >
          </div>
        </div>
          <div class="row">
          <div class="col">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="E-Mail (Optional)*" aria-label="Email" >
          </div>
          <div class="col">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="Mobile No.*" aria-label="Mobile no">
          </div>
        </div>
        
        </div>
        <div class="btns-group">
          <a href="#" class="custom_btn_prev custom_btn btn-prev">Back</a>
          <a href="#" class="custom_btn_next custom_btn btn-next">Next<i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i></a>
        </div>
      </div>
      <!-- Attaching Required Documents -->
      <div class="form-step">
        <div class="input-group">
            <h3 class="text-center" style="font-family: system-ui; font-weight: 600"><u>Attaching Required Documents</u></h3>
          
        <table class="table table-striped">
          <tbody>
              <tr class="table-active">
                <th scope="row">1</th>
                <td colspan="2" class="table-active">sample</td>
                <td>sample</td>
              </tr>
              <tr class="table-active">
                <th scope="row">2</th>
                <td colspan="2" class="table-active">sample</td>
                <td>sample</td>
              </tr>
               <tr class="table-active">
                <th scope="row">3</th>
                <td colspan="2" class="table-active">sample</td>
                <td>sample</td>
              </tr>
          </tbody>
        </table>

        </div>
        <div class="btns-group">
          <a href="#" class="custom_btn_prev custom_btn btn-prev">Back</a>
          <button type="button" class="btn btn-success" data-bs-toggle="modal" id="acceptBtn">Submit</button>
        </div>
      </div>
    </form>

   
<div class="position-fixed top-0 end-0 p-3" style="z-index: 11;">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style=" background-color: #d1e7dd;">
    <div class="toast-header" style=" background-color: #DFF0FA; color: #5C7585">
      <strong class="me-auto"><i class="fa-solid fa-circle-check text: #5C7585;"></i> File Submitted!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
</div>

<script>
var toastTrigger = document.getElementById('acceptBtn')
var toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
  toastTrigger.addEventListener('click', function () {
    var toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
  })
}
</script>
  </body>
</html>