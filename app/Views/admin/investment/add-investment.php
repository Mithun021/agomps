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
                            <input type="number" class="form-control" id="profit" name="profit" readonly required>
                        </div>
                        <div class="form-group col-lg-4">
                            <span>Minimum Investment Amount</span>
                            <input type="number" class="form-control" id="min_amount" name="min_amount" oninput="calculateProfit()" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <span>Expected Return Amount</span>
                            <input type="text" class="form-control" id="expected_return" name="expected_return" oninput="calculateProfit()" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <span>Expected Profit</span>
                            <input type="text" class="form-control" id="profit" name="profit" required>
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
                    console.log(response); return false;
                    if (response.length > 0) {
                        $('#profit').empty();
                        $('#profit').val(response.profit);
                    }else{
                        $('#profit').empty();
                    }
                }
            });
         })

    });
    
</script>

<?= $this->endSection() ?>