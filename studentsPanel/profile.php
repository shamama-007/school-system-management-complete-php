<?php
include_once('header.php');


$id = $_SESSION['USER_ID'];
$sql = "SELECT * FROM `students` WHERE id = '$id'";
$result = mysqli_query($con, $sql);
$row_admin = mysqli_fetch_assoc($result);
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


<!-- Modal Here -->
<div class="modal" id="modal-pwd">
    <div class="modal-setting">
        <header>
            <h5>Password Management</h5>
            <div class="modal-close" id="modal-close-pwd">+</div>
        </header>
        <section>
            <form action="#" method="post">
                <div class="form-control">
                    <input type="password" placeholder="Current Password" id="current_pwd">
                </div>
                <div class="form-control">
                    <input type="password" placeholder="New Password" id="new_pwd">
                </div>
                <div class="form-control">
                    <input type="password" placeholder="Confirm Password" id="con_pwd">
                </div>
            </form>
        </section>
        <footer>
            <div class="form-control">
                <button type="button" id="passwordChangeBtn" onclick="change()">Password Update</button>
            </div>
        </footer>
    </div>
</div>

<!-- Main Section Here -->
<div class="container profile-container">
    <div class="profile-main profile-section">
        <h1>Student Profile</h1>
        <form action="partially/std_profile_update.php" method="POST" class="admin_profile_setting" enctype="multipart/form-data">
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
                    <!-- $row GET Header Page -->
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
                <button type="submit" name="std-update" class="std-profile-btn img-btn">Profile Update</button>
            </div>
            <div>
                <a href="#" id="change-pwd">Change Password</p>
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
        }, 1500);
    <?php } ?>

    const img_upload = select('#custom');
    const real_btn = select('#real-btn');
    img_upload.addEventListener('click', () => {
        real_btn.click();
    })

    // Change Password Modal
    const modal_pwd = select('#modal-pwd');
    const change_pwd = select('#change-pwd');
    const modal_close_pwd = select('#modal-close-pwd');
    modal(change_pwd, modal_pwd, modal_close_pwd);



    async function change() {
        const current_pwd = select('#current_pwd');
        const new_pwd = select('#new_pwd');
        const con_pwd = select('#con_pwd');

        if (current_pwd.value === "") {
            alertError('Current Password is required');
        } else if (new_pwd.value === "") {
            alertError('New Password is required');

        } else if (con_pwd.value === "") {
            alertError('Confirm Password is required');
        } else {
            const passwordChangeBtn = select("#passwordChangeBtn");
            disabledBtn(passwordChangeBtn, "loading", "disabled")

            const response = await fetch('partially/user_profile_password.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    current_pwd: current_pwd.value,
                    new_pwd: new_pwd.value,
                    con_pwd: con_pwd.value
                })
            })
            const result = await response.text();
            if (result) {
                if (result === "password update") {
                    alertSuccess("Password has been updated");
                } else if (result === "Database password do not match") {
                    alertError("Invalid Credential");
                } else if (result === "password do not match") {
                    alertError('Password do not match');
                }
                disabledBtn(passwordChangeBtn, "Password Update", "")
            }
        }
    }
</script>