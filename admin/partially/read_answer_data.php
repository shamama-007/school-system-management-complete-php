<?php

require 'db.php';

$data = file_get_contents("php://input");
$content = json_decode($data, true);

$id = $content['id'];
$sql = "SELECT * FROM `answer` WHERE ans_id = '$id'";
$result = mysqli_query($con, $sql);
$num_row = mysqli_num_rows($result);

$correct = '';
$sql_q = "SELECT * FROM `question` WHERE q_id = '$id'";
$result_q = mysqli_query($con, $sql_q);
$row_q = mysqli_fetch_assoc($result_q);

$sql_a = "SELECT * FROM `answer` WHERE ans_id = '$id'";
$result_a = mysqli_query($con, $sql_a);

$num = 1;
$output = '';

if (mysqli_num_rows($result) > 0) {
    $output .= '<table>
                <thead>
                    <th>S.no</th>
                    <th>Answer</th>
                    <th>Correct</th>
                    <th>Operation</th>
                    </tr>
                </thead>
                <tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>
                            <td>' . $num++ . '</td>
                            <td hidden>' . $row['a_id'] . '</td>
                            <td style="white-space: normal;">' . $row['answer'] . '</td>
    
                            <td>
                                <a href="partially/correct_id.php?id=' . $id . '&correct_id=' . $row['a_id'] . '">';
        if ($row_q['ans'] == $row['a_id']) {
            $output .= 'correct';
        } else {
            $output .= 'not correct';
        }
        $output .= '</a>
                            </td>
                            <td>
                                <button value="' . $row['a_id'] . '" onclick="updateAnswer(this)" class="status warning btn-update size">Update</button>
                                <button value="' . $row['a_id'] . '" onclick="deleteAnswer(this)" class="status delete btn-delete size">Delete</button>
                            </td>
                        </tr>';
    }

    $output .= '</tbody></table>';
}
echo $output;
