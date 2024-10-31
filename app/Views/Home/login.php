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
                        <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="/" class="logo d-flex align-items-center w-auto">
                                    <img src="<?= base_url() ?>req/allianzlogo1.png" alt="">
                                    <span class="d-none d-lg-block">ALLIANZ PNB MIMAROPA</span>
                                </a>
                            </div><!-- End Logo -->
                            <div class="card mb-3 small">

                                <div class="card-body">

                                    <!-- Add this section to display validation alerts -->
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

                                    <?php if (session()->getFlashdata('warning')): ?>
                                        <div class="alert alert-warning mt-3 text-center" role="alert">
                                            <?= session()->getFlashdata('warning') ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your email & password to login</p>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate method="post" action="/authlog"
                                        onsubmit="return confirmSubmit()">

                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="email" class="form-control" id="email"
                                                    required>
                                                <div class="invalid-feedback">Please enter your email.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit"
                                                onclick="showConfirmation()">Login</button>
                                            <br><br>
                                            <p class="small mb-0">Don't have an account? <a
                                                    href="/ClientRegister">Create an
                                                    account</a></p>
                                            <p class="small mb-0">Have You Forgot your password? <a
                                                    href="/forgot">Forgot</a></p>
                                            <p class="small mb-0">Go back to <a
                                                    href="/">Home</a></p>
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
    <!-- Add this script to show the modal -->

    <?= view('/Home/chop/script'); ?>
    <script>
        function confirmSubmit() {
            return confirm("Are you sure you want to LogIn?");
        }
    </script>
    <!-- <script>
        function showOfflineModal() {
            const modal = document.getElementById('offline-modal');
            modal.style.display = 'block';
        }

        function hideOfflineModal() {
            const modal = document.getElementById('offline-modal');
            modal.style.display = 'none';
        }

        function checkOnlineStatus() {
            if (!navigator.onLine) {
                showOfflineModal();
            } else {
                hideOfflineModal();
            }
        }

        window.addEventListener('online', checkOnlineStatus);
        window.addEventListener('offline', checkOnlineStatus);

        document.addEventListener('DOMContentLoaded', checkOnlineStatus);

    </script> -->
</body>

</html>