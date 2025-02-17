<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>
<?= view('layouts/breadcumbs') ?>

<!-- Our Achievements -->
<div class="section-full bg-white content-inner our-achievements">
    <div class="container">
        <div class="section-content ">
            <div class="row col-set-block white-block m-lr0">
                    <div class="col-lg-8">
                        <div class="dez-head-bx m-a-out m-b20 skew-triangle right-top">
                            <h3 class="m-a0"><?= $investment['title'] ?> - <i class="fa fa-inr"></i> <?= $investment['min_amount'] ?> Investment</h3>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>