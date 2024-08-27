<!DOCTYPE html>
<html lang="en">
<?= view('/Home/chop/head'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

<body>
    <?= view('/client/dashboard/topside'); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <!-- Left side columns -->
                                <div class="col-lg-8">
                                    <div class="row">
                                        <!-- Policy Information -->
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Policy Information</h5>
                                                    <p class="card-text">Policy Number:
                                                        <?= isset($client['applicationNo']) ? $client['applicationNo'] : '' ?>
                                                    </p>
                                                    <p class="card-text">Coverage: Comprehensive</p>
                                                    <a href="#" class="btn btn-primary">View Policy Details</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Claims Management -->
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Claims Management</h5>
                                                    <p class="card-text">Total Claims: 5</p>
                                                    <p class="card-text">Last Claim Status: In Progress</p>
                                                    <a href="#" class="btn btn-primary">View Claims</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Billing and Payment History -->
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="table-responsive">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Billing and Payment History</h5>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Amount Paid</th>
                                                                    <th scope="col">Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($history as $hist): ?>
                                                                    <tr>
                                                                        <td>₱
                                                                            <?= number_format($hist['amount_paid'], 2, '.', ',') ?>
                                                                        </td>
                                                                        <!-- Assuming plan name is retrieved from the join -->
                                                                        <td><?= date('M j, Y h:i A', strtotime($hist['created_at'])); ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach ?>
                                                            </tbody>
                                                        </table>
                                                        <a href="/history" class="btn btn-primary">View Payment
                                                            History</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Left side columns -->

                                <!-- Right side column -->
                                <div class="col-lg-4">
                                    <!-- Contact Information -->
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h5 class="card-title">Contact Information</h5>
                                            <p class="card-text">Phone:
                                                <?php echo isset($client['number']) ? $client['number'] : '' ?>
                                            </p>
                                            <p class="card-text">Email:
                                                <?php echo isset($client['email']) ? $client['email'] : '' ?>
                                            </p>

                                            <a href="/clientprofile" class="btn btn-primary">Update Contact</a>
                                        </div>
                                    </div>
                                    <!-- FAQs and Help Center -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Explore Our Amazing Plans!</h5>
                                            <p class="card-text">Discover the perfect plan tailored just for you.</p>
                                            <a href="/viewplans" class="btn btn-primary">View Plans</a>
                                        </div>
                                    </div>
                                </div><!-- End Right side column -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </div>
                </div><!-- End Left side columns -->
                <!-- Right side columns -->
                <div class="col-lg-4">
                <div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-body">
            <?php if (!empty($activeinsurances)): ?>
                <h5 class="card-title">My Insurance</h5>
                <?php foreach ($activeinsurances as $insurance): ?>
                    <div class="image-container">
                        <img src="<?= base_url('/uploads/plans/' . $insurance['image']) ?>"
                            class="card-img-top img-fluid" alt="...">
                    </div>
                    <h6 class="title"><?= $insurance['plan_name'] ?></h6>
                    <?php if ($insurance['status'] == 'unpaid'): ?>
                        <h6 class="title">Status: Unpaid</h6>
                        <!-- Add other content related to unpaid status -->
                    <?php else: ?>
                        <h6 class="title">Due Date: <?= date('M j, Y', strtotime($insurance['duedate'])); ?></h6>
                        <!-- Add other content related to paid status -->
                    <?php endif; ?>
                    <hr>
                <?php endforeach; ?>
            <?php else: ?>
                <h5 class="card-title">No Active Insurance Available</h5>
                <p class="card-text">Click below to view available plans.</p>
                <a href="/viewplans" class="btn btn-primary">View Plans</a>
            <?php endif; ?>
        </div>
    </div>
</div>

                </div><!-- End Right side columns -->
            </div>
        </section>
    </main><!-- End #main -->
</body>
<?= view('/Home/chop/jsh'); ?>