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
    <input type="file" id="invalidfile" hidden="hidden" accept="Application/pdf" value=""/>

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

  <div class="card" style="width: 800px;  padding: 0; display: flex;margin: auto;margin-top: 5%; background: #ecedf0; border-color: #ecedf0;;">
  <div class="card-body">
  <center>
    <h2 class="text-center" style="font-family: system-ui; font-weight: 600">Application Status</h2><br>
  </center>

    <div class="card" style="margin-bottom: 20px;" >
    <div class="card-body" >
    <div class="card mb-3" style="max-width: 500px; background: white; border-color: white;">
        <div class="row g-0" style="align-items: center; padding: 0px;">
        <div class="col-md-4">
        <span id="custom-text" style="font-size: 13px; color: #808080;">
        <div class="date" style="margin-left: 45px;">
        <p>25 <span>May</span></p>
        </div>
        </span>
        </div>
                <div class="col-md-8">
                  <div class="card-body" >
                    <h5 class="card-title" style="font-size: 15px; font-weight: 700">Site Validation Schedule for Inspection</h5>
                    <p class="card-text" style="color: #7b8685;">Validation Schedule June 29, 2022 8 a.m Please prepare all the<br>documents for actual verification.</p>
                     <p class="card-text"><a href="#">Read more</a></p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
        </div>
        </div>
        </div>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>
    <li class="page-item active" aria-current="page">
      <span class="page-link">1</span>
    </li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

     


<script type="text/javascript">
  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
  $(window).load(function(){
$('[data-bs-toggle="popover"]').popover();
$('body').on('click', function (e) {
    $('[data-bs-toggle="popover"]').each(function () {
        if (!$(this).is(e.target) && 
             $(this).has(e.target).length === 0 && 
             $('.popover').has(e.target).length === 0) {
            $(this).popover('hide');
        }
    });
});
});

 var toastTrigger = document.getElementById('liveToastBtn')
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