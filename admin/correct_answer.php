<?php
include_once('header.php');
$id = $_GET['id'];
$sql = "SELECT * FROM `answer` WHERE ans_id = '$id'";
$result = mysqli_query($con, $sql);
$num_row = mysqli_num_rows($result);


$correct = '';
$sql_q = "SELECT * FROM `question` WHERE q_id = '$id'";
$result_q = mysqli_query($con, $sql_q);
$row_q = mysqli_fetch_assoc($result_q);

$sql_a = "SELECT * FROM `answer` WHERE ans_id = '$id'";
$result_a = mysqli_query($con, $sql_a);


?>
<!-- Error Alert with Get Request -->
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

<!-- Add Answer Modal Here -->
<div class="modal" id="modal-answer">
    <div class="modal-setting">
        <header>
            <h5>Answer Add</h5>
            <div class="modal-close" id="modal-answer-close">+</div>
        </header>
        <section>
            <form method="POST">
                <div class="form-control">
                    <textarea name="answer" placeholder="Add answer..." id="answer" cols="30" rows="10"></textarea>
                </div>
            </form>
        </section>
        <footer>
            <div class="form-control">
                <button type="button" id="add_answer" onclick="add_answer()">Add</button>
            </div>
        </footer>
    </div>
</div>

<!-- Delete Answer Modal Here -->
<div class="modal" id="modal-delete">
    <div class="modal-setting">
        <header>
            <h5>Answer Delete</h5>
            <div class="modal-close" id="modal-delete-close">+</div>
        </header>
        <section>
            <div class="student-detail">
                <div class="detail-left">
                    <p>Id:</p>
                    <p>Answer:</p>
                </div>
                <div class="detail-right">
                    <p name="answer_id" id="answer_id"></p>
                    <p name="answer_text" style="white-space: normal;" id="answer_text"></p>
                </div>
            </div>
        </section>
        <footer>
            <div class="form-control">
                <button type="button" id="delete_answer">Delete</button>
            </div>
        </footer>
    </div>
</div>

<!-- Update Answer Modal Here -->
<div class="modal" id="modal-answer-update">
    <div class="modal-setting">
        <header>
            <h5>Answer Update</h5>
            <div class="modal-close" id="modal-answer-update-close">+</div>
        </header>
        <section>
            <form method="POST">
                <input type="hidden" id="id_update">
                <div class="form-control">
                    <textarea name="answer" placeholder="Add answer..." id="answer_update" cols="30" rows="10"></textarea>
                </div>
                <div class="form-control">
                </div>
            </form>
        </section>
        <footer>
            <div class="form-control">
                <button type="button" id="btn-update">Update</button>
            </div>
        </footer>
    </div>
</div>

<!-- Show Answers -->
<div class="container">
    <div class="student-list">
        <div class="fees-btn">
            <h1>MCQ's Answer</h1>
            <h3 style="color: var(--text-color)">Total Data Found( <?php echo $num_row ?> )</h3>
            <button type="button" class="status primary py-5" id="btn-answer">Add Answer</button>
        </div>
        <input type="hidden" value="<?php echo $id ?>" id="correct_answer_id">
        <!-- Show Data Answer -->
        <div id="answer-data"></div>
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
    <?php } ?>

    // Answer Modal
    const btn_answer = document.getElementById('btn-answer');
    const modal_answer = document.getElementById('modal-answer');
    const modal_answer_close = document.getElementById('modal-answer-close');
    modal(btn_answer, modal_answer, modal_answer_close);
</script>


<!-- // Read Data -->
<script>
    const answerData = async () => {
        const id = select("#correct_answer_id").value;
        const response = await fetch('./partially/read_answer_data.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id
            })
        })
        const result = await response.text();
        select("#answer-data").innerHTML = result;
    }
    answerData();
</script>


<!-- // Delete Answer Modal -->
<script>
    function deleteAnswer() {
        const button_delete = document.getElementsByClassName('btn-delete');
        Array.from(button_delete).forEach((element) => {
            const modal_delete = document.getElementById('modal-delete');
            const modal_delete_close = document.getElementById('modal-delete-close');
            modal(element, modal_delete, modal_delete_close);
            element.addEventListener('click', (e) => {
                let tr = e.target.parentNode.parentNode;
                let id = tr.getElementsByTagName('td')[1].innerText;
                let answer = tr.getElementsByTagName('td')[2].innerText;

                answer_id.innerText = id;
                answer_text.innerText = answer;
            })
        })
    }
    const delete_answer = document.getElementById('delete_answer');
    delete_answer.addEventListener('click', async () => {
        const modal_delete = document.getElementById('modal-delete');
        let id = document.getElementById("answer_id").innerHTML;

        // Button function
        disabledBtn(delete_answer, "Loading...", "Disabled")

        const response = await fetch(`partially/delete_answer.php?delete_id=${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                delete_id: id,
            })
        })
        const result = await response.text();
        if (result) {
            if (result == 'delete') {
                modalClose(modal_delete);
                alertSuccess('Answer has been Deleted');
                answerData();
            } else if (result == 'not delete') {
                alertError('Answer has not been Deleted');
            } else {
                alertError('Some error occur');
            }
            // Button function
            disabledBtn(delete_answer, "Delete", "")
        }
    }, true)
</script>


<!-- // Update Answer Modal -->
<script>
    function updateAnswer() {
        const button_update = document.getElementsByClassName('btn-update');
        Array.from(button_update).forEach((element) => {
            const modal_delete_update = document.getElementById('modal-answer-update');
            const modal_delete_update_close = document.getElementById('modal-answer-update-close');
            modal(element, modal_delete_update, modal_delete_update_close);
            element.addEventListener('click', (e) => {
                let tr = e.target.parentNode.parentNode;
                let id = tr.getElementsByTagName('td')[1].innerText;
                let answer = tr.getElementsByTagName('td')[2].innerText;

                id_update.value = id;
                answer_update.value = answer;
            })
        })
    }
    const btn_update = document.getElementById('btn-update');
    btn_update.addEventListener('click', async () => {
        const modal_delete_update = document.getElementById('modal-answer-update');
        let id = document.getElementById("id_update").value;

        // Button function
        disabledBtn(btn_update, "Loading...", "Disabled")

        const response = await fetch(`partially/update_answer.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id_update: id,
                answer_update: answer_update.value,
            })
        })
        const result = await response.text();
        if (result) {
            if (result === "update") {
                modalClose(modal_delete_update);
                alertSuccess('Answer has been Updated');
                answerData();
            } else if (result === "not update") {
                alertError('Answer has not been Updated');
            } else {
                alertError('Some error occurred');
            }
            disabledBtn(btn_update, "Update", "")
        }
    }, true)
</script>

<!-- // Add Answer Modal -->
<script>
    async function add_answer() {
        const answer = document.getElementById('answer');
        const add_answer = document.getElementById('add_answer');
        if (answer.value === '') {
            alertError('Answer is required');
        } else {

            // Button function
            disabledBtn(add_answer, "Loading...", "Disabled")

            const response = await fetch(`partially/add_answer.php?id=<?php echo $id ?>`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    answer: answer.value,
                })
            })
            const result = await response.text();
            if (result) {
                if (result === "insert") {
                    modalClose(modal_answer);
                    alertSuccess('Answer has been added');
                    answerData();
                } else if (result === "not insert") {
                    alertError('Answer has not been added');
                }
                // Button function
                disabledBtn(add_answer, "Add", "")
            }
        }
        answer.value = "";
    }
</script>