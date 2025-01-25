<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>
<?= view('layouts/slider') ?>

<!-- Next Match -->
<div class="row bg-gray-middle m-lr0">
    <div class="col-lg-6 bg-primary p-tb30 text-center next-match-count">
        <h2 class="m-a0 m-b15 text-black">Next Match</h2>
        <div class="countdown dez-style-3 text-center m-b10">
            <div class="date">
                <span class="time days"></span>
                <span class="time-counting">Days</span>
            </div>
            <div class="date">
                <span class="time hours"></span>
                <span class="time-counting">Hours</span>
            </div>
            <div class="date">
                <span class="time mins"></span>
                <span class="time-counting">Minutess</span>
            </div>
            <div class="date">
                <span class="time secs"></span>
                <span class="time-counting">Second</span>
            </div>
        </div>
        <div class="text-black text-center">
            <span class="font-18">30/01/2024 /16:00AM</span>
        </div>
    </div>
    <div class="col-lg-6 p-tb30">
        <div class="row team-compact clearfix">
            <div class="col-sm-6 col-6 text-white text-center dez-vs-team">
                <span class="team-logo"><img width="150" height="150" src="<?= base_url() ?>public/assets/images/sports-logo/logo2.png" alt=""></span>
                <span class="font-18 team-name">Cricket Team 1</span>
            </div>
            <div class="col-sm-6 col-6 text-white text-center">
                <span class="team-logo"><img width="150" height="150" src="<?= base_url() ?>public/assets/images/sports-logo/logo3.png" alt=""></span>
                <span class="font-18 team-name">Cricket Team 2</span>
            </div>
        </div>
    </div>
</div>
<!-- Next Match -->
<?= view('layouts/match-result') ?>
<?= view('layouts/about') ?>
<?= view('layouts/sports') ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>