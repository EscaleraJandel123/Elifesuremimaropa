<!doctype html>
<html lang="en">
<?= view('head') ?>

<body>
    <?= view('Admin/chop/header') ?>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
                <div class="position-sticky py-4 px-3 sidebar-sticky">
                    <ul class="nav flex-column h-100">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/AdDash">
                                <i class="bi-house-fill me-2"></i>
                                Overview
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/usermanagement">
                                <i class="fa fa-user me-2"></i>
                                User Management
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/Forms">
                                <i class="bi bi-file-earmark-slides me-2"></i>
                                Forms
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/promotion">
                                <i class="fa fa-user me-2"></i>
                                Promotion
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/confirmation">
                                <i class="bi bi-check-lg me-2"></i>
                                Confirmation
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/sched">
                                <i class="bi bi-check-lg me-2"></i>
                                Schedule
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/ManageAgent">
                                <i class="fas fa-user-tie me-2"></i>
                                Agents
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/ManageApplicant">
                                <i class="fa fa-users me-2"></i>
                                Applicants
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/map">
                                <i class="bi bi-map me-2"></i>
                                Maps
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/AdHelp">
                                <i class="fas fa-hands-helping me-2"></i>
                                Help Center
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="/plans">
                                <i class="bi bi-hospital me-2"></i>
                                Plans
                            </a>
                        </li>

                        <li class="nav-item border-top mt-auto pt-2">
                            <a class="nav-link" href="/logout">
                                <i class="bi-box-arrow-left me-2"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
                <div class="title-group mb-3">
                    <h1 class="h2 mb-0">Settings</h1>
                </div>

                <div class="row my-4">
                    <div class="col-lg-10 col-12">
                        <div class="custom-block bg-white">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile-tab-pane" type="button" role="tab"
                                        aria-controls="profile-tab-pane" aria-selected="true">Profile</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="password-tab" data-bs-toggle="tab"
                                        data-bs-target="#password-tab-pane" type="button" role="tab"
                                        aria-controls="password-tab-pane" aria-selected="false">Password</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">
                                    <h6 class="mb-4">Applicant Profile</h6>

                                    <form class="custom-form profile-form" action="/svad" method="post"
                                        enctype="multipart/form-data" onsubmit="return confirmSubmit()">

                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <label for="lastname" class="small">Last Name</label>
                                                <input class="form-control text-center" type="text" name="lastname"
                                                    id="profile-name" placeholder="Last Name"
                                                    value="<?= isset($admin['lastname']) ? $admin['lastname'] : '' ?>">
                                            </div>
                                            <div class="col-md-5 text-center">
                                                <label for="firstname" class="small">First Name</label>
                                                <input class="form-control text-center" type="text" name="firstname"
                                                    id="profile-name" placeholder="First Name"
                                                    value="<?= isset($admin['firstname']) ? $admin['firstname'] : '' ?>">
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <label for="middlename" class="small">Middle Name</label>
                                                <input class="form-control text-center" type="text" name="middlename"
                                                    id="profile-name" placeholder="Middle Name"
                                                    value="<?= isset($admin['middlename']) ? $admin['middlename'] : '' ?>"">
                                            </div>
                                        </div>

                                        <div class=" row">
                                                <div class="col-md-3 text-center">
                                                    <label for="number" class="small">Number</label>
                                                    <input class="form-control text-center" type="text" name="number"
                                                        placeholder="Please Enter Your Number"
                                                        value="<?= isset($admin['number']) ? $admin['number'] : '' ?>">
                                                </div>

                                                <div class="col-md-4 text-center">
                                                    <label for="email" class="small">Email</label>
                                                    <input class="form-control text-center" type="email" name="email"
                                                        placeholder="Email"
                                                        value="<?= isset($admin['email']) ? $admin['email'] : '' ?>">
                                                </div>
                                                <div class="col-md-3 text-center">
                                                    <label for="birthday" class="small">Birthday</label>
                                                    <input class="form-control text-center text-center" type="date"
                                                        name="birthday"
                                                        placeholder="Please Enter your Birthday mm/dd/yyyy"
                                                        value="<?= isset($admin['birthday']) ? $admin['birthday'] : '' ?>">
                                                </div>

                                                <div class="col-md-2 text-center">
                                                    <label for="username" class="small">Username</label>
                                                    <input class="form-control text-center" type="text" name="username"
                                                        id="profile-name" placeholder="Full name"
                                                        value="<?= isset($admin['username']) ? $admin['username'] : '' ?>">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <label for="region" class="small">Region</label>
                                                    <select class="form-control text-center" name="region" id="region">
                                                        <option
                                                            value="<?= isset($admin['region']) ? $admin['region'] : '' ?>"
                                                            selected>
                                                            <?= isset($admin['region']) ? $admin['region'] : '' ?>
                                                        </option>
                                                    </select>
                                                    <input type="hidden" class="form-control form-control-md"
                                                        name="region_text"
                                                        value="<?= isset($admin['region']) ? $admin['region'] : '' ?>"
                                                        id="region-text" required>
                                                </div>

                                                <div class="col-md-4 text-center">
                                                    <label for="province" class="small">Province</label>
                                                    <select class="form-control text-center" name="province"
                                                        id="province">
                                                        <option
                                                            value="<?= isset($admin['province']) ? $admin['province'] : '' ?>"
                                                            selected>
                                                            <?= isset($admin['province']) ? $admin['province'] : '' ?>
                                                        </option>
                                                    </select>
                                                    <input type="hidden" class="form-control form-control-md"
                                                        name="province_text"
                                                        value="<?= isset($admin['province']) ? $admin['province'] : '' ?>"
                                                        id="province-text" required>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <label for="city" class="small">City/Municipality</label>
                                                    <select class="form-control text-center" name="city" id="city">
                                                        <option
                                                            value="<?= isset($admin['city']) ? $admin['city'] : '' ?>"
                                                            selected>
                                                            <?= isset($admin['city']) ? $admin['city'] : '' ?>
                                                        </option>
                                                    </select>
                                                    <input type="hidden" class="form-control form-control-md"
                                                        name="city_text"
                                                        value="<?= isset($admin['city']) ? $admin['city'] : '' ?>"
                                                        id="city-text" required>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <label for="barangay" class="small">Barangay</label>
                                                    <select class="form-control text-center" name="barangay"
                                                        id="barangay">
                                                        <option
                                                            value="<?= isset($admin['barangay']) ? $admin['barangay'] : '' ?>"
                                                            selected>
                                                            <?= isset($admin['barangay']) ? $admin['barangay'] : '' ?>
                                                        </option>
                                                    </select>
                                                    <input type="hidden" class="form-control form-control-md"
                                                        name="barangay_text"
                                                        value="<?= isset($admin['barangay']) ? $admin['barangay'] : '' ?>"
                                                        id="barangay-text" required>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <label for="street" class="small">Street (optional)</label>
                                                    <input class="form-control text-center" type="text" name="street"
                                                        value="<?= isset($admin['street']) ? $admin['street'] : '' ?>"
                                                        id="street" placeholder="Street">
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <label for="zipcode" class="small">Zip Code</label>
                                                    <input class="form-control text-center" type="text" name="zipcode"
                                                        value="<?= isset($admin['zipcode']) ? $admin['zipcode'] : '' ?>"
                                                        id="zipcode" placeholder="zipcode" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-group mb-1">
                                                        <img id="preview-image"
                                                            src="<?= isset($admin['adminProfile']) && !empty($admin['adminProfile']) ? base_url('/uploads/' . $admin['adminProfile']) : base_url('/uploads/def.png') ?>"
                                                            class="profile-image img-fluid" alt="">
                                                        <input type="file" name="profile" class="form-control"
                                                            id="inputGroupFile02" onchange="previewImage()">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="d-flex">
                                                        <button type="submit" class="form-control ms-2">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>

                                </div>

                                <div class="tab-pane fade" id="password-tab-pane" role="tabpanel"
                                    aria-labelledby="password-tab" tabindex="0">
                                    <h6 class="mb-4">Password</h6>

                                    <form class="custom-form password-form" action="/updatePasswordlogin" method="post"
                                        role="form" onsubmit="return confirmSubmitpassword()">
                                        <div class="col-md-12 mb-3 col-lg-12">
                                            <!-- Added col-md-8 class -->
                                            <input type="password" name="current_password" id="current_password"
                                                class="form-control" placeholder="Current Password" required>

                                            <input type="password" name="new_password" id="new_password"
                                                class="form-control" placeholder="New Password" required>

                                            <input type="password" name="confirm_new_password" id="confirm_new_password"
                                                class="form-control" placeholder="Confirm Password" required>

                                            <div class="d-flex">
                                                <button type="button" class="form-control me-3">Reset</button>
                                                <button type="submit" class="form-control ms-2">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <footer class="site-footer">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </footer>
            </main>
        </div>
    </div>

    <!-- JAVASCRIPT FILES -->
    <?= view('js'); ?>
    <script>
        function confirmSubmit() {
            return confirm("Are you sure you want to update your Profile?");
        }
        function confirmSubmitpassword() {
            return confirm("Are you sure you want to update your Password?");
        }
        function resetPasswordFields() {
            document.getElementById('current_password').value = '';
            document.getElementById('new_password').value = '';
            document.getElementById('confirm_new_password').value = '';
        }
        function previewImage() {
            const input = document.getElementById('inputGroupFile02');
            const preview = document.getElementById('preview-image');

            const file = input.files[0];
            const reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = 'default_path_here';
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php base_url() ?>add/ph-address-selector.js"></script>
</body>

</html>