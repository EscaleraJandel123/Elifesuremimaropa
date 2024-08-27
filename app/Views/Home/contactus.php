<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from templates.hibootstrap.com/inon/default/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Mar 2024 12:35:05 GMT -->

<?= view('Home/chop1/head') ?>

<!-- <body style="background-image: url('client/assets/images/allbg.png');background-size: 1000px;background-repeat: repeat;"> -->

<body>

    <?= view('Home/chop1/header') ?>

    <div class="page-banner-area blog-page-are">
        <div class="container">
            <div class="single-page-banner-content">
                <h1>Contact Us</h1>
                <ul>
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="contact-us-area pt-100">
        <div class="container">
            <div class="section-title">
                <span class="top-title">Get In Touch</span>
                <h2>Fill In The Contact Now</h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-contact-img">
                        <div class="contact-main-img">
                            <img src="client/assets/images/contact-us-img-5.webp" alt="contact-us">
                        </div>
                        <div class="contact-us-img1" data-cue="zoomIn">
                            <img src="client/assets/images/contact-us-img-1.webp" alt="contact-us">
                        </div>
                        <div class="contact-us-img2" data-cue="rotateIn">
                            <img src="client/assets/images/contact-us-img-2.webp" alt="contact-us">
                        </div>
                        <div class="contact-us-img3" data-cue="zoomIn" data-duration="2000">
                            <img src="client/assets/images/contact-us-img-3.webp" alt="contact-us">
                        </div>
                        <div class="contact-us-img4" data-cue="slideInLeft">
                            <img src="client/assets/images/contact-us-img-4.webp" alt="contact-us">
                        </div>
                        <div class="contact-main-image1s">
                            <img src="client/assets/images/contact-main-bg-img.webp" alt="main">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="name" class="form-control" placeholder="Name" required
                                            data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="email" class="form-control" placeholder="Your Email"
                                            required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="phone_number" placeholder="Phone" required
                                            data-error="Please enter your number" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="Subject" placeholder="Subject" required
                                            data-error="Please enter your subject" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="message" type="text" class="form-control" id="message" cols="30"
                                            rows="5" placeholder="Message" required
                                            data-error="Write your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input name="gridCheck" value="I agree to the terms and privacy policy."
                                                class="form-check-input" type="checkbox" id="gridCheck" required>
                                            <label class="form-check-label" for="gridCheck">
                                                Accept <a href="terms-of-service.html">Terms Of Services</a> And<a
                                                    href="privacy-policy.html">privacy policy</a>
                                            </label>
                                            <div class="help-block with-errors gridCheck-error"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">
                                        Submit Now
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br>


    <!-- <div class="contact-area pt-70">
        <div class="container">
            <div class="contact-card-item">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6 col-md-6">
                        <div class="contact-card">
                            <div class="contact-icon">
                                <img src="client/assets/images/contact-phone-2.svg" alt="Phone">
                            </div>
                            <h2>Phone Number</h2>
                            <p><a href="tel:(305) 547-9909">+(305) 547-9909</a></p>
                            <a href="tel:(305) 547-9908">+(305) 547-9908</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6">
                        <div class="contact-card">
                            <div class="contact-icon">
                                <img src="client/assets/images/contact-email.svg" alt="Email">
                            </div>
                            <h2>Sent Us Email</h2>
                            <p><a
                                    href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#7c14191010133c15121312521f1311"><span
                                        class="__cf_email__"
                                        data-cfemail="761e131a1a19361f1819185815191b">[email&#160;protected]</span></a>
                            </p>
                            <a
                                href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#2c45424a436c45424342024f4341"><span
                                    class="__cf_email__"
                                    data-cfemail="4920272f260920272627672a2624">[email&#160;protected]</span></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6">
                        <div class="contact-card">
                            <div class="contact-icon">
                                <img src="client/assets/images/location-icon.svg" alt="images">
                            </div>
                            <h2>Our Location</h2>
                            <p>382 NE 191st NY Miami, FL 33179-3899</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="map-area">
        <div class="container-fluid">
            <div class="place-map">
                <iframe class="maps"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830902776!2d-74.11976379633643!3d40.69766374862956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1667807354267!5m2!1sen!2sbd"></iframe>
            </div>
        </div>
    </div> -->

    <?= view('Home/chop1/footer') ?>
    <?= view('Home/chop1/js') ?>

</body>

</html>