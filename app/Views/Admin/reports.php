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
                <div class="title-group mb-3">
                    <h1 class="h2 mb-0">Reports</h1>
                </div>
                <div class="row">
                    <!-- left and right table columns -->
                    <div class="col-lg-6 mb-3">
                        <div class="card">
                            <div class="table-responsive mx-3">
                                <h5 class="card-title mt-3">Agents</h5>
                                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-hover">
                                        <thead class="table-light sticky-top">
                                            <tr>
                                                <th scope="col">User Name</th>
                                                <th scope="col">Birth Day</th>
                                                <th scope="col">Contact</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($agents as $agent): ?>
                                                <tr>
                                                    <td><?= $agent['username'] ?></td>
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
                                    <thead>
                                        <tr>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Birth Day</th>
                                            <th scope="col">Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($applicants as $applicant): ?>
                                            <tr>
                                                <td><?= $applicant['username'] ?></td>
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
                                                <th scope="col">rank</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col">No. of Reqruits</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($top as $topagent): ?>
                                                <tr>
                                                    <td><?= $topagent['rank'] ?></td>
                                                    <td><?= $topagent['username'] ?></td>
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
                                <h5 class="card-title mt-3">Top Recruiters</h5>
                                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-hover">
                                        <thead class="table-light sticky-top">
                                            <tr>
                                                <th scope="col">Top</th>
                                                <th scope="col">Rank</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col">Total Commi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($top_commi as $topagent): ?>
                                                <tr>
                                                    <td><?= $topagent['ranking'] ?></td>
                                                    <td><?= $topagent['rank'] ?></td>
                                                    <td><?= $topagent['username'] ?></td>
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
</body>

</html>