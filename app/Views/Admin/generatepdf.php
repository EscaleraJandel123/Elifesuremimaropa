<?= view('head') ?>
<!-- <style>
    .form-group input[type="text"] {
    border: none; /* Remove default border */
    border-bottom: 1px solid #000; /* Add underline */
    background-color: transparent; /* Optional: Set background color to transparent */
}

</style> -->
<section>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <h3>
                            <?= isset($lifechangerform['fname']) ? $lifechangerform['fname'] : '' ?>
                        </h3>
                        <!-- <h3>Applicant Name: <?= isset($lifechangerform['fname']) ? $lifechangerform['fname'] : '' ?></h3> -->
                        <!-- <a href="/ManageApplicant" class="btn btn-primary">Back</a>
                            <input type="submit" class="btn btn-success" value="Confirm"> -->
                        <div>
                            <label for="position">Position applying for:</label>
                            <input type="text" readonly id="position" name="positionApplying"
                                value="<?= isset($lifechangerform['position']) ? $lifechangerform['position'] : 'Agent' ?>"
                                required readonly>
                            <label for="preferredArea">Preferred area:</label>
                            <input type="text" readonly id="preferredArea" name="preferredArea"
                                value="<?= isset($lifechangerform['preferredArea']) ? $lifechangerform['preferredArea'] : '' ?>"
                                required>
                        </div>
                        <div>
                            <label>Source:</label><br>
                            <input type="checkbox" disabled id="referral" name="referral" value="yes"
                                <?= isset($lifechangerform['referral']) && $lifechangerform['referral'] === 'yes' ? 'checked' : '' ?>>
                            <label for="referral">Referral</label>

                            <label for="referralBy">by whom:</label>
                            <input type="text" readonly id="referralBy" name="referralBy"
                                value="<?= isset($lifechangerform['referralBy']) ? $lifechangerform['referralBy'] : '' ?>">

                            <input type="checkbox" disabled id="onlineAd" name="onlineAd" value="Online Advertisement"
                                <?= isset($lifechangerform['onlineAd']) && $lifechangerform['onlineAd'] === 'Online Advertisement' ? 'checked' : '' ?>>
                            <label for="onlineAd">Online Advertisement</label>

                            <input type="checkbox" disabled id="walkIn" name="walkIn" value="yes"
                                <?= isset($lifechangerform['walkIn']) && $lifechangerform['walkIn'] === 'yes' ? 'checked' : '' ?>>
                            <label for="walkIn">Walk-In</label>

                            <input type="checkbox" disabled id="others" name="othersRef" value="yes"
                                <?= isset($lifechangerform['othersRef']) && $lifechangerform['othersRef'] === 'yes' ? 'checked' : '' ?>>
                            <label for="others">Others</label><br><br>
                        </div>

                        <div>
                            <h2>Personal information</h2>
                            <label for="name">Name:</label>
                            <input type="text" readonly id="name" name="Agentfullname"
                                value="<?= isset($lifechangerform['fname']) ? $lifechangerform['fname'] : '' ?>"
                                required><br>

                            <label for="nickname">Nickname:</label>
                            <input type="text" readonly id="nickname" name="nickname"
                                value="<?= isset($lifechangerform['nickname']) ? $lifechangerform['nickname'] : '' ?>"><br>

                            <label for="birthdate">Birth date:</label>
                            <input type="date" readonly id="birthdate" name="birthdate"
                                value="<?= isset($lifechangerform['birthdate']) ? $lifechangerform['birthdate'] : '' ?>"
                                required><br>

                            <label for="placeOfBirth">Place of birth:</label>
                            <input type="text" readonly id="placeOfBirth" name="placeOfBirth"
                                value="<?= isset($lifechangerform['placeOfBirth']) ? $lifechangerform['placeOfBirth'] : '' ?>"
                                required><br>

                            <label for="gender">Gender</label>
                            <input type="text" id="gender" name="gender"
                                value="<?= isset($lifechangerform['gender']) ? $lifechangerform['gender'] : '' ?>"
                                readonly>
                            <br>
                            <label for="bloodType">bloodType</label>
                            <input type="text" id="bloodType" name="bloodType"
                                value="<?= isset($lifechangerform['bloodType']) ? $lifechangerform['bloodType'] : '' ?>"
                                readonly>

                            <br>

                            <label for="homeAddress">Home address:</label>
                            <input type="text" readonly id="homeAddress" name="homeAddress"
                                value="<?= isset($lifechangerform['homeAddress']) ? $lifechangerform['homeAddress'] : '' ?>"
                                required><br>

                            <label for="mobileNo">Mobile Number:</label>
                            <input type="text" readonly id="mobileNo" name="mobileNo"
                                value="<?= isset($lifechangerform['mobileNo']) ? $lifechangerform['mobileNo'] : '' ?>"
                                required><br>

                            <label for="landline">Landline:</label>
                            <input type="text" readonly id="landline" name="landline"
                                value="<?= isset($lifechangerform['landline']) ? $lifechangerform['landline'] : '' ?>"><br>

                            <label for="email">Email Address:</label>
                            <input type="email" readonly id="email" name="email"
                                value="<?= isset($lifechangerform['email']) ? $lifechangerform['email'] : '' ?>"><br>
                        </div>
                        <div>
                            <label for="citizenship">Citizenship:</label><br>
                            <input type="checkbox" disabled id="citizenship" name="citizenship" value="Filipino"
                                <?= isset($lifechangerform['citizenship']) && $lifechangerform['citizenship'] === 'Filipino' ? 'checked' : '' ?>>
                            <label for="filipino">Filipino</label>
                            <label for="others">Others, please specify</label>
                            <input type="text" readonly id="others" name="others"
                                value="<?= isset($lifechangerform['othersCitizenship']) ? $lifechangerform['othersCitizenship'] : '' ?>"><br>

                            <label for="naturalizationInfo">If naturalized citizen of the
                                Philippines, give date and place of
                                naturalization and attached photocopy of certificate of
                                naturalization:</label>
                            <input type="text" readonly id="naturalizationInfo" name="naturalizationInfo"><br>
                            <label for="maritalStatus">Marital Status</label>
                            <input type="text" id="maritalStatus" name="maritalStatus"
                                value="<?= isset($lifechangerform['maritalStatus']) ? $lifechangerform['maritalStatus'] : '' ?>"
                                readonly>

                            <br>

                            <div id="ifMarried">
                                <label for="maidenName">If Married, a) Maiden Name</label>
                                <input type="text" readonly id="maidenName" name="maidenName"
                                    value="<?= isset($lifechangerform['maidenName']) ? $lifechangerform['maidenName'] : '' ?>"><br>

                                <label for="spouseName">b) Name of Spouse:</label>
                                <input type="text" readonly id="spouseName" name="spouseName"
                                    value="<?= isset($lifechangerform['spouseName']) ? $lifechangerform['spouseName'] : '' ?>"><br>
                            </div>

                            <label for="sssNo">SSS No.:</label>
                            <input type="text" readonly id="sssNo" name="sssNo"
                                value="<?= isset($lifechangerform['sssNo']) ? $lifechangerform['sssNo'] : '' ?>"><br>

                            <label for="tin">Tax Identification No.:</label>
                            <input type="text" readonly id="tin" name="tin"
                                value="<?= isset($lifechangerform['tin']) ? $lifechangerform['tin'] : '' ?>"><br>

                            <label for="lifeInsuranceExperience">Life Insurance Experience:</label>
                            <input type="checkbox" disabled id="yesLife" name="lifeInsuranceExperience" value="yes"
                                <?= isset($lifechangerform['lifeInsuranceExperience']) && $lifechangerform['lifeInsuranceExperience'] === 'yes' ? 'checked' : '' ?>>
                            <label for="yesLife">Yes</label><br><br>

                            <input type="checkbox" disabled id="noLife" name="lifeInsuranceExperience" value="No"
                                <?= isset($lifechangerform['lifeInsuranceExperience']) && $lifechangerform['lifeInsuranceExperience'] === 'No' ? 'checked' : '' ?>>
                            <label for="noLife">No</label><br><br>

                            <label for="insuranceType">If yes, check the type:</label><br>
                            <input type="checkbox" disabled id="traditional" name="traditional" value="traditional"
                                <?= isset($lifechangerform['traditional']) && $lifechangerform['traditional'] === 'traditional' ? 'checked' : '' ?>>
                            <label for="traditional">Traditional</label>

                            <input type="checkbox" disabled id="variable" name="variable" value="variable"
                                <?= isset($lifechangerform['variable']) && $lifechangerform['variable'] === 'variable' ? 'checked' : '' ?>>
                            <label for="variable">Variable</label><br><br>

                            <label for="recentInsuranceCompany">Most recent Life Insurance
                                Company:</label>
                            <input type="text" readonly id="recentInsuranceCompany" name="recentInsuranceCompany"
                                value="<?= isset($lifechangerform['recentInsuranceCompany']) ? $lifechangerform['recentInsuranceCompany'] : '' ?>"><br>
                        </div>

                        <h2>Educational Background</h2>
                        <div>
                            <table>
                                <tr>
                                    <th></th>
                                    <th>SCHOOL</th>
                                    <th>COURSE</th>
                                    <th>YEAR GRADUATED</th>
                                </tr>
                                <tr>
                                    <td>High School</td>
                                    <td><input type="text" readonly name="highSchool"
                                            value="<?= isset($lifechangerform['highSchool']) ? $lifechangerform['highSchool'] : '' ?>">
                                    </td>
                                    <td><input type="text" readonly name="highSchoolCourse"
                                            value="<?= isset($lifechangerform['highSchoolCourse']) ? $lifechangerform['highSchoolCourse'] : '' ?>">
                                    </td>
                                    <td><input type="date" readonly name="highSchoolYear"
                                            value="<?= isset($lifechangerform['highSchoolYear']) ? $lifechangerform['highSchoolYear'] : '' ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>College</td>
                                    <td><input type="text" readonly name="college"
                                            value="<?= isset($lifechangerform['college']) ? $lifechangerform['college'] : '' ?>">
                                    </td>
                                    <td><input type="text" readonly name="collegeCourse"
                                            value="<?= isset($lifechangerform['collegeCourse']) ? $lifechangerform['collegeCourse'] : '' ?>">
                                    </td>
                                    <td><input type="date" readonly name="collegeYear"
                                            value="<?= isset($lifechangerform['collegeYear']) ? $lifechangerform['collegeYear'] : '' ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Graduate School</td>
                                    <td><input type="text" readonly name="graduateSchool"
                                            value="<?= isset($lifechangerform['graduateSchool']) ? $lifechangerform['graduateSchool'] : '' ?>">
                                    </td>
                                    <td><input type="text" readonly name="graduateCourse"
                                            value="<?= isset($lifechangerform['graduateCourse']) ? $lifechangerform['graduateCourse'] : '' ?>">
                                    </td>
                                    <td><input type="date" readonly name="graduateYear"
                                            value="<?= isset($lifechangerform['graduateYear']) ? $lifechangerform['graduateYear'] : '' ?>">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <h2>Employment History</h2>
                        <div>
                            <table>
                                <tr>
                                    <th>NAME AND ADDRESS OF EMPLOYER</th>
                                    <th>POSITION</th>
                                    <th colspan="2">EMPLOYMENT DATE</th>
                                    <th>REASON FOR LEAVING</th>
                                </tr>
                                <tr>
                                    <td><input type="text" readonly name="companyName1"
                                            value="<?= isset($lifechangerform['companyName1']) ? $lifechangerform['companyName1'] : '' ?>">
                                    </td>
                                    <td><input type="text" readonly name="position1"
                                            value="<?= isset($lifechangerform['position1']) ? $lifechangerform['position1'] : '' ?>">
                                    </td>
                                    <td><input type="date" readonly name="employmentFrom1"
                                            value="<?= isset($lifechangerform['employmentFrom1']) ? $lifechangerform['employmentFrom1'] : '' ?>">
                                    </td>
                                    <td><input type="date" readonly name="employmentTo1"
                                            value="<?= isset($lifechangerform['employmentTo1']) ? $lifechangerform['employmentTo1'] : '' ?>">
                                    </td>
                                    <td><input type="text" readonly name="reason1"
                                            value="<?= isset($lifechangerform['reason1']) ? $lifechangerform['reason1'] : '' ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" readonly name="companyName2"
                                            value="<?= isset($lifechangerform['companyName2']) ? $lifechangerform['companyName2'] : '' ?>">
                                    </td>
                                    <td><input type="text" readonly name="position2"
                                            value="<?= isset($lifechangerform['position2']) ? $lifechangerform['position2'] : '' ?>">
                                    </td>
                                    <td><input type="date" readonly name="employmentFrom2"
                                            value="<?= isset($lifechangerform['employmentFrom2']) ? $lifechangerform['employmentFrom2'] : '' ?>">
                                    </td>
                                    <td><input type="date" readonly name="employmentTo2"
                                            value="<?= isset($lifechangerform['employmentTo2']) ? $lifechangerform['employmentTo2'] : '' ?>">
                                    </td>
                                    <td><input type="text" readonly name="reason2"
                                            value="<?= isset($lifechangerform['reason2']) ? $lifechangerform['reason2'] : '' ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" readonly name="companyName3"
                                            value="<?= isset($lifechangerform['companyName3']) ? $lifechangerform['companyName3'] : '' ?>">
                                    </td>
                                    <td><input type="text" readonly name="position3"
                                            value="<?= isset($lifechangerform['position3']) ? $lifechangerform['position3'] : '' ?>">
                                    </td>
                                    <td><input type="date" readonly name="employmentFrom3"
                                            value="<?= isset($lifechangerform['employmentFrom3']) ? $lifechangerform['employmentFrom3'] : '' ?>">
                                    </td>
                                    <td><input type="date" readonly name="employmentTo3"
                                            value="<?= isset($lifechangerform['employmentTo3']) ? $lifechangerform['employmentTo3'] : '' ?>">
                                    </td>
                                    <td><input type="text" readonly name="reason3"
                                            value="<?= isset($lifechangerform['reason3']) ? $lifechangerform['reason3'] : '' ?>">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <h2>Most recent employer's contact details</h2>
                        <table border="1">
                            <tr>
                                <td>Company Name:<input type="text" readonly name="companyName"
                                        value="<?= isset($lifechangerform['companyName']) ? $lifechangerform['companyName'] : '' ?>">
                                </td>
                                <td>Position:<input type="text" readonly name="resposition"
                                        value="<?= isset($lifechangerform['resposition']) ? $lifechangerform['resposition'] : '' ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center;">Employer's contact
                                    details:</td>
                            </tr>
                            <tr>
                                <td><input type="text" readonly name="contactName"
                                        value="<?= isset($lifechangerform['contactName']) ? $lifechangerform['contactName'] : '' ?>"
                                        placeholder="Contact Name:"></td>
                                <td><input type="text" readonly name="contactPosition"
                                        value="<?= isset($lifechangerform['contactPosition']) ? $lifechangerform['contactPosition'] : '' ?>"
                                        placeholder="Position:"></td>
                            </tr>
                            <tr>
                                <td><input type="email" readonly name="emailAddress"
                                        value="<?= isset($lifechangerform['emailAddress']) ? $lifechangerform['emailAddress'] : '' ?>"
                                        placeholder="Email Address:"></td>
                                <td><input type="text" readonly name="contactNumber"
                                        value="<?= isset($lifechangerform['contactNumber']) ? $lifechangerform['contactNumber'] : '' ?>"
                                        placeholder="Contact Number:"></td>
                            </tr>
                            <tr>
                                <td colspan="2">If currently employed, have you already tendered
                                    your resignation?
                                    <div>
                                        <label for="yesCheckbox">Yes</label>
                                        <input type="checkbox" disabled name="yescuremployed" value="yes"
                                            <?= isset($lifechangerform['yescuremployed']) && $lifechangerform['yescuremployed'] === 'yes' ? 'checked' : '' ?>>
                                    </div>
                                    <div>
                                        <label for="noCheckbox">No</label>
                                        <input type="checkbox" disabled name="yescuremployed" value="no"
                                            <?= isset($lifechangerform['yescuremployed']) && $lifechangerform['yescuremployed'] === 'no' ? 'checked' : '' ?>>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">1. If answer is No, are we allowed to conduct the
                                    employment verification?
                                    <div>
                                        <label for="yesCheckbox">Yes</label>
                                        <input type="checkbox" disabled name="allowed" value="yes"
                                            <?= isset($lifechangerform['allowed']) && $lifechangerform['allowed'] === 'yes' ? 'checked' : '' ?>>

                                    </div>
                                    <div>
                                        <label for="noCheckbox">No</label>
                                        <input type="checkbox" disabled name="allowed" value="no"
                                            <?= isset($lifechangerform['allowed']) && $lifechangerform['allowed'] === 'no' ? 'checked' : '' ?>>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" readonly name="ifnoProvdtls"
                                        value="<?= isset($lifechangerform['ifnoProvdtls']) ? $lifechangerform['ifnoProvdtls'] : '' ?>"
                                        placeholder="2. If answer in number 1 is no, please provide details ">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>