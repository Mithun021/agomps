<?php
    $sessionData = session()->get('loggedPlayerData');
    if ($sessionData) {
        $loggedplayerName = $sessionData['loggedplayerName'];
        $loggedplayerId = $sessionData['loggedplayerId'];
    }
?>

<!DOCTYPE html>
<!-- Meta -->
<html lang="en">

<head>
    <!-- Title -->
    <title>Agomps - <?= $title ?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Dcode Materials">
    <meta name="robots" content="">

    <meta name="keywords" content="">
    <meta name="description" content="">

    <meta property="og:title" content="Agomps">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta name="format-detection" content="telephone=no">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
	<![endif]-->

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/assets/css/plugins.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/assets/css/hover.css">
    <link rel="stylesheet" type="text/css" class="skin" href="<?= base_url() ?>public/assets/css/skin/skin-1.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/assets/css/templete.min.css">

    <!-- Revolution Slider Css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/assets/plugins/revolution/revolution/css/settings.css">
    <!-- Revolution Navigation Style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/assets/plugins/revolution/revolution/css/navigation.css">

    <style>
        /* .loginbtn li a i#mobileicon{
            display: none;
        }*/
        .error {
            color: red;
            font-weight: 600;
        }

        .dez-topbar-left .social-line.loginbtn li a {
            padding-left: 0;
            padding-right: 0px;
        }

        @media(max-width : 992px) {

            .loginbtn li a span#signInBtn,
            .loginbtn li a span#signInBtn span,
            .loginbtn li a span#signUpBtn,
            .loginbtn li a span#signUpBtn span {
                display: block;
                align-items: center;
            }

            .loginbtn li a span#signInBtn,
            .loginbtn li a span#signUpBtn {
                width: 90px;
                display: flex;
                justify-content: center;
                text-align: center;
                margin-top: 8px;
            }

            .social_media_btn {
                display: none;
            }

            .loginbtn li a span#signInBtn .loginbtn li a span#signInBtn#signUpBtn {
                width: 80px;
                display: flex;
                justify-content: flex-start;
                margin-top: 8px;
            }
        }
    </style>
</head>

<body id="bg">
    <span style="display: none;" id="base_url"><?= base_url() ?></span>
    <div class="page-wraper">
        <!-- header -->
        <header class="site-header header-style-6 dark mo-left ">
            <!-- main header -->
            <div class=" sticky-header main-bar-wraper navbar-expand-lg navbar-expand-lg">
                <div class="main-bar clearfix ">
                    <div class="top-bar">
                        <div class="container top-bar-crve">
                            <div class="row justify-content-between">
                                <div class="dez-topbar-left">
                                    <ul class="social-line text-center pull-right">
                                        <li><a href="javascript:void(0);"><i class="fa fa-envelope-o"></i> <span> Companyname@mail.com </span> </a></li>
                                        <li><a href="javascript:void(0);"><i class="fa fa-phone"></i> <span> (732) 803-010-03 </span> </a></li>
                                    </ul>
                                </div>
                                <div class="dez-topbar-right social_media_btn">
                                    <ul class="social-line text-center pull-right">
                                        <li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-instagram"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-youtube"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-linkedin"></a><?php if ($sessionData) { echo $loggedplayerName; }?></li>
                                    </ul>
                                </div>
                                <div class="dez-topbar-left">
                                    <ul class="social-line text-center pull-right loginbtn">
                                    <?php if ($sessionData) { ?>
                                        <li><a href="<?= base_url() ?>"> <span class="btn btn-sm btn-dark rounded-pill" id="signUpBtn"> <i class="fa fa-cog" aria-hidden="true"></i> <span>Dashboard </span> </a></span></li>
                                    <?php }else { ?>
                                        <li><a href="javascript:void(0);"> <span class="btn btn-sm btn-dark rounded-pill" id="signInBtn"><i class="fa fa-sign-in"></i> <span>Sign In </span> </a></span></li>
                                        <li><a href="<?= base_url() ?>user-registration"> <span class="btn btn-sm btn-dark rounded-pill" id="signUpBtn"><i class="fa fa-user-plus"></i> <span>Sign Up </span> </a></span></li>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-bar">
                        <div class="container clearfix">
                            <!-- website logo -->
                            <div class="logo-header mostion"><a href="<?= base_url() ?>"><img src="<?= base_url() ?>public/assets/images/logo.png" width="193" height="89" alt=""></a></div>
                            <!-- nav toggle button -->
                            <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <!-- main nav -->
                            <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                                <ul class=" nav navbar-nav">
                                    <li class="active"> <a href="<?= base_url() ?>">Home</a></li>
                                    <li><a href="<?= base_url() ?>">Schedule</a></li>
                                    <li><a href="<?= base_url() ?>">Live Score</a></li>
                                    <li><a href="<?= base_url() ?>">Archives</a></li>
                                    <li><a href="<?= base_url() ?>">Teams</a></li>
                                    <li><a href="javascript:;">Registration<i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="<?= base_url() ?>">Franchise Registration</a></li>
                                            <li><a href="<?= base_url() ?>team-registration">Team Registration</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">More<i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="<?= base_url() ?>">About Us</a> </li>
                                            <li><a href="<?= base_url() ?>">Who We Are</a></li>
                                            <li><a href="<?= base_url() ?>">Rules & Regulation</a></li>
                                            <li><a href="<?= base_url() ?>">Privacy Policy</a></li>
                                            <li><a href="<?= base_url() ?>">Career</a></li>
                                            <li><a href="<?= base_url() ?>">Photos</a></li>
                                            <li><a href="<?= base_url() ?>">Contact Us</a></li>
                                            <li><a href="<?= base_url() ?>">News & Events</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main header END -->
        </header>
        <!-- header END -->
        <!-- Content -->
        <div class="page-content">