</div>
<!-- Content END-->
<!-- Modal -->
<div class="modal fade" id="signinModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login your Account</h5>
                <button type="button" class="close btn btn-sm btn-dark" data-dismiss="modal" aria-label="Close" id="closeModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4" style="background-color: #2c4a6b;">
                <!-- Content -->
                <div class="page-content dez-login" style="position:relative; background-color: #FFF;">
                    <div class="login-form">
                        <div class="tab-content">
                            <div id="login" class="tab-pane active text-center">
                                <form class="p-a30 dez-form p-b0 m-t100" id="userLoginForm">
                                    <h3 class="form-title m-t0">Sign In</h3>
                                    <div class="dez-separator-outer m-b5">
                                        <div class="dez-separator bg-primary style-liner"></div>
                                    </div>
                                    <p>Enter your e-mail address/ phone number and your password. </p>
                                    <div class="form-group">
                                        <input name="username" id="username" class="form-control" placeholder="User Name" type="text">
                                        <span id="username_error"></span>
                                    </div>
                                    <div class="form-group search-input">
                                        <input name="userpassword" id="userpassword" class="form-control dz-password" placeholder="Type Password" type="password">
                                        <div class="show-pass">
                                            <svg class="eye-close" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#8ea5c8">
                                                <path d="M11 17.188a8.71 8.71 0 0 1-1.576-.147.69.69 0 0 1-.579-.678.7.7 0 0 1 .817-.676 7.33 7.33 0 0 0 1.339.127c4.073 0 7.61-3.566 8.722-4.812a18.51 18.51 0 0 0-2.434-2.274.69.69 0 0 1 .335-1.226.69.69 0 0 1 .268.019c.087.024.169.064.24.12a18.79 18.79 0 0 1 3.036 2.939.69.69 0 0 1 0 .848c-.185.234-4.581 5.763-10.167 5.763zm7.361-13.549a.69.69 0 0 0-.972 0l-2.186 2.186a10.68 10.68 0 0 0-2.606-.864c-.527-.099-1.061-.149-1.597-.149-5.585 0-9.982 5.528-10.166 5.763a.69.69 0 0 0 0 .848c.897 1.09 1.915 2.075 3.033 2.936.529.415 1.083.796 1.66 1.142l-1.888 1.887c-.066.063-.118.139-.154.223a.69.69 0 0 0 .145.757.67.67 0 0 0 .226.15c.085.034.175.052.266.051a.69.69 0 0 0 .265-.056c.084-.036.16-.088.223-.154l13.75-13.75a.69.69 0 0 0 0-.972zm-13.65 9.636A18.51 18.51 0 0 1 2.278 11C3.39 9.754 6.927 6.187 11 6.187a7.31 7.31 0 0 1 1.348.127 8.92 8.92 0 0 1 1.814.55L12.895 8.13c-.661-.437-1.453-.632-2.241-.552a3.44 3.44 0 0 0-2.085.989c-.56.56-.91 1.297-.989 2.085a3.44 3.44 0 0 0 .552 2.241l-1.601 1.604a14.43 14.43 0 0 1-1.82-1.222zm4.432-1.392c-.134-.275-.204-.577-.206-.883a2.07 2.07 0 0 1 .6-1.456 2.12 2.12 0 0 1 2.338-.392l-2.731 2.731z"></path>
                                            </svg>
                                            <svg class="eye-open" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#8ea5c8">
                                                <path d="M19.873 9.611c-.179-.244-4.436-5.985-9.873-5.985S.305 9.367.127 9.611a.66.66 0 0 0 0 .778c.178.244 4.436 5.985 9.873 5.985s9.694-5.74 9.873-5.984a.66.66 0 0 0 0-.778zM10 15.055c-4.005 0-7.474-3.81-8.501-5.055C2.525 8.753 5.986 4.945 10 4.945c4.005 0 7.473 3.809 8.501 5.055-1.025 1.247-4.487 5.054-8.501 5.054zm0-9.011A3.96 3.96 0 0 0 6.044 10 3.96 3.96 0 0 0 10 13.956 3.96 3.96 0 0 0 13.956 10 3.96 3.96 0 0 0 10 6.044zm0 6.593A2.64 2.64 0 0 1 7.363 10 2.64 2.64 0 0 1 10 7.363 2.64 2.64 0 0 1 12.637 10 2.64 2.64 0 0 1 10 12.637z"></path>
                                            </svg>
                                        </div>
                                        <span id="user_pass_error"></span>
                                    </div>
                                    <div class="form-group text-left">
                                        <button class="site-button m-r5 login-switch" type="submit" id="userLoginBtn">login</button>
                                        <div class="m-t20 d-flex justify-content-between">
                                            <div class="m-b0">
                                                <!-- <input id="check1" type="checkbox">
                                                <label for="check1">Remember me</label> -->
                                            </div>
                                            <a data-bs-toggle="tab" href="#forgot-password" class="m-l10"><i class="fa fa-unlock-alt"></i> Forgot Password</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<!-- Footer -->
