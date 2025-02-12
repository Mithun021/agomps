<?php

use App\Models\Sports_model;

$sports_model = new Sports_model();
$sports = $sports_model->getActiveData();
?>
<style>
    .enrollprice span {
        font-weight: 600;
    }
    img.sports_icon{
        height: 18px !important;
    }
</style>
<!-- Our Achievements -->
<div class="section-full bg-white content-inner our-achievements">
    <div class="container">
        <div class="section-head text-center ">
            <h2 class="h2 text-uppercase"> Well-Managed Sports Leagues</h2>
            <div class="dez-separator-outer ">
                <div class="dez-separator bg-primary style-liner"></div>
            </div>
            <p>Well-managed sports leagues ensure fair competition, seamless organization, and a professional environment, providing athletes with opportunities to thrive.</p>
        </div>
        <div class="section-content text-center ">
            <div class="row m-lr0">

                <div class="dez-tabs border bg-tabs">

                    <ul class="nav nav-tabs" id="myTabContent" role="tablist">
                        <?php
                        $isFirst = true; // Flag to set the first tab as active by default
                        foreach ($sports as $value) {
                        ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo $isFirst ? 'active' : ''; ?>"
                                    id="sportsCat<?= $value['id'] ?>"
                                    data-bs-toggle="tab"
                                    data-bs-target="#sports-<?= $value['id'] ?>"
                                    type="button" role="tab"
                                    aria-controls="sports-<?= $value['id'] ?>"
                                    aria-selected="<?= $isFirst ? 'true' : 'false' ?>">
                                    <!--<i class="fa fa-globe"></i>--><img src="<?= base_url() ?>public/admin/uploads/sports/<?= $value['sports_image'] ?>" alt="<?= $value['name'] ?> Icon" class="sports_icon">
                                    <span class="title-head"><?= $value['name'] ?></span>
                                </button>
                            </li>
                            <?php $isFirst = false; ?> <!-- Once the first tab is rendered, the flag is set to false -->
                        <?php } ?>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <?php
                        $isFirst = true; // Flag to set the first tab as active by default
                        foreach ($sports as $value) {
                        ?>

                            <div class="tab-pane fade <?php echo $isFirst ? 'show active' : ''; ?>" id="sports-<?= $value['id'] ?>" role="tabpanel" aria-labelledby="sportsCat<?= $value['id'] ?>" tabindex="0">
                                <p class="m-b0"><strong><em>Web design lorem ipsum dolor sit amet, consectetuer adipiscing elit.</em></strong><br>
                                    Suspendisse et justo.
                                    Praesent mattis commyolk augue Aliquam ornare hendrerit augue Cras tellus In pulvinar lectus a est Curabitur eget orci Cras laoreet.
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent mattis
                                    commyolk augue aliquam ornare augue.
                                </p>
                            </div>
                        <?php $isFirst = false;
                        } ?>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- Team member END -->