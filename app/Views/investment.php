<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>

<!-- Our Achievements -->
<div class="section-full bg-white content-inner our-achievements">
    <div class="container">
        <div class="section-content ">
            <div class="row col-set-block white-block m-lr0">
                <?php foreach ($investment_plan as $key => $plan) { ?>
                    <div class="col-lg-12">
                        <div class="dez-head-bx m-a-out m-b20 skew-triangle right-top">
                            <h3 class="m-a0"><?= $plan['plan_type'] ?></h3>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>