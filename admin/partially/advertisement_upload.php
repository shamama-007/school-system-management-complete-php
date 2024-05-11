<?php
require("./db.php");

$data = file_get_contents("php://input");
$content = json_decode($data, true);


$message = "";
$error = false;
$status = "";
$output = '';

if (isset($_POST['advertisement_post']) == "advertisement_post") {
    foreach ($_FILES["myFiles"]["tmp_name"] as $key => $value) {

        $image = rand(111111111, 999999999) . '_' . basename($_FILES['myFiles']['name'][$key]);
        $targetPath = "../img/" . $image;

        if (
            $_FILES["myFiles"]["type"][$key] != "image/jpeg" &&
            $_FILES["myFiles"]["type"][$key] != "image/jpg" &&
            $_FILES["myFiles"]["type"][$key] != "image/png"
        ) {
            $message = "File Select jpeg | jpg | png";
            $error = true;
        } elseif ($_FILES["myFiles"]["size"][$key] >= 600000) {
            $message = "file upload less than 600 KB";
            $error = true;
        } elseif (move_uploaded_file($_FILES["myFiles"]["tmp_name"][$key], $targetPath)) {
            $sql = "INSERT INTO `advertisement` (`image`, `status`) VALUES ('$image', 0)";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $message = "upload";
                $status = "success";
            } else {
                $message = "not upload";
                $error = true;
            }
        } else {
            $message = "not upload";
            $error = true;
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === "GET") {
    $sql = "SELECT * FROM `advertisement`";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $message = "show data";
        $status = "success";

        while ($row = mysqli_fetch_assoc($result)) {
            $output .= '
            <div class="item">
            <div class="img">
                <img src=" img/' . $row['image'] . '" alt="not Supported">
            </div>
            <div class="detail">';
            if ($row["status"] == 1) {
                $output .= '<button value="' . $row['id'] . '" onclick="statusHandler(this)" id="status_handle" class="status active status_handles size">Active</button>';
            } else {
                $output .= '<button value="' . $row['id'] . '" onclick="statusHandler(this)" id="status_handle" class="status deactive status_handles size">Deactive</button>';
            }
            $output .= '
                <button class="status delete btn-delete size" value="' . $row['id'] . '|' . $row['image'] . '" onclick="advertisementHandle(this)" >Delete</button>
            </div>
        </div>';
        }
    } else {
        $message = "no data found";
        $status = "success";
    }
} elseif ($content['advertisement_delete'] === "advertisement_delete") {
    $id = htmlspecialchars($content['advertisement_id']);
    $image = htmlspecialchars($content['image_id']);
    $sql = "DELETE FROM `advertisement` WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        unlink("../img/" . $image);
        $status = "success";
        $message = "Advertisement Delete Successfully";
        $error = false;
    } else {
        $status = "";
        $message = "Advertisement Delete Not Successfully";
        $error = true;
    }
}

$send_JSON = ["status" => $status, 'message' => $message, "error" => $error, 'data' => $output];
echo json_encode($send_JSON);
