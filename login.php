<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>OLDRMS | Log in </title>
    <meta name="keywords" content="RB-IIMS ENVIRONMENT SYSTEM" />
    <meta name="description" content="DENR RBCO RIVER BASIN PEMSEA">
    <meta name="author" content="JAWA Production">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Fontawesome Icons-->
    <link rel="stylesheet" href="fonts/css/all.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="css/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/theme-custom.css">

</head>
<body>
    <!-- start: page -->
    <section class="body-sign">
        <div class="center-sign">
            <a href="index.php" class="logo pull-left">
                <img src="images/oldrmslogo2.png" height="150" alt="RB-IIMS Admin" />
            </a>

            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
                </div>
                <div class="panel-body">
                    <form action="/Account/Login" class="form-horizontal" method="post" role="form">
                        <input name="__RequestVerificationToken" type="hidden" value="TusLxdoC-WSu8vJrVyC708Q-VCmwvxcodV1bCLSKxDKuOc10e_n32QEZtvLL0gC62OBGkguEbcvPQAhVk3fwXBKpyPYjqSD2anIRvin4ylc1" />  <h4>Please Log In</h4>
                        <hr />
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="Email">Email</label>
                            <div class="col-md-9">
                                <input class="form-control" data-val="true" data-val-email="The Email field is not a valid e-mail address." data-val-required="The Email field is required." id="Email" name="Email" type="text" value="" />
                                <span class="field-validation-valid text-danger" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="Password">Password</label>
                            <div class="col-md-9">
                                <input class="form-control" data-val="true" data-val-required="The Password field is required." id="Password" name="Password" type="password" />
                                <span class="field-validation-valid text-danger" data-valmsg-for="Password" data-valmsg-replace="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                <div class="checkbox">
                                    <input data-val="true" data-val-required="The Remember me? field is required." id="RememberMe" name="RememberMe" type="checkbox" value="true" /><input name="RememberMe" type="hidden" value="false" />
                                    <label for="RememberMe">Remember me?</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                <input type="submit" value="Log in" class="btn btn-success" />
                            </div>
                        </div>
                        <br />
                        <hr />
                            <button type="button" onclick="window.location.href='/account/ForgotPasswordReset'" class="mb-xs mt-xs mr-xs btn btn-warning">Forgot Password?</button>
                            <button type="button" onclick="window.location.href='/account/register.php'" class="mb-xs mt-xs mr-xs btn btn-warning">Register</button>
                        </form>
                        </div>

            </div>

            <p class="text-center text-muted mt-md mb-md">DENR CARAGA | Test Version B1.01</p>
            <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2022</p>
        </div>
    </section>
    <!-- end: page -->
    <!-- Vendor -->
    <script src="/Content/assets/vendor/jquery/jquery.js"></script>
    <script src="/Content/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="/Content/assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="/Content/assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="/Content/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="/Content/assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="/Content/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="/Content/assets/javascripts/theme.js"></script>

    <!-- Theme Custom -->
    <script src="/Content/assets/javascripts/theme.custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="/Content/assets/javascripts/theme.init.js"></script>

</body>
</html>
