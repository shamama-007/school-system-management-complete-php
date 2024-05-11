<?php
require 'partially/db.php';

if (isset($_SESSION['ADMIN_LOGIN'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Favicon Link -->
    <link rel="shortcut icon" href="img/use/logo.png" type="image/x-icon">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/form.css">
</head>

<body>

    <!--  Alert Error Here -->
    <div class="sweet-alert error-alert" id="alert-error">
        <div class="alert-close">
            <i class='bx bx-error-circle icon'></i>
        </div>
        <p id="error"></p>
    </div>

    <div class="sweet-alert success-alert" id="alert-success">
        <div class="alert-close">
            <i class='bx bxs-check-circle icon'></i>
        </div>
        <p id="success"></p>
    </div>



    <!-- Admin Login Here -->
    <div class="container">
        <form method="POST">
            <div class="image">
                <img src="img/use/logo.png" alt="avater" sizes="" srcset="">
            </div>
            <h2>Admin Login</h2>
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
    // Login Request with (AJAX)
    const login_btn = document.getElementById('login-btn');
    login_btn.addEventListener('click', async () => {
        const email = document.getElementById('email');
        const password = document.getElementById('password');

        if (email.value === "") {
            alertError('Invalid Credential');
        } else if (password.value == "") {
            alertError('Invalid Credential');
        } else {

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
                    window.location.href = 'index.php';
                }
                // Button function
                disabledBtn(login_btn, "Login", "")
            }
        }
    })
</script>

</html>