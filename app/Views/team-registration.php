<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>

<!-- contact area -->
<div class="clearfix">
    <!-- Product -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="row">
                <?php foreach ($sports as $value) { ?>
                    <div class="col-lg-4 col-sm-6 m-b30">
                        <div class="dez-box p-a20 border-1 bg-gray">
                            <div class="dez-thum-bx dez-img-overlay1 dez-img-effect zoom">
                                <?php if (!empty($value['sports_image']) && file_exists('public/admin/uploads/sports/' . $value['sports_image'])): ?>
                                    <a href="<?= base_url() ?>public/admin/uploads/sports/<?= $value['sports_image'] ?>" target="_blank"><img src="<?= base_url() ?>public/admin/uploads/sports/<?= $value['sports_image'] ?>" alt=""></a>
                                <?php else: ?>
                                    <img src="<?= base_url() ?>public/admin/uploads/sports/invalid_image.png" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="dez-info p-t20 text-center">
                                <h4 class="dez-title m-t0 m-b10 text-capitalize"><a href="javascript:void(0);">first heading</a></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>