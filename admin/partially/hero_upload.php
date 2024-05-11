<?php
require("db.php");

$data = file_get_contents("php://input");
$content = json_decode($data, true);

// Controller
$status = "";
$message = "";
$error = false;

$output = "";

if (isset($_POST['hero_post']) == "hero_post") {

    $heroHeading = $_POST['heroHeading'];
    $heroText = $_POST['heroText'];
    $heroButton = $_POST['heroButton'];

    $heroImage = $_FILES['heroImage']['name'];

    $image = rand(111111111, 999999999) . '_' . $_FILES['heroImage']['name'];
    if ($_FILES['heroImage']['type'] != 'image/jpeg' && $_FILES['heroImage']['type'] != 'image/png' && $_FILES['heroImage']['type'] != 'image/jpg') {
        $message = "File Select png | jpg | jpeg ";
        $error = true;
    } elseif ($_FILES['heroImage']['size'] >= '400000') {
        $error = true;
        $message = "File is smaller than 400 (KB)";
    } else {
        move_uploaded_file($_FILES['heroImage']['tmp_name'], "../img/" .  $image);
        $sql = "INSERT INTO `hero` (`image`, `heading`, `text`, `button`) VALUES ('$image', '$heroHeading', '$heroText', '$heroButton')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $error = false;
            $status = "success";
            $message = "Hero Image Upload";
        } else {
            $error = true;
            $status = "error";
            $message = "Hero Image Not Upload";
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    $sno = 1;
    $sql = "SELECT * FROM `hero`";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $message = "show data";
        $status = "success";

        $output .= '<table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Heading</th>
                                <th>Text</th>
                                <th>Button</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                    <tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= '<tr>
                            <td>' . $sno++ . '</td>
                            <td>
                                <img src="img/' . $row['image'] . '" alt="not support" width="60px" height="60px">
                            </td>
                            <td>' . $row['heading'] . '</td>
                            <td style="white-space: normal;min-width: 400px;">' . $row['text'] . '</td>
                            <td style="white-space: normal;">' . $row['button'] . '</td>
                            <td>
                                <button class="status delete btn-delete size" value="' . $row['id'] . '|' . $row['image'] . '" onclick="heroHandle(this)" id="btn-delete">Delete</button>
                            </td>
                        </tr>';
        }
        $output .= '</tbody></table>';
    } else {
        $message = "no data found";
        $status = "success";
    }
} elseif ($content['hero_delete'] === "hero_delete") {
    $id = htmlspecialchars($content['hero_id']);
    $image = htmlspecialchars($content['image_id']);
    $sql = "DELETE FROM `hero` WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        unlink("../img/" . $image);
        $status = "success";
        $message = "Hero Image Delete Successfully";
    } else {
        $status = "";
        $message = "Hero Image Delete Not Successfully";
        $error = true;
    }
}

$send_JSON = ['status' => $status, 'message' => $message, 'error' => $error, 'data' => $output];
echo json_encode($send_JSON);
