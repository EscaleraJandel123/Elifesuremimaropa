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
                        <button id="generate-report-btn" class="btn btn-primary ms-2"><i
                                class="bi bi-clipboard-data"></i></button>
                    </div>
                    <!-- <div>
                        <input type="month" id="report-month" class="form-control d-inline-block" style="width: auto;">
                        <button id="download-report-btn" class="btn btn-primary ms-2">Download</button>
                        <button id="view-report-btn" class="btn btn-secondary ms-2">View</button>
                        <button id="print-report-btn" class="btn btn-success ms-2">Print</button>
                    </div> -->
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

                    <!-- Report Viewer Modal -->
                    <div class="modal fade" id="reportViewerModal" tabindex="-1"
                        aria-labelledby="reportViewerModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reportViewerModalLabel">Report Viewer</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe id="reportIframe" src="" frameborder="0"
                                        style="width: 100%; height: 500px;"></iframe>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

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

                        // Add buttons for actions
                        addActionButtons(data, month, year);
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

        function addActionButtons(data, month, year) {
            const actionsDiv = document.createElement('div');
            actionsDiv.id = 'report-actions';
            actionsDiv.innerHTML = `
        <button id="download-btn" class="btn btn-success me-2"><i class="bi bi-download"></i></button>
        <button id="view-btn" class="btn btn-info me-2"><i class="bi bi-eye"></i></button>
        <button id="print-btn" class="btn btn-warning"><i class="bi bi-printer"></i></button>
    `;

            const existingActions = document.getElementById('report-actions');
            if (existingActions) existingActions.remove();

            document.querySelector('.title-group').appendChild(actionsDiv);

            document.getElementById('download-btn').addEventListener('click', () => downloadReport(data, month, year));
            document.getElementById('view-btn').addEventListener('click', () => {
                const reportUrl = `/reports/view/${year}/${month}`;
                document.getElementById('reportIframe').src = reportUrl;
                new bootstrap.Modal(document.getElementById('reportViewerModal')).show();
            });
            document.getElementById('print-btn').addEventListener('click', () => printReport(data, month, year));
        }


        function generatePDF(data, month, year) {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Add title
            doc.setFontSize(16);
            doc.text(`Report - ${month}/${year}`, 10, 10);

            // Add Agents Table
            doc.autoTable({
                startY: 20,
                head: [['Name', 'Birthday', 'Number']],
                body: data.agents.map(agent => [
                    `${agent.lastname}, ${agent.firstname} ${agent.middlename}`,
                    agent.birthday,
                    agent.number
                ]),
            });

            // Add Applicants Table
            doc.autoTable({
                startY: doc.lastAutoTable.finalY + 10,
                head: [['Name', 'Birthday', 'Number']],
                body: data.applicants.map(applicant => [
                    `${applicant.lastname}, ${applicant.firstname} ${applicant.middlename}`,
                    applicant.birthday,
                    applicant.number
                ]),
            });

            // Add Top Recruiters Table
            doc.autoTable({
                startY: doc.lastAutoTable.finalY + 10,
                head: [['Rank', 'Name', 'Total Recruitments']],
                body: data.top_recruiters.map((recruiter, index) => [
                    index + 1,
                    `${recruiter.lastname}, ${recruiter.firstname} ${recruiter.middlename}`,
                    recruiter.total_fA
                ]),
            });

            // Add Awardees Table
            doc.autoTable({
                startY: doc.lastAutoTable.finalY + 10,
                head: [['Rank', 'Name', 'Total Commissions']],
                body: data.top_awardees.map((awardee, index) => [
                    index + 1,
                    `${awardee.lastname}, ${awardee.firstname} ${awardee.middlename}`,
                    awardee.total_commissions
                ]),
            });

            return doc;
        }

        function downloadReport(data, month, year) {
            const doc = generatePDF(data, month, year);
            doc.save(`report_${month}_${year}.pdf`);
        }

        function viewReport(data, month, year) {
            const doc = generatePDF(data, month, year);
            const string = doc.output('dataurlstring');
            const x = window.open();
            x.document.open();
            x.document.write(`<iframe width='100%' height='100%' src='${string}'></iframe>`);
            x.document.close();
        }

        function printReport(data, month, year) {
            const doc = generatePDF(data, month, year);
            const pdfBlob = doc.output('blob');

            // Create an object URL for the PDF blob
            const url = URL.createObjectURL(pdfBlob);
            const iframe = document.createElement('iframe');

            // Set the iframe attributes
            iframe.style.display = 'none';
            iframe.src = url;

            // Append the iframe to the body
            document.body.appendChild(iframe);

            // Trigger the print once the iframe loads
            iframe.onload = function () {
                iframe.contentWindow.print();
            };
        }
    </script>
</body>

</html>