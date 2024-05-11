<?php
require 'partially/db.php';
if (!isset($_SESSION['ADMIN_EMAIL'])) {
    header('location: partially/logout.php');
}


if (!isset($_SESSION['ADMIN_LOGGED'])) {
    header('location: admin_login.php');
}

$id = $_SESSION['ADMIN_ID'];
$sql = "SELECT * FROM `admin` WHERE id = '$id'";
$result = mysqli_query($con, $sql);
$row_admin = mysqli_fetch_assoc($result);


$sql_status_contact = "SELECT * FROM `contact` WHERE `status` = '0'";
$result_status_contact = mysqli_query($con, $sql_status_contact);
$num_status_contact = mysqli_num_rows($result_status_contact);

$sql_status_feedback = "SELECT * FROM `feedback` WHERE `status` = '0'";
$result_status_feedback = mysqli_query($con, $sql_status_feedback);
$num_status_feedback = mysqli_num_rows($result_status_feedback);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon Link -->
    <link rel="shortcut icon" href="img/use/logo.png" type="image/x-icon">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">
    <!----======== PRINT.css ======== -->
    <link rel="stylesheet" href="css/print.css" media="print">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>ADMIN <?php echo $_SESSION['ADMIN_EMAIL'] ?></title>
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

    <!--Student Add Modal Here -->
    <div class="modal" id="modal-student">
        <div class="modal-setting">
            <header>
                <h5>Add Students</h5>
                <div class="modal-close" id="modal-close">+</div>
            </header>
            <section>
                <form action="#" method="post">
                    <div class="form-control">
                        <input type="text" placeholder="Students Name" id="stu-name">
                    </div>
                    <div class="form-control">
                        <input type="email" placeholder="Email" id="email">
                    </div>
                    <div class="form-control">
                        <input type="password" placeholder="Password" id="password">
                    </div>
                    <div class="form-control">
                        <input type="password" placeholder="Confirm Password" id="conf_password">
                    </div>
                    <div class="form-control">
                        <select name="sir_name" id="sir_name">
                            <option selected disabled value="">Sir Name</option>
                            <option value="Sir Aqib Noor">Sir Aqib Noor</option>
                            <option value="Sir Hammad Khan">Sir Hammad Khan</option>
                            <option value="Sir Daniyal Ali">Sir Daniyal Ali</option>
                            <option value="Sir Shamawoon Mumtaz">Sir Shamawoon Mumtaz</option>
                        </select>
                    </div>
                    <div class="form-control">
                        <select name="gender" id="gender">
                            <option selected disabled value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-control">
                        <select name="course" id="course">
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
                    <div class="form-control">
                        <input type="date" placeholder="dd/mm/yyyy" id="date">
                    </div>
                </form>
            </section>
            <footer>
                <div class="form-control">
                    <button type="button" id="register">Register</button>
                </div>
            </footer>
        </div>
    </div>

    <!-- Exam Info Modal -->
    <div class="modal" id="modal-info">
        <div class="modal-setting">
            <header>
                <h5>Exam Question Active</h5>
                <div class="modal-close" id="modal-close-info">+</div>
            </header>
            <section>
                <div class="student-detail">
                    <div class="detail-left">
                        <!-- Exam Question Active / Deative -->
                        <p>C.I.T:</p>
                        <p>D.I.T:</p>
                        <p>Web Developer:</p>
                        <p>Graphic Design:</p>
                        <p>MS Office:</p>
                        <p>Web Designing:</p>
                        <p>Daraz:</p>
                        <p>Amazon:</p>
                        <hr>
                        <hr>

                        <!-- Student Course Active / Deative -->
                        <h5 style="font-size: 20px;">Students Active</h5>
                        <p>Std C.I.T</p>
                        <p>Std D.I.T</p>
                        <p>Std Web Developer</p>
                        <p>Std Graphic Design</p>
                        <p>Std MS Office</p>
                        <p>Std Web Designing</p>
                        <p>Std Daraz</p>
                        <p>Std Amazon</p>
                    </div>
                    <?php

                    function questionActive($con, $table, $course, $status)
                    {
                        $sql = "SELECT * FROM $table WHERE `course_name`='$course' AND `status`='$status'";
                        $result = mysqli_query($con, $sql);
                        echo mysqli_num_rows($result);
                    }

                    function studentActive($con, $table, $course, $status)
                    {
                        $sql = "SELECT * FROM $table WHERE `course`='$course' AND `status`='$status'";
                        $result = mysqli_query($con, $sql);
                        echo mysqli_num_rows($result);
                    }

                    ?>
                    <div class="detail-right">
                        <p class="detail">Active <?php questionActive($con, 'question', 'C.I.T', '1'); ?> | Deactive <?php questionActive($con, 'question', 'C.I.T', '0'); ?></p>
                        <p class="detail">Active <?php questionActive($con, 'question', 'D.I.T', '1'); ?> | Deactive <?php questionActive($con, 'question', 'D.I.T', '0'); ?></p>
                        <p class="detail">Active <?php questionActive($con, 'question', 'Web Developer', '1'); ?> | Deactive <?php questionActive($con, 'question', 'Web Developer', '0'); ?></p>
                        <p class="detail">Active <?php questionActive($con, 'question', 'Graphic Design', '1'); ?> | Deactive <?php questionActive($con, 'question', 'Graphic Design', '0'); ?></p>
                        <p class="detail">Active <?php questionActive($con, 'question', 'MS Office', '1'); ?> | Deactive <?php questionActive($con, 'question', 'MS Office', '0'); ?></p>
                        <p class="detail">Active <?php questionActive($con, 'question', 'Web Designing', '1'); ?> | Deactive <?php questionActive($con, 'question', 'Web Designing', '0'); ?></p>
                        <p class="detail">Active <?php questionActive($con, 'question', 'Daraz', '1'); ?> | Deactive <?php questionActive($con, 'question', 'Daraz', '0'); ?></p>
                        <p class="detail">Active <?php questionActive($con, 'question', 'Amazon', '1'); ?> | Deactive <?php questionActive($con, 'question', 'Amazon', '0'); ?></p>
                        <hr>
                        <hr>
                        <h5 style="font-size: 20px;">&nbsp;</h5>
                        <p class="detail">Active <?php studentActive($con, 'students', 'C.I.T', '1'); ?> | Deactive <?php studentActive($con, 'students', 'C.I.T', '0'); ?></p>
                        <p class="detail">Active <?php studentActive($con, 'students', 'D.I.T', '1'); ?> | Deactive <?php studentActive($con, 'students', 'D.I.T', '0'); ?></p>
                        <p class="detail">Active <?php studentActive($con, 'students', 'Web Developer', '1'); ?> | Deactive <?php studentActive($con, 'students', 'Web Developer', '0'); ?></p>
                        <p class="detail">Active <?php studentActive($con, 'students', 'Graphic Design', '1'); ?> | Deactive <?php studentActive($con, 'students', 'Graphic Design', '0'); ?></p>
                        <p class="detail">Active <?php studentActive($con, 'students', 'MS Office', '1'); ?> | Deactive <?php studentActive($con, 'students', 'MS Office', '0'); ?></p>
                        <p class="detail">Active <?php studentActive($con, 'students', 'Web Designing', '1'); ?> | Deactive <?php studentActive($con, 'students', 'Web Designing', '0'); ?></p>
                        <p class="detail">Active <?php studentActive($con, 'students', 'Daraz', '1'); ?> | Deactive <?php studentActive($con, 'students', 'Daraz', '0'); ?></p>
                        <p class="detail">Active <?php studentActive($con, 'students', 'Amazon', '1'); ?> | Deactive <?php studentActive($con, 'students', 'Amazon', '0'); ?></p>

                    </div>

                </div>
            </section>
        </div>
    </div>

    <!-- Sidebar Here -->
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="img/use/logo.png" alt="">
                </span>
                <div class="text logo-text">
                    <span class="name">Admin Panel</span>
                    <span class="profession">SIR AQIB</span>
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
                        <a href="index.php">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Students</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="fees.php">
                            <i class='bx bx-dollar-circle icon'></i>
                            <span class="text nav-text">Fees</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="exam.php">
                            <i class='bx bx-spreadsheet icon'></i>
                            <span class="text nav-text">Exam</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="std_result.php">
                            <i class='bx bxs-graduation icon'></i>
                            <span class="text nav-text">Marks</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="contact.php">
                            <i class='bx bx-user-pin icon'></i>
                            <span class="text nav-text">Contacts</span>
                            <?php if ($num_status_contact > 0) { ?>
                                <span style="margin-left: 20px; padding: 0px 7px; border-radius: 5px; background-color: red; color: white; font-size: 12px;"><?php echo $num_status_contact ?></span>
                            <?php } else {
                                echo '';
                            } ?>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="feedback.php">
                            <i class='bx bx-happy icon'></i>
                            <span class="text nav-text">Feedback</span>
                            <?php if ($num_status_feedback > 0) { ?>
                                <span style="margin-left: 20px; padding: 0px 7px; border-radius: 5px; background-color: red; color: white; font-size: 12px;"><?php echo $num_status_feedback ?></span>
                            <?php } else {
                                echo '';
                            } ?>
                        </a>
                    </li>



                    <li class="nav-link">
                        <a href="profile.php">
                            <i class='bx bx-user-circle icon'></i>
                            <span class="text nav-text">Profile</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="ui_manager.php">
                        <i class='bx bx-cog icon' ></i>
                            <span class="text nav-text">UI Manager</span>
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

    <!-- TopBar Section Here -->
    <section class="home">
        <div class="home-top">
            <div class="top-search">
                <i class='bx bx-search icon'></i>
                <input type="text" placeholder="Search here...">
            </div>
            <div class="profile-setting">
                <div class="profile-m profile-icon" id="exam-info">
                    <a href="#">
                        <i class='bx bx-error-circle icon'></i>
                    </a>
                </div>
                <div class="profile-m profile-icon">
                    <a href="#">
                        <i class='bx bx-bell icon'></i>
                    </a>
                </div>
                <div class="profile-m profile-icon" id="add-user">
                    <a href="#">
                        <i class='bx bx-user-plus icon'></i>
                    </a>
                </div>
                <div class="profile-m profile-image">
                    <a href="profile.php">
                        <img src="img/<?php echo $row_admin['image'] ?>" alt="image">
                    </a>
                </div>
            </div>
        </div>

        <!-- Add Students with AJAX -->
        <script>
            function select(elementName) {
                return document.querySelector(elementName);
            }

            const stu_name = select('#stu-name');
            const email = select('#email');
            const password = select('#password');
            const conf_password = select('#conf_password');
            const sir_name = select('#sir_name');
            const gender = select('#gender');
            const course = select('#course');
            const date = select('#date');

            register.addEventListener('click', async () => {
                if (stu_name.value === "") {
                    alertError('Student name is required');
                } else if (email.value === "") {
                    alertError('Email is required');
                } else if (password.value === "") {
                    alertError('Password is required');
                } else if (conf_password.value === "") {
                    alertError('Confirm Password is required');
                } else if (gender.value == "") {
                    alertError('Gender is required');
                } else if (sir_name.value == "") {
                    alertError('Sir Name is required');
                } else if (course.value === "") {
                    alertError('Course is required');
                } else if (date.value === "") {
                    alertError('Date is required');
                } else if (password.value !== conf_password.value) {
                    alertError('Password do not match');
                } else {

                    disabledBtn(register, "loading", "disabled")

                    const response = await fetch('partially/add_student.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            student_name: stu_name.value,
                            email: email.value,
                            password: password.value,
                            conf_password: conf_password.value,
                            gender: gender.value,
                            sir_name: sir_name.value,
                            course: course.value,
                            date: date.value,
                        })
                    })
                    const result = await response.text();
                    if (result) {
                        if (result === 'email is already exist') {
                            alertError('Email is already exist');
                        } else if (result === 'insert') {
                            modalClose(modal_student);
                            alertSuccess('Students has been register');
                            receivedata()
                        } else if (result === 'not_insert') {
                            alertError('Students has not been register');
                        }
                        disabledBtn(register, "Register", "")
                    }
                    stu_name.value = '';
                    email.value = '';
                    password.value = '';
                    conf_password.value = '';
                    sir_name.value = '';
                    gender.value = '';
                    course.value = '';
                    date.value = '';
                }
            })
        </script>

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