<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>LIFE CHANGER FORM</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            /* background-color: #f0f0f0; */
        }
        .download-button-container {
            position: fixed;
            bottom: 20px; /* Adjust as needed */
            right: 20px; /* Adjust as needed */
            z-index: 1000; /* Ensure the button appears above other content */
        }

        input[type="text"],
        input[type="checkbox"] {
            pointer-events: none;
            background-color: #ffffff;
            /* Optional: change the background color to indicate disabled state */
            text-transform:uppercase;
            text-align:center;
        }

    .btn {
        background-color: DodgerBlue;
        border: none;
        color: white;
        padding: 12px 30px;
        cursor: pointer;
        font-size: 20px;
    }

    /* Darker background on mouse-over */
    .btn:hover {
        background-color: RoyalBlue;
    }

    .back {
        background-color: red;
        border: none;
        color: white;
        padding: 12px 30px;
        cursor: pointer;
        font-size: 20px;
    }

    /* Darker background on mouse-over */
    .back:hover {
        background-color: darkred;
    }

        @keyframes bounceAnimation {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0);
            }
        }

        .back-button {
        background-color: #007bff; /* Blue background color */
        border: none;
        color: #fff; /* White text color */
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 10px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .back-button:hover {
        background-color: #0056b3; /* Darker blue color on hover */
    }

    /* Optional: Add more specific styles for different screen sizes */
    @media screen and (max-width: 768px) {
        .back-button {
            font-size: 14px; /* Adjust font size for smaller screens */
            padding: 8px 16px; /* Adjust padding for smaller screens */
        }
    }

        .page {
            width: 210mm;/* A4 width */
            /* height: 297mm; */
            /* A4 height */
            margin: 20px auto;
            /* Centered on the page */
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
            /* Adding a shadow for visual effect */
            padding: 30px;
            /* Add padding to avoid content touching the edges */
            box-sizing: border-box;
            /* Include padding and border in the element's total width and height */
            position: relative;
        }

        /* Add additional styles for your content */
        .content {
            /* Example styles */
            color: #333;
            line-height: 1.5;
            position: relative;
            align-items: center;
            margin-left: 0.5in;
            margin-right: 0.5in;
        }

        .head {
            display: flex;
            justify-content: space-between;
        }

        .line {
            /* display: flex; */
            justify-content: space-between;
            font-size: 9pt;
            padding-bottom: 10px;
            /* background-color: #e3eaf1; */
        }

        .line strong {
            background-color: #002161;
            color: #ffffff;
            padding: 5px;
            padding-right: 50px;
            padding-bottom: 5px;
            font-weight: bold;
        }

        .Life {
            color: #002161;
            line-height: 1.5;
            margin: 0;
        }

        .logo {
            color: #327bbe;
            line-height: 1.5;
            margin: 0;
        }

        .educationaltable input[type="text"] {
            border: none;
            outline: none;
            width: 98%;
            /* background-color: #333; */
            /* text-align: center; */
            /* justify-content: center; */
            font-size: 9pt;
        }

        input[type="text"] {
            border: none;
            border-bottom: 1px solid black;
            outline: none;

        }

        .educationaltable,
        .educationaltable,
        .recentemployertable {
            border-collapse: collapse;
            width: 630px;
        }

        .educationaltable th,
        .employmenthistorytable th,
        .recentemployertable th,
        .characterreftable th {
            color: #002161;
        }

        .educationaltable td:first-child {
            width: 140px;
        }


        .employmenthistorytable {
            border-collapse: collapse;
            width: 100%;
        }

        .employmenthistorytable input[type="text"] {
            border: none;
            outline: none;
            width: 90%;
            font-size: 9pt;
            /* background-color: #333; */
        }

        .employmenthistorytable td:first-child {
            width: 120px;
            height: 50px;
        }

        .recentemployertable {
            border-collapse: collapse;
            width: 100%;
        }

        .recentemployertable input[type="text"] {
            border: none;
            outline: none;
            width: 98%;
            font-size: 9pt;
            /* background-color: #333; */
        }

        .recentemployertable td:first-child {
            width: 120px;
            height: 30px;
        }

        .contactpersontable input[type="text"] {
            border: none;
            outline: none;
        }

        .characterreftable {
            border-collapse: collapse;
            width: 100%;
        }

        .characterreftable input[type="text"] {
            border: none;
            outline: none;
            width: 98%;
            font-size: 9pt;
            /* background-color: #333; */
        }   


        /* Media Query for Responsive Design */
        @media screen and (max-width: 768px) {
            .content {
                flex-direction: column;
                /* Change to column layout on smaller screens */
                align-items: flex-start;
                /* Align items to the start */
                margin-left: 20px;
                /* Adjust margin for smaller screens */
                margin-right: 20px;
                /* Adjust margin for smaller screens */
            }
        }
    </style>
</head>

<body>

    <div class="page" id="page">
        <div class="content">
            
            <div class="head">
                <div>
                    <h1 class="Life">LIFE CHANGER FORM</h1>
                </div>
                <div>
                    <!-- <h1 class="logo">Allianz</h1> -->
                    <img src="<?= base_url() ?>uploads/logo.png" alt="">
                </div>
            </div>
            <div class="line">
                <label for="position">Position applying for:</label>
                <input type="text" id="position" name="positionApplying" readonly
                    value="<?= isset ($lifechangerform['position']) ? $lifechangerform['position'] : 'Agent' ?>"
                    style="margin-right: 55px; width: 177px;" required>
                <label for="preferredArea">Preferred area:</label>
                <input type="text" id="preferredArea" name="preferredArea" readonly
                    value="<?= isset ($lifechangerform['preferredArea']) ? $lifechangerform['preferredArea'] : '' ?>"
                    style="width: 177px;" required>
            </div>
            <div class="line">
                <label>Source:</label><input type="checkbox" id="referral" name="referral" value="yes"
                    <?= isset ($lifechangerform['referral']) && $lifechangerform['referral'] === 'yes' ? 'checked' : '' ?>>
                <label for="referral">Referral[</label>
                <label for="referralBy">by whom:</label><input type="text" readonly
                    value="<?= isset ($lifechangerform['referralBy']) ? $lifechangerform['referralBy'] : '' ?>"
                    id="referralBy" name="referralBy">]

                <input type="checkbox" id="onlineAd" name="onlineAd" readonly value="Online Advertisement"
                    style="margin-left: 9px ;" readonly value="Online Advertisement"
                    <?= isset ($lifechangerform['onlineAd']) && $lifechangerform['onlineAd'] === 'Online Advertisement' ? 'checked' : '' ?>>
                <label for="onlineAd">Online Advertisement</label>

                <input type="checkbox" id="walkIn" name="walkIn" readonly value="yes"
                    <?= isset ($lifechangerform['walkIn']) && $lifechangerform['walkIn'] === 'yes' ? 'checked' : '' ?>>
                <label for="walkIn">Walk-In</label>

                <input type="checkbox" id="others" name="othersRef" readonly value="yes"
                    <?= isset ($lifechangerform['othersRef']) && $lifechangerform['othersRef'] === 'yes' ? 'checked' : '' ?>>
                <label for="others">Others</label><br><br>
                <strong>PERSONAL INFORMATION</strong>
            </div>
            <div class="line">
                <label for="name">Name:</label>
                <input type="text" id="name" name="Agentfullname" style="width: 400px; margin-right: 20px ;" readonly
                    value="<?= isset ($lifechangerform['fname']) ? $lifechangerform['fname'] : '' ?>">
                <label for="nickname">Nickname:</label>
                <input type="text" id="nickname" name="nickname" style="width: 100px;" readonly
                    value="<?= isset ($lifechangerform['nickname']) ? $lifechangerform['nickname'] : '' ?>">
                <div style=" display: flex;align-items: stretch; margin-left: 60px; font-size: 7pt;">
                    <div style="margin-right: 70px;">Last Name</div>
                    <div style="margin-right: 70px;">First Name</div>
                    <div style="margin-right: 70px;">Middle Name</div>
                    <div style="margin-right: 70px;">Sufix</div>
                </div>
            </div>

            <div class="line">
                <label for="birthdate">Birth date:</label>
                <input type="text" style="width: 100px; margin-right: 20px;" id="birthdate" name="birthdate" readonly
                    value="<?= isset($lifechangerform['birthdate']) ? date('M j, Y', strtotime($lifechangerform['birthdate'])) : '' ?>" required>
                <label for="placeOfBirth">Place of birth:</label>
                <input type="text" style="width: 100px; margin-right: 20px;" id="placeOfBirth" name="placeOfBirth"
                    readonly
                    value="<?= isset ($lifechangerform['placeOfBirth']) ? $lifechangerform['placeOfBirth'] : '' ?>"
                    required>

                <label for="gender">Gender:</label>
                <input type="text" style="width: 51px; margin-right: 20px;" id="gender" name="gender" readonly
                    value="<?= isset ($lifechangerform['gender']) ? $lifechangerform['gender'] : '' ?>">

                <label for="bloodType">Blood Type:</label>
                <input type="text" style="width: 51px;" id="bloodType" name="bloodType" readonly
                    value="<?= isset ($lifechangerform['bloodType']) ? $lifechangerform['bloodType'] : '' ?>">
            </div>
            <div class="line">
                <label for="homeAddress">Home address:</label>
                <input type="text" style="width: 540px;" id="homeAddress" name="homeAddress" readonly
                    value="<?= isset ($lifechangerform['homeAddress']) ? $lifechangerform['homeAddress'] : '' ?>"
                    required>

                <div style=" display: flex;
                    align-items: stretch; margin-left: 110px; margin-right: 80px; font-size: 7pt;">

                    <div style="margin-right: 80px;">No.</div>
                    <div style="margin-right: 80px;">Street</div>
                    <div style="margin-right: 80px;">Subdivision/Barangay</div>
                    <div style="margin-right: 80px;">City/Municipal/Province</div>
                </div>
            </div>

            <div class="line">
                <label for="mobileNo">Mobile No.:</label>
                <input type="text" style="width: 140px; margin-right: 20px;" id="mobileNo" name="mobileNo" readonly
                    value="<?= isset ($lifechangerform['mobileNo']) ? $lifechangerform['mobileNo'] : '' ?>" required>

                <label for="landline">Landline:</label>
                <input type="text" style="width: 90px; margin-right: 20px;" id="landline" name="landline" readonly
                    value="<?= isset ($lifechangerform['landline']) ? $lifechangerform['landline'] : '' ?>">

                <label for="email">Email Address:</label>
                <input type="text" style="width: 140px;" id="email" name="email" readonly
                    value="<?= isset ($lifechangerform['email']) ? $lifechangerform['email'] : '' ?>">
            </div>
            <div class="line">
                <label for="citizenship">Citizenship:</label>
                <input type="checkbox" id="citizenship" name="citizenship" readonly value="Filipino"
                    <?= isset ($lifechangerform['citizenship']) && $lifechangerform['citizenship'] === 'Filipino' ? 'checked' : '' ?>>
                <label for="filipino">Filipino</label>
                <input type="checkbox" id="othersCitizenship" name="othersCitizenship" readonly
                    value="othersCitizenship" <?= isset ($lifechangerform['others']) && $lifechangerform['others'] === 'othersCitizenship' ? 'checked' : '' ?>>
                <label for="others" style="margin-right: 62px;">Others, please specify</label>
                <label for="maritalStatus">Marital Status:</label>
                <input type="text" style="width: 200px;" id="maritalStatus" name="maritalStatus" readonly
                    value="<?= isset ($lifechangerform['maritalStatus']) ? $lifechangerform['maritalStatus'] : '' ?>">
            </div>

            <div style="display: flex;
                align-items: stretch;">
                <div>
                    <label for="naturalizationInfo" style="font-size: 8pt;">
                        If naturalized citizen of the Philippines, give date and place of<br>
                        naturalization&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and &nbsp;&nbsp;&nbsp;&nbsp; attached
                        photocopy
                        of certificate of<br>
                        naturalization:
                    </label>
                    <input type="text" style="width: 220px;" id="naturalizationInfo" name="naturalizationInfo">
                </div>

                <div style=" font-size: 9pt; margin-left: 50px;">
                    <label for="maidenName">If Married, a) Maiden Name</label>
                    <input type="text" style="width: 130px; font-size: 7pt;" id="maidenName" name="maidenName"; readonly
                        value="<?= isset ($lifechangerform['maidenName']) ? $lifechangerform['maidenName'] : '' ?>"><br>
                    <label for="spouseName" style="margin-left: 57px;">b) Name of Spouse:</label>
                    <input type="text" style="width: 100px;" id="spouseName" name="spouseName" readonly
                        value="<?= isset ($lifechangerform['spouseName']) ? $lifechangerform['spouseName'] : '' ?>">
                </div>
            </div>

            <div class="line">
                <label for="sssNo">SSS No.:</label>
                <input type="text" style="margin-right: 110px ;" name="sssNo" readonly
                    value="<?= isset ($lifechangerform['sssNo']) ? $lifechangerform['sssNo'] : '' ?>">
                <label for="tin">Tax Identification No.:</label>
                <input type="text" id="tin" name="tin" readonly
                    value="<?= isset ($lifechangerform['tin']) ? $lifechangerform['tin'] : '' ?>">
            </div>
            <div class="line">
                <label for="lifeInsuranceExperience">Life Insurance Experience:</label>
                <input type="checkbox" id="yesLife" name="lifeInsuranceExperience" readonly value="yes"
                    <?= isset ($lifechangerform['lifeInsuranceExperience']) && $lifechangerform['lifeInsuranceExperience'] === 'yes' ? 'checked' : '' ?>>
                <label for="yesLife" style="margin-right: 15px;">Yes</label>

                <input type="checkbox" id="noLife" name="lifeInsuranceExperience" readonly value="No"
                    <?= isset ($lifechangerform['lifeInsuranceExperience']) && $lifechangerform['lifeInsuranceExperience'] === 'No' ? 'checked' : '' ?>>
                <label for="noLife" style="margin-right: 87px;">No</label>

                <label for="recentInsuranceCompany">Most recent Life Insurance
                    Company:</label>
                <input type="text" style="width: 80px;" id="recentInsuranceCompany" name="recentInsuranceCompany"
                    readonly
                    value="<?= isset ($lifechangerform['recentInsuranceCompany']) ? $lifechangerform['recentInsuranceCompany'] : '' ?>">
            </div>
            <div class="line" style="margin-left: 113px;">
                <label for="insuranceType">If yes,</label>
                <input type="checkbox" id="traditional" name="traditional" readonly value="traditional"
                    <?= isset ($lifechangerform['traditional']) && $lifechangerform['traditional'] === 'traditional' ? 'checked' : '' ?>>
                <label for="traditional">Traditional</label>

                <input type="checkbox" id="variable" name="variable" readonly value="variable"
                    <?= isset ($lifechangerform['variable']) && $lifechangerform['variable'] === 'variable' ? 'checked' : '' ?>>
                <label for="variable">Variable</label>
            </div>

            <!-- <div class="line">
                <strong>EDUCATIONAL BACKGROUND</strong><br>
                <table class="educationaltable" border="1">
                    <thead>
                        <tr>
                            <th></th>
                            <th>SCHOOL</th>
                            <th>COURSE</th>
                            <th>YEAR GRADUATED</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>High School</td>
                            <td><input type="text" name="highSchool" readonly
                                    value="<?= isset ($lifechangerform['highSchool']) ? $lifechangerform['highSchool'] : '' ?>">
                            </td>
                            <td><input type="text" name="highSchoolCourse" readonly
                                    value="<?= isset ($lifechangerform['highSchoolCourse']) ? $lifechangerform['highSchoolCourse'] : '' ?>">
                            </td>
                            <td><input type="text" name="highSchoolYear" readonly
                                    value="<?= isset ($lifechangerform['highSchoolYear']) ? $lifechangerform['highSchoolYear'] : '' ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>College</td>
                            <td><input type="text" name="college" readonly
                                    value="<?= isset ($lifechangerform['college']) ? $lifechangerform['college'] : '' ?>"
                                    class="form-control text-center"></td>
                            <td><input type="text" name="collegeCourse" readonly
                                    value="<?= isset ($lifechangerform['collegeCourse']) ? $lifechangerform['collegeCourse'] : '' ?>"
                                    class="form-control text-center"></td>
                            <td><input type="text" name="collegeYear" readonly
                                    value="<?= isset ($lifechangerform['collegeYear']) ? $lifechangerform['collegeYear'] : '' ?>"
                                    class="form-control text-center"></td>
                        </tr>
                        <tr>
                            <td>Graduate School</td>
                            <td><input type="text" name="graduateSchool" readonly
                                    value="<?= isset ($lifechangerform['graduateSchool']) ? $lifechangerform['graduateSchool'] : '' ?>"
                                    class="form-control text-center"></td>
                            <td><input type="text" name="graduateCourse" readonly
                                    value="<?= isset ($lifechangerform['graduateCourse']) ? $lifechangerform['graduateCourse'] : '' ?>"
                                    class="form-control text-center"></td>
                            <td><input type="text" name="graduateYear" readonly
                                    value="<?= isset ($lifechangerform['graduateYear']) ? $lifechangerform['graduateYear'] : '' ?>"
                                    class="form-control text-center"></td>
                        </tr>
                    </tbody>
                </table>
            </div> -->

            <!-- <div class="line">
                <strong>EMPLOYMENT HISTORY</strong>(List your last 3 employers, beginning with the current or most
                recent one)<br>
                <table class="employmenthistorytable" border="1">
                    <thead>
                        <tr>
                            <th style="width: 170px;">NAME AND ADDRESS OF EMPLOYER</th>
                            <th style="width: 130px;">POSITION</th>
                            <th style="width: 130px;">EMPLOYMENT DATE</th>
                            <th style="width: 130px;">REASON FOR LEAVING</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1 <input type="text" name="companyName1" readonly
                                    value="<?= isset ($lifechangerform['companyName1']) ? $lifechangerform['companyName1'] : '' ?>">
                            </td>
                            <td><input type="text" name="position1" readonly
                                    value="<?= isset ($lifechangerform['position1']) ? $lifechangerform['position1'] : '' ?>">
                            </td>

                            <td rowspan="1">
                                From: <input type="text" style="width: 70%;" name="employmentFrom1" readonly
                                    value="<?= isset ($lifechangerform['employmentFrom1']) ? $lifechangerform['employmentFrom1'] : '' ?>"><br>
                                To: <input type="text" style="width: 70%;" name="employmentTo1" readonly
                                    value="<?= isset ($lifechangerform['employmentTo1']) ? $lifechangerform['employmentTo1'] : '' ?>"><br>
                            </td>

                            <td><input type="text" name="reason1" readonly
                                    value="<?= isset ($lifechangerform['reason1']) ? $lifechangerform['reason1'] : '' ?>">
                            </td>

                        </tr>

                        <tr>
                            <td>2 <input type="text" name="companyName1" readonly
                                    value="<?= isset ($lifechangerform['companyName2']) ? $lifechangerform['companyName2'] : '' ?>">
                            </td>
                            <td><input type="text" name="position1" readonly
                                    value="<?= isset ($lifechangerform['position2']) ? $lifechangerform['position2'] : '' ?>">
                            </td>

                            <td rowspan="1">
                                From: <input type="text" style="width: 70%;" name="employmentFrom1" readonly
                                    value="<?= isset ($lifechangerform['employmentFrom2']) ? $lifechangerform['employmentFrom2'] : '' ?>"><br>
                                To: <input type="text" style="width: 70%;" name="employmentTo1" readonly
                                    value="<?= isset ($lifechangerform['employmentTo2']) ? $lifechangerform['employmentTo2'] : '' ?>"><br>
                            </td>

                            <td><input type="text" name="reason1" readonly
                                    value="<?= isset ($lifechangerform['reason1']) ? $lifechangerform['reason2'] : '' ?>">
                            </td>

                        </tr>
                        <tr>
                            <td>3 <input type="text" name="companyName1" readonly
                                    value="<?= isset ($lifechangerform['companyName3']) ? $lifechangerform['companyName3'] : '' ?>">
                            </td>
                            <td><input type="text" name="position1" readonly
                                    value="<?= isset ($lifechangerform['position3']) ? $lifechangerform['position3'] : '' ?>">
                            </td>

                            <td rowspan="1">
                                From: <input type="text" style="width: 70%;" name="employmentFrom1" readonly
                                    value="<?= isset ($lifechangerform['employmentFrom3']) ? $lifechangerform['employmentFrom3'] : '' ?>"><br>
                                To: <input type="text" style="width: 70%;" name="employmentTo1" readonly
                                    value="<?= isset ($lifechangerform['employmentTo3']) ? $lifechangerform['employmentTo3'] : '' ?>"><br>
                            </td>

                            <td><input type="text" name="reason1" readonly
                                    value="<?= isset ($lifechangerform['reason1']) ? $lifechangerform['reason3'] : '' ?>">
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div> -->

            <div class="line">
                <strong>Most recent employer's contact details</strong>(Preferably HR, Immediate Supervisor or
                Supervisor):
                <table class="recentemployertable" border="1">
                    <tbody>
                        <tr>
                            <td style="width: 55%;">Compony Name: <input type="text" name="companyName" readonly
                                    value="<?= isset ($lifechangerform['companyName']) ? $lifechangerform['companyName'] : '' ?>">
                            </td>
                            <td>Position: <input type="text" name="resposition" readonly
                                    value="<?= isset ($lifechangerform['resposition']) ? $lifechangerform['resposition'] : '' ?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">Employer's contact details:</td>
                        </tr>
                        <tr>
                            <td>Contact Name: <input type="text" name="contactName" readonly
                                    value="<?= isset ($lifechangerform['contactName']) ? $lifechangerform['contactName'] : '' ?>"
                                    placeholder="Contact Name:"></td>
                            <td>Position: <input type="text" name="contactPosition" readonly
                                    value="<?= isset ($lifechangerform['contactPosition']) ? $lifechangerform['contactPosition'] : '' ?>"
                                    placeholder="Position:"></td>
                        </tr>
                        <tr>
                            <td>Email Address:: <input type="text" name="emailAddress" class="form-control" readonly
                                    value="<?= isset ($lifechangerform['emailAddress']) ? $lifechangerform['emailAddress'] : '' ?>"
                                    placeholder="Email Address:"></td>
                            <td>Contact Number: <input type="text" name="contactNumber" class="form-control" readonly
                                    value="<?= isset ($lifechangerform['contactNumber']) ? $lifechangerform['contactNumber'] : '' ?>"
                                    placeholder="Contact Number:"></td>
                        </tr>

                        <!-- <tr>
                            <td colspan="2">If currently employed, have you already tendered your resignation?
                                Yes<input type="text" style="width: 10%;" name="yescuremployed" id="" readonly
                                    value="<?= isset ($lifechangerform['yescuremployed']) && $lifechangerform['yescuremployed'] === 'yes' ? 'checked' : '' ?>">No<input
                                    type="text" style="width: 10%;" name="yescuremployed" id="" readonly
                                    value="<?= isset ($lifechangerform['yescuremployed']) && $lifechangerform['yescuremployed'] === 'no' ? 'checked' : '' ?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">1. If answer is No, are we allowed to conduct the employment verification?
                                Yes<input type="text" style="width: 10%;" name="yescuremployed" id="" readonly
                                    value="<?= isset ($lifechangerform['allowed']) && $lifechangerform['allowed'] === 'yes' ? 'checked' : '' ?>">No<input
                                    type="text" style="width: 10%;" name="yescuremployed" id="" readonly
                                    value="<?= isset ($lifechangerform['allowed']) && $lifechangerform['allowed'] === 'no' ? 'checked' : '' ?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">2. If answer in number 1 is no, please provide details: <input type="text"
                                    style="width: 50%;" name="ifnoProvdtls" readonly
                                    value="<?= isset ($lifechangerform['ifnoProvdtls']) ? $lifechangerform['ifnoProvdtls'] : '' ?>">
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <!-- <div class="line">
                <strong>CONTACT PERSON</strong> (In case of emergency):
                <table class="contactpersontable" style="border-collapse: collapse;
                width: 100%;" border="1">
                    <tbody>
                        <tr>
                            <td>Person to notify in case of emergency: <input type="text" style="width: 40%;" name=""
                                    id="" value="<?= isset($lifechangerform['persontonotif']) ? $lifechangerform['persontonotif'] : '' ?>"></td>
                            <td>Mobile Number: <input type="text" style="width: 60%;" name="" id="" value="<?= isset($lifechangerform['moNo']) ? $lifechangerform['moNo'] : '' ?>"></td>
                        </tr>
                    </tbody>
                </table>
            </div> -->
            <!-- <div class="line">
                <strong>CHARACTER REFERENCES </strong> (Non-relative, not residing in the same address)
                <table class="characterreftable" border="1">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>POSITION / COMPANY</th>
                            <th>CONTACT NUMBER</th>
                            <th>EMAIL ADDRESS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="" id="" value="<?= isset($lifechangerform['n1']) ? $lifechangerform['n1'] : '' ?>" ></td>
                            <td><input type="text" name="" id="" value="<?= isset($lifechangerform['p1']) ? $lifechangerform['n1'] : '' ?>" ></td>
                            <td><input type="text" name="" id="" value="<?= isset($lifechangerform['c1']) ? $lifechangerform['n1'] : '' ?>" ></td>
                            <td><input type="text" name="" id="" value="<?= isset($lifechangerform['e1']) ? $lifechangerform['n1'] : '' ?>" ></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="" id="" value="<?= isset($lifechangerform['n2']) ? $lifechangerform['n2'] : '' ?>" ></td>
                            <td><input type="text" name="" id="" value="<?= isset($lifechangerform['p2']) ? $lifechangerform['p2'] : '' ?>" ></td>
                            <td><input type="text" name="" id="" value="<?= isset($lifechangerform['c2']) ? $lifechangerform['c2'] : '' ?>" ></td>
                            <td><input type="text" name="" id="" value="<?= isset($lifechangerform['e2']) ? $lifechangerform['e2'] : '' ?>" ></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="" id="" value="<?= isset($lifechangerform['n3']) ? $lifechangerform['n3'] : '' ?>" ></td>
                            <td><input type="text" name="" id="" value="<?= isset($lifechangerform['p3']) ? $lifechangerform['p3'] : '' ?>" ></td>
                            <td><input type="text" name="" id="" value="<?= isset($lifechangerform['c3']) ? $lifechangerform['c3'] : '' ?>" ></td>
                            <td><input type="text" name="" id="" value="<?= isset($lifechangerform['e3']) ? $lifechangerform['e3'] : '' ?>" ></td>
                        </tr>
                    </tbody>
                </table>
            </div> -->
            <br>
            <div class="line">
                <strong>GENERAL INFORMATION</strong>
                <div style="display: flex; justify-content: space-between; margin-top: 5px;">
                    <div style="width: 120px; font-size: 11pt; margin: 10px;">
                        <input type="checkbox" id="" name="" value="" <?= isset($lifechangerform['g1y']) && $lifechangerform['g1y'] === 'yes' ? 'checked' : '' ?>>
                        <label for="" style="color:#002161; font-weight: bold;">YES</label>
                        <input type="checkbox" id="" name="" value="" <?= isset($lifechangerform['g1n']) && $lifechangerform['g1n'] === 'no' ? 'checked' : '' ?>>
                        <label for="" style="color:#002161; font-weight: bold;">NO</label><br>
                    </div>
                    <div style="width: 500px; font-size: 8pt;  margin-top: 5px;">
                        <label for="">Have you ever been accused, investigated/arrested, indicated or convicted of any
                            criminal or civil
                            case? If yes, please provide details: <input type="text" name="" id="" value="<?= isset($lifechangerform['accused']) ? $lifechangerform['accused'] : '' ?>"
                                style="width: 300px;"></label>
                    </div>
                </div>
            </div>
            <div class="line">
                <div style="display: flex; justify-content: space-between;">
                    <div style="width: 120px; font-size: 11pt; margin: 10px;">
                        <input type="checkbox" id="" name="" value="" <?= isset($lifechangerform['g2y']) && $lifechangerform['g2y'] === 'yes' ? 'checked' : '' ?>>
                        <label for="" style="color:#002161; font-weight: bold;">YES</label>
                        <input type="checkbox" id="" name="" value="" <?= isset($lifechangerform['g2n']) && $lifechangerform['g2n'] === 'no' ? 'checked' : '' ?>>
                        <label for="" style="color:#002161; font-weight: bold;">NO</label><br>
                    </div>
                    <div style="width: 500px; font-size: 8pt;  margin-top: 5px;">
                        <label for="">Have you ever declared bankruptcy and/or have you ever been declared bankruptcy by
                            regulators/authorities? If yes, please provide details: <input type="text" name="" id="" value="<?= isset($lifechangerform['bankruptcy']) ? $lifechangerform['bankruptcy'] : '' ?>"
                                style="width: 220px;"></label>
                    </div>
                </div>
            </div>
            <div class="line">
                <div style="display: flex; justify-content: space-between;">
                    <div style="width: 120px; font-size: 11pt; margin: 10px;">
                        <input type="checkbox" id="" name="" value="" <?= isset($lifechangerform['g3y']) && $lifechangerform['g3y'] === 'yes' ? 'checked' : '' ?>>
                        <label for="" style="color:#002161; font-weight: bold;">YES</label>
                        <input type="checkbox" id="" name="" value="" <?= isset($lifechangerform['g3n']) && $lifechangerform['g3n'] === 'no' ? 'checked' : '' ?>>
                        <label for="" style="color:#002161; font-weight: bold;">NO</label><br>
                    </div>
                    <div style="width: 500px; font-size: 8pt;  margin-top: 5px;">
                        <label for="">Have you ever been investigated for any administrative case?<br>
                            If yes, please provide details: <input type="text" name="" id="" value="<?= isset($lifechangerform['investigated']) ? $lifechangerform['investigated'] : '' ?>"
                                style="width: 330px;"></label>
                    </div>
                </div>
            </div>
            <div class="line">
                <div style="display: flex; justify-content: space-between;">
                    <div style="width: 120px; font-size: 11pt; margin: 10px;">
                        <input type="checkbox" id="" name="" value="" <?= isset($lifechangerform['g4y']) && $lifechangerform['g4y'] === 'yes' ? 'checked' : '' ?>>
                        <label for="" style="color:#002161; font-weight: bold;">YES</label>
                        <input type="checkbox" id="" name="" value="" <?= isset($lifechangerform['g4n']) && $lifechangerform['g4n'] === 'no' ? 'checked' : '' ?>>
                        <label for="" style="color:#002161; font-weight: bold;">NO</label><br>
                    </div>
                    <div style="width: 500px;; font-size: 8pt;  margin-top: 5px;">
                        <label for="">Have you ever been terminated or forced to resign from any employment or
                            affiliates of any Insurance
                            Company or Financial Institution? If yes, please provide details: <input type="text" name="" value="<?= isset($lifechangerform['terminat']) ? $lifechangerform['terminat'] : '' ?>"
                                id="" style="width: 180px;"></label>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br><br><br>
            <h6 style="text-align: center">Internal</h6>
            <div class="line" style="font-size: 8pt;">
                <p style="font-size: 9pt; font-weight: bold;">That I hereby expressly authorize Allianz PNB Life
                    Insurance, Inc.:</p>

                <ol>to use and process, whether manually or via electronic channels, any and all information I have
                    provided above, including
                    Personal and Sensitive Personal Information, to facilitate, monitor, and improve matters pursuant to
                    my application.
                </ol>
                <ol>
                    to share, transfer, and/or disclose the said information to any of its intermediaries, subsidiaries,
                    affiliates, service
                    providers, partners and government agencies for the said purposes
                </ol>
                <ol>
                    I likewise promise to inform Allianz PNB Life Insurance, Inc. of any change relating to my personal
                    information.
                </ol>
                <p style="font-size: 8pt; justify-content: center;">I further understand and acknowledge that such
                    Personal Information may be used by AZPNBL to comply with its legal or
                    regulatory obligations under applicable local or foreign laws, rules and regulations relating to
                    matters including but not limited to
                    anti-money laundering and tax monitoring/review/reporting.</p>
            </div>

            <div class="line" style="border-style: solid; border-width: 1px; padding: 2px; font-size: 9pt ;">

                I declare that all information supplied above and all other records and documents submitted by me in
                support of this
                application are true and correct to the best of my knowledge and belief. I agree that any false record
                on information
                supplied may result in rejection of this application or if already accepted termination of my contract.
                I agree that a
                photographic copy of this authorization and waiver shall be valid as the original.

            </div>
            <div class="line">
                <div style="margin-top: 10px; text-align: left; float: left;">
                    <input type="text" value="<?= isset($lifechangerform['printedName']) ? $lifechangerform['printedName'] : '' ?>" name="applicantName" id="applicantName" style="margin-right: 200px;"><br>
                    Applicant's Printed Name
                </div>

                <div style="margin-top: 10px; float: left;">
                    <input type="text" value="<?= isset($lifechangerform['botdate']) ? date('M j, Y', strtotime($lifechangerform['botdate'])) : '' ?>"
                    name="date" id="date"><br>
                    Date
                </div>
                <div style="clear: both;"></div>
            </div>
            <br>

            <div class="line">
                <div style="margin-top: 10px; text-align: left;">
                    <div id="signaturePreview" style="max-width: 200px">
                        <img id="signatureImage" src="<?= isset($sign['signature']) ? base_url('uploads/signatures/' . $sign['signature']) : '' ?>" style="max-width: 80%; height: auto; margin: 0">
                    </div>
                    __________________________
                    <span style="display: block;">Signature</span>
                </div>
            </div>
        </div>
        
        
        <div class="download-button-container">

        <button class="btn fa fa-download" onclick="generatePdf()"></button>
                <!-- <button class="btn btn-success download-btn" onclick="generatePDF($lifechangerform['user_id']?? '')" >Download</button> -->
                <button onclick="goBack()" class="back fa fa-backward"></button>

            <script>
            function goBack() {
            window.history.back();
            }
            </script>
        </div>
    </div>

    <script>
        window.jsPDF = window.jspdf.jsPDF;
    function generatePdf() {
    let jsPdf = new jsPDF('p', 'pt', 'a4');
    var htmlElement = document.getElementById('page');
    // you need to load html2canvas (and dompurify if you pass a string to html)
    const opt = {
        callback: function (jsPdf) {
            jsPdf.save("Life Changer_<?= isset($lifechangerform['nickname']) ? $lifechangerform['nickname'] : '' ?>.pdf");
            // to open the generated PDF in browser window
            // window.open(jsPdf.output('bloburl'));
        },
        // margin: [72, 0, 72, 0],
        // autoPaging: 'text',
        // margin: { top: 0, right: 0, bottom: 0.5, left: 0 },
        autoPaging: true, // Enable auto pagination
        html2canvas: {
            allowTaint: true,
            dpi: 300,
            letterRendering: true,
            logging: false,
            scale: .75
        }
    };

    jsPdf.html(htmlElement, opt);
    }
    </script>
    
</body>

</html>