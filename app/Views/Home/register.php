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

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="/" class="logo d-flex align-items-center w-auto">
                <img src="<?= base_url() ?>req/allianzlogo1.png" alt="">
                <span class="d-none d-lg-block">ALLIANZ PNB</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-6">

              <div class="card-body">

                <?php if (session()->getFlashdata('error')): ?>
                  <div class="alert alert-danger mt-3" role="alert">
                    <?= session()->getFlashdata('error') ?>
                  </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')): ?>
                  <div class="alert alert-success mt-3" role="alert">
                    <?= session()->getFlashdata('success') ?>
                  </div>
                <?php endif; ?>

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                  <p class="text-center">Enter your personal details to create account</p>
                </div>

                <form class="row g-3 needs-validation" novalidate method="post" action="/Authreg/<?= $ref ?>"
                  onsubmit="return confirmSubmit()">

                  <div class="col-md-4 col-4">
                    <label for="lastname" class="form-label">Last Name</label>
                    <div class="input-group has-validation">
                      <input type="text" name="lastname" class="form-control " id="lastname" required>
                      <div class="invalid-feedback">Please Enter your Last Name!</div>
                    </div>
                  </div>

                  <input type="hidden" name="role" class="form-control " id="role" value="applicant">

                  <div class="col-md-5 col-5">
                    <label for="firstname" class="form-label">First Name</label>
                    <div class="input-group has-validation">
                      <input type="text" name="firstname" class="form-control " id="firstname" required>
                      <div class="invalid-feedback">Please Enter your First Name!</div>
                    </div>
                  </div>

                  <div class="col-md-3 col-3">
                    <label for="middlename" class="form-label">Initial</label>
                    <div class="input-group has-validation">
                      <input type="text" name="middlename" class="form-control" id="middlename"
                        pattern="[a-z]" maxlength="1" required>
                      <div class="invalid-feedback">Please enter your Middle Initial!</div>
                    </div>
                  </div>

                  <div class="col-md-6 col-6">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <input type="text" name="username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please Enter your username!</div>
                    </div>
                  </div>

                  <div class="col-md-6 col-6">
                    <label for="number" class="form-label">Number</label>
                    <input type="tel" name="number" class="form-control" id="number" maxlength="11"
                      pattern="^(\+639|09)\d{9}$" inputmode="numeric" required>
                    <div class="invalid-feedback">Please enter a valid number!</div>
                  </div>

                  <div class="col-md-12 col-12">
                    <label for="yourEmail" class="form-label">Your Email</label>
                    <input type="email" name="email" class="form-control " id="yourEmail" required>
                    <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                  </div>

                  <div class="col-md-6 col-6">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword"
                      pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" required>
                    <div class="invalid-feedback">Password must be at least 8 characters long and include an uppercase
                      letter, a lowercase letter, a number, and a special character.</div>
                  </div>

                  <div class="col-md-6 col-6">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="confirmpassword" class="form-control" id="confirmPassword" required>
                    <div class="invalid-feedback">Please confirm your password!</div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-check">
                      <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                      <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="/terms">terms
                          and
                          conditions</a></label>
                      <div class="invalid-feedback">You must agree before submitting.</div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button class="btn btn-primary w-100" type="submit" onclick="showConfirmation()">Create
                      Account</button>
                  </div>
                  <div class="col-md-12">
                    <p class="mb-0">Already have an account? <a href="/login">Log in</a></p>
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
  document.getElementById('confirmPassword').addEventListener('input', function () {
    const password = document.getElementById('yourPassword').value;
    const confirmPassword = this.value;

    if (password !== confirmPassword) {
      this.setCustomValidity('Passwords do not match!');
    } else {
      this.setCustomValidity('');
    }
  });

</script>
</body>

</html>