<?php
// Begin the site session
session_start();
//New Includes
require_once("inc/includes.php");
?>
<!DOCTYPE html>
<html>
<head>
	<!-- 
	Kool Store Template
	http://www.templatemo.com/preview/templatemo_428_kool_store
	-->
	<meta charset="utf-8">
	<title><?php echo $siteData[0]; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link href="<?php echo 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800'; ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $themeUri . 'style/css/bootstrap.css'; ?>">
	<link rel="stylesheet" href="<?php echo $themeUri . 'style/css/normalize.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo $themeUri . 'style/css/font-awesome.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo $themeUri . 'style/css/animate.css'; ?>">
	<link rel="stylesheet" href="<?php echo $themeUri . 'style/css/templatemo-misc.css'; ?>">
	<link rel="stylesheet" href="<?php echo $themeUri . 'style/css/templatemo-style.css'; ?>">
	<script src="<?php echo $themeUri . 'js/vendor/modernizr-2.6.2.min.js'; ?>"></script>
</head>
<body>
	<header class="site-header">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="top-header-left">
							<?php if (!isset($_SESSION["loginToken"])) { ?>
                            <a href="signup.php">Sign Up</a>
                            <a href="login.php">Log In</a>
							<?php } else { ?>
							<?php } ?>
                        </div> <!-- /.top-header-left -->
                    </div> <!-- /.col-md-6 -->
                    <div class="col-md-6 col-sm-6">
                        <div class="social-icons">
                            <ul>

                            </ul>
                            <div class="clearfix"></div>
                        </div> <!-- /.social-icons -->
                    </div> <!-- /.col-md-6 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.top-header -->
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-8">
                        <div class="logo">
                            <h1><a href="index.php"><?php echo $siteData[0]; ?></a></h1>
                        </div> <!-- /.logo -->
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.main-header -->
        <div class="main-nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7">
                        <div class="list-menu">
                            <ul>
                                <?php
								include_once("/inc/navController.php");
								?>
                            </ul>
                        </div> <!-- /.list-menu -->
                    </div> <!-- /.col-md-6 -->
                    <div class="col-md-6 col-sm-5">
                        <div class="notification">
                            <span></span>
                        </div>
                    </div> <!-- /.col-md-6 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.main-nav -->
    </header> <!-- /.site-header -->
    <div class="content-section">
        <div class="container">
			<!-- Page Contents -->
			<?php
			  if (isset($_GET["return"])) {
				if ($_GET["return"] == "cancel") {
				  echo "Payment has been canceled.";
				} else if ($_GET["return"] == "success") {
				  echo "Payment has been completed!";
				}
			  } else {
				exit;
			  }
			?>
        </div> <!-- /.container -->
    </div> <!-- /.content-section -->
	<footer class="site-footer">
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span><?php echo $siteData[1]; ?> | Design: <a href="http://www.templatemo.com">templatemo</a></span>
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.bottom-footer -->
    </footer> <!-- /.site-footer -->
    <script src="js/vendor/jquery-1.10.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="js/jquery.easing-1.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
