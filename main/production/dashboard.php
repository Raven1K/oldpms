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
  </head>
  <?php 
      require_once 'navbar.php';
  ?>
  <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->          
        <div class="clearfix"></div>
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Lumber Dealer</span>
              <div class="count blue">500</div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Lumber Dealer</span>
              <div class="count green">400</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>90% </i> Renewed</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Lumber Dealer</span>
              <div class="count">100</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>10% </i> Not yet renew</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Lumber Dealer</span>
              <div class="count red" style="color: #ffc107">5</div>
              <span class="count_bottom"><i class="yellow"><i class="fa fa-sort-desc"></i>5% </i> On Process</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Lumber Dealer</span>
              <div class="count red">5</div>
              <span class="count_bottom"><i class="yellow"><i class="fa fa-sort-desc"></i>5% </i> Disapproved</span>
            </div>
          </div>
        </div>
          <!-- /top tiles -->
					<div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Lumber Dealer Renewed</small></h3>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>October 30, 2022 - Nov 31, 2022/span> <b class="caret"></b>
                    </div>
                  </div>
                </div>

                <div class="col-md-9 col-sm-9 ">
                  <div id="chart_plot_01" class="demo-placeholder"></div>
                </div>
                <div class="col-md-3 col-sm-3  bg-white">
                  <div class="x_title">
                    <h2>PENRO SDS</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 ">
                    <div>
                      <p>CENRO Lianga</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>CENRO Cantilan</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 ">
                    <div>
                      <p>CENRO Bislig</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <br/>

          <div class="row">

              <div class="col-md-4 col-sm-6 ">
                <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                    <h2>Lumber Dealer <small>Renewed</small></h2>
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
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <p>CENRO</p>
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 ">
                          <p class="">Offices</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 ">
                          <p class="">Progress</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                        <td>
                            <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                          </td>
                      <td>
                        <table class="tile_info">
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>C-Lianga </p>
                            </td>
                            <td>30%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square grey"></i>C-Bislig </p>
                            </td>
                            <td>10%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>C-Cantilan</p>
                            </td>
                            <td>20%</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                  </div>
                </div>
              </div>


            <div class="col-md-8 col-sm-8 ">

              <div class="row">
                <div class="col-md-12 col-sm-12 ">
                  <div class="x_panel">
                    <div class="x_title">
        <h2>Lumbe Dealer <small>Sites</small></h2>
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
        <div class="dashboard-widget-content">
          <div class="col-md-4 hidden-small">
            <h2 class="line_30">Lumber Dealer Coordinates</h2>

            <table class="countries_list">
              <tbody>
                <tr>
                  <td>Lianga</td>
                  <td class="fs15 fw700 text-right">33</td>
                </tr>
                <tr>
                  <td>Bislig</td>
                  <td class="fs15 fw700 text-right">27</td>
                </tr>
                <tr>
                  <td>Cantilan</td>
                  <td class="fs15 fw700 text-right">16</td>
                </tr>
              </tbody>
            </table>
          </div>
          <section id="indexmap">
			<div class="col-md-8 col-sm-12 " style="height:230px;">
				<div class="gmap_canvas">
					<iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=1200&amp;height=900&amp;hl=en&amp;q=Surigao del Sur&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
					</iframe>
				</div>
        <style>.mapouter{position:relative;text-align:right;width:100%;height:230px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:230px;}.gmap_iframe {height:230px!important;}</style>
      </div>
        </section>
        </div>
        </div>
        </div>
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