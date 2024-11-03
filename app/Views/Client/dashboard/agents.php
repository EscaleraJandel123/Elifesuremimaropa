<!DOCTYPE html>
<html lang="en">
<?= view('/Home/chop/head'); ?>

<body>
    <?= view('/Client/dashboard/topside'); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="ClientPage">Home</a></li>
                    <li class="breadcrumb-item">Plans</li>
                    <!-- <li class="breadcrumb-item active">Profile</li> -->
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6">
                    <div class="row row-cols-2">
                        <?Php foreach ($agent as $agents): ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                        <a href="<?= base_url('seeprofile/' . base64_encode($agents['agent_token'])) ?>"><img
                                                src="<?= isset($agents['agentprofile']) && !empty($agents['agentprofile']) ? base_url('/uploads/' . $agents['agentprofile']) : base_url('/uploads/def.png') ?>"
                                                alt="Profile" class="rounded-circle"></a>
                                        <h2><?php echo isset($agents['username']) ? $agents['username'] : '' ?></h2>
                                        <!-- <div class="social-links mt-2">
                                            <a href="#" class="twitter"><i class="bi bi-messenger"></i></a>
                                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                            <a href="#" class="gmail"><i class="bi bi-envelope"></i></a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        <?Php endforeach ?>
                    </div>
                    <?= $pager->links('group1', 'page') ?>
                </div>
            </div>
        </section>
    </main>
</body>
<?= view('/Home/chop/jsh'); ?>