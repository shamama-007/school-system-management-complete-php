<?php
require '../partially/db.php';

if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {

    $data = file_get_contents("php://input");
    $content = json_decode($data, true);
    if (empty($content['email'])) {
        echo "email";
    } else if (empty($content['message'])) {
        echo "message";
    } else {
        $feedback_email = htmlspecialchars($content['email']);
        $feedback_message = htmlspecialchars($content['message']);
        $date = date("j-m-Y");

        $sql = "INSERT INTO `feedback` (`email`, `message`, `date`, `status`) VALUES ('$feedback_email', '$feedback_message', '$date', '0')";
        $result = mysqli_query($con, $sql);

        echo $result ? 'insert' : 'not_insert';
    }
}
