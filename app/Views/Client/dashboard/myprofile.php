<!DOCTYPE html>
<html lang="en">
<?= view('/Home/chop/head'); ?>

<body>
  <?= view('/dashboard/topside'); ?>
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

              <img
                src="<?= isset($client['profile']) && !empty($client['profile']) ? base_url('/uploads/' . $client['profile']) : base_url('/uploads/def.png') ?>"
                alt="Profile" class="rounded-circle">
              <h2><?php echo isset($client['username']) ? $client['username'] : '' ?></h2>
              <h3><?php echo isset($user['role']) ? $user['role'] : '' ?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab"
                    data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                    Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                    Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">
                      <?php if (isset($client['lastName']) && isset($client['firstName']) && isset($client['middleName'])): ?>
                        <?= $client['lastName'] ?>,
                        <?= $client['firstName'] ?>
                        <?= $client['middleName'] ?>.
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label">Username</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo isset($client['username']) ? $client['username'] : '' ?>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo isset($client['email']) ? $client['email'] : '' ?>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo isset($client['number']) ? $client['number'] : '' ?>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label">Birthday</div>
                    <div class="col-lg-9 col-md-8">
                      <?= isset($client['birthday']) ? date('M j, Y', strtotime($client['birthday'])) : ''; ?>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label">Adress</div>
                    <div class="col-lg-9 col-md-8">
                      <?= isset($client['region']) ? $client['region'] : '' ?>,
                      <?= isset($client['province']) ? $client['province'] : '' ?>,
                      <?= isset($client['city']) ? $client['city'] : '' ?>,
                      <?= isset($client['barangay']) ? $client['barangay'] : '' ?>,
                      <?= isset($client['street']) ? $client['street'] : '' ?>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 label">Zip Code</div>
                    <div class="col-lg-8 col-md-8">
                      <?= isset($client['zipcode']) ? $client['zipcode'] : '' ?>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form class="custom-form profile-form" action="/svclient" method="post" enctype="multipart/form-data"
                    onsubmit="return confirmSubmit()">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                        Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="<?= isset($client['profile']) ? base_url('/uploads/' . $client['profile']) : '' ?>"
                          alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i
                              class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i
                              class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="lastname" class="col-md-4 col-lg-3 col-form-label">Last
                        Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lastname" type="text" class="form-control" id="lastname"
                          value="<?php echo isset($client['lastName']) ? $client['lastName'] : '' ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="firstname" class="col-md-4 col-lg-3 col-form-label">firstname
                        Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="firstname" type="text" class="form-control" id="firstname"
                          value="<?php echo isset($client['firstName']) ? $client['firstName'] : '' ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="middlename" class="col-md-4 col-lg-3 col-form-label">Middle
                        Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="middlename" type="text" class="form-control" id="middlename"
                          value="<?php echo isset($client['middleName']) ? $client['middleName'] : '' ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">User
                        Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="username"
                          value="<?php echo isset($client['username']) ? $client['username'] : '' ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Region</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-control" name="region" id="region">
                          <option value="<?= isset($client['region']) ? $client['region'] : '' ?>" selected>
                            <?= isset($client['region']) ? $client['region'] : '' ?>
                          </option>
                        </select>
                        <input type="hidden" class="form-control form-control-md" name="region_text"
                          value="<?= isset($client['region']) ? $client['region'] : '' ?>" id="region-text" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Province</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-control" name="province" id="province">
                          <option value="<?= isset($client['province']) ? $client['province'] : '' ?>" selected>
                            <?= isset($client['province']) ? $client['province'] : '' ?>
                          </option>
                        </select>
                        <input type="hidden" class="form-control form-control-md" name="province_text"
                          value="<?= isset($client['province']) ? $client['province'] : '' ?>" id="province-text"
                          required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">City</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-control" name="city" id="city">
                          <option value="<?= isset($client['city']) ? $client['city'] : '' ?>" selected>
                            <?= isset($client['city']) ? $client['city'] : '' ?>
                          </option>
                        </select>
                        <input type="hidden" class="form-control form-control-md" name="city_text"
                          value="<?= isset($client['city']) ? $client['city'] : '' ?>" id="city-text" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Barangay</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-control" name="barangay" id="barangay">
                          <option value="<?= isset($client['barangay']) ? $client['barangay'] : '' ?>" selected>
                            <?= isset($client['barangay']) ? $client['barangay'] : '' ?>
                          </option>
                        </select>
                        <input type="hidden" class="form-control form-control-md" name="barangay_text"
                          value="<?= isset($client['barangay']) ? $client['barangay'] : '' ?>" id="barangay-text"
                          required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Street</label>
                      <div class="col-md-8 col-lg-9">
                        <input class="form-control" type="text" name="street"
                          value="<?= isset($client['street']) ? $client['street'] : '' ?>" id="street"
                          placeholder="Street">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Zip Code</label>
                      <div class="col-md-8 col-lg-9">
                        <input class="form-control" type="text" name="zipcode"
                          value="<?= isset($client['zipcode']) ? $client['zipcode'] : '' ?>" id="zipcode"
                          placeholder="zipcode">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="number" class="col-md-4 col-lg-3 col-form-label">number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="number" type="text" class="form-control" id="number"
                          value="<?php echo isset($client['number']) ? $client['number'] : '' ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email"
                          value="<?php echo isset($client['email']) ? $client['email'] : '' ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="birthdate" class="col-md-4 col-lg-3 col-form-label">birthdate</label>
                      <div class="col-md-8 col-lg-9">
                        <input class="form-control" type="date" name="birthday"
                          value="<?= isset($client['birthday']) ? $client['birthday'] : '' ?>">
                      </div>
                    </div>

                    <!-- <div class="row mb-3">
                                            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="twitter" type="text" class="form-control" id="Twitter"
                                                    value="https://twitter.com/#">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="facebook" type="text" class="form-control" id="Facebook"
                                                    value="https://facebook.com/#">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="instagram" type="text" class="form-control" id="Instagram"
                                                    value="https://instagram.com/#">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedin" type="text" class="form-control" id="Linkedin"
                                                    value="https://linkedin.com/#">
                                            </div>
                                        </div> -->

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                        Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form class="custom-form password-form" action="/updatePassword" method="post">

                    <div class="row mb-3">
                      <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="current_password" type="password" class="form-control" id="current_password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="new_password" class="col-md-4 col-lg-3 col-form-label">New
                        Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="new_password" type="password" class="form-control" id="new_password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="confirm_new_password" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                        Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="confirm_new_password" type="password" class="form-control"
                          id="confirm_new_password">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

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