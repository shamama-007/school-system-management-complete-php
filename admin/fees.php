<?php
include_once('header.php');

// Add Pagination
$total_num_page = 20;

if (isset($_GET['page_id'])) {
    $page_id = $_GET['page_id'];
} else {
    $page_id = 1;
}
$start_form = ($page_id - 1) * 20;

$sql = "SELECT * FROM `students` lIMIT $start_form, $total_num_page";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);

?>

<div class="container">
    <div class="student-list">
        <div class="fees-btn">
            <h1>Student Fees</h1>
            <h3 style="color: var(--text-color)">Total Found ( <?php echo $num ?> )</h3>
            <div></div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>gender</th>
                    <th>course</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['reg_no'] ?></td>
                        <td><?php echo $row['student_name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['course'] ?></td>
                        <td>
                            <a href="fee_std_list.php?id=<?php echo $row['id'] ?>" class="status info" id="btn-update">Fee Pay</a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>

        <?php
        // Add Pagination
        $sql_pag = "SELECT * FROM `students`";
        $page_result = mysqli_query($con, $sql_pag);
        $total_record = mysqli_num_rows($page_result);
        $total_page = ceil($total_record / $total_num_page);
        ?>
        <div class="pagination">
            <?php
            for ($i = 1; $i <= $total_page; $i++) {
                if ($total_record > 20) {
                    echo '<a class="pagination-btn" href="fees.php?page_id=' . $i . '">' . $i . '</a>';
                } else {
                    echo '';
                }
            }
            ?>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>