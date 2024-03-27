<?php
$page = 'LOGIN';

require 'partials/header.php';


if (!isset($_SESSION['admin'])) {
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <img src="../images/237170717_10159380668691838_867040353180657182_n.png" alt="login" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h1 class="card-title text-center">LOGIN</h1>
                            <form action="#" method="post">
                                <div class="mb-3">
                                    <label for="employeeid" class="form-label">Employee ID</label>
                                    <input type="text" name="employeeid" id="employeeid" class="form-control" required autocomplete="on">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required autocomplete="on">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" onclick="login(event)">Login</button>
                                </div>
                                <div class="form-group mt-3 text-center">
                                    <a href="register.php">Don't have an account? Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
} else {
    header('Location: index.php');
}

require 'partials/footer.php';

?>