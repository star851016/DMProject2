<?php require_once "../backend/tool.php"; ?>
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

    <?php echo $WEB_HJS; ?>

</head>

<body id="page-top" class="index">
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
                        <a href="../u/login.php">LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


	<style type="text/css">
		.control-group{
			margin-top: 10px;
		}

		select:invalid{
			color: gray;
		}

        .remind{
            text-align: justify;
            text-justify: inter-ideograph;
        }
	</style>
	<section>
		<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Let's start!</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <form id="registerForm">
	            <div class="row">
	                <div class="col-lg-12">
					<!--註冊欄位-->
	                	<div class="row control-group">
	                		<div class="col-lg-4 col-sm-3"></div>
	                		<div class="col-lg-4 col-sm-6">
				                <label for="Identity">Identity</label>
				                <select class="form-control" id="selectIdentity" name="selectIdentity">
						          	<option value="-1" disabled selected hidden>Please choose an identity.</option>
						           	<option value="1">Member</option>
						           	<option value="2">Instructor</option>
						        </select>									
	                		</div>
	                		<div class="col-lg-4 col-sm-3"></div>
	                	</div>

						<div class="row control-group">
	                		<div class="col-lg-4 col-sm-3"></div>
	                		<div class="col-lg-4 col-sm-6">
				                <label for="Name">Name</label>
				                <input type="text" class="form-control" placeholder="please enter your name" id="Name" required maxlength="15"></input>
	                		</div>
	                		<div class="col-lg-4 col-sm-3"></div>
	                	</div>
						
						<div class="row control-group">
	                		<div class="col-lg-4 col-sm-3"></div>
	                		<div class="col-lg-4 col-sm-6">
				                <label for="mail">E-mail</label>
				                <input type="text" class="form-control" placeholder="please enter your e-mail address" id="email" required maxlength="15"></input>
	                		</div>
	                		<div class="col-lg-4 col-sm-3"></div>
	                	</div>
						
	                	<div class="row control-group">
	                		<div class="col-lg-4 col-sm-3"></div>
	                		<div class="col-lg-4 col-sm-6">
				                <label for="Password">Password</label>
				                <input type="password" class="form-control" placeholder="please enter your password" id="Password" required data-validation-regex-regex="^(?=.*\d)(?=.*[a-zA-Z]).{8,30}$"></input>
	                		</div>
	                		<div class="col-lg-4 col-sm-3"></div>
	                	</div>

	                	<div class="row control-group">
	                		<div class="col-lg-4 col-sm-3"></div>
	                		<div class="col-lg-4 col-sm-6">
				                <label for="PasswordConfirm">Confirm the Password</label>
				                <input type="password" class="form-control" placeholder="please enter your password again" id="PasswordConfirm" required data-validation-matches-match="Password"></input>
	                		</div>
	                		<div class="col-lg-4 col-sm-3"></div>
	                	</div>
						
	                	<div class="row control-group">
	                		<div class="col-lg-4 col-sm-3"></div>
	                		<div class="col-lg-4 col-sm-6">
				                <label for="phone">Phone</label>
				                <input type="text" class="form-control" placeholder="please enter your phone number" id="phone" required maxlength="15"></input>
	                		</div>
	                		<div class="col-lg-4 col-sm-3"></div>
	                	</div>

	                	<div class="row control-group">
	                		<div class="col-lg-4 col-sm-3"></div>
	                		<div class="col-lg-4 col-sm-6">
				                <label for="Gender">Gender</label>
				                <select class="form-control" id="Gender" name="Gender">
									<option value="M">Male</option>
									<option value="F">Female</option>
									<option value="O">other</option>
								</select>
	                		</div>
	                		<div class="col-lg-4 col-sm-3"></div>
	                	</div>

	                	
	                	<div class="row control-group">
	                		<div class="col-lg-4 col-sm-3"></div>
	                		<div class="col-lg-4 col-sm-6">
				                <label>Birthday</label>
				                <br>
				                <div class="row">
					                <div class="col-xs-4">
						                <select class="form-control" id="Year" name="Year">
						                <?php $start = getdate()["year"]; ?>
						                	<option value="-1" disabled selected hidden>year</option>
						                	<?php
						                		for($i = $start-10; $i >=($start-65); $i--)
						                		{
						                	?>
						                	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						                	<?php }; ?>
						                </select>
					                </div>
					                <div class="col-xs-4">
						                <select class="form-control" id="Month" name="Month">
						                	<option value="-1" disabled selected hidden>month</option>
						                	<option value="1">1</option>
						                	<option value="2">2</option>
						                	<option value="3">3</option>
						                	<option value="4">4</option>
						                	<option value="5">5</option>
						                	<option value="6">6</option>
						                	<option value="7">7</option>
						                	<option value="8">8</option>
						                	<option value="9">9</option>
						                	<option value="10">10</option>
						                	<option value="11">11</option>
						                	<option value="12">12</option>
						                </select>
					                </div>
					                <div class="col-xs-4">
						                <select class="form-control" id="Day" name="Day">
						                	<option value="-1" disabled selected hidden>date</option>
						                	<?php 
						                		for($i=1; $i <=31; $i++){
						                	?>
						                	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						                	<?php } ?>

						                </select>
					                </div>
				                </div>
	                		</div>
	                		<div class="col-lg-4 col-sm-3"></div>
	                	</div>

	                	<br>
	                	
	                	<hr class="star-primary">

	                	<div class="row control-group text-center">
	                		<div class="col-lg-4 col-sm-3"></div>
	                		<div class="col-lg-4 col-sm-6">
				                <h2>CHECK</h2><br>
				                <label class="remind">please confirm your information is correct. thanks</label>
	                		</div>
	                		<div class="col-lg-4 col-sm-3"></div>
	                	</div>

	                	<hr class="line">
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
				                <input type="button" class="form-control btn btn-info" name="btnSubmit" id="btnSubmit" value="Enjoy the Power Life"></input>
	                		</div>
	                		<div class="col-lg-4 col-sm-3"></div>
	                	</div>
	                </div>
	            </div><br><br>
            </form>
		</div>
	</section>

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
    <script type="text/javascript" src="../js/signup.js"></script>

    
</body>
</html>
