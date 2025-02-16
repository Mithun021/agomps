<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>
<?php

use App\Models\Investment_model;

$investment_model = new Investment_model();
?>
<!-- Our Achievements -->
<div class="section-full bg-white content-inner our-achievements">
    <div class="container">
        <div class="section-content ">
            <div class="row col-set-block white-block m-lr0">
                <?php foreach ($investment_plan as $key => $plan) { ?>
                <?php $investment = $investment_model->get_by_plan($plan['id']); ?>
                    <div class="col-lg-12">
                        <div class="dez-head-bx m-a-out m-b20 skew-triangle right-top">
                            <h3 class="m-a0"><?= $plan['plan_type'] ?></h3>
                        </div>
                        <div class="row">
                        <?php foreach ($investment as $key => $value) { ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="card p-0">
                                    <?php if (!empty($value['featured_image']) && file_exists('public/admin/uploads/investment/' . $value['featured_image'])): ?>
                                        <img src="<?= base_url() ?>public/admin/uploads/investment/<?= $value['featured_image'] ?>" alt="" class="card-img-top">
                                    <?php else: ?>
                                        <img src="<?= base_url() ?>public/admin/uploads/invalid_image.jpg" alt="" class="card-img-top">
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>