<!doctype html>
<html lang="en">
<?= view('head'); ?>
<style>
    .file-upload {
        position: relative;
        display: inline-block;
        width: 100%;
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        border: 2px dashed #ddd;
        border-radius: 10px;
        text-align: center;
        transition: background-color 0.3s;
    }

    .file-upload.dragover {
        background-color: #f0f0f0;
    }

    .file-upload input[type="file"] {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }
</style>

<body>
    <?= view('Applicant/chop/header'); ?>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
                <div class="position-sticky py-4 px-3 sidebar-sticky">
                    <ul class="nav flex-column h-100">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/AppDash">
                                <i class="bi-house-fill me-2"></i>
                                Overview
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/AppForms">
                                <i class="bi bi-file-earmark-slides me-2"></i>
                                Forms
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/signature">
                                <i class="bi bi-pen me-2"></i>
                                Signature
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/appfiles">
                                <i class="bi bi-files me-2"></i></i>
                                Files
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/FA">
                                <i class="bi-person me-2"></i>
                                Agents
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

            <main class="main-wrapper col-md-10 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
                <!-- <div class="title-group mb-3">
                    <h1 class="h2 mb-0">Application Forms</h1>
                </div> -->
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
                                    <?= $userIdExists ? '<button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#myModal"><i class="bi bi-eye"></i></button>' : '' ?>
                                    <form action="fileuploads" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="file-upload" id="fileUpload1">
                                                <p>Traning Certificate (Boss 3)</p>
                                                    <p id="uploadText1">
                                                        <?= isset($files['file1']) && $files['file1'] ? $files['file1'] : 'Drag file' ?>
                                                    </p>
                                                    <input type="file" id="fileInput1" name="file1" multiple>
                                                    <button class="btn btn-primary mt-2" type="button"
                                                        onclick="document.getElementById('fileInput1').click()">Upload</button>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="file-upload" id="fileUpload2">
                                                <p>Government Valid ID (With 3 specimen signature)</p>
                                                    <p id="uploadText2">
                                                        <?= isset($files['file2']) && $files['file2'] ? $files['file2'] : 'Drag file' ?>
                                                    </p>
                                                    <input type="file" id="fileInput2" name="file2" multiple>
                                                    <button class="btn btn-primary mt-2" type="button"
                                                        onclick="document.getElementById('fileInput2').click()">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="file-upload" id="fileUpload3">
                                                <p>2x2 Picture (With 3 white background)</p>
                                                    <p id="uploadText3">
                                                        <?= isset($files['file3']) && $files['file3'] ? $files['file3'] : 'Drag file' ?>
                                                    </p>
                                                    <input type="file" id="fileInput3" name="file3" multiple>
                                                    <button class="btn btn-primary mt-2" type="button"
                                                        onclick="document.getElementById('fileInput3').click()">Upload</button>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="file-upload" id="fileUpload4">
                                                <p>Copy of Exam Result</p>
                                                    <p id="uploadText4">
                                                        <?= isset($files['file4']) && $files['file4'] ? $files['file4'] : 'Drag file' ?>
                                                    </p>
                                                    <input type="file" id="fileInput4" name="file4" multiple>
                                                    <button class="btn btn-primary mt-2" type="button"
                                                        onclick="document.getElementById('fileInput4').click()">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="file-upload" id="fileUpload5">
                                                <p>Notarized AIAL Form</p>
                                                    <p id="uploadText5">
                                                        <?= isset($files['file5']) && $files['file5'] ? $files['file5'] : 'Drag file' ?>
                                                    </p>
                                                    <input type="file" id="fileInput5" name="file5" multiple>
                                                    <button class="btn btn-primary mt-2" type="button"
                                                        onclick="document.getElementById('fileInput5').click()">Upload</button>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="file-upload" id="fileUpload6">
                                                <p>Group Life Insurance Form</p>
                                                    <p id="uploadText6">
                                                        <?= isset($files['file6']) && $files['file6'] ? $files['file6'] : 'Drag file' ?>
                                                    </p>
                                                    <input type="file" id="fileInput6" name="file6" multiple>
                                                    <button class="btn btn-primary mt-2" type="button"
                                                        onclick="document.getElementById('fileInput6').click()">Upload</button>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- new -->


                                        <div class="row">
                                            <div class="col-6">
                                                <div class="file-upload" id="fileUpload7">
                                                <p>Copy Of clearance (from previous employer) even not insurance related</p>
                                                    <p id="uploadText7">
                                                        <?= isset($files['file7']) && $files['file7'] ? $files['file7'] : 'Drag file' ?>
                                                    </p>
                                                    <input type="file" id="fileInput7" name="file7" multiple>
                                                    <button class="btn btn-primary mt-2" type="button"
                                                        onclick="document.getElementById('fileInput7').click()">Upload</button>
                                                </div>
                                            </div>
                                            <div class="col-6"><br>
                                                <div class="file-upload" id="fileUpload8">
                                                <p>Statement of Undertaking</p>
                                                    <p id="uploadText8">
                                                        <?= isset($files['file8']) && $files['file8'] ? $files['file8'] : 'Drag file' ?>
                                                    </p>
                                                    <input type="file" id="fileInput8" name="file8" multiple>
                                                    <button class="btn btn-primary mt-2" type="button"
                                                        onclick="document.getElementById('fileInput8').click()">Upload</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="file-upload" id="fileUpload9">
                                                <p>Proof of License Fee/s Payment:</p>
                                                    <p id="uploadText9">
                                                        <?= isset($files['file9']) && $files['file9'] ? $files['file9'] : 'Drag file' ?>
                                                    </p>
                                                    <input type="file" id="fileInput9" name="file9" multiple>
                                                    <button class="btn btn-primary mt-2" type="button"
                                                        onclick="document.getElementById('fileInput9').click()">Upload</button>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="file-upload" id="fileUpload10">
                                                <p>ITR or Affidavit of Non-Filing</p>
                                                    <p id="uploadText10">
                                                        <?= isset($files['file10']) && $files['file10'] ? $files['file10'] : 'Drag file' ?>
                                                    </p>
                                                    <input type="file" id="fileInput9" name="file10" multiple>
                                                    <button class="btn btn-primary mt-2" type="button"
                                                        onclick="document.getElementById('fileInput9').click()">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="col-12">
                                                <div class="file-upload" id="fileUpload11">
                                                <p>BIRT CERTIFICATE OF REGISTRATION</p>
                                                    <p id="uploadText11">
                                                        <?= isset($files['file11']) && $files['file11'] ? $files['file11'] : 'Drag file' ?>
                                                    </p>
                                                    <input type="file" id="fileInput11" name="file11" multiple>
                                                    <button class="btn btn-primary mt-2" type="button"
                                                        onclick="document.getElementById('fileInput11').click()">Upload</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success mt-3">
                                                    <?= $userIdExists ? 'Update' : 'Save' ?>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Files</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            // Array of file names
                                            $fileNames = [
                                                1 => 'Traning Certificate (Boss 3)',
                                                2 => 'Government Valid ID',
                                                3 => '2x2 Picture',
                                                4 => 'Copy of Exam Result',
                                                5 => 'Notarized AIAL Form',
                                                6 => 'Group Life Insurance Form',
                                                7 => 'Copy Of clearance ',
                                                8 => 'Statement of Undertaking',
                                                9 => 'Proof of License Fee/s Payment',
                                                10 => 'ITR or Affidavit of Non-Filing',
                                                11 => 'BIRT CERTIFICATE OF REGISTRATION',
                                        
                                            ];
                                            ?>
                                            <?php foreach (range(1, 11) as $i): ?>
                                                <?php if (isset($files["file$i"]) && $files["file$i"]): ?>
                                                    <?php
                                                    // Determine the file type for icon
                                                    $filePath = base_url('uploads/files/' . $username . '/' . $files["file$i"]);
                                                    $fileExt = pathinfo($files["file$i"], PATHINFO_EXTENSION);
                                                    $iconClass = 'fa-file'; // Default icon
                                            
                                                    // Set icon class based on file extension
                                                    if (in_array($fileExt, ['jpg', 'jpeg', 'png', 'gif'])) {
                                                        $iconClass = 'fa-file-image';
                                                    } elseif ($fileExt === 'pdf') {
                                                        $iconClass = 'fa-file-pdf';
                                                    } elseif (in_array($fileExt, ['doc', 'docx'])) {
                                                        $iconClass = 'fa-file-word';
                                                    } elseif (in_array($fileExt, ['ppt', 'pptx'])) {
                                                        $iconClass = 'fa-file-powerpoint';
                                                    }

                                                    // Determine the file name from the array, default to "File $i" if not set
                                                    $fileName = isset($fileNames[$i]) ? $fileNames[$i] : "File $i";
                                                    ?>
                                                    <div class="col-6">
                                                        <div class="card">
                                                            <div class="card-body text-center">
                                                                <h6 style="font-size: 12pt" class="card-title"><?= $fileName ?></h6>
                                                                <p class="card-text">
                                                                    <a href="<?= $filePath ?>" target="_blank">
                                                                        <i class="fas <?= $iconClass ?> fa-3x"></i>
                                                                    </a>
                                                                </p>
                                                                <!-- <a href="<?= $filePath ?>" target="_blank" class="btn btn-link">
                                                                    <span style="font-size: 9px;"><?= $files["file$i"] ?></span>
                                                                </a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?= view('js'); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.querySelectorAll('.file-upload').forEach((fileUpload, index) => {
            const fileInput = document.getElementById('fileInput' + (index + 1));
            const uploadText = document.getElementById('uploadText' + (index + 1));

            fileUpload.addEventListener('dragover', (event) => {
                event.preventDefault();
                fileUpload.classList.add('dragover');
            });

            fileUpload.addEventListener('dragleave', () => {
                fileUpload.classList.remove('dragover');
            });

            fileUpload.addEventListener('drop', (event) => {
                event.preventDefault();
                fileUpload.classList.remove('dragover');
                const files = event.dataTransfer.files;
                handleFiles(files, uploadText);
            });

            fileInput.addEventListener('change', () => {
                const files = fileInput.files;
                handleFiles(files, uploadText);
            });

            function handleFiles(files, uploadTextElement) {
                const fileNames = Array.from(files).map(file => file.name).join(', ');
                uploadTextElement.textContent = fileNames || 'Drag file to upload';
            }
        });
    </script>
</body>

</html>