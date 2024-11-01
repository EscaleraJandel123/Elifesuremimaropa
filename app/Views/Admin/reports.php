<!doctype html>
<html lang="en">

<?= view('head') ?>
<style>
    .table-responsive {
        position: relative;
    }

    .table thead.sticky-top {
        top: 5px;
        /* Adjust based on the height of the header or navbar */
        z-index: 1;
        /* Ensure it's below other important components */
    }
</style>

<body>
    <?= view('Admin/chop/header') ?>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
                <div class="position-sticky py-4 px-3 sidebar-sticky">
                    <ul class="nav flex-column h-100">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/AdDash">
                                <i class="bi-house-fill me-2"></i>
                                Overview
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/usermanagement">
                                <i class="fa fa-user me-2"></i>
                                User Management
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/Forms">
                                <i class="bi bi-file-earmark-slides me-2"></i>
                                Forms
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/promotion">
                                <i class="fa fa-user me-2"></i>
                                Promotion
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/confirmation">
                                <i class="bi bi-check-lg me-2"></i>
                                Confirmation
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/sched">
                                <i class="bi bi-check-lg me-2"></i>
                                Schedule
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/ManageClients">
                                <i class="fas fa-user-tie me-2"></i>
                                Clients
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/ManageAgent">
                                <i class="fas fa-user-tie me-2"></i>
                                Agents
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/ManageApplicant">
                                <i class="fa fa-users me-2"></i>
                                Applicants
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/reports">
                                <i class="fas fa-file-alt me-2"></i></i>
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/map">
                                <i class="bi bi-map me-2"></i>
                                Maps
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="/plans">
                                <i class="bi bi-hospital me-2"></i>
                                Plans
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
                <div class="title-group mb-3 d-flex justify-content-between align-items-center">
                    <h1 class="h2 mb-0">Reports</h1>
                    <div>
                        <input type="month" id="report-month" class="form-control d-inline-block" style="width: auto;">
                        <button id="generate-report-btn" class="btn btn-primary ms-2">Generate Report</button>
                    </div>
                </div>
                <div class="row">
                    <!-- left and right table columns -->
                    <div class="col-lg-6 mb-3">
                        <div class="card">
                            <div class="table-responsive mx-3">
                                <h5 class="card-title mt-3">Agents</h5>
                                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-hover" id="agents-table">
                                        <thead class="table-light sticky-top">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Birthday</th>
                                                <th scope="col">Contact</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($agents as $agent): ?>
                                                <tr>
                                                    <td><?= $agent['lastname'] ?>, <?= $agent['firstname'] ?>
                                                        <?= $agent['middlename'] ?>.
                                                    </td>
                                                    <td><?= $agent['birthday'] ?></td>
                                                    <td><?= $agent['number'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Applicants Table -->
                    <div class="col-lg-6 mb-3">
                        <div class="card">
                            <div class="table-responsive mx-3">
                                <h5 class="card-title mt-3">Applicants</h5>
                                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-hover" id="applicants-table">
                                        <thead class="table-light sticky-top">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Birthday</th>
                                                <th scope="col">Contact</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($applicants as $applicant): ?>
                                                <tr>
                                                    <td><?= $applicant['lastname'] ?>, <?= $applicant['firstname'] ?>
                                                        <?= $applicant['middlename'] ?>.
                                                    </td>
                                                    <td><?= $applicant['birthday'] ?></td>
                                                    <td><?= $applicant['number'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Top Reqruiters  -->
                    <div class="col-lg-6 mb-3">
                        <div class="card">
                            <div class="table-responsive mx-3">
                                <h5 class="card-title mt-3">Top Recruiters</h5>
                                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-hover" id="top-recruiters-table">
                                        <thead class="table-light sticky-top">
                                            <tr>
                                                <th scope="col">Rank</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">No. of Recruits</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($top as $topagent): ?>
                                                <tr>
                                                    <td><?= $topagent['ranking'] ?></td>
                                                    <td><?= $topagent['lastname'] ?>, <?= $topagent['firstname'] ?>
                                                        <?= $topagent['middlename'] ?>.
                                                    </td>
                                                    <td><?= $topagent['total_fA'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- top commissioner -->
                    <div class="col-lg-6 mb-3">
                        <div class="card">
                            <div class="table-responsive mx-3">
                                <h5 class="card-title mt-3">Awardee</h5>
                                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-hover" id="awardee-table">
                                        <thead class="table-light sticky-top">
                                            <tr>
                                                <th scope="col">Top</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Total Commi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($top_commi as $topagent): ?>
                                                <tr>
                                                    <td><?= $topagent['ranking'] ?></td>
                                                    <td><?= $topagent['lastname'] ?>, <?= $topagent['firstname'] ?>
                                                        <?= $topagent['middlename'] ?>.
                                                    </td>
                                                    <td><?= number_format($topagent['total_commissions']) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?= view('js'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        document.getElementById('generate-report-btn').addEventListener('click', function () {
            const monthYear = document.getElementById('report-month').value;
            if (monthYear) {
                const [year, month] = monthYear.split('-');
                fetch(`/reports/generateReport/${year}/${month}`)
                    .then(response => response.json())
                    .then(data => {
                        // Update tables with data
                        updateTables(data);

                        // Generate PDF
                        generatePDF(data, month, year);
                    })
                    .catch(error => console.error('Error fetching report:', error));
            } else {
                alert("Please select a month and year.");
            }
        });

        function updateTables(data) {
            const agentsTableBody = document.querySelector('#agents-table tbody');
            agentsTableBody.innerHTML = '';
            data.agents.forEach(agent => {
                const row = `<tr>
                        <td>${agent.lastname}, ${agent.firstname} ${agent.middlename}.</td>
                        <td>${agent.birthday}</td>
                        <td>${agent.number}</td>
                     </tr>`;
                agentsTableBody.innerHTML += row;
            });

            const applicantsTableBody = document.querySelector('#applicants-table tbody');
            applicantsTableBody.innerHTML = '';
            data.applicants.forEach(applicant => {
                const row = `<tr>
                        <td>${applicant.lastname}, ${applicant.firstname} ${applicant.middlename}.</td>
                        <td>${applicant.birthday}</td>
                        <td>${applicant.number}</td>
                     </tr>`;
                applicantsTableBody.innerHTML += row;
            });

            const recruitersTableBody = document.querySelector('#top-recruiters-table tbody');
            recruitersTableBody.innerHTML = '';
            data.top_recruiters.forEach((recruiter, index) => {
                const row = `<tr>
                        <td>${index + 1}</td>
                        <td>${recruiter.lastname}, ${recruiter.firstname} ${recruiter.middlename}</td>
                        <td>${recruiter.total_fA}</td>
                     </tr>`;
                recruitersTableBody.innerHTML += row;
            });

            const awardeesTableBody = document.querySelector('#awardee-table tbody');
            awardeesTableBody.innerHTML = '';
            data.top_awardees.forEach((awardee, index) => {
                const row = `<tr>
                        <td>${index + 1}</td>
                        <td>${awardee.lastname}, ${awardee.firstname} ${awardee.middlename}</td>
                        <td>${awardee.total_commissions}</td>
                     </tr>`;
                awardeesTableBody.innerHTML += row;
            });
        }

        function generatePDF(data, month, year) {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Function to get month name from month number
            function getMonthName(monthNumber) {
                const monthNames = [
                    "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
                return monthNames[monthNumber - 1]; // Month numbers are 1-based
            }

            // Add title
            const monthName = getMonthName(parseInt(month)); // Convert month to integer and get name
            doc.setFontSize(20);
            doc.text(`Month of ${monthName} ${year}`, 10, 10); // Updated title

            // Function to draw a simple table with borders and background colors
            function drawTable(headers, rows, startY) {
                const colWidth = 60; // Width of each column
                const rowHeight = 10; // Height of each row (increased for padding)
                const textOffset = 2; // Padding between text and top of the cell
                let y = startY;

                // Draw headers
                doc.setFontSize(12);
                doc.setTextColor(255, 255, 255); // White text
                doc.setFillColor(0, 102, 204); // Blue background
                doc.rect(10, y - rowHeight, colWidth * headers.length + 10, rowHeight, 'F'); // Header background

                headers.forEach((header, index) => {
                    // Center the text in the header
                    const headerX = 10 + index * colWidth + colWidth / 2; // Center X position
                    doc.text(header, headerX, y - textOffset, { align: 'center' }); // Center align
                });
                y += rowHeight; // Move down for rows

                // Draw rows
                rows.forEach((row) => {
                    doc.setTextColor(0, 0, 0); // Black text
                    row.forEach((cell, index) => {
                        // Center the text in each cell
                        const cellX = 10 + index * colWidth + colWidth / 2; // Center X position
                        doc.text(cell, cellX, y - textOffset, { align: 'center' }); // Center align
                    });
                    doc.rect(10, y - rowHeight, colWidth * row.length + 10, rowHeight); // Draw cell border
                    y += rowHeight; // Move down for the next row
                });

                return y; // Return the new Y position for the next section
            }
            // Add Agents section
            doc.setFontSize(16);
            doc.text('Agents', 10, 20);
            const agentHeaders = ['Name', 'Birthday', 'Contact'];
            const agentRows = data.agents.map(agent => [
                `${agent.lastname}, ${agent.firstname} ${agent.middlename}`,
                agent.birthday,
                agent.number
            ]);
            let yPosition = drawTable(agentHeaders, agentRows, 30);

            // Add Applicants section
            doc.setFontSize(16);
            doc.text('Applicants', 10, yPosition);
            const applicantHeaders = ['Name', 'Birthday', 'Contact'];
            const applicantRows = data.applicants.map(applicant => [
                `${applicant.lastname}, ${applicant.firstname} ${applicant.middlename}`,
                applicant.birthday,
                applicant.number
            ]);
            yPosition = drawTable(applicantHeaders, applicantRows, yPosition + 10);

            // Add Top Recruiters section
            doc.setFontSize(16);
            doc.text('Top Recruiters', 10, yPosition);
            const recruiterHeaders = ['Rank', 'Name', 'No. of Recruits'];
            const recruiterRows = data.top_recruiters.map((recruiter, index) => [
                (index + 1).toString(),
                `${recruiter.lastname}, ${recruiter.firstname} ${recruiter.middlename}`,
                recruiter.total_fA.toString()
            ]);
            yPosition = drawTable(recruiterHeaders, recruiterRows, yPosition + 10);

            // Add Awardees section
            doc.setFontSize(16);
            doc.text('Awardees', 10, yPosition);
            const awardeeHeaders = ['Top', 'Name', 'Total Commissions'];
            const awardeeRows = data.top_awardees.map((awardee, index) => [
                (index + 1).toString(),
                `${awardee.lastname}, ${awardee.firstname} ${awardee.middlename}`,
                awardee.total_commissions.toString()
            ]);
            drawTable(awardeeHeaders, awardeeRows, yPosition + 10);

            console.log("Saving PDF");
            doc.save(`report_${month}_${year}.pdf`);
        }

    </script>
</body>

</html>