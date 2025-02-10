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
            <form action="<?= base_url() ?>admin/game-category" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <span>Game Category Name</span>
                        <input type="text" class="form-control" placeholder="Enter game category name" name="game_category_name" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Add Game Category</button>
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
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($game_category as $key => $value): ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?= $value['game_category'] ?></td>
                                <td>
                                <a href="<?= base_url() ?>admin/edit-game-category" class="btn btn-sm btn-circle btn-danger"><span class="fa fa-times"></span></a>
                                    <a href="<?= base_url() ?>admin/edit-game-category" class="btn btn-sm btn-circle btn-primary"><span class="fa fa-pencil"></span></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>