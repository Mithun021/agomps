<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>
<?php
$sessionData = session()->get('loggedPlayerData');
if ($sessionData) {
    $loggedplayerId = $sessionData['loggedplayerId'];
}
use App\Models\Enroll_tournament_model;
use App\Models\League_category_model;
use App\Models\League_session_model;
use App\Models\Sports_model;

$sports_model = new Sports_model();
$league_category_model = new League_category_model();
$league_session_model = new League_session_model();
$enroll_tournament_model = new Enroll_tournament_model();
$active_league = $league_session_model->currectSession();
$sports = $sports_model->get($sports_id);
$league = $league_category_model->get($league_id);
$find_tournament_id = $enroll_tournament_model->find_tournament_id($loggedplayerId,$sports_id,$league_id,$active_league['id']);

if ($tournaments) {
    if ($league['name'] == "Individual Games") {
        $registration_fee = $tournaments['registration_fee'];
        $discount_registration_fee = $tournaments['discount_registration_fee'];
        $tournament_price = $registration_fee;
        if (!empty($discount_registration_fee) && $discount_registration_fee < $registration_fee) {
            $tournament_price = $discount_registration_fee;
        }
    } else {
        $tournament_price = $tournaments['team_entry_fee'] ?? '';
    }
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
                                            <p class="m-0">League : <b><?= $active_league['league_name'] ?></b></p>
                                            <p class="m-0">Sports : <b><?= $sports['name'] ?></b></p>
                                            <p class="m-0">League Category : <b><?= $league['name'] . "(" . $league['league_for'] . ")" ?></b></p>
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


                                <form id="teamRegisterationForm" method="post" action="<?= base_url() ?>enroll-tournament/<?= $sports_id ?>/<?= $league_id ?>" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <input type="hidden" class="form-controller" name="player_id" value="<?= $loggedplayerId ?>">
                                                <input type="hidden" class="form-controller" name="leaguename" value="<?= $active_league['id'] ?>">
                                                <hr>
                                                <div class="form-group">
                                                    <h3>Team Details<span class="text-danger">*</span></h3>
                                                    <table id="addTeamTable">
                                                        <thead>
                                                            <tr>
                                                                <td>Sn no.</td>
                                                                <td>Name</td>
                                                                <td>Age</td>
                                                                <td>Mobile No.</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="teamBody">
                                                            <?php if (!$enroll_tournament) { ?>
                                                                <?php if ($league['name'] == "Individual Games") { ?>
                                                                    <tr id="teamRow">
                                                                        <td>1</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." required pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                <?php } else { ?>
                                                                    <tr id="teamRow">
                                                                        <td>1</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." required pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                    <tr id="teamRow">
                                                                        <td>2</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." required pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                    <tr id="teamRow">
                                                                        <td>3</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." required pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                    <tr id="teamRow">
                                                                        <td>4</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." required pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                    <tr id="teamRow">
                                                                        <td>5</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." required pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                    <tr id="teamRow">
                                                                        <td>6</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." required pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                    <tr id="teamRow">
                                                                        <td>7</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." required pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                    <tr id="teamRow">
                                                                        <td>8</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." required pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                    <tr id="teamRow">
                                                                        <td>9</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." required pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                    <tr id="teamRow">
                                                                        <td>10</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." required pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                    <tr id="teamRow">
                                                                        <td>11</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." required pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                    <tr id="teamRow">
                                                                        <td>12</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name"></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age"></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                    <tr id="teamRow">
                                                                        <td>13</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name"></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age"></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                    <tr id="teamRow">
                                                                        <td>14</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name"></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age"></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                    <tr id="teamRow">
                                                                        <td>15</td>
                                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name"></td>
                                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age"></td>
                                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no." pattern="^[6-9][0-9]{9}$"></td>
                                                                    </tr>
                                                                    <?php }
                                                            } else {
                                                                if ($enroll_tournament_players) {
                                                                    foreach ($enroll_tournament_players as $key => $players_list) { ?>
                                                                        <tr id="teamRow">
                                                                            <td><?= ++$key ?></td>
                                                                            <td><?= $players_list['enroll_player_name'] ?></td>
                                                                            <td><?= $players_list['enroll_player_age'] ?></td>
                                                                            <td><?= $players_list['enroll_player_mobile_number'] ?></td>
                                                                        </tr>
                                                            <?php }
                                                                }
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <?php if (!$enroll_tournament_players) { ?>
                                                <div class="col-lg-12 col-md-12">
                                                    <button type="submit" class="btn site-button">Submit</button>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </form>
                                <?php if ($enroll_tournament_players) { if(empty($find_tournament_id['payment_status'])){ ?>
                                    <form action="<?= base_url() ?>enroll_tournament_payment/<?= $sports_id ?>/<?= $league_id ?>" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <img src="<?= base_url() ?>public/assets/images/background/payment_qr.jpg" alt="" class="payment_qrcode">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="team_name">Attached Payment Screenshot after pay</label>
                                                        <input type="hidden" name="tournament_id" value="<?= $find_tournament_id['id']; ?>" class="form-control">
                                                        <input type="file" class="form-control" name="payment_screenshot" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <span>Registration Payment<span class="text-danger">*</span></span>
                                                        <input type="tel" name="tournament_payment" class="form-control" value="<?= $tournament_price ?>" required readonly>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12">
                                                    <button type="submit" class="btn site-button">Pay</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php } else{ ?>
                                    <div class="card-body"><button type="button" class="btn site-button">Tournament Already Enrolled</button></div>
                                <?php } } ?>

                            <?php } else { ?>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <h3>No Tournaments Available</h3>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    <?php if ($league['name'] == "Team Games") { ?>
        document.getElementById('teamRegisterationForm').addEventListener('submit', function(event) {
            let isValid = true;

            // Check if there are between 11 and 15 player names
            const playerNames = document.querySelectorAll('input[name="player_name[]"]');
            const playerCount = playerNames.length;
            if (playerCount < 11 || playerCount > 15) {
                alert("Please ensure that you have entered between 11 and 15 players.");
                isValid = false;
            }

            // Check if all mobile numbers are valid (starting with 6-9 and being 10 digits long)
            // const mobileNumbers = document.querySelectorAll('input[name="player_mobileno[]"]');
            // mobileNumbers.forEach(function(input) {
            //     const mobileValue = input.value;
            //     const regex = /^[6-9][0-9]{9}$/; // Mobile number should start with 6-9 and be 10 digits long
            //     if (!regex.test(mobileValue)) {
            //         alert("Invalid mobile number: " + mobileValue);
            //         isValid = false;
            //     }
            // });

            // If not valid, prevent form submission
            if (!isValid) {
                event.preventDefault();
            }
        });
    <?php } ?>
</script>

<?= $this->endSection() ?>