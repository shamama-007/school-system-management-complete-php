<?php
require 'db.php';

if (!isset($_SESSION['ADMIN_LOGGED'])) {
    header('location: admin_login.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents("php://input");
    $content = json_decode($data, true);
    $id = htmlspecialchars($_GET['id']);
    $answer = htmlspecialchars($content['answer']);
    $insertSql = "INSERT INTO `answer`(`answer`, `ans_id`) VALUES ('$answer','$id')";
    $insert_result = mysqli_query($con, $insertSql);
    echo $insert_result ? 'insert' : 'not insert';
}
