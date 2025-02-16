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
                        <div class="form-group col-lg-12">
                            <span>Title</span>
                            <input type="text" class="form-control" placeholder="Write heading title" name="title" required>
                        </div>
                        <div class="form-group col-md-6">
                            <span>Investment Type</span>
                            <select class="form-control" name="plan_type" id="plan_type" required>
                                <option value="">--Select--</option>
                                <?php foreach ($investment_plan as $key => $value) { ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['plan_type'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <span>Investment Duration</span>
                            <select class="form-control" name="duration"  id="duration" required>
                                <option value="">--Select--</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <span>Profit(%)</span>
                            <input type="text" class="form-control" id="profit" name="profit" readonly required>
                            <input type="hidden" class="form-control" id="invest_duration" name="invest_duration" readonly required>
                            <input type="hidden" class="form-control" id="durantion_type" name="durantion_type" readonly required>
                        </div>
                        <div class="form-group col-lg-4">
                            <span>Minimum Investment Amount</span>
                            <input type="number" class="form-control" id="min_amount" name="min_amount" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <span>Expected Return Amount</span>
                            <input type="text" class="form-control" id="expected_return" name="expected_return" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <span>Expected Profit</span>
                            <input type="text" class="form-control" id="expected_profit" name="expected_profit" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <span>Featured Image</span>
                            <input type="file" class="form-control" name="featured_image" required>
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

<script src="<?= base_url() ?>public/admin/js/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('#plan_type').on('change',function () { 
            $('#expected_return').val('');
            $('#expected_profit').val('');
            $('#min_amount').val('');
            var plan_type = $(this).val();
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>getDuration",
                data: {plan_type : plan_type},
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if (response.length > 0) {
                        $('#duration').empty();
                        $('#duration').html('<option>--Select--</option>');
                        $.each(response, function(index, duration) {
                            $('#duration').append('<option value="' + duration.id + '">' + duration.duration + " - " +  duration.notes + '</option>');
                        });
                    }else{
                        $('#duration').empty();
                        $('#duration').html('<option>--Duration not found--</option>');
                    }
                }
            });
         });

        //  Find Profit Percentage -------------------
        $('#duration').on('change',function () { 
            var duration_id = $(this).val();
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>getprofit",
                data: {duration_id : duration_id},
                dataType: "json",
                success: function (response) {
                    // console.log(response.profit);
                    if (response) {
                        $('#invest_duration').val(response.duration)
                        $('#durantion_type').val(response.notes)
                        profit_per = response.profit
                        if(profit_per && profit_per !== ""){
                            $('#profit').val(response.profit);
                        }else{
                            $('#profit').val('Fixed');
                            $('#expected_return').val('');
                            $('#expected_profit').val('');
                            $('#min_amount').val('');
                        }
                        calculateProfit();
                    } else {
                        $('#profit').val('');
                    }
                }
            });
         });



         function calculateProfit() {
            var minAmount = parseFloat($('#min_amount').val()) || 0;
            var profit = $('#profit').val();
            var invest_duration = $('#invest_duration').val();
            var expectedReturn = 0;
            var expectedProfit = 0;

            if (profit === "Fixed") {
                expectedReturn = parseFloat($('#expected_return').val()) || 0;
                expectedProfit = expectedReturn - minAmount;
            } else if (!isNaN(profit) && profit !== "") {
                profit = parseFloat(profit);
                expectedReturn = minAmount + (minAmount * (profit / 100));
                expectedProfit = expectedReturn - minAmount;
            }

            $('#expected_return').val(expectedReturn.toFixed(2) * invest_duration.toFixed(2));
            $('#expected_profit').val(expectedProfit.toFixed(2) * invest_duration.toFixed(2));
        }

        // Trigger calculation on input change
        $('#min_amount, #expected_return').on('input', function () {
            calculateProfit();
        });




    });

    
</script>

<?= $this->endSection() ?>