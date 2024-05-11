<?php
require("db.php");

$data = file_get_contents("php://input");
$content = json_decode($data, true);

// Controller
$status = "";
$message = "";
$error = false;

$output = "";

if (isset($_POST['course_post']) == "course_post") {

    $courseTitle = $_POST['courseTitle'];
    $courseDescription = $_POST['courseDescription'];
    $courseCurrent = $_POST['courseCurrent'];
    $courseImage = $_FILES['courseImage']['name'];
    $image = rand(111111111, 999999999) . '_' . $_FILES['courseImage']['name'];
    if ($_FILES['courseImage']['type'] != 'image/jpeg' && $_FILES['courseImage']['type'] != 'image/png' && $_FILES['courseImage']['type'] != 'image/jpg') {
        $message = "please select png || jpg || jpeg format";
        $error = true;
    } elseif ($_FILES['courseImage']['size'] >= '400000') {
        $error = true;
        $message = "File is smaller than 400 (KB)";
    } else {
        move_uploaded_file($_FILES['courseImage']['tmp_name'], "../img/" .  $image);
        $sql = "INSERT INTO `ui` (`type`, `image`, `title`, `description`) VALUES ('$courseCurrent', '$image', '$courseTitle', '$courseDescription')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $error = false;
            $status = "success";
            $message = "Course Image Upload";
        } else {
            $error = true;
            $status = "error";
            $message = "Course Image Not Upload";
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    $sno = 1;
    $sql = "SELECT * FROM `ui` WHERE type = 'courseCurrent'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $message = "show data";
        $status = "success";
        $output .= '<table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                    <tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= '<tr>
                            <td>' . $sno++ . '</td>
                            <td>
                                <img src="img/'. $row['image'] . '" alt="not support" width="60px" height="60px">
                            </td>
                            <td>' . $row['title'] . '</td>
                            <td style="white-space: normal;">' . $row['description'] . '</td>
                            <td>
                                <button class="status delete btn-delete size" value="' . $row['id'] . '|' . $row['image'] . '" onclick="courseHandle(this)" id="btn-delete">Delete</button>
                            </td>
                        </tr>';
        }
        $output .= '</tbody></table>';
    } else {
        $message = "no data found";
        $status = "success";
    }
} elseif ($content['course_delete'] === "course_delete") {
    $id = htmlspecialchars($content['course_id']);
    $image = htmlspecialchars($content['image_id']);
    $sql = "DELETE FROM `ui` WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        unlink("../img/" . $image);
        $status = "success";
        $message = "Course Delete Successfully";
    } else {
        $status = "";
        $message = "Course Delete Not Successfully";
        $error = true;
    }
}

$send_JSON = ['status' => $status, 'message' => $message, 'error' => $error, 'data' => $output];
echo json_encode($send_JSON);
