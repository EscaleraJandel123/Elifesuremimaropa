<!DOCTYPE html>
<html lang="en">

<?= view('Home/chop1/head') ?>

<!-- <body style="background-image: url('client/assets/images/allbg.png');background-size: 1000px;background-repeat: repeat;"> -->
<body>

<?= view('Home/chop1/header') ?>

    <div class="page-banner-area portfolio-page-area">
        <div class="container">
            <div class="single-page-banner-content">
                <h1>Coming Soon</h1>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Coming Soon</li>
                    </ul>
            </div>
        </div>
    </div>

    <div class="coming-soon-area pt-100 pb-100">
        <div class="container">
            <div class="coming-soon-content">
                <h2>We Are Launching Soon</h2>
                <p>Allianz PNB Life kicks off nationwide caravan for AZpire Growth to PNB</p>
                <div id="timer">
                <div id="days"></div>
                <div id="hours"></div>
                <div id="minutes"></div>
                <div id="seconds"></div>
            </div>
                <form class="newsletter-form" data-toggle="validator">
                    <input type="email" class="form-control" placeholder="Your email address" name="EMAIL" required autocomplete="off">
                        <button class="default-btn" type="submit">
                        Subscribe Now<i class="ri-arrow-right-line"></i>
                        </button>
                    <div id="validator-newsletter" class="form-result"></div>
                </form>
            </div>
        </div>
    </div>

	<?= view('Home/chop1/footer') ?>
	<?= view('Home/chop1/js') ?>

</body>
</html>
