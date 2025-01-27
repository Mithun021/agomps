<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>

<!-- contact area -->
<div class="clearfix">
    <!-- Product -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="row m-lr0">
                <?php foreach ($sports as $value) { ?>
                    <div class="col-lg-3 col-sm-6 p-a0 m-b30">
                        <div class="dez-box dez-media">
                            <?php if (!empty($value['sports_image']) && file_exists('public/admin/uploads/sports/' . $value['sports_image'])): ?>
                                <img width="292" height="292" src="<?= base_url() ?>public/admin/uploads/sports/<?= $value['sports_image'] ?>" alt="">
                            <?php else: ?>
                                <img width="292" height="292" src="<?= base_url() ?>public/admin/uploads/sports/invalid_image.png" alt="">
                            <?php endif; ?>
                            <!-- <img width="292" height="292" src="<?= base_url() ?>public/assets/images/sports/pic1.jpg" alt=""> -->
                            <div class="dez-info-has p-a20 bg-primary text-left skew-triangle right-top text-center">
                                <h4 class="text-capitalize"> <?= $value['name'] ?></h4>
                                <div class="dez-info-has-text"><?php if (!empty($value['description'])) {
                                                                    echo $value['description'];
                                                                } ?></div>
                                <div class="m-tb30"><a href="<?= base_url() ?>select-league/<?= $value['id'] ?>" class="site-button outline white border-1">Read More</a></div>
                            </div>
                            <div class="dez-title-bx bg-gray p-a20 text-left skew-triangle left-top">
                                <h4 class="m-a0 text-capitalize"> <?= $value['name'] ?></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <?php foreach ($sports as $value) { ?>
                    <div class="col-lg-4 col-sm-6 m-b30">
                        <div class="dez-box p-a20 border-1 bg-gray">
                            <div class="dez-thum-bx dez-img-overlay1 dez-img-effect zoom">
                                <?php if (!empty($value['sports_image']) && file_exists('public/admin/uploads/sports/' . $value['sports_image'])): ?>
                                    <img src="<?= base_url() ?>public/admin/uploads/sports/<?= $value['sports_image'] ?>" alt="">
                                <?php else: ?>
                                    <img src="<?= base_url() ?>public/admin/uploads/sports/invalid_image.png" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="dez-info p-t20 text-center">
                                <h4 class="dez-title m-t0 m-b10 text-capitalize"><a href="<?= base_url() ?>select-league/<?= $value['id'] ?>"><?= $value['name'] ?></a></h4>
                                <?php if (!empty($value['description'])) { ?><p><?= $value['description'] ?></p><?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>