<?php
require 'db.php';
if (!isset($_SESSION['ADMIN_LOGGED'])) {
    header('location: admin_login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents("php://input");
    $content = json_decode($data, true);

    $id = htmlspecialchars($content['id']);
    $std_name = htmlspecialchars($content['std_name']);
    $email = htmlspecialchars($content['email']);
    $date = htmlspecialchars($content['date']);
    $month = htmlspecialchars($content['month']);
    $fees = htmlspecialchars($content['fees']);

    $sql = "INSERT INTO `fees` (`user_id`, `student_name`, `email`, `date`, `month`, `fees`) VALUES ('$id', '$std_name', '$email', '$date', '$month', '$fees')";
    $result = mysqli_query($con, $sql);
    echo $result ? 'insert' : 'not_insert';
}
