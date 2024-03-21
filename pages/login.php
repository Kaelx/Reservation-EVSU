<?php
$page = "LOGIN";

require 'header.php';

if (!isset($_SESSION['user'])) {

?>


    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>MUST LOGIN FIRST!</h1>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post">
                            <div class="form-group mt-3">
                                <label for="studentid" class="form-label">STUDENT ID</label>
                                <input type="text" class="form-control" id="studentid" name="studentid" autocomplete="on" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="password" class="form-label">PASSWORD</label>
                                <input type="password" class="form-control" id="password" name="password" autocomplete="on" required>
                            </div>
                            <div class="form-group text-center mt-3">
                                <button type="submit" class="btn btn-primary" onclick="login(event)">LOGIN</button>
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
} else {
    header("Location: index.php");
}


require 'footer.php';
?>