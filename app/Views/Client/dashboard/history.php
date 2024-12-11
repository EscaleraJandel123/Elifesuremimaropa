<!DOCTYPE html>
<html lang="en">
<?= view('/Home/chop/head'); ?>

<body>
  <?= view('/Client/dashboard/topside'); ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Payment History</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card">
            <div class="table-responsive pt-3">
              <div class="card-body">
                <h5 class="card-title">Payment History</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">Year</th>
                      <th scope="col">Month</th>
                      <th scope="col">Amount Paid</th>
                      <th scope="col">Remarks</th>
                      <th scope="col">Receipt</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($myplan as $payment): ?>
                      <tr>
                        <td><?= date('Y', strtotime($payment['created_at'])); ?></td>
                        <td><?= date('M', strtotime($payment['created_at'])); ?></td>
                        <td>₱ <?= number_format($payment['amount_paid'], 2, '.', ',') ?></td>
                        <td>Paid</td>
                        <td>
                          <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#receipt<?= $payment['id'] ?>">
                            <i class="bi bi-receipt"></i>
                          </a>
                        </td>
                      </tr>
                      <div class="modal fade" id="receipt<?= $payment['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Receipt Details</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <?php if (isset($payment['receipts']) && !empty($payment['receipts'])): ?>
                                <?php $image_path = base_url('uploads/clients/receipts/' . $payment['receipts']); ?>
                                <img src="<?= $image_path ?>" alt="Receipt Image" class="img-fluid">
                              <?php else: ?>
                                <p>No receipt available.</p>
                              <?php endif; ?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
</body>
<script>
  fetch('/check-due-policies')
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
</script>
<?= view('/Home/chop/jsh'); ?>