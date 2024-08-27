<!DOCTYPE html>
<html lang="en">

<?= view('Home/chop1/head') ?>

<body>
	<?= view('Home/chop1/header') ?>

	<div class="page-banner-area team-page-area">
		<div class="container">
			<div class="single-page-banner-content">
				<h1>Agent</h1>
				<ul>
					<li>
						<a href="/">Home</a>
					</li>
					<li>Agent</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="team-page-area pt-100 pb-100">
		<div class="container">
			<div class="section-title">
				<span class="top-title">Choose Your Ideal Agent</span>
				<h2>Get to Know Our Agents</h2>
			</div>
			<div class="row">
				<?php foreach ($agents as $agent): ?>
					<div class="col-lg-3 col-sm-6 col-md-6">
						<div class="single-team-card team-page-card">
							<div class="team-img">
								<a href="#" data-bs-toggle="modal"
											data-bs-target="#viewagent<?= $agent['agent_id'] ?>">
									<img src="<?= isset($agent['agentprofile']) ? base_url('/uploads/' . $agent['agentprofile']) : '' ?>"
										alt="team">
								</a>
							</div>
							<div class="single-team-content">
								<h5><?= $agent['lastname'] ?>, <?= $agent['firstname'] ?> 	<?= $agent['middlename'] ?>.</h5>
								<p><?= $agent['email'] ?></p>
								<ul class="d-flex align-items-center justify-content-center">
									<li class="list-inline">
										<a href="" data-bs-toggle="modal"
											data-bs-target="#viewagent<?= $agent['agent_id'] ?>">
											<i class="bx bxl-facebook"></i>
										</a>
									</li>
									<li class="list-inline">
										<a href="">
											<i class="bx bxl-gmail"></i>
										</a>
									</li>
									<li class="list-inline">
										<a href="">
											<i class="bx bxl-messenger"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="modal fade" id="viewagent<?= $agent['agent_id'] ?>" tabindex="-1"
						aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-md">
							<div class="modal-content" style="background-color: #eee;">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel"
										style="mix-blend-mode: difference; color: white;">Agent Details</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="card-body text-center m-3">
									<div class="mt-3 mb-4">
										<img src="<?= isset($agent['agentprofile']) ? base_url('/uploads/' . $agent['agentprofile']) : '' ?>"
											class="rounded-circle img-fluid" style="width: 100px;" />
									</div>
									<h4 class="mb-2" style="mix-blend-mode: difference; color: white;">
										<?= $agent['lastname'] ?>, <?= $agent['firstname'] ?> 	<?= $agent['middlename'] ?>.
									</h4>
									<div class="mb-4 pb-2">
										<button type="button" data-mdb-button-init data-mdb-ripple-init
											class="btn btn-outline-primary btn-floating">
											<i class="bx bxl-facebook"></i>
										</button>
										<button type="button" data-mdb-button-init data-mdb-ripple-init
											class="btn btn-outline-primary btn-floating">
											<i class="bx bxl-gmail"></i>
										</button>
										<button type="button" data-mdb-button-init data-mdb-ripple-init
											class="btn btn-outline-primary btn-floating">
											<i class="bx bxl-telegram"></i>
										</button>
									</div>
									<button type="button" data-bs-toggle="modal"
										data-bs-target="#avail<?= $agent['agent_id'] ?>"
										class="btn btn-primary btn-rounded btn-lg">
										Avail Now!
									</button>
									<div class="d-flex justify-content-between text-center mt-5 mb-2">
										<div>
											<p class="mb-2 h5" style="mix-blend-mode: difference; color: white;">8471</p>
											<p class="text-muted mb-0">Wallets Balance</p>
										</div>
										<div class="px-3">
											<p class="mb-2 h5" style="mix-blend-mode: difference; color: white;">8512</p>
											<p class="text-muted mb-0">Income amounts</p>
										</div>
										<div>
											<p class="mb-2 h5" style="mix-blend-mode: difference; color: white;">4751</p>
											<p class="text-muted mb-0">Total Transactions</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade" id="avail<?= $agent['agent_id'] ?>" tabindex="-1"
						aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-md">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">User
										Details</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form action="/upuser/" method="post" role="form">
										<div class="mb-1">
											<label for="email" class="form-label">Email</label>
											<input type="email" class="form-control" id="email" name="email" value=""
												required>
										</div>
										<div class="mb-1">
											<label for="lastname" class="form-label">Last Name</label>
											<input type="text" class="form-control" id="email" name="lastname" value=""
												required>
										</div>

										<div class="mb-1">
											<label for="firstname" class="form-label">First Name</label>
											<input type="text" class="form-control" id="email" name="firstname" value=""
												required>
										</div>

										<div class="mb-1">
											<label for="middlename" class="form-label">Last Name</label>
											<input type="text" class="form-control" id="email" name="middlename" value=""
												required>
										</div>

										<div class="mb-1">
											<label class="form-label">Region *</label>
											<select name="region" class="form-control form-control-md" id="region"></select>
											<input type="hidden" class="form-control form-control-md" name="region_text"
												id="region-text" required>
										</div>

										<div class="mb-1">
											<label class="form-label">Province *</label>
											<select name="province" class="form-control form-control-md"
												id="province"></select>
											<input type="hidden" class="form-control form-control-md" name="province_text"
												id="province-text" required>
										</div>

										<div class="mb-1">
											<label class="form-label">City / Municipality *</label>
											<select name="city" class="form-control form-control-md" id="city"></select>
											<input type="hidden" class="form-control form-control-md" name="city_text"
												id="city-text" required>
										</div>

										<div class="mb-1">
											<label class="form-label">Barangay *</label>
											<select name="barangay" class="form-control form-control-md"
												id="barangay"></select>
											<input type="hidden" class="form-control form-control-md" name="barangay_text"
												id="barangay-text" required>
										</div>

										<div class="mb-1">
											<label for="street-text" class="form-label">Street (Optional)</label>
											<input type="text" class="form-control form-control-md" name="street_text"
												id="street-text">
										</div>

										<button type="button" class="btn btn-secondary"
											data-bs-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Avail</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<?= $pager->links('agent', 'clientpage') ?>
		</div>

	</div>
	<?= view('Home/chop1/footer') ?>
	<?= view('Home/chop1/js') ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="<?= base_url() ?>add/ph-address-selector.js"></script>
</body>

</html>