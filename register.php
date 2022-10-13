<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <title>Online Lumber Dealer Permitting and Monitoring System</title>
   <link rel="stylesheet" type="text/css" href="client/css/style.css">
   <link rel="stylesheet" href="fonts/css/all.css">
   <script src="client/js/main.js" defer></script>
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
          <a class="nav-link disabled" style="cursor: pointer;"><img src="images/oldpmslogoreg.png"></a>
        </li>
        <li class="nav-item" style="margin-left: 75px; margin-top: 30px;">
          <a class="nav-link active" aria-current="true" style="background-color: #2987ce; border-width: thin; border-color: #2987ce; cursor: default;">
            <span style="font-weight: 900; color: #fff;"><img src="images/vector.png" style="margin-right: 2px; margin-bottom: 3px;">REGISTRATION</span></a>
        </li>
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



                    <form action="processphp/prc_clientregister.php"  method="post" role="form" enctype="multipart/form-data" >
                    
             <!--      < enctype="multipart/form-data" >-->
<!-- for  multilingual file back end reciptional  -->

                              <input style="margin-bottom: 5px;" type="text" class="form-control user_firstname" placeholder="First Name*" aria-label="first_name" name="firstname">
                              <input style="margin-bottom: 5px;" type="text" class="form-control user_middlename" placeholder="Middle Name*" aria-label="last_name" name="mid_name">
                              <input style="margin-bottom: 5px;" type="text" class="form-control user_lastname" placeholder="Last Name*" aria-label="last_name" name="lastname">
                              <form class="row g-3" style="margin-bottom: 10px;">
                              <div class="col-auto" style="width: 100%;"></div>
                              <input type="text" style="font-size:15px; margin-bottom: 8px;" class="form-control user_mobileno" onkeypress="return restrictAlphabets(event)" placeholder="Mobile No.*" name="mobilenum">
                              <button style="margin-bottom: 8px; width: 100%;" type="button" class="btn btn-danger verify_yournoBtn"data-bs-toggle="modal" data-bs-target="#staticBackdrop2"><span style="font-size: 13px; font-weight: 500">Verify Your Mobile No.</span></button></div>
                       
                              
                              <div class="col">
                              

                              <input style="margin-bottom: 5px;" type="email" class="form-control user_email" placeholder="E-Mail*" aria-label="last_name" name="email">
                              <input style="margin-bottom: 5px;" type="email" class="form-control user_confirm_email" placeholder="Confirm E-Mail*" aria-label="confirm_email" name="Cemail">                              
                              <input style="margin-bottom: 5px;" type="password" class="form-control user_password" placeholder="Password*" aria-label="pw" name="password">
                              
                              <input style="margin-bottom: 5px;" type="password" class="form-control user_confirm_password" placeholder="Confirm Password*" aria-label="confirm_pw" name="Cpassword">
                              

                              </div></div>
                              <br>
                              <div class="mb-3">
                              <i><label style="font-size: 12px; float: left;">Upload a copy of your Valid ID*</label></i>
                              <input class="form-control formFileMultiple1" type="file" id="formFileMultiple" name="my_image1" multiple>
                              </div>
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

                               <div class="mb-3">
                              <i><label style="font-size: 12px; float: left;">Upload Company's Authorization Letter*</label></i>
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
               <input type="text" style="text-align: center; font-size: 26px; border-color: white; border: 0;" placeholder="123-456-789" onkeypress="return restrictAlphabets(event)"><br>
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
        <h5 class="modal-title" id="staticBackdropLabel" style="text-align: center; font-size:20px;">Terms and Conditions For<br>Certificate Of Registration as Lumber Dealer</h5>
      </div>
      <div class="custom_modal-body">
        <p style="position: absolute; font-size: 12px; font-family: Sans-serif; color: #808080; font-weight:100;">1. The holder of this Certificate of Registration must:
        <br>
        <br>
          1.1   Display the Certificate of Registration within the establishment’s premises exposed to public   view;
          <br>
