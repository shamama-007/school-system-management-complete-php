<?php
require 'db.php';
if (!isset($_SESSION['ADMIN_LOGGED'])) {
    header('location: admin_login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id = htmlspecialchars($_GET['id']);
    $correct_id = htmlspecialchars($_GET['correct_id']);

    $sql_get = "SELECT * FROM `answer` WHERE a_id = '$correct_id'";
    $result_get = mysqli_query($con, $sql_get);
    $row = mysqli_fetch_assoc($result_get);
    $answer = $row['answer'];

    $sql = "UPDATE `question` SET `ans`='$correct_id' WHERE q_id = '$id'";
    $result = mysqli_query($con, $sql);

    if($result) {
        header("location: ../correct_answer.php?id=$id&success_mcq=$answer Update");
    }else {
        header("location: ../correct_answer.php?id=$id&error_mcq=Not Update");
    }
}
