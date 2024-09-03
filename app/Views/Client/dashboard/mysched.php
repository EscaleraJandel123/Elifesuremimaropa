<!DOCTYPE html>
<html lang="en">
<?= view('/Home/chop/head'); ?>

<body>
    <?= view('/Client/dashboard/topside'); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>My Schedules</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="ClientPage">Home</a></li>
                    <li class="breadcrumb-item">My Schedules</li>
                    <!-- <li class="breadcrumb-item active">Profile</li> -->
                </ol>
            </nav>
        </div><!-- End Page Title -->
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

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h5 class="card-title">My Schedules</h5> -->
                            <!-- Default Table -->
                            <div class="table-responsive pt-3">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date Schedule</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Meeting Type</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Created</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($schedule as $sched): ?>
                                        <tr>
                                            <td><?= date('M j, Y', strtotime($sched['selected_date'])); ?></td>
                                            <td><?= date('h:i A', strtotime($sched['schedule_time'])) ?></td>
                                            <td><?= $sched['meeting_type'] ?></td>
                                            <td><?= $sched['status'] ?></td>
                                            <td><?= date('M j, Y', strtotime($sched['created_at'])); ?></td>

                                            <?php if ($sched['status'] == 'pending'): ?>
                                            <td>
                                                <a href="#" data-bs-toggle="modal" class="btn btn-outline-primary"
                                                    data-bs-target="#dat<?= $sched['plan'] ?>"><i
                                                        class="ri-eye-line"></i>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" class="btn btn-outline-secondary"
                                                    data-bs-target="#edit<?= $sched['id'] ?>"><i
                                                        class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="<?= base_url('delsched/' . base64_encode($sched['id'])) ?>"
                                                    class="btn btn-outline-danger"
                                                    onclick="return confirm('Are you sure you want to remove this Schedule?');">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                            <?php else: ?>
                                            <td>
                                                <a href="#" data-bs-toggle="modal" class="btn btn-outline-primary"
                                                    data-bs-target="#dat<?= $sched['plan'] ?>"><i
                                                        class="ri-eye-line"></i>
                                                </a>
                                            </td>
                                            <?php endif; ?>
                                        </tr>
                                        <div class="modal fade" id="edit<?= $sched['id'] ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Schedule
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Your registration form goes here -->
                                                        <form action="/upsched" method="post" role="form"
                                                            enctype="multipart/form-data">
                                                            <div class="mb-1">
                                                                <label for="selected_date" class="form-label">Date
                                                                    Schedule</label>
                                                                <input type="date" class="form-control"
                                                                    id="selected_date" name="selected_date"
                                                                    value="<?= isset($sched['selected_date']) ? date('Y-m-d', strtotime($sched['selected_date'])) : '' ?>"
                                                                    required>
                                                            </div>

                                                            <div class="mb-1">
                                                                <label for="schedule_time" class="form-label">Brief
                                                                    Description</label>
                                                                <input type="time" class="form-control"
                                                                    id="schedule_time" name="schedule_time" required
                                                                    value="<?= isset($sched['schedule_time']) ? date('H:i', strtotime($sched['schedule_time'])) : '' ?>">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label" for="meeting_type">Type of
                                                                    Meeting</label>
                                                                <select class="form-select form-control"
                                                                    id="meeting-type" name="meeting_type" required>
                                                                    <option value="">Type of meeting...</option>
                                                                    <option value="phone-call"
                                                                        <?php echo $sched['meeting_type'] === 'phone-call' ? 'selected' : ''; ?>>
                                                                        Phone Call</option>
                                                                    <option value="office-meeting"
                                                                        <?php echo $sched['meeting_type'] === 'office-meeting' ? 'selected' : ''; ?>>
                                                                        Meeting in Office</option>
                                                                    <option value="zoom"
                                                                        <?php echo $sched['meeting_type'] === 'zoom' ? 'selected' : ''; ?>>
                                                                        Zoom Meeting</option>
                                                                </select>
                                                            </div>
                                                            <input type="hidden" name="schedID"
                                                                value="<?= $sched['id'] ?>">

                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                            <?php foreach ($plan as $plans): ?>
                            <div class="modal fade" id="dat<?= $plans['token'] ?>" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><?= $plans['plan_name'] ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <?php foreach ($agent as $agents): ?>
                                        <?php if (isset($agents['agent_id']) && isset($sched['agent']) && $agents['agent_id'] == $sched['agent']): ?>
                                        <div class="modal-body text-lg">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="card">
                                                        <div
                                                            class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                                            <img src="<?= isset($agents['agentprofile']) ? base_url('/uploads/' . $agents['agentprofile']) : '' ?>"
                                                                alt="Profile" class="rounded-circle"
                                                                style=" width: 150px; height: 150px;object-fit: cover; border-radius: 50%; ">
                                                            <h2><?= isset($agents['username']) ? $agents['username'] : '' ?>
                                                            </h2>
                                                            <h4>Agent</h4>
                                                            <div class="social-links mt-2">
                                                                <a href="#" class="twitter"><i
                                                                        class="bi bi-messenger"></i></a>
                                                                <a href="#" class="facebook"><i
                                                                        class="bi bi-facebook"></i></a>
                                                                <a href="#" class="gmail"><i
                                                                        class="bi bi-envelope"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-8">

                                                    <div class="card">
                                                        <div class="card-body pt-3">
                                                            <div class="tab-content pt-2">
                                                                <div class="tab-pane fade show active profile-overview">
                                                                    <h5 class="card-title">Plan</h5>
                                                                    <h3 class="modal-title">
                                                                        <?= $plans['plan_name'] ?>
                                                                    </h3>

                                                                    <h5 class="card-title">Agent Contact Details</h5>

                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 col-md-4 label ">Full
                                                                            Name
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            <?php if (isset($agents['lastname']) && isset($agents['firstname']) && isset($agents['middlename'])): ?>
                                                                            <?= $agents['lastname'] ?>,
                                                                            <?= $agents['firstname'] ?>
                                                                            <?= $agents['middlename'] ?>.
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 col-md-4 label">
                                                                            Username
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            <?php echo isset($agents['username']) ? $agents['username'] : '' ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 col-md-4 label">Email
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            <?php echo isset($agents['email']) ? $agents['email'] : '' ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 col-md-4 label">Phone
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            <?php echo isset($agents['number']) ? $agents['number'] : '' ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 col-md-4 label">
                                                                            Birthday
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            <?= isset($agents['birthday']) ? date('M j, Y', strtotime($agents['birthday'])) : ''; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 col-md-4 label">Adress
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            <?= isset($agents['region']) ? $agents['region'] : '' ?>,
                                                                            <?= isset($agents['province']) ? $agents['province'] : '' ?>,
                                                                            <?= isset($agents['city']) ? $agents['city'] : '' ?>,
                                                                            <?= isset($agents['barangay']) ? $agents['barangay'] : '' ?>,
                                                                            <?= isset($agents['street']) ? $agents['street'] : '' ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

<?= view('/Home/chop/jsh'); ?>