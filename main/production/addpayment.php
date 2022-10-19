<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Fontawesome Icons-->
    <link rel="stylesheet" href="fonts/css/all.css">

    <!-- Cuztomize Styles-->
    <link rel="stylesheet" href="css/mystyle.css">

    <title>OLDPMS Confirm Payment</title>
  </head>
  <body>


<div class="container">
  <div class="row">
    <div class="col-sm-4">
        <b><h1 class="mt-3 mb-3">ADD PAYMENTS</h1></b>
        <form>
        
          <div class="mb-3 ms-3 me-3">
            <label for="inputpayfrom" class="form-label">Account Number</label>
            <input type="text" class="form-control" id="inputpayfrom">
          </div>
          <div class="mb-3 ms-3 me-3">
            <label for="inputaccname" class="form-label">Account Name</label>
            <input type="text" class="form-control" id="inputaccname" aria-describedby="payfromHelp">
            <div id="payfromHelp" class="form-text">We'll never share your account information with anyone else.</div>
          </div>
        </span>
          <div class="mb-3 ms-3 me-3" style="width: 60%">
            <label for="inputrefnum" class="form-label">Reference Number</label>
            <input type="text" class="form-control" id="inputrefnum">
          </div>
          <div class="ms-3 me-3">
            <label for="paymentfor" class="form-label">Payment For</label>
          </div>          
          <div class="ms-3 me-5 form-check">
            <input type="checkbox" class="form-check-input" id="processingfee" checked disabled>
            <label class="form-check-label" for="processingfee">Processing Fee</label>
          </div>
          <div class="ms-3 me-5 form-check">
            <input type="checkbox" class="form-check-input" id="application" checked disabled>
            <label class="form-check-label" for="application">Application Fee</label>
          </div>
          <div class="ms-3 me-5 form-check">
            <input type="checkbox" class="form-check-input" id="regfee" checked disabled>
            <label class="form-check-label" for="regfee">Registration Fee</label>
          </div>
          <div class="ms-3 me-5 form-check">
            <input type="checkbox" class="form-check-input" id="oathfee" checked disabled>
            <label class="form-check-label" for="oathfee">Oath Fee</label>
          </div>
          <div class="mb-3 ms-3 form-check">
            <input type="checkbox" class="form-check-input" id="cashbond" checked disabled>
            <label class="form-check-label" for="cashbond">Cash Bond</label>
          </div>
          <div class="mb-3 ms-3 me-3" style="width: 60%">
            <label for="disabled amount" class="form-label">Total Amount</label>
            <input type="text" class="form-control" id="inputrefnum" value="2,216.00" disabled>
          </div>
            <button type="submit" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#rusure">Submit</button>
        </form>
    </div>

    <div class="col-sm-4">
      <legend>Payment Confirmation</legend>
      <img src="images/collector.jpg" class="img-fluid mt-3 mb-3 ms-3" alt="collector" >  
    </div>
  </div>
</div> 


<!-- Vertically centered modal -->
<div class="modal-dialog modal-dialog-centered" id="rusure" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-body">
        <h2><b>Are you sure?</h2></b>
        <p>Do you really want to confirm payment? This process cannot be undone.</p>
    </div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Proceed</button>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
