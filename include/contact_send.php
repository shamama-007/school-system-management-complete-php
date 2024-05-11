<?php
require '../partially/db.php';

if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {

    $data = file_get_contents("php://input");
    $content = json_decode($data, true);
    if (empty($content['name'])) {
        echo "name";
    } else if (empty($content['email'])) {
        echo "email";
    } else if (empty($content['message'])) {
        echo "message";
    } else {
        $name = htmlspecialchars($content['name']);
        $email = htmlspecialchars($content['email']);
        $message = htmlspecialchars($content['message']);
        $date = date("j-m-Y");

        $sql = "INSERT INTO `contact` (`name`, `email`, `message`, `date`, `status`) VALUES ('$name', '$email', '$message', '$date', '0')";
        $result = mysqli_query($con, $sql);

        echo $result ? 'insert' : 'not_insert';
    }
}
