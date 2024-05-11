<?php
require 'db.php';
if (!isset($_SESSION['ADMIN_LOGGED'])) {
    header('location: admin_login.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = htmlspecialchars($_GET['id']);
    $sql = "DELETE FROM `contact` WHERE id = '$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location: ../contact.php?error_mcq=Delete has been successfully');
    } else {
        header('location: ../contact.php?error_mcq=Delete has not been successfully');
    }
}
