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

    <body onload="myFunction()">
        <div id="loader"></div>
        <div style="display:none;" id="myDiv" class="animate-bottom">
            <div class="sticky-top text-center">
                <h1 class="display-4 fw-bold">EVSU-IGP RESERVATION</h1>
            </div>
            <div class="container">
                <div class="d-flex flex-column justify-content-center align-items-center text-center">


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
                                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                        <div class="card">
                                            <img src="<?php echo 'admin/images/' . $products['product_image']; ?>" alt="product-img" class="img-fluid">
                                            <div class="card-body">
                                                <h3 class="card-title fw-bold"><?php echo $products['product_name']; ?></h3>
                                                <p class="card-text text-muted lead"><?php echo $products['product_description']; ?></p>
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


        <?php
    } else {
        header('location:pages/index.php');
    }
        ?>

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="js/main.js"></script>

</html>