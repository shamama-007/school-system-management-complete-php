<?php

require './db.php';

// Add Pagination
$total_num_page = 20;

$data = file_get_contents("php://input");
$content = json_decode($data, true);
if (isset($content['page_id'])) {
    $page_id = $content['page_id'];
} else {
    $page_id = 1;
}
$start_form = ($page_id - 1) * 20;

$sql = "SELECT * FROM `question` order by q_id desc lIMIT $start_form, $total_num_page";
$result = mysqli_query($con, $sql);

$num = 1;
$output = '';

if (mysqli_num_rows($result) > 0) {
    $output .= '<table>
            <thead>
                <th>S.no</th>
                <th>Question</th>
                <th>Course Name</th>
                <th>Operation</th>
                </tr>
            </thead>
            <tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>
                        <td>' . $num++ . '</td>
                        <td hidden>' . $row['q_id'] . '</td>
                        <td style="white-space: normal;">' . $row['question'] . '</td>
                        <td>' . $row['course_name'] . '</td>
                        <td>';
        if ($row['status'] == 1) {
            $output .= '<button value="' . $row['q_id'] . '" onclick="statusHandler(this)" class="status active status_handles size" id="status_handle">Active</button>';
        } else {
            $output .= '<button value="' . $row['q_id'] . '" onclick="statusHandler(this)" class="status deactive status_handles size" id="status_handle">Deactive</button>';
        }
        $output .= '        <a href="correct_answer.php?id=' . $row['q_id'] . '" class="status info sm" role="button">Answer</a> 
                            <button class="status warning btn-update size" value="' . $row['q_id'] . '"  onclick="updateQuestion(this)" id="btn-info">Update</button>
                            <button class="status delete btn-delete size" value="' . $row['q_id'] . '" onclick="deleteQuestion(this)" id="btn-delete">Delete</button>
                        </td>
                    </tr>';
    }
    $output .= '</tbody></table>';

    // Add Pagination
    $sql_pag = "SELECT * FROM `question`";
    $page_result = mysqli_query($con, $sql_pag);
    $total_record = mysqli_num_rows($page_result);
    $total_page = ceil($total_record / $total_num_page);
    $output .= '<div class="pagination">';
    for ($i = 1; $i <= $total_page; $i++) {
        if ($total_record > 20) {
            $output .= '<button onclick="getid(this)" value="' . $i . '" id="pg" class="pagination-btn">' . $i . '</button>';
        } else {
            $output .= '';
        }
    }
    $output .= '</div>';
}
echo $output;
