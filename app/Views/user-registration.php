<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>
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

<?= $this->endSection() ?>