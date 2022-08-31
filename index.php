<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- External JS -->
    <script src="bmi.js"></script>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    

    <title>Body Mass Index Calculator</title>
  </head>
  <body>
    <br><br>
    
    <div class="container bg-light shadow p-3 mb-5 rounded">
      <div class="row">
        <div class="col-4">
    <form name="BMIcalc">
    <h1>  <b>BMI Calculator</h1></b>
    <hr>
    <div class="form-check-inline">
      <input class="form-check-input" type="radio" name="Male" value="Male" checked>
      <label class="form-check-label" for="exampleRadios1">
        Male
      </label>
    </div>
    <div class="form-check-inline">
      <input class="form-check-input" type="radio" name="Male" value="Female">
      <label class="form-check-label" for="exampleRadios1">
        Female
      </label>
    </div><br><br>
    <div class="input-group">
      <div class="input-group-text" id="btnGroupAddon">Age</div>
    <input type="text" name="age" class="form-control" placeholder="Enter Age (year)" aria-describedby="btnGroupAddon">
    </div><br/>

    <div class="input-group">
      <div class="input-group-text" id="btnGroupAddon">Weight</div>
    <input type="text" name="weight" class="form-control" placeholder="Enter Weight (kg)" aria-describedby="btnGroupAddon">
    </div><br/>

    <div class="input-group">
      <div class="input-group-text" id="btnGroupAddon">Height</div>
    <input type="text" name="height" class="form-control" placeholder="Enter Height (Meters)" aria-describedby="btnGroupAddon">
    </div><br/>

    <input class="btn btn-primary" type="button" value="Calculate BMI" onClick="calcBmi()"><br /><br/>

    <div class="input-group">
      <div class="input-group-text" id="btnGroupAddon">BMI</div>
    <input type="text" name="bmi" class="form-control fw-bold" placeholder="Your BMI Will be here" aria-describedby="btnGroupAddon" disabled>
    </div><br/>

    <textarea type="textarea" name="meaning" rows="5" class="form-control fw-bold" disabled></textarea><br/><br/>

    <input class="btn btn-info" type="reset" value="Clear Entry" />
    <br/>

    </form>
        </div>
        <div class="bg-body rounded col-8">
          <br>
          <img src="BMI Chart.jpg" class="img-fluid" alt="BMI Chart">
        </div>
      </div>
    </div>

    






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
