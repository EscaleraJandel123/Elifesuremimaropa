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
    }

    .download-button-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }

    input[type="text"],
    input[type="checkbox"] {
        pointer-events: none;
        background-color: #ffffff;
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

    .back:hover {
        background-color: darkred;
    }

    .page {
        width: 297mm;
        /* A4 landscape width */
        height: 210mm;
        /* A4 landscape height */
        margin: 20px auto;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
        padding: 30px;
        box-sizing: border-box;
        position: relative;
    }

    .content {
        color: #333;
        line-height: 1.5;
        position: relative;
        margin: 0.5in;
    }

    .head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    h1 {
        font-size: 24px;
    }

    .download-button-container {
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
        padding: 8px;
    }

    th,
    td {
        text-align: left;
    }

    .line {
        justify-content: space-between;
        font-size: 9pt;
        padding-bottom: 10px;
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

    .educationaltable input[type="text"],
    .employmenthistorytable input[type="text"],
    .recentemployertable input[type="text"],
    .characterreftable input[type="text"] {
        border: none;
        outline: none;
        width: 98%;
        font-size: 9pt;
    }

    input[type="text"] {
        border: none;
        border-bottom: 1px solid black;
        outline: none;
    }

    .educationaltable,
    .employmenthistorytable,
    .recentemployertable,
    .characterreftable {
        border-collapse: collapse;
        width: 100%;
    }

    .employmenthistorytable td:first-child,
    .recentemployertable td:first-child {
        width: 120px;
        height: 30px;
    }

    @media screen and (max-width: 768px) {
        .content {
            flex-direction: column;
            align-items: flex-start;
            margin: 20px;
        }
    }
    </style>
</head>

<body>

    <div class="page" id="page">
        <div>
            <div>
                <img src="<?= base_url() ?>uploads/upper.png" alt="Responsive Image"
                    style="max-width: 100%; height: auto; object-fit: cover;">
            </div>
            <table>
                <tr>
                    <td colspan="12"
                        style="font-size: 18px; font-family: Arial, sans-serif; font-weight: bold; text-align: center; vertical-align: middle; line-height: .2; background-color: #16163b; color: white;">
                        ENROLLMENT FORM FOR MEMBERSHIP IN THE GROUP LIFE INSURANCE PLAN
                    </td>
                </tr>
                <tr>
                    <td colspan="12"
                        style="font-size: 15px; font-family: Arial, sans-serif; font-weight: bold; text-align:left; font-style: italic; vertical-align: middle; line-height: .2;">
                        A. Personal Information of Applicant</td>
                </tr>
                <tr>
                    <td colspan="3"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                        Last Name</td>
                    <td colspan="3"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                        First Name</td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                        Middle Name</td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        Date of Birth (MM/DD/YY)</td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        Occupation</td>
                </tr>
                <tr>
                    <td colspan="3"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['lastName']) ? $gli['lastName'] : '' ?>
                    </td>
                    <td colspan="3"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['firstName']) ? $gli['firstName'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['middleName']) ? $gli['middleName'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['dateOfBirth']) ? $gli['dateOfBirth'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['occupation']) ? $gli['occupation'] : '' ?>
                    </td>
                </tr>

                <td colspan="4"
                    style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                    Name of Company</td>
                <td colspan="3"
                    style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                    Nature of Business</td>
                <td colspan="1"
                    style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                    Sex</td>
                <td colspan="2"
                    style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                    Civil Status</td>
                <td colspan="2"
                    style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                    Nationality</td>
                </tr>
                <tr>
                    <td colspan="4"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['companyName']) ? $gli['companyName'] : '' ?>
                    </td>
                    <td colspan="3"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['businessNature']) ? $gli['businessNature'] : '' ?>
                    </td>
                    <td colspan="1">
                        <input type="checkbox"
                            style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;"
                            <?= (isset($gli['sex']) && $gli['sex'] == 'Male') ? 'checked' : '' ?>>
                        Male <br>
                        <input type="checkbox"
                            style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;"
                            <?= (isset($gli['sex']) && $gli['sex'] == 'Female') ? 'checked' : '' ?>>
                        Female
                    </td>
                    <td colspan="2">
                        <input type="checkbox"
                            style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;"
                            <?= (isset($gli['civilStatus']) && $gli['civilStatus'] == 'Single') ? 'checked' : '' ?>>
                        Single&nbsp;&nbsp;
                        <input type="checkbox"
                            style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;"
                            <?= (isset($gli['civilStatus']) && $gli['civilStatus'] == 'Divorced') ? 'checked' : '' ?>>
                        Divorced<br>
                        <input type="checkbox"
                            style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;"
                            <?= (isset($gli['civilStatus']) && $gli['civilStatus'] == 'Married') ? 'checked' : '' ?>>
                        Married
                        <input type="checkbox"
                            style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;"
                            <?= (isset($gli['civilStatus']) && $gli['civilStatus'] == 'Widowed') ? 'checked' : '' ?>>
                        Widowed
                    </td>

                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['nationality']) ? $gli['nationality'] : '' ?>
                    </td>
                </tr>






                <tr>
                    <td rowspan="4"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        Address</td>
                    <td colspan="9"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                        Residence (No., Street, Subdivision/Village, District,
                        Municipality/City)</td>
                    <td colspan="3"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        Telephone Number</td>
                </tr>
                <tr>
                    <td colspan="9"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['residenceAddress']) ? $gli['residenceAddress'] : '' ?>
                    </td>
                    <td colspan="3"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['residenceTelephone']) ? $gli['residenceTelephone'] : '' ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="9"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                        Business/Office (Building Name, Street, Village, Municipality/City)</td>
                    <td colspan="3"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        Telephone Number</td>
                </tr>
                <tr>
                    <td colspan="9"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['businessAddress']) ? $gli['businessAddress'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['businessTelephone']) ? $gli['businessTelephone'] : '' ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="12"
                        style="font-size: 10pt; font-family: Arial, sans-serif; font-weight: bold; text-align:left; font-style: italic; vertical-align: middle; line-height: .3;;">
                        B. Beneficiary/ies: It is understood that the beneficiaries share
                        equally and are designated
                        primary and revocable unless indicated otherwise in the "Remarks" column
                    </td>
                </tr>



                <tr>
                    <td colspan="5"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        Name of Beneficiary/ies (Last, First, Middle)</td>
                    <td colspan="3"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        Date of Birth (MM/DD/YY)</td>
                    <td rowspan="2" colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        Relationship</td>
                    <td rowspan="2" colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        Remarks</td>
                </tr>
                <tr>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        (First)</td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        M.I.</td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        (Last)</td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        MM</td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        DD</td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        YY</td>
                </tr>
                <!-- EMPTY BOX -->
                <tr>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['firstName1']) ? $gli['firstName1'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['mi1']) ? $gli['mi1'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['lastName1']) ? $gli['lastName1'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['month1']) ? $gli['month1'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['day1']) ? $gli['day1'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['year1']) ? $gli['year1'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['relationship1']) ? $gli['relationship1'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['remarks1']) ? $gli['remarks1'] : '' ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['firstName2']) ? $gli['firstName2'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['mi2']) ? $gli['mi2'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['lastName2']) ? $gli['lastName2'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['month2']) ? $gli['month2'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['day2']) ? $gli['day2'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['year2']) ? $gli['year2'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['relationship2']) ? $gli['relationship2'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['remarks2']) ? $gli['remarks2'] : '' ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['firstName3']) ? $gli['firstName3'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['mi3']) ? $gli['mi3'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['lastName3']) ? $gli['lastName3'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['month3']) ? $gli['month3'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['day3']) ? $gli['day3'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['year3']) ? $gli['year3'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['relationship3']) ? $gli['relationship3'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['remarks3']) ? $gli['remarks3'] : '' ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['firstName4']) ? $gli['firstName4'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['mi4']) ? $gli['mi4'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['lastName4']) ? $gli['lastName4'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['month4']) ? $gli['month4'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['day4']) ? $gli['day4'] : '' ?>
                    </td>
                    <td colspan="1"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['year4']) ? $gli['year4'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['relationship4']) ? $gli['relationship4'] : '' ?>
                    </td>
                    <td colspan="2"
                        style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:center;  vertical-align: middle; line-height: .2;">
                        <?= isset($gli['remarks4']) ? $gli['remarks4'] : '' ?>
                    </td>
                </tr>
                <!-- END EMPTY BOX -->

                <tr>
                    <td colspan="12"
                        style="font-size: 11pt; font-family: Arial, sans-serif;  text-align:left;  vertical-align: middle; line-height: .9;letter-spacing: -1px;">
                        Trustee for minor beneficiary/ies:
                        <?= isset($gli['trusteeMinorBeneficiary']) ? $gli['trusteeMinorBeneficiary'] : '' ?>
                    </td>
                </tr>
            </table>
            <p style="font-size: 10pt; font-family: Arial, sans-serif;  text-align:justify;  vertical-align: middle;">
                I hereby apply for participation in the group life insurance plan for which I am or may
                become
                eligible for subject to the terms and conditions of the Group Policy. I further agree
                that my
                insurance shall become effective on the date stated on the certificate to be issued to
                me by Allianz
                PNB Life Insurance, Inc. provided that I am actively at work on such date and the
                premium
                corresponding to my insurance has been paid. I authorize Allianz PNB Life Insurance,
                Inc. to process
                the information I have provided in accordance with the Data Privacy Act.
            </p>

            <p>Signed at <input type="text" style="width: 300px;" id="place" name="place"
                    value="<?= isset($gli['place']) ? $gli['place'] : '' ?>" readonly>
                this <input type="text" style="width: 250px;" id="day" name="day"
                    value="<?= isset($gli['day']) ? $gli['day'] : '' ?>" readonly>
                day of <input type="text" style="width: 250px;" id="month" name="month"
                    value="<?= isset($gli['month']) ? $gli['month'] : '' ?>" readonly>,
                <input type="text" style="width: 50px;" id="year" name="year"
                    value="<?= isset($gli['year']) ? $gli['year'] : '' ?>" readonly>.
            </p>
            <p
                style="font-size: 18px; font-family: Arial, sans-serif; text-align:left; font-style: italic; vertical-align: middle; line-height: .2;margin-top: 40px;">
                FDAS-GAD-FOR-GTLAPP-2016-08</p>
        </div>

        <!-- <div class="line"
            style="display: flex; justify-content: space-between; align-items: flex-end; margin-top: -60px;">
            <p
                style="font-size: 18px; font-family: Arial, sans-serif; font-style: italic; line-height: .2; margin-top: 40px;">
                FDAS-GAD-FOR-GTLAPP-2016-08
            </p>
            <div style="margin-top: 10px; text-align: center;">
                <div id="signaturePreview" style="max-width: 200px; margin-bottom: -30px;">
                    <img id="signatureImage"
                        src="<?= isset($sign['signature']) ? base_url('uploads/signatures/' . $sign['signature']) : '' ?>"
                        style="max-width: 80%; height: auto;">
                    <input type="text" value="<?= isset($sou['name']) ? $sou['name'] : '' ?>"
                        style="display: block; width: 100%; margin-top: 10px;">
                </div>
                <span style="display: block; margin-top: 30px;">Printed Name and Signature of Applicant</span>
            </div>
        </div> -->

        <div class="line" style="float:right;margin-top:-60px">
            <div style="margin-top: 10px; ">
                <div id="signaturePreview" style="max-width: 200px;">
                    <img id="signatureImage"
                        src="<?= isset($sign['signature']) ? base_url('uploads/signatures/' . $sign['signature']) : '' ?>"
                        style="max-width: 80%; height: auto; margin-bottom: -30px;">
                    <input type="text" value="<?= isset($sou['name']) ? $sou['name'] : '' ?>">
                </div>
                <span style="display: block;">Printed Name and Signature of Applicant</span>
            </div>
        </div>


        <div class="download-button-container">
            <button class="btn fa fa-download" onclick="generatePdf()"></button>
            <button onclick="goBack()" class="back fa fa-backward"></button>
        </div>
    </div>

    <script>
    window.jsPDF = window.jspdf.jsPDF;

    function generatePdf() {
        let jsPdf = new jsPDF('l', 'pt', 'a4'); // 'l' for landscape
        var htmlElement = document.getElementById('page');
        const opt = {
            callback: function(jsPdf) {
                window.open(jsPdf.output('bloburl'));
                // jsPdf.save("Life_Changer_<?= isset($lifechangerform['user_id']) ? $lifechangerform['user_id'] : '' ?>.pdf");
            },
            autoPaging: true,
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

    function goBack() {
        window.history.back();
    }
    </script>

</body>

</html>