<footer class="site-footer footer-overlay bg-img-fix" style="background-image: url(<?= base_url() ?>public/assets/images/background/bg5.jpg); background-position: center bottom; background-size: cover; display: block;">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 footer-col-4">
                    <form role="search" method="post" action="script/mailchamp.php" class="dzSubscribe bg-primary p-a20 text-white m-t15">
                        <h2 class="m-tb0 font-40">Subscribe</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <div class="m-tb15">
                            <ul class="dez-social-icon border dez-social-icon-lg">
                                <li><a href="javascript:void(0);" class="fa fa-facebook fb-btn"></a></li>
                                <li><a href="javascript:void(0);" class="fa fa-twitter tw-btn"></a></li>
                                <li><a href="javascript:void(0);" class="fa fa-linkedin link-btn"></a></li>
                                <li><a href="javascript:void(0);" class="fa fa-pinterest-p pin-btn"></a></li>
                            </ul>
                        </div>
                        <div class="m-b15">
                            <div class="dzSubscribeMsg"></div>
                            <input name="dzEmail" required="required" class="form-control" placeholder="Email Adddres" type="email">
                        </div>
                        <div class="">
                            <input name="submit" value="Submit" type="submit" class="site-button button-3d gray btn-block w-100">
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-sm-6 footer-col-4">
                    <div class="widget recent-posts-entry">
                        <h4 class="m-b15 text-uppercase">Recent Post</h4>
                        <div class="dez-separator bg-primary"></div>
                        <div class="widget-post-bx">
                            <div class="widget-post clearfix">
                                <div class="dez-post-media"> <img src="<?= base_url() ?>public/assets/images/blog/recent-blog/pic1.jpg" alt="" width="200" height="143"> </div>
                                <div class="dez-post-info">
                                    <div class="dez-post-header">
                                        <h6 class="post-title"><a href="blog-single.html">Title of first blog</a></h6>
                                    </div>
                                    <div class="dez-post-meta">
                                        <ul>
                                            <li class="post-author">By <a href="javascript:void(0);">Admin</a></li>
                                            <li class="post-comment"><i class="fa fa-comments"></i> 28</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-post clearfix">
                                <div class="dez-post-media"> <img src="<?= base_url() ?>public/assets/images/blog/recent-blog/pic2.jpg" alt="" width="200" height="160"> </div>
                                <div class="dez-post-info">
                                    <div class="dez-post-header">
                                        <h6 class="post-title"><a href="blog-single.html">Title of first blog</a></h6>
                                    </div>
                                    <div class="dez-post-meta">
                                        <ul>
                                            <li class="post-author">By <a href="javascript:void(0);">Admin</a></li>
                                            <li class="post-comment"><i class="fa fa-comments"></i> 28</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-post clearfix">
                                <div class="dez-post-media"> <img src="<?= base_url() ?>public/assets/images/blog/recent-blog/pic3.jpg" alt="" width="200" height="160"> </div>
                                <div class="dez-post-info">
                                    <div class="dez-post-header">
                                        <h6 class="post-title"><a href="blog-single.html">Title of first blog</a></h6>
                                    </div>
                                    <div class="dez-post-meta">
                                        <ul>
                                            <li class="post-author">By <a href="javascript:void(0);">Admin</a></li>
                                            <li class="post-comment"><i class="fa fa-comments"></i> 28</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 footer-col-4">
                    <div class="widget widget_services">
                        <h4 class="m-b15 text-uppercase">Our services</h4>
                        <div class="dez-separator bg-primary"></div>
                        <ul>
                            <li><a href="services-2.html">Membership Offers</a></li>
                            <li><a href="services-2.html">Training Schedule</a></li>
                            <li><a href="services-2.html">Inter Competitions</a></li>
                            <li><a href="services-2.html">Awards & Trophies</a></li>
                            <li><a href="services-2.html">Additional Help</a></li>
                            <li><a href="services-2.html">Training Schedule</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 footer-col-4">
                    <div class="widget widget_services">
                        <h4 class="m-b15 text-uppercase">Company Policies</h4>
                        <div class="dez-separator bg-primary"></div>
                        <ul>
                            <li><a href="<?= base_url() ?>privacy-policy">Privacy Policy</a></li>
                            <li><a href="<?= base_url() ?>term-condition">Terms & Conditions</a></li>
                            <li><a href="<?= base_url() ?>refund-policy">Refund Policy</a></li>
                            <!-- <li><a href="services-2.html">Awards & Trophies</a></li>
                                <li><a href="services-2.html">Additional Help</a></li>
                                <li><a href="services-2.html">Training Schedule</a></li> -->
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-sm-6 footer-col-4">
						<div class="widget widget_gallery">
							<h4 class="m-b15 text-uppercase">PHOTOS FROM FLICKR</h4>
							<div class="dez-separator bg-primary"></div>
							<ul>
								<li class="img-effect2"> <a href="javascript:void(0);"><img src="<?= base_url() ?>public/assets/images/gallery/small/pic1.jpg" alt=""></a> </li>
								<li class="img-effect2"> <a href="javascript:void(0);"><img src="<?= base_url() ?>public/assets/images/gallery/small/pic2.jpg" alt=""></a> </li>
								<li class="img-effect2"> <a href="javascript:void(0);"><img src="<?= base_url() ?>public/assets/images/gallery/small/pic3.jpg" alt=""></a> </li>
								<li class="img-effect2"> <a href="javascript:void(0);"><img src="<?= base_url() ?>public/assets/images/gallery/small/pic4.jpg" alt=""></a> </li>
								<li class="img-effect2"> <a href="javascript:void(0);"><img src="<?= base_url() ?>public/assets/images/gallery/small/pic5.jpg" alt=""></a> </li>
								<li class="img-effect2"> <a href="javascript:void(0);"><img src="<?= base_url() ?>public/assets/images/gallery/small/pic6.jpg" alt=""></a> </li>
								<li class="img-effect2"> <a href="javascript:void(0);"><img src="<?= base_url() ?>public/assets/images/gallery/small/pic7.jpg" alt=""></a> </li>
								<li class="img-effect2"> <a href="javascript:void(0);"><img src="<?= base_url() ?>public/assets/images/gallery/small/pic8.jpg" alt=""></a> </li>
								<li class="img-effect2"> <a href="javascript:void(0);"><img src="<?= base_url() ?>public/assets/images/gallery/small/pic9.jpg" alt=""></a> </li>
							</ul>
						</div>
					</div> -->
            </div>
        </div>
    </div>
    <!-- footer bottom part -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-left">
                    <p class="grey">© Copyright <span class="current-year">2024</span></p>
                </div>
                <div class="col-lg-4 text-center"> <span> Design With <i class="fa fa-heart text-red heart"></i> By Dcode Materials </span> </div>
                <div class="col-lg-4 text-right "> <a href="<?= base_url() ?>"> About</a> <a href="<?= base_url() ?>"> Help Desk</a> <a href="<?= base_url() ?>"> Privacy Policy</a> </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer END-->
