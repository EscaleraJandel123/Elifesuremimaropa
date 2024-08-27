<!doctype html>
<html lang="en">
<?= view('head') ?>

<body>
    <?= view('Agent/chop/header') ?>
    <div class="container-fluid">
        <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
                <div class="position-sticky py-4 px-3 sidebar-sticky">
                    <ul class="nav flex-column h-100">

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/AgDash">
                                <i class="bi-house-fill me-2"></i>
                                Overview
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/AgForms">
                                <i class="bi bi-file-earmark-slides me-2"></i>
                                Forms
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/Agsignature">
                                <i class="bi bi-pen me-2"></i>
                                Signature
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/subagent">
                                <i class="bi-person me-2"></i>
                                Sub Agents
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/clients">
                                <i class="bi-person me-2"></i>
                                Clients
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/agentsched">
                                <i class="bi bi-check-lg me-2"></i>
                                Schedule
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="/cliSched">
                                <i class="bi bi-check-lg me-2"></i>
                                Transactions
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="/mycommi">
                                <i class="bi bi-wallet2 me-2"></i>
                                My Commission
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
                    <div class="col-lg-11 col-12">
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
                                    <h6 class="mb-4 fs-8">Applicant Profile</h6>

                                    <form class="custom-form profile-form" action="/svag" method="post"
                                        enctype="multipart/form-data" onsubmit="return confirmSubmit()">

                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <label for="lastname" class="small">Last Name</label>
                                                <input class="form-control text-center" type="text" name="lastname"
                                                    id="profile-name" placeholder="Last Name"
                                                    value="<?= isset ($agent['lastname']) ? $agent['lastname'] : '' ?>">
                                            </div>
                                            <div class="col-md-5 text-center">
                                                <label for="firstname" class="small">First Name</label>
                                                <input class="form-control text-center" type="text" name="firstname"
                                                    id="profile-name" placeholder="First Name"
                                                    value="<?= isset ($agent['firstname']) ? $agent['firstname'] : '' ?>">
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <label for="middlename" class="small">Middle Name</label>
                                                <input class="form-control text-center" type="text" name="middlename"
                                                    id="profile-name" placeholder="Middle Name"
                                                    value="<?= isset ($agent['middlename']) ? $agent['middlename'] : '' ?>"">
                                            </div>
                                        </div>

                                        <div class=" row">
                                                <div class="col-md-3 text-center">
                                                    <label for="number" class="small">Number</label>
                                                    <input class="form-control text-center" type="text" name="number"
                                                        placeholder="Please Enter Your Number"
                                                        value="<?= isset ($agent['number']) ? $agent['number'] : '' ?>">
                                                </div>

                                                <div class="col-md-4 text-center">
                                                    <label for="email" class="small">Email</label>
                                                    <input class="form-control text-center" type="email" name="email"
                                                        placeholder="Email"
                                                        value="<?= isset ($agent['email']) ? $agent['email'] : '' ?>">
                                                </div>
                                                <div class="col-md-3 text-center">
                                                    <label for="birthday" class="small">Birthday</label>
                                                    <input class="form-control text-center text-center" type="date"
                                                        name="birthday"
                                                        placeholder="Please Enter your Birthday mm/dd/yyyy"
                                                        value="<?= isset ($agent['birthday']) ? $agent['birthday'] : '' ?>">
                                                </div>

                                                <div class="col-md-2 text-center">
                                                    <label for="username" class="small">Username</label>
                                                    <input class="form-control text-center" type="text" name="username"
                                                        id="profile-name" placeholder="Full name"
                                                        value="<?= isset ($agent['username']) ? $agent['username'] : '' ?>">
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-3 text-center">
                                                    <label for="region" class="small">Region</label>
                                                    <select class="form-control text-center" name="region" id="region">
                                                        <option
                                                            value="<?= isset ($agent['region']) ? $agent['region'] : '' ?>"
                                                            selected>
                                                            <?= isset ($agent['region']) ? $agent['region'] : '' ?>
                                                        </option>
                                                    </select>
                                                    <input type="hidden" class="form-control form-control-md"
                                                        name="region_text"
                                                        value="<?= isset ($agent['region']) ? $agent['region'] : '' ?>"
                                                        id="region-text" required>
                                                </div>

                                                <div class="col-md-4 text-center">
                                                    <label for="province" class="small">Province</label>
                                                    <select class="form-control text-center" name="province"
                                                        id="province">
                                                        <option
                                                            value="<?= isset ($agent['province']) ? $agent['province'] : '' ?>"
                                                            selected>
                                                            <?= isset ($agent['province']) ? $agent['province'] : '' ?>
                                                        </option>
                                                    </select>
                                                    <input type="hidden" class="form-control form-control-md"
                                                        name="province_text"
                                                        value="<?= isset ($agent['province']) ? $agent['province'] : '' ?>"
                                                        id="province-text" required>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <label for="city" class="small">City/Municipality</label>
                                                    <select class="form-control text-center" name="city" id="city">
                                                        <option
                                                            value="<?= isset ($agent['city']) ? $agent['city'] : '' ?>"
                                                            selected>
                                                            <?= isset ($agent['city']) ? $agent['city'] : '' ?>
                                                        </option>
                                                    </select>
                                                    <input type="hidden" class="form-control form-control-md"
                                                        name="city_text"
                                                        value="<?= isset ($agent['city']) ? $agent['city'] : '' ?>"
                                                        id="city-text" required>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <label for="barangay" class="small">Barangay</label>
                                                    <select class="form-control text-center" name="barangay"
                                                        id="barangay">
                                                        <option
                                                            value="<?= isset ($agent['barangay']) ? $agent['barangay'] : '' ?>"
                                                            selected>
                                                            <?= isset ($agent['barangay']) ? $agent['barangay'] : '' ?>
                                                        </option>
                                                    </select>
                                                    <input type="hidden" class="form-control form-control-md"
                                                        name="barangay_text"
                                                        value="<?= isset ($agent['barangay']) ? $agent['barangay'] : '' ?>"
                                                        id="barangay-text" required>
                                                </div>

                                                <div class="col-md-4 text-center">
                                                    <label for="street" class="small">Street (optional)</label>
                                                    <input class="form-control text-center" type="text" name="street"
                                                        value="<?= isset ($agent['street']) ? $agent['street'] : '' ?>"
                                                        id="street" placeholder="Street">
                                                </div>

                                                <div class="col-md-4 text-center">
                                                    <label for="zipcode" class="small">Zip Code</label>
                                                    <input class="form-control text-center" type="text" name="zipcode"
                                                        value="<?= isset ($agent['zipcode']) ? $agent['zipcode'] : '' ?>"
                                                        id="zipcode" placeholder="zipcode" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-group mb-1">
                                                        <img id="preview-image"
                                                            src="<?= isset($agent['agentprofile']) && !empty($agent['agentprofile']) ? base_url('/uploads/' . $agent['agentprofile']) : base_url('/uploads/def.png') ?>"
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

                                    <form class="custom-form password-form" action="/updatePassword" method="post"
                                        role="form" onsubmit="return confirmSubmitpassword()">
                                        <input type="password" name="current_password" id="current_password"
                                            pattern="[0-9a-zA-Z]{4,10}" class="form-control"
                                            placeholder="Current Password" required="">

                                        <input type="password" name="new_password" id="new_password"
                                            pattern="[0-9a-zA-Z]{4,10}" class="form-control" placeholder="New Password"
                                            required="">

                                        <input type="password" name="confirm_new_password" id="confirm_new_password"
                                            pattern="[0-9a-zA-Z]{4,10}" class="form-control"
                                            placeholder="Confirm Password" required="">

                                        <div class="d-flex">
                                            <button type="button" class="form-control me-3"
                                                onclick="resetPasswordFields()">Clear</button>

                                            <button type="submit" class="form-control ms-2">Update Password</button>
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
    <?= view('js') ?>
    <script>

        function resetPasswordFields() {
            document.getElementById('current_password').value = '';
            document.getElementById('new_password').value = '';
            document.getElementById('confirm_new_password').value = '';
        }

        function confirmSubmit() {
            return confirm("Are you sure you want to update your Profile?");
        }

        function confirmSubmitpassword() {
            return confirm("Are you sure you want to update your Password?");
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