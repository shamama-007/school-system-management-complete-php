<?php
require 'db.php';
$sql_count = "SELECT * FROM `students`";
$result_count = mysqli_query($con, $sql_count);
$total_count = mysqli_num_rows($result_count);

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

$sql = "SELECT * FROM `students` order by date_time asc lIMIT $start_form, $total_num_page";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
$output = '';
$sno = 1;

if ($count) {
    $output .= '<table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Reg.no</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Join Date</th>
                        <th>Paper.Pass</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody id="students_data">';

    while ($row = mysqli_fetch_assoc($result)) {
        $reg_no = $row['reg_no'];
        $student_name = $row['student_name'];
        $email = $row['email'];
        $password = $row['password'];
        $gender = $row['gender'];
        $course = $row['course'];
        $paper_password = $row['paper_password'];
        $date_time = $row['date_time'];

        if ($paper_password === "") {
            $checker = 'Empty';
        } else {
            $checker = $row['paper_password'];
        }

        $output .= '<tr>';
        $output .= '<td>' . $sno++ . '</td>';
        $output .= '<td>' . $reg_no . '</td>';
        $output .= '<td>' . $student_name . '</td>';
        $output .= '<td>' . $email . '</td>';
        $output .= '<td>' . $course . '</td>';
        $output .= '<td>' . $date_time . '</td>';
        $output .= '<td>' . $checker . '</td>';
        $output .= '<td>';
        if ($row["status"] == 1) {
            $output .= '    <button value="' . $row['id'] . '" onclick="statusHandler(this)" id="status_handle" class="status active status_handles size">Active</button>';
        } else {
            $output .= '    <button value="' . $row['id'] . '" onclick="statusHandler(this)" id="status_handle" class="status deactive status_handles size">Deactive</button>';
        }
        $output .= '    <a href="student_detail.php?id=' . $row['id'] . '" class="status info">Detail</a>';
        $output .= '</td>';
        $output .= '</tr>';
    }

    $output .= '</tbody></table>';

    // Add Pagination
    $sql_pag = "SELECT * FROM `students`";
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

    $output;
} else {
    $output = "";
}

$data = ["data" => $output, "count" => $total_count];
echo json_encode($data);
