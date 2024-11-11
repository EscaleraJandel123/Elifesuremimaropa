<!doctype html>
<html lang="en">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js'></script>
<?= view('head') ?>

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
                            <a class="nav-link active" href="/cliSched">
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
                    <h1 class="h2 mb-0">My Schedules</h1>
                </div>
                <div class="card">
                    <div class="card-body">
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger mt-3 text-center" role="alert">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success mt-3 text-center" role="alert">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>
                        <!-- <h5 class="card-title">My Schedules</h5> -->
                        <!-- Default Tabs -->

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="cliSched"
                                    class="nav-link <?= $class == 'Awaiting' ? 'active' : ''; ?>">Awaiting</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="inprog" class="nav-link <?= $class == 'In Progress' ? 'active' : ''; ?>">In
                                    Progress</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="comp"
                                    class="nav-link <?= $class == 'Completed' ? 'active' : ''; ?>">Completed</a>
                            </li>
                        </ul>

                        <div class="table-responsive">
                            <h6 class="card-title mx-2"><?= $status ?></h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Date Schedule</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Meeting Type</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($schedule as $sched): ?>
                                        <?php
                                        $status = $sched['status'];
                                        $prog = $sched['status'];
                                        $showCheckLink = $status == 'pending';
                                        $showAdd = $prog == 'inprogress';
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $sched['username'] ?></td>
                                                <td><?= date('M j, Y', strtotime($sched['selected_date'])); ?></td>
                                                <td><?= date('h:i A', strtotime($sched['schedule_time'])) ?></td>
                                                <td><?= $sched['meeting_type'] ?></td>
                                                <td>
                                                    <a data-bs-toggle="modal" data-bs-target="#detail<?= $sched['id'] ?>"
                                                        class="btn btn-success">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <?php if ($showCheckLink): ?>
                                                        <a href="<?= base_url('con/' . base64_encode($sched['id'])) ?>"
                                                            class="btn btn-info"
                                                            onclick="return confirm('Are you sure you want to Confirm?');">
                                                            <i class="fas fa-check"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($showAdd): ?>
                                                        <a data-bs-toggle="modal"
                                                            data-bs-target="#typeofpayment<?= $sched['id'] ?>"
                                                            class="btn btn-info">
                                                            <i class="bi bi-send"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <div class="modal fade" id="typeofpayment<?= $sched['id'] ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Plan Due Dates</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Your registration form goes here -->
                                                        <form action="compost" method="post" role="form"
                                                            enctype="multipart/form-data">
                                                            <div class="mb-2">
                                                                <select class="form-select" name="typeofpayment"
                                                                    aria-label="Default select example" required>
                                                                    <option value="" selected>Select</option>
                                                                    <option value="Annual">Annual</option>
                                                                    <option value="Semi-Annual">Semi-Annual</option>
                                                                    <option value="Quarterly">Quarterly</option>
                                                                    <option value="Monthly">Monthly</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="term" class="form-label">Insurance
                                                                    Term</label>
                                                                <input type="number" class="form-control" id="term"
                                                                    name="term" placeholder="ex. 10y" required>
                                                            </div>

                                                            <div class="mb-2">
                                                                <label for="receipt" class="form-label">Receipt</label>
                                                                <input type="file" class="form-control" id="receipt"
                                                                    name="receipt" placeholder="ex. 10y" required>
                                                            </div>

                                                            <input type="hidden" name="schedId" value="<?= $sched['id'] ?>">
                                                            <input type="hidden" name="username"
                                                                value="<?= $sched['username'] ?>">
                                                            <input type="hidden" name="plan" value="<?= $sched['plan'] ?>">
                                                            <input type="hidden" name="email"
                                                                value="<?= $sched['email'] ?>">
                                                            <input type="hidden" name="agent"
                                                                value="<?= $sched['agent'] ?>">
                                                            <input type="hidden" name="client_id"
                                                                value="<?= $sched['client_id'] ?>">
                                                            <input type="hidden" name="applicationNo"
                                                                value="<?= $sched['applicationNo'] ?>">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </table>
                        </div>
                    </div>
                </div>

                <?php foreach ($schedule as $sched): ?>
                    <div class="modal fade" id="detail<?= $sched['id'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <?php foreach ($plans as $plan): ?>
                                        <?php if (isset($plan['token']) && isset($sched['plan']) && $plan['token'] == $sched['plan']): ?>
                                            <h5 class="modal-title"><?= $plan['plan_name'] ?></h5>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <?php foreach ($client as $cli): ?>
                                    <?php if (isset($cli['client_id']) && isset($sched['client_id']) && $cli['client_id'] == $sched['client_id']): ?>
                                        <div class="modal-body text-lg">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="card">
                                                        <div
                                                            class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                                            <img src="<?= isset($cli['profile']) ? base_url('/uploads/' . $cli['profile']) : '' ?>"
                                                                alt="Profile" class="rounded-circle"
                                                                style=" width: 130px; height: 130px; object-fit: cover; border-radius: 50%; ">
                                                            <h4><?= isset($cli['username']) ? $cli['username'] : '' ?>
                                                            </h4>
                                                            <!-- <h6>Client</h6>
                                                            <div class="social-links mt-2">
                                                                <a href="#" class="twitter"><i class="bi bi-messenger"></i></a>
                                                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                                                <a href="#" class="gmail"><i class="bi bi-envelope"></i></a>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-8">
                                                    <div class="card">
                                                        <div class="card-body pt-3">
                                                            <div class="tab-content pt-2">
                                                                <div class="tab-pane fade show active profile-overview">
                                                                    <h5 class="card-title">Client Contact Details</h5>
                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 col-md-4 label ">Full
                                                                            Name
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            <?php if (isset($cli['lastName']) && isset($cli['firstName']) && isset($cli['middleName'])): ?>
                                                                                <?= $cli['lastName'] ?>,
                                                                                <?= $cli['firstName'] ?>
                                                                                <?= $cli['middleName'] ?>.
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 col-md-4 label">Email
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            <?php echo isset($cli['email']) ? $cli['email'] : '' ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 col-md-4 label">Phone
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            <?php echo isset($cli['number']) ? $cli['number'] : '' ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </main>
        </div>
    </div>
    <?= view('js'); ?>
</body>
<script>
    function submitForm(formId) {
        var form = document.getElementById(formId);
        form.submit();
    }
</script>

</html>