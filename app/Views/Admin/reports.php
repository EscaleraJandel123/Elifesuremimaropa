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
                        <!-- Sidebar links omitted for brevity -->
                    </ul>
                </div>
            </nav>

            <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
                <div class="title-group mb-3 d-flex justify-content-between align-items-center flex-wrap">
                    <h1 class="h2 mb-0">Reports</h1>
                    <div class="d-flex align-items-center flex-wrap">
                        <input type="month" id="report-month" class="form-control d-inline-block me-2" style="width: auto;">
                        <button id="generate-report-btn" class="btn btn-primary ms-2">Generate Report</button>
                    </div>
                </div>

                <div class="row">
                    <!-- Left and right table columns -->
                    <div class="col-lg-6 col-md-12 mb-3">
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
                    <div class="col-lg-6 col-md-12 mb-3">
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

                    <!-- Top Recruiters Table -->
                    <div class="col-lg-6 col-md-12 mb-3">
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

                    <!-- Top Commissioner Table -->
                    <div class="col-lg-6 col-md-12 mb-3">
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
            const pdfButton = document.createElement('button');
            pdfButton.className = 'btn btn-secondary ms-2';
            pdfButton.innerText = 'Download PDF';
            pdfButton.onclick = () => {
                generatePDF(data, month, year);
            };
            document.getElementById('generate-report-btn').after(pdfButton);
        }

        function generatePDF(data, month, year) {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            doc.text(`Report for ${month}/${year}`, 10, 10);
            doc.autoTable({
                html: '#agents-table',
            });
            doc.save('report.pdf');
        }
    </script>
</body>

</html>
