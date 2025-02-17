<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('body-content') ?>
<?php
use App\Models\League_category_model;
use App\Models\League_session_model;
use App\Models\Sports_model;

$league_category_model = new League_category_model();
$sports_model = new Sports_model();
$league_session_model = new League_session_model();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Touranments List</h4>
            </div>
            <div class="card-body p-2">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>File</td>
                                <td>League</td>
                                <td>League Type</td>
                                <td>Sports</td>
                                <td>Registration Fee</td>
                                <td>Team Entry Fee</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tournament as $key => $value) { ?>
                                <tr>
                                    <td><?= ++$key ?></td>
                                    <td>
                                        <?php if (!empty($value['featured_image']) && file_exists('public/admin/uploads/tournament/' . $value['featured_image'])): ?>
                                            <a href="<?= base_url() ?>public/admin/uploads/tournament/<?= $value['featured_image'] ?>" target="_blank"><img src="<?= base_url() ?>public/admin/uploads/tournament/<?= $value['featured_image'] ?>" alt="" height="30px"></a>
                                        <?php else: ?>
                                            <img src="<?= base_url() ?>public/admin/uploads/tournament/invalid_image.png" alt="" height="40px">
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $league_session_model->get($value['league_session_id'])['league_name'] ?? '__' ?></td>
                                    <td></td>
                                    <td><?= $sports_model->get($value['sports_id'])['name'] ?? '__' ?></td>
                                    <td><?= $value['registration_fee'] ?>/<?= $value['discount_registration_fee'] ?> (Dis. Amt.)</td>
                                    <td><?= $value['team_entry_fee'] ?></td>
                                    <td><?= ($value['status'] == "0") ? "<span class='badge badge-danger badge-pill'>Inactive</span>" : (($value['status'] == "1") ? "<span class='badge badge-success badge-pill'>Active</span>" : "") ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>admin/edit-league-category" class="btn btn-sm btn-circle btn-danger"><span class="fa fa-times"></span></a>
                                        <a href="<?= base_url() ?>admin/edit-league-category" class="btn btn-sm btn-circle btn-primary"><span class="fa fa-pencil"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>