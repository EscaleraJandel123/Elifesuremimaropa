<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        /* background-color: #f0f0f0; */
    }

    .download-button-container {
        position: fixed;
        bottom: 20px;
        /* Adjust as needed */
        right: 20px;
        /* Adjust as needed */
        z-index: 1000;
        /* Ensure the button appears above other content */
    }

    input[type="text"],
        input[type="checkbox"] {
            pointer-events: none;
            background-color: #ffffff;
            /* Optional: change the background color to indicate disabled state */
            text-transform: uppercase;
            text-align: center;
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
    
/* 
    div {
        margin-bottom: 10px;
    } */

    table {
        border-collapse: collapse;
        width: 630px;
        font-size: 9pt;
    }

    table input[type="text"] {
        border: none;
        outline: none;
        width: 98%;
        font-size: 9pt;
        /* background-color: #333; */
    }

    .thick-underline {
        border-bottom: 2px solid #000;
        /* 2px solid underline with black color */
    }


    .dashed-hr {
        border-top: 1px dashed #000;
        /* 1px dashed border with black color */
        margin: 20px 0;
        /* Adjust margin as needed */
    }

    input[type="text"],
    input[type="checkbox"] {
        pointer-events: none;
        background-color: #ffffff;
        /* Optional: change the background color to indicate disabled state */
    }

    .page {
        width: 210mm; /* A4 width */
        /* height: 297mm;  */
        /* A4 height */
        margin: 20px auto; 
        /* Centered on the page */
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 30px; 
        /* Add padding to avoid content touching the edges */
        box-sizing: border-box;
        position: relative;
    }

    /* Add additional styles for your content */
    .content {
        /* Example styles */
        color: #333;
        /* line-height: 1.5; */
        position: relative;
        align-items: center;
        margin-left: 0.5in;
        margin-right: 0.5in;
        font-size: 11pt;
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

    .top {
        justify-content: center;
        text-align: center;
        font-size: 10pt;
    }

    .topdown {
        justify-content: center;
        text-align: center;
        font-size: 11pt;
    }

    .insurancecheck label {
        margin-right: 41px;
        font-size: 11pt;
    }

    input[type="text"] {
        border: none;
        border-bottom: 1px solid black;
        outline: none;

    }

    .IConly {
        border: 1px solid #000;
        /* 1px solid border with black color */
        padding: 5px;
        /* Add padding to create space around the content */
        padding-bottom: 70px;
    }
</style>

<body>
    <div class="page" id="page">
        <div class="content">
            <div class="top">
                <p>Department of Finance <br>
                INSURANCE COMMISSION</p>
            </div>
            <div class="topdown">
                <strong>APPLICATION FOR INSURANCE AGENT,S LICENSE</strong><br>
                <strong style="font-weight: lighter;">(Under Chapter IV, Title I of the Insurance Code)</strong>
            </div>
            <br>
            <hr>
            <div>
                <p>To the Insurance Commissioner:</p>
                <p style="text-indent: 40px;">The undersigned hereby applies for a license under the provisions of Chapter IV, Title I of the
                    Insurance Code, to act as insurance/general agent of <input type="text" name="" id="" style="text-align: center;  font-weight: bold; width:280px " value="Allianz PNB Life Insurance, Inc."><input type="text"> in respect of the kind of insurance indicated herein:
                </p>
            </div>
            <div class="insurancecheck">
                <input type="checkbox" name="" id="" <?= isset($aial['nonLife']) && $aial['nonLife'] === 'nonLife' ? 'checked' : '' ?>> <label for="">NON-LIFE</label>
                <input type="checkbox" name="" id="" <?= isset($aial['life']) && $aial['life'] === 'life' ? 'checked' : '' ?>> <label for="">LIFE</label>
                <input type="checkbox" name="" id="" <?= isset($aial['variableLife']) && $aial['variableLife'] === 'variableLife' ? 'checked' : '' ?>> <label for="">VARIABLE LIFE</label>
                <input type="checkbox" name="" id="" <?= isset($aial['accidentAndHealth']) && $aial['accidentAndHealth'] === 'accidentAndHealth' ? 'checked' : '' ?>> <label for="">ACCIDENT AND
                    HEALTH</label>

                <input type="checkbox" name="" id="" style="margin-left: 140px;" <?= isset($aial['others']) && $aial['others'] === 'others' ? 'checked' : '' ?>><label for="" style="margin-right: 0;">Others (please
                    specify)</label> <input type="text" name="" id=""
                    value="<?= isset($aial['othersSpecification']) ? $aial['othersSpecification'] : '' ?>">
            </div>
            <div>
                <p>and for that purpose submits the following statements and information required herein.</p>
                <div style="justify-items: center; text-align: center;">
                    <input type="text" name="" id="" style="width: 300px;"
                        value="<?= isset($aial['agencyName']) ? $aial['agencyName'] : '' ?>"><br>
                    <label for="">(Agency Name if any)</label>
                </div>
            </div>
            <div style="justify-content: space-between;">
                <ol start="1" style="padding-left: 15px;">
                    <li>Name of Applicant:<input type="text" name="" id="" style="width: 495px;"
                            value="<?= isset($aial['surname']) ? $aial['surname'] : '' ?>, <?= isset($aial['firstName']) ? $aial['firstName'] : '' ?>, <?= isset($aial['middleName']) ? $aial['middleName'] : '' ?>.">
                    </li>
                    <div style="display: flex;align-items: stretch; margin-left: 180px; font-size: 9pt;">
                        <div style="margin-right: 70px;">(Last Name)</div>
                        <div style="margin-right: 70px;">(First Name)</div>
                        <div style="margin-right: 70px;">(Middle Name)</div>
                    </div>
                </ol>
                <ol start="2" style="padding-left: 15px;">
                    <li>Agent Type: <label for="" style="margin-left: 40px;">Ordinary Agent</label>[<input
                            type="checkbox" name="" id="" <?= isset($aial['agentType']) && $aial['agentType'] === 'OrdinaryAgent' ? 'checked' : 'checked' ?>>]
                        <label for="" style="margin-left: 1in;">General Agent</label>[<input type="checkbox" name=""
                            id="" <?= isset($aial['GeneralAgent']) && $aial['GeneralAgent'] === 'GeneralAgent' ? 'checked' : 'checked' ?>>]
                    </li>
                </ol>
            </div>
            <div>
                <span>3. </span><label for="">Home Address: </label>
                <input type="text" name="" id="" style="width: 395px;"
                    value="<?= isset($aial['homeAddress']) ? $aial['homeAddress'] : '' ?>">
                <label for="">Zip: </label>
                <input type="text" name="" id="" style="width: 80px;"
                    value="<?= isset($aial['zipCode']) ? $aial['zipCode'] : '' ?>">
            </div>
            <div>
                <ul><label for="">Business address:</label><input type="text" name="" id="" style="width: 470px;"
                        value="<?= isset($aial['businessAddress']) ? $aial['businessAddress'] : '' ?>"></ul>
                <ul><label for="">TIN: </label><input type="text" name="" id="" style="margin-right: 20px; width: 220px"
                        value="<?= isset($aial['tin']) ? $aial['tin'] : '' ?>">
                    <label for="">Email Adress:</label><input type="text" name="" id="" style="width: 220px;"
                        value="<?= isset($aial['email']) ? $aial['email'] : '' ?>">
                </ul>
            </div>
            <div style="margin-left: 320px;">
                <label for="">Mobile Number:</label><input type="text" name="" id="" style="width: 200px;"
                    value="<?= isset($aial['mobileNumber']) ? $aial['mobileNumber'] : '' ?>">
            </div>
            <div>
                <span>4. </span><label for="">Birth a) Date:</label><input type="text" name="" id=""
                    style="width: 220px;" value="<?= isset($aial['birthDate']) ? $aial['birthDate'] : '' ?>">
                <label for="">b) Place:</label><input type="text" name="" id="" style="width: 245px;"
                    value="<?= isset($aial['birthPlace']) ? $aial['birthPlace'] : '' ?>">
            </div>
            <div>
                <span>5. </span><label for="">Citizenship: </label><input type="text" name="" id=""
                    style="width: 120px;" value="<?= isset($aial['citizenship']) ? $aial['citizenship'] : '' ?>">
                <label for="">Sex: </label><input type="text" name="" id="" style="width: 100px;"
                    value="<?= isset($aial['sex']) ? $aial['sex'] : '' ?>">
                <label for="">Civil Status: </label><input type="text" name="" id="" style="width: 186px;"
                    style="width: 435px;" value="<?= isset($aial['civilStatus']) ? $aial['civilStatus'] : '' ?>">
            </div>
            <div>
                <span>6. </span><label for="">If married, a) Maiden Name:</label><input type="text" name="" id=""
                    value="<?= isset($aial['maidenName']) ? $aial['maidenName'] : '' ?>">
            </div>
            <div>
                <div style="margin-left: 85px;">
                    <label for="">b) Husband's Name: </label> <input type="text" name="" id="" style="width: 230px;"
                        value="<?= isset($aial['husbandsName']) ? $aial['husbandsName'] : '' ?>">
                </div>
            </div>
            <div>
                <ol start="7" style="padding-left: 15px;">
                    <li>If naturalized citizen of the Philippines, give date and
                        place of
                        naturalization and attach photocopy of certificate of naturalization. <input type="text" name=""
                            id=""
                            value="<?= isset($aial['naturalizationDetails']) ? $aial['naturalizationDetails'] : 'N/A' ?>">
                    </li>
                </ol>
            </div>
            <hr class="dashed-hr">
            <div class="IConly">
                <strong><span class="thick-underline">FOR IC USE ONLY</span></strong>
                <div style="margin-top: 10px;">
                    <label for="">Verified by:</label><input type="text" name="" id="" style="width: 150px;">
                    <label for="">Date:</label><input type="text" name="" id="" style="width: 55px;">
                    <label for="">Processed by:</label><input type="text" name="" id="" style="width: 100px;">
                    <label for="">Date:</label><input type="text" name="" id="" style="width: 55px;">
                </div>
                <div>
                    <label for="">Approved by:</label><input type="text" name="" id="" style="width: 170px;">
                    <label for="">Date:</label><input type="text" name="" id="" style="width: 80px;">
                </div>
                <div>
                    <label for="">License Fee: </label><label for="">Date:</label><input type="text" name="" id=""
                        style="width: 70px;">
                    <label for="">OR No.</label><input type="text" name="" id="" style="width: 100px;">
                    <label for="">Date:</label><input type="text" name="" id="" style="width: 55px;">
                    <label for="">CA No.</label><input type="text" name="" id="" style="width: 100px;">

                </div>
                <div>
                    REMARKS:
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br>
            <div style="margin-bottom: 10px;">
                <p>Application for Insurance Agent's License<br>
                    Insurance Commission
                </p>
            </div>
            <ol start="8" style="padding-left: 15px;">
                <li>If applicant is a foreigner, give serial number, date and place of issue
                    of alien certificate of
                    registration (ACR) and the immigrant certificate of residence (ICR) for the current year and attach
                    photocopy of each thereof</label><input type="text" name="" id=""
                        value="<?= isset($aial['foreignerDetails']) ? $aial['foreignerDetails'] : 'N/A' ?>"> </li>
            </ol>
            <span>9. </span>If applicant is a partnership, association or corporation:
            <div style="margin-left: .2in;">
                <ol type="a">
                    <li> Attach a certified true copy of the certificate of registration, articles of partnership,
                        association or incorporation and by-laws: <input type="text" name="" id=""
                            value="<?= isset($aial['certifiedCopyDetails']) ? $aial['certifiedCopyDetails'] : 'N/A' ?>"
                            style="width: 280px;"></li>
                    <li>State percentage of Filipino participation in the partnership, association or corporation:
                    </li>
                    <input type="text" name="" id=""
                        value="<?= isset($aial['filipinoParticipation']) ? $aial['filipinoParticipation'] : 'N/A' ?>"
                        style="width: 550px;">
                </ol>
            </div>
            <ol start="10" style="padding-left: 15px;">
                <li>Any license previously granted to act as insurance/general agent in this country? State name of
                    insurance company represented.</li>
            </ol>

            <table border="1">
                <thead>
                    <tr>
                        <th style="width: 206px;">Company</th>
                        <th>License Type</th>
                        <th>License No.</th>
                        <th>Year issued/renewed</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['company1']) ? $aial['company1'] : 'N/A' ?>"></td>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['licenseType1']) ? $aial['licenseType1'] : '' ?>"></td>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['licenseNo1']) ? $aial['licenseNo1'] : '' ?>"></td>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['yearIssued1']) ? $aial['yearIssued1'] : '' ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['company2']) ? $aial['company2'] : 'N/A' ?>"></td>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['licenseType2']) ? $aial['licenseType2'] : '' ?>"></td>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['licenseNo2']) ? $aial['licenseNo2'] : '' ?>"></td>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['yearIssued2']) ? $aial['yearIssued2'] : '' ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['company3']) ? $aial['company3'] : 'N/A' ?>"></td>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['licenseType3']) ? $aial['licenseType3'] : '' ?>"></td>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['licenseNo3']) ? $aial['licenseNo3'] : '' ?>"></td>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['yearIssued3']) ? $aial['yearIssued3'] : '' ?>"></td>
                    </tr>
                </tbody>
            </table>
            <ol start="11" style="padding-left: 15px;">
                <li>Have your filed your income tax return for the preceding year?<input type="text" name="" id=""
                        value="NO" style="width: 40px;">
                    If not give reason.<input type="text" name="" id="" value="PANDEMIC" style="width: 380px;">.</li>
            </ol>
            <ol start="12" style="padding-left: 15px;">
                <li>in the blanks below, state your last (2) employers</li>
            </ol>
            <table border="1">
                <thead>
                    <tr>
                        <th style="width: 300px;">Name of Employer</th>
                        <th>Position</th>
                        <th>Inclusive Dates</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['employer1']) ? $aial['employer1'] : '' ?>"></td>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['position1']) ? $aial['position1'] : '' ?>"></td>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['dates1']) ? date('M j, Y', strtotime($aial['dates1'])) : '' ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['employer2']) ? $aial['employer2'] : '' ?>"></td>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['position2']) ? $aial['position2'] : '' ?>"></td>
                        <td><input type="text" name="" id=""
                                value="<?= isset($aial['dates2']) ? date('M j, Y', strtotime($aial['dates2'])) : '' ?>">
                        </td>
                    </tr>
                </tbody>
            </table>
            <ol start="13" style="padding-left: 15px;">
                <li>Are you an official or an employee of an insurance company or broker?<input type="text" name=""
                        id="" value="NO" style="width: 40px;">
                    If yes, give the position held:<input type="text" name="" id="" value="N/A" style="width: 380px;">.
                </li>
            </ol>
            <ol start="12" style="padding-left: 15px;">
                <li>Are you a government employee?<input type="text" name="" id="" value="NO" style="width: 40px;">
                    ; if yes, attach the necessary clearance/permission from
                    the Head of the Department or Agency in accordance with Section 18, of Memorandum Circular No.
                    15, series of 1999 of the Civil Service Commission
                </li>
            </ol>
            <div>
                Executed this<input type="text" name="" id="" style="width: 50px;"
                    value="<?= isset($aial['date']) ? $aial['date'] : '' ?>">day of <input type="text" name="" id=""
                    style="width: px;" value="<?= isset($aial['month2']) ? $aial['month2'] : '' ?>">20<input type="text"
                    name="" id="" style="width: 50px;" value="<?= isset($aial['year']) ? $aial['year'] : '' ?>">, at
                <input type="text" name="" id="" style="width: 180px;"
                    value="<?= isset($aial['place']) ? $aial['place'] : '' ?>">
            </div>
            <br>
            <br>
            <div style="text-align: right; ">
                <input type="text" name="" id="" style="width: 190px; text-align: center"
                    value="<?= isset($aial['applicantName']) ? $aial['applicantName'] : '' ?>"><br>
                <span style="margin-right: 65px;">Applicant</span>
            </div>


            
            <div style="margin-top: 400px">
                <p style="font-size: 10pt;">Application for Insurance Agent's License <br>
                    Insurance Commission</p>
            </div>

            <div style="text-align: center; margin-top: 80px; margin-bottom: 20px;">
                <strong><ins>AFFIDAVIT OF VERIFICATION</ins></strong>
            </div>
            <div>
                Republic of the Philippines) <br>
                Province/City of <input type="text" name="" id="" style="width: 65px;"
                    value="<?= isset($aial['provinceCity']) ? $aial['provinceCity'] : '' ?>">)S.S
            </div>
            <div>
                I. <input type="text" name="" id="" style="width: 280px;"
                    value="<?= isset($aial['applicantName']) ? $aial['applicantName'] : '' ?>">, being duly sworn,
                depose and say that I am
                the
                person named in and who signed the foregoing application; that I know the contents thereof and the
                statements made and answers to question therein are true.
            </div>
            <div style="text-align: right;">
                <input type="text" name="" id="" style="width: 190px;"
                    value="<?= isset($aial['affiant']) ? $aial['affiant'] : '' ?>"><br>
                <span style="margin-right: 70px;">Affiant</span>
            </div>
            <div style="text-align: right;">
                <label for="">TIN</label>
                <input type="text" name="" id="" style="width: 160px;"
                    value="<?= isset($aial['tin2']) ? $aial['tin2'] : '' ?>">
            </div>
            <div style="text-align: right;">
                <label for="">SSS No.</label>
                <input type="text" name="" id="" style="width: 126px;"
                    value="<?= isset($aial['sss']) ? $aial['sss'] : '' ?>">
            </div>
            <p style="text-indent: 40px;">SUBSCRIBED AND SWORN TO before me this <input type="text" name="" id=""
                    style="width: 40px;" value="<?= isset($aial['day']) ? $aial['day'] : '' ?>"> day of <input
                    type="text" name="" id="" style="width: 120px;"
                    value="<?= isset($aial['month']) ? $aial['month'] : '' ?>">20 <input type="text" name="" id=""
                    style="width: 40px;" value="<?= isset($aial['year2']) ? $aial['year2'] : '' ?>">Affiant/s exhibited
                to me his/her
                TIN/SSS/Passport/Postal/LTO/<input type="text" name="" id="" style="width: 225px;"
                    value="<?= isset($aial['place']) ? $aial['place'] : '' ?>"></p>
            <br><br>
            <div style="text-align: right; margin-right: 130px;">
                Notary Public
            </div>

            <div>
                <label style="margin-right: 40px;" for="">Doc. No.</label><input type="text" name="" id=""
                    style="width: 60px;"><br>
                <label style="margin-right: 32px;" for="">Page No.</label> <input type="text" name="" id=""
                    style="width: 60px;"><br>
                <label style="margin-right: 38px;" for="">Book No.</label><input type="text" name="" id=""
                    style="width: 60px;"><br>
                <label style="margin-right: 15px;" for="">Series of 20 </label><input type="text" name="" id=""
                    style="width: 60px;"><br>
            </div>
            <br>
            <hr>
            <div>
                <p style="text-indent: 40px;">APPROVED AND COUNTERSIGNED for <input
                        style="width: 320px; text-align: center;" type="text" name="" id=""
                        value="Allianz PNB Life Insurance, Inc.">for the solicitation or procurement of application for
                    life/variable/non-life insurance</p>

                <div style="text-align: right; ">
                    <input type="text" name="" id="" style="width: 295px;"><br>
                    <span style="margin-right: 15px;">Authorized Representative of the Company</span>
                </div>
                <br><br>
                <div>
                    Note: This form may be revised without prior notice
                </div>
                <br><br>
                
                <div style="margin-top: 400px">Application for Insurance Agent's License <br>
                    Insurance Commission
                </div>
                <div style="text-align: center;">
                    <strong><ins>CERTIFICATE OF WAIVER</ins></strong>
                </div>
                <div style="text-align: justify; font-size: 10.5pt;">
                    WE HEREBY CERTIFY:
                    <p style="text-indent: 0.5in;">That we know the applicant <input style="width: 300px;" type="text"
                            name="" id="" value="<?= isset($aial['applicant']) ? $aial['applicant'] : '' ?>">, that a
                        thorough
                        investigation has been made into his/her character, conduct and fitness; he/she is of good moral
                        character and worthy of a Certificate of Authority, and that he/she has had experience in each
                        of the
                        kinds of insurance he/she proposes to write or solicit under the Certificate of Authority
                        applied for.</p>

                    <p style="text-indent: 0.5in;">That we have communicated with the former and present employees of
                        the applicant and the
                        replies have been satisfactory.
                    </p>
                    <p style="text-indent: 0.5in;">That to the best of our knowledge, information and belief, all
                        statements and answer contained
                        in the application have been in the handwriting of the applicant with respect to the questions
                        applicable
                        to him/her.</p>
                    <p style="text-indent: 0.5in;">If and when the agency is terminated, written notice thereof will be
                        given forthwith to the
                        Insurance Commission together with the reason therefore.
                    </p>
                    <p style="text-indent: 0.5in;">In consideration of the Certificate of Authority to be issued to the
                        above-mentioned applicant,
                        under the provision of Section 299 of the Insurance Code, we hereby waive, on behalf of –
                    </p>
                </div>
                <br>
                <div class="topdown">
                    <strong><ins>APPLICATION FOR INSURANCE INC</ins></strong><br>
                    <strong style="font-weight: lighter;">(Company Name)</strong>
                </div>
                <div style="text-align: justify; font-size: 10.5pt;">the right to appeal to the Secretary of Finance in
                    case of revocation by the Insurance Commissioner of
                    the certificate to be issued in favor of the above-mentioned applicant and agree to cancel at once
                    the
                    contract of agency between said applicant and the company upon receipt of the notice of revocation.
                </div>
                <div>
                    <p style="text-indent: 0.5in">Executed in <input type="text" name="" id=""
                            value="<?= isset($aial['place2']) ? $aial['place2'] : '' ?>">on<input style="width: 316px;"
                            type="text" name="" id="" value="<?= isset($aial['date2']) ? $aial['date2'] : '' ?>"></p>
                </div>
                <div style="margin-left: 355px;">
                    <p>TIN <ins>204-145-589-000</ins></p>
                    <p>By <input style="width: 257px;" type="text" name="" id=""
                            value="<?= isset($aial['authorizedRepresentative']) ? $aial['authorizedRepresentative'] : '' ?>">
                        Authorized Representative of the Company</p>
                </div>
                <br>
                <div style="text-align: justify; font-size: 10pt;">
                    N.B. No person, partnership, association or corporation required by Law to file an income tax return
                    shall be
                    issued a license to engage in any trade, business or occupation o practice a profession unless he
                    shall have
                    presented to the officer issuing such license or permit proof that he has filed his income tax
                    return during the
                    preceding year and that income taxes due have been paid thereon. For the purpose of this Act, a copy
                    of such
                    income tax return on which is shown a certification or statement by the Collector of Internal
                    Revenue or his duty
                    authorized representative that the aforesaid income tax return, and the corresponding receipts
                    showing payment
                    of all income taxes due thereon, shall be sufficient proof.
                </div><br>
                <div style="text-align: justify;font-size: 10pt;">
                    Any person, partnership, association or corporation who obtains a license mentioned in the preceding
                    paragraph
                    without presenting the aforementioned certification of the Collector of Internal Revenue or his duly
                    authorized
                    representative, under the pretext that he or it is not required by law to file an income tax return
                    when in truth he or
                    it is so required, or under any other misrepresentation, shall be liable to fine of not more than
                    Five Hundred
                    Pesos, or imprisonment of not more than one year or both, in the discretion of the Court. In case of
                    partnership,
                    association, the manager or the equivalent officer thereof shall be held responsible and in
                    addition, the license
                    shall be revoked. (Section 1, Republic Act No. 1538)
                </div>
                <div style="font-size: 10pt;">
                    <p><b>IC-LLI-DP-002-F-01 <br>
                            Rev.1</b></p>
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
    </div>
    <script>
        window.jsPDF = window.jspdf.jsPDF;
    function generatePdf() {
    let jsPdf = new jsPDF('p', 'pt', 'a4');
    var htmlElement = document.getElementById('page');
    // you need to load html2canvas (and dompurify if you pass a string to html)
    const opt = {
        callback: function (jsPdf) {
            jsPdf.save("AIAL_<?= isset($aial['user_id']) ? $aial['user_id'] : '' ?>.pdf");
            // to open the generated PDF in browser window
            // window.open(jsPdf.output('bloburl'));
        },
        // margin: [36, 0, 36, 0],
        // autoPaging: 'text',
        autoPaging: true, // Enable auto pagination
        html2canvas: {
            allowTaint: true,
            dpi: 300,
            letterRendering: true,
            logging: false,
            scale: 0.75
        }
    };

    jsPdf.html(htmlElement, opt);
    }
    </script>

</body>

</html>