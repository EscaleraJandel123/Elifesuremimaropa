<!doctype html>
<html lang="en">
<?= view('head') ?>

<body>
    <?= view('Agent/chop/header') ?>
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
                            <a class="nav-link" aria-current="page" href="/AgForms">
                                <i class="bi bi-file-earmark-slides me-2"></i>
                                Forms
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/Agsignature">
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
                    <h1 class="h2 mb-0">E-Signature</h1>
                </div>
                <div class="container">
                    <div class="row justify-content-center m-2">
                        <div class="col-lg-12">
                            <div class="card">
                                <?php if (session()->getFlashdata('error')): ?>
                                    <div class="alert alert-danger mt-3 text-center" role="alert">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('success')): ?>
                                    <div class="alert alert-success mt-3 text-center" role="alert">
                                        <?= session()->getFlashdata('success') ?>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <form id="signatureForm" action="signsave" method="post"
                                        enctype="multipart/form-data">
                                        <div class="row justify-content-center">
                                            <!-- Signature pad -->
                                            <div class="col-lg-6 col-md-8 col-12 mt-3 text-center">
                                                <div id="signaturePreview">
                                                    <img src="<?= isset($sign['signature']) ? base_url('uploads/signatures/' . $sign['signature']) : '' ?>"
                                                        alt="" style="max-width: 100%; height: auto;">
                                                </div>
                                                <div class="w-100 border border-dark p-2 mb-3" id="signaturePad"></div>
                                                <input type="hidden" name="sign" id="sign">
                                                <label for="signaturePad">Signature</label>
                                                <button class="btn btn-danger btn-sm m-1" type="button"
                                                    onclick="clearSignature()">Clear</button>
                                                <button class="btn btn-primary btn-sm m-1" type="submit"
                                                    onclick="saveSignature(event)">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?= view('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jSignature/2.1.2/jSignature.min.js"></script>
    <script>
        // Initialize jSignature
        var $sigdiv = $("#signaturePad");
        $sigdiv.jSignature({
            'background-color': 'white',
            'width': '100%',  // Make it responsive
            'height': 200  // You can adjust the height as needed
        });

        // Function to save signature
        function saveSignature(event) {
            event.preventDefault(); // Prevent the form from submitting immediately
            var dataUrl = $sigdiv.jSignature("getData", "image");
            if (dataUrl && dataUrl.length > 1) {
                var imageData = dataUrl[1]; // Get the base64 image data
                $('#sign').val(imageData);
                $('#signatureForm').off('submit').submit(); // Remove the event handler to avoid recursive calls and submit the form
            } else {
                alert("No signature data found.");
            }
        }

        // Function to clear signature
        function clearSignature() {
            $('#signaturePad').jSignature('reset');
            $('#sign').val('');
        }
    </script>
</body>

</html>