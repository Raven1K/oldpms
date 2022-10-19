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
									<form class="form-label-left input_mask" method="post" action="generate-pdf.php">
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Name</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" class="form-control" placeholder="Permittee" name="name" id="name">
											</div>
                                            </div>
                                        <div class="form-group row">
                                         <label class="col-form-label col-md-2 col-sm-2 ">Address</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" class="form-control" placeholder="Address" name="address" id="address">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Total Lumber Contract</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="bd.ft." name="contract" id="contract">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Planted Recovery</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="%" name="planted" id="planted">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">PTPOC Holder</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" class="form-control" placeholder="PTPOC Name" name="ptpoc" id="ptpoc">
											</div>
										</div>
                                        <div class="form-group row">
                                        <label class="col-form-label col-md-2 col-sm-2 ">Address</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" class="form-control" placeholder="Address" name="ptadd" id="ptadd">
											</div>
                                            </div>
                                        <div class="form-group row">
                                        <label class="col-form-label col-md-2 col-sm-2 ">Species</label>
                                        <div class="col-md-2 col-sm-2 ">
										<p style="padding: 5px;">
											<input type="checkbox" name="Fal" id="Fal" value="Falcata" required class="flat" /> Falcata
											<br />

											<input type="checkbox" name="Maho" id="Maho" value="Mahogany" class="flat" /> Mahogany
											<br />

											<input type="checkbox" name="Gem" id="Gem" value="Gemelina" class="flat" /> Gemelina
											<br />

											<input type="checkbox" name="Cai" id="Cai" value="Caimito" class="flat" /> Caimito
											<br />

                                            <input type="checkbox" name="Mang" id="Mang" value="Mango" class="flat" /> Mango
											<br />
											<p>
											</div>
                                            </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2 col-sm-2 ">Falacata</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Volume cu.m." name="falcu" id="falcu">
											</div>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Volume bd.ft." name="falbd" id="falbd">
											</div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-form-label col-md-2 col-sm-2 ">Mahogany</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Volume cu.m." name="macu" id="macu">
											</div>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Volume bd.ft." name="mabd" id="mabd">
											</div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-form-label col-md-2 col-sm-2 ">Gemelina</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Volume cu.m." name="gecu" id="gecu">
											</div>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Volume bd.ft." name="gebd" id="gebd">
											</div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-form-label col-md-2 col-sm-2 ">Caimito</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Volume cu.m." name="cacu" id="cacu">
											</div>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Volume bd.ft." name="cabd" id="cabd">
											</div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-form-label col-md-2 col-sm-2 ">Mango</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Volume cu.m." name="mancu" id="mancu">
											</div>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Volume bd.ft." name="manbd" id="manbd">
											</div>
                                            </div>
                                            <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Beneficiary Municipality</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" class="form-control" placeholder="Address" name="bene" id="bene">
											</div>
										</div>
                                       	<div class="ln_solid"></div>
										<div class="form-group row">
											<div class="col-md-5 col-sm-5  offset-md-5">
                                                <button type="submit" class="btn btn-success">Generate Endorsement</button>
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



