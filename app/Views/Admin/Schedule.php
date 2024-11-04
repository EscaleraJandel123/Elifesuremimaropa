<?php require_once ('db.php') ?>
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
                            <a class="nav-link active" aria-current="page" href="/sched">
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
                    <h1 class="h2 mb-0">Schedule</h1>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card mb-3"
                                    style="background-color: #f8f9fa; border: 1px solid #dee2e6; border-radius: 5px;">
                                    <div class="card-body text-center">
                                        <h4 style="color: #007bff;">
                                            <?= isset($schedules) ? 'Edit Schedule' : 'Create Schedule' ?>
                                        </h4>
                                        <form method="post" action="<?= base_url('sched/schedsave') ?>">
                                            <?= csrf_field() ?>
                                            <label for="title" style="color: #495057;">Title:</label><br>
                                            <input type="text" class="form-control text-center" id="title" name="title"
                                                value="<?= isset($schedules['title']) ? $schedules['title'] : '' ?>"><br>
                                            <label for="description" style="color: #495057;">Description:</label><br>
                                            <textarea id="description" class="form-control text-center"
                                                name="description"
                                                style="width: 100%; padding: 5px; margin-bottom: 10px;"><?= isset($schedules['description']) ? $schedules['description'] : '' ?></textarea><br>
                                            <label for="start_datetime" style="color: #495057;">Start Date:</label><br>
                                            <input type="datetime-local" class="form-control text-center"
                                                id="start_datetime" name="start_datetime"
                                                value="<?= isset($schedules['start_datetime']) ? $schedules['start_datetime'] : '' ?>"><br>
                                            <label for="end_datetime" style="color: #495057;">End Date:</label><br>
                                            <input type="datetime-local" class="form-control text-center"
                                                id="end_datetime" name="end_datetime"
                                                value="<?= isset($schedules['end_datetime']) ? $schedules['end_datetime'] : '' ?>"><br><br>
                                            <button type="submit"
                                                style="background-color: #28a745; color: #fff; border: none; padding: 8px 20px; border-radius: 3px;"><?= isset($schedules) ? 'Update' : 'Save' ?></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Table with hoverable rows -->
                                        <div class="table-responsive">
                                            <table class="account-table table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Start Date</th>
                                                        <th scope="col">End Date</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <?php foreach ($schedules as $schedule): ?>
                                                            <td scope="row"><?= esc($schedule['title']) ?></td>
                                                            <td scope="row"><?= esc($schedule['description']) ?></td>
                                                            <td scope="row">
                                                                <?= date('M j, Y', strtotime($schedule['start_datetime'])) ?><br><?= date('h:i A', strtotime($schedule['start_datetime'])) ?>
                                                            </td>
                                                            <td scope="row">
                                                                <?= date('M j, Y', strtotime($schedule['end_datetime'])) ?><br><?= date('h:i A', strtotime($schedule['end_datetime'])) ?>
                                                            </td>
                                                            <td scope="row">w
                                                                <a class="badge text-bg-primary"
                                                                    href="<?= site_url('sched/edit/' . $schedule['id']) ?>">Edit</a>
                                                                |
                                                                <a class="badge text-bg-danger"
                                                                    href="<?= site_url('schedule/delete/' . $schedule['id']) ?>"
                                                                    onclick="return confirm('Are you sure?')">Delete</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <!-- End Table with hoverable rows -->
                                        </div>
                                    </div>
                                </div><br><br>

                                <div class="card"
                                    style="width: 100%; max-width: 1000px; margin: 0 auto; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px;">
                                    <div class="card-body" style="padding: 20px;">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br><br>
                </div>
            </main>
        </div>
    </div>

    <?= view('js'); ?>
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