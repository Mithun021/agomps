<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('body-content') ?>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header"><h4 class="card-title m-0">Add Sports Category</h4></div>
            <form action="">
                <div class="card-body">
                    <div class="form-group">
                        <span>Sports Category Name</span>
                        <input type="text" class="form-control" placeholder="Enter sports category name" name="sports_category_name" required>
                    </div>
                    <div class="form-group">
                        <span>Sports Category Description</span>
                        <textarea class="form-control" placeholder="Enter sports category description" name="sports_category_description"></textarea>
                    </div>
                    <div class="form-group">
                        <span>Upload Image(JPG,PNG)</span>
                        <input type="file" class="form-control" name="sports_category_image" accept=".png,.jpg" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Add Sports Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>