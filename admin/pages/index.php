<?php
$page = 'DASHBOARD';

require 'header.php';
if (isset($_SESSION['admin'])) {
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <aside class="col-md-3 collapse d-md-block" id="sidebarMenu">
            <nav class="sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">
                            <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-box-open me-2"></i>Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-tag me-2"></i>Products
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <div class="col-md-9">
            <header class="mb-3">
                <h1 class="display-4">Welcome to the Dashboard</h1>
            </header>
            <main class="mt-4">
                <p class="lead">This is the admin dashboard for managing your e-commerce website.</p>
            </main>
        </div>
    </div>
</div>
<div>
    <a href="../controller/logout.php" class="btn btn-danger">LOGOUT</a>
</div>

<?php
} else {
    header('Location: login.php');
}

require 'footer.php';
?>