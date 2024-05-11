<?php
require("db.php");

$data = file_get_contents("php://input");
$content = json_decode($data, true);

// Controller
$status = "";
$message = "";
$error = false;

$output = "";

if (isset($_POST['teacher_post']) == "teacher_post") {

    $teacherTitle = $_POST['teacherTitle'];
    $teacherDescription = $_POST['teacherDescription'];
    $teacherWhatsapp = $_POST['teacherWhatsapp'];
    $teacherFacebook = $_POST['teacherFacebook'];

    $teacherImage = $_FILES['teacherImage']['name'];

    $image = rand(111111111, 999999999) . '_' . $_FILES['teacherImage']['name'];
    if ($_FILES['teacherImage']['type'] != 'image/jpeg' && $_FILES['teacherImage']['type'] != 'image/png' && $_FILES['teacherImage']['type'] != 'image/jpg') {
        $message = "please select png || jpg || jpeg format";
        $error = true;
    } elseif ($_FILES['teacherImage']['size'] >= '400000') {
        $error = true;
        $message = "File is smaller than 400 (KB)";
    } else {
        move_uploaded_file($_FILES['teacherImage']['tmp_name'], "../img/" .  $image);
        $sql = "INSERT INTO `teacher` (`image`, `sir_name`, `description`, `whatsapp`, `facebook`) VALUES ('$image', '$teacherTitle', '$teacherDescription', '$teacherWhatsapp', '$teacherFacebook')";
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
} elseif ($_SERVER['REQUEST_METHOD'] === "GET") {
    $sno = 1;
    $sql = "SELECT * FROM `teacher`";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $message = "show data";
        $status = "success";
        $output .= '<table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Teacher Name</th>
                                <th>Description</th>
                                <th>Social 🔗</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                    <tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= '<tr>
                            <td>' . $sno++ . '</td>
                            <td>
                                <img src=" img/' . $row['image'] . '" alt="not support" width="60px" height="60px">
                            </td>
                            <td>' . $row['sir_name'] . '</td>
                            <td style="white-space: normal;">' . $row['description'] . '</td>
                            <td>
                                <a href="' . $row['whatsapp'] . '">Whatsapp</a>
                                <a href="' . $row['facebook'] . '">Facebook</a>
                            </td>
                            
                            <td>
                                <button class="status delete btn-delete size" value="' . $row['id'] . '|' . $row['image'] . '" onclick="teacherHandle(this)" id="btn-delete">Delete</button>
                            </td>
                        </tr>';
        }
        $output .= '</tbody></table>';
    } else {
        $message = "no data found";
        $status = "success";
    }
} elseif ($content['teacher_delete'] === "teacher_delete") {
    $id = htmlspecialchars($content['teacher_id']);
    $image = htmlspecialchars($content['image_id']);
    $sql = "DELETE FROM `teacher` WHERE id = '$id'";
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
