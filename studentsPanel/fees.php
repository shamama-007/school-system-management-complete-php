<?php
include_once('header.php');
$id = $_SESSION['USER_ID'];
$sql = "SELECT * FROM `fees` WHERE `user_id` = '$id'";
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
                    <th>Date</th>
                    <th>Month</th>
                    <th>Fees</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['student_name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['date']?></td>
                    <td><?php echo $row['month']?></td>
                    <td><?php echo $row['fees']?></td>
                </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include('footer.php');
?>

<script>
</script>