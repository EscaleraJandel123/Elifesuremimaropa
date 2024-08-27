<!doctype html>
<html lang="en">
<?= view('head'); ?>


<body>
    <?= view('Applicant/chop/header'); ?>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
                <div class="position-sticky py-4 px-3 sidebar-sticky">
                    <ul class="nav flex-column h-100">

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/AppDash">
                                <i class="bi-house-fill me-2"></i>
                                Overview
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/AppForms">
                                <i class="bi bi-file-earmark-slides me-2"></i>
                                Forms
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/signature">
                                <i class="bi bi-pen me-2"></i>
                                Signature
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/appfiles">
                                <i class="bi bi-files"></i></i>
                                Files
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/FA">
                                <i class="bi-person me-2"></i>
                                Agents
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
                    <!-- <h1 class="h2 mb-0">Settings</h1> -->
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

                                <!-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contacts-tab" data-bs-toggle="tab"
                                        data-bs-target="#contacts-tab-pane" type="button" role="tab"
                                        aria-controls="contacts-tab-pane" aria-selected="false">Contacts</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="address-tab" data-bs-toggle="tab"
                                        data-bs-target="#address-tab-pane" type="button" role="tab"
                                        aria-controls="address-tab-pane" aria-selected="false">Address</button>
                                </li> -->
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">
                                    <h6 class="mb-4">Personal Information</h6>

                                    <form class="custom-form profile-form" action="/svap" method="post"
                                        enctype="multipart/form-data" onsubmit="return confirmSubmit()">

                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <label for="lastname" class="small">Last Name</label>
                                                <input class="form-control text-center" type="text" name="lastname"
                                                    id="profile-name" placeholder="Last Name"
                                                    value="<?= isset ($applicant['lastname']) ? $applicant['lastname'] : '' ?>">
                                            </div>
                                            <div class="col-md-5 text-center">
                                                <label for="firstname" class="small">First Name</label>
                                                <input class="form-control text-center" type="text" name="firstname"
                                                    id="profile-name" placeholder="First Name"
                                                    value="<?= isset ($applicant['firstname']) ? $applicant['firstname'] : '' ?>">
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <label for="middlename" class="small">Middle Name</label>
                                                <input class="form-control text-center" type="text" name="middlename"
                                                    id="profile-name" placeholder="Middle Name"
                                                    value="<?= isset ($applicant['middlename']) ? $applicant['middlename'] : '' ?>"">
                                            </div>
                                        </div>

                                            <div class=" row">
                                                <div class="col-md-3 text-center">
                                                    <label for="number" class="small">Number</label>
                                                    <input class="form-control text-center" type="text" name="number"
                                                        placeholder="Please Enter Your Number"
                                                        value="<?= isset ($applicant['number']) ? $applicant['number'] : '' ?>">
                                                </div>

                                                <div class="col-md-4 text-center">
                                                    <label for="email" class="small">Email</label>
                                                    <input class="form-control text-center" type="email" name="email"
                                                        placeholder="Email"
                                                        value="<?= isset ($applicant['email']) ? $applicant['email'] : '' ?>">
                                                </div>
                                                <div class="col-md-3 text-center">
                                                    <label for="birthday" class="small">Birthday</label>
                                                    <input class="form-control text-center text-center" type="date"
                                                        name="birthday"
                                                        placeholder="Please Enter your Birthday mm/dd/yyyy"
                                                        value="<?= isset ($applicant['birthday']) ? $applicant['birthday'] : '' ?>">
                                                </div>

                                                <div class="col-md-2 text-center">
                                                    <label for="username" class="small">Username</label>
                                                    <input class="form-control text-center" type="text" name="username"
                                                        id="profile-name" placeholder="Full name"
                                                        value="<?= isset ($applicant['username']) ? $applicant['username'] : '' ?>">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <label for="region" class="small">Region</label>
                                                    <select class="form-control text-center" name="region" id="region">
                                                        <option
                                                            value="<?= isset ($applicant['region']) ? $applicant['region'] : '' ?>"
                                                            selected>
                                                            <?= isset ($applicant['region']) ? $applicant['region'] : '' ?>
                                                        </option>
                                                    </select>
                                                    <input type="hidden" class="form-control form-control-md"
                                                        name="region_text"
                                                        value="<?= isset ($applicant['region']) ? $applicant['region'] : '' ?>"
                                                        id="region-text" required>
                                                </div>

                                                <div class="col-md-4 text-center">
                                                    <label for="province" class="small">Province</label>
                                                    <select class="form-control text-center" name="province"
                                                        id="province">
                                                        <option
                                                            value="<?= isset ($applicant['province']) ? $applicant['province'] : '' ?>"
                                                            selected>
                                                            <?= isset ($applicant['province']) ? $applicant['province'] : '' ?>
                                                        </option>
                                                    </select>
                                                    <input type="hidden" class="form-control form-control-md"
                                                        name="province_text"
                                                        value="<?= isset ($applicant['province']) ? $applicant['province'] : '' ?>"
                                                        id="province-text" required>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <label for="city" class="small">City/Municipality</label>
                                                    <select class="form-control text-center" name="city" id="city">
                                                        <option
                                                            value="<?= isset ($applicant['city']) ? $applicant['city'] : '' ?>"
                                                            selected>
                                                            <?= isset ($applicant['city']) ? $applicant['city'] : '' ?>
                                                        </option>
                                                    </select>
                                                    <input type="hidden" class="form-control form-control-md"
                                                        name="city_text"
                                                        value="<?= isset ($applicant['city']) ? $applicant['city'] : '' ?>"
                                                        id="city-text" required>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <label for="barangay" class="small">Barangay</label>
                                                    <select class="form-control text-center" name="barangay"
                                                        id="barangay">
                                                        <option
                                                            value="<?= isset ($applicant['barangay']) ? $applicant['barangay'] : '' ?>"
                                                            selected>
                                                            <?= isset ($applicant['barangay']) ? $applicant['barangay'] : '' ?>
                                                        </option>
                                                    </select>
                                                    <input type="hidden" class="form-control form-control-md"
                                                        name="barangay_text"
                                                        value="<?= isset ($applicant['barangay']) ? $applicant['barangay'] : '' ?>"
                                                        id="barangay-text" required>
                                                </div>

                                                <div class="col-md-4 text-center">
                                                    <label for="street" class="small">Street (optional)</label>
                                                    <input class="form-control text-center" type="text" name="street"
                                                        value="<?= isset ($applicant['street']) ? $applicant['street'] : '' ?>"
                                                        id="street" placeholder="Street">
                                                </div>

                                                <div class="col-md-4 text-center">
                                                    <label for="zipcode" class="small">Zip Code</label>
                                                    <input class="form-control text-center" type="text" name="zipcode"
                                                        value="<?= isset ($applicant['zipcode']) ? $applicant['zipcode'] : '' ?>"
                                                        id="zipcode" placeholder="zip code" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-6">
                                                    <div class="input-group mb-1">
                                                        <img id="preview-image"
                                                            src="<?= isset($applicant['profile']) && !empty($applicant['profile']) ? base_url('/uploads/' . $applicant['profile']) : base_url('/uploads/def.png') ?>"
                                                            class="profile-image img-fluid" alt="profile">
                                                        <input type="file" name="profile" class="form-control"
                                                            id="inputGroupFile02" onchange="previewImage()">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-6">
                                                    <div class="d-flex">
                                                        <button type="submit" class="form-control ms-2">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="password-tab-pane" role="tabpanel"
                                    aria-labelledby="password-tab" tabindex="0">
                                    <h6 class="mb-4">Password Management</h6>

                                    <form class="custom-form password-form" action="/updatePassword" method="post"
                                        role="form" onsubmit="return confirmSubmitpassword()">
                                        <div class="col-md-12 mb-3 col-lg-8">
                                            <!-- Added col-md-8 class -->
                                            <input type="password" name="current_password" id="current_password"
                                                pattern="[0-9a-zA-Z]{4,10}" class="form-control"
                                                placeholder="Current Password" required>

                                            <input type="password" name="new_password" id="new_password"
                                                pattern="[0-9a-zA-Z]{4,10}" class="form-control"
                                                placeholder="New Password" required>

                                            <input type="password" name="confirm_new_password" id="confirm_new_password"
                                                pattern="[0-9a-zA-Z]{4,10}" class="form-control"
                                                placeholder="Confirm Password" required>

                                            <div class="d-flex">
                                                <button type="button" class="form-control me-3">Reset</button>
                                                <button type="submit" class="form-control ms-2">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="notification-tab-pane" role="tabpanel"
                                    aria-labelledby="notification-tab" tabindex="0">
                                    <h6 class="mb-4">Notification</h6>

                                    <form class="custom-form notification-form" action="#" method="post" role="form">

                                        <div class="form-check form-switch d-flex mb-3 ps-0">
                                            <label class="form-check-label" for="flexSwitchCheckCheckedOne">Account
                                                activity</label>

                                            <input class="form-check-input ms-auto" type="checkbox"
                                                name="form-check-input" role="switch" id="flexSwitchCheckCheckedOne"
                                                checked>
                                        </div>

                                        <div class="form-check form-switch d-flex mb-3 ps-0">
                                            <label class="form-check-label" for="flexSwitchCheckCheckedTwo">Payment
                                                updated</label>

                                            <input class="form-check-input ms-auto" type="checkbox"
                                                name="form-check-input" role="switch" id="flexSwitchCheckCheckedTwo"
                                                checked>
                                        </div>

                                        <div class="d-flex mt-4">
                                            <button type="button" class="form-control me-3">
                                                Reset
                                            </button>

                                            <button type="submit" class="form-control ms-2">
                                                Update Password
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="contacts-tab-pane" role="tabpanel"
                                    aria-labelledby="contacts-tab" tabindex="0">
                                    <h6 class="mb-4">Contacts</h6>

                                    <form class="custom-form contacts-form" action="#" method="post" role="form">

                                        <div class="form-check form-switch d-flex mb-3 ps-0">
                                            <label class="form-check-label" for="flexSwitchCheckCheckedOne">Account
                                                activity</label>

                                            <input class="form-check-input ms-auto" type="checkbox"
                                                name="form-check-input" role="switch" id="flexSwitchCheckCheckedOne"
                                                checked>
                                        </div>

                                        <div class="form-check form-switch d-flex mb-3 ps-0">
                                            <label class="form-check-label" for="flexSwitchCheckCheckedTwo">Payment
                                                updated</label>

                                            <input class="form-check-input ms-auto" type="checkbox"
                                                name="form-check-input" role="switch" id="flexSwitchCheckCheckedTwo"
                                                checked>
                                        </div>

                                        <div class="d-flex mt-4">
                                            <button type="button" class="form-control me-3">
                                                Reset
                                            </button>

                                            <button type="submit" class="form-control ms-2">
                                                Update Password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="address-tab-pane" role="tabpanel"
                                    aria-labelledby="address-tab" tabindex="0">
                                    <h6 class="mb-4">Address Information</h6>

                                    <form class="custom-form address-form" action="" method="post" role="form">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <label for="region" class="small">Region</label>
                                                    <select class="form-control" name="region" id="region">
                                                    </select>
                                                    <input type="hidden" class="form-control form-control-md"
                                                        name="region_text" id="region-text" required>

                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <label for="province" class="small">Province</label>
                                                    <select class="form-control " name="province" id="province">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <label for="city" class="small">City/Municipality</label>
                                                    <select class="form-control" name="city" id="city">
                                                    </select>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <label for="barangay" class="small">Barangay</label>
                                                    <select class="form-control" name="barangay" id="barangay">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 text-center">
                                                <label for="street" class="small">Street (optional)</label>
                                                <input class="form-control" type="text" name="street" id="street"
                                                    placeholder="Street">
                                            </div>
                                        </div>

                                        <div class="col-md-2 text-center">

                                            <button type="submit" class="form-control ms-2">
                                                Save
                                            </button>
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

    <?= view('js'); ?>
    <script>
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