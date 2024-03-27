<?php
session_start();

require '../controller/config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page; ?></title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body onload="myFunction()">
    <div id="loader"></div>
    <div style="display:none;" id="myDiv" class="animate-bottom">