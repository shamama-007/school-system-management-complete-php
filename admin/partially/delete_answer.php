<?php

require 'db.php';
if (!isset($_SESSION['ADMIN_LOGGED'])) {
    header('location: admin_login.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents("php://input");
    $content = json_decode($data, true);
    $id = htmlspecialchars($content['delete_id']);
    $sql = "DELETE FROM `answer` WHERE a_id = '$id'";
    $result = mysqli_query($con, $sql);
    echo $result ? 'delete' : 'not delete';
}

