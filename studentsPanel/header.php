<?php
require 'partially/db.php';

if (!isset($_SESSION['USER_LOGGED'])) {
    header('location: login.php');
}

$id = $_SESSION['USER_ID'];
$sql = "SELECT * FROM `students` WHERE id = '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);


$sql_check = "SELECT * FROM `marks` WHERE `user_id` = '$id' AND `status` = 1";
$result_check = mysqli_query($con, $sql_check);
$check = mysqli_num_rows($result_check);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!-- Favicon Link -->
    <link rel="shortcut icon" href="../img/use/logo.png" type="image/x-icon">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- Sweet Alert Here -->
    <div class="sweet-alert error-alert" id="alert-error">
        <div class="alert-close">
            <i class='bx bx-error-circle icon'></i>
        </div>
        <p id="error" class="error"></p>
    </div>
    <!-- Sweet Alert Here -->
    <div class="sweet-alert success-alert" id="alert-success">
        <div class="alert-close">
            <i class='bx bxs-check-circle icon'></i>
        </div>
        <p id="success" class="success"></p>
    </div>

    <!-- Sidebar Here -->
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../img/use/logo.png" alt="">
                </span>
                <div class="text logo-text">
                    <span class="name">Dashboard</span>
                    <span class="profession"><?php echo $row['email'] ?></span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="fees.php">
                            <i class='bx bx-dollar-circle icon'></i>
                            <span class="text nav-text">Fees</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="admin_login.php">
                            <i class='bx bx-spreadsheet icon'></i>
                            <span class="text nav-text">Exam</span>
                        </a>
                    </li>
                    <?php
                    if ($check > 0) {
                        $row_check = mysqli_fetch_assoc($result_check);
                    ?>
                        <li class="nav-link">
                            <a href="std_result.php">
                                <i class='bx bxs-graduation icon'></i>
                                <span class="text nav-text">Marks</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="nav-link">
                        <a href="profile.php">
                            <i class='bx bx-user-circle icon'></i>
                            <span class="text nav-text">Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                    <a href="partially/logout.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>
    </nav>

    <!-- TopBar Main Section Here -->
    <section class="home">
        <div class="home-top">
            <div class="top-search">
                <i class='bx bx-search icon'></i>
                <input type="text" placeholder="Search here...">
            </div>
            <div class="profile-setting">
                <div class="profile-m profile-icon">
                    <a href="">
                        <i class='bx bx-bell icon'></i>
                    </a>
                </div>
                <div class="profile-m profile-image">
                    <a href="profile.php">
                        <img src="../img/<?php echo $row['image'] ?>" alt="image">
                    </a>
                </div>
            </div>
        </div>

   <!-- Sidebar Resposive -->
   <script>
            const body = document.querySelector("body");
            const sidebar = body.querySelector("nav");
            const toggle = body.querySelector(".toggle");
            const searchBtn = body.querySelector(".search-box");
            const modeSwitch = body.querySelector(".toggle-switch");
            const modeText = body.querySelector(".mode-text");

            toggle.addEventListener("click", () => {
                sidebar.classList.toggle("close");
            });

            searchBtn.addEventListener("click", () => {
                sidebar.classList.remove("close");
            });
 
            let get = localStorage.getItem("mode");
            body.classList.add(get);
            modeText.innerText = "Light mode";
            if (get == "dark") {
                modeText.innerText = "Dark mode";
            }
            modeSwitch.addEventListener("click", () => {
                body.classList.toggle("dark");
                if (body.classList.contains("dark")) {
                    localStorage.setItem("mode", "dark");
                    modeText.innerText = "Dark mode";
                } else {
                    modeText.innerText = "Light mode";
                    localStorage.setItem("mode", "light");

                }
            });
        </script>