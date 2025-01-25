<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('body-content') ?>
<div class="card">
    <div class="row">
        <div class="col-lg-4">
            <form action="">
                <div class="form-group">
                    <span>Sports Name</span>
                    <input type="text" class="form-control" placeholder="Enter sports name" name="sports_name">
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>