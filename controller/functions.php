<?php
session_start();
include 'config.php';

if(isset($_POST['register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $stud_id = $_POST['studentid'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($fname) || empty($lname) || empty($stud_id) || empty($email) || empty($password)) {
        echo "PLEASE FILL UP ALL FIELDS!";
        return;
    }

    $hash = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (fname, lname, stud_id, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fname, $lname, $stud_id, $email, $hash);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        echo "REGISTERED SUCCESSFULLY!";
    } else {
        echo "REGISTRATION FIELD!";
    }
}

if(isset($_POST['login'])){
    $stud_id = $_POST['studentid'];
    $password = $_POST['password'];

    if(empty($stud_id) || empty($password)) {
        echo "PLEASE FILL UP ALL FIELDS!";
        return;
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE stud_id = ?");
    $stmt->bind_param("s", $stud_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if($result->num_rows > 0){
        if(password_verify($password, $user['password'])){
            echo "LOGGED IN SUCCESSFULLY!";
            $_SESSION['user'] = $user['stud_id'];
        } else {
            echo "INVALID PASSWORD!";
        }
    } else {
        echo "INVALID STUDENT ID!";
    }
}

?>