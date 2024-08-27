<!DOCTYPE html>
<html lang="en">

<?= view('Home/chop1/head') ?>

<body>

<?= view('Home/chop1/header') ?>

    <div class="page-banner-area">
        <div class="container">
            <div class="single-page-banner-content">
                <h1>Services</h1>
                <ul>
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="services-three-area pt-100 pb-100">
        <div class="container">
            <div class="section-title">
                <span class="top-title">Our Offers</span>
                <h2>Find the right insurance plan for you!</h2>
            </div>
            <div class="row">
                <?php foreach ($plan as $plans): ?>
                    <div class="col-lg-4 col-sm-6 col-md-6">
                        <div class="services-three-card services-page-card">
                            <div class="services-card d-flex align-items-center">
                                <div class="services-icon">
                                    <img src="<?= isset($plans['image']) ? base_url('/uploads/plans/' . $plans['image']) : '' ?>"
                                        alt="<?= $plans['plan_name'] ?>">
                                </div>
                                <h3><a href="#"><?= $plans['plan_name'] ?></a></h3>
                            </div>
                            <p><?= isset($plans['description']) ? $plans['description'] : ''; ?></p>
                            <a href="<?= base_url() ?>ServiceDescription/<?= $plans['token'] ?>" class="default-btn">Read
                                More</a>
                        </div>
                    </div>
                <?php endforeach ?>
                <?= $pager->links('plan', 'clientpage') ?>
            </div>
        </div>
        <?= view('Home/chop1/footer') ?>
	<?= view('Home/chop1/js') ?>
</body>

</html>