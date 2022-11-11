<!doctype html>
<html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="cache-control" content="no-cache" />
      <meta http-equiv="Pragma" content="no-cache" />
      <meta http-equiv="Expires" content="-1" />
            
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <title>OLDPMS</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../fonts/css/all.css">
    <script src="js/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>
  
  
<body style="background: #ecedf0;">
  <div id="wrapper">
             <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 5px;"> 
              <div class="container-fluid">
                <a href="index.php"><img src="../images/oldpmslogo.png" alt="oldpms" height="40"></a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <a class="navbar-brand" href="index.php"><strong>ONLINE LUMBER DEALER PERMITTING & MONITORING SYSTEM</strong></a>
                </div>
              </div>
            </nav>

        <!-- Sidebar -->
    <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
     <ul class="nav sidebar-nav">
       <div class="sidebar-header">
       <div class="sidebar-brand">
         <a href="#" style="text-decoration: none; font-weight: 700; color; #fff;"><i class="fa-solid fa-circle-user"></i> JUAN</a></div></div>
       <li><a href="http://localhost/oldpms/client/requirement.php">Requirements</a></li>
       <li><a href="http://localhost/oldpms/client/docstatus">Document Status</a></li>
       <li><a href="http://localhost/oldpms/client/doctracker">Track your Application</a></li>
         <li><a href="#logout" name="Log-out">Logout</a></li><br><br>
   
<div id='bodybox'>
  <h5 style="color: white; font-weight: 600; font-size: 15px; padding: 5px; text-align: center;"> OLDPMS Support</h5>
  <div id='chatborder'>
    <p id="chatlog7" class="chatlog">&nbsp;</p>
    <p id="chatlog6" class="chatlog">&nbsp;</p>
    <p id="chatlog5" class="chatlog">&nbsp;</p>
    <p id="chatlog4" class="chatlog">&nbsp;</p>
    <p id="chatlog3" class="chatlog">&nbsp;</p>
    <p id="chatlog2" class="chatlog">&nbsp;</p>
    <p id="chatlog1" class="chatlog">&nbsp;</p>

    <div class="scrollmenu" style="overflow: auto;
  white-space: nowrap; background: #ecedf0; padding: 5px;">
  <a type="button" onclick="myFunction()" id="suggest1" style="display: inline-block; text-decoration: none; color: #0078d4; background: #fff; padding: 5px; border-radius: 15px; font-weight: 600; font-size: 12px;">What is your name?</a>
  <a type="button" onclick="myFunction2()" id="suggest2" style="display: inline-block; text-decoration: none; color: #0078d4; background: #fff; padding: 5px; border-radius: 15px; font-weight: 600; font-size: 12px;">Can you help me?</a>
  <a type="button" onclick="myFunction3()" id="suggest3" style="display: inline-block; text-decoration: none; color: #0078d4; background: #fff; padding: 5px; border-radius: 15px; font-weight: 600; font-size: 12px;">How to file application?</a>
</div>
    <input type="text" name="chat" id="chatbox" placeholder="Hi there! Type here to talk to me." onfocus="placeHolder()">
  </div>
 
</div>

</nav>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
          <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                      <!-- START -->

                      <!-- CONTENT -->
                              <!-- END -->
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <input type="file" id="realfile"  hidden="hidden" accept="Application/pdf" value=""/>
    <input type="file" id="realfile2" hidden="hidden" accept="Application/pdf" value=""/>
    <input type="file" id="realfile3" hidden="hidden" accept="Application/pdf" value=""/>
    <input type="file" id="realfile4" hidden="hidden" accept="Application/pdf" value=""/>
    <input type="file" id="realfile5" hidden="hidden" accept="Application/pdf" value=""/>
    <input type="file" id="realfile6" hidden="hidden" accept="Application/pdf" value=""/>

    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

                              <div class="bodytime">
                                <div class="timeline">
                                   <p style="font-size: 30px; font-weight: 600"><i class="fa-solid fa-file"></i> Application Status</p>
                                   <div class="scroll-bg">
                                    <div class="scroll-div"style="padding: 10px; width: 780px; height: 800px; overflow: hidden; overflow-y: scroll;">
                                    <div class="scroll-object">
                                     <ul>
                                      <li style="background: #fff;">
                                        <span style="background: #0d6efd;" id="latestTime"><i class="fa-regular fa-calendar"></i> 28th June 2022</span><br>
                                        <div class="content">
                                          <p style="font-size: 12px; margin-left: 2px; color: #888;"><i class="fa-regular fa-clock"></i> 9:02 a.m</p><h5 style="color: #222; font-weight: 600;">Site Validation Schedule</h5>
                                          <p style="color: #222">
                                            Validation Schedule June 29, 2022 8 a.m Please prepare all the<br>documents for actual verification.<br><br><a href="#" style="text-decoration: none; color: #0d6efd; font-weight: 600; ">Read more..</a>
                                          </p>
                                        </div>
                                      </li>
                                      <li style="background: #fff;">
                                        <span style="background: #0d6efd" id="midTime"><i class="fa-regular fa-calendar"></i> 25th June 2022</span>
                                        <div class="content">
                                         <p style="font-size: 12px; margin-left: 2px; color: #888;"><i class="fa-regular fa-clock"></i> 3:00 p.m</p><h5 style="color: #222; font-weight: 600;">Payment Confirmed</h5>
                                          <p style="color: #222">
                                            Reference No. 1234567890<br>
                                            Processing Fee - 100.00<br>Application Fee - 600.00<br>Registration Fee - 480.00<br>
                                            Oath Fee - 36.00<br>
                                            Cash Bond - 1000.00<br><br><a href="#" style="text-decoration: none; color: #0d6efd; font-weight: 600;">Read more..</a>
                                          </p>
                                        </div>
                                      </li>
                                      <li style="background: #fff;">
                                        <span style="background: #0d6efd" id="oldTime"><i class="fa-regular fa-calendar"></i> 22nd June 2022</span>
                                        <div class="content">
                                          <p style="font-size: 12px; margin-left: 2px; color: #888;"><i class="fa-regular fa-clock"></i> 4:30 p.m</p><h5 style="color: #222; font-weight: 600;">Application Accepted</h5>
                                          <p style="color: #222">
                                            1. Application form or duly accomplished & sworn/notarized.<br>
                                            2. Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer<br>
                                            3. Mayor's Permit/Business Permit<br>
                                            4. Annual Business Plan<br>
                                            5. Latest Income Tax Return<br>
                                            6. Proof of ownership of the lumberyard or consent/agreement with the owner <br><br><a href="#" style="text-decoration: none; color: #0d6efd; font-weight: 600;">Read more..</a>
                                          </p>
                                        </div>
                                      </li>
                                         </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
      
    </div>
  </body>
</html>