												</form>





												<form method="POST" action="updatebillcollector.php">

												<input type="text" class="form-control" placeholder="lumber_appid" name="lumber_app_id" value="<?php echo $lumber_app_id ?>" hidden>


												<div class="ln_solid"></div>
												<p> Please deposit the collection under Bank Account/s:
												<div class="form-group row">
													<label class="col-form-label col-md-1 col-sm-1 ">No.:</label>
													<div class="col-md-2 col-sm-2 ">
														<input type="text" class="form-control" value="3402284420" placeholder="Bank Number" name="Bank_no" required>
													</div>
													<label class="col-form-label col-md-1 col-sm-1 ">Name of Bank:</label>
													<div class="col-md-2 col-sm-2 ">
														<input type="text" class="form-control" value="BTr-Regular Fund/DENR Regional Office XIII" placeholder="Name of Bank" name="Name_of_Bank" required>
													</div>
													<label class="col-form-label col-md-1 col-sm-1 ">Amount (PHP):</label>
													<div class="col-md-2 col-sm-2 ">
														<input type="text" class="form-control" id="result2" placeholder="Amount" name="Amount" onchange="onChangeValue2()" value="<?php echo $Amount_Decimal;?>" required>
													</div>
												</div>

													<br/><br/>
													<div class="form-group row">
													<div class="col-md-5 col-sm-5 offset-md-5">
													<button type="button" class="btn btn-primary">Cancel</button>
													<button type="submit" class="btn btn-success" id="Submit" name="SubmitBillcol">Generate</button>
													</div>
													</div>
										
													</form>