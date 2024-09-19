<!DOCTYPE html>
<html lang="en">

<?= view('Home/chop1/head') ?>

<body>
	<?= view('Home/chop1/header') ?>

	<div class="banner-three-area">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-lg-7">
					<div class="single-banner-three-content">
						<h1>Securing Your Tomorrow, Today. </h1>
						<p>Allianz PNB Agency is a leading name in the insurance industry, providing services since its
							inception.</p>
						<div class="banner-btn d-flex align-items-center">
							<a href="/login" class="default-btn btn-style-3">Get Started</a>
							<a href="/contactus" class="default-btn btn-style30">Contact Us</a>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div>
						<img src="allhome/assets/images/allianzlogo4.png" alt="">
					</div>
				</div>
			</div>
		</div>
		<div class="banner-three-img8">
			<img src="allhome/assets/images/banner/banner-three-img-8.webp" alt="banner-shape">
			<img src="allhome/assets/images/banner/banner-three-img-8.webp" alt="banner-shape">
		</div>

	</div>

	<section id="aboutus">
		<div class="features-area pt-100 pb-70">
			<div class="container">
				<div class="section-title">
					<span class="top-title"></span>
					<h2>ABOUT US</h2>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-6 col-md-6">
						<div class="single-features-card">
							<div class="features-icon">
								<img src="allhome/assets/images/features/people.svg" alt="features-1">
							</div>
							<h3>Integrated Marketing</h3>
							<p>Allianz PNB Agency offers comprehensive integrated marketing solutions to elevate your
								brand.</p>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-md-6">
						<div class="single-features-card bg-color-1">
							<div class="features-icon">
								<img src="allhome/assets/images/features/paper.svg" alt="features-1">
							</div>
							<h3>Saving Strategy</h3>
							<p>Allianz PNB Agency helps you build a secure financial future with effective saving
								strategies.</p>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-md-6">
						<div class="single-features-card bg-color-2">
							<div class="features-icon">
								<img src="allhome/assets/images/features/line.svg" alt="features-1">
							</div>
							<h3>Growth Strategy</h3>
							<p>Drive sustainable growth with Allianz PNB Agency's strategic planning and execution.</p>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-md-6">
						<div class="single-features-card bg-color-3">
							<div class="features-icon">
								<img src="allhome/assets/images/features/sword.svg" alt="features-1">
							</div>
							<h3>Digital Marketing</h3>
							<p>Boost your online presence with Allianz PNB Agency's tailored digital marketing
								strategies.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="services">
		<div class="team-area pt-100 pb-70">
			<div class="container">
				<div class="section-title">
					<span class="top-title"></span>
					<h2>Allianz PNB Best Insurance Services</h2>
				</div>
				<div class="team-slider owl-carousel owl-theme">
					<?php foreach ($plan as $plans): ?>
						<div class="single-team-card">
							<div class="team-img">
								<img src="<?= isset($plans['image']) ? base_url('/uploads/plans/' . $plans['image']) : '' ?>"
									alt="team" class="img-fluid object-fit-cover">
							</div>
							<div class="single-team-content">
								<h3><?= isset($plans['pla']) ? $plans['pla'] : ''; ?></h3>
								<p><?= isset($plans['coverage']) ? number_format($plans['coverage'], 2) : '0.00'; ?> <br>
									COVERAGE</p>
								<a href="<?= base_url() ?>ServiceDescription/<?= $plans['token'] ?>"
									class="default-btn btn-style-2">Read More</a>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
	</section>




	<section id="faq">
		<div class="insurance-benefits-area pt-100 pb-100">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="insurance-benefits-img">
							<img src="allhome/assets/images/insurance-benefits.webp" alt="insurance-benefits">
							<div class="insurance-benefits-shape-1">
								<img src="allhome/assets/images/insurance-benefits-shape-1.webp"
									alt="insurance-benefits-shape-1">
							</div>
							<div class="insurance-benefits-shape-2">
								<img src="allhome/assets/images/insurance-benefits-shape-2.webp"
									alt="insurance-benefits-shape-1">
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="single-insurance-benefits-content">
							<div class="section-title left-title">
								<span class="top-title">Why Choose Allianz PNB?</span>
								<h2>Discover the Benefits</h2>
								<p>Allianz PNB is committed to providing exceptional services and benefits to our
									customers. Here are some reasons why you should choose us:</p>
							</div>
							<div class="row">
								<div class="col-lg-6 col-sm-6 col-md-6">
									<div class="insurance-benefits-card">
										<div class="insurance-benefits-text d-flex align-items-center">
											<span>01</span>
											<h3>100% Secure Services</h3>
										</div>
										<p>Rest assured with our 100% secure services. We prioritize the safety and
											security of your investments and personal information.</p>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-md-6">
									<div class="insurance-benefits-card">
										<div class="insurance-benefits-text d-flex align-items-center">
											<span>02</span>
											<h3>Anytime Money Back</h3>
										</div>
										<p>With Allianz PNB, enjoy the flexibility of anytime money back guarantee. We
											understand your changing needs and offer hassle-free refunds.</p>
										<div class="insurance-shape">
											<img src="allhome/assets/images/insurance-benefits-shape-3.webp"
												alt="insurance">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>



	<section id="testimonials">
		<div class="testimonials-area testimonials-two-area pt-100 pb-70">
			<div class="container">
				<div class="section-title left-title">
					<span class="top-title">Allianz PNB Testimonials</span>
					<h2>What Our Customers Say...</h2>
				</div>
				<div class="testimonials-three-slider owl-carousel owl-theme">
					<?php foreach ($feed as $feedback): ?>
						<div class="testimonials-item">
							<div class="testimonials-client d-flex align-items-center">
								<img src="allhome/assets/images/testimonials/def.jpg" alt="testimonials">
								<div class="testimonials-text">
									<h3><?= $feedback['name'] ?></h3>
								</div>
							</div>
							<div class="testimonials-card testimonials-card-three">
								<div class="quote-icon">
									<img src="allhome/assets/images/testimonials/qoutes.jpg" class="quote1" alt="quote">
									<div class="quote-icon-2">
										<img src="allhome/assets/images/quote-two.svg" alt="quote">
									</div>
								</div>
								<p><?= date('M j, Y', strtotime($feedback['created_at'])) ?></p><br><br>
								<p><?= $feedback['content'] ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="testimonials-3-shape" data-cue="zoomIn" data-duration="2000">
				<img src="allhome/assets/images/testimonials/testimonials-3-shape.webp" alt="testimonials">
			</div>
		</div>
	</section>


	<div class="team-page-area pt-50 pb-100">
		<div class="container">
			<div class="section-title">
				<h2>Meet Our Great Agent</h2>
			</div>
			<div class="row">
				<?php foreach ($agents as $agent): ?>
					<div class="col-lg-3 col-sm-6 col-md-6">
						<div class="single-team-card team-page-card">
							<div class="team-img">
								<img src="<?= isset($agent['agentprofile']) && !empty($agent['agentprofile']) ? base_url('/uploads/' . $agent['agentprofile']) : base_url('/uploads/def.png') ?>"
									alt="team">
							</div>
							<div class="single-team-content">
								<h5><?= $agent['lastname'] ?>, <?= $agent['firstname'] ?> 	<?= $agent['middlename'] ?>.</h5>
								<p><?= $agent['email'] ?></p>
								<ul class="d-flex align-items-center justify-content-center">
									<li class="list-inline">
										<a href="https://www.facebook.com/" target="_blank">
											<i class="bx bxl-facebook"></i>
										</a>
									</li>
									<li class="list-inline">
										<a href="https://twitter.com/" target="_blank">
											<i class="bx bxl-twitter"></i>
										</a>
									</li>
									<li class="list-inline">
										<a href="https://www.linkedin.com/" target="_blank">
											<i class="bx bxl-linkedin"></i>
										</a>
									</li>
									<li class="list-inline">
										<a href="https://www.google.com/" target="_blank">
											<i class="bx bxl-google"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<?= $pager->links('agent', 'clientpage') ?>
		</div>
	</div>


	<div class="free-quote-2-area pt-100 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="single-free-quote-form quote-form-three">
						<div class="section-title left-title">
							<span class="top-title">Hello!</span>
							<h2>Feedback / Comment</h2>
						</div>
						<form method="post" action="<?= base_url('feedback/saveFeedback') ?>">
							<?= csrf_field() ?>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<input type="text" name="name" class="form-control" placeholder="Name"
											value="<?= old('name') ?>" required>
										<?php if (session()->has('errors')): ?>
											<div class="text-danger"><?= session('errors.name') ?></div>
										<?php endif ?>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<input type="email" name="email" class="form-control" placeholder="Email"
											value="<?= old('email') ?>" required>
										<?php if (session()->has('errors')): ?>
											<div class="text-danger"><?= session('errors.email') ?></div>
										<?php endif ?>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<textarea name="content" class="form-control"
											placeholder="Feedback / Comment..."
											required><?= old('content') ?></textarea>
										<?php if (session()->has('errors')): ?>
											<div class="text-danger"><?= session('errors.content') ?></div>
										<?php endif ?>
									</div>
								</div>
							</div>
							<button type="submit" class="default-btn">Submit</button>
						</form>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="free-quote-image-three">
						<img src="allhome/assets/images/free-quote-three.webp" alt="free-quote">
						<div class="free-quote-three-shape-1">
							<img src="allhome/assets/images/free-quote-three-shape-1.webp" alt="free-quote">
						</div>
						<div class="free-quote-three-shape-2">
							<img src="allhome/assets/images/free-quote-three-shape-2.webp" alt="free-quote">
						</div>
						<div class="free-quote-video-play">
							<a href="https://youtube.com/watch?v=9weZzMRejvo" class="popup-youtube">
								<i class="bx bx-play"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?= view('Home/chop1/footer') ?>
	<?= view('Home/chop1/js') ?>
</body>

</html>