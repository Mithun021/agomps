<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Required meta tags -->

    <title><?= $title ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url() ?>public/admin/img/core-img/favicon.png">

    <!-- Master Stylesheet CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>public/admin/style.css">

    <!-- These plugins only need for the run this page -->
    <link rel="stylesheet" href="<?= base_url() ?>public/admin/css/default-assets/summernote.css">

    <link rel="stylesheet" href="<?= base_url() ?>public/admin/css/default-assets/datatables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/admin/css/default-assets/responsive.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/admin/css/default-assets/buttons.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/admin/css/default-assets/select.bootstrap4.css">
    <style>
        .card h4.card-title {
            font-size: 14px;
        }

        table tr td img {
            height: 40px !important;
            width: auto !important;
        }

        .btn.btn-circle {
            border-radius: 50%;
            padding: 0;
            width: 30px !important;
            height: 30px !important;
            line-height: 30px !important;
        }
    </style>
</head>

<body>
    <!-- ======================================
    ******* Main Page Wrapper **********
    ======================================= -->

    <div class="main-container-wrapper">
        <!-- Top bar area -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="<?= base_url() ?>admin"><img src="<?= base_url() ?>public/admin/img/core-img/logo.png" class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="<?= base_url() ?>admin"><img src="<?= base_url() ?>public/admin/img/core-img/small-logo.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
                <ul class="top-navbar-area navbar-nav navbar-nav-right">

                    <li class="nav-item dropdown dropdown-animate">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                            <a class="dropdown-item preview-item d-flex align-items-center">
                                <div class="notification-thumbnail">
                                    <div class="preview-icon bg-primary">
                                        <i class="ti-info-alt mx-0"></i>
                                    </div>
                                </div>
                                <div class="notification-item-content">
                                    <h6>Code problem solved.</h6>
                                    <p class="mb-0">
                                        Just now
                                    </p>
                                </div>
                            </a>

                        </div>
                    </li>

                    <li class="nav-item nav-profile dropdown dropdown-animate">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="<?= base_url() ?>public/admin/img/member-img/contact-2.jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown profile-top" aria-labelledby="profileDropdown">
                            <a href="#" class="dropdown-item"><i class="zmdi zmdi-account profile-icon" aria-hidden="true"></i> My profile</a>
                            <a href="#" class="dropdown-item"><i class="zmdi zmdi-email-open profile-icon" aria-hidden="true"></i> Messages</a>
                            <a href="#" class="dropdown-item"><i class="zmdi zmdi-brightness-7 profile-icon" aria-hidden="true"></i> Settings</a>
                            <a href="#" class="dropdown-item"><i class="ti-unlink profile-icon" aria-hidden="true"></i> Sign-out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-xl-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="ti-layout-grid2"></span>
                </button>
            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <!-- Side Menu area -->
            <?= view('admin/layouts/sidebar') ?>

            <!-- Main Page -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container-fluid">