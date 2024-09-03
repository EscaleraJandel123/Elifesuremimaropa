<!DOCTYPE html>
<html lang="en">
<?= view('/Home/chop/head'); ?>

<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="<?= isset($agent['agentprofile']) && !empty($agent['agentprofile']) ? base_url('/uploads/' . $agent['agentprofile']) : base_url('/uploads/def.png') ?>"
                alt="Profile" class="rounded-circle">
              <h2><?php echo isset($agent['username']) ? $agent['username'] : '' ?></h2>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-messenger"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="gmail"><i class="bi bi-envelope"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview">
                  <h5 class="card-title">Profile Details</h5>
                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">
                      <?php if (isset($agent['lastname']) && isset($agent['firstname']) && isset($agent['middlename'])): ?>
                        <?= $agent['lastname'] ?>,
                        <?= $agent['firstname'] ?>
                        <?= $agent['middlename'] ?>.
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label">Username</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo isset($agent['username']) ? $agent['username'] : '' ?>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo isset($agent['email']) ? $agent['email'] : '' ?>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo isset($agent['number']) ? $agent['number'] : '' ?>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label">Birthday</div>
                    <div class="col-lg-9 col-md-8">
                      <?= isset($agent['birthday']) ? date('M j, Y', strtotime($agent['birthday'])) : ''; ?>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label">Adress</div>
                    <div class="col-lg-9 col-md-8">
                    <?= isset($agent['region']) ? $agent['region'] : '' ?>,
                      <?= isset($agent['province']) ? $agent['province'] : '' ?>,
                      <?= isset($agent['city']) ? $agent['city'] : '' ?>,
                      <?= isset($agent['barangay']) ? $agent['barangay'] : '' ?>,
                      <?= isset($agent['street']) ? $agent['street'] : '' ?>
                    </div>
                  </div>
                </div>
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
</body>
<?= view('/Home/chop/jsh'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php base_url() ?>add/ph-address-selector.js"></script>