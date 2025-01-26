<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>
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
</style>
<!-- contact area -->
<div class="clearfix">
    <!-- Product -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card registerFormBody">
                        <div class="card-header p-0"><img src="<?= base_url() ?>public/assets/images/background/registration.jpg" alt=""></div>
                        <!-- id="teamRegisterationForm" -->

                        <form id="teamRegisterationForm" method="post" action="<?= base_url() ?>team-registration" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
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
                                                    <tr id="teamRow">
                                                        <td>1</td>
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no."  required pattern="^[6-9][0-9]{9}$"></td>
                                                    </tr>
                                                    <tr id="teamRow">
                                                        <td>2</td>
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no."  required pattern="^[6-9][0-9]{9}$"></td>
                                                    </tr>
                                                    <tr id="teamRow">
                                                        <td>3</td>
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no."  required pattern="^[6-9][0-9]{9}$"></td>
                                                    </tr>
                                                    <tr id="teamRow">
                                                        <td>4</td>
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no."  required pattern="^[6-9][0-9]{9}$"></td>
                                                    </tr>
                                                    <tr id="teamRow">
                                                        <td>5</td>
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no."  required pattern="^[6-9][0-9]{9}$"></td>
                                                    </tr>
                                                    <tr id="teamRow">
                                                        <td>6</td>
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no."  required pattern="^[6-9][0-9]{9}$"></td>
                                                    </tr>
                                                    <tr id="teamRow">
                                                        <td>7</td>
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no."  required pattern="^[6-9][0-9]{9}$"></td>
                                                    </tr>
                                                    <tr id="teamRow">
                                                        <td>8</td>
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no."  required pattern="^[6-9][0-9]{9}$"></td>
                                                    </tr>
                                                    <tr id="teamRow">
                                                        <td>9</td>
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no."  required pattern="^[6-9][0-9]{9}$"></td>
                                                    </tr>
                                                    <tr id="teamRow">
                                                        <td>10</td>
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no."  required pattern="^[6-9][0-9]{9}$"></td>
                                                    </tr>
                                                    <tr id="teamRow">
                                                        <td>11</td>
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" required></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" required></td>
                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no."  required pattern="^[6-9][0-9]{9}$"></td>
                                                    </tr>
                                                    <tr id="teamRow">
                                                        <td>12</td>
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name" ></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age" ></td>
                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no."  pattern="^[6-9][0-9]{9}$"></td>
                                                    </tr>
                                                    <tr id="teamRow">
                                                        <td>13</td>
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name"></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age"></td>
                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no."  pattern="^[6-9][0-9]{9}$"></td>
                                                    </tr>
                                                    <tr id="teamRow">
                                                        <td>14</td>
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name"></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age"></td>
                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no."  pattern="^[6-9][0-9]{9}$"></td>
                                                    </tr>
                                                    <tr id="teamRow">
                                                        <td>15</td>
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name"></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age"></td>
                                                        <td><input type="number" name="player_mobileno[]" class="form-control" placeholder="Player Mobile no."  pattern="^[6-9][0-9]{9}$"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <span>Coach Name<span class="text-danger">*</span></span>
                                            <input type="text" name="coach_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <span>Coach Mobile Number<span class="text-danger">*</span></span>
                                            <input type="tel" name="coach_number" class="form-control" maxlength="10">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <button type="submit" class="btn site-button">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('teamRegisterationForm').addEventListener('submit', function(event) {
        let isValid = true;

        // Check if there are exactly 11 player names
        const playerNames = document.querySelectorAll('input[name="player_name[]"]');
        if (playerNames.length !== 11) {
            alert("Please ensure that you have entered exactly 11 players.");
            isValid = false;
        }

        // Check if all mobile numbers are valid (starting with 6-9 and being 10 digits long)
        const mobileNumbers = document.querySelectorAll('input[name="player_mobileno[]"]');
        mobileNumbers.forEach(function(input) {
            const mobileValue = input.value;
            const regex = /^[6-9][0-9]{9}$/; // Mobile number should start with 6-9 and be 10 digits long
            if (!regex.test(mobileValue)) {
                alert("Invalid mobile number: " + mobileValue);
                isValid = false;
            }
        });

        // If not valid, prevent form submission
        if (!isValid) {
            event.preventDefault();
        }
    });
</script>

<?= $this->endSection() ?>