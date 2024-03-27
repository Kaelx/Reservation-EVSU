<?php
$page = "LOGIN";

require 'partials/header.php';

if (!isset($_SESSION['user'])) {

?>


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card p-4">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <img src="../images/237170717_10159380668691838_867040353180657182_n.png" alt="login" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                        <h1 class="card-title text-center">LOGIN</h1>
                            <form action="#" method="post">
                                <div class="form-group mt-3">
                                    <label for="studentid" class="form-label">STUDENT ID</label>
                                    <input type="text" class="form-control" id="studentid" name="studentid" autocomplete="on" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="password" class="form-label">PASSWORD</label>
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="on" required>
                                </div>
                                <div class="form-group text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-block" onclick="login(event)">LOGIN</button>
                                </div>
                                <div class="form-group text-center mt-3">
                                    <a href="register.php">Don't have an account? REGISTER</a>
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
    header("Location: index.php");
}


require 'partials/footer.php';
    ?>