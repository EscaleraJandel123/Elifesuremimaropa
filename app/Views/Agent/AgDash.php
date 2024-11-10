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
                            <a class="nav-link active" aria-current="page" href="/AgDash">
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
                    <h1 class="h2 mb-0">Overview</h1>

                    <small class="text-muted">Hello
                        <?= isset($agent['username']) ? $agent['username'] : '' ?>, welcome back!
                    </small>
                </div>

                <div class="row">
                    <!-- left side columns -->
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 mb-3">
                                <div class="custom-block bg-white p-3">
                                    <div id="barChart"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mb-3">
                                <div class="custom-block bg-white p-3">
                                    <div id="yearlyComm"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12 mb-3">
                                <div class="custom-block bg-white p-3">
                                    <div id="subAgentChart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Prediction -->
                            <div class="col-lg-12 col-md-12 col-12 mb-3">
                                <div class="custom-block bg-white p-3">
                                    <div id="commissionPredictionChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end of left side -->

                    <!-- right side columns -->
                    <div class="col-lg-4">
                        <div class="col-lg-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <div class="text-center">
                                                <div class="qr-code-container mt-3 mb-3" id="qrCodeContainer">
                                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo base_url() ?>register/<?= $agent['AgentCode'] ?>"
                                                        alt="QR Code"
                                                        onclick="copyToClipboard('<?php echo base_url() ?>register/<?= $agent['AgentCode']; ?>')"
                                                        style="cursor: pointer;">
                                                </div>
                                                <button type="button" class="btn btn-dark" id="downloadButton">
                                                    <i class="bi bi-download"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <div class="card mb-3">
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <!-- Set max-width and max-height to constrain the image within the card body -->
                                            <div class="image-container"
                                                style="position: relative; max-width: 80%; max-height: 80%; overflow: hidden;">
                                                <?php
                                                $imageSrc = '/req/rank/bronze.png'; // Default image source
                                                switch ($ranking) {
                                                    case ($ranking >= 1 && $ranking <= 10):
                                                        $imageSrc = '/req/rank/bronze.png';
                                                        break;
                                                    case ($ranking >= 11 && $ranking <= 20):
                                                        $imageSrc = '/req/rank/silver.png';
                                                        break;
                                                    case ($ranking >= 21 && $ranking <= 30):
                                                        $imageSrc = '/req/rank/gold.png';
                                                        break;
                                                    case ($ranking >= 31 && $ranking <= 40):
                                                        $imageSrc = '/req/rank/diamond.png';
                                                        break;
                                                    default:
                                                        $imageSrc = '/req/rank/platinum.png';
                                                        break;
                                                }
                                                ?>
                                                <img src="<?= $imageSrc ?>" alt=""
                                                    style="width: 50%; height: 50%; transform: scale(3); display: block; margin: 0 auto;">
                                            </div>
                                            <h5 class="text-center mb-3"><?= $rankTitle ?> Rank</h5>
                                            <input type="text"
                                                value="<?php echo base_url() ?>register/<?= $agent['AgentCode'] ?>"
                                                id="myInput" style="display: none;">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12 col-sm-12">
                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <i class="fas fa-users fa-2x"></i>
                                            <small class="d-block mt-2">Sub Agents</small>
                                            <div class="fs-4 mt-2">
                                                <?= $ranking ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <i class="fas fa-users fa-2x"></i>
                                            <small class="d-block mt-2">Applicants</small>
                                            <div class="fs-4 mt-2">
                                                <?= $applicants ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <i class="fas fa-users fa-2x"></i>
                                            <small class="d-block mt-2">Clients</small>
                                            <div class="fs-4 mt-2">
                                                <?= $clients ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <i class="bi bi-cash-coin fa-2x"></i>
                                            <small class="d-block mt-1">Total Commissions</small>
                                            <div class="fs-7 mt-2">
                                                ₱ <?= number_format($totalcommi, 2, '.', ',') ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?= view('js') ?>
    <?= view('Charts/visuals') ?>

    <script>
        function copyToClipboard(agentCode) {
            // Create a temporary input to store the agent code for copying
            const tempInput = document.createElement("input");
            document.body.appendChild(tempInput);
            tempInput.value = agentCode;
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // For mobile devices
            document.execCommand("copy");
            document.body.removeChild(tempInput);

            // Show a tooltip or message to the user indicating the code was copied
            alert("Agent code copied to clipboard: " + agentCode);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const downloadButton = document.getElementById('downloadButton');
            const qrCodeImage = document.querySelector('#qrCodeContainer img');

            downloadButton.addEventListener('click', function () {
                fetch(qrCodeImage.src)
                    .then(response => response.blob())
                    .then(blob => {
                        const downloadLink = document.createElement('a');
                        downloadLink.href = URL.createObjectURL(blob);
                        downloadLink.download = '<?= $agent['username'] ?> referral qr-code.png';
                        downloadLink.click();
                    });
            });
        });
    </script>
</body>

</html>