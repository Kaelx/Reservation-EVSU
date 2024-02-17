<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location:pages/login.php');
}else{
    header('location:pages/index.php');
}
?>