<?php
$page = 'DASHBOARD';

require 'partials/header.php';
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
            <div class="container">
                <div class="mt-4">
                    <div class="card p-2">
                        <div class="row justify-content-between">
                            <div class="col-lg-3 col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body text-white bg-primary m-2">
                                        <h5 class="card-title">PRODUCT</h5>
                                        <p class="card-text display-5 text-center"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body text-white bg-success m-2">
                                        <h5 class="card-title">ORDERS</h5>
                                        <p class="card-text display-5 text-center"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body text-white bg-info m-2">
                                        <h5 class="card-title">SALES</h5>
                                        <p class="card-text display-5 text-center"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php
} else {
    header('Location: login.php');
}

require 'partials/footer.php';
?>