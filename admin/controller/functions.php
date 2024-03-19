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

?>