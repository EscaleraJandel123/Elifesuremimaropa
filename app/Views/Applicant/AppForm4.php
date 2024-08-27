<!doctype html>
<html lang="en">

<?= view('head'); ?>

<body>
    <?= view('Applicant/chop/header'); ?>

    <div class="container-fluid">
        <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
                <div class="position-sticky py-4 px-3 sidebar-sticky">
                    <ul class="nav flex-column h-100">

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/AppDash">
                                <i class="bi-house-fill me-2"></i>
                                Overview
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/AppForms">
                                <i class="bi bi-file-earmark-slides me-2"></i>
                                Forms
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/signature">
                                <i class="bi bi-pen me-2"></i>
                                Signature
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/appfiles">
                                <i class="bi bi-files"></i></i>
                                Files
                            </a>
                        </li>

                        
                        <li class="nav-item">
                            <a class="nav-link" href="/FA">
                                <i class="bi-person me-2"></i>
                                Agents
                            </a>
                        </li>

                        <li class="nav-item border-top mt-auto pt-2">
                            <a class="nav-link" href="/logout">
                                <i class="bi-box-arrow-left me-2"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
                <div class="title-group mb-3 text-center">
                    <h3>AFFIDAVIT OF NON-FILING FORM</h3>
                </div>
                <section class="section">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card">
                                <div class="card-body">

                                    <form class="container mt-5" method="post" action="/form4sv">
                                        <fieldset>
                                            <h6 style="text-align: center;">AFFIDAVIT OF NON-FILING FORM</h6><br>
                                            <p style="text-align: justify;">
                                                I, <input type="text" id="name" name="name"
                                                    style="width: 150px;  padding:5px 5px; border-radius: 13px;"
                                                    placeholder="name" value="<?= isset($aonff['name']) ? $aonff['name'] : '' ?>">, of legal age, single/married, Filipino, and a
                                                resident of <input type="text" id="place" name="place"
                                                    style="width: 100px;  padding:5px 5px; border-radius: 13px;"
                                                    placeholder="place"
                                                    value="<?= isset($aonff['place']) ? $aonff['place'] : '' ?>"> after having been duly sworn to in accordance
                                                with law, hereby depose and say:
                                            </p>

                                            <br>
                                            <ol style="text-align: justify;">
                                                <li>I do not have a sufficient source of income/unemployed for <input
                                                        type="text" id="reason" name="reason"
                                                        style="width: 150px;  padding:5px 5px; border-radius: 13px;"
                                                        placeholder="reason"
                                                        value="<?= isset($aonff['reason']) ? $aonff['reason'] : '' ?>">;</li>
                                                <li>That as a consequence, I did not file my Income Tax Return for the
                                                    past year;</li>
                                                <li>That I am executing this affidavit to attest to the truthfulness of
                                                    the foregoing facts and for all legal intents and purposes.</li>
                                            </ol>
                                            <br>
                                            <p style="text-align: justify;">
                                                IN WITNESS WHEREOF, I have hereunto set my hands this <input type="text"
                                                    id="day" name="day"
                                                    style="width: 150px;  padding:5px 5px; border-radius: 13px;"
                                                    placeholder="day"
                                                    value="<?= isset($aonff['day']) ? $aonff['day'] : '' ?>"> day of <input type="text" id="month" name="month"
                                                    style="width: 150px;  padding:5px 5px; border-radius: 13px;"
                                                    placeholder="month"
                                                    value="<?= isset($aonff['month']) ? $aonff['month'] : '' ?>">, <input type="text" id="year" name="year"
                                                    style="width: 150px;  padding:5px 5px; border-radius: 13px;"
                                                    placeholder="year"
                                                    value="<?= isset($aonff['year']) ? $aonff['year'] : '' ?>"> at <input type="text" id="witness_place"
                                                    name="witness_place"
                                                    style="width: 150px;  padding:5px 5px; border-radius: 13px;"
                                                    placeholder="place"
                                                    value="<?= isset($aonff['witness_place']) ? $aonff['witness_place'] : '' ?>">.
                                            </p>
                                            <br><br>
                                            <p style="text-align: right;">
                                                <input type="text" id="affiant" name="affiant"
                                                    style="width: 150px;  padding:5px 5px; border-radius: 13px;"
                                                    placeholder="affiant"
                                                    value="<?= isset($aonff['affiant']) ? $aonff['affiant'] : '' ?>"><br>
                                                Affiant
                                            </p>
                                            <p style="text-align: right;">
                                                CTC No. <input type="text" id="ctc_no" name="ctc_no"
                                                    style="width: 150px;  padding:5px 5px; border-radius: 13px;"
                                                    placeholder=""
                                                    value="<?= isset($aonff['ctc_no']) ? $aonff['ctc_no'] : '' ?>"><br>
                                                Issued on <input type="date" id="ctc_issue_date" name="ctc_issue_date"
                                                    style="width: 150px;  padding:5px 5px; border-radius: 13px;"
                                                    placeholder=""
                                                    value="<?= isset($aonff['ctc_issue_date']) ? $aonff['ctc_issue_date'] : '' ?>"> <br>
                                                Issued at <input type="text" id="ctc_issue_place" name="ctc_issue_place"
                                                    style="width: 150px;  padding:5px 5px; border-radius: 13px;"
                                                    placeholder=""
                                                    value="<?= isset($aonff['ctc_issue_place']) ? $aonff['ctc_issue_place'] : '' ?>">
                                            </p>
                                            <br> <br>
                                            <p style="text-align: justify;">
                                                SUBSCRIBED AND SWORN to before me this <input type="text" id="sworn_day"
                                                    name="sworn_day"
                                                    style="width: 150px;  padding:5px 5px; border-radius: 13px;"
                                                    placeholder="day"
                                                    value="<?= isset($aonff['sworn_day']) ? $aonff['sworn_day'] : '' ?>"> day of <input type="text" id="sworn_month"
                                                    name="sworn_month"
                                                    style="width: 150px;  padding:5px 5px; border-radius: 13px;"
                                                    placeholder="month"
                                                    value="<?= isset($aonff['sworn_month']) ? $aonff['sworn_month'] : '' ?>">, <input type="text" id="sworn_year"
                                                    name="sworn_year"
                                                    style="width: 100px;  padding:5px 5px; border-radius: 13px;"
                                                    placeholder="year"
                                                    value="<?= isset($aonff['sworn_year']) ? $aonff['sworn_year'] : '' ?>"> at <input type="text" id="sworn_place"
                                                    name="sworn_place"
                                                    style="width: 100px;  padding:5px 5px; border-radius: 13px;"
                                                    placeholder="place"
                                                    value="<?= isset($aonff['sworn_place']) ? $aonff['sworn_place'] : '' ?>">, affiant exhibited to me her Community Tax
                                                Certificate as indicated above.
                                            </p><br>
                                            <input type="submit" value="Submit" class="btn btn-primary">
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <footer class="site-footer">
                    <div class="container">
                        <div class="row">
                        </div>
                    </div>
                </footer>
            </main>

        </div>
    </div>

    <!-- JAVASCRIPT FILES -->
    <?= view('js') ?>

</body>

</html>