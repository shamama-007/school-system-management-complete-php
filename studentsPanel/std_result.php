<?php
include_once('header.php');
$id = $_SESSION['USER_ID'];

$sql_marks = "SELECT * FROM `marks` WHERE `user_id` = '$id' AND `status` = 1";
$result_marks = mysqli_query($con, $sql_marks);
$num_marks = mysqli_num_rows($result_marks);

if($num_marks > 0) {
$row_marks = mysqli_fetch_assoc($result_marks);
}else {
    ?>
    <script>
        window.location.href = 'profile.php';
    </script>
    <?php
}
?>

<div class="container">
    <div class="student-list">
        <div class="fees-btn">
            <h1>Student Marks</h1>
        </div>

        <div style="width: 100%; display: flex; justify-content: flex-start; align-items: flex-start; flex-direction: row;">
            <div class="form-control" style="width: 33%;">
                <p>Register No</p>
                <input type="text" id="reg_no" value="<?php echo $row_marks['reg_no'] ?>" disabled>
            </div>
            <div class="form-control" style="width: 33%;">
                <p>Students Name</p>
                <input type="text" id="stu-name" value="<?php echo $row_marks['std_name'] ?>" disabled>
            </div>
            <div class="form-control" style="width: 33%;">
                <p>Email</p>
                <input type="text" id="reg_no" value="<?php echo $row_marks['email'] ?>" disabled>
            </div>
        </div>
        <div style="width: 100%; display: flex; justify-content: flex-start; align-items: flex-start; flex-direction: row;">
            <div class="form-control" style="width: 33%;">
                <p>Course</p>
                <input type="text" id="stu-name" value="<?php echo $row_marks['course'] ?>" disabled>
            </div>
            <div class="form-control" style="width: 33%;">
                <p>Date</p>
                <input type="text" id="stu-name" value="<?php echo $row_marks['date'] ?>" disabled>
            </div>
            <div class="form-control" style="width: 33%;">
                <p>Year</p>
                <input type="text" id="stu-name" value="<?php echo $row_marks['year'] ?>" disabled>
            </div>
        </div>
        <div style="width: 100%; display: flex; justify-content: flex-start; align-items: flex-start; flex-direction: row;">
            <div class="form-control" style="width: 33%;">
                <p>Total Question</p>
                <input type="text" id="reg_no" value="<?php echo $row_marks['total_question'] ?>" disabled>
            </div>
            <div class="form-control" style="width: 33%;">
                <p>Attempted</p>
                <input type="text" id="stu-name" value="<?php echo $row_marks['attemp'] ?>" disabled>
            </div>
            <div class="form-control" style="width: 33%;">
                <p>Correct Answer</p>
                <input type="text" id="stu-name" value="<?php echo $row_marks['score'] ?>" disabled>
            </div>
        </div>
        <div style="width: 100%; display: flex; justify-content: flex-start; align-items: flex-start; flex-direction: row;">
            <div class="form-control" style="width: 50%;">
                <p>Percentage</p>
                <input type="text" id="reg_no" value="<?php echo $row_marks['percentage'] ?>%" disabled>
            </div>
            <div class="form-control" style="width: 50%;">
                <p>Grade</p>
                <input type="text" id="reg_no" value="<?php echo $row_marks['grade'] ?>" disabled>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>

<script>
</script>