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
                    <h3>GROUP LIFE INSURANCE FORM</h3>
                </div>
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <form class="container mt-5" method="post" action="/form3sv">
                                        <fieldset>

                                        <div class="page" id="page1" style="display:none;">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="5">
                                                                <h5 style="text-align: center;">ENROLLMENT FORM FOR
                                                                    MEMBERSHIP IN THE GROUP LIFE INSURANCE PLAN</h5>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="5" style="text-align: center;">A. Personal
                                                                Information of Applicant</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Last Name</th>
                                                            <th>First Name</th>
                                                            <th>Middle Name</th>
                                                            <th>Date of Birth (MM/DD/YY)</th>
                                                            <th>Occupation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input type="text" id="lastName" name="lastName"
                                                                    class="form-control"
                                                                    value="<?= isset($gli['lastName']) ? $gli['lastName'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" id="firstName" name="firstName"
                                                                    class="form-control"
                                                                    value="<?= isset($gli['firstName']) ? $gli['firstName'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" id="middleName" name="middleName"
                                                                    class="form-control"
                                                                    value="<?= isset($gli['middleName']) ? $gli['middleName'] : '' ?>">
                                                            </td>
                                                            <td><input type="date" id="dateOfBirth" name="dateOfBirth"
                                                                    class="form-control"
                                                                    value="<?= isset($gli['dateOfBirth']) ? $gli['dateOfBirth'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" id="occupation" name="occupation"
                                                                    class="form-control"
                                                                    value="<?= isset($gli['occupation']) ? $gli['occupation'] : '' ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Name Of Company</th>
                                                            <th>Nature of Business</th>
                                                            <th>Sex</th>
                                                            <th>Civil Status</th>
                                                            <th>Nationality</th>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" id="companyName" name="companyName"
                                                                    class="form-control"
                                                                    value="<?= isset($gli['companyName']) ? $gli['companyName'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" id="businessNature"
                                                                    name="businessNature" class="form-control"
                                                                    value="<?= isset($gli['businessNature']) ? $gli['businessNature'] : '' ?>">
                                                            </td>
                                                            <td>
                                                                <select id="sex" name="sex" class="form-control">
                                                                    <option
                                                                        value="<?= isset($gli['sex']) ? $gli['sex'] : '' ?>">
                                                                        <?= isset($gli['sex']) ? $gli['sex'] : '' ?>
                                                                    </option>
                                                                    <option value="male">Male</option>
                                                                    <option value="female">Female</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select id="civilStatus" name="civilStatus"
                                                                    class="form-control">
                                                                    <option
                                                                        value="<?= isset($gli['civilStatus']) ? $gli['civilStatus'] : '' ?>">
                                                                        <?= isset($gli['civilStatus']) ? $gli['civilStatus'] : '' ?>
                                                                    </option>
                                                                    <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Widowed">Widowed</option>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" id="nationality" name="nationality"
                                                                    class="form-control"
                                                                    value="<?= isset($gli['nationality']) ? $gli['nationality'] : '' ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th rowspan="5" style="text-align: center;">ADDRESS</th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="2">Residence (NO., Street, Subdivision/Village,
                                                                District, Municipality/City)</th>
                                                            <th colspan="2">Telephone Number</th>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><input type="text" id="residenceAddress"
                                                                    name="residenceAddress" class="form-control"
                                                                    value="<?= isset($gli['residenceAddress']) ? $gli['residenceAddress'] : '' ?>">
                                                            </td>
                                                            <td colspan="2"><input type="text" id="residenceTelephone"
                                                                    name="residenceTelephone" class="form-control"
                                                                    value="<?= isset($gli['residenceTelephone']) ? $gli['residenceTelephone'] : '' ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="2">Business/Office (NO., Street,
                                                                Subdivision/Village, District, Municipality/City)</th>
                                                            <th colspan="2">Telephone Number</th>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><input type="text" id="businessAddress"
                                                                    name="businessAddress" class="form-control"
                                                                    value="<?= isset($gli['businessAddress']) ? $gli['businessAddress'] : '' ?>">
                                                            </td>
                                                            <td colspan="2"><input type="text" id="businessTelephone"
                                                                    name="businessTelephone" class="form-control"
                                                                    value="<?= isset($gli['businessTelephone']) ? $gli['businessTelephone'] : '' ?>">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <div class="page" id="page2" style="display:none;">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th colspan="8" style="text-align: center;">B. Benificiary /
                                                                ies;</th>
                                                        </tr>
                                                        <TR>
                                                            <TH colspan="3">Name of Benificiary/ies
                                                            <TH colspan="3">DateTime
                                                            <TH rowspan="2">Relationship
                                                            <TH rowspan="2">Remarks
                                                        <TR>
                                                            <TH>(First)
                                                            <TH>M.I.
                                                            <TH>(Last)
                                                            <TH>MM
                                                            <TH>DD
                                                            <TH>YY
                                                        <tr>
                                                            <td><input type="text" class="form-control" id="firstName1"
                                                                    name="firstName1"
                                                                    value="<?= isset($gli['firstName1']) ? $gli['firstName1'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="mi1"
                                                                    name="mi1"
                                                                    value="<?= isset($gli['mi1']) ? $gli['mi1'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="lastName1"
                                                                    name="lastName1"
                                                                    value="<?= isset($gli['lastName1']) ? $gli['lastName1'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="month1"
                                                                    name="month1"
                                                                    value="<?= isset($gli['month1']) ? $gli['month1'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="day1"
                                                                    name="day1"
                                                                    value="<?= isset($gli['day1']) ? $gli['day1'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="year1"
                                                                    name="year1"
                                                                    value="<?= isset($gli['year1']) ? $gli['year1'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control"
                                                                    id="relationship1" name="relationship1"
                                                                    value="<?= isset($gli['relationship1']) ? $gli['relationship1'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="remarks1"
                                                                    name="remarks1"
                                                                    value="<?= isset($gli['remarks1']) ? $gli['remarks1'] : '' ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" class="form-control" id="firstName2"
                                                                    name="firstName2"
                                                                    value="<?= isset($gli['firstName2']) ? $gli['firstName2'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="mi2"
                                                                    name="mi2"
                                                                    value="<?= isset($gli['mi2']) ? $gli['mi2'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="lastName2"
                                                                    name="lastName2"
                                                                    value="<?= isset($gli['lastName2']) ? $gli['lastName2'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="month2"
                                                                    name="month2"
                                                                    value="<?= isset($gli['month2']) ? $gli['month2'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="day2"
                                                                    name="day2"
                                                                    value="<?= isset($gli['day2']) ? $gli['day2'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="year2"
                                                                    name="year2"
                                                                    value="<?= isset($gli['year2']) ? $gli['year2'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control"
                                                                    id="relationship2" name="relationship2"
                                                                    value="<?= isset($gli['relationship2']) ? $gli['relationship2'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="remarks2"
                                                                    name="remarks2"
                                                                    value="<?= isset($gli['remarks2']) ? $gli['remarks2'] : '' ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" class="form-control" id="firstName3"
                                                                    name="firstName3"
                                                                    value="<?= isset($gli['firstName3']) ? $gli['firstName3'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="mi3"
                                                                    name="mi3"
                                                                    value="<?= isset($gli['mi3']) ? $gli['mi3'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="lastName3"
                                                                    name="lastName3"
                                                                    value="<?= isset($gli['lastName3']) ? $gli['lastName3'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="month3"
                                                                    name="month3"
                                                                    value="<?= isset($gli['month3']) ? $gli['month3'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="day3"
                                                                    name="day3"
                                                                    value="<?= isset($gli['day3']) ? $gli['day3'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="year3"
                                                                    name="year3"
                                                                    value="<?= isset($gli['year3']) ? $gli['year3'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control"
                                                                    id="relationship3" name="relationship3"
                                                                    value="<?= isset($gli['relationship3']) ? $gli['relationship3'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="remarks3"
                                                                    name="remarks3"
                                                                    value="<?= isset($gli['remarks3']) ? $gli['remarks3'] : '' ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" class="form-control" id="firstName4"
                                                                    name="firstName4"
                                                                    value="<?= isset($gli['firstName4']) ? $gli['firstName4'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="mi4"
                                                                    name="mi4"
                                                                    value="<?= isset($gli['mi4']) ? $gli['mi4'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="lastName4"
                                                                    name="lastName4"
                                                                    value="<?= isset($gli['lastName4']) ? $gli['lastName4'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="month4"
                                                                    name="month4"
                                                                    value="<?= isset($gli['month4']) ? $gli['month4'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="day4"
                                                                    name="day4"
                                                                    value="<?= isset($gli['day4']) ? $gli['day4'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="year4"
                                                                    name="year4"
                                                                    value="<?= isset($gli['year4']) ? $gli['year4'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control"
                                                                    id="relationship4" name="relationship4"
                                                                    value="<?= isset($gli['relationship4']) ? $gli['relationship4'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" class="form-control" id="remarks4"
                                                                    name="remarks4"
                                                                    value="<?= isset($gli['remarks4']) ? $gli['remarks4'] : '' ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="1">Trustee of minor benificiary/ies;</th>
                                                            <th colspan="7"><input type="text"
                                                                    id="trusteeMinorBeneficiary"
                                                                    name="trusteeMinorBeneficiary" class="form-control"
                                                                    value="<?= isset($gli['trusteeMinorBeneficiary']) ? $gli['trusteeMinorBeneficiary'] : '' ?>">
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table><br>

                                                <p style="text-align: justify;">I hereby apply for participation in the
                                                    group life insurance plan for which I am or may become eligible for
                                                    subject to the terms and conditions of the Group Policy. I further
                                                    agree that my insurance shall become effective on the date stated on
                                                    the certificate to be issued to me by Allianz PNB Life Insurance,
                                                    Inc. provided that I am actively at work on such date and the
                                                    premium corresponding to my insurance has been paid. I authorize
                                                    Allianz PNB Life Insurance, Inc. to process the information I have
                                                    provided in accordance with the Data Privacy Act.</p><br>
                                                <p>Signed at <input type="text"
                                                        style="width: 100px; border-radius: 7px;" id="place"
                                                        name="place"
                                                        value="<?= isset($gli['place']) ? $gli['place'] : '' ?>">
                                                    this <input type="text" style="width: 50px; border-radius: 7px;"
                                                        id="day" name="day"
                                                        value="<?= isset($gli['day']) ? $gli['day'] : '' ?>">
                                                    day of <input type="text" style="width: 100px; border-radius: 7px;"
                                                        id="month" name="month"
                                                        value="<?= isset($gli['month']) ? $gli['month'] : '' ?>">,
                                                    <input type="text" style="width: 50px; border-radius: 7px;"
                                                        id="year" name="year"
                                                        value="<?= isset($gli['year']) ? $gli['year'] : '' ?>">.<br><br><br><br>
                                                </p>
                                                <p style="text-align: right;">
                                                    <input type="text" style="width: 45%; border-radius: 10px;"
                                                        id="applicantSignature" name="applicantSignature"
                                                        placeholder="Applicant"
                                                        value="<?= isset($gli['applicantSignature']) ? $gli['applicantSignature'] : '' ?>">
                                                <h6 style="text-align: right;">Printed Name and Signiture of Applicant
                                                </h6>
                                                </p>
                                            </div><br><br>
                                            <input type="submit" value="Submit" class="btn btn-primary">
                                        </div>

                                            <!-- Pagination Controls -->
                                             <nav aria-label="Page navigation example" class="mt-4">
                                                <ul class="pagination justify-content-center">

                                                    <div class="d-flex flex-wrap justify-content-center align-items-center" style="gap: 5px;">
                                                        <button type="button" class="page-link" id="prevBtn" onclick="showPage(-1)" disabled>Previous</button>
                                                        <div id="pageNumberContainer" class="d-flex flex-wrap justify-content-center"></div>
                                                        <button type="button" class="page-link" id="nextBtn" onclick="showPage(1)" disabled>Next</button>
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
                <footer class="site-footer">
                    <div class="container">
                        <div class="row">
                        </div>
                    </div>
                </footer>
            </main>
        </div>
    </div>
    <?= view('js') ?>
 <!-- Pagination Script -->
    <script>
        let currentPage = 1;
        const totalPages = 2;

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
                pageButton.onclick = function() { showPageByNumber(pageNumber); };

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