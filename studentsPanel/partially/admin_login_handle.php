<?php
require 'db.php';

// Check User Authenication
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents("php://input");
    $content = json_decode($data, true);
    $email = htmlspecialchars($_SESSION['USER_EMAIL']);
    $password = htmlspecialchars($content['password']);
    $sqlEx = "SELECT * FROM `students` WHERE email = '$email'";
    $resultExist = mysqli_query($con, $sqlEx);
    $checkExist = mysqli_num_rows($resultExist);
    if (!$checkExist) {
        echo 'invalid';
    } else {
        while ($row = mysqli_fetch_assoc($resultExist)) {
            if ($password === $row['paper_password']) {
                $_SESSION['USER_PAPER'] = true;
                echo 'loggedin';
            } else {
                echo 'invalid';
            }
        }
    }
}

// Get Password And Contact Admin
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $password_generate = rand(11111, 99999);
    $sqlUpdate = "UPDATE `students` SET `paper_password` = '$password_generate' WHERE id = '$id'";
    $resultExist = mysqli_query($con, $sqlUpdate);
    if($resultExist) {
        header('location: ../admin_login.php?success_mcq=Password Send, Contact Admin');
    }else {
        header('location: ../admin_login.php?error_mcq=Password Not Send');
    }

}
