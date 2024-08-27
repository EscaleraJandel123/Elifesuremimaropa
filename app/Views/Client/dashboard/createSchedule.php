<!DOCTYPE html>
<html lang="en">
<?= view('/Home/chop/head'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>
    <?= view('/client/dashboard/topside'); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create schedule</h1>
           
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <?= view('/client/dashboard/calendar'); ?>
            </div>
        </section>
    </main>
</body>

<?= view('/Home/chop/jsh'); ?>