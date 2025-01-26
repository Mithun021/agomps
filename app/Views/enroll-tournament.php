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
                                                        <td>Name</td>
                                                        <td>Age</td>
                                                        <td>Jersey No.</td>
                                                        <td><span class="fa fa-plus btn btn-sm btn-primary" id="addNewTeam"></span></td>
                                                    </tr>
                                                </thead>
                                                <tbody id="teamBody">
                                                    <tr id="teamRow">
                                                        <td><input type="text" class="form-control" name="player_name[]" placeholder="Enter Player Name"></td>
                                                        <td><input type="number" name="player_age[]" class="form-control" placeholder="Player Age"></td>
                                                        <td><input type="number" name="player_jersey[]" class="form-control" placeholder="Player Jersey no."></td>
                                                        <td><span class="fa fa-minus btn btn-sm btn-danger" id="removeTeam"></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>Coach Name<span class="text-danger">*</span></span>
                                        <input type="text" name="coach_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
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

<?= $this->endSection() ?>