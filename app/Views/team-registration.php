<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>

<!-- contact area -->
<div class="clearfix">
    <!-- Product -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6 m-b30">
                    <div class="dez-box p-a20 border-1 bg-gray">
                        <div class="dez-thum-bx dez-img-overlay1 dez-img-effect zoom"> <img src="<?= base_url() ?>public/assets/images/product/pic1.jpg" alt="">
                            <div class="overlay-bx">
                                <div class="overlay-icon"> <a href="javascript:void(0)"> <i class="fa fa-cart-plus icon-bx-xs"></i> </a> <a href="javascript:void(0)"> <i class="fa fa-search icon-bx-xs"></i> </a> <a href="javascript:void(0)"> <i class="fa fa-heart icon-bx-xs"></i> </a> </div>
                            </div>
                        </div>
                        <div class="dez-info p-t20 text-center">
                            <h4 class="dez-title m-t0 m-b10 text-capitalize"><a href="javascript:void(0);">first heading</a></h4>
                            <h2 class="m-tb0">$20.00 </h2>
                            <a href="javascript:void(0)" class="site-button  m-t15">Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>