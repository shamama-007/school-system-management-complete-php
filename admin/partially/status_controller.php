<?php
require 'db.php';

// Active/Deactive
$data = file_get_contents("php://input");
$content = json_decode($data, true);

if (isset($content['type']) && $content['type'] != '') {
    $type = $content['type'];
    if ($type == 'status') {
        $operation = $content['operation'];
        $id = $content['id'];
        if ($operation !== 'Active') {
            $status = '1';
            echo "Active";
        } else {
            $status = '0';
            echo "Deactive";
        }
        // Students Status
        if ($content["page"] == "student") {
            $update_status = "UPDATE `students` SET status='$status' WHERE id = '$id'";
            $update_result = mysqli_query($con, $update_status);
        }

        // Question Status
        if ($content['page'] == "question") {
            $update_status = "UPDATE `question` SET status='$status' WHERE q_id = '$id'";
            $update_result = mysqli_query($con, $update_status);
        }

        // Question Status
        if ($content['page'] == "std_result") {
            $update_status = "UPDATE `marks` SET status='$status' WHERE id = '$id'";
            $update_result = mysqli_query($con, $update_status);
        }

        if ($content['page'] == "advertisement") {
            $update_status = "UPDATE `advertisement` SET status='$status' WHERE id = '$id'";
            $update_result = mysqli_query($con, $update_status);
        }

    }
}
