<!DOCTYPE html>
<html lang="en">

<?= view('/Home/chop/head'); ?>

<body>

    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="/" class="logo d-flex align-items-center w-auto">
                                    <img src="req/allianzlogo1.png" alt="Allianz PNB Logo">
                                    <span class="d-none d-lg-block fs-5 fw-bold">ALLIANZ PNB</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Forgot Password</h5>
                                        <p class="text-center small">Enter your email address to reset your password</p>
                                    </div>
                                    <?php if (session()->has('error')): ?>
                                        <div class="alert alert-danger">
                                            <?= session('error') ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (session()->has('success')): ?>
                                        <div class="alert alert-success">
                                            <?= session('success') ?>
                                        </div>
                                    <?php endif; ?>
                                    <form method="post" action="/send-reset-link">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
                                    </form><br>
                                    <div class="col-12">
                                        <p class="small mb-0">Back to <a href="/login">Login</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?= view('/Home/chop/script'); ?>
</body>

</html>