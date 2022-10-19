<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OLDPMS - DENR R13</title>

<?php 
      require_once 'link.php';
  ?>
  </head>

  <?php 
      require_once 'navbar.php';
  ?>
			<!-- page content -->
			<div class="right_col" role="main">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Endorsement Form</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="#">Settings 1</a>
												<a class="dropdown-item" href="#">Settings 2</a>
											</div>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
                                    <center>
                                        <div class="count green"><h1>Endorsement to Deputy CENRO</h1></div>
                                        <br>
                                    </center>
									<br />
									<form class="form-label-left input_mask">
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Name</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="Permittee" name="name" id="name">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Total Value</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="0.00">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Number of Employee</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="Male">
											</div>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="Female">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Total</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="0.00" disabled="disabled">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Kind of Equipment used</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Made</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">State/Condition</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Size</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Value</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Previous Cert. Registration No.</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Years Operated</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Date Issued
											</label>
											<div class="col-md-2 col-sm-2 ">
												<input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
                                            <label class="col-form-label col-md-2 col-sm-2 ">Date Expired
											</label>
											<div class="col-md-2 col-sm-2 ">
												<input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Application Fee</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="₱ 600.00" disabled="disabled">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Registration Fee</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="₱ 480.00" disabled="disabled">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Oath Fee</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="₱ 36.00" disabled="disabled">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Cash Bond</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="₱ 1,000.00" disabled="disabled">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Coordinates</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Latitude">
											</div>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Longitude">
											</div>
										</div>
										<div class="form-group row">
                                                <label for="formFile" class="col-form-label col-md-2 col-sm-2  ">Lumber Dealer Photo :</label>
                                                <div class="col-md-4 col-sm-4 ">
                                                <input  class="form-control " type="file" id="formFile">
											</div>
										</div>
                                        <div class="form-group row">
                                            <label for="formFile" class="col-form-label col-md-2 col-sm-2  ">Upload Verification Report :</label>
                                            <div class="col-md-4 col-sm-4 ">
                                            <input  class="form-control " type="file" id="formFile">
                                        </div>
                                    </div>
										<div class="ln_solid"></div>
										<div class="form-group row">
											<div class="col-md-5 col-sm-5  offset-md-5">
												<button type="button" class="btn btn-primary">Cancel</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>
                    </div>
									</form>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
<?php 
      require_once 'footer.php';
  ?>
</html>



