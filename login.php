<?php
require 'partially/db.php';

if (isset($_SESSION['USER_LOGGED'])) {
    header('location: studentsPanel/profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/use/logo.png" type="image/x-icon">
    <title>Student Login</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <!----===== Customs CSS ===== -->
    <link rel="stylesheet" href="css/form.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <!-- Sweet Alert Here -->
    <div class="sweet-alert error-alert" id="alert-error">
        <div class="alert-close">
            <i class='bx bx-error-circle icon'></i>
        </div>
        <p id="error"></p>
    </div>

    <!-- Sweet Alert Here -->
    <div class="sweet-alert success-alert" id="alert-success">
        <div class="alert-close">
            <i class='bx bxs-check-circle icon'></i>
        </div>
        <p id="success"></p>
    </div>

    <!-- Sign Form Container -->
    <div class="container">
        <form action="#" method="post" style="box-shadow: 0px 0px 20px rgba(161, 161, 161, 0.17);">
            <div class="image">
                <img src="./img/use/logo.png" alt="Logo">
            </div>
            <h2>Sign In</h2>
            <div class="form-control">
                <input type="email" placeholder="Email" id="email">
            </div>
            <div class="form-control">
                <input type="password" placeholder="Password" id="password">
            </div>
            <div class="form-control">
                <button type="button" id="login-btn">Login</button>
            </div>
        </form>
    </div>
</body>

<script src="js/main.js"></script>
<script>
    const login_btn = select('#login-btn');
    login_btn.addEventListener('click', async () => {

        const email = select("#email").value;
        const password = select("#password").value;

        if (email.value === "") {
            alertError('email is required');
        } else if (password.value === "") {
            alertError('Password is required');
        } else {
            let login_btn = select('#login-btn');
            disabledBtn(login_btn, "loading...", "disabled")

            const response = await fetch('./studentsPanel/partially/std_login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email: email,
                    password: password
                })
            })
            const result = await response.text();
            if (result) {
                disabledBtn(login_btn, "Login", "")
                if (result === "invalid") {
                    alertError('Invalid Credential');
                } else if (result === "loggedin") {
                    location.href = './studentsPanel/profile.php';
                } else {
                    alertError('Invalid Credential');
                }
                email.value = "";
                password.value = "";
            }
        }
    })
</script>

</html>