<?php
$page = "REGISTER";

require 'header.php';

if(!isset($_SESSION['admin'])){

?>



<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h1>REGISTER NOW!</h1>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group mt-3">
                            <label for="fname" class="form-label">GIVEN NAME</label>
                            <input type="text" class="form-control" id="fname" name="fname" autocomplete="on" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="lname" class="form-label">FAMILY NAME</label>
                            <input type="text" class="form-control" id="lname" name="lname" autocomplete="on" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="employeeid" class="form-label">EMPLOYEE ID</label>
                            <input type="text" class="form-control" id="employeeid" name="employeeid" autocomplete="on" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="email" class="form-label">EVSU EMAIL</label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="on" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="password" class="form-label">PASSWORD</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="on" required>
                        </div>
                        <div class="form-group mt-3 text-center">
                            <button type="submit" class="btn btn-primary" onclick="register(event)">Register</button>
                        </div>
                        <div class="form-group mt-3 text-center">
                            <a href="login.php"> Already have an account? Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
}else{
    header('location: index.php');
}
require 'footer.php';

?>