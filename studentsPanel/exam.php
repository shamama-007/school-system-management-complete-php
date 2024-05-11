<?php
include_once('header.php');
$id = $_SESSION['USER_ID'];
$sql_std = "SELECT * FROM `students` WHERE id = '$id'";
$result_std = mysqli_query($con, $sql_std);
$row = mysqli_fetch_assoc($result_std);
$course_std = $row['course'];

// Student Total Paper Display
$sql_question = "SELECT * FROM `question` WHERE `course_name` = '$course_std' AND `status` = 1";
$result_question1 = mysqli_query($con, $sql_question);
$total_row = mysqli_num_rows($result_question1);

// Loop Iterator Count()
$sql_question_iterator = "SELECT * FROM `question` ORDER BY q_id DESC LIMIT 1";
$result_question_iterator = mysqli_query($con, $sql_question_iterator);
$q_id_value = mysqli_fetch_assoc($result_question_iterator);
$loop_iterator_value = $q_id_value['q_id'];
?>

<?php
if ($_SESSION['USER_PAPER']) {
    $sqlUpdate = "UPDATE `students` SET `paper_password` = '' WHERE id = '$id'";
    $sqlUpdate_result = mysqli_query($con, $sqlUpdate);
}
?>

<?php
if (!isset($_SESSION['USER_PAPER']) == true) {
?>
    <script>
        window.location.href = "std_result.php";
    </script>

<?php } ?>

<?php
if (isset($_GET['error_mcq'])) {
    $error_mcq = $_GET['error_mcq'];
} else {
    echo '';
}

if (isset($_GET['success_mcq'])) {
    $success_mcq = $_GET['success_mcq'];
} else {
    echo '';
}
?>

<!-- Submit Paper Confirm Modal Here -->
<div class="modal" id="modal-paper-confirm">
    <div class="modal-setting">
        <header>
            <h5>Paper Submit</h5>
            <div class="modal-close" id="modal-close-confirm">+</div>
        </header>
        <section>
            <p>Paper Submit Confirm</p>
        </section>
        <footer>
            <div class="form-control">
                <button type="button" class="status" id="paper_submit">Submit</button>
            </div>
        </footer>
    </div>
</div>


<div class="container">
    <div class="student-list">
        <div class="fees-btn">
            <h1>MCQ's Paper</h1>
            <h3 style="color: var(--text-color)">Total MCQs <?php echo $total_row ?> Attempt <?php echo $total_row ?> MCQ's</h3>
            <div></div>
        </div>
        <form action="partially/submit_paper.php" method="POST">
            <div class="mcq-container">
                <div class="mcq-section">
                    <?php
                    $check_question = null;
                    $num = 1;
                    for ($i = 1; $i <= $loop_iterator_value; $i++) {
                        $sql_question = "SELECT * FROM `question` WHERE q_id = $i AND `course_name` = '$course_std' AND `status` = 1";
                        $result_question = mysqli_query($con, $sql_question);
                        while ($row_question = mysqli_fetch_assoc($result_question)) { ?>

                            <div class="mcq-title">
                                <h4 class="mcq-question"><span style="color: var(--fav-color)">Question: <?php echo $num++ ?></span> <?php echo $row_question['question'] ?></h3>
                                    <?php
                                    $sql_answer = "SELECT * FROM `answer` WHERE `ans_id` = $i";
                                    $result_answer = mysqli_query($con, $sql_answer);

                                    while ($row_answer = mysqli_fetch_assoc($result_answer)) { ?>
                                        <div class="mcq-answer">
                                            <li>
                                                <label class="radio">
                                                    <input type="radio" name="checkid[<?php echo $row_answer['ans_id'] ?>]" class="radio_input" value="<?php echo $row_answer['a_id'] ?>" />
                                                    <div class="radio_radio"></div>
                                                    <?php echo $row_answer['answer'] ?>
                                                </label>

                                            </li>
                                        </div>
                                    <?php } ?>
                            </div>
                    <?php }
                    }
                    ?>
                </div>
            </div>
            <div class="fees-btn">
                <div></div>
                <div class="form-control button">
                    <button type="button" id="btn-submit-show" class="status">Submit</button>
                    <button type="submit" hidden id="btn-submit"></button>
                </div>
                <div></div>
            </div>

        </form>
    </div>
</div>
<?php
include('footer.php');
?>
<script>
    <?php if (isset($_GET['error_mcq'])) { ?>
        alertError('<?php echo $error_mcq ?>');
    <?php } ?>

    <?php if (isset($_GET['success_mcq'])) { ?>
        alertSuccess('<?php echo $success_mcq ?>');
        setTimeout(() => {
            window.location.href = "partially/admin_logout.php";
        }, 0);
    <?php } ?>

    // Event Trigger
    const paper_submit = document.getElementById('paper_submit');
    const btn_submit = document.getElementById('btn-submit');
    paper_submit.addEventListener('click', () => {
        btn_submit.click();
        disabledBtn(paper_submit, "loading...", "disabled")
        setTimeout(() => {
            disabledBtn(paper_submit, "Submit", "")
        }, 0);
    })


    // Submit Confirm Modal
    const btn_submit_show = document.getElementById('btn-submit-show');
    const modal_paper_confirm = document.getElementById('modal-paper-confirm');
    const modal_close_confirm = document.getElementById('modal-close-confirm');
    modal(btn_submit_show, modal_paper_confirm, modal_close_confirm);
</script>