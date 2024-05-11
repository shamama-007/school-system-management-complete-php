<?php
include_once('header.php');
$id = $_SESSION['USER_ID'];
$sql_std = "SELECT * FROM `students` WHERE id = '$id'";
$result_std = mysqli_query($con, $sql_std);
$row = mysqli_fetch_assoc($result_std);
$course_std = $row['course'];
$email_std = $row['email'];

$sql_check = "SELECT * FROM `question`";
$result_check = mysqli_query($con, $sql_check);
$rows = mysqli_fetch_assoc($result_check);
?>

<!-- Link CSS File -->
<link rel="stylesheet" href="../css/form.css">

<!-- Check USER_PAPER SESSION Run -->
<?php
if (isset($_SESSION['USER_PAPER']) == true) {
?>
    <script>
        window.location.href = "exam.php";
    </script>
<?php } ?>


<!-- Error Alert -->
<?php
if (isset($_GET['error_mcq'])) {
    $error_mcq = $_GET['error_mcq'];
} else {
    echo '';
}

// <!-- Success Alert -->

if (isset($_GET['success_mcq'])) {
    $success_mcq = $_GET['success_mcq'];
} else {
    echo '';
}
?>


<div class="container" style="background-color: transparent;">
    <form method="POST" class="admin-login-content">
        <div class="image">
            <img src="../img/use/logo.png" alt="avater" sizes="" srcset="">
        </div>
        <h2>Paper Login</h2>
        <div class="form-control">
            <input type="email" placeholder="Email" disabled id="email" value="<?php echo $email_std ?>">
        </div>
        <div class="form-control">
            <input type="text" placeholder="Password" id="password">
        </div>
        <div class="form-control">
            <button type="button" id="login-btn" onclick="admin_btn()">Login</button>
        </div>
        <a href="partially/admin_login_handle.php?id=<?php echo $_SESSION['USER_ID'] ?>">Get Password?</a>
    </form>
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

    async function admin_btn() {
        const login_btn = select('#login-btn');
        const email = select('#email');
        const password = select('#password');

        if (email.value === "") {
            alertError('Invalid Credential');
        } else if (password.value === "") {
            alertError('Invalid Credential');
        } else {

            // Button function
            disabledBtn(login_btn, "loading...", "disabled")

            const response = await fetch('partially/admin_login_handle.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email: email.value,
                    password: password.value,
                })
            })
            const result = await response.text();
            if (result) {
                if (result === 'invalid') {
                    alertError('Invalid Credential');
                } else if (result === 'loggedin') {
                    window.location.href = 'exam.php';
                }
                // Button function
                disabledBtn(login_btn, "Login", "")
            }
        }
    }
</script>