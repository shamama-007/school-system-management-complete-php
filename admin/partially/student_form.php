<?php
require 'db.php';
$sql_count = "SELECT * FROM `student_enroll`";
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

$sql = "SELECT * FROM `student_enroll` order by `date` asc lIMIT $start_form, $total_num_page";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
$output = '';
$sno = 1;

if ($count) {
    $output .= '<table>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>Contact.No</th>
                    <th>Qualification</th>
                    <th>date</th>
                    </tr>
                    </thead>
                    <tbody id="student_enroll">';

    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $email = $row['email'];
        $contact_number = $row['contact_number'];
        $qualification = $row['qualification'];
        $date = $row['date'];

        if ($email === "") {
            $email = 'Empty';
        } else {
            $email = $row['email'];
        }

        $output .= '<tr>';
        $output .= '<td>' . $sno++ . '</td>';
        $output .= '<td>' . $name . '</td>';
        $output .= '<td>' . $email . '</td>';
        $output .= '<td>' . $contact_number . '</td>';
        $output .= '<td>' . $qualification . '</td>';
        $output .= '<td>' . $date . '</td>';
        $output .= '</tr>';
    }

    $output .= '</tbody></table>';

    // Add Pagination
    $sql_pag = "SELECT * FROM `student_enroll`";
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
