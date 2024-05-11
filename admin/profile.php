<?php
include_once('header.php');

$id = $_SESSION['ADMIN_ID'];
$sql = "SELECT * FROM `admin` WHERE id = '$id'";
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

<!-- Password Update Modal Here -->
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
                <button type="button" id="password_update" onclick="change()">Password Update</button>
            </div>
        </footer>
    </div>
</div>

<!-- Admin Profile Here -->
<div class="container profile-container">
    <div class="profile-main profile-section">
        <h1>Admin Profile</h1>
        <form action="partially/admin_profile_update.php" method="POST" class="admin_profile_setting" enctype="multipart/form-data">
            <button type="button" class="profile-image-admin profile-img" id="custom">
                <img class="" src="img/<?php echo $row_admin['image'] ?>" class="img-upload" alt="profile_image">
                <span class="camera-icon"><i class='bx bx-camera'></i></span>
            </button>
            <input type="file" class="real-btn" id="real-btn" name="image" id="image" hidden><br>
            <p class="admin-email"><?php echo $_SESSION['ADMIN_EMAIL'] ?></p>
            <div class="admin-btn-update">
                <button type="submit" name="admin-update" class="std-profile-btn img-btn">Profile Update</button>
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
    <?php } ?>


    const img_upload = document.getElementById('custom');
    const real_btn = document.getElementById('real-btn');
    img_upload.addEventListener('click', () => {
        real_btn.click();
    })

    // Change Password Modal
    const modal_pwd = document.getElementById('modal-pwd');
    const change_pwd = document.getElementById('change-pwd');
    const modal_close_pwd = document.getElementById('modal-close-pwd');
    modal(change_pwd, modal_pwd, modal_close_pwd);

    // Admin Password Update
    async function change() {
        const password_update = document.getElementById('password_update');
        const current_pwd = document.getElementById('current_pwd');
        const new_pwd = document.getElementById('new_pwd');
        const con_pwd = document.getElementById('con_pwd');
        if (current_pwd.value === "") {
            alertError('Current Password is required');
        } else if (new_pwd.value === "") {
            alertError('New Password is required');
        } else if (con_pwd.value === "") {
            alertError('Confirm Password is required');
        } else {
            // Button function
            disabledBtn(password_update, "loading...", "disabled")

            const response = await fetch('partially/admin_profile_password.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    current_pwd: current_pwd.value,
                    new_pwd: new_pwd.value,
                    con_pwd: con_pwd.value,
                })
            })
            const result = await response.text();
            if (result) {
                if (result === "password update") {
                    alertSuccess("Password has been updated");
                    modalClose(modal_pwd);
                } else if (result === "Database password do not match") {
                    alertError("Invalid Credential");
                } else if (result === "password do not match") {
                    alertError('Password do not match');
                }
                // Button function
                disabledBtn(password_update, "Password Update", "")
            }
            current_pwd.value = "";
            new_pwd.value = "";
            con_pwd.value = "";
        }
    }
</script>