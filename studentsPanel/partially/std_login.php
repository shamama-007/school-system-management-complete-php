<?php

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = file_get_contents("php://input");
    $content = json_decode($data, true);

    $email = htmlspecialchars($content['email']);
    $password = htmlspecialchars($content['password']);

    $sqlExist = "SELECT * FROM `students` WHERE email='$email' AND status='1'";
    $resultExist = mysqli_query($con, $sqlExist);
    $checkExist = mysqli_num_rows($resultExist);

    if (!$checkExist) {
        echo 'invalid';
    } else {
        while ($row = mysqli_fetch_assoc($resultExist)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['USER_LOGGED'] = true;
                $_SESSION['USER_EMAIL'] = $email;
                $_SESSION['USER_ID'] = $row['id'];
                echo 'loggedin';
            } else {
                echo 'invalid';
            }
        }
    }
}
