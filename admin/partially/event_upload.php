<?php
require("./db.php");

$data = file_get_contents("php://input");
$content = json_decode($data, true);

$message = "";
$error = false;
$status = "";
$output = '';

if (isset($_POST['event_post']) == "event_post") {

    $eventHeading = $_POST['eventHeading'];
    $image = rand(111111111, 999999999) . '_' . basename($_FILES['galleryImage']['name']);
    $targetPath = "../img/" . $image;

    if (
        $_FILES["galleryImage"]["type"] != "image/jpeg" &&
        $_FILES["galleryImage"]["type"] != "image/jpg" &&
        $_FILES["galleryImage"]["type"] != "image/png"
    ) {
        $message = "File Select jpeg | jpg | png";
        $error = true;
    } elseif ($_FILES["galleryImage"]["size"] >= 600000) {
        $message = "file upload less than 600 KB";
        $error = true;
    } elseif (move_uploaded_file($_FILES["galleryImage"]["tmp_name"], $targetPath)) {
        $sql = "INSERT INTO `event` (`image`, `heading`) VALUES ('$image', '$eventHeading')";
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
} elseif ($_SERVER['REQUEST_METHOD'] === "GET") {
    $sql = "SELECT * FROM `event`";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $message = "show data";
        $status = "success";

        while ($row = mysqli_fetch_assoc($result)) {
            $output .= '
            <div class="item">
                <div class="img">
                    <img id="galleryImage" src="img/' . $row['image'] . '" alt="Image">
                </div>
                <div class="detail">';
            $output .= '
            <div>
                <h3>' . $row['heading'] . '</h3>
            </div>
            <button class="status delete btn-delete size" value="' . $row['id'] . '|' . $row['image'] . '" onclick="eventHandle(this)" >Delete</button>
                </div>
            </div>';
        }
    } else {
        $message = "no data found";
        $status = "success";
    }
} elseif ($content['event_delete'] === "event_delete") {
    $id = htmlspecialchars($content['event_id']);
    $image = htmlspecialchars($content['image_id']);
    $sql = "DELETE FROM `event` WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        unlink("../img/" . $image);
        $status = "success";
        $message = "Event Image Delete Successfully";
        $error = false;
    } else {
        $status = "";
        $message = "Event Image Delete Not Successfully";
        $error = true;
    }
}

$send_JSON = ["status" => $status, 'message' => $message, "error" => $error, 'data' => $output];
echo json_encode($send_JSON);
