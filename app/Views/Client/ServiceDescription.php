<!DOCTYPE html>
<html lang="en">

<?= view('Home/chop1/head') ?>

<body>
    <?= view('Home/chop1/header') ?>

    <div class="page-banner-area">
        <div class="container">
            <div class="single-page-banner-content">
                <h1>Services Details</h1>
                <ul>
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>Services Details</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="services-details-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-services-details-content">
                        <div class="services-details-img">
                            <img src="<?= isset($plandesc['image']) ? base_url('/uploads/plans/' . $plandesc['image']) : '' ?>"
                                alt="services-details">
                        </div>
                        <h2 class="services-text"><?= isset($plandesc['plan_name']) ? $plandesc['plan_name'] : ''; ?>
                        </h2>
                        <p><?= isset($plandesc['description']) ? $plandesc['description'] : ''; ?></p><br><br>


                        <!-- <h3>Title basta about Benefits​</h3> -->
                        <!-- <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <ul class="blog-details-list">
                                    <li><img src="<?= base_url() ?>client/assets/images/services/services-check.svg"
                                            alt="blog-check">Benefits lalagay dito mula database</li>
                                    <li><img src="<?= base_url() ?>client/assets/images/services/services-check.svg"
                                            alt="blog-check">Benefits lalagay dito mula database</li>
                                    <li><img src="<?= base_url() ?>client/assets/images/services/services-check.svg"
                                            alt="blog-check">Benefits lalagay dito mula database</li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <ul class="blog-details-list">
                                    <li><img src="<?= base_url() ?>client/assets/images/services/services-check.svg"
                                            alt="blog-check">Benefits lalagay dito mula database</li>
                                    <li><img src="<?= base_url() ?>client/assets/images/services/services-check.svg"
                                            alt="blog-check">Benefits lalagay dito mula database</li>
                                    <li><img src="<?= base_url() ?>client/assets/images/services/services-check.svg"
                                            alt="blog-check">Benefits lalagay dito mula database</li>
                                </ul>
                            </div>
                        </div> -->

                        <h4>We Help To Get Solutions</h4>
                        <div class="faqs-content">
                            <div class="faqs-item">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                01. What types of health insurance plans does Allianz PNB offer?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Allianz PNB offers a range of health insurance plans tailored to suit
                                                    different needs and budgets. These include individual health
                                                    insurance plans, family floater plans, critical illness plans, and
                                                    group health insurance plans for organizations.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                02. What are the key benefits of Allianz PNB Health Insurance?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Allianz PNB Health Insurance offers several key benefits, including
                                                    coverage for hospitalization expenses, pre and post-hospitalization
                                                    expenses, day-care procedures, ambulance charges, and domiciliary
                                                    treatments. Additionally, policyholders can avail of cashless
                                                    treatment at a wide network of hospitals, receive tax benefits under
                                                    Section 80D of the Income Tax Act, and access value-added services
                                                    such as health check-ups and wellness programs.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                03. How does Allianz PNB Health Insurance ensure customer satisfaction?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Allianz PNB prioritizes customer satisfaction by providing prompt and
                                                    hassle-free claim settlement processes. They offer round-the-clock
                                                    customer support to address queries and concerns. Moreover, the
                                                    company regularly updates its insurance products to align with
                                                    evolving healthcare needs and technological advancements, ensuring
                                                    that customers receive the best possible coverage and service.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories">
                        <h2>Our Offers</h2>
                        <ul>
                            <?php foreach ($plan as $plans): ?>
                                <li><a href="<?= base_url() ?>ServiceDescription/<?= $plans['token'] ?>"><?= $plans['plan_name'] ?><i
                                            class="bx bx-right-arrow-alt"></i></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="download-app">
                        <h2>Inquire</h2>
                        <a href="/ClientRegister" class="default-btn">Get Insurance Now</a>
                    </div>
                    <div class="help-contact-card pb-2">
                        <div class="help-img">
                            <img src="<?= isset($plandesc['image']) ? base_url('/uploads/plans/' . $plandesc['image']) : '' ?>"
                                alt="<?= isset($plans['plan_name']) ? $plans['plan_name'] : ''; ?>">
                        </div>
                        <h3>In what ways can Allianz assist you?</h3>
                        <p>We provide excerpts from Allianz PNB, along with their English translations, accompanied by
                            information about Allianz services.</p>
                    </div>
                    <div class="call-experts">
                        <!-- <div class="phone-call">
                            <img src="<?= base_url() ?>client/assets/images/phone-call.svg" alt="phone-call">
                            <span>Call To Our Experts</span>
                            <a href="tel:(+0188)76898708">(+0188) 768 98708</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

	<?= view('Home/chop1/footer') ?>
	<?= view('Home/chop1/js') ?>

</body>

</html>