<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('body-content') ?>
<style>
    table tr td, tr th{
        padding: 5px;
        font-size: 120px;
    }
</style>
<div class="row g-0">
    <div class="col-lg-4 g-0">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Add <?= $title ?></h4>
            </div>
            <?php
            if (session()->getFlashdata('status')) {
                echo session()->getFlashdata('status');
            }
            ?>
            <form action="<?= base_url() ?>admin/sports-sub-category" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <span>Sports Category Name</span>
                        <select class="form-control" placeholder="Enter sports category name" name="sports_category_name" required>
                            <option value="">--Select--</option>
                        <?php foreach ($sports as $key => $value): ?>
                            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <span>Sports Sub Category Name</span>
                        <input type="text" class="form-control" placeholder="Enter sports category name" name="sports_category_name" required>
                    </div>
                    <div class="form-group">
                        <span>Status</span>
                        <select class="form-control" name="sports_category_status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Add Category</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-8 g-0">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0"><?= $title ?> List</h4>
            </div>
            <div class="card-body p-2">
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>File</td>
                            <td>Name</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>