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
                            <a class="nav-link " aria-current="page" href="/agfiles">
                                <i class="bi bi-files me-2"></i></i>
                                Files
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
                    <h1 class="h2 mb-0">
                        <?= $agent['username'] ?>'s Profile
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xl-4 mb-1">
                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                <img src="<?= isset($agent['agentprofile']) && !empty($agent['agentprofile']) ? base_url('/uploads/' . $agent['agentprofile']) : base_url('/uploads/def.png') ?>"
                                    alt="Profile" class="rounded-circle"
                                    style="width: 150px; height: 150px; cursor: pointer;" data-bs-placement="bottom"
                                    title="Click to see QR code">
                                <h5>
                                    <?= $agent['username'] ?>
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
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo base_url() ?>register/<?= $agent['AgentCode'] ?>"
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
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#forms">My Data</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#files">My Files</button>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <h5 class="card-title" style="font-weight: bold;">Profile Details</h5>
                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label " style="font-weight: bold;">Full Name</div>
                                            <div class="col-lg-8 col-md-8">
                                                <?php if (isset($agent['lastname']) && isset($agent['firstname']) && isset($agent['middlename'])): ?>
                                                    <?= $agent['lastname'] ?>,
                                                    <?= $agent['firstname'] ?>
                                                    <?= $agent['middlename'] ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label" style="font-weight: bold;">Username</div>
                                            <div class="col-lg-8 col-md-8">
                                                <?php echo isset($agent['username']) ? $agent['username'] : '' ?>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label" style="font-weight: bold;">Agent Code</div>
                                            <div class="col-lg-8 col-md-8">
                                                <?php echo isset($agent['AgentCode']) ? $agent['AgentCode'] : '' ?>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label" style="font-weight: bold;">Email</div>
                                            <div class="col-lg-8 col-md-8">
                                                <?php echo isset($agent['email']) ? $agent['email'] : '' ?>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label" style="font-weight: bold;">Phone</div>
                                            <div class="col-lg-8 col-md-8">
                                                <?php echo isset($agent['number']) ? $agent['number'] : '' ?>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label" style="font-weight: bold;">Birthday</div>
                                            <div class="col-lg-8 col-md-8">
                                                <?php echo isset($agent['birthday']) ? date('M j, Y', strtotime($agent['birthday'])) : ''; ?>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label" style="font-weight: bold;">Adress</div>
                                            <div class="col-lg-8 col-md-8">
                                                <?= isset($agent['province']) ? $agent['province'] : '' ?>,
                                                <?= isset($agent['city']) ? $agent['city'] : '' ?>,
                                                <?= isset($agent['barangay']) ? $agent['barangay'] : '' ?>,
                                                <?= isset($agent['street']) ? $agent['street'] : '' ?>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-3 col-md-4 label" style="font-weight: bold;">Zip Code</div>
                                            <div class="col-lg-8 col-md-8">
                                            <?php echo isset ($agent['zipcode']) ? $agent['zipcode'] : '' ?>
                                            </div>
                                        </div>
                                    </div>                                   
                                    <div class="tab-pane fade" id="forms">
                                        <h1 class="h2 mb-0">Forms</h1>
                                        <div class="row text-center">
                                            <div class="col-lg-2 col-4 my-3">
                                                <a href="/ViewAppForm/<?= $agent['agent_token'] ?>">
                                                    <img src="<?= base_url(); ?>uploads/forms/life_changer.png"
                                                        class="card-img-top" alt="form">
                                                    LIFE
                                                </a>
                                            </div>
                                            <div class="col-lg-2 col-4 my-3">
                                                <a href="/ViewAppForm2/<?= $agent['agent_token'] ?>">
                                                    <img src="<?= base_url(); ?>uploads/forms/aial.png"
                                                        class="card-img-top" alt="AIAL">
                                                    AIAL
                                                </a>
                                            </div>
                                            <div class="col-lg-2 col-4 my-3">
                                                <a href="/ViewAppForm3/<?= $agent['agent_token'] ?>">
                                                    <img src=" <?= base_url(); ?>uploads/forms/grouplife.png"
                                                        class="card-img-top" alt="form">
                                                    GLI
                                                </a>
                                            </div>
                                            <div class="col-lg-2 col-4 my-3">
                                                <a href="/ViewAppForm4/<?= $agent['agent_token'] ?>">
                                                    <img src=" <?= base_url(); ?>uploads/forms/affidavit.png"
                                                        class="card-img-top" alt="form">
                                                    AONF
                                                </a>
                                            </div>
                                            <div class="col-lg-2 col-4 my-3">
                                                <a href="/ViewAppForm5/<?= $agent['agent_token'] ?>">
                                                    <img src=" <?= base_url(); ?>uploads/forms/statement.png"
                                                        class="card-img-top" alt="form">
                                                    SOU
                                                </a>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="tab-pane fade pt-3" id="files">
                                        <h1 class="h2 mb-0">Files</h1>
                                        <div class="row text-center">
                                        <?php
                                            // Array of file names
                                            $fileNames = [
                                                1 => 'TIN',
                                                2 => 'AofV',
                                                3 => 'SSS',
                                                4 => 'Valid ID',
                                                5 => 'Boss 3',
                                                6 => ''
                                            ];
                                            ?>
                                            <?php foreach (range(1, 6) as $i): ?>
                                                <?php if (isset($files["file$i"]) && $files["file$i"]): ?>
                                                    <?php
                                                    
                                                    // Determine the file type for icon
                                                    $filePath = base_url('uploads/files/' . $username . '/' . $files["file$i"]);
                                                    $fileExt = pathinfo($files["file$i"], PATHINFO_EXTENSION);
                                                    $iconClass = 'fa-file'; // Default icon
                                            
                                                    // Set icon class based on file extension
                                                    if (in_array($fileExt, ['jpg', 'jpeg', 'png', 'gif'])) {
                                                        $iconClass = 'fa-file-image';
                                                    } elseif ($fileExt === 'pdf') {
                                                        $iconClass = 'fa-file-pdf';
                                                    } elseif (in_array($fileExt, ['doc', 'docx'])) {
                                                        $iconClass = 'fa-file-word';
                                                    } elseif (in_array($fileExt, ['ppt', 'pptx'])) {
                                                        $iconClass = 'fa-file-powerpoint';
                                                    }

                                                     // Determine the file name from the array, default to "File $i" if not set
                                                     $fileName = isset($fileNames[$i]) ? $fileNames[$i] : "File $i";
                                                    ?>
                                                    <div class="col-lg-2 col-4">
                                                        <div class="card">
                                                            <div class="card-body text-center">
                                                                <p class=""><?= $fileName ?></p>
                                                                <p class="card-text">
                                                                    <a href="<?= $filePath ?>" target="_blank">
                                                                        <i class="fas <?= $iconClass ?> fa-3x"></i>
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
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

    <!-- JAVASCRIPT FILES -->
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
                        downloadLink.download = '<?= $agent['username']?> referral qr-code.png';
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