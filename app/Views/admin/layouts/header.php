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

</head>

<body>
    <!-- ======================================
    ******* Main Page Wrapper **********
    ======================================= -->

    <div class="main-container-wrapper">
        <!-- Top bar area -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="<?= base_url() ?>public/admin/img/core-img/logo.png" class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url() ?>public/admin/img/core-img/small-logo.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <!-- Side Menu area -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box link-icon">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calendar.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar link-icon">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <span class="menu-title">Calendar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#advanced" aria-expanded="false" aria-controls="advanced">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit link-icon">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                            <span class="menu-title">Advanced</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="advanced">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="clint-list.html">Clint list</a></li>
                                <li class="nav-item"> <a class="nav-link" href="customer.html">Customer</a></li>
                                <li class="nav-item"> <a class="nav-link" href="blank.html">Blank page</a></li>
                                <li class="nav-item"> <a class="nav-link" href="gallery.html">Gallery</a></li>
                                <li class="nav-item"> <a class="nav-link" href="light-box.html">Light box gallery</a></li>
                                <li class="nav-item"> <a class="nav-link" href="modals.html">Modals</a></li>
                                <li class="nav-item"> <a class="nav-link" href="profile.html">Profile</a></li>
                                <li class="nav-item"> <a class="nav-link" href="profile-2.html">Profile 2</a></li>
                                <li class="nav-item"> <a class="nav-link" href="ribbons.html">Ribbons</a></li>
                                <li class="nav-item"> <a class="nav-link" href="sweet.html">Sweet alert</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#job" aria-expanded="false" aria-controls="job">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell link-icon">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                            <span class="menu-title">Job</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="job">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="job.html">Job news</a></li>
                                <li class="nav-item"><a class="nav-link" href="job-description.html">Description</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#app" aria-expanded="false" aria-controls="app">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-command link-icon">
                                <path d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path>
                            </svg>
                            <span class="menu-title">Apps</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="app">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="widgets.html">Widget</a></li>
                                <li class="nav-item"><a class="nav-link" href="chat-box.html">Chat box</a></li>
                                <li class="nav-item"><a class="nav-link" href="timeline.html">Timeline</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#email" aria-expanded="false" aria-controls="email">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail link-icon">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <span class="menu-title">Email</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="email">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="mail-inbox.html">Inbox</a></li>
                                <li class="nav-item"><a class="nav-link" href="mail-view.html">Mail view</a></li>
                                <li class="nav-item"><a class="nav-link" href="compose-mail.html">Compose mail</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#elements" aria-expanded="false" aria-controls="elements">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-feather link-icon">
                                <path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path>
                                <line x1="16" y1="8" x2="2" y2="22"></line>
                                <line x1="17.5" y1="15" x2="9" y2="15"></line>
                            </svg>
                            <span class="menu-title">Ui Kits</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="alert.html">Alert</a></li>
                                <li class="nav-item"><a class="nav-link" href="avatar.html">Avatar</a></li>
                                <li class="nav-item"><a class="nav-link" href="buttons.html">Button</a></li>
                                <li class="nav-item"><a class="nav-link" href="card.html">Card</a></li>
                                <li class="nav-item"><a class="nav-link" href="notification.html">Notification</a></li>
                                <li class="nav-item"><a class="nav-link" href="general.html">General</a></li>
                                <li class="nav-item"><a class="nav-link" href="progressbar.html">Progressbar</a></li>
                                <li class="nav-item"><a class="nav-link" href="preloader.html">Preloader</a></li>
                                <li class="nav-item"><a class="nav-link" href="tab.html">Tab</a></li>
                                <li class="nav-item"><a class="nav-link" href="dropdown.html">Dropdown</a></li>
                                <li class="nav-item"><a class="nav-link" href="typography.html">Typography</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="team.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users link-icon">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="menu-title">Members</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#general" aria-expanded="false" aria-controls="general">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard link-icon">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            </svg>
                            <span class="menu-title">Pages</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="general">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="slider.html">Slider</a></li>
                                <li class="nav-item"><a class="nav-link" href="range.html">Range Slider</a></li>
                                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                                <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
                                <li class="nav-item"><a class="nav-link" href="forget-password.html">Forget Password</a></li>
                                <li class="nav-item"><a class="nav-link" href="lock-screen.html">Lock Screen</a></li>
                                <li class="nav-item"><a class="nav-link" href="404.html">404</a></li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart link-icon">
                                <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                            </svg>
                            <span class="menu-title">Charts</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="apex-chart.html">Apex chart</a></li>
                                <li class="nav-item"> <a class="nav-link" href="chartist.html">Chartist Chart</a></li>
                                <li class="nav-item"> <a class="nav-link" href="chart-js.html">Chart js</a></li>
                                <li class="nav-item"> <a class="nav-link" href="morris-chart.html">Morris chart</a></li>
                                <li class="nav-item"> <a class="nav-link" href="c3-charts.html">C3 chart</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="task.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list link-icon">
                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                <line x1="3" y1="18" x2="3.01" y2="18"></line>
                            </svg>
                            <span class="menu-title">Task Zone</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tablet link-icon">
                                <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                                <line x1="12" y1="18" x2="12.01" y2="18"></line>
                            </svg>
                            <span class="menu-title">Tables</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="basic-table.html">Basic table</a></li>
                                <li class="nav-item"> <a class="nav-link" href="data-table.html">Data table</a></li>
                                <li class="nav-item"> <a class="nav-link" href="price-table.html">Price table</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form" aria-expanded="false" aria-controls="form">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-minus link-icon">
                                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                                <line x1="9" y1="14" x2="15" y2="14"></line>
                            </svg>
                            <span class="menu-title">Forms</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="form">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="basic-form.html">Basic form</a></li>
                                <li class="nav-item"> <a class="nav-link" href="advanced-elements.html">Elements</a></li>
                                <li class="nav-item"> <a class="nav-link" href="form-validation.html">Validation</a></li>
                                <li class="nav-item"> <a class="nav-link" href="form-wizard.html">Form Wizard</a></li>
                                <li class="nav-item"> <a class="nav-link" href="form-input-mask.html">Input mask</a></li>
                                <li class="nav-item"> <a class="nav-link" href="file-upload.html">File upload</a></li>
                                <li class="nav-item"> <a class="nav-link" href="rating.html">Rating</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ecommerce" aria-expanded="false" aria-controls="ecommerce">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart link-icon">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <span class="menu-title">Ecommerce</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="ecommerce">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="product.html">Product</a></li>
                                <li class="nav-item"> <a class="nav-link" href="product-details.html">Single Product</a></li>
                                <li class="nav-item"> <a class="nav-link" href="order.html">Order</a></li>
                                <li class="nav-item"> <a class="nav-link" href="cart.html">Cart</a></li>
                                <li class="nav-item"> <a class="nav-link" href="checkout.html">Checkout</a></li>
                                <li class="nav-item"> <a class="nav-link" href="invoice.html">Invoice</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-aperture link-icon">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
                                <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
                                <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
                                <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
                                <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
                                <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
                            </svg>
                            <span class="menu-title">Icons</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="font-awesome.html">Font Awesome</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pe-7-stroke.html">Pe-7 stroke</a></li>
                                <li class="nav-item"> <a class="nav-link" href="matarial-icons.html">Materialize</a></li>
                                <li class="nav-item"> <a class="nav-link" href="themify-icons.html">Themify</a></li>
                                <li class="nav-item"> <a class="nav-link" href="elegant-icons.html">Elegant</a></li>
                                <li class="nav-item"> <a class="nav-link" href="et-line-icons.html">Et-line</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#maps" aria-expanded="false" aria-controls="maps">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin link-icon">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span class="menu-title">Maps</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse" id="maps">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="vector-map.html">Vector</a></li>
                                <li class="nav-item"> <a class="nav-link" href="google-map.html">Google</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Main Page -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="height-900"></div>
                    </div>