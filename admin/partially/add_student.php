<?php
require 'db.php';

if (!isset($_SESSION['ADMIN_LOGGED'])) {
    header('location: admin_login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = file_get_contents("php://input");
    $content = json_decode($data, true);
    $student_name = htmlspecialchars($content['student_name']);
    $email = htmlspecialchars($content['email']);
    $password = htmlspecialchars($content['password']);
    $sir_name = htmlspecialchars($content['sir_name']);
    $gender = htmlspecialchars($content['gender']);
    $course = htmlspecialchars($content['course']);
    $date = htmlspecialchars($content['date']);

    $reg_no = rand(11111, 99999);
    $hash = password_hash($password, PASSWORD_BCRYPT);

    $sql_email = "SELECT * FROM `students` WHERE email='$email'";
    $result_email = mysqli_query($con, $sql_email);
    $check = mysqli_num_rows($result_email);
    if ($check) {
        echo 'email is already exist';
    } else {
        $sql = "INSERT INTO `students` (`reg_no`, `student_name`, `email`, `password`,`sir_name` ,`gender`, `course`, `status`, `image`, `date_time`) VALUES ('$reg_no', '$student_name', '$email', '$hash', '$sir_name','$gender', '$course', '1', 'avater.png', '$date')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo 'insert';
        } else {
            echo 'not_insert';
        }
    }
}
