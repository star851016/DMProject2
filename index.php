<?php require_once('ui/base.php'); ?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POWER LIFE</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/freelancer.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/chuinfo.css">
    <style type="text/css">
        .intro p{
            text-align: justify;
            text-justify: inter-ideograph;
        }

        .navbar-default{
            background-color: rgba(64, 72, 80, 0.3);
        }

        .navbar-default .navbar-brand{
            color: #fff;
            text-shadow:1px 1px 1px #000;
        }

        .navbar-default .navbar-nav>li>a{
            color: #fff;
            text-shadow:1px 1px 1px #000;
        }

        .navbar-default .navbar-toggle{
            border-color: #fff;
        }

        .btn-reg{
            background-color: rgba(255, 240, 255, 1);
        }
    </style>
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
                <a class="navbar-brand" href="#">POWER LIFE</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="u/register.php">Register</a>
                    </li>
                    <li class="page-scroll">
                        <a href="u/login.php">LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
        </div>
    </header>

    <section id="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Let's do it</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 intro portfolio-item">
                    <section class="special box">
                        <i class="icon fa-book major"></i>
                        <h3>COURSE</h3>
                        <p>In here, we provide ...</p>
                    </section>
                </div>
                <div class="col-sm-4 intro">
                    <section class="special box">
                        <i class="icon fa-comments major"></i>
                        <h3>INSTRUCTOR</h3>
                        <p>In here, we provide ...</p>
                    </section>
                </div>
                <div class="col-sm-4 intro">
                    <section class="special box">
                        <i class="icon fa-lock major"></i>
                        <h3>MEMBER</h3>
                        <p>In here, we provide ...</p>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="u/register.php" class="btn btn-lg btn-outline btn-reg">
                        <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;Register Right Now&nbsp;
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>ABOUT US</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>we are the MyADSL team, taken from the team members nickname, Mai Alice Da Shin Lily.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center">
        
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; 2018 Data Model Project 2 MyADSL team
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/freelancer.js"></script>

</body>
</html>
