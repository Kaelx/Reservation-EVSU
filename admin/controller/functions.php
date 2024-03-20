<?php
session_start();
require 'config.php';

if(isset($_POST['register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $employee_id = $_POST['employeeid'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($fname) || empty($lname) || empty($employee_id) || empty($email) || empty($password)) {
        echo "PLEASE FILL UP ALL FIELDS!";
        return;
    }

    $hash = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO admins (fname, lname, employee_id, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fname, $lname, $employee_id, $email, $hash);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        echo 1;
        $_SESSION['admin'] = $employee_id;
    } else {
        echo "REGISTRATION FIELD!";
    }
}

if(isset($_POST['login'])){
    $employee_id = $_POST['employeeid'];
    $password = $_POST['password'];

    if(empty($employee_id) || empty($password)) {
        echo "PLEASE FILL UP ALL FIELDS!";
        return;
    }

    $stmt = $conn->prepare("SELECT * FROM admins WHERE employee_id = ?");
    $stmt->bind_param("s", $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if($result->num_rows > 0){
        if(password_verify($password, $user['password'])){
            echo 1;
            $_SESSION['admin'] = $user['employee_id'];
        } else {
            echo "INVALID PASSWORD!";
        }
    } else {
        echo "INVALID EMPLOYEE ID!";
    }
}


if(isset($_POST['addProduct'])){
    $pName = $_POST['productName'];
    $pDesc = $_POST['productDesc'];
    $pQuantity = $_POST['productQuantity'];
    $pPrice = $_POST['productPrice'];

    if(empty($pName) || empty($pDesc) || empty($pQuantity) || empty($pPrice)) {
        echo "PLEASE FILL UP ALL FIELDS!";
        return;
    }


    if(isset($_FILES['productImage']) && $_FILES['productImage']['error'] === UPLOAD_ERR_OK) {
        $productName = $_FILES['productImage']['name'];
        $productName_temp = $_FILES['productImage']['tmp_name'];
        $upload_path = "../images/$productName";

        if(move_uploaded_file($productName_temp, $upload_path)) {
            $stmt = $conn->prepare("INSERT INTO products (product_name, product_image, product_description, product_quantity, product_price) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssid", $pName, $upload_path, $pDesc, $pQuantity, $pPrice);
            $stmt->execute();
            
            if($stmt->affected_rows > 0){
                echo 1; 
            } else {
                echo "PRODUCT ADDITION FAILED!";
            }
        } else {
            echo "Something went wrong!";
        }
    } else {
        echo "Error uploading file!";
    }
}


?>