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

    <title>Document</title>
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

    div {
        margin-bottom: 10px;
    }

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

    .page {
        width: 210mm;
        /* A4 width */
        /* height: 297mm;   */
        /* A4 height */
        margin: 20px auto;
        /* Centered on the page */
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        margin-top: 30px;
        font-size: 11pt;
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
    .resident{
        margin-left: 0px;
    }
</style>

<body>
    <div class="page" id="page">
        <div class="content">
            <div class="top">
                REPUBLIC OF THE PHILIPPINES)<br>
                __________________.....)S.S.
            </div><br>
            <div class="topdown">
                <strong><ins style="font-weight:bold;">AFFIDAVIT OF NON FILING</ins></strong><br>
            <br>
            </div>
            <div>
                I, <input type="text"  value="<?= isset ($aonff['name']) ? $aonff['name'] : '' ?>" style="width: 280px; text-align: center">, of legal age, single/married, Filipino, and a<br>
                resident of <input type="text" value="<?= isset ($aonff['place']) ? $aonff['place'] : '' ?>" style="width: 390px; text-align: center"> after having been<br> 
                duly sworn to in accordance with law, hereby depose and say: 
            </div>
            <div style="margin-left: 35px;">
                <ol start="1" style="padding-left: 15px;">
                    <li>I do not have sufficient source of income/unemployed for<input type="text" value="<?= isset ($aonff['reason']) ? $aonff['reason'] : '' ?>" style="width: 80px; text-align: center">;</li>
                </ol>
                <ol start="2" style="padding-left: 15px;">
                    <li>That as a consequence I did not file my Income Tax Return for the past year;</li>
                </ol>
                <ol start="3" style="padding-left: 15px;">
                    <li>That I am executing this affidavit, to attest to the truthfulness of the foregoing<br> 
                        facts and for all legal intents and purposes. <br></li><br>
                </ol>
            </div>
            <div>
            <strong style="margin-left: 45px;">IN WITNESS WHEREOF</strong>, I have hereunto set my hands this <input type="text" value="<?= isset ($aonff['month']) ? $aonff['month'] : '' ?>" style="width: 40px; text-align: center">, day of <input type="text" value="<?= isset ($aonff['day']) ? $aonff['day'] : '' ?>" style="width: 35px; text-align: center">, <br>
                20 <input type="text" value="<?= isset ($aonff['year']) ? $aonff['year'] : '' ?>" style="width: 20px;"> at <input type="text" value="<?= isset ($aonff['witness_place']) ? $aonff['witness_place'] : '' ?>" style="width: 300px; text-align: center">.<br><br>
            </div>
            <div>
                <input type="text" value="<?= isset ($aonff['affiant']) ? $aonff['affiant'] : '' ?>" style="width: 200px; margin-left: 300px; text-align: center"></style><br>
                <p style="margin-left:400px ;">Affiant</p></style>
            </div>
            <div>
                <p style="margin-left: 300px;">CTC No.<input type="text" value="<?= isset ($aonff['ctc_no']) ? $aonff['ctc_no'] : '' ?>" style="width: 150px; text-align: center"></style></p>
                <p style="margin-left: 300px;">Issued on<input type="text" value="<?= isset ($aonff['ctc_issue_date']) ? $aonff['ctc_issue_date'] : '' ?>" style="width: 150px; text-align: center"></style></p>
                <p style="margin-left: 130px;">Issued at<input type="text" value="<?= isset ($aonff['ctc_issue_place']) ? $aonff['ctc_issue_place'] : '' ?>" style="width: 150px; text-align: center"></style></p><br>
            </div>
            <div>
                SUBSCRIBED AND SWORN to before me this <input type="text" value="<?= isset ($aonff['sworn_month']) ? $aonff['sworn_month'] : '' ?>" style="width: 60px; text-align: center"> day of<input type="text" value="<?= isset ($aonff['sworn_day']) ? $aonff['sworn_day'] : '' ?>" style="width: 80px; text-align: center">, 20<input type="text" value="<?= isset ($aonff['sworn_year']) ? $aonff['sworn_year'] : '' ?>" style="width: 30px; text-align: center">at<br>
                <input type="text" value="<?= isset ($aonff['sworn_place']) ? $aonff['sworn_place'] : '' ?>" style="width: 285px; text-align: center">, affiant exhibited to me her Community Tax <br> 
                Certificate as indicated above.
                 <br><br>
            </div>
            <div>
                <p>Doc. No. <input type="text"  style="width: 80px;">;<br>
                Page No. <input type="text"  style="width: 80px;">;<br>
                Book No. <input type="text"  style="width: 80px;">;<br>
                Series of <input type="text"  style="width: 80px;">;</p>
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
</body>
<script>
        window.jsPDF = window.jspdf.jsPDF;
    function generatePdf() {
    let jsPdf = new jsPDF('p', 'pt', 'a4');
    var htmlElement = document.getElementById('page');
    // you need to load html2canvas (and dompurify if you pass a string to html)
    const opt = {
        callback: function (jsPdf) {
            jsPdf.save("AONFF_<?= isset($aonff['applicant_id']) ? $aonff['applicant_id'] : '' ?>.pdf");
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
            scale: .8
        }
    };

    jsPdf.html(htmlElement, opt);
    }
    </script>
</html>