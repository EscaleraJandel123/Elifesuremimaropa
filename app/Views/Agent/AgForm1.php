<!doctype html>
<html lang="en">
<?= view('head'); ?>
<body>
    <?= view('Agent/chop/header'); ?>

    <div class="container-fluid">
        <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
                <div class="position-sticky py-4 px-3 sidebar-sticky">
                    <ul class="nav flex-column h-100">

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/AgDash">
                                <i class="bi-house-fill me-2"></i>
                                Overview
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/AgForms">
                                <i class="bi bi-file-earmark-slides me-2"></i>
                                Forms
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/Agsignature">
                                <i class="bi bi-pen me-2"></i>
                                Signature
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/agfiles">
                                <i class="bi bi-files me-2"></i></i>
                                Files
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/subagent">
                                <i class="bi-person me-2"></i>
                                Sub Agents
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/clients">
                                <i class="bi-person me-2"></i>
                                Clients
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/agentsched">
                                <i class="bi bi-check-lg me-2"></i>
                                Schedule
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="/cliSched">
                                <i class="bi bi-check-lg me-2"></i>
                                Transactions
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="/mycommi">
                                <i class="bi bi-wallet2 me-2"></i>
                                My Commission
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
                <div class="title-group mb-3">
                    <h3>LIFE CHANGER FORM</h3>
                </div>

                <section class="section">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card">
                                <div class="card-body">

                                    <form class="container mt-5" method="post" action="/form1sv"
                                        enctype="multipart/form-data">
                                        <fieldset>
                                            <div class="page" id="page1" style="display:none;">
                                                <div class="form-group">
                                                    <label for="position">Position applying for:</label>
                                                    <input type="text" id="position" name="positionApplying"
                                                        class="form-control"
                                                        value="<?= isset($lifechangerform['position']) ? $lifechangerform['position'] : 'Agent' ?>"
                                                        required readonly>
                                                    <label for="preferredArea">Preferred area:</label>
                                                    <input type="text" id="preferredArea" name="preferredArea"
                                                        class="form-control"
                                                        value="<?= isset($lifechangerform['preferredArea']) ? $lifechangerform['preferredArea'] : '' ?>"
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Source:</label><br>
                                                    <input type="checkbox" id="referral" name="referral" value="yes"
                                                        <?= isset($lifechangerform['referral']) && $lifechangerform['referral'] === 'yes' ? 'checked' : '' ?>>
                                                    <label for="referral">Referral</label>
                                                    <label for="referralBy">by whom:</label>

                                                    <select id="referralBy" name="referralBy" class="form-control"
                                                        required>
                                                        <option value="" selected>Select Agent</option>
                                                        <?php foreach ($agents as $agent): ?>
                                                        <?php $agentFullName = $agent['lastname'] . ', ' . $agent['firstname'] . ' ' . $agent['middlename']; ?>
                                                        <option value="<?= $agentFullName; ?>"
                                                            <?= (isset($lifechangerform['referralBy']) && $lifechangerform['referralBy'] == $agentFullName) ? 'selected' : ''; ?>>
                                                            <?= $agentFullName; ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>

                                                    <input type="checkbox" id="onlineAd" name="onlineAd"
                                                        value="Online Advertisement" disabled
                                                        <?= isset($lifechangerform['onlineAd']) && $lifechangerform['onlineAd'] === 'Online Advertisement' ? 'checked' : '' ?>>
                                                    <label for="onlineAd">Online Advertisement</label>

                                                    <input type="checkbox" id="walkIn" name="walkIn" value="yes" disabled
                                                        <?= isset($lifechangerform['walkIn']) && $lifechangerform['walkIn'] === 'yes' ? 'checked' : '' ?>>
                                                    <label for="walkIn">Walk-In</label>

                                                    <input type="checkbox" id="others" name="othersRef" value="yes" disabled
                                                        <?= isset($lifechangerform['othersRef']) && $lifechangerform['othersRef'] === 'yes' ? 'checked' : '' ?>>
                                                    <label for="others">Others</label><br><br>

                                                </div>

                                                <div class="form-group">
                                                    <h6>Personal information</h6>
                                                    <label for="name">Name:</label>
                                                    <input type="text" id="name" name="fullname" class="form-control"
                                                        value="<?= isset($lifechangerform['fname']) ? $lifechangerform['fname'] : '' ?>"
                                                        required><br>

                                                    <label for="nickname">Nickname:</label>
                                                    <input type="text" id="nickname" name="nickname"
                                                        class="form-control"
                                                        value="<?= isset($lifechangerform['nickname']) ? $lifechangerform['nickname'] : '' ?>"><br>

                                                    <label for="birthdate">Birth date:</label>
                                                    <input type="date" id="birthdate" name="birthdate"
                                                        class="form-control"
                                                        value="<?= isset($lifechangerform['birthdate']) ? $lifechangerform['birthdate'] : '' ?>"
                                                        required><br>

                                                    <label for="placeOfBirth">Place of birth:</label>
                                                    <input type="text" id="placeOfBirth" name="placeOfBirth"
                                                        class="form-control"
                                                        value="<?= isset($lifechangerform['placeOfBirth']) ? $lifechangerform['placeOfBirth'] : '' ?>"
                                                        required><br>

                                                    <label for="gender">Gender:</label>
                                                    <select id="gender" name="gender" class="form-control" required>
                                                        <!-- Assuming you want a default option with an empty value -->
                                                        <option value="">Select</option>
                                                        <option value="Male"
                                                            <?= isset($lifechangerform['gender']) && $lifechangerform['gender'] === 'Male' ? 'selected' : '' ?>>
                                                            Male
                                                        </option>
                                                        <option value="Female"
                                                            <?= isset($lifechangerform['gender']) && $lifechangerform['gender'] === 'Female' ? 'selected' : '' ?>>
                                                            Female</option>
                                                    </select>
                                                    <br>

                                                    <label for="bloodType">Blood Type:</label>
                                                    <select id="bloodType" name="bloodType" class="form-control"
                                                        required>
                                                        <option value="">Select</option>
                                                        <option value="N/A"
                                                            <?= isset($lifechangerform['bloodType']) && $lifechangerform['bloodType'] === 'N/A' ? 'selected' : '' ?>>
                                                            N/A
                                                        <option value="A+"
                                                            <?= isset($lifechangerform['bloodType']) && $lifechangerform['bloodType'] === 'A+' ? 'selected' : '' ?>>
                                                            A+
                                                        </option>
                                                        <option value="A-"
                                                            <?= isset($lifechangerform['bloodType']) && $lifechangerform['bloodType'] === 'A-' ? 'selected' : '' ?>>
                                                            A-
                                                        </option>
                                                        <option value="B+"
                                                            <?= isset($lifechangerform['bloodType']) && $lifechangerform['bloodType'] === 'B+' ? 'selected' : '' ?>>
                                                            B+
                                                        </option>
                                                        <option value="B-"
                                                            <?= isset($lifechangerform['bloodType']) && $lifechangerform['bloodType'] === 'B-' ? 'selected' : '' ?>>
                                                            B-
                                                        </option>
                                                        <option value="O+"
                                                            <?= isset($lifechangerform['bloodType']) && $lifechangerform['bloodType'] === 'O+' ? 'selected' : '' ?>>
                                                            O+
                                                        </option>
                                                        <option value="O-"
                                                            <?= isset($lifechangerform['bloodType']) && $lifechangerform['bloodType'] === 'O-' ? 'selected' : '' ?>>
                                                            O-
                                                        </option>
                                                        <option value="AB+"
                                                            <?= isset($lifechangerform['bloodType']) && $lifechangerform['bloodType'] === 'AB+' ? 'selected' : '' ?>>
                                                            AB+
                                                        </option>
                                                        <option value="AB-"
                                                            <?= isset($lifechangerform['bloodType']) && $lifechangerform['bloodType'] === 'AB-' ? 'selected' : '' ?>>
                                                            AB-
                                                        </option>
                                                    </select>
                                                    <br>

                                                    <label for="homeAddress">Home address:</label>
                                                    <input type="text" id="homeAddress" name="homeAddress"
                                                        class="form-control"
                                                        value="<?= isset($lifechangerform['homeAddress']) ? $lifechangerform['homeAddress'] : '' ?>"
                                                        required><br>

                                                    <label for="mobileNo">Mobile Number:</label>
                                                    <input type="text" id="mobileNo" name="mobileNo"
                                                        class="form-control"
                                                        value="<?= isset($lifechangerform['mobileNo']) ? $lifechangerform['mobileNo'] : '' ?>"
                                                        required><br>

                                                    <label for="landline">Landline:</label>
                                                    <input type="text" id="landline" name="landline"
                                                        value="<?= isset($lifechangerform['landline']) ? $lifechangerform['landline'] : '' ?>"
                                                        class="form-control"><br>

                                                    <label for="email">Email Address:</label>
                                                    <input type="email" id="email" name="email" class="form-control"
                                                        value="<?= isset($lifechangerform['email']) ? $lifechangerform['email'] : '' ?>"><br>
                                                </div>
                                            </div>

                                            <div class="page" id="page2" style="display:none;">
                                                <div class="form-group">
                                                    <label for="citizenship">Citizenship:</label><br>
                                                    <input type="checkbox" id="citizenship" name="citizenship"
                                                        value="Filipino"
                                                        <?= isset($lifechangerform['citizenship']) && $lifechangerform['citizenship'] === 'Filipino' ? 'checked' : '' ?>>
                                                    <label for="filipino">Filipino</label>
                                                    <label for="others">Others, please specify</label>
                                                    <input type="text" id="others" name="others" class="form-control"
                                                        value="<?= isset($lifechangerform['othersCitizenship']) ? $lifechangerform['othersCitizenship'] : '' ?>"><br>

                                                    <label for="naturalizationInfo">If naturalized citizen of the
                                                        Philippines, give date and place of
                                                        naturalization and attached photocopy of certificate of
                                                        naturalization:</label>
                                                    <input type="text" id="naturalizationInfo" name="naturalizationInfo"
                                                        class="form-control"><br>

                                                    <label for="maritalStatus">Marital Status:</label>
                                                    <select id="maritalStatus" name="maritalStatus" class="form-control"
                                                        required>
                                                        <option value="">Select</option>
                                                        <option value="Single"
                                                            <?= isset($lifechangerform['maritalStatus']) && $lifechangerform['maritalStatus'] === 'Single' ? 'selected' : '' ?>>
                                                            Single</option>
                                                        <option value="Married"
                                                            <?= isset($lifechangerform['maritalStatus']) && $lifechangerform['maritalStatus'] === 'Married' ? 'selected' : '' ?>>
                                                            Married</option>
                                                        <option value="Divorced"
                                                            <?= isset($lifechangerform['maritalStatus']) && $lifechangerform['maritalStatus'] === 'Divorced' ? 'selected' : '' ?>>
                                                            Divorced</option>
                                                        <option value="Widowed"
                                                            <?= isset($lifechangerform['maritalStatus']) && $lifechangerform['maritalStatus'] === 'Widowed' ? 'selected' : '' ?>>
                                                            Widowed</option>
                                                    </select>
                                                    <br>

                                                    <div id="ifMarried">
                                                        <label for="maidenName">If Married, a) Maiden Name</label>
                                                        <input type="text" id="maidenName" name="maidenName"
                                                            class="form-control"
                                                            value="<?= isset($lifechangerform['maidenName']) ? $lifechangerform['maidenName'] : '' ?>"><br>

                                                        <label for="spouseName">b) Name of Spouse:</label>
                                                        <input type="text" id="spouseName" name="spouseName"
                                                            class="form-control"
                                                            value="<?= isset($lifechangerform['spouseName']) ? $lifechangerform['spouseName'] : '' ?>"><br>
                                                    </div>

                                                    <label for="sssNo">SSS No.:</label>
                                                    <input type="text" id="sssNo" name="sssNo" class="form-control"
                                                        value="<?= isset($lifechangerform['sssNo']) ? $lifechangerform['sssNo'] : '' ?>"><br>

                                                    <label for="tin">Tax Identification No.:</label>
                                                    <input type="text" id="tin" name="tin" class="form-control"
                                                        value="<?= isset($lifechangerform['tin']) ? $lifechangerform['tin'] : '' ?>"><br>

                                                    <label for="lifeInsuranceExperience">Life Insurance
                                                        Experience:</label>
                                                    <input type="checkbox" id="yesLife" name="lifeInsuranceExperience"
                                                        value="yes"
                                                        <?= isset($lifechangerform['lifeInsuranceExperience']) && $lifechangerform['lifeInsuranceExperience'] === 'yes' ? 'checked' : '' ?>>
                                                    <label for="yesLife">Yes</label><br><br>

                                                    <input type="checkbox" id="noLife" name="lifeInsuranceExperience"
                                                        value="No"
                                                        <?= isset($lifechangerform['lifeInsuranceExperience']) && $lifechangerform['lifeInsuranceExperience'] === 'No' ? 'checked' : '' ?>>
                                                    <label for="noLife">No</label><br><br>

                                                    <label for="insuranceType">If yes, check the type:</label><br>
                                                    <input type="checkbox" id="traditional" name="traditional"
                                                        value="traditional"
                                                        <?= isset($lifechangerform['traditional']) && $lifechangerform['traditional'] === 'traditional' ? 'checked' : '' ?>>
                                                    <label for="traditional">Traditional</label>

                                                    <input type="checkbox" id="variable" name="variable"
                                                        value="variable"
                                                        <?= isset($lifechangerform['variable']) && $lifechangerform['variable'] === 'variable' ? 'checked' : '' ?>>
                                                    <label for="variable">Variable</label><br><br>

                                                    <label for="recentInsuranceCompany">Most recent Life Insurance
                                                        Company:</label>
                                                    <input type="text" id="recentInsuranceCompany"
                                                        name="recentInsuranceCompany" class="form-control"
                                                        value="<?= isset($lifechangerform['recentInsuranceCompany']) ? $lifechangerform['recentInsuranceCompany'] : '' ?>"><br>
                                                </div>
                                            </div>

                                            <div class="page" id="page3" style="display:none;">
                                                <h6>Educational Background</h6>
                                                <div class="table-responsive" style="font-size: 10pt">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th></th>
                                                            <th class="text-center">SCHOOL</th>
                                                            <th class="text-center">COURSE</th>
                                                            <th class="text-center">YEAR GRADUATED</th>
                                                        </tr>
                                                        <tr>
                                                            <td>High School</td>
                                                            <td><input type="text" name="highSchool"
                                                                    class="form-control text-center"
                                                                    value="<?= isset($lifechangerform['highSchool']) ? $lifechangerform['highSchool'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" name="highSchoolCourse"
                                                                    class="form-control text-center"
                                                                    value="<?= isset($lifechangerform['highSchoolCourse']) ? $lifechangerform['highSchoolCourse'] : '' ?>">
                                                            </td>
                                                            <td><input type="date" name="highSchoolYear"
                                                                    class="form-control text-center"
                                                                    value="<?= isset($lifechangerform['highSchoolYear']) ? $lifechangerform['highSchoolYear'] : '' ?>">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>College</td>
                                                            <td><input type="text" name="college"
                                                                    value="<?= isset($lifechangerform['college']) ? $lifechangerform['college'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="text" name="collegeCourse"
                                                                    value="<?= isset($lifechangerform['collegeCourse']) ? $lifechangerform['collegeCourse'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="date" name="collegeYear"
                                                                    value="<?= isset($lifechangerform['collegeYear']) ? $lifechangerform['collegeYear'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Graduate School</td>
                                                            <td><input type="text" name="graduateSchool"
                                                                    value="<?= isset($lifechangerform['graduateSchool']) ? $lifechangerform['graduateSchool'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="text" name="graduateCourse"
                                                                    value="<?= isset($lifechangerform['graduateCourse']) ? $lifechangerform['graduateCourse'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="date" name="graduateYear"
                                                                    value="<?= isset($lifechangerform['graduateYear']) ? $lifechangerform['graduateYear'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <h6>Employment History</h6>
                                                <div class="table-responsive" style="font-size: 10pt">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th class="text-center">NAME AND ADDRESS OF EMPLOYER
                                                            </th>
                                                            <th class="text-center">POSITION</th>
                                                            <th class="text-center" colspan="2">EMPLOYMENT DATE</th>
                                                            <th class="text-center">REASON FOR LEAVING</th>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" name="companyName1"
                                                                    value="<?= isset($lifechangerform['companyName1']) ? $lifechangerform['companyName1'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="text" name="position1"
                                                                    value="<?= isset($lifechangerform['position1']) ? $lifechangerform['position1'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="date" name="employmentFrom1"
                                                                    value="<?= isset($lifechangerform['employmentFrom1']) ? $lifechangerform['employmentFrom1'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="date" name="employmentTo1"
                                                                    value="<?= isset($lifechangerform['employmentTo1']) ? $lifechangerform['employmentTo1'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="text" name="reason1"
                                                                    value="<?= isset($lifechangerform['reason1']) ? $lifechangerform['reason1'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" name="companyName2"
                                                                    value="<?= isset($lifechangerform['companyName2']) ? $lifechangerform['companyName2'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="text" name="position2"
                                                                    value="<?= isset($lifechangerform['position2']) ? $lifechangerform['position2'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="date" name="employmentFrom2"
                                                                    value="<?= isset($lifechangerform['employmentFrom2']) ? $lifechangerform['employmentFrom2'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="date" name="employmentTo2"
                                                                    value="<?= isset($lifechangerform['employmentTo2']) ? $lifechangerform['employmentTo2'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="text" name="reason2"
                                                                    value="<?= isset($lifechangerform['reason2']) ? $lifechangerform['reason2'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" name="companyName3"
                                                                    value="<?= isset($lifechangerform['companyName3']) ? $lifechangerform['companyName3'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="text" name="position3"
                                                                    value="<?= isset($lifechangerform['position3']) ? $lifechangerform['position3'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="date" name="employmentFrom3"
                                                                    value="<?= isset($lifechangerform['employmentFrom3']) ? $lifechangerform['employmentFrom3'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="date" name="employmentTo3"
                                                                    value="<?= isset($lifechangerform['employmentTo3']) ? $lifechangerform['employmentTo3'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                            <td><input type="text" name="reason3"
                                                                    value="<?= isset($lifechangerform['reason3']) ? $lifechangerform['reason3'] : '' ?>"
                                                                    class="form-control text-center"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="page" id="page4" style="display:none;">
                                                <h6>Most recent employer's contact details</h6>
                                                <table class="table" border="1">
                                                    <tr>
                                                        <td>Company Name:<input type="text" name="companyName"
                                                                value="<?= isset($lifechangerform['companyName']) ? $lifechangerform['companyName'] : '' ?>"
                                                                class="form-control"></td>
                                                        <td>Position:<input type="text" name="resposition"
                                                                value="<?= isset($lifechangerform['resposition']) ? $lifechangerform['resposition'] : '' ?>"
                                                                class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" style="text-align: center;">Employer's
                                                            contact
                                                            details:</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="contactName" class="form-control"
                                                                value="<?= isset($lifechangerform['contactName']) ? $lifechangerform['contactName'] : '' ?>"
                                                                placeholder="Contact Name:"></td>
                                                        <td><input type="text" name="contactPosition"
                                                                class="form-control"
                                                                value="<?= isset($lifechangerform['contactPosition']) ? $lifechangerform['contactPosition'] : '' ?>"
                                                                placeholder="Position:"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="email" name="emailAddress" class="form-control"
                                                                value="<?= isset($lifechangerform['emailAddress']) ? $lifechangerform['emailAddress'] : '' ?>"
                                                                placeholder="Email Address:"></td>
                                                        <td><input type="text" name="contactNumber" class="form-control"
                                                                value="<?= isset($lifechangerform['contactNumber']) ? $lifechangerform['contactNumber'] : '' ?>"
                                                                placeholder="Contact Number:"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">If currently employed, have you already
                                                            tendered
                                                            your resignation?
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label"
                                                                    for="yesCheckbox">Yes</label>
                                                                <input type="checkbox" name="yescuremployed"
                                                                    class="form-check-input" value="yes"
                                                                    <?= isset($lifechangerform['yescuremployed']) && $lifechangerform['yescuremployed'] === 'yes' ? 'checked' : '' ?>>

                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label"
                                                                    for="noCheckbox">No</label>
                                                                <input type="checkbox" name="yescuremployed"
                                                                    class="form-check-input" value="no"
                                                                    <?= isset($lifechangerform['yescuremployed']) && $lifechangerform['yescuremployed'] === 'no' ? 'checked' : '' ?>>

                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">1. If answer is No, are we allowed to
                                                            conduct the
                                                            employment verification?
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label"
                                                                    for="yesCheckbox">Yes</label>
                                                                <input type="checkbox" name="allowed"
                                                                    class="form-check-input" value="yes"
                                                                    <?= isset($lifechangerform['allowed']) && $lifechangerform['allowed'] === 'yes' ? 'checked' : '' ?>>

                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label"
                                                                    for="noCheckbox">No</label>
                                                                <input type="checkbox" name="allowed"
                                                                    class="form-check-input" value="no"
                                                                    <?= isset($lifechangerform['allowed']) && $lifechangerform['allowed'] === 'no' ? 'checked' : '' ?>>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">2. If answer in number 1 is no, please
                                                            provide details
                                                            <input type="text" name="ifnoProvdtls"
                                                                value="<?= isset($lifechangerform['ifnoProvdtls']) ? $lifechangerform['ifnoProvdtls'] : '' ?>"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                </table>

                                                <h6>CONTACT PERSON</h6>

                                                <table class="table" border="1">
                                                    <tr>
                                                        <td class="col-6">
                                                            <input type="text" name="persontonotif" class="form-control"
                                                                value="<?= isset($lifechangerform['persontonotif']) ? $lifechangerform['persontonotif'] : '' ?>"
                                                                placeholder="Person to notify in case of emergency:">
                                                        </td>
                                                        <td class="col-4">
                                                            <input type="text" name="moNo" class="form-control"
                                                                value="<?= isset($lifechangerform['moNo']) ? $lifechangerform['moNo'] : '' ?>"
                                                                placeholder="Mobile Number:">
                                                        </td>
                                                    </tr>
                                                </table>

                                                <h6>CHARACTER REFERENCES</h6>
                                                <table class="table" border="1" style="font-size: 10pt">
                                                    <thead>
                                                        <th>NAME</th>
                                                        <th>POSITION/COMPANY</th>
                                                        <th>CONTACT NUMBER</th>
                                                        <th>EMAIL ADDRESS</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="col-3">
                                                                <input type="text" name="n1" class="form-control"
                                                                    value="<?= isset($lifechangerform['n1']) ? $lifechangerform['n1'] : '' ?>">
                                                            </td>
                                                            <td class="col-3">
                                                                <input type="text" name="p1" class="form-control"
                                                                    value="<?= isset($lifechangerform['p1']) ? $lifechangerform['p1'] : '' ?>">
                                                            </td>
                                                            <td class="col-3">
                                                                <input type="text" name="c1" class="form-control"
                                                                    value="<?= isset($lifechangerform['c1']) ? $lifechangerform['c1'] : '' ?>">
                                                            </td>

                                                            <td class="col-3">
                                                                <input type="text" name="e1" class="form-control"
                                                                    value="<?= isset($lifechangerform['e1']) ? $lifechangerform['e1'] : '' ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col-3">
                                                                <input type="text" name="n2" class="form-control"
                                                                    value="<?= isset($lifechangerform['n2']) ? $lifechangerform['n2'] : '' ?>">
                                                            </td>
                                                            <td class="col-3">
                                                                <input type="text" name="p2" class="form-control"
                                                                    value="<?= isset($lifechangerform['p2']) ? $lifechangerform['p2'] : '' ?>">
                                                            </td>
                                                            <td class="col-3">
                                                                <input type="text" name="c2" class="form-control"
                                                                    value="<?= isset($lifechangerform['c2']) ? $lifechangerform['c2'] : '' ?>">
                                                            </td>

                                                            <td class="col-3">
                                                                <input type="text" name="e2" class="form-control"
                                                                    value="<?= isset($lifechangerform['e2']) ? $lifechangerform['e2'] : '' ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col-3">
                                                                <input type="text" name="n3" class="form-control"
                                                                    value="<?= isset($lifechangerform['n3']) ? $lifechangerform['n3'] : '' ?>">
                                                            </td>
                                                            <td class="col-3">
                                                                <input type="text" name="p3" class="form-control"
                                                                    value="<?= isset($lifechangerform['p3']) ? $lifechangerform['p3'] : '' ?>">
                                                            </td>
                                                            <td class="col-3">
                                                                <input type="text" name="c3" class="form-control"
                                                                    value="<?= isset($lifechangerform['c3']) ? $lifechangerform['c3'] : '' ?>">
                                                            </td>

                                                            <td class="col-3">
                                                                <input type="text" name="e3" class="form-control"
                                                                    value="<?= isset($lifechangerform['e3']) ? $lifechangerform['e3'] : '' ?>">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <div class="row mb-2">
                                                    <div class="col-3 justify-content-center text-center">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="checkbox" name="g1y" value="yes"
                                                                    <?= isset($lifechangerform['g1y']) && $lifechangerform['g1y'] === 'yes' ? 'checked' : '' ?>>
                                                                <span>YES</span>
                                                                <input type="checkbox" name="g1n" value="yes"
                                                                    <?= isset($lifechangerform['g1n']) && $lifechangerform['g1n'] === 'yes' ? 'checked' : '' ?>>
                                                                <span>NO</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8 mb-2">
                                                        <div class="row">
                                                            <label for="">Have you ever been accused,
                                                                investigated/arrested,
                                                                indicated or convicted of any criminal or civil case? If
                                                                yes, please provide details: <input class="tb"
                                                                    type="text" name="accused" id=""
                                                                    value="<?= isset($lifechangerform['accused']) ? $lifechangerform['accused'] : '' ?>"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3 justify-content-center text-center">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="checkbox" name="g2y" value="yes"
                                                                    <?= isset($lifechangerform['g2y']) && $lifechangerform['g2y'] === 'yes' ? 'checked' : '' ?>>
                                                                <span>YES</span>
                                                                <input type="checkbox" name="g2n" value="yes"
                                                                    <?= isset($lifechangerform['g2n']) && $lifechangerform['g2n'] === 'yes' ? 'checked' : '' ?>>
                                                                <span>NO</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <label for="">Have you ever declared bankruptcy and/or have
                                                                you
                                                                ever been declared bankruptcy by
                                                                regulators/authorities? If yes, please provide
                                                                details:<input class="" type="text" name="bankruptcy"
                                                                    id=""
                                                                    value="<?= isset($lifechangerform['bankruptcy']) ? $lifechangerform['bankruptcy'] : '' ?>"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-3 justify-content-center text-center">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="checkbox" name="g3y" value="yes"
                                                                    <?= isset($lifechangerform['g3y']) && $lifechangerform['g3y'] === 'yes' ? 'checked' : '' ?>>
                                                                <span>YES</span>
                                                                <input type="checkbox" name="g3n" value="yes"
                                                                    <?= isset($lifechangerform['g3n']) && $lifechangerform['g3n'] === 'yes' ? 'checked' : '' ?>>
                                                                <span>NO</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <label for="">Have you ever been investigated for any
                                                                administrative case?
                                                                If yes, please provide details:<input class="tb"
                                                                    type="text" name="investigated" id=""
                                                                    value="<?= isset($lifechangerform['investigated']) ? $lifechangerform['investigated'] : '' ?>"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-3 justify-content-center text-center">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="checkbox" name="g4y" value="yes"
                                                                    <?= isset($lifechangerform['g4y']) && $lifechangerform['g4y'] === 'yes' ? 'checked' : '' ?>>
                                                                <span>YES</span>
                                                                <input type="checkbox" name="g4n" value="yes"
                                                                    <?= isset($lifechangerform['g4n']) && $lifechangerform['g4n'] === 'yes' ? 'checked' : '' ?>>
                                                                <span>NO</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <label for="">Have you ever been terminated or forced to
                                                                resign
                                                                from any employment or affiliates of any Insurance
                                                                Company or Financial Institution? If yes, please provide
                                                                details:<input class="" type="text" name="terminated"
                                                                    id=""
                                                                    value="<?= isset($lifechangerform['terminat']) ? $lifechangerform['terminat'] : '' ?>"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="page" id="page5">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <strong>That I hereby expressly authorize Allianz PNB Life
                                                            Insurance, Inc.:</strong>
                                                        <ul style="margin-top: 10px;">
                                                            <li>to use and process, whether manually or via electronic
                                                                channels, any and all information I have provided above,
                                                                including Personal and Sensitive Personal Information,
                                                                to
                                                                facilitate, monitor, and improve matters pursuant to my
                                                                application.</li>
                                                            <li>to share, transfer, and/or disclose the said information
                                                                to
                                                                any of its intermediaries, subsidiaries, affiliates,
                                                                service
                                                                providers, partners and government agencies for the said
                                                                purposes.</li>
                                                            <li>I likewise promise to inform Allianz PNB Life Insurance,
                                                                Inc. of any change relating to my personal information.
                                                            </li>
                                                        </ul>
                                                        <p style="text-indent: 20px;">I further understand and
                                                            acknowledge
                                                            that such Personal Information may be used by AZPNBL to
                                                            comply
                                                            with its legal or regulatory obligations under applicable
                                                            local
                                                            or foreign laws, rules and regulations relating to matters
                                                            including but not limited to anti-money laundering and tax
                                                            monitoring/review/reporting.</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div style="border: 1px solid #ccc; padding: 10px;">
                                                            <p>I declare that all information supplied above and all
                                                                other
                                                                records and documents submitted by me in support of this
                                                                application are true and correct to the best of my
                                                                knowledge
                                                                and belief. I agree that any false record on information
                                                                supplied may result in rejection of this application or
                                                                if
                                                                already accepted termination of my contract. I agree
                                                                that a
                                                                photographic copy of this authorization and waiver shall
                                                                be
                                                                valid as the original.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-5 mb-5">
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input class="w-70"
                                                                    style="border-style: none; border-bottom: 1px solid black"
                                                                    type="text" name="printedName" id=""
                                                                    value="<?= isset($lifechangerform['printedName']) ? $lifechangerform['printedName'] : '' ?>"><br>
                                                                <label for="printedName"
                                                                    style="font-size: 10pt">Applicant's
                                                                    Printed Name</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="row">
                                                            <input
                                                                style="border-style: none; border-bottom: 1px solid black"
                                                                type="date" name="botdate" id=""
                                                                value="<?= isset($lifechangerform['botdate']) ? $lifechangerform['botdate'] : '' ?>">
                                                            <label for="date" style="font-size: 10pt">Date</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="w-75" style="border-bottom: 1px solid black"
                                                        id="signature"></div>
                                                    <input type="hidden" name="sign" id="sign">
                                                    <label for="signature">Signature</label>
                                                    <button class="btn btn-danger btn-sm m-1" type="button"
                                                        onclick="clearSignature()">Clear</button>
                                                </div>
                                            </div> -->

                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <div class="w-75" style="border-bottom: 1px solid black">
                                                            <img id="signatureImage" class="w-100"
                                                                src="<?= isset($sign['signature']) ? base_url('uploads/signatures/' . $sign['signature']) : '' ?>">
                                                        </div>
                                                        <!-- <input type="hidden" name="sign" id="sign"> -->
                                                        <label for="signature">Signature</label>
                                                        <!-- <button class="btn btn-danger btn-sm m-1" type="button"
                                                            onclick="clearSignature()">Clear</button> -->
                                                    </div>
                                                    <!-- <div class="col-lg-5">

                                                        <div id="signaturePreview">
                                                            <img id="signatureImage"
                                                                src="<?= isset($lifechangerform['signature']) ? base_url('uploads/signatures/' . $lifechangerform['signature']) : '' ?>">
                                                        </div>
                                                        <label for="signaturePreview">Signature Preview</label>
                                                    </div> -->
                                                </div>
                                                <br>
                                                <input type="submit" value="Save" class="btn btn-primary"
                                                    onclick="saveSignature(event)">
                                            </div>

                                            <!-- Pagination Controls -->
                                            <nav aria-label="Page navigation example" class="mt-4">
                                                <ul class="pagination justify-content-center">
                                                    <div class="d-flex flex-wrap justify-content-center align-items-center"
                                                        style="gap: 5px;">
                                                        <button type="button" class="page-link" id="prevBtn"
                                                            onclick="showPage(-1)" disabled>Previous</button>
                                                        <div id="pageNumberContainer"
                                                            class="d-flex flex-wrap justify-content-center"></div>
                                                        <button type="button" class="page-link" id="nextBtn"
                                                            onclick="showPage(1)" disabled>Next</button>
                                                    </div>
                                                </ul>
                                            </nav>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
    <?= view('js'); ?>
    <!-- Pagination Script -->
    <script>
    let currentPage = 1;
    const totalPages = 5;

    function showPage(step) {
        const pages = document.querySelectorAll('.page');
        pages[currentPage - 1].style.display = 'none';
        currentPage += step;
        pages[currentPage - 1].style.display = 'block';
        document.getElementById('prevBtn').disabled = currentPage === 1;
        document.getElementById('nextBtn').disabled = currentPage === totalPages;
    }

    // Initializing the first page view and page numbers
    document.addEventListener('DOMContentLoaded', (event) => {
        const pages = document.querySelectorAll('.page');
        pages.forEach((page, index) => {
            page.style.display = index === 0 ? 'block' : 'none';
        });
        updatePageNumbers();
    });

    function updatePageNumbers() {
        const pageNumberContainer = document.getElementById('pageNumberContainer');
        pageNumberContainer.innerHTML = ''; // Clear previous page numbers

        for (let i = 0; i < totalPages; i++) {
            const pageNumber = i + 1;
            const pageButton = document.createElement('button');
            pageButton.type = 'button';
            pageButton.classList.add('page-link');
            pageButton.textContent = pageNumber;
            pageButton.onclick = function() {
                showPageByNumber(pageNumber);
            };

            const pageItem = document.createElement('li');
            pageItem.classList.add('page-item');
            pageItem.appendChild(pageButton);

            const containerDiv = document.createElement('div');
            containerDiv.classList.add('p-2');
            containerDiv.appendChild(pageItem);

            pageNumberContainer.appendChild(containerDiv);
        }

        // Set initial active class to the first page number
        const firstPageButton = document.querySelectorAll('.page-item button')[0];
        firstPageButton.closest('.page-item').classList.add('active');

        document.getElementById('prevBtn').disabled = currentPage === 1;
        document.getElementById('nextBtn').disabled = currentPage === totalPages;
    }

    function showPage(step) {
        const pages = document.querySelectorAll('.page');
        pages[currentPage - 1].style.display = 'none';

        // Remove 'active' class from the previously active page number
        document.querySelector('.page-item.active').classList.remove('active');

        currentPage += step;
        pages[currentPage - 1].style.display = 'block';

        // Add 'active' class to the newly active page number
        const pageNumberButtons = document.querySelectorAll('.page-item button');
        if (currentPage <= totalPages && currentPage >= 1) {
            pageNumberButtons[currentPage - 1].closest('.page-item').classList.add('active');
        }

        document.getElementById('prevBtn').disabled = currentPage === 1;
        document.getElementById('nextBtn').disabled = currentPage === totalPages;
    }
    </script>
</body>

</html>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jSignature/2.1.2/jSignature.min.js"></script> -->

<!-- Sa iyong view file -->
<!-- <script>
// Initialize jSignature
var $sigdiv = $("#signature");
$sigdiv.jSignature({
    'background-color': 'white'
});

// Function to save signature
function saveSignature() {
    var dataUrl = $sigdiv.jSignature("getData", "image");
    if (dataUrl && dataUrl.length > 1) {
        var imageData = dataUrl[1]; // Get the base64 image data
        $('#sign').val(imageData);
        // Optionally, you can submit the form here if needed
        // document.getElementById("yourFormId").submit();
        alert("Life Changer Form Submitted!")
        // Update the signature preview
        $('#signaturePreview').html('<img src="' + imageData + '" alt="Signature Preview">');
    } else {
        alert("No signature data found.");
    }
}


function clearSignature() {
    $('#signature').jSignature('reset');
    $('#sign').val('');
}
</script> -->