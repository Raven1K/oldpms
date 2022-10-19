<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OLDPMS | DENR R13</title>

    <!-- Bootstrap -->
	
   <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">    
    <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
		  
		<!-- sidebar navigation -->        
          <?php
				require_once('sidebar.php');
			?>        
		<!-- /sidebar navigation -->
		  
        <!-- top navigation -->
		  
          <?php
				require_once('topbar.php');
			?> 
		  
        <!-- /top navigation -->
		  
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
						  <i class="fa fa-calendar-check"></i>&nbsp;&nbsp;Add Schedule</a>
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
                              
                            </div>
                            <div class="col-md-4 text-right">
                              <p class="date"> 8:02 AM 12 OCT 2022</p>
                            </div>
                            <div class="col-md-12">
                              <h4>Client Details</h4>
                            </div>
                          </div>
                          <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12">
                                <strong>Jon Dibs</strong>
                                <span>(No1knows Lumber Dealer)</span>
                                <strong></strong>
                                <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="view-mail">
                            <p>Pag andam ug pani.udto ug snacks kng ma dugay ug human. </p>
                            
                          </div>
                          
                          <div class="btn-group">
                            <button class="btn btn-sm btn-primary" type="button"> View Status</button>
                           
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
		  
		<!-- footer content -->
        	<?php
					require_once('footer.php');
					require_once('modalcalendar.php');
			?>
        <!-- /footer content -->
      </div>
    </div>
	
	<!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
	<!-- jQuery Sparklines -->
    <script src="vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>    
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
	  
	<!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	
    <script src="vendors/validator/multifield.js"></script>
    <script src="vendors/validator/validator.js"></script>
	<!-- Custom Theme Scripts -->
    <script src="build/js/custom.js"></script>
	
	<script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);

    </script>
  </body>
</html>