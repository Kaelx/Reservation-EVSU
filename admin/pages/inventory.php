<?php
$page = 'INVENTORY';

require 'partials/header.php';

if (isset($_SESSION['admin'])) {
?>


    <div class="wrapper d-flex align-items-stretch">
        <?php
        require 'partials/nav.php'
        ?>

        <div id="content">
            <div class="mb-3 text-center">
                <h5 class="display-4">INVENTORY</h5>
            </div>
            <div class="container mt-2">
                <div class="row justify-content-between">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-success" id="addproductBtn" onclick="showProductBtn()">Add Product</button>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex">
                            <button class="btn btn-secondary me-1" id="searchButton" onclick="searchProducts()">Search</button>
                            <input class="form-control" type="search" id="searchInput" placeholder="Search products..." autofocus>
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
                            <textarea type="text" class="form-control input-large" id="productDesc" name="productDesc" required></textarea>
                        </div>
                        <div class="row justify-content-center">
                                <div class="col-8">
                                    <div class="mb-3 text-center">
                                        <label for="productPrice" class="form-label">Price:</label>
                                        <div class="input-group">
                                            <span class="input-group-text">PHP</span>
                                            <input type="number" class="form-control" id="productPrice" name="productPrice" step="0.01" required>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <div class="mb-3 text-center">
                                    <label for="productQuantity" class="form-label">Quantity:</label>
                                    <div class="input-group">
                                        <button type="button" class="btn btn-secondary" onclick="decreaseValue()" id="decrease">-</button>
                                        <input type="number" class="form-control" id="productQuantity" name="productQuantity" step="1" required>
                                        <button type="button" class="btn btn-secondary" onclick="increaseValue()" id="increase">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" onclick="addBtn(event)"> Add Product</button>
                            <button type="button" class="btn btn-secondary" onclick="cancelBtn()">Cancel</button>
                        </div>
                    </form>
                </div>

            </div>

            <?php

            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);
            ?>
            <section class="products-section mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table-products">
                                    <thead class="bg-primary text-white text-center">
                                        <tr>
                                            <th scope="col" class="col-1">Image</th>
                                            <th scope="col" class="col-2">Product Name</th>
                                            <th scope="col" class="col-2">Description</th>
                                            <th scope="col" class="col-1">Quantity</th>
                                            <th scope="col" class="col-1">Price</th>
                                            <th scope="col" class="col-1">Manage</th>
                                        </tr>
                                    </thead>

                                    <tbody class="align-middle text-center">
                                        <?php while ($products = $result->fetch_assoc()) { ?>
                                            <tr>
                                                <td><img src="<?= $products['product_image'] ?>" alt="Product Image" class="img-thumbnail"></td>
                                                <td><?= $products['product_name'] ?></td>
                                                <td><?= $products['product_description'] ?></td>
                                                <td><?= $products['product_quantity'] ?></td>
                                                <td><?= $products['product_price'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" onclick="ManageBtn(<?= $products['id'] ?>)">Manage</button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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