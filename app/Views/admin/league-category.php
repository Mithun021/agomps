<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('body-content') ?>
<?php
use App\Models\Sports_model;

$sports_model = new Sports_model();
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
            <form action="<?= base_url() ?>admin/league-category" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <span>League Category Name</span>
                        <input type="text" class="form-control" placeholder="Enter league category name" name="league_category_name" required>
                    </div>
                    <div class="form-group">
                        <span>Feague for</span>
                        <select class="form-control" name="league_for" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <span>Upload Image(JPG,PNG)</span>
                        <input type="file" class="form-control" name="league_category_image" accept=".png,.jpg" required>
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
                                <th>League for</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($league_category as $key => $value): ?>
                                <tr>
                                    <td><?= ++$key ?></td>
                                    <td>
                                        <?php if (!empty($value['featured_image']) && file_exists('public/admin/uploads/league/' . $value['featured_image'])): ?>
                                            <a href="<?= base_url() ?>public/admin/uploads/league/<?= $value['featured_image'] ?>" target="_blank"><img src="<?= base_url() ?>public/admin/uploads/league/<?= $value['featured_image'] ?>" alt="" height="30px"></a>
                                        <?php else: ?>
                                            <img src="<?= base_url() ?>public/admin/uploads/league/invalid_image.png" alt="" height="40px">
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= $value['league_for'] ?></td>
                                    <td><?= ($value['status'] == "0") ? "<span class='badge badge-danger badge-pill'>Inactive</span>" : (($value['status'] == "1") ? "<span class='badge badge-success badge-pill'>Active</span>" : "") ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>admin/edit-league-category" class="btn btn-sm btn-circle btn-danger"><span class="fa fa-times"></span></a>
                                        <a href="<?= base_url() ?>admin/edit-league-category" class="btn btn-sm btn-circle btn-primary"><span class="fa fa-pencil"></span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>