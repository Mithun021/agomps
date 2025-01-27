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

                    <?php $tournaments = $tournament_model->getBySportsLeague($sports_id, $value['id'], $current_session['id']); ?>

                    <div class="col-lg-3 col-sm-6 m-b30">
                        <div class="dez-box p-a20 border-1 bg-gray">
                            <div class="dez-thum-bx dez-img-overlay1 dez-img-effect zoom">
                                <?php if (!empty($value['featured_image']) && file_exists('public/admin/uploads/league/' . $value['featured_image'])): ?>
                                    <img src="<?= base_url() ?>public/admin/uploads/league/<?= $value['featured_image'] ?>" alt="">
                                <?php else: ?>
                                    <img src="<?= base_url() ?>public/admin/uploads/league/invalid_image.png" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="dez-info p-t20 text-center">
                                <h4 class="dez-title m-t0 m-b10 text-capitalize"><a href="<?= base_url() ?>enroll-tournament/<?= $sports_id ?>/<?= $value['id'] ?>"><?= $value['name'] ?> <?php if (!empty($value['league_for'])) { ?><p class="site-button button-sm radius-sm m-t5"><?= $value['league_for'] ?></p><?php } ?> </a></h4>
                            </div>
                            <?php ""; //echo "<pre>"; print_r($tournaments); 
                            ?>
                            <div class="price_details">
                                <?php if ($tournaments) { ?><h5 class="text-info"><i class="fa fa-hand-o-right"></i> Join : <i class="fa fa-rupee"></i>
                                        <?php
                                        if ($value['name'] == "Individual Games") {
                                            $registration_fee = $tournaments['registration_fee'];
                                            $discount_registration_fee = $tournaments['discount_registration_fee'];
                                            $tournament_price = $registration_fee;
                                            if (!empty($discount_registration_fee) && $discount_registration_fee < $registration_fee) {
                                                $tournament_price = $discount_registration_fee;
                                            }
                                        } else {
                                            $tournament_price = $tournaments['team_entry_fee'] ?? '';
                                        }
                                        echo $tournament_price;
                                        ?>
                                    </h5>
                                <?php } ?>
                                <?php if ($tournaments) { ?><h5 class="text-primary"><i class="fa fa-trophy"></i> Win : <i class="fa fa-rupee"></i> <?= $tournaments['first_rank_price'] ?></h5> <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>