<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>OLDPMS - DENR R13</title>

<?php 
      require_once 'link.php';
  ?>
<link href="../build/css/custom.css" rel="stylesheet">
  </head>
  <?php 
      require_once 'navbar.php';
  ?>
	
	<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>Lumber Dealer Calendar <small>List of schedule for Site Visit</small></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>LIST<small>Business Trade Name</small></h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-6 mail_list_column">                        
						<a type="button" class="btn btn-sm btn-primary btn-block text-white" data-toggle="modal" data-target="#myCalendar"></button>
						  <i class="fa fa-calendar"></i>&nbsp;&nbsp;<strong>Add Schedule</strong></a>
                        <a href="#">
                          <div class="mail_list">
                            <div class="left">
                              <i class="fa fa-paperclip"></i>
                            </div>
                            <div class="right">
                              <h3>Jon Dibbs <small class="text-warning"><strong>October 15, 2022</strong></small></h3>
                              <p>Cabadbaran City</p>						      
                            </div>
                          </div>
                        </a>
                        <a href="#">
                          <div class="mail_list">
                            <div class="left">
                              <i class="fa fa-paperclip"></i>
                            </div>
                            <div class="right">
                              <h3>Debbis & Raymond <small class="text-warning"><strong>October 18, 2022</strong></small></h3>
                              <p>Nasipit</p>
                            </div>
                          </div>
                        </a>
                        <a href="#">
                          <div class="mail_list">
                            <div class="left">
                              <i class="fa fa-paperclip"></i>
                            </div>
                            <div class="right">
                              <h3>Debbis & Raymond <small class="text-warning"><strong>October 22, 2022</strong></small></h3>
                              <p>Tubod</p>
                            </div>
                          </div>
                        </a>                      
                      </div>
                      <!-- /MAIL LIST -->

                      <!-- CONTENT MAIL -->
                      <div class="col-sm-6 mail_view">
                        <div class="inbox-body">
                          <div class="mail_heading row">
                            <div class="col-md-8">
                              <h4>Client Details</h4>
                            </div>
                            <div class="col-md-4 text-left">
                              <p class="date"> <strong class="text-black">Paid @ </strong> <strong class="text-warning">8:02 AM 12 OCT 2022</strong></p>
								<p class="date text-danger"><strong class="text-black"> Reference #:</strong> XXXXXXXXXXXXX</p>
                            </div>
                            <div class="col-md-12">
                              
                            </div>
                          </div>
                          <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12">
                                <strong>Jon Dibs</strong>
                                <span>(No1knows Lumber Dealer)</span>
                                <strong></strong>
                                <a class="sender-dropdown"><i></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="view-mail">
                            <p>Pag andam ug pani.udto ug snacks kng ma dugay ug human. </p>
                            
                          </div>
                          
                          <div class="btn-group">
                            <button class="btn btn-sm btn-primary" type="button"> Upload Pictures</button>
                           
                          </div>
                        </div>

                      </div>
                      <!-- /CONTENT MAIL -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!-- /page content -->
	
     </div>
    </div>

<?php 
      require_once 'footer.php';
	  require_once('modalcalendar.php');	
  ?>

</html>