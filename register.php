<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <title>Online Lumber Dealer Permitting and Monitoring System</title>
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" href="fonts/css/all.css">
   <script src="js/main.js" defer></script>
  </head>
  
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

<div class="custom_container">
<div class="custom-card text-center" style=" border-color: #ecedf0;">
  <div class="custom-card-header" style="background-color: #ecedf0; cursor: pointer; border-color: #2987ce; border-width: thick;">
    <ul class="nav nav-tabs custom-card-header-tabs" style="border-color:#ecedf0;">
        <li class="nav-item">
          <a class="nav-link disabled" style="cursor: pointer;"><img src="images\oldpmslogoreg.png"></a>
        </li>
        <li class="nav-item" style="margin-left: 75px; margin-top: 30px;">
          <a class="nav-link active" aria-current="true" style="background-color: #2987ce; border-width: thin; border-color: #2987ce; cursor: default;">
            <span style="font-weight: 900; color: #fff;"><img src="images\vector.png" style="margin-right: 2px; margin-bottom: 3px;">REGISTRATION</span></a>
        </li>
    </ul>
  </div>
  <div class="custom-card-body" style="padding: 25px;">
    <h5 class="custom-card-title"></h5>
    <p style="width: 100%; text-align: left; font-size: 20px; margin-left: 2px; color: #808080;">Create a new account.</p>
        <p class="custom-card-text">
            <div class="container" style="position: relative; background-color: #ffffff; padding: 2px;">
              <div class="row align-items-start">
                <div class="col">
                  <div class="row">
                    <div class="col" style="position: relative;">



                    <form action="processphp/prc_clientregister.php"  method="post" role="form" >
                    
                    enctype="multipart/form-data" >
<!-- for  multilingual file back end reciptional  -->

                              <input style="margin-bottom: 5px;" type="text" class="form-control user_firstname" placeholder="First Name*" aria-label="first_name" name="firstname">
                              <input style="margin-bottom: 5px;" type="email" class="form-control user_email" placeholder="E-Mail*" aria-label="last_name" name="email">
                          <form class="row g-3" style="margin-bottom: 10px;">
                              <div class="col-auto" style="width: 100%;">
                              <input type="number" style="font-size:15px;" class="form-control user_mobileno" placeholder="Mobile No.*" name="mobilenum"></div>
                       
                              <input style="margin-bottom: 5px;" type="password" class="form-control user_password" placeholder="Password*" aria-label="pw" name="password"></div>
                    <div class="col">
                              <input style="margin-bottom: 5px;" type="text" class="form-control user_middlename" placeholder="Middle Name*" aria-label="last_name" name="mid_name">
                              <input style="margin-bottom: 5px;" type="text" class="form-control user_lastname" placeholder="Last Name*" aria-label="last_name" name="lastname">
                              <input style="margin-bottom: 5px;" type="email" class="form-control user_confirm_email" placeholder="Confirm E-Mail*" aria-label="confirm_email" name="Cemail">
                              <button style="margin-bottom: 8px; width: 100%;" type="button" class="btn btn-danger verify_yournoBtn"data-bs-toggle="modal" data-bs-target="#staticBackdrop2"><span style="font-size: 13px; font-weight: 500">Verify Your Mobile No.</span></button>
                              <input style="margin-bottom: 5px;" type="password" class="form-control user_confirm_password" placeholder="Confirm Password*" aria-label="confirm_pw" name="Cpassword"></div></div>
                              <br>
                              <div class="mb-3">
                              <label style="font-size: 12px; float: left;">Upload a copy of your Company ID / Any Non-Government Issued ID</label>
                              <input class="form-control formFileMultiple1" type="file" id="formFileMultiple" name="my_image1" multiple>
                              </div>
              <scrip>
                              <?php if (isset($_GET['error'])): 
                                if(isset($_POST['my_image1']))
                                  {
                      
                                    if ($error === 0) 
                                    {
                                      if ($img_size > 1125000) 
                                      {
                                          $em = "Sorry, your file is too large.";
                                          header("Location: ../univmodal.php?error=$em");
                          
                                      }

                                      else;

                                    }
                             
                                  

                                  }
                                endif;

                              ?>

                                </script>

                               <div class="mb-3">
                              <label style="font-size: 12px; float: left;">Upload a copy of your Government Issued ID</label>
                              <input class="form-control formFileMultiple2" type="file" id="formFileMultiple"  name="my_image2" multiple>
                              </div>
                               <div class="mb-3">
                              <label style="font-size: 12px; float: left;">Upload Company's Authorization Letter</label>
                              <input class="form-control formFileMultiple3" type="file" id="formFileMultiple"  name="my_image3" multiple>
                              </div></div></p>
                              <center>
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 250px; border-radius: 7px; background-color: #2987ce;">Register</button>
                            </center>


