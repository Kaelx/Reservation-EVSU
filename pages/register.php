<?php
$PAGE = "REGISTER";

include 'header.php';
?>


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h1>REGISTER NOW!</h1>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group mt-3">
                            <label for="name" class="form-label">GIVEN NAME</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="lastname" class="form-label">FAMILY Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="studentid" class="form-label">STUDENT ID</label>
                            <input type="text" class="form-control" id="studentid" name="studentid" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="email" class="form-label">EVSU EMAIL</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group mt-3 text-center">
                            <button type="submit" class="btn btn-primary">Register</button>
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
include 'footer.php';

?>