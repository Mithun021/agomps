<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>
<?php

use App\Models\Enroll_tournament_model;
use App\Models\League_category_model;
use App\Models\League_session_model;
use App\Models\Sports_model;
use App\Models\Sports_subcategory_model;

$sports_model = new Sports_model();
$league_category_model = new League_category_model();
$league_session_model = new League_session_model();
$enroll_tournament_model = new Enroll_tournament_model();
$sports_subcategory_model = new Sports_subcategory_model();
$sessionData = session()->get('loggedPlayerData');
if ($sessionData) {
    $loggedplayerId = $sessionData['loggedplayerId'];
}

?>

<style>
    form span {
        font-weight: 600;
    }

    form input,
    form select {
        width: 100%;
        height: 40px !important;
    }

    table {
        width: 100%;
        border: 1px solid #BABABA;
    }

    table thead {
        background-color: #232323;
        color: #FFF;
    }

    table thead tr td,
    table tbody tr td {
        border: 1px solid #BABABA;
        border-collapse: collapse;
        padding: 5px;
    }

    #addTeamTable #teamBody #teamRow:first-child td:last-child span {
        display: none;
    }

    .registerFormBody {
        border: 5px solid #ffc107;
    }

    img.payment_qrcode {
        width: 100% !important;
        height: 240px !important;
        object-fit: cover;
    }
</style>

<!-- contact area -->
<div class="clearfix">
    <!-- Product -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card registerFormBody">
                        <?php
                        if (session()->getFlashdata('status')) {
                            echo session()->getFlashdata('status');
                        }
                        ?>
                        <?php
                        $sessionData = session()->get('loggedPlayerData');
                        if ($sessionData) {
                            $loggedplayerName = $sessionData['loggedplayerName'];
                            $loggedplayerId = $sessionData['loggedplayerId'];
                        }

                        if (!isset($sessionData)) {
                        ?>
                            <div class="card-body p-2 text-danger">
                                <h3>You must <span class="text-primary">log in</span> first to complete the registration form.</h3>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="card-header p-0"><img src="<?= base_url() ?>public/assets/images/background/registration.jpg" alt=""></div>
                        <!-- id="teamRegisterationForm" -->
                        <?php if ($sessionData) { ?>
                            <?php if (isset($tournaments)) { ?>

                                <?php
                                if ($tournaments['game_type'] == "Individual") {
                                    $registration_fee = $tournaments['registration_fee'];
                                    $discount_registration_fee = $tournaments['discount_registration_fee'];
                                    $tournament_price = $registration_fee;
                                    if (!empty($discount_registration_fee) && $discount_registration_fee < $registration_fee) {
                                        $tournament_price = $discount_registration_fee;
                                    }
                                } else if ($tournaments['game_type'] == "Team") {
                                    $registration_fee = $tournaments['team_entry_fee'];
                                    $discount_registration_fee = $tournaments['team_entry_fee_discount'];
                                    $tournament_price = $registration_fee;
                                    if (!empty($discount_registration_fee) && $discount_registration_fee < $registration_fee) {
                                        $tournament_price = $discount_registration_fee;
                                    }
                                }
                                ?>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <h3>Tournament Details</h3>
                                            <hr>
                                            <p class="m-0">League : <b><?= $league_session_model->get($tournaments['league_session_id'])['league_name'] ?? '' ?></b></p>
                                            <p class="m-0">Sports : <b><?= $sports_model->get($tournaments['sports_id'])['name'] ?? '' ?></b></p>
                                            <p class="m-0">Tournament : <b><?= $tournaments['league_for'] ?> <?= $sports_subcategory_model->get($tournaments['sport_subcategory'])['sub_category_name'] ?? '' ?></b></p>
                                            <p class="site-button button-sm radius-sm m-t5"><b>Registration fee : Rs. <?= $tournament_price ?></b></p>
                                            <?= $tournaments['description'] ?? '' ?>
                                            <h4>Winner Team Rank, Price & Trophy</h4>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <td>Rank</td>
                                                        <td>Price</td>
                                                        <td>Trophy</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1st</td>
                                                        <td>Rs. <?= $tournaments['first_rank_price'] ?></td>
                                                        <td><?= $tournaments['first_rank_trophy'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2nd</td>
                                                        <td>Rs. <?= $tournaments['second_rank_price'] ?></td>
                                                        <td><?= $tournaments['second_rank_trophy'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3rd</td>
                                                        <td>Rs. <?= $tournaments['third_rank_price'] ?></td>
                                                        <td><?= $tournaments['third_rank_trophy'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>