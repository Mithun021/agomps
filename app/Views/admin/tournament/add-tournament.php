<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('body-content') ?>
<?php

use App\Models\League_category_model;

$league_category_model = new League_category_model();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Add League Category</h4>
            </div>
            <?php
            if (session()->getFlashdata('status')) {
                echo session()->getFlashdata('status');
            }
            ?>
            <form action="<?= base_url() ?>admin/add-tournament" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <span>League Session Name</span>
                                <select class="form-control" name="league_category_name" required>
                                    <option value="">Select League Name</option>
                                    <?php
                                    foreach ($league_session as $session) {
                                        echo '<option value="' . $session['id'] . '">' . $session['league_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <span>Sports Category</span>
                                <select class="form-control" name="sports_category_name" required>
                                    <option value="">Select Category</option>
                                    <?php
                                    foreach ($sports as $sports) {
                                        echo '<option value="' . $sports['id'] . '">' . $sports['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <span>League Session Name</span>
                                <select class="form-control" name="league_category_name" required>
                                    <option value="">Select League Name</option>
                                    <?php
                                    foreach ($league_session as $session) {
                                        echo '<option value="' . $session['id'] . '">' . $session['league_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <span>League Session Name</span>
                        <input type="text" class="form-control" placeholder="Enter league session name" name="league_session_name" required>
                    </div>
                    <div class="form-group">
                        <span>League Session Notes</span>
                        <input type="text" class="form-control" placeholder="Enter league session notes" name="league_session_notes" required>
                    </div>
                    <div class="form-group">
                        <span>Status</span>
                        <select class="form-control" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Add League Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>