<?php
require 'db.php';
if (!isset($_SESSION['ADMIN_LOGGED'])) {
    header('location: admin_login.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents("php://input");
    $content = json_decode($data, true);
    $id_update = htmlspecialchars($content['id_update']);
    $answer_update = htmlspecialchars($content['answer_update']);

    $sql = "UPDATE `answer` SET `answer`='$answer_update' WHERE a_id = '$id_update'";
    $result = mysqli_query($con, $sql);
    echo $result ? 'update' : 'not update';
}
