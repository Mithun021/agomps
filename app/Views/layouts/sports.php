<?php

use App\Models\Sports_model;

$sports_model = new Sports_model();
$sports = $sports_model->getActiveData();
?>
<style>
    .enrollprice span {
        font-weight: 600;
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
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="web-design4" data-bs-toggle="tab" data-bs-target="#web-design-4" type="button" role="tab" aria-controls="web-design-4" aria-selected="true"><i class="fa fa-globe"></i> <span class="title-head">Web design</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="graphic-design4" data-bs-toggle="tab" data-bs-target="#graphic-design-4" type="button" role="tab" aria-controls="graphic-design-4" aria-selected="false"><i class="fa fa-photo"></i> <span class="title-head">Graphic Design</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="developement4" data-bs-toggle="tab" data-bs-target="#developement-4" type="button" role="tab" aria-controls="developement-4" aria-selected="false"><i class="fa fa-cog"></i> <span class="title-head">developement</span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="web-design-4" role="tabpanel" aria-labelledby="web-design4" tabindex="0">
                            <p class="m-b0"><strong><em>Web design lorem ipsum dolor sit amet, consectetuer adipiscing elit.</em></strong><br>
                                Suspendisse et justo.
                                Praesent mattis commyolk augue Aliquam ornare hendrerit augue Cras tellus In pulvinar lectus a est Curabitur eget orci Cras laoreet.
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent mattis
                                commyolk augue aliquam ornare augue.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="graphic-design-4" role="tabpanel" aria-labelledby="graphic-design4" tabindex="0">
                            <p class="m-b0"><strong><em>Graphic Design lorem ipsum dolor sit amet, consectetuer adipiscing elit.</em></strong><br>
                                Praesent Suspendisse
                                et justo. mattis commyolk augue Aliquam ornare hendrerit augue Cras tellus In pulvinar lectus a est Curabitur eget orci Cras laoreet.
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent mattis
                                commyolk augue aliquam ornare augue.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="developement-4" role="tabpanel" aria-labelledby="developement4" tabindex="0">
                            <p class="m-b0"><strong><em>Developement lorem ipsum dolor sit amet, consectetuer adipiscing elit.</em></strong><br>
                                Commyolk Suspendisse
                                et justo. Praesent mattis augue Aliquam ornare hendrerit augue Cras tellus In pulvinar lectus a est Curabitur eget orci Cras laoreet.
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent mattis
                                commyolk augue aliquam ornare augue.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team member END -->