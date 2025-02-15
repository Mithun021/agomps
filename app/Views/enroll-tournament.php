<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>
<?php
use App\Models\Enroll_tournament_model;
use App\Models\League_category_model;
use App\Models\League_session_model;
use App\Models\Sports_model;
$sports_model = new Sports_model();
$league_category_model = new League_category_model();
$league_session_model = new League_session_model();
$enroll_tournament_model = new Enroll_tournament_model();
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
    img.payment_qrcode{
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
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <h3>Tournament Details</h3>
                                            <hr>
                                            <p class="m-0">League : <b><?= $league_session_model->get($tournaments['league_session_id'])['league_name'] ?? '' ?></b></p>
                                            <p class="m-0">Sports : <b><?= $sports_model->get($tournaments['sports_id'])['sports'] ?? '' ?></b></p>
                                            <p class="m-0">League Category : <b></b></p>
                                            <p class="site-button button-sm radius-sm m-t5"><b>Registration fee : Rs. <?= $tournaments['registration_fee'] ?></b></p>
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