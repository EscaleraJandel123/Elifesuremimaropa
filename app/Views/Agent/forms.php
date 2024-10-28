<!doctype html>
<html lang="en">
<?= view('head'); ?>
<style>
    .card {
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .card:hover {
        transform: scale(1.05);
    }
</style>

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
                            <a class="nav-link active" aria-current="page" href="/AgForms">
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
                    <h1 class="h2 mb-0">Application Forms</h1>
                </div>

                <div class="row justify-content-center m-2">
                    <div class="col-lg-12">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <h6>Life Changer</h6>
                                        <a href="AgForm1">
                                            <img src="uploads/forms/life_changer.png" class="card-img img-fluid" alt="Life Changer">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <h6>AIAL</h6>
                                        <a href="AgForm2">
                                            <img src="uploads/forms/aial.png" class="card-img img-fluid" alt="AIAL">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <h6>Group Life Insurance</h6>
                                        <a href="AgForm3">
                                            <img src="uploads/forms/grouplife.png" class="card-img img-fluid" alt="Group Life Insurance">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <h6>Affidavit of Non Filing</h6>
                                        <a href="AgForm4">
                                            <img src="uploads/forms/affidavit.png" class="card-img img-fluid" alt="Affidavit of Non Filing">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <h6>Statement of Undertaking</h6>
                                        <a href="AgForm5">
                                            <img src="uploads/forms/statement.png" class="card-img img-fluid" alt="Statement of Undertaking">
                                        </a>
                                    </div>
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