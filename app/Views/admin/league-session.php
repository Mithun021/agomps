<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('body-content') ?>
<?php

use App\Models\League_category_model;

$league_category_model = new League_category_model();
?>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Add League Category</h4>
            </div>
            <?php
            if (session()->getFlashdata('status')) {
                echo session()->getFlashdata('status');
            }
            ?>
            <form action="<?= base_url() ?>admin/league-session" method="post" enctype="multipart/form-data">
                <div class="card-body">
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

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">League Category List</h4>
            </div>
            <div class="card-body p-2">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>File</th>
                                <th>Name</th>
                                <th>Sports Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>