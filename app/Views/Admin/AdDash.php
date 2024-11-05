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
                            <a class="nav-link active" aria-current="page" href="/AdDash">
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
                            <a class="nav-link " aria-current="page" href="/ManageClients">
                                <i class="fas fa-user-tie me-2"></i>
                                Clients
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
                            <a class="nav-link " aria-current="page" href="/reports">
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
                    <h1 class="h2 mb-0">Overview</h1>

                    <small class="text-muted">Hello
                        <?= $user['role'] ?>, welcome back!
                        <?= $admin['username'] ?>
                    </small>
                </div>

                <div class="row">
                    <!-- left side columns -->
                    <div class="col-lg-8 mb-3">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="custom-block bg-white">
                                    <div id="agentChart"></div>
                                </div>
                                <div class="custom-block bg-white">
                                    <div id="ApplicantChart"></div>
                                </div>
                                <div class="custom-block bg-white">
                                    <div id="ovmonthlycommi"></div>
                                </div>
                                <div class="custom-block bg-white">
                                    <div id="ovyearlyComm"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of left side -->

                    <!-- right side columns -->
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                

                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <i class="fas fa-users fa-2x"></i>
                                            <small class="d-block mt-2">Agents</small>
                                            <h3 class="card-title mt-2">
                                                <?= $totalAgents ?>
                                            </h3>
                                        </div>
                                    </div>


                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <i class="fas fa-user-tie fa-2x"></i>
                                            <small class="d-block mt-2">Applicants</small>
                                            <h3 class="card-title mt-2">
                                                <?= $pendingApplicants ?>
                                            </h3>
                                        </div>
                                    </div>
                                
                            </div>


                            <div class="col-lg-12 col-sm-12">
                                <div class="card mb-3 text-center">
                                    <h5 class="card-title mt-3">Top 3 Recruiters</h5>
                                    <?php foreach ($top as $topagent): ?>
                                        <div class="card-body">
                                            <a href="<?= base_url() ?>/agentprofile/<?= $topagent['agent_token']; ?>">
                                                <img src="<?= isset($topagent['agentprofile']) && !empty($topagent['agentprofile']) ? base_url('/uploads/' . $topagent['agentprofile']) : base_url('/uploads/def.png') ?>"
                                                    class="card-img-top img-fluid rounded-circle mx-auto" alt="Agent Image"
                                                    style="width: 80px; height: 80px;"></a>
                                            <h5 class="card-title mt-2 small">
                                                <?= $topagent['username'] ?>
                                                <!-- <?= $topagent['total_fA'] ?> -->
                                            </h5>
                                            <!-- Add other relevant information as needed -->
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="card mb-3 text-center">
                                    <h6 class="card-title mt-3">Top 3 Awardies</>
                                        <?php foreach ($top_commi as $topagent): ?>
                                            <div class="card-body">
                                                <a href="<?= base_url() ?>/agentprofile/<?= $topagent['agent_token']; ?>">
                                                    <img src="<?= isset($topagent['agentprofile']) && !empty($topagent['agentprofile']) ? base_url('/uploads/' . $topagent['agentprofile']) : base_url('/uploads/def.png') ?>"
                                                        class="card-img-top img-fluid rounded-circle mx-auto"
                                                        alt="Agent Image" style="width: 80px; height: 80px;"></a>
                                                <h5 class="card-title mt-2 small">
                                                    <?= $topagent['username'] ?>
                                                    <!-- <?= number_format($topagent['total_commissions']) ?> -->
                                                </h5>
                                                <!-- Add other relevant information as needed -->
                                            </div>
                                        <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?= view('js'); ?>
    <?= view('Charts/visuals') ?>
</body>

</html>