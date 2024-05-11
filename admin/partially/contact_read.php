<?php
require("db.php");

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


$sql = "SELECT * FROM `contact` order by `status` asc lIMIT $start_form, $total_num_page";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
$output = '';

if ($count) {
    $output .= ' <table>
    <thead>
        <tr>
            <th>name</th>
            <th>email</th>
            <th>message</th>
        </tr>
    </thead>
    <tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '
        <tr>
        <td>' . $row['name'] . '</td>
        <td>' . $row['email'] . '</td>
        <td style="white-space: normal;">' . $row['message'] . '</td>
        <td>';
        if ($row['status'] == 0) {
            $output .= '<button class="status info size" onclick="contactStatus(this)" value=' . $row['id'] . '" >UnRead</button>';
        } else {
            $output .= '';
        }
        $output .= '<button class="status delete size" onclick="contactHandle(this)" value="' . $row['id'] . '">Delete</button>
        </td>
    </tr>';
    }
    $output .= ' </tbody></table>';

    // Add Pagination
    $sql_pag = "SELECT * FROM `contact`";
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
    $output .= ' </div>';
}

$data = ["data" => $output, "count" => $count];
echo json_encode($data);