1.2   Submit to the concerned CENR Office of monthly stock purchase and disposition reports every the fifth (5th) day of the succeeding month to include, among others, the following:
<br>
1.2.1 Balance of previous month;
<br>
1.2.2 Purchase(s) made during the month under report;
<br>
1.2.3 Total volume/quantity handled;
<br>
1.2.4 Volume sold;
<br>
1.2.5 Balance at the end of the month; and
<br>
1.2.6 Statement resources.
<br>
1.3   Allow authorized DENR personnel to inspect the premises of its lumberyard for monitoring and evaluation.
<br>
1.4   Provide information and/or intelligence essential to forest law enforcement, more particularly on Violation of RA-1239, RA No. 460 and PD 705, as amended, giving the names and addresses of the violators and the nature of violations.
<br>
1.5   Issues sales invoices of lumber sold to end-user and assist buyer in securing transport   documents when lumber is sold outside the province.<br>
1.6   Buy lumber materials only from approved suppliers and other legitimate sources with   complete transport documents.<br>
1.7   Maintain cleanliness of its lumberyard by establishing and maintaining solid wastes   management facilities, and observance of the proper disposal of wastes.<br>
1.8   File the renewal application within sixty (60) days before it expire. Failure is construed that the registrant is no longer interested to pursue the trade.<br>
1.9   Secure resaw permit immediately upon receipt hereof if using circular/or band saws  complementary to its lumber dealership.<br>
1.10   Submit additional lumber supply contract from legitimate sawmill operator and/or lumber dealers, within sixty days upon receipt hereof.<br>

     <br>ADDITIONAL CONDITIONS:<br>

2.  For lumber dealer and lumberyard operator<br>

2.1.  This certificate authorizes the holder hereof to purchase lumber from its subsisting lumber supplier and that lumber purchased are for domestic sale especially for the immediate community. The purchase of lumber from other sources other than its subsisting supplier is not allowed under this certificate.<br>
2.2.  This certificate is likewise subject to all rules and regulations that the Bureau of forest Development may hereafter prescribe.<br>
2.3.  Violation shall be the same as the above in log dealership which are stipulated in No. 1 & 2 of the additional laws, rules and regulations.<br>

3.  Prohibitions<br>

3.1.  To use the Certificate of Registration as subterfuge in shielding lumber stock of dubious origins.<br>
3.2.  To purchase logs, post and piles and lumber that were illegally cut.<br>
3.3.  To establish any wood processing plant, e.g., sawmill, mini-sawmill and/or other powered saws that can slice logs, flitches, post and piles into pieces of lumber, unless with expressed written authority issued by the DENR.<br>

4.  Causes of cancellation<br>

4.1.  Commission of the folder hereof and/or his authorized representatives/agents of any of the above-prohibitions and failure to submit of the above-stated basic requirements on its operations as lumber dealer;<br>
4.2.  When found out that the Certificate of Registration was secured through fraud.<br>
4.3.  For any violation of the terms and conditions of the registration, the provision of R.A. 1239 and PD No. 705, as amended, or the Internal Revenue Laws and Regulations.<br>

5.  Penal Provision<br>

5.1.  In consonance with the provisions of R.A. 1239, persons found directly or indirectly responsible for violation of any provisions of this order or the terms and conditions stipulated in the Registration Certificate shall be penalized by a fine not more than One Thousand pesos (Php1,000.00) or imprisonment of not more than one (1) year, together with the cancellation of the Certificate of Registration.<br>
5.2.  Lumber stock found inside yard/storage site that are not supported with proper documents usually required by the DENR are presumed to be illegal and would be subjected to seizure and confiscation in accordance with the pertinent provisions of DAO No. 97-32.<br>

6.  Reference and Record<br>

6.1.  Copy of Certificate of Registration upon approval shall be copy furnished to the PENRO, CENRO concerned (except NCR), and Forest Management Bureau for reference and record purposes.<br>
</p>
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

 function restrictAlphabets(e){
  var x = e.which || e.keyboard;
  if ((x >= 48 &&  x <= 57))
    return true;
  else
    return false;
 }
</script>
</body>
</html>
