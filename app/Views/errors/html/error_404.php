<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from templates.hibootstrap.com/inon/default/error.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Mar 2024 12:34:57 GMT -->

<?=view('home/chop1/head') ?>

<body>

    <div class="error-area ptb-100">
        <div class="container">
            <div class="error-content">
                <h1>4<span>0</span>4</h1>
                <h2>Error 404 : Page Not Found</h2>
                <p>The page you are looking for might have been removed had its name changed or is temporarily
                    unavailable.</p>
                <button class="default-btn" onClick="history_back()">Return</button>
            </div>
        </div>
    </div>

    <?=view('home/chop1/js') ?>
</body>
<script>
        function history_back() {
            window.history.back();
        } 
    </script>


<!-- Mirrored from templates.hibootstrap.com/inon/default/error.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Mar 2024 12:34:57 GMT -->

</html>