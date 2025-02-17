<!DOCTYPE html>
<html lang="en">

<?= view('/Home/chop/head'); ?>

<style>
    main {
        font-size: 10pt;
    }

    .form-control {
        font-size: 10pt;
    }
</style>
<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="/" class="logo d-flex align-items-center w-auto">
                                <img src="req/allianzlogo1.png" alt="">
                                <span class="d-none d-lg-block">ALLIANZ PNB</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-6">

                            <div class="card-body">
                                <?php if (session()->has('errors')): ?>
                                    <div class="alert alert-danger mt-3 text-center" role="alert">
                                        <?php foreach (session('errors') as $error): ?>
                                            <?= $error ?><br>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    <p class="text-center">Enter your personal details to create account</p>
                                </div>

                                <form class="row g-3 needs-validation" novalidate method="post" action="/clientreg"
                                    onsubmit="return confirmSubmit()">

                                    <div class="col-md-4 col-4">
                                        <label for="lastname" class="form-label">Last Name</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="lastname" class="form-control " id="lastname"
                                                required>
                                            <div class="invalid-feedback">Please Enter Last Name!</div>
                                        </div>
                                    </div>

                                    <div class="col-md-5 col-5">
                                        <label for="firstname" class="form-label">First Name</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="firstname" class="form-control " id="firstname"
                                                required>
                                            <div class="invalid-feedback">Please Enter First Name!</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-3">
                                        <label for="middlename" class="form-label">Initial</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="middlename" class="form-control " id="middlename"
                                            pattern="[A-Z]" maxlength="1" required>
                                            <div class="invalid-feedback">Please enter your Middle Initial!(Caps)</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-6">
                                        <label for="username" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="username" class="form-control " id="username"
                                                required>
                                            <div class="invalid-feedback">Please Enter your username!</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-6">
                                        <label for="phone" class="form-label">Number</label>
                                        <input type="text" name="phone" class="form-control " id="phone" required>
                                        <div class="invalid-feedback">Please enter a valid number!</div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <label for="email" class="form-label">Your Email</label>
                                        <input type="email" name="email" class="form-control " id="email" required>
                                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                    </div>

                                    <div class="col-md-6 col-6">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control " id="yourPassword"
                                            required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>

                                    <div class="col-md-6 col-6">
                                        <label for="yourPassword" class="form-label">Confirm Password</label>
                                        <input type="password" name="confirmpassword" class="form-control "
                                            id="yourPassword" required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox" value=""
                                                id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">I agree and accept the 
                                                <a href="/terms">terms and
                                                    conditions</a></label>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary w-100" type="submit"
                                            onclick="showConfirmation()">Create
                                            Account</button>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mb-0">Already have an account? <a href="/login">Log in</a></p>
                                        <p class="small mb-0">Have You Forgot your password? <a
                                                href="/forgot">Forgot</a></p>
                                        <p class="small mb-0">Go back to <a href="/">Home</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main><!-- End #main -->

<!-- Vendor JS Files -->
<?= view('/Home/chop/script'); ?>
<!-- Template Main JS File -->

<script>
    function confirmSubmit() {
        return confirm("Are you sure you want Register?");
    }
</script>
</body>

</html>