<?php
$page = 'MANAGE';

require 'partials/header.php';
if (isset($_SESSION['admin'])) {

    if (isset($_GET['updateID'])) {
        $productID = $_GET['updateID'];

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


            if ($stmt->affected_rows >= 0) {
                if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
                    $image_name = $_FILES['product_image']['name'];
                    $image_tmp_name = $_FILES['product_image']['tmp_name'];
                    $upload_directory = "../images/";
                    $upload_path = $upload_directory . $image_name;

                    if (move_uploaded_file($image_tmp_name, $upload_path)) {
                        $stmt_img = $conn->prepare("UPDATE products SET product_image = ? WHERE id = ?");
                        $stmt_img->bind_param("si", $upload_path, $product_id);
                        $stmt_img->execute();
                    } else {
                        echo "Something went wrong while uploading the image!";
                    }
                }
                header('Location: inventory.php');
            } else {
                echo "Error updating product.";
            }
        }
    } else if (isset($_GET['deleteID'])) {
        $productID = $_GET['deleteID'];
        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $productID);
        $stmt->execute();
        if ($stmt->affected_rows <= 1) {
            header('Location: inventory.php');
        }
    } else {
        header('Location: inventory.php');
    }
?>
    <div class="wrapper d-flex align-items-stretch">
        <?php
        require 'partials/nav.php'
        ?>
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="mb-3 text-center">
                <h1 class="display-4">MANAGE INVENTORY ITEM <span><?= $productID; ?></span></h1>
            </div>
            <section class="inventory-section mt-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="mt-1 text-center">
                                    <img src="<?= $products['product_image'] ?>" alt="Product Image" class="card-img-top img-fluid" style="max-width: 200px;">
                                </div>
                                <div class="card-body">
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="product_name" class="form-label">Product Name:</label>
                                            <input type="text" class="form-control" name="product_name" value="<?= $products['product_name'] ?>" placeholder="Product Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_description" class="form-label">Product Description:</label>
                                            <textarea class="form-control" name="product_description" placeholder="Product Description"><?= $products['product_description'] ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_quantity" class="form-label">Quantity:</label>
                                            <input type="number" class="form-control" name="product_quantity" value="<?= $products['product_quantity'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_price" class="form-label">Price:</label>
                                            <input type="number" step="0.01" class="form-control" name="product_price" value="<?= $products['product_price'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_image" class="form-label">Update Image:</label>
                                            <input type="file" class="form-control" name="product_image">
                                        </div>
                                        <div class="text-center">
                                            <input type="hidden" name="product_id" value="<?= $products['id'] ?>">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-danger" onclick="DeleteBtn(<?= $products['id'] ?>)">Delete</button>
                                            <a href="inventory.php" class="btn btn-secondary">BACK</a>
                                        </div>
                                </div>
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
    header('Location: login.php');
}


require 'partials/footer.php';

?>