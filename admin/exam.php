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

$sql = "SELECT * FROM `question` order by q_id desc lIMIT $start_form, $total_num_page";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);

?>

<!-- Add Question Modal Here -->
<div class="modal" id="modal-question">
    <div class="modal-setting">
        <header>
            <h5>Question Add</h5>
            <div class="modal-close" id="modal-question-close">+</div>
        </header>
        <section>
            <form method="POST">
                <div class="form-control">
                    <textarea name="question" placeholder="Add question..." id="question" cols="30" rows="10"></textarea>
                </div>
                <div class="form-control">
                    <select name="course" id="exam-course">
                        <option selected disabled value="">Select Course</option>
                        <option value="C.I.T">C.I.T (Computer Information Technology)</option>
                        <option value="D.I.T">D.I.T (Diploma Information Technology)</option>
                        <option value="Web Developer">Web Developer</option>
                        <option value="Graphic Design">Graphic Design</option>
                        <option value="MS Office">MS Office</option>
                        <option value="Web Designing">Web Designing</option>
                        <option value="Daraz">Daraz</option>
                        <option value="Amazon">Amazon</option>
                    </select>
                </div>
            </form>
        </section>
        <footer>
            <div class="form-control">
                <button type="button" id="add_question" onclick="add_question()">Add</button>
            </div>
        </footer>
    </div>
</div>

<!-- Update Question Modal Here -->
<div class="modal" id="modal-question-update">
    <div class="modal-setting">
        <header>
            <h5>Question Update</h5>
            <div class="modal-close" id="modal-question-update-close">+</div>
        </header>
        <section>
            <form method="POST">
                <input type="hidden" id="id_update">
                <div class="form-control">
                    <textarea name="question" placeholder="Add question..." id="question_update" cols="30" rows="10"></textarea>
                </div>
                <div class="form-control">
                    <select name="course" id="course_update">
                        <option selected disabled value="">Select Course</option>
                        <option value="C.I.T">C.I.T (Computer Information Technology)</option>
                        <option value="D.I.T">D.I.T (Diploma Information Technology)</option>
                        <option value="Web Developer">Web Developer</option>
                        <option value="Graphic Design">Graphic Design</option>
                        <option value="MS Office">MS Office</option>
                        <option value="Web Designing">Web Designing</option>
                        <option value="Daraz">Daraz</option>
                        <option value="Amazon">Amazon</option>
                    </select>
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

<!-- Delete Question Modal  Here -->
<div class="modal" id="modal-delete">
    <div class="modal-setting">
        <header>
            <h5>Question Delete</h5>
            <div class="modal-close" id="modal-delete-close">+</div>
        </header>
        <section>
            <div class="student-detail">
                <div class="detail-left">
                    <p>Id:</p>
                    <p>Course Name:</p>
                    <p>Question:</p>
                </div>
                <div class="detail-right">
                    <p name="question_id" id="question_id"></p>
                    <p name="question_course" id="question_course"></p>
                    <p name="question_text" style="white-space: normal;" id="question_text"></p>
                </div>
            </div>
        </section>
        <footer>
            <div class="form-control">
                <button type="button" id="delete_question">Delete</button>
            </div>
        </footer>
    </div>
</div>

<!-- Main Data of Question -->
<div class="container">
    <div class="student-list">
        <div class="fees-btn">
            <h1>MCQ's Question</h1>
            <h3 style="color: var(--text-color)">Total MCQ's Found( <?php echo $num ?> )</h3>
            <button type="button" class="status primary py-5" id="btn-question">Add Question</button>
        </div>
        <!-- Data add with fetch method  -->
        <div id="question-data"></div>
    </div>
</div>

<?php
include('footer.php');
?>

<!-- // question Modal -->
<script>
    const btn_question = document.getElementById('btn-question');
    const modal_question = document.getElementById('modal-question');
    const modal_question_close = document.getElementById('modal-question-close');
    modal(btn_question, modal_question, modal_question_close);
</script>

<!-- // Read Question Data -->
<script>
    const questionData = async () => {
        const response = await fetch('./partially/read_question_data.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
        })
        const result = await response.text();
        select("#question-data").innerHTML = result;
    }
    questionData();
</script>

