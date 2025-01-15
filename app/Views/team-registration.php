<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>
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
<?= view('layouts/breadcumbs') ?>
<div class="section-full content-inner contact-style-1">
    <div class="container">
        <?php
        if (session()->getFlashdata('status')) {
            echo session()->getFlashdata('status');
        }
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card registerFormBody">
                    <div class="card-header p-0"><img src="<?= base_url() ?>public/assets/images/background/registration.jpg" alt=""></div>
                    <!-- id="teamRegisterationForm" -->

                    <form id="teamRegisterationForm" method="post" action="<?= base_url() ?>team-registration" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>First Name<span class="text-danger">*</span></span>
                                        <input type="text" name="first_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>Middle Name</span>
                                        <input type="text" name="middle_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>Last Name<span class="text-danger">*</span></span>
                                        <input type="text" name="last_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>Mobile Number<span class="text-danger">*</span></span>
                                        <input type="text" name="mobile_number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>WhatsApp Number<span class="text-danger">*</span></span>
                                        <input type="text" name="whatsapp_number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>Email Address<span class="text-danger">*</span></span>
                                        <input type="text" name="email_address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>Age<span class="text-danger">*</span></span>
                                        <input type="text" name="age" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>Gender<span class="text-danger">*</span></span>
                                        <select name="gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>Aadhar Number<span class="text-danger">*</span></span>
                                        <input type="text" name="aadhar" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>State<span class="text-danger">*</span></span>
                                        <select name="state" class="form-control">
                                            <option value="Bihar">Bihar</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>City<span class="text-danger">*</span></span>
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>Pincode<span class="text-danger">*</span></span>
                                        <input type="number" name="pincode" class="form-control" maxlength="6">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <span>Full Address<span class="text-danger">*</span></span>
                                        <textarea name="full_address" class="form-control"></textarea>
                                    </div>
                                </div>

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
                                        <input type="number" name="coach_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>Coach Mobile Number<span class="text-danger">*</span></span>
                                        <input type="tel" name="coach_number" class="form-control" maxlength="10">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>Upload Jersey(Optional)</span>
                                        <input type="file" name="upload_jersey" class="form-control">
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

<!-- Load jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Load jQuery Validation Plugin -->
<script src="https://cdn.rawgit.com/jzaefferer/jquery-validation/1.19.3/dist/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        var cloneLimit = 12;
        var currentClones = 0;
        // Add a new team row
        $("#addNewTeam").click(function(e) {
            e.preventDefault();
            if (currentClones < cloneLimit) {
                currentClones++;
                var cloneCatrow = $('#teamRow').clone().appendTo('#teamBody');
                $(cloneCatrow).find('input,textarea').val('');
            }
        });

        $('#teamBody').on('click', '#removeTeam', function() {
            $(this).closest('tr').remove();
        });

        // Initialize form validation
        $("#teamRegisterationForm").validate({
            rules: {
                first_name: {
                    required: true,
                    minlength: 2
                },
                last_name: {
                    required: true,
                    minlength: 2
                },
                mobile_number: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                whatsapp_number: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                email_address: {
                    required: true,
                    email: true
                },
                age: {
                    required: true,
                    digits: true,
                    min: 18
                },
                gender: {
                    required: true
                },
                aadhar: {
                    required: true,
                    digits: true,
                    minlength: 12,
                    maxlength: 12
                },
                state: {
                    required: true
                },
                city: {
                    required: true
                },
                pincode: {
                    required: true,
                    digits: true,
                    minlength: 6,
                    maxlength: 6
                },
                full_address: {
                    required: true
                },
                coach_name: {
                    required: true
                },
                coach_number: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                }
            },
            submitHandler: function(form) {
                // Only if the form is valid, it will submit to PHP
                form.submit();
            }
        });


    });
</script>



<?= $this->endSection() ?>