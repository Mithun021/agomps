<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('body-content') ?>
<div class="row g-0">
    <div class="col-lg-12 g-0">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Add <?= $title ?></h4>
            </div>
            <?php
            if (session()->getFlashdata('status')) {
                echo session()->getFlashdata('status');
            }
            ?>
            <form action="<?= base_url() ?>admin/add-investment" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <span>Investment Type</span>
                            <select class="form-control" name="plan_type" required>
                                <option value="">--Select--</option>
                                <?php foreach ($investment_plan as $key => $value) { ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['plan_type'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>