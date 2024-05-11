<?php
require 'db.php';

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

$sql = "SELECT * FROM `marks` lIMIT $start_form, $total_num_page";
$result = mysqli_query($con, $sql);

$sno = 1;
$output = '';


if (mysqli_num_rows($result) > 0) {
    $output .= '<table>
    <thead>
        <tr>
            <th>S.no</th>
            <th>Reg.no</th>
            <th>Std.Name</th>
            <th>Email</th>
            <th>course</th>
            <th>Year</th>
            <th>Per(%)</th>
            <th>Operation</th>
        </tr>
    </thead>
    <tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= ' <tr>
<td>' . $sno++ . '</td>
<td>' . $row['reg_no'] . '</td>
<td>' . $row['std_name'] . '</td>
<td>' . $row['email'] . '</td>
<td>' . $row['course'] . '</td>
<td>' . $row['year'] . '</td>
<td>' . $row['percentage'] . '%</td>
<td>';
        if ($row['status'] == 1) {
            $output .= '<button value="' . $row['id'] . '" onclick="statusHandler(this)" class="status active status_handles size">Active</button>';
        } else {
            $output .=  '<button value="' . $row['id'] . '" onclick="statusHandler(this)" class="status deactive status_handles size">Deactive</button>';
        }
        $output .=  '<a href="std_result_detail.php?id=' . $row['id'] . '" class="status info">Detail</a>
                </td>
                </tr>';
    }
    $output .= '</tbody></table>';

    // Add Pagination
    $sql_pag = "SELECT * FROM `marks`";
    $page_result = mysqli_query($con, $sql_pag);
    $total_record = mysqli_num_rows($page_result);
    $total_page = ceil($total_record / $total_num_page);

    $output .= '<div class="pagination" id="pagination">';
    for ($i = 1; $i <= $total_page; $i++) {
        if ($total_record > 20) {
            $output .= '<button onclick="getid(this)" value="' . $i . '" id="pg" class="pagination-btn">' . $i . '</button>';
        } else {
            $output .= '';
        }
    }
    $output .= '</div>';
    echo $output;
} else {
    echo $output = "";
}
