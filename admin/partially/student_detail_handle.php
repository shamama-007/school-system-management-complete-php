<?php
require 'db.php';
if (!isset($_SESSION['ADMIN_LOGGED'])) {
    header('location: admin_login.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents("php://input");
    $content = json_decode($data, true);

    $id = htmlspecialchars($content['id']);
    $student_name = htmlspecialchars($content['stu_name']);
    $email = htmlspecialchars($content['email']);
    $sir_name = htmlspecialchars($content['sir_name']);
    $gender = htmlspecialchars($content['gender']);
    $course = htmlspecialchars($content['course']);
    $date = htmlspecialchars($content['date']);

    $sql = "UPDATE `students` SET `id`='$id',`student_name`='$student_name',`email`='$email', `sir_name`='$sir_name',`gender`='$gender',`course`='$course',`date_time`='$date' WHERE id = '$id'";
    $result = mysqli_query($con, $sql);

    echo $result ? 'update' :  'not update';
}