<!-- scroll top button -->
<button class="scroltop fa fa-caret-up"></button>
</div>
<!-- <div id="loading-area"></div> -->
<!-- JavaScript  files ========================================= -->
<script src="<?= base_url() ?>public/assets/js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
<script src="<?= base_url() ?>public/assets/plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<!-- <script src="<?= base_url() ?>public/assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>FORM JS -->
<script src="<?= base_url() ?>public/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script src="<?= base_url() ?>public/assets/plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
<script src="<?= base_url() ?>public/assets/plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="<?= base_url() ?>public/assets/plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="<?= base_url() ?>public/assets/plugins/countdown/jquery.countdown.js"></script><!-- COUNTDOWN JS -->
<script src="<?= base_url() ?>public/assets/plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
<script src="<?= base_url() ?>public/assets/plugins/masonry/isotope.pkgd.min.js"></script><!-- MASONRY -->
<script src="<?= base_url() ?>public/assets/plugins/masonry/masonry-4.2.2.js"></script><!-- MASONRY -->
<script src="<?= base_url() ?>public/assets/plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
<script src="<?= base_url() ?>public/assets/plugins/lightgallery/js/lightgallery-all.js"></script><!-- LIGHT GALLERY -->
<!-- <script src="<?= base_url() ?>public/assets/js/dz.ajax.js"></script>CONTACT JS  -->
<!-- <script src="<?= base_url() ?>public/assets/plugins/switcher/js/switcher.min.js"></script> -->
<script src="<?= base_url() ?>public/assets/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<!-- <script src="<?= base_url() ?>public/assets/js/dz.carousel.min.js"></script>SORTCODE FUCTIONS  -->
<!-- revolution JS FILES -->
<script src="<?= base_url() ?>public/assets/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="<?= base_url() ?>public/assets/plugins/revolution/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/revolution/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/revolution/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/revolution/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/revolution/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/revolution/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/revolution/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/revolution/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="<?= base_url() ?>public/assets/js/rev.slider.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Load jQuery Validation Plugin -->
<script src="https://cdn.rawgit.com/jzaefferer/jquery-validation/1.19.3/dist/jquery.validate.min.js"></script>
<script>
    jQuery(document).ready(function() {
        'use strict';
        dz_rev_slider_1();
    }); /*ready*/


    $(document).ready(function() {
        $('#signInBtn').click(function() {
            $('#signinModal').modal('show');
        });
        $('.modal .close').click(function() {
            $('.modal').modal('hide');
        });


        $('#userLoginBtn').on('click', function(param) {
            param.preventDefault(); // Prevent the form from submitting

            var username = $('#username').val();
            var userpassword = $('#userpassword').val();
            $('#username_error').text('');
            $('#user_pass_error').text('');

            if (username == "") {
                $('#username_error').text('Required username');
            } else if (userpassword == "") {
                $('#user_pass_error').text('Required Password');
            } else {
                $.ajax({
                    type: "post",
                    url: "<?= base_url() ?>userlogin",
                    data: {
                        username: username,
                        userpassword: userpassword
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Login Successful!',
                                text: 'Redirecting to Team Registration...',
                                timer: 1000, // Auto close after 1 second
                                showConfirmButton: false,
                            }).then(function() {
                                // Redirect after SweetAlert closes
                                window.location.href = "<?= base_url() ?>team-registration";
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: response,
                                text: 'Please try again...',
                                timer: 1000, // Auto close after 1 second
                                showConfirmButton: false,
                            });
                        }
                    }
                });
            }
        });


    });
</script>
</body>

</html>