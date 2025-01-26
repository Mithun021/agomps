<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('body-content') ?>
<?php

use App\Models\League_category_model;

$league_category_model = new League_category_model();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Add League Category</h4>
            </div>
            <?php
            if (session()->getFlashdata('status')) {
                echo session()->getFlashdata('status');
            }
            ?>
            <form action="<?= base_url() ?>admin/add-tournament" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <span>League Session Name</span>
                                <select class="form-control" name="league_category_name" required>
                                    <option value="">Select League Name</option>
                                    <?php
                                    foreach ($league_session as $session) {
                                        echo '<option value="' . $session['id'] . '">' . $session['league_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <span>League Category</span>
                                <select class="form-control" name="league_category" id="league_category" required>
                                    <option value="">Select League Category</option>
                                    <?php
                                    foreach ($league_category as $league) {
                                        echo '<option value="' . $league['id'] . '">' . $league['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <span>Sports Category</span>
                                <select class="form-control" name="sports_category" id="sports_category" required>
                                    <option value="">Select Sports Category</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <span>League Session Name</span>
                        <input type="text" class="form-control" placeholder="Enter league session name" name="league_session_name" required>
                    </div>
                    <div class="form-group">
                        <span>League Session Notes</span>
                        <input type="text" class="form-control" placeholder="Enter league session notes" name="league_session_notes" required>
                    </div>
                    <div class="form-group">
                        <span>Status</span>
                        <select class="form-control" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Add League Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>public/admin/js/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#league_category').change(function() {
            var league_id = $(this).val();
            $.ajax({
                url: '<?= base_url() ?>get-sports-category',
                type: 'post',
                data: {
                    league_id: league_id
                },
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    $("#sports_category").empty();
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $("#sports_category").append("<option value='" + id + "'>" + name + "</option>");
                    }
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>