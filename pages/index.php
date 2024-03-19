<?php
$page = "Home";

require 'header.php';

if (isset($_SESSION['user'])) {

?>


    <div class="container">
        <div class="text-center">
            <h1>MAIN</h1>
            <h2>LIST OF PRODUCT HERE!</h2>
            <div>
                <a href="../controller/logout.php" class="btn btn-danger">LOGOUT</a>
            </div>
            <div class="col-md-4">
                <div class="card mx-auto">
                    <img src="images/image.jpeg" alt="product" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <a href="#" class="btn btn-primary">Buy this item</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
} else {
    header("Location: login.php");
}


require 'footer.php';

?>