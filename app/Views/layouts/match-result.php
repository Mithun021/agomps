<?php

use App\Models\Game_category_model;
use App\Models\Investment_plan_model;
use App\Models\Teams_model;
use App\Models\Investment_model;
$teams_model = new Teams_model();
$teams = $teams_model->getActiveData();
$game_category_model = new Game_category_model();
$investment_plan_model = new Investment_plan_model();
$investment_plan = $investment_plan_model->get();
$investment_model = new Investment_model();
?>

<style>
    .investmentBox{
        position: relative;
    }
    .investmentBox h5.card-title{
        font-size: 14px !important;
        margin: 0;
        padding: 0;
    }
    .investmentBox p.card-text{
        font-size: 12px;
    }
</style>
 
 <!-- Latest Result -->
 <div class="section-full bg-gray content-inner">
     <div class="container">
         <div class="row col-set-block white-block">
             <!-- Center Section -->
             <div class="col-sm-12 col-lg-8 col-12 g-1">
                 <!-- Latest Match -->
                  <div class="dez-head-bx m-a-out m-b20 skew-triangle right-top">
                     <h3 class="m-a0">Smart Investment Strategies for Maximizing Profit</h3>
                 </div>
                 <!--<div class="row col-set-block">
                     <div class="col-lg-6 col-sm-6 m-b20">
                         <a href="<?= base_url() ?>team-registration"><img width="600" height="350" src="<?= base_url() ?>public/assets/images/ads/1.jpg" alt=""></a>
                     </div>
                     <div class="col-lg-6 col-sm-6 m-b20">
                         <a href="<?= base_url() ?>team-registration"><img width="600" height="350" src="<?= base_url() ?>public/assets/images/ads/2.jpg" alt=""></a>
                     </div>
                 </div>
                 <div class="dez-live-match bg-white">
                     <div class="m-b20 blog-grid date-style-2">
                         <div class="dez-post-media dez-img-effect zoom-slow">
                             <img width="960" height="342" src="<?= base_url() ?>public/assets/images/gallery/agomps_uppl.png" alt="">
                         </div>
                         <div class="dez-post-info border-1 p-a20 border-light ">
                             <div class="dez-post-title ">
                                 <h3 class="m-t0 m-b10"><a href="javascript:void(0);" class="">Live Match</a></h3>
                             </div>
                             <div class="dez-post-meta ">
                                 <ul>
                                     <li class=""> <i class="fa fa-calendar"></i><strong>30 Jan</strong> <span> <span>2025</span></span> </li>
                                     <li class="post-author"><i class="fa fa-user"></i>By <a href="javascript:void(0);">AGOMPS</a> </li>
                                     <li class="post-comment"><i class="fa fa-comments"></i> <a href="javascript:void(0);">0 Comments</a> </li>
                                 </ul>
                             </div>
                             <div class="dez-post-text">
                                 <p>There has been a slight tweak to the schedule for the 18th season of the Indian Premier League (IPL), with the tournament now set to begin a week later than originally announced. Cricbuzz has learnt that the season will commence on March 21 in Kolkata and the final is likely to take place on May 25 at the same venue.</p>
                             </div>
                             <div class="dez-post-readmore"> <a href="javascript:void(0);" title="READ MORE" rel="bookmark" class="site-button-link">READ MORE<i class="fa fa-angle-double-right"></i></a> </div>

                         </div>
                     </div>
 
                 </div> -->
                 <!-- Latest Match End -->

                 <?php foreach ($investment_plan as $key => $plan) { ?>
                    <?php $investment = $investment_model->get_by_plan($plan['id']); ?>
                        <div class="col-lg-12">
                            <div class="dez-head-bx m-a-out m-b20 skew-triangle right-top">
                                <h3 class="m-a0"><?= $plan['plan_type'] ?></h3>
                            </div>
                            <div class="row">
                            <?php foreach ($investment as $key => $value) { ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card p-0 mb-3">
                                        <?php if (!empty($value['featured_image']) && file_exists('public/admin/uploads/investment/' . $value['featured_image'])): ?>
                                            <img src="<?= base_url() ?>public/admin/uploads/investment/<?= $value['featured_image'] ?>" alt="" class="card-img-top">
                                        <?php else: ?>
                                            <img src="<?= base_url() ?>public/admin/uploads/invalid_image.jpg" alt="" class="card-img-top">
                                        <?php endif; ?>
                                        <div class="card-body investmentBox">
                                            <h5 class="card-title"><?= $value['title'] ?> - <i class="fa fa-inr"></i> <?= $value['min_amount'] ?> Investment</h5>
                                            <hr class="m-0">
                                            <div class="d-flex justify-content-between m-0">
                                                <p class="card-text m-0 fw-bold text-danger"><i class="fa fa-bullhorn"></i> Invest : <i class="fa fa-inr"></i><?= $value['min_amount'] ?></p>
                                                <p class="card-text m-0 fw-bold"><i class="fa fa-money"></i> Profit : <i class="fa fa-inr"></i><?= $value['expected_return'] ?></p>  
                                            </div>
                                            <p class="card-text m-0 fw-bold text-success"><i class="fa fa-clock-o"></i> Duration : <?= $value['invest_duration'] ?> <?= $value['durantion_type'] ?></p>
                                            <a href="<?= base_url() ?>investment-details/<?= $value['id'] ?>" class="btn btn-sm btn-primary">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    <?php } ?>


             </div>
             <!-- Right Section -->
             <div class="col-sm-12 col-lg-4 col-12 ">
                 <!-- Match Overview -->
                 <div class="dez-card bg-white">
                     <div class="dez-head-bx m-a-out skew-triangle right-top">
                         <h3 class="m-a0">Match Overview</h3>
                     </div>
                     <table class="table table-bordered  border-light dez-score-table bg-white">
                         <thead>
                             <tr class="">
                                 <th>#</th>
                                 <th>Team</th>
                                 <th>P</th>
                                 <th>W</th>
                                 <th>L</th>
                             </tr>
                         </thead>
                         <tbody>
                        <?php foreach ($teams as $key => $value) { ?>
                            <tr>
                                 <th scope="row"><?= ++$key ?></th>
                                 <td><span class="team-thumb">
                                 <?php if (!empty($value['logo']) && file_exists('public/assets/sports-logo/' . $value['logo'])): ?>
                                            <img src="<?= base_url() ?>public/assets/sports-logo/<?= $value['logo'] ?>" alt="" height="30px" width="30">
                                        <?php else: ?>
                                            <img src="<?= base_url() ?>public/assets/sports-logo/invalid_image.png" alt=""  height="30px" width="30">
                                        <?php endif; ?></span><?= $value['name'] ?></td>
                                 <td>0</td>
                                 <td>0</td>
                                 <td>0</td>
                             </tr>
                        <?php } ?>
                         </tbody>
                     </table>
                 </div>
                 <!-- Match Overview END -->
                 <!-- Our Gallery -->
                 <div class="dez-card bg-white">
                    <div class="advertisment">
                        <img src="<?= base_url() ?>public/admin/uploads/advertisment/advertisment.jpg" alt="">
                    </div>
                     <!-- <div class="dez-head-bx m-a-out skew-triangle right-top">
                         <h3 class="m-a0">Our Gallery</h3>
                     </div>
                     <div class="widget  widget_gallery  p-a20 border-1 border-light">
                         <ul class="m-b0">
                             <li class="img-effect2"> <a href="javascript:void(0);"><img width="165" height="148" src="<?= base_url() ?>public/assets/images/gallery/small/pic1.jpg" alt=""></a> </li>
                             <li class="img-effect2"> <a href="javascript:void(0);"><img width="165" height="148" src="<?= base_url() ?>public/assets/images/gallery/small/pic2.jpg" alt=""></a> </li>
                             <li class="img-effect2"> <a href="javascript:void(0);"><img width="165" height="148" src="<?= base_url() ?>public/assets/images/gallery/small/pic3.jpg" alt=""></a> </li>
                             <li class="img-effect2"> <a href="javascript:void(0);"><img width="165" height="148" src="<?= base_url() ?>public/assets/images/gallery/small/pic4.jpg" alt=""></a> </li>
                             <li class="img-effect2"> <a href="javascript:void(0);"><img width="165" height="148" src="<?= base_url() ?>public/assets/images/gallery/small/pic5.jpg" alt=""></a> </li>
                             <li class="img-effect2"> <a href="javascript:void(0);"><img width="165" height="148" src="<?= base_url() ?>public/assets/images/gallery/small/pic6.jpg" alt=""></a> </li>
                             <li class="img-effect2"> <a href="javascript:void(0);"><img width="165" height="148" src="<?= base_url() ?>public/assets/images/gallery/small/pic7.jpg" alt=""></a> </li>
                             <li class="img-effect2"> <a href="javascript:void(0);"><img width="165" height="148" src="<?= base_url() ?>public/assets/images/gallery/small/pic8.jpg" alt=""></a> </li>
                             <li class="img-effect2"> <a href="javascript:void(0);"><img width="165" height="148" src="<?= base_url() ?>public/assets/images/gallery/small/pic9.jpg" alt=""></a> </li>
                         </ul>
                     </div> -->
                 </div>
                 <!-- Our Gallery END -->
                 
             </div>
         </div>
     </div>
 </div>
 <!-- Latest Result END -->