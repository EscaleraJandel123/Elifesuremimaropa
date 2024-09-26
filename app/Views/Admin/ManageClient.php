<!doctype html>
<html lang="en">
<?= view('head') ?>
<!-- Add this to your head section -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->

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
                            <a class="nav-link active" aria-current="page" href="/ManageClients">
                                <i class="fas fa-user-tie me-2"></i>
                                Clients
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/ManageAgent">
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
                    <h1 class="h2 mb-0">ALLIANZ PNB AGENTS</h1>
                </div>

                <div class="row my-4">
                    <div class="col-lg-12 col-12">
                        <div class="custom-block bg-white">

                            <form class="custom-form search-form" action="/agentSearch" method="post" role="form">
                                <div class="row">
                                    <div class="col-lg-4 col-8">
                                        <input class="form-control mb-lg-0 mb-md-0" name="filterAgent" type="text"
                                            placeholder="Search" aria-label="Search" required>
                                    </div>
                                    <div class="col-lg-1 col-4">
                                        <button type="submit" class="form-control">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <!-- <?php $encryption = \Config\Services::encrypter(); ?> -->
                            <div class="row row-cols-3">
                                <?php foreach ($clients as $client): ?>
                                    <div class="col-lg-2 col-md-4 mb-3">
                                        <div class="custom-block-profile-front text-center">
                                            <div class="custom-block-profile-image-wrap mb-1">
                                                <a href="/clientprofile/<?= $client['client_token']; ?>">
                                                    <img src="<?= isset($client['profile']) && !empty($client['profile']) ? base_url('/uploads/' . $client['profile']) : base_url('/uploads/def.png') ?>"
                                                        class="img-fluid" alt="" style="height: 100px; width: auto">
                                                </a>
                                            </div>
                                            <strong><?= $client['username']; ?></strong>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?= $pager->links('group1', 'page') ?>
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
    <?= view('js'); ?>
</body>

</html>