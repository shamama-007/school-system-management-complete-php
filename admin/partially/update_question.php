<?php
require 'db.php';
if (!isset($_SESSION['ADMIN_LOGGED'])) {
    header('location: admin_login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents("php://input");
    $content = json_decode($data, true);

    $id_update = htmlspecialchars($content['id_update']);
    $question_update = htmlspecialchars($content['question_update']);
    $course_update = htmlspecialchars($content['course_update']);

    $sql = "UPDATE `question` SET `question`='$question_update',`course_name`='$course_update' WHERE q_id = '$id_update'";
    $result = mysqli_query($con, $sql);
    echo $result ? 'update' : 'not update';
}
