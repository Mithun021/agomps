<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>
<?php
use App\Models\League_session_model;
use App\Models\Tournament_model;
$league_session_model = new League_session_model();
$tournament_model = new Tournament_model();
$current_session = $league_session_model->currectSession();
?>
<!-- contact area -->
<div class="clearfix">
    <!-- Product -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="row">
                <?php foreach ($leagues as $value) { ?>

                    <?php $tournaments = $tournament_model->getBySportsLeague($sports_id,$value['id'],$current_session['id']); ?>

                    <div class="col-lg-3 col-sm-6 m-b30">
                        <div class="dez-box p-a20 border-1 bg-gray">
                            <div class="dez-thum-bx dez-img-overlay1 dez-img-effect zoom">
                                <?php if (!empty($value['featured_image']) && file_exists('public/admin/uploads/league/' . $value['featured_image'])): ?>
                                    <img src="<?= base_url() ?>public/admin/uploads/league/<?= $value['featured_image'] ?>" alt="">
                                <?php else: ?>
                                    <img src="<?= base_url() ?>public/admin/uploads/league/invalid_image.png" alt="">
                                <?php endif; ?>
                            </div>
                            <?php echo "<pre>"; print_r($tournaments); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>