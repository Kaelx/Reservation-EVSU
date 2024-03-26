<?php
$page = "Home";

require 'partials/header.php';

if (isset($_SESSION['user'])) {

?>


    <div class="wrapper d-flex align-items-stretch">
        <?php
        require 'partials/nav.php'
        ?>

        <div id="content" class="p-4 p-md-5 pt-5 text-center">
            <div class="mb-3">
                <h2>SCHOOL PRODUCTS</h2>
            </div>
            <div class="container">
                <?php
                require '../controller/config.php';
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                ?>
                <section id="products" class="bg-link mt-3">
                    <div class="container-sm">
                        <div class="row justify-content-center align-item-center g-2">
                            <?php
                            while ($products = $result->fetch_assoc()) {
                            ?>
                                <div class="col col-lg-3 col-md-3 d-flex align-items-stretch">
                                    <div class="card">
                                        <div class="container">
                                            <img src="<?php echo '../admin/images/' . $products['product_image']; ?>" alt="product-img" class="img-fluid">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold"><?php echo $products['product_name']; ?></h5>
                                            <p class="card-text text-muted small"><?php echo $products['product_description']; ?></p>
                                            <a href="#" class="btn btn-primary btn-sm">ORDER NOW!</a>
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
    </div>


<?php
} else {
    header("Location: login.php");
}


require 'partials/footer.php';

?>