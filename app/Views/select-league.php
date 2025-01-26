<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>
<!-- contact area -->
<div class="clearfix">
    <!-- Product -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="row">
                <?php foreach ($leagues as $value) { ?>
                    <div class="col-lg-4 col-sm-6 m-b30">
                        <div class="dez-box p-a20 border-1 bg-gray">
                            <div class="dez-thum-bx dez-img-overlay1 dez-img-effect zoom">
                                <?php if (!empty($value['featured_image']) && file_exists('public/admin/uploads/league/' . $value['featured_image'])): ?>
                                    <img src="<?= base_url() ?>public/admin/uploads/league/<?= $value['featured_image'] ?>" alt="">
                                <?php else: ?>
                                    <img src="<?= base_url() ?>public/admin/uploads/league/invalid_image.png" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="dez-info p-t20 text-center">
                                <h4 class="dez-title m-t0 m-b10 text-capitalize"><a href="<?= base_url() ?>enroll-tournament/<?= $sports_id ?>/<?= $value['id'] ?>"><?= $value['name'] ?></a></h4>
                                <?php if(!empty($value['league_for'])){ ?><p class="site-button button-sm radius-sm m-t5"><?= $value['league_for'] ?></p><?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>