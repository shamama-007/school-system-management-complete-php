<?php
include_once('header.php');

if (!isset($_GET['id']) && $_GET['id'] < 0) {
    header('location: index.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM `students` WHERE id = '$id'";
$results = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($results);

?>

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

<!-- Student Profile Update Modal Here -->
<div class="modal" id="modal-profile-update">
    <div class="modal-setting">
        <header>
            <h5>Profile Update</h5>
            <div class="modal-close" id="modal-close-profile-update">+</div>
        </header>
        <section>
            <form action="#" method="post">
                <input type="hidden" id="id-update" value="<?php echo $id ?>">
                <div class="form-control">
                    <input type="text" placeholder="Students Name" id="stu-name-update" value="<?php echo $row['student_name'] ?>">
                </div>
                <div class="form-control">
                    <input type="email" placeholder="Email" id="email-update" value="<?php echo $row['email'] ?>">
                </div>
                <div class="form-control">
                    <input type="text" placeholder="Sir Name" id="sir-name-update" value="<?php echo $row['sir_name'] ?>">
                </div>
                <div class="form-control">
                    <select name="gender" id="gender-update">
                        <option selected disabled>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="form-control">
                    <select name="course" id="course-update">
                        <option selected disabled>Select Course</option>
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
                <div class="form-control">
                    <input type="date" placeholder="dd/mm/yyyy" id="date-update" value="<?php echo $row['date_time'] ?>">
                </div>
            </form>
        </section>
        <footer>
            <div class="form-control">
                <button type="button" id="profile_update" onclick="profile_update()">Update</button>
            </div>
        </footer>
    </div>
</div>

<!-- Student Profile Delete Modal Delete Here -->
<div class="modal" id="modal-delete">
    <div class="modal-setting">
        <header>
            <h5>Student Delete</h5>
            <div class="modal-close" id="modal-delete-close">+</div>
        </header>
        <section>
            <div class="student-detail">
                <div class="detail-left">
                    <p>Register no:</p>
                    <p>Std.Name:</p>
                    <p>Email:</p>
                    <p>Sir Name:</p>
                    <p>Gender:</p>
                    <p>Course:</p>
                    <p>Join Date:</p>
                </div>
                <div class="detail-right">
                    <p class="detail"> <?php echo $row['reg_no'] ?></p>
                    <p class="detail"> <?php echo $row['student_name'] ?></p>
                    <p class="detail"><?php echo $row['email'] ?></p>
                    <p class="detail"><?php echo $row['sir_name'] ?></p>
                    <p class="detail"><?php echo $row['gender'] ?></p>
                    <p class="detail"><?php echo $row['course'] ?></p>
                    <p class="detail"> <?php echo $row['date_time'] ?></p>
                </div>
            </div>
        </section>
        <footer>
            <div class="form-control">
                <button type="button" id="student_delete" onclick="student_delete()">Delete</button>
            </div>
        </footer>
    </div>
</div>

<!-- Main Section Here -->
<div class="container profile-container">
    <div class="profile-main profile-section">
        <h1>Student Profile</h1>
        <form action="partially/std_profile_update.php?id=<?php echo $id ?>" method="POST" class="admin_profile_setting" enctype="multipart/form-data">
            <button type="button" class="profile-image-admin profile-img" id="custom">
                <img class="" src="../img/<?php echo $row['image'] ?>" class="img-upload" alt="profile_image">
                <span class="camera-icon"><i class='bx bx-camera'></i></span>
            </button>
            <input type="file" class="real-btn" id="real-btn" name="image" id="image" hidden><br>
            <div class="student-detail">
                <div class="detail-left">
                    <p>Register no:</p>
                    <p>Std.Name:</p>
                    <p>Email:</p>
                    <p>Sir Name:</p>
                    <p>Gender:</p>
                    <p>Course:</p>
                    <p>Join Date:</p>
                </div>
                <div class="detail-right">
                    <p class="detail"> <?php echo $row['reg_no'] ?></p>
                    <p class="detail"> <?php echo $row['student_name'] ?></p>
                    <p class="detail"><?php echo $row['email'] ?></p>
                    <p class="detail"><?php echo $row['sir_name'] ?></p>
                    <p class="detail"><?php echo $row['gender'] ?></p>
                    <p class="detail"><?php echo $row['course'] ?></p>
                    <p class="detail"> <?php echo $row['date_time'] ?></p>
                </div>
            </div>
            <div class="admin-btn-update">
                <button type="submit" name="std-update" class="std-profile-btn img-btn">Image Update</button>
            </div>
            <div>
                <button type="button" class="std-profile-btn pro-update-btn" id="btn-profile-update">Profile Update</p>
                    <button type="button" class="std-profile-btn pro-delete-btn mx-5" id="btn-delete">Profile Delete</p>
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
    <?php } ?>

    // Change Image Update Event Button
    const img_upload = document.getElementById('custom');
    const real_btn = document.getElementById('real-btn');
    img_upload.addEventListener('click', () => {
        real_btn.click();
    })

    // Update Modal
    const btn_profile_update = document.getElementById('btn-profile-update');
    const modal_profile_update = document.getElementById('modal-profile-update');
    const modal_close_profile_update = document.getElementById('modal-close-profile-update');
    modal(btn_profile_update, modal_profile_update, modal_close_profile_update);

    // Delete Modal
    const btn_delete = document.getElementById('btn-delete');
    const modal_delete = document.getElementById('modal-delete');
    const modal_delete_close = document.getElementById('modal-delete-close');
    modal(btn_delete, modal_delete, modal_delete_close);

    // Profile Delete Request with AJAX
    async function student_delete() {
        const student_delete = document.getElementById('student_delete');
        const id_update = document.getElementById('id-update');

        // Button function
        disabledBtn(student_delete, "loading...", "disabled")

        const response = await fetch('partially/student_delete_handle.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: id_update.value,
            })
        })
        const result = await response.text();
        if (result) {
            if (result === 'delete') {
                alertSuccess('Student has been deleted');
                modalClose(modal_delete);
                window.location.href = "index.php";
            } else if (result === 'not delete') {
                alertError('Student has not been delete');
            }
        }
    }

    // Profile Update Request with AJAX
    async function profile_update() {
        const profile_update = document.getElementById('profile_update');
        const id_update = document.getElementById('id-update');
        const stu_name_update = document.getElementById('stu-name-update');
        const email_update = document.getElementById('email-update');
        const sir_name_update = document.getElementById('sir-name-update');
        const gender_update = document.getElementById('gender-update');
        const course_update = document.getElementById('course-update');
        const date_update = document.getElementById('date-update');

        if (stu_name_update.value === "") {
            alertError('Student name is required');
        } else if (email_update.value === "") {
            alertError('Email is required');
        } else if (sir_name_update.value === "") {
            alertError('Sir Name is required');
        } else if (gender_update.value == "") {
            alertError('Gender is required');
        } else if (course_update.value === "") {
            alertError('Course is required');
        } else if (date_update.value === "") {
            alertError('Date is required');
        } else {

            // Button function
            disabledBtn(profile_update, "loading...", "disabled")

            const response = await fetch('partially/student_detail_handle.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: id_update.value,
                    stu_name: stu_name_update.value,
                    email: email_update.value,
                    sir_name: sir_name_update.value,
                    gender: gender_update.value,
                    course: course_update.value,
                    date: date_update.value,
                })
            })
            const result = await response.text();
            if (result) {
                if (result === "update") {
                    alertSuccess('Profile has been update');
                    modalClose(modal_profile_update);
                } else if (result === "not update") {
                    alertError('Profile has not been update');
                }
                // Button function
                disabledBtn(profile_update, "Update", "")
            }
            stu_name_update.value = '';
            email_update.value = '';
            sir_name_update.value = '';
            gender_update.value = '';
            course_update.value = '';
            date_update.value = '';
        }
    }
</script>