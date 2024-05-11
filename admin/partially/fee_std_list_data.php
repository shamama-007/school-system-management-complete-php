<?php
require 'db.php';

$data = file_get_contents("php://input");
$content = json_decode($data, true);

$user_id = $content['id'];
$fees_sql = "SELECT * FROM `fees` WHERE `user_id` = '$user_id' order by id desc ";
$fees_result = mysqli_query($con, $fees_sql);
$num_row = mysqli_num_rows($fees_result);
$num = 1;

while ($row_fees = mysqli_fetch_assoc($fees_result)) {
    echo '<tr>
        <td>' . $num++ . '</td>
        <td>' . $row_fees["student_name"] . '</td>
        <td>' . $row_fees["email"] . '</td>
        <td>' . $row_fees["date"] . '</td>
        <td>' . $row_fees["month"] . '</td>
        <td>' . $row_fees["fees"] . '</td>
    </tr>';
}
