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

            <?php
            require '../controller/config.php';
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);
            ?>
            <section id="products" class="bg-link mt-5">
                <div class="container-lg">
                    <div class="row justify-content-center align-item-center g-4">
                        <?php
                        while ($products = $result->fetch_assoc()) {
                        ?>
                            <div class="col col-lg-4 col-md-4 d-flex align-items-stretch">
                                <div class="card">
                                    <img src="<?php echo '../admin/images/' . $products['product_image']; ?>" alt="product-img" class="img-fluid">
                                    <div class="card-body">
                                        <h3 class="card-title fw-bold"><?php echo $products['product_name']; ?></h3>
                                        <p class="card-text text-muted lead"><?php echo $products['product_description']; ?></p>
                                        <a href="#" class="btn btn-primary">ORDER NOW!</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </section>

        </div>
    </div>


<?php
} else {
    header("Location: login.php");
}


require 'footer.php';

?>