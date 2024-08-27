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
                                    <img src="req/allianzlogo1.png" alt="">
                                    <span class="d-none d-lg-block">ALLIANZ PNB</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <!-- Add this section to display validation alerts -->
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

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Reset your Password</h5>
                                        <p class="text-center small">Enter your New Password & Confirm Password</p>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate method="post" action="/reset-password/<?= $pass_token ?>">
    <div class="col-12">
        <label for="newPassword" class="form-label">New Password</label>
        <input type="password" name="new_password" class="form-control" id="newPassword" required>
        <div class="invalid-feedback">Enter Your New Passowrd</div>
    </div>
    <div class="col-12">
        <label for="confirmNewPassword" class="form-label">Confirm New Password</label>
        <input type="password" name="confirm_new_password" class="form-control" id="confirmNewPassword" required>
        <div class="invalid-feedback">Confirm New Password</div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary w-100" type="submit">Reset Password</button>
    </div>
    <div class="col-12">
                    <p class="small mb-0">Go Back to <a href="/login">Log in</a></p>
                  </div>
</form>

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

<!-- <script>
    // Check if the session flash message is set
    <?php if (session()->has('success')): ?>
        // Display small popup with success message
        var successPopup = document.createElement('div');
        successPopup.className = 'popup text-center alert alert-success';
        successPopup.innerHTML = '<?= session('success') ?>';
        document.body.appendChild(successPopup);

        // Hide the success popup after a delay (adjust the delay as needed)
        setTimeout(function () {
            successPopup.style.display = 'none';
        }, 3000);
    <?php endif; ?>
</script> -->
