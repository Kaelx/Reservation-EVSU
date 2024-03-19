<?php
$page = 'DASHBOARD';

require 'header.php';
if (isset($_SESSION['admin'])) {
?>


    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="bg-light">
            <div class="sidebar-header">
                <button type="button" id="sidebarCollapse" class="btn btn-secondary">
                    <i class="bi bi-list"></i>
                </button>
                <h1><a href="index.php" class="logo">Project Name</a></h1>
            </div>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="#"><i class="bi bi-person-fill mr-3"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="bi bi-gear-fill mr-3"></i> Settings</a>
                </li>
                <li>
                    <a href="#"><i class="bi bi-info-circle-fill mr-3"></i> Information</a>
                </li>
            </ul>
            <div class="logout">
                <a href="../controller/logout.php" class="btn btn-danger">LOGOUT</a>
            </div>
        </nav>


        <div id="content" class="p-4 p-md-5 pt-5 text-center">
            <header class="mb-3">
                <h1 class="display-4">Welcome to the Dashboard</h1>
            </header>
            <main class="mt-4">
                <p class="lead">This is the admin dashboard for managing your e-commerce website.</p>
            </main>
        </div>
    </div>



<?php
} else {
    header('Location: login.php');
}

require 'footer.php';
?>