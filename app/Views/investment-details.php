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
                    <div class="investment-details">
                        <?php if (!empty($investment['featured_image']) && file_exists('public/admin/uploads/investment/' . $investment['featured_image'])): ?>
                            <img src="<?= base_url() ?>public/admin/uploads/investment/<?= $investment['featured_image'] ?>" alt="" class="card-img-top">
                        <?php else: ?>
                            <img src="<?= base_url() ?>public/admin/uploads/invalid_image.jpg" alt="" class="card-img-top">
                        <?php endif; ?>
                        <p class="card-text m-0 fw-bold"><i class="fa fa-bullhorn"></i> Invest : <i class="fa fa-inr"></i><?= $investment['min_amount'] ?></p>
                        <p class="card-text m-0 fw-bold"><i class="fa fa-money"></i> Profit : <i class="fa fa-inr"></i><?= $investment['expected_return'] ?> (<?php if (is_numeric($investment['profit'])) { echo $investment['profit']."%"; }else{ echo $investment['profit']; } ?>)</p>  
                        <p class="card-text m-0 fw-bold"><i class="fa fa-clock-o"></i> Duration : <?= $investment['invest_duration'] ?> <?= $investment['durantion_type'] ?></p>
                        <hr>
                        <h4>Description</h4>
                        <?= $investment['description'] ?>

                        <form action="<?= base_url() ?>investment-details/<?= $investment_id ?>" method="post">
                            <input type="text" name="investment_amount" value="<?= $investment['min_amount'] ?>" readonly>
                            <button type="button" class="btn btn-primary">Apply Now</button>
                        </form>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="advertisment">
                        <img src="<?= base_url() ?>public/admin/uploads/advertisment/advertisment.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>