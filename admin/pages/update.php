<?php
$page = 'MANAGE';

require 'header.php';
if (isset($_SESSION['admin'])) {

    if (isset($_GET['id'])) {
        $productID = $_GET['id'];

        $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $productID);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = $result->fetch_assoc();


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_name = $_POST['product_name'];
            $product_description = $_POST['product_description'];
            $product_quantity = $_POST['product_quantity'];
            $product_price = $_POST['product_price'];
            $product_id = $_POST['product_id'];

            $stmt = $conn->prepare("UPDATE products SET product_name = ?, product_description = ?, product_quantity = ?, product_price = ? WHERE id = ?");
            $stmt->bind_param("ssidi", $product_name, $product_description, $product_quantity, $product_price, $product_id);
            $stmt->execute();
            if ($stmt->affected_rows <= 1) {
                header('Location: inventory.php');
            }
        }
?>


        <div class="wrapper d-flex align-items-stretch">
            <?php
            require 'partials/nav.php'
            ?>



            <div id="content" class="p-4 p-md-5 pt-5 text-center">
                <div class="mb-3">
                    <h1 class="display-4">MANAGE INVENTORY ITEM <span><?= $productID; ?></span></h1>
                </div>

                <section class="inventory-section mt-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card">
                                    <img src="<?= $products['product_image'] ?>" alt="Product Image" class="card-img-top">
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="product_name" value="<?= $products['product_name'] ?>" placeholder="Product Name">
                                            </div>
                                            <div class="mb-3">
                                                <textarea class="form-control" name="product_description" placeholder="Product Description"><?= $products['product_description'] ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="product_quantity" class="form-label">Quantity (Per set):</label>
                                                <input type="number" class="form-control" name="product_quantity" value="<?= $products['product_quantity'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="product_price" class="form-label">Price (Per set):</label>
                                                <input type="number" step="0.01" class="form-control" name="product_price" value="<?= $products['product_price'] ?>">
                                            </div>
                                            <input type="hidden" name="product_id" value="<?= $products['id'] ?>">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>

<?php
    } else {
        header('Location: inventory.php');
    }
} else {
    header('Location: login.php');
}


require 'footer.php';

?>