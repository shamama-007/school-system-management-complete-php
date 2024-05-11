<?php
require '../partially/db.php';

if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {

    $data = file_get_contents("php://input");
    $content = json_decode($data, true);
    
    if (empty($content['name'])) {
        echo "name";
    } else if (empty($content['contact_number'])) {
        echo "contact_number";
    } else if (empty($content['qualification'])) {
        echo "qualification";
    } else {
        $name = htmlspecialchars($content['name']);
        $email = htmlspecialchars($content['email']);
        $contact_number = htmlspecialchars($content['contact_number']);
        $qualification = htmlspecialchars($content['qualification']);
        $date = date("j-m-Y");

        $sql = "INSERT INTO `student_enroll` (`name`, `email`, `contact_number`, `qualification`, `date`) VALUES ('$name', '$email', '$contact_number', '$qualification', '$date');";
        $result = mysqli_query($con, $sql);

        echo $result ? 'insert' : 'not_insert';
    }
}