<!-- // Delete Question Modal -->
<script>
    function deleteQuestion(e) {
        const button_delete = document.getElementsByClassName('btn-delete');
        Array.from(button_delete).forEach((element) => {
            const modal_delete = document.getElementById('modal-delete');
            const modal_delete_close = document.getElementById('modal-delete-close');
            modal(element, modal_delete, modal_delete_close);
            element.addEventListener('click', (e) => {
                let tr = e.target.parentNode.parentNode;
                let id = tr.getElementsByTagName('td')[1].innerText;
                let question = tr.getElementsByTagName('td')[2].innerText;
                let course = tr.getElementsByTagName('td')[3].innerText;
                question_id.innerText = id;
                question_text.innerText = question;
                question_course.innerText = course;
            })
        })
    }
    const delete_question = document.getElementById('delete_question');
    delete_question.addEventListener('click', async () => {
        let id = document.getElementById("question_id").innerHTML;
        // Button function
        disabledBtn(delete_question, "loading...", "disabled")

        const response = await fetch(`partially/delete_question.php`, {
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
                const modal_delete = document.getElementById('modal-delete');
                modalClose(modal_delete);
                alertSuccess('Question has been Deleted');
                questionData();
            } else if (result == 'not delete') {
                alertError('Question has not been Deleted');
            } else {
                alertError('Some error occur');
            }
            // Button function
            disabledBtn(delete_question, "Delete", "")
        }
    })
</script>

<!-- // Update Question Modal -->
<script>
    function updateQuestion() {
        const button_update = document.getElementsByClassName('btn-update');
        Array.from(button_update).forEach((element) => {
            const modal_delete_update = document.getElementById('modal-question-update');
            const modal_delete_update_close = document.getElementById('modal-question-update-close');
            modal(element, modal_delete_update, modal_delete_update_close);
            element.addEventListener('click', (e) => {
                let tr = e.target.parentNode.parentNode;
                let id = tr.getElementsByTagName('td')[1].innerText;
                let question = tr.getElementsByTagName('td')[2].innerText;
                let course = tr.getElementsByTagName('td')[3].innerText;

                id_update.value = id;
                question_update.value = question;
                course_update.value = course;
            })
        })
    }
    const btn_update = document.getElementById('btn-update');
    btn_update.addEventListener('click', async () => {
        let id = document.getElementById("id_update").value;
        // Button function
        disabledBtn(btn_update, "loading...", "disabled")

        const response = await fetch(`partially/update_question.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id_update: id,
                question_update: question_update.value,
                course_update: course_update.value,
            })
        })
        const result = await response.text();
        if (result) {
            if (result === "update") {
                const modal_delete_update = document.getElementById('modal-question-update');
                modalClose(modal_delete_update);
                alertSuccess('Question has been Updated');
                questionData();
            } else if (result === "not update") {
                alertError('Question has not been Updated');
            } else {
                alertError('Some error occurred');
            }
            disabledBtn(btn_update, "Update", "")

        }
    }, true)
</script>

<!-- // Add Question Request With (AJAX) -->
<script>
    async function add_question() {
        var add_question = document.getElementById('add_question');
        const question = document.getElementById('question');
        const exam_course = document.getElementById('exam-course');
        if (question.value === '') {
            alertError('Question is required');
        } else if (exam_course.value === '') {
            alertError('Course Name is required');
        } else {

            // Button function
            disabledBtn(add_question, "loading...", "disabled")

            const response = await fetch(`partially/add_question.php`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    question: question.value,
                    exam_course: exam_course.value,
                })
            })
            const result = await response.text();
            if (result) {
                if (result === "insert") {
                    modalClose(modal_question);
                    alertSuccess('Question has been added');
                    questionData();
                } else if (result === "not insert") {
                    alertError('Question has not been added');
                }
                // Button function
                disabledBtn(add_question, "Add", "")
            }
            question.value = "";
            exam_course.value = "";
        }

    }
</script>

<!-- Use Pagination -->
<script>
    async function getid(e) {
        var id = e.value;

        const response = await fetch("./partially/read_question_data.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                page_id: id
            })
        });
        const result = await response.text();
        document.getElementById("question-data").innerHTML = result;
    }
</script>

<!-- Status Controller -->
<script>
        async function statusHandler(e) {
        let ids = e.value;
        let content = e.innerHTML;
        const response = await fetch("./partially/status_controller.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                page: "question",
                type: "status",
                operation: content,
                id: ids,
            })
        });
        const result = await response.text();
        if (result) {
            if (result == "Active") {
                questionData();
            } else {
                questionData();
            }
        }
    }
</script>