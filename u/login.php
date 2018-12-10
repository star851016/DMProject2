<?php require_once "../ui/base.php"; ?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $WEB_TITLE; ?></title>

    <?php echo $WEB_HCSS; ?>

	<style type="text/css">
		.control-group{
			margin-top: 10px;
		}

		html, body{
			height: 100%;
		}

		.wrapper {
		    min-height: 100%;
		    position: relative;
		}

		section .container {
			padding-top: 30px;
			padding-bottom: 177px;
		}

		@media(max-width:767px) {
			section .container{
				padding-top: 10px;
			}
		}

		footer{
			height: 157px;
			margin-top: -157px;
		    position: relative;
		}
	</style>

    <?php echo $WEB_HJS; ?>

</head>

<body id="page-top" class="index">  
<form action="test.php" method="POST">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php"><?php echo $WEB_TITLE; ?></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="page-scroll">
                        <a href="../u/register.php">REGISTER</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

	<div class="wrapper">
		<section id="all_content">
			<div class="container">
	            <div class="row">
	                <div class="col-lg-12 text-center">
	                    <h2>Welcome Back</h2>
	                    <hr class="star-primary">
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-lg-12">
	                    <form id="loginForm">
		                	<div class="row control-group">
		                		<div class="col-lg-4 col-sm-3"></div>
		                		<div class="col-lg-4 col-sm-6">
					                <label>Your ID</label>
					                <input type="text" class="form-control" id="M_ID" name="username"></input>

					                </div>
		                		<div class="col-lg-4 col-sm-3"></div>
		                	</div>

		                	<div class="row control-group">
		                		<div class="col-lg-4 col-sm-3"></div>
		                		<div class="col-lg-4 col-sm-6">
					                <label>Password</label>
					                <input type="password" class="form-control" id="M_Password" name="password"></input>
		                		</div>
		                		<div class="col-lg-4 col-sm-3"></div>
		                	</div>
		                	<div class="row control-group">
		                		<div class="col-lg-4 col-sm-3"></div>
		                		<div class="col-lg-4 col-sm-6">
					                <label class="radio-inline"><input class="radio-inline" type="radio" name="optradio" checked>Member</label>
									<label class="radio-inline"><input class="radio-inline" type="radio" name="optradio">Instructor</label>
		                		</div>
		                		<div class="col-lg-4 col-sm-3"></div>
		                	</div>
		                	<div class="row control-group">
		                		<div class="col-lg-4 col-sm-3"></div>
		                		<div class="col-lg-4 col-sm-6">
					                <label>
					                	<input type="checkbox" id="RemberMe">&nbsp;&nbsp;Remember Me
					                </label>
		                		</div>
		                		<div class="col-lg-4 col-sm-3"></div>
		                	</div>

		                	<div class="row control-group">
		                		<div class="col-lg-4 col-sm-3"></div>
		                		<div class="col-lg-4 col-sm-6">
					                <div id="result"></div>
		                		</div>
		                		<div class="col-lg-4 col-sm-3"></div>
		                	</div>

		                	<div class="row control-group">
		                		<div class="col-lg-4 col-sm-3"></div>
		                		<div class="col-lg-4 col-sm-6">
					                <input type="submit" class="form-control btn btn-info" id="btnLogin" value="Login" name="login"></input>
					                </div>
		                		<div class="col-lg-4 col-sm-3"></div>
		                	</div>
		                		<br>
		                	<div class="row control-group text-center">
		                		<div class="col-lg-4 col-sm-3"></div>
		                		<div class="col-lg-4 col-sm-6">
					                <label><a>Forget Password?</a></label>
					                <label><a href="register.php">Register</a></label>
          
		                		</div>
		                		<div class="col-lg-4 col-sm-3"></div>
		                	</div>
	                	</form>
	                </div>
	            </div>
	            <br>
			</div>
		</section>
	</div>

    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-12">
                        <ul class="list-inline">
                        </ul>
                    </div>
                </div>
            </div>
        </div>  
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; <?php echo $WEB_TITLE; ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php echo $WEB_FCSS; ?>
    <?php echo $WEB_FJS; ?>
    <script type="text/javascript" src="../js/login.js"></script>