<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           <br><br>
<div class="modal-body">
             <img src="images/verification.png"><br><br><br>
             <label style="font-weight: 700; font-size: 20px;">Authenticate Your Account</label>
             <label style="font-weight: 400; color:#808080; font-size: 15px; color: #696969;">Please confirm your account<br>by entering the verification code sent to</label>
             <label style="font-weight: 600; font-size: 16px; font-size: 15px; color: #525252">***-****-0909.</label><br>
               <input type="number" style="font-weight: 300; width: 100px; font-size: 45px;color: #525252; text-align: center; border-bottom-color: #000; border-top-color: #fff; border-right-color: #fff; border-left-color: #fff;" class="form-control" id="exampleFormControlInput1" placeholder=""><br>
            </div>
            <div class="modal-footer">
              <label style="font-size: 13px; color: #696969; width: 80%; text-align: left; text-decoration: none;">It may take a minute to receive your code.<br>Haven't received it? <a href="  #" style="color: #3E8CFF; cursor: pointer; font-weight: 500;">Resend a new code</a></label>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
            </div>
          </div>
        </div>
      </div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
  <div class="modal-dialog" style="margin-top: 7%;">
    <div class="modal-content" >
      <div class="custom_modal-header">
        <h5 class="modal-title" id="staticBackdropLabel" style="text-align: center; font-size:20px;">Terms and Conditions</h5>
      </div>
      <div class="custom_modal-body">
        <p style="position: absolute; font-size: 12px; font-family: Sans-serif; color: #808080; font-weight:100;">The following Terms and Conditions contain significant agreements involving all users of DENR Caraga Online Lumber Dealer Permitting and Monitoring System (Online LDPMS). We therefore advise you to please review these terms and conditions carefully and indicate whether you agree or disagree to them by clicking on the corresponding box towards the end of this document.
        <br>
        <br>
           All the terms "You", "Your" and "Yours" will refer to the Online Lumber Dealer Permitting & Monitoring System (OLDPMS) user. The terms "We", "Us" and "Our" refer to DENR Caraga. The words "System" refer to Online PMS.
        <br>
        <br>

            Your Username is the email address that you have provided in the registration page. The phrase "your access" or "system account" refers to the combination of your email address and password that you have registered in the system. The term "username" and "email address" will be used interchangeably to refer to the set of characters that you use to access the system.
        <br>
        <br>
            The term "Confidential Business Information (CBI)" refers to an information considered as trade secret, i.e., an information which: (a) is secret in the sense that it is not, as a body or in the precise configuration and assembly of its components, generally known among or readily accessible to persons within the circles that normally deal with kind of information in question; (b) has commercial value because it is secret; (c) has been subject to reasonable steps under the circumstance, by the person lawfully in control of the information, to keep it secret. The phrase “disclosing party” is the company that have or made the CBI declaration or submission.
        <br>
        <br>
            TERMS AND CONDITIONS
        <br>
        <br>
            1. USER ACCESS</p>
      </div>

      <div class="modal-footer">
              <button type="button" class="btn btn-danger declineBtn" data-bs-dismiss="modal">Decline</button>
              <button class="btn  btn-success" name="btn"> Accept </button>
              <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="acceptBtn" style="background-color: #2987ce;" name="btn">Accept</button> -->
      </form>
      </div>
    </div>
  </div>
</div>
</center>
</div>
  </div>
    </div>

<div class="position-fixed top-0 end-0 p-3" style="z-index: 11;">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style=" background-color: #d1e7dd;">
    <div class="toast-header" style=" background-color: #d1e7dd; color: #658251">
      <strong class="me-auto"><img src="images/alert_success.png"> Registered Successfully!</strong>
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
