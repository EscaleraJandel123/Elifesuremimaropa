<!DOCTYPE html>
<html lang="en">
<?= view('/Home/chop/head'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>
    <?= view('/Client/dashboard/topside'); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Plans</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="ClientPage">Home</a></li>
                    <li class="breadcrumb-item">Plans</li>
                    <!-- <li class="breadcrumb-item active">Profile</li> -->
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger mt-3 text-center" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success mt-3 text-center" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <section class="section profile">
            <div class="row">

                <div class="col-lg-12 col-md-6 col-sm-6">
                    <div class="row row-cols-2">
                        <!-- First card column -->
                        <?php foreach ($plan as $plans): ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="col-lg-12">
                                        <div class="image-container">
                                            <a href="#" onclick="capturePlanName('<?= $plans['token'] ?>')"
                                                data-bs-toggle="modal" data-bs-target="#plan<?= $plans['token'] ?>">
                                                <img src="<?= isset($plans['image']) ? base_url('/uploads/plans/' . $plans['image']) : '' ?>"
                                                    class="card-img-top img-fluid" alt="...">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $plans['plan_name'] ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="plan<?= $plans['token'] ?>" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><?= $plans['plan_name'] ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-lg">
                                            <?= isset($plans['description']) ? $plans['description'] : ''; ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#agents"
                                                class="btn btn-primary">I want to avail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>


                        <div class="modal fade" id="agents" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Select Your Future Financial Advisor</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-lg">
                                        <div class="row row-cols-2">
                                            <?php foreach ($agent as $agents): ?>
                                                <div class="col-lg-3 col-md-6 col-sm-6">
                                                    <div class="card">
                                                        <div
                                                            class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                                            <a href="#"
                                                                onclick="captureAgentId('<?= $agents['agent_id'] ?>')"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#seeProfile<?= $agents['agent_token'] ?>">
                                                                <img src="<?= isset($agents['agentprofile']) && !empty($agents['agentprofile']) ? base_url('/uploads/' . $agents['agentprofile']) : base_url('/uploads/def.png') ?>"
                                                                    alt="Profile" class="rounded-circle">
                                                            </a>
                                                            <h2><?= isset($agents['username']) ? $agents['username'] : '' ?>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php foreach ($agent as $agents): ?>
                            <div class="modal fade" id="seeProfile<?= $agents['agent_token'] ?>" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                <?= isset($agents['username']) ? $agents['username'] : '' ?>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-lg">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="card">
                                                        <div
                                                            class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                                            <img src="<?= isset($agents['agentprofile']) && !empty($agents['agentprofile']) ? base_url('/uploads/' . $agents['agentprofile']) : base_url('/uploads/def.png') ?>"
                                                                alt="Profile" class="rounded-circle">
                                                            <h2><?php echo isset($agents['username']) ? $agents['username'] : '' ?>
                                                            </h2>
                                                            <div class="social-links mt-2">
                                                                <a href="#" class="twitter"><i
                                                                        class="bi bi-messenger"></i></a>
                                                                <a href="#" class="facebook"><i
                                                                        class="bi bi-facebook"></i></a>
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

                                                                    <h5 class="card-title">Agent Details</h5>

                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 col-md-4 label ">Full Name
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            <?php if (isset($agents['lastname']) && isset($agents['firstname']) && isset($agents['middlename'])): ?>
                                                                                <?= $agents['lastname'] ?>,
                                                                                <?= $agents['firstname'] ?>
                                                                                <?= $agents['middlename'] ?>.
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 col-md-4 label">Username
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            <?php echo isset($agents['username']) ? $agents['username'] : '' ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            <?php echo isset($agents['email']) ? $agents['email'] : '' ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            <?php echo isset($agents['number']) ? $agents['number'] : '' ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 col-md-4 label">Birthday
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            <?= isset($agents['birthday']) ? date('M j, Y', strtotime($agents['birthday'])) : ''; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 col-md-4 label">Adress
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            <?= isset($agents['region']) ? $agents['region'] : '' ?>,
                                                                            <?= isset($agents['province']) ? $agents['province'] : '' ?>,
                                                                            <?= isset($agents['city']) ? $agents['city'] : '' ?>,
                                                                            <?= isset($agents['barangay']) ? $agents['barangay'] : '' ?>,
                                                                            <?= isset($agents['street']) ? $agents['street'] : '' ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-primary" id="continueBtn" onclick="submitForm()">
                                                Continue <i class="bi bi-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <form action="/createSchedule" method="POST" id="f">
                    <input type="hidden" id="planNameInput" name="planToken">
                    <input type="hidden" id="agentIdInput" name="agentToken">
                </form>
            </div>
        </section>
    </main>
</body>

<script>
    function capturePlanName(planName) {
        console.log('Captured plan_name:', planName);
        document.getElementById('planNameInput').value = planName;
    }
    function captureAgentId(agentId) {
        console.log('Captured agent_id:', agentId);
        document.getElementById('agentIdInput').value = agentId;
    }
    function submitForm() {
        var form = document.getElementById('f');
        form.submit();
    }
</script>

<?= view('/Home/chop/jsh'); ?>