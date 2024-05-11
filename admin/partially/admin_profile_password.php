<?php
require 'db.php';

if (!isset($_SESSION['ADMIN_LOGGED'])) {
    header('location: admin_login.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents("php://input");
    $content = json_decode($data, true);

    $old_password = htmlspecialchars($content['current_pwd']);
    $new_password = htmlspecialchars($content['new_pwd']);
    $conf_password = htmlspecialchars($content['con_pwd']);

    $id = $_SESSION['ADMIN_ID'];
    if ($new_password === $conf_password) {
        $sqlquery = "SELECT password FROM `admin` WHERE id = '$id'";
        $result = mysqli_query($con, $sqlquery);
        if ($row = mysqli_fetch_assoc($result)) {
            $password_form_db = $row['password'];
            if (password_verify($old_password, $password_form_db)) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $sqlUpdate = "UPDATE `admin` SET password = '$hashed_password' WHERE id = '$id'";
                $result_2 = mysqli_query($con, $sqlUpdate);
                echo 'password update';
            } else {
                echo 'Database password do not match';
            }
        }
    } else {
        echo 'password do not match';
    }
}
