<?php require_once ('db.php') ?>
<!doctype html>
<html lang="en">
<?= view('head') ?>

<?= view('Admin/chop/head') ?>


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
                            <a class="nav-link active" href="/agentsched">
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
                    <h1 class="h2 mb-0">Schedule</h1>
                </div>

                <div class="row">
                    <div class="col-lg-15">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="calendar" ></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br><br>
                </div>
            </main>
        </div>
    </div>


    <?= view('Admin/chop/js'); ?>
    <script>
        // JavaScript to toggle password visibility
        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('confirmpassword');
        const showPasswordToggle = document.getElementById('showPasswordToggle');
        const showConfirmPasswordToggle = document.getElementById('showConfirmPasswordToggle');

        function togglePasswordVisibility(input, toggleButton) {
            const type = input.type === 'password' ? 'text' : 'password';
            input.type = type;
            toggleButton.innerHTML = type === 'text' ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
        }

        showPasswordToggle.addEventListener('click', function () {
            togglePasswordVisibility(passwordInput, showPasswordToggle);
        });

        showConfirmPasswordToggle.addEventListener('click', function () {
            togglePasswordVisibility(confirmInput, showConfirmPasswordToggle);
        });
    </script>


    <?php
    $schedules = $conn->query("SELECT * FROM `schedules`");
    $sched_res = [];
    foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
        $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
        $row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
        $sched_res[$row['id']] = $row;
    }
    ?>
    <?php
    if (isset($conn))
        $conn->close();
    ?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="<?= base_url(); ?>req/js/script.js"></script>

</html>