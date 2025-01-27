<?php

use App\Models\Sports_model;

$sports_model = new Sports_model();
$sports = $sports_model->getActiveData();
?>

<!-- Our Achievements -->
<div class="section-full bg-white content-inner our-achievements">
    <div class="container">
        <div class="section-head text-center ">
            <h2 class="h2 text-uppercase"> Well-Managed Sports Leagues</h2>
            <div class="dez-separator-outer ">
                <div class="dez-separator bg-primary style-liner"></div>
            </div>
            <p>Well-managed sports leagues ensure fair competition, seamless organization, and a professional environment, providing athletes with opportunities to thrive.</p>
        </div>
        <div class="section-content text-center ">
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
                                <div class="dez-info-has-text"><?php if(!empty($value['description'])){  echo $value['description']; } ?></div>
                                <div class="m-tb30"><a href="<?= base_url() ?>select-league/<?= $value['id'] ?>" class="site-button outline white border-1">Read More</a></div>
                            </div>
                            <div class="dez-title-bx bg-gray p-a20 text-left skew-triangle left-top">
                                <h4 class="m-a0 text-capitalize"> <?= $value['name'] ?></h4> <hr class="my-1">
                                <div class="d-flex justify-content-between">
                                    <span class="text-info"><i class="fa fa-hand-o-right"></i> Join : <i class="fa fa-rupee"></i> <?= $value['joining_amount'] ?></span>
                                    <span class="text-primary"><i class="fa fa-trophy"></i> Win : <i class="fa fa-rupee"></i> <?= $value['winning_amount'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Team member END -->