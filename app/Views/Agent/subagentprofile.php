<!doctype html>
<html lang="en">
<?= view('head') ?>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

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
                            <a class="nav-link active" href="/subagent">
                                <i class="bi-person me-2"></i>
                                Sub Agents
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/agfiles">
                                <i class="bi bi-files me-2"></i></i>
                                Files
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
                    <h1 class="h2 mb-0">
                        <?= $subagent['username'] ?>'s Profile
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xl-4 mb-1">
                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                <img src="<?= isset($subagent['agentprofile']) && !empty($subagent['agentprofile']) ? base_url('/uploads/' . $subagent['agentprofile']) : base_url('/uploads/def.png') ?>"
                                    alt="Profile" class="rounded-circle"
                                    style="width: 150px; height: 150px; cursor: pointer;" data-bs-placement="bottom"
                                    title="Click to see QR code">
                                <h5>
                                    <?= $subagent['username'] ?>
                                </h5>
                                <!-- <div class="social-links mt-2">
                                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <!--QR Modal-->
                    <div class="modal fade" id="profileModal" tabindex="-1">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="text-center">
                                        <div class="qr-code-container mt-3 mb-3" id="qrCodeContainer">
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo base_url() ?>register/<?= $subagent['AgentCode'] ?>"
                                                alt="QR Code">
                                        </div>
                                        <button type="button" class="btn btn-dark" id="downloadButton"><i
                                                class="bi bi-download"></i></button>
                                    </div>
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
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#sub-agents">Sub
                                            Agents</button>
                                    </li>

                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#forms">Forms</button>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <h5 class="card-title">Profile Details</h5>
                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                            <div class="col-lg-8 col-md-8">
                                                <?php if (isset($subagent['lastname']) && isset($subagent['firstname']) && isset($subagent['middlename'])): ?>
                                                    <?= $subagent['lastname'] ?>,
                                                    <?= $subagent['firstname'] ?>
                                                    <?= $subagent['middlename'] ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label">Username</div>
                                            <div class="col-lg-8 col-md-8">
                                                <?php echo isset($subagent['username']) ? $subagent['username'] : '' ?>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label">Agent Code</div>
                                            <div class="col-lg-8 col-md-8">
                                                <?php echo isset($subagent['AgentCode']) ? $subagent['AgentCode'] : '' ?>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-8 col-md-8">
                                                <?php echo isset($subagent['email']) ? $subagent['email'] : '' ?>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label">Phone</div>
                                            <div class="col-lg-8 col-md-8">
                                                <?php echo isset($subagent['number']) ? $subagent['number'] : '' ?>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label">Birthday</div>
                                            <div class="col-lg-8 col-md-8">
                                                <?php echo isset($subagent['birthday']) ? date('M j, Y', strtotime($subagent['birthday'])) : ''; ?>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label">Adress</div>
                                            <div class="col-lg-8 col-md-8">
                                                <?= isset($subagent['province']) ? $subagent['province'] : '' ?>,
                                                <?= isset($subagent['city']) ? $subagent['city'] : '' ?>,
                                                <?= isset($subagent['barangay']) ? $subagent['barangay'] : '' ?>,
                                                <?= isset($subagent['street']) ? $subagent['street'] : '' ?>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label">Zip Code</div>
                                            <div class="col-lg-8 col-md-8">
                                            <?php echo isset ($subagent['zipcode']) ? $subagent['zipcode'] : '' ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade sub-agents" id="sub-agents">
                                    <h5 class="card-title">Sub Agents</h5>
                                        <div class="table-responsive">
                                            <!-- Table with hoverable rows -->
                                            <div class="table-container mx-auto">
                                                <table class="table table-hover">
                                                    <thead class="thead-light bg-white">
                                                        <tr>
                                                            <th scope="col">User Name</th>
                                                            <th scope="col">Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($FA as $sub): ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $sub['username'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= date('M j, Y', strtotime($sub['created_at'])); ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="forms">
                                    <h5 class="card-title">Forms</h5>
                                        <div class="row text-center">
                                            <div class="col-xl-2 my-3">
                                                <a href="/ViewAppForm/<?= $subagent['agent_token'] ?>">
                                                    <img src="<?= base_url(); ?>uploads/folder.png" class="card-img-top"
                                                        alt="Life Changer Form Image">
                                                    LIFE
                                                </a>
                                            </div>
                                            <div class="col-xl-2 my-3">
                                                <a href="/ViewAppForm2/<?= $subagent['agent_token'] ?>">
                                                    <img src="<?= base_url(); ?>uploads/folder.png" class="card-img-top"
                                                        alt="AIAL">
                                                    AIAL
                                                </a>
                                            </div>
                                            <div class="col-xl-2 my-3">
                                                <a href="/ViewAppForm3/<?= $subagent['agent_token'] ?>">
                                                    <img src="<?= base_url(); ?>uploads/folder.png" class="card-img-top"
                                                        alt="Life Changer Form Image">
                                                    GLI
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Bordered Tabs -->
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

    <?= view('js') ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const downloadButton = document.getElementById('downloadButton');
            const qrCodeImage = document.querySelector('#qrCodeContainer img');

            downloadButton.addEventListener('click', function () {
                fetch(qrCodeImage.src)
                    .then(response => response.blob())
                    .then(blob => {
                        const downloadLink = document.createElement('a');
                        downloadLink.href = URL.createObjectURL(blob);
                        downloadLink.download = '<?= $subagent['username'] ?> Application Number qr-code.png';
                        downloadLink.click();
                    });
            });
        });

        // JavaScript code to show the modal when the profile image is clicked
        $(document).ready(function () {
            $('.profile-card img').on('click', function () {
                $('#profileModal').modal('show');
            });
        });
    </script>
</body>

</html>