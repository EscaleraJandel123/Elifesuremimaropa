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
    <title>Statement of Undertaking</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial';
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
            background-color: #007bff;
            /* Blue background color */
            border: none;
            color: #fff;
            /* White text color */
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
            background-color: #0056b3;
            /* Darker blue color on hover */
        }

        /* Optional: Add more specific styles for different screen sizes */
        @media screen and (max-width: 768px) {
            .back-button {
                font-size: 14px;
                /* Adjust font size for smaller screens */
                padding: 8px 16px;
                /* Adjust padding for smaller screens */
            }
        }

        .page {
            width: 210mm;
            /* A4 width */
            /* height: 297mm; */
            /* A4 height */
            margin: 20px auto;
            /* Centered on the page */
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Adding a shadow for visual effect */
            padding: 0.1pt;
            /* Add padding to avoid content touching the edges */
            box-sizing: border-box;
            /* Include padding and border in the element's total width and height */
            position: relative;
        }

        .content {
            /* Example styles */
            color: #333;
            line-height: 1.5;
            position: relative;
            align-items: center;
            margin-left: 0.5in;
            margin-right: 0.5in;
            text-align: justify;
            font-size: 11pt;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            /* Adjust as needed */
            padding: 10px 0;
            /* Adjust as needed */
        }

        .Internal {
            flex-grow: 1;
            /* Allow the Internal div to grow and take up remaining space */
        }

        .Internal h6 {
            text-align: center;
            margin-left: 130px;
        }

        .logo img {
            max-height: 70px;
            /* Adjust as needed */
            /* Optional: Add other styling properties as needed */
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

        .logo {
            color: #327bbe;
            /* line-height: 1.5; */
            margin: 0;
        }


        input[type="text"] {
            border: none;
            border-bottom: 1px solid black;
            outline: none;

        }

        .topdown {
            justify-content: center;
            text-align: center;
            font-size: 11pt;
        }

        /* .lo {
            float: right
        } */
    </style>
</head>

<body>

    <div class="page" id="page">
        <div class="content">
            <div class="header">
                <div class="Internal">
                    <h6>Internal</h6>
                </div>
                <div class="logo">
                    <img src="<?= base_url() ?>uploads/logo.png" alt="Logo">
                </div>
            </div>
            <br><br><br>
            <div class="topdown">
                <strong style="font-size: 120%;">Statement of Undertaking</strong><br>
                <strong style="font-size: 120%;">Submission of Hard Copies of Application Forms</strong><br><br>
            </div>
            <div class="laman">
                <p>I, <input style="width: 200px;" type="text" name="" id=""
                        value="<?= isset($sou['name']) ? $sou['name'] : '' ?>">(Name) in
                    my capacity as<input style="width: 130px;" type="text" name="" id=""
                        value="<?= isset($sou['position']) ? $sou['position'] : '' ?>">(Intm. Position)
                    at ALLIANZ PNB LIFE INSURANCE, INC. (the, “Company”), hereby undertake the responsibility
                    of ensuring the timely submission of hard copies of the application forms of the clients as
                    required by Insurance Commission Circular Letter (IC CL) No. 2013-33 (also known as the,
                    “Market Conduct Guidelines”) within the period set by the Company.
                    duly sworn to in accordance with law, hereby depose and say:
                </p>

                <p>I understand that any delays in submitting the hard copies of the
                    application forms could
                    potentially impact the overall process and the experience of our clients. Therefore, I pledge to
                    take all necessary actions to ensure that the hard copies of the application forms are delivered
                    within the specified timeframe.
                </p>
                <p>Furthermore, I acknowledge and fully understand that any untoward
                    incident or negative
                    consequences that may arise as a result of unsubmitted or delayed submission of the hard copies
                    of application forms shall be my responsibility. Accordingly, I commit to bearing any costs,
                    liabilities, or damages that may result from such incidents.
                </p>
                <p>I am fully committed to maintaining clear communication, monitoring
                    the progress, and
                    addressing any potential obstacles that may arise during the submission process. I will keep the
                    Company informed of the status of each submission and promptly address any concerns or
                    queries.
                </p>
                <p>By signing this Statement of Undertaking, I affirm my dedication to
                    upholding the standards of
                    professionalism, timeliness, and reliability in all my interactions with the Company. I
                    understand
                    the importance of this commitment and is fully prepared to fulfill my responsibilities as
                    outlined
                    in this undertaking.
                </p>
            </div>
            <br>
            <div style="margin-top: 10px; text-align: left;">
                <div id="signaturePreview" style="max-width: 200px">
                    <img id="signatureImage"
                        src="<?= isset($sign['signature']) ? base_url('uploads/signatures/' . $sign['signature']) : '' ?>"
                        style="max-width: 80%; height: auto; margin: 0">
                </div>
                <input type="text" value="<?= isset($sou['name']) ? $sou['name'] : '' ?>">
                <span style="display: block;">Signature over Printed Name</span>
                Date of Signature: <?= isset($sou['updated_at']) ? date('M j, Y', strtotime($sou['updated_at'])) : '' ?>
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
                jsPdf.save("SOU_<?= isset($sou['applicant_id']) ? $sou['applicant_id'] : '' ?>.pdf");
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

</html>