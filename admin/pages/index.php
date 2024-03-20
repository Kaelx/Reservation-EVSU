<?php
$page = 'DASHBOARD';

require 'header.php';
if (isset($_SESSION['admin'])) {
?>


    <div class="wrapper d-flex align-items-stretch">
        <?php
        require 'partials/nav.php'
        ?>

        <div id="content" class="p-4 p-md-5 pt-5 text-center">
            <div class="mb-3">
                <h1 class="display-4">Welcome to the Dashboard</h1>
            </div>
            <div class="mt-4">
                <p class="lead">This is the admin dashboard for managing.</p>
            </div>
        </div>
    </div>



<?php
} else {
    header('Location: login.php');
}

require 'footer.php';
?>