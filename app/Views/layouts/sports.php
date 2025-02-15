<?php

use App\Models\Sports_model;
use App\Models\Game_category_model;
use App\Models\League_session_model;
use App\Models\Sports_subcategory_model;
use App\Models\Tournament_model;

$sports_model = new Sports_model();
$sports = $sports_model->getActiveData();
$game_category_model = new Game_category_model();
$game_category = $game_category_model->get();
$league_session_model = new League_session_model();
$league_session = $league_session_model->currectSession();
$tournament_model = new Tournament_model();
$sports_subcategory_model = new Sports_subcategory_model();
?>
<style>
    .enrollprice span {
        font-weight: 600;
    }

    img.sports_icon {
        height: 18px !important;
    }

    .joinColor {
        color: #0559db;
        font-weight: bold;
        font-style: italic;
        font-size: 12px;
    }

    .tournamentDateColor {
        color: #f42b0c;
        font-weight: bold;
        font-style: italic;
        font-size: 12px;
    }

    .image_with_price{
        position: relative;
    }
    .image_with_price
    .winColor {
        position: absolute;
        left: 0;
        bottom: 0;
        background-color:rgba(255, 255, 255, 0.58);
        width: 100%;
        color: #7307d3;
        font-weight: bold;
        font-style: italic;
        font-size: 14px;
        text-align: center;
    }

    .divider {
        border: 1px solid rgb(81, 80, 80);
    }

    h5.card-title {
        font-size: 24px;
        font-weight: bold;
        margin-top: 5px;
    }
</style>
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
        <div class="section-content ">
            <div class="row m-lr0">

                <div class="dez-tabs border bg-tabs">

                    <ul class="nav nav-tabs" id="myTabContent" role="tablist">
                        <?php
                        $isFirst = true;
                        foreach ($sports as $value) {
                        ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo $isFirst ? 'active' : ''; ?>"
                                    id="sportsCat<?= $value['id'] ?>"
                                    data-bs-toggle="tab"
                                    data-bs-target="#sports-<?= $value['id'] ?>"
                                    type="button" role="tab"
                                    aria-controls="sports-<?= $value['id'] ?>"
                                    aria-selected="<?= $isFirst ? 'true' : 'false' ?>">
                                    <img src="<?= base_url() ?>public/admin/uploads/sports/<?= $value['sports_image'] ?>" alt="<?= $value['name'] ?> Icon" class="sports_icon">
                                    <span class="title-head"><?= $value['name'] ?></span>
                                </button>
                            </li>
                            <?php $isFirst = false; ?> <!-- Once the first tab is rendered, the flag is set to false -->
                        <?php } ?>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <?php
                        $isFirst = true; // Flag to set the first tab as active by default
                        foreach ($sports as $value) {
                        ?>

                            <div class="tab-pane fade <?php echo $isFirst ? 'show active' : ''; ?>" id="sports-<?= $value['id'] ?>" role="tabpanel" aria-labelledby="sportsCat<?= $value['id'] ?>" tabindex="0">

                                <!-- Game Category  -->
                                <?php if ($game_category) {
                                    foreach ($game_category as $key => $gcat) {
                                        echo "<h1>" . $gcat['game_category'] . "</h1>";
                                        $tournament = $tournament_model->get_by_category($league_session['id'], $value['id'], $gcat['game_category']);
                                        echo "<div class='row'>";
                                        foreach ($tournament as $key => $tournament) { ?>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="card p-0 mb-3">
                                                    <a href="<?= base_url() ?>enroll-tournament">
                                                    <div class="image_with_price">
                                                        <?php if (!empty($tournament['featured_image']) && file_exists('public/admin/uploads/tournament/' . $tournament['featured_image'])): ?>
                                                            <img src="<?= base_url() ?>public/admin/uploads/tournament/<?= $tournament['featured_image'] ?>" alt="" class="card-img-top">
                                                        <?php else: ?>
                                                            <img src="<?= base_url() ?>public/admin/uploads/invalid_image.jpg" alt="" class="card-img-top">
                                                        <?php endif; ?>

                                                        <p class="winColor m-0"><i class="fa fa-trophy"></i> Winning Guarantee : <i class="fa fa-inr"></i> <?= $tournament['first_rank_price'] ?></p>
                                                    </div>
                                                    <div class="card-body py-1">
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <p class="joinColor m-0"><i class="fa fa-user-plus"></i> Join : <i class="fa fa-inr"></i>
                                                                <?php
                                                                if ($tournament['game_type'] == "Individual") {
                                                                    $registration_fee = $tournament['registration_fee'];
                                                                    $discount_registration_fee = $tournament['discount_registration_fee'];
                                                                    $tournament_price = $registration_fee;
                                                                    if (!empty($discount_registration_fee) && $discount_registration_fee < $registration_fee) {
                                                                        $tournament_price = $discount_registration_fee;
                                                                    }
                                                                    echo $tournament_price;
                                                                } else if ($tournament['game_type'] == "Team") {
                                                                    $registration_fee = $tournament['team_entry_fee'];
                                                                    $discount_registration_fee = $tournament['team_entry_fee_discount'];
                                                                    $tournament_price = $registration_fee;
                                                                    if (!empty($discount_registration_fee) && $discount_registration_fee < $registration_fee) {
                                                                        $tournament_price = $discount_registration_fee;
                                                                    }
                                                                    echo $tournament_price;
                                                                }
                                                                ?>
                                                            </p>

                                                            <p class="tournamentDateColor m-0"><i class="fa fa-calendar"></i> End : <?php echo date("d-M-y", strtotime($league_session['end_date'])); ?></p>
                                                        </div>
                                                        <hr class="divider m-0">
                                                        <h5 class="card-title text-center"><?= $tournament['league_for'] ?? '#NA' ?> <?= $sports_subcategory_model->get($tournament['sport_subcategory'])['sub_category_name'] ?? '' ?> <?= $value['name'] ?></h5>
                                                    </div>
                                                    </a>
                                                </div>
                                            </div>
                                <?php }
                                        echo "</div>";

                                        // echo "<pre>"; print_r($tournament);
                                    }
                                }


                                ?>


                            </div>
                        <?php $isFirst = false;
                        } ?>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- Team member END -->