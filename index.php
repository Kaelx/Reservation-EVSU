<?php
session_start();

if (!isset($_SESSION['user'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EVSU-IGP RESERVATION</title>

        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="container">
            <div class="d-flex flex-column justify-content-center align-items-center text-center">
                <h1>NOT LOGIN YET</h1>
                <h2>LIST OF PRODUCTS WILL APPEAR HERE!</h2>


                <?php
                require 'controller/config.php';
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
                                        <img src="<?php echo 'admin/images/'. $products['product_image']; ?>" alt="product-img" class="img-fluid">
                                        <div class="card-body">
                                            <h3 class="card-title fw-bold"><?php echo $products['product_name']; ?></h3>
                                            <p class="card-text text-muted lead lh-base"><?php echo $products['product_description']; ?></p>
                                            <a href="pages/login.php" class="btn btn-primary">ORDER NOW!</a>
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
    </body>

    </html>


<?php
} else {
    header('location:pages/index.php');
}
?>