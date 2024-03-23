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
    <style>
        /* PAGE LOADER */
        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 120px;
            height: 120px;
            margin: -76px 0 0 -76px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 0.5s;
            animation-name: animatebottom;
            animation-duration: 0.5s;
            scroll-behavior: smooth;

        }

        @-webkit-keyframes animatebottom {
            from {
                bottom: -20px;
                opacity: 0;
            }

            to {
                bottom: 0px;
                opacity: 1;
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -20px;
                opacity: 0;
            }

            to {
                bottom: 0;
                opacity: 1;
            }
        }

        #myDiv {
            display: none;
        }
    </style>

    <body onload="myFunction()">
        <div id="loader"></div>
        <div style="display:none;" id="myDiv" class="animate-bottom">
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

require 'pages/partials/footer.php'
?>