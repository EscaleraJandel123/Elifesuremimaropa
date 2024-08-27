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
                            <a class="nav-link active" aria-current="page" href="/AppDash">
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
                    <h1 class="h2 mb-0">Overview</h1>

                    <small class="text-muted">Hello <a href="#">
                            <?= $applicant['username'] ?>
                        </a>, welcome!</small>
                </div>

                <div class="row my-4">
                    <div class="col-lg-7 col-12">
                        <!-- Chart for Pending Applicants -->
                        <div class="custom-block bg-white">
                            <div id="ApplicantChart"></div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <div class="custom-block custom-block-profile-front custom-block-profile text-center bg-white">
                            <div class="custom-block-profile-image-wrap mb-4">
                                <img src="<?= isset($applicant['profile']) && !empty($applicant['profile']) ? base_url('/uploads/' . $applicant['profile']) : base_url('/uploads/def.png') ?>"
                                    class="custom-block-profile-image img-fluid" alt="">

                                <a href="/AppSetting" class="bi-pencil-square custom-block-edit-icon"></a>
                            </div>

                            <p class="d-flex flex-wrap mb-2">
                                <strong>Name:</strong>

                                <a href="#">
                                    <?php if (isset($applicant['lastname']) && isset($applicant['firstname']) && isset($applicant['middlename'])): ?>
                                        <?= $applicant['lastname'] ?>,
                                        <?= $applicant['firstname'] ?>
                                        <?= $applicant['middlename'] ?>
                                    <?php endif; ?>
                                </a>
                            </p>

                            <p class="d-flex flex-wrap mb-2">
                                <strong>Email:</strong>

                                <a href="#">
                                    <?php echo isset($applicant['email']) ? $applicant['email'] : '' ?>
                                </a>
                            </p>

                            <p class="d-flex flex-wrap mb-0">
                                <strong>Phone:</strong>

                                <a href="#">
                                    <?php echo isset($applicant['number']) ? $applicant['number'] : '' ?>
                                </a>
                            </p>
                        </div>


                        <div class="custom-block custom-block-profile bg-white">
                            <h6 class="mb-4">Applicant Status</h6>

                            <p class="d-flex flex-wrap mb-2">
                                <strong>Status:</strong>

                                <span>
                                    <?= $user['accountStatus'] ?>
                                </span>
                            </p>

                            <p class="d-flex flex-wrap mb-2">
                                <strong>Role:</strong>

                                <span>
                                    <?= $user['role'] ?>
                                </span>
                            </p>

                            <p class="d-flex flex-wrap mb-2">
                                <strong>Created:</strong>

                                <span>
                                    <?= date('M j, Y', strtotime($user['created_at'])); ?>
                                </span>
                            </p>

                        </div>
                    </div>
                    <footer class="site-footer">
                        <div class="container">
                            <div class="row">

                            </div>
                        </div>
                    </footer>
                </div>
            </main>
        </div>
    </div>

    <!-- JAVASCRIPT FILES -->
    <?= view('js'); ?>
    <?= view('Charts/visuals'); ?>
</body>

</html>