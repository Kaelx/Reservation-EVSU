<?php
$page = "Home";

include 'header.php';

if (isset($_SESSION['user'])) {
    
?>


<div class="container">
    <div class="text-center">
        <h1>MAIN</h1>
    </div>

    <div>
        <a href="../controller/logout.php" class="btn btn-danger">LOGOUT</a>
    </div>
</div>


<?php
}
else {
    header("Location: login.php");
}


include 'footer.php';

?>