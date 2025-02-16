<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('body-content') ?>
<?php
use App\Models\Investment_plan_model;
$investment_plan_model = new Investment_plan_model();
?>
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
            <form action="<?= base_url() ?>admin/investment-duration" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <span>Investment Type</span>
                        <select class="form-control" name="plan_type" required>
                            <option value="">--Select--</option>
                        <?php foreach ($investment_plan as $key => $value) { ?>
                            <option value="<?= $value['id'] ?>"><?= $value['plan_type'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <span>Duration</span>
                        <input type="number" class="form-control" placeholder="1,2,3,4,5,6........" name="duration" min="1" step="1" required>
                    </div>
                    <div class="form-group">
                        <span>Profit(%)</span>
                        <input type="number" class="form-control" placeholder="Profit percent %" name="profit" min="1" step="1">
                    </div>
                    <div class="form-group">
                        <span>Notes</span>
                        <input type="text" class="form-control" placeholder="year/month/days" name="notes" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
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
                            <td>Investment Type</td>
                            <td>Duration</td>
                            <td>Profit</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($investment_duration as $key => $value) { ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $investment_plan_model->get($value['investment_type_id'])['plan_type'] ?? '' ?></td>
                            <td><?= $value['duration'] ?> <?= $value['notes'] ?></td>
                            <td><?php if(!empty($value['profit'])){ echo $value['profit']."%"; }else{ echo "Fixed Deposit"; } ?></td>
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