<?php
require 'db.php';
if (!isset($_SESSION['ADMIN_LOGGED'])) {
    header('location: admin_login.php');
}

$data = file_get_contents("php://input");
$content = json_decode($data, true);
// print_r($content);
// die();

if ($content['type'] == "feedback") {
    if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
        $id = htmlspecialchars($content['id']);
        $sql = "DELETE FROM `feedback` WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        echo $result ? "delete" : "not_delete";
    }
}
if ($content['type'] == "contact") {
    if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
        $id = htmlspecialchars($content['id']);
        $sql = "DELETE FROM `contact` WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        echo $result ? "delete" : "not_delete";
    }
}



// Feedback Read / Unread Show/Hide
if (isset($content['type']) && $content['type'] != '') {
    $type = $content['type'];
    if ($type == 'status') {
        $operation = $content['operation'];
        $id = $content['id'];
        if ($operation != 'active') {
            echo "active";
            $status = '1';
        } else {
            echo "deactive";
            $status = '0';
        }
        if ($content['page'] == "feedback") {
            $update_status = "UPDATE `feedback` SET status='$status' WHERE id = '$id'";
            $update_result = mysqli_query($con, $update_status);
        } else  if ($content['page'] == "contact") {
            $update_status = "UPDATE `contact` SET status='$status' WHERE id = '$id'";
            $update_result = mysqli_query($con, $update_status);
        }
    }
}
