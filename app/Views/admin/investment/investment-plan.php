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
            <form action="<?= base_url() ?>admin/investment-plan" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <span>Plan Type</span>
                        <input type="text" class="form-control" placeholder="Monthly,Yearly,Daily" name="plan_type" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Add Sports Category</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-8 g-0">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Sports Category List</h4>
            </div>
            <div class="card-body p-2">
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($investment_plan as $key => $value) { ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $value['plan_type'] ?></td>
                            <td>
                                <a href="<?= base_url() ?>admin/edit-investment-plan" class="btn btn-sm btn-circle btn-danger"><span class="fa fa-times"></span></a>
                                <a href="<?= base_url() ?>admin/delete-investment-plan" class="btn btn-sm btn-circle btn-primary"><span class="fa fa-pencil"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>