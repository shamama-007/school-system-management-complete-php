<?php
require 'db.php';
if (!isset($_SESSION['ADMIN_LOGGED'])) {
    header('location: admin_login.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id = htmlspecialchars($_GET['id']);
    $sql = "UPDATE `contact` SET `status`='1' WHERE id = '$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location: ../contact.php');
    } else {
        echo 'some error occurred';
    }
}
