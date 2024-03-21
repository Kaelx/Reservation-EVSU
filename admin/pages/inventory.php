<?php
$page = 'INVENTORY';

require 'header.php';
if (isset($_SESSION['admin'])) {
?>


    <div class="wrapper d-flex align-items-stretch">
        <?php
        require 'partials/nav.php'
        ?>

        <div id="content" class="p-4 p-md-5 pt-5 text-center">
            <div class="mb-3">
                <h1 class="display-4">MANAGE INVENTORY</h1>
            </div>
            <div class="container mt-3">
                <div class="row justify-content-between">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-success" id="addproductBtn" onclick="addproductBtn()">Add Product</button>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex">
                            <button class="btn btn-secondary me-1" id="searchButton" onclick="searchProducts()">Search</button>
                            <input class="form-control" type="search" id="searchInput" placeholder="Search products...">
                        </div>
                    </div>
                </div>


                <div class="overlay" id="overlay"></div>
                <div class="floating-form container p-4" id="floatingForm">
                    <form class="form-container" id="productForm" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name:</label>
                            <input type="text" class="form-control" id="productName" name="productName" required>
                        </div>
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Product Image:</label>
                            <input type="file" class="form-control" id="productImage" name="productImage" required>
                        </div>
                        <div class="mb-3">
                            <label for="productDesc" class="form-label">Product Description:</label>
                            <input type="text" class="form-control input-large" id="productDesc" name="productDesc" required>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="productQuantity" class="form-label">Quantity (per set):</label>
                                    <div class="input-group">
                                        <button type="button" class="btn btn-secondary" onclick="decreaseValue()" id="decrease">-</button>
                                        <input type="number" class="form-control" id="productQuantity" name="productQuantity" step="1" required>
                                        <button type="button" class="btn btn-secondary" onclick="increaseValue()" id="increase">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Price:</label>
                            <div class="input-group">
                                <span class="input-group-text">PHP</span>
                                <input type="number" class="form-control" id="productPrice" name="productPrice" step="0.01" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="addBtn(event)"> Add Product</button>
                        <button type="button" class="btn btn-secondary" onclick="cancelBtn()">Cancel</button>
                    </form>
                </div>

            </div>

            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);
            ?>
            <section class="bg-link mt-5">
                <div class="container-lg">
                    <div class="row justify-content-center align-item-center g-4">
                        <?php
                        while ($products = $result->fetch_assoc()) {
                        ?>
                            <div class="col col-lg-4 col-md-4 d-flex align-items-stretch">
                                <div class="card">
                                    <img src="<?php echo $products['product_image']; ?>" alt="product-img" class="img-fluid">
                                    <div class="card-body">
                                        <h3 class="card-title fw-bold"><?php echo $products['product_name']; ?></h3>
                                        <p class="card-text text-muted"><?php echo $products['product_description']; ?></p>
                                        <a href="#" class="btn btn-primary">BUTTON HERE!</a>
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
    header('Location: login.php');
}

require 'footer.php';
?>