<?php
$page = 'LOGIN';

include 'header.php';
if (!isset($_SESSION['admin'])) {
?>

<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center">LOGIN</h1>
                    <form action="#" method="post">
                        <div class="mb-3">
                            <label for="employee-id" class="form-label">Employee ID</label>
                            <input type="text" name="employee-id" id="employee-id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
} else {
    header('Location: index.php');
}
include 'footer.php';

?>