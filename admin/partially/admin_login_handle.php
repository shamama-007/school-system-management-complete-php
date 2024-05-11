<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents("php://input");
    $content = json_decode($data, true);
    
    $email = htmlspecialchars($content['email']);
    $password = htmlspecialchars($content['password']);

    $sqlEx = "SELECT * FROM `admin` WHERE email = '$email'";
    $resultExist = mysqli_query($con, $sqlEx);
    $checkExist = mysqli_num_rows($resultExist);

    if (!$checkExist) {
        echo 'invalid';
    } else {
        while ($row = mysqli_fetch_assoc($resultExist)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['ADMIN_LOGGED'] = true;
                $_SESSION['ADMIN_EMAIL'] = $email;
                $_SESSION['ADMIN_ID'] = $row['id'];
                echo 'loggedin';
            } else {
                echo 'invalid';
            }
        }
    }
}
