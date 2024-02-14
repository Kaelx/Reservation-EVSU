<?php
$PAGE = "LOGIN";

include 'header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h1>LOGIN</h1>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group mt-3">
                            <label for="username">STUDENT ID</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">PASSWORD</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group text-center mt-3">
                            <button type="submit" class="btn btn-primary">LOGIN</button>
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

<?php
include 'footer.php';
?>