<?php


require 'db.php';
if (!isset($_SESSION['ADMIN_LOGGED'])) {
    header('location: admin_login.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents("php://input");
    $content = json_decode($data, true);

    $question = htmlspecialchars($content['question']);
    $exam_course = htmlspecialchars($content['exam_course']);
    $sql = "INSERT INTO `question`(`question`, `course_name`, `ans`, `status`) VALUES ('$question','$exam_course','', '1')";
    $result = mysqli_query($con, $sql);

    echo $result ? 'insert' : 'not insert';
}
