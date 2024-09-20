<!doctype html>
<html lang="en">

<?= view('head') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    .table-responsive {
        position: relative;
    }

    .table thead.sticky-top {
        top: 5px;
        /* Adjust based on the height of the header or navbar */
        z-index: 1;
        /* Ensure it's below other important components */
    }
</style>

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
                            <a class="nav-link active" aria-current="page" href="/reports">
                                <i class="fas fa-file-alt me-2"></i></i>
                                Reports
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/map">
                                <i class="bi bi-map me-2"></i>
                                Maps
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
                <div class="title-group mb-3 d-flex justify-content-between align-items-center">
                    <h1 class="h2 mb-0">Reports</h1>
                    <a href="#" class="btn btn-primary" onclick="generatePdf()">Generate Report</a>
                </div>
                <div class="row"  id="page">
                    <!-- left and right table columns -->
                    <div class="col-lg-6 mb-3">
                        <div class="card">
                            <div class="table-responsive mx-3">
                                <h5 class="card-title mt-3">Agents</h5>
                                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-hover">
                                        <thead class="table-light sticky-top">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Birth Day</th>
                                                <th scope="col">Contact</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($agents as $agent): ?>
                                                <tr>
                                                    <td><?= $agent['lastname'] ?>, <?= $agent['firstname'] ?>
                                                        <?= $agent['middlename'] ?>.
                                                    </td>
                                                    <td><?= $agent['birthday'] ?></td>
                                                    <td><?= $agent['number'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Applicants Table -->
                    <div class="col-lg-6 mb-3">
                        <div class="card">
                            <div class="table-responsive mx-3">
                                <h5 class="card-title mt-3">Applicants</h5>
                                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;"></div>
                                <table class="table table-hover">
                                    <thead class="table-light sticky-top">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Birth Day</th>
                                            <th scope="col">Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($applicants as $applicant): ?>
                                            <tr>
                                                <td><?= $applicant['lastname'] ?>, <?= $applicant['firstname'] ?>
                                                    <?= $applicant['middlename'] ?>.
                                                </td>
                                                <td><?= $applicant['birthday'] ?></td>
                                                <td><?= $applicant['number'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Top Reqruiters  -->
                    <div class="col-lg-6 mb-3">
                        <div class="card">
                            <div class="table-responsive mx-3">
                                <h5 class="card-title mt-3">Top Recruiters</h5>
                                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-hover">
                                        <thead class="table-light sticky-top">
                                            <tr>
                                                <th scope="col">Rank</th>
                                                <th scope="col">Top</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">No. of Reqruits</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($top as $topagent): ?>
                                                <tr>
                                                    <td><?= $topagent['rank'] ?></td>
                                                    <td><?= $topagent['ranking'] ?></td>
                                                    <td><?= $topagent['lastname'] ?>, <?= $topagent['firstname'] ?>
                                                        <?= $topagent['middlename'] ?>.
                                                    </td>
                                                    <td><?= $topagent['total_fA'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- top commissioner -->
                    <div class="col-lg-6 mb-3">
                        <div class="card">
                            <div class="table-responsive mx-3">
                                <h5 class="card-title mt-3">Awardee</h5>
                                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-hover">
                                        <thead class="table-light sticky-top">
                                            <tr>
                                                <th scope="col">Top</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Total Commi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($top_commi as $topagent): ?>
                                                <tr>
                                                    <td><?= $topagent['ranking'] ?></td>
                                                    <td><?= $topagent['lastname'] ?>, <?= $topagent['firstname'] ?>
                                                        <?= $topagent['middlename'] ?>.
                                                    </td>
                                                    <td><?= number_format($topagent['total_commissions']) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?= view('js'); ?>
    <script>
        window.jsPDF = window.jspdf.jsPDF;
    function generatePdf() {
    let jsPdf = new jsPDF('p', 'pt', 'a4');
    var htmlElement = document.getElementById('page');
    // you need to load html2canvas (and dompurify if you pass a string to html)
    const opt = {
        callback: function (jsPdf) {
            // jsPdf.save("Life Changer_<?= isset($lifechangerform['user_id']) ? $lifechangerform['user_id'] : '' ?>.pdf");
            // to open the generated PDF in browser window
            window.open(jsPdf.output('bloburl'));
        },
        // margin: [72, 0, 72, 0],
        // autoPaging: 'text',
        // margin: { top: 0, right: 0, bottom: 0.5, left: 0 },
        autoPaging: true, // Enable auto pagination
        html2canvas: {
            allowTaint: true,
            dpi: 300,
            letterRendering: true,
            logging: false,
            scale: .75
        }
    };

    jsPdf.html(htmlElement, opt);
    }
    </script>
</body>

</html>