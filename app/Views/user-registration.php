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

    .registerFormBody {
        border: 5px solid #ffc107;
    }
</style>

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
                    <div class="card-header p-0"><img src="<?= base_url() ?>public/assets/images/background/user_registration.jpg" alt=""></div>
                    <!-- id="teamRegisterationForm" -->
                    <form id="userRegisterationForm" method="post" action="<?= base_url() ?>user-registration" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>First Name<span class="text-danger">*</span></span>
                                        <input type="text" name="first_name" class="form-control">
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>Middle Name</span>
                                        <input type="text" name="middle_name" class="form-control">
                                    </div>
                                </div> -->
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>Last Name</span>
                                        <input type="text" name="last_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>WhatsApp Number<span class="text-danger">*</span></span>
                                        <input type="text" name="mobile_number" class="form-control" maxlength="10">
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>WhatsApp Number<span class="text-danger">*</span></span>
                                        <input type="text" name="whatsapp_number" class="form-control" maxlength="10">
                                    </div>
                                </div> -->
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>Email Address<span class="text-danger">*</span></span>
                                        <input type="text" name="email_address" class="form-control">
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>Age<span class="text-danger">*</span></span>
                                        <input type="text" name="age" class="form-control">
                                    </div>
                                </div> -->
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
                                        <input type="text" name="aadhar" class="form-control" maxlength="12">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>State<span class="text-danger">*</span></span>
                                        <select name="state" id="state" class="form-control">
                                            <option value="">--Select--</option>
                                            <?php foreach ($state as $key => $value) { ?>
                                                <option value="<?= $value['state'] ?>"><?= ucwords($value['state']) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <span>City<span class="text-danger">*</span></span>
                                        <select name="city" id="city" class="form-control">
                                            <option value="">--Select--</option>
                                        </select>
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
                                        <span>Full Address</span>
                                        <textarea name="full_address" class="form-control"></textarea>
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

        $('#state').on('change', function() { // Corrected 'chnage' to 'change'
            var state = $(this).val();
            alert(state);
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>findcity",
                data: {
                    state: state
                },
                dataType: "json",
                success: function(response) { // Use 'response' instead of 'data'
                    console.log(response);
                    $('#city').html('<option value="">Select City</option>');

                    // If cities are found, populate them in the city dropdown
                    if (response.length > 0) { // Changed 'data' to 'response'
                        $.each(response, function(index, city) {
                            $('#city').append('<option value="' + city.city + '">' + city.city + '</option>');
                        });
                    } else {
                        $('#city').html('<option value="">No cities available</option>');
                    }
                }
            });
        });

        // Initialize form validation
        $("#userRegisterationForm").validate({
            rules: {
                first_name: {
                    required: true,
                    minlength: 2
                },
                // last_name: {
                //     required: true,
                //     minlength: 2
                // },
                mobile_number: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                // whatsapp_number: {
                //     required: true,
                //     digits: true,
                //     minlength: 10,
                //     maxlength: 10
                // },
                email_address: {
                    required: true,
                    email: true
                },
                // age: {
                //     required: true,
                //     digits: true,
                //     min: 18
                // },
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
                // full_address: {
                //     required: true
                // }
            },
            submitHandler: function(form) {
                // Only if the form is valid, it will submit to PHP
                form.submit();
            }
        });


    });
</script>

<?= $this->endSection() ?>