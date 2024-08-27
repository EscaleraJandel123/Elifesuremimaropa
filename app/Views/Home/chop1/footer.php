
<div class="footer-area pt-100">
		<div class="container">
			<div class="row pb-100">
				<div class="col-lg-3 col-sm-6 col-md-6" data-cue="slideInUp">
					<div class="footer-widget">
						<a href="index.html">
							<h3 style="font-family: Arial Black; color: #013781;">ALLIANZ PNB</h3>
						</a><br>
						<p>Allianz PNB Life may offer flexible insurance solutions that can be customized according to the individual's financial goals, budget, and risk tolerance.</p>
						<ul class="follow-list">
							<li>
								<a href="https://www.facebook.com/" target="_blank">
									<i class="bx bxl-facebook"></i>
								</a>
							</li>
							<li>
								<a href="https://twitter.com/" target="_blank">
									<i class="bx bxl-twitter"></i>
								</a>
							</li>
							<li>
								<a href="https://www.linkedin.com/" target="_blank">
									<i class="bx bxl-linkedin"></i>
								</a>
							</li>
							<li>
								<a href="https://www.google.com/" target="_blank">
									<i class="bx bxl-google"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 col-md-6" data-cue="slideInUp">
					<div class="footer-widget footer-widget-link2">
						<h2>About Us</h2>
						<ul class="footer-widget-list">
							<li>
								<a href="/"><i class="bx bx-chevron-right"></i>Home</a>
							</li>
							<li>
								<a href="#aboutus"><i class="bx bx-chevron-right"></i>About Us</a>
							</li>
							<li>
								<a href="#testimonials"><i class="bx bx-chevron-right"></i>Testimonials</a>
							</li>
							<li>
								<a href="/terms"><i class="bx bx-chevron-right"></i>Terms and Conditions</a>
							</li>
							<li>
								<a href="#"><i class="bx bx-chevron-right"></i>Contact Us</a>
							</li>
							
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 col-md-6" data-cue="slideInUp">
					<div class="footer-widget footer-widget-link">
						<h2>Our Services</h2>
						<ul class="footer-widget-list">
						<?php foreach ($plan as $plans): ?>
							<li>
								<a href="<?= base_url() ?>ServiceDescription/<?= $plans['token'] ?>"><i class="bx bx-chevron-right"></i><?= $plans['plan_name'] ?></a>
							</li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 col-md-6" data-cue="slideInUp">
					<div class="footer-widget">
						<h2>Get In Touch</h2>
						<div class="touch-content">
							<div class="contact-icon">
								<img src="<?= base_url() ?>allhome/assets/images/contact-phone.svg" alt="svg">
							</div>
							<a href="tel:(800)2162020">09927703098</a>
						</div>
						<div class="touch-content">
							<div class="contact-icon">
								<img src="<?= base_url() ?>allhome/assets/images/contact-mail.svg" alt="svg">
							</div>
							<a
								href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#c9a1aca5a5a689a0a7a6a7e7aaa6a4"><span
									class="__cf_email__"
									data-cfemail="563e333a3a39163f3839387835393b">chris@gmail.com</span></a>
						</div>
						<div class="touch-content">
							<div class="contact-icon">
								<img src="<?= base_url() ?>allhome/assets/images/contact-map.svg" alt="svg">
							</div>
							<p>Lumang Bayan, Calapan City, Oriental Mindoro</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="go-top">
		<i class="bx bxs-chevrons-up"></i>
		<i class="bx bxs-chevrons-up"></i>
	</div>
