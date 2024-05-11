<?php
require("./partially/db.php");

function getData($con, $table, $status = "")
{
    $sql = "SELECT * FROM $table";

    if ($status !== "") {
        $sql .= " WHERE status = 1";
    }else {
        $sql .= "";
    }
    $result = mysqli_query($con, $sql);
    $arr = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;
    }else {
        return $arr = [];
    }
}
$advertisement = getData($con, "advertisement", "status");
$teacher = getData($con, "teacher");
$course = getData($con, "ui");
$hero = getData($con, "hero");
$event = getData($con, "event");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/use/logo.png" type="image/x-icon">
    <title>Computer Skills</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <!-- Owl Carousel Slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Customs css -->
    <link rel="stylesheet" href="css/website.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

    <!-- Sweet Alert Here -->
    <div class="sweet-alert error-alert" id="alert-error">
        <div class="alert-close">
            <ion-icon name="alert-circle-outline"></ion-icon>
        </div>
        <p id="error"></p>
    </div>

    <!-- Sweet Alert Here -->
    <div class="sweet-alert success-alert" id="alert-success">
        <div class="alert-close">
            <ion-icon name="checkmark-circle-outline"></ion-icon>
        </div>
        <p id="success"></p>
    </div>

    <!-- Feedback -->
    <div class="feedback-section">
        <div class="feedback-btn" id="feedback-btn">
            <p>Feedback</p>
        </div>
        <div class="feedback-content" id="feedback-content">
            <div class="feedback-close" id="feedback-close">+</div>
            <div class="feedback-control">
                <h3>Computer Skills Send Suggestion And More Improvement And More Enjoyment</h3>
                <div class="feedback">
                    <div class="form-control">
                        <input type="text" id="feedback-email" placeholder="Enter Email Address">
                    </div>
                    <div class="form-control">
                        <textarea name="" id="feedback-message" cols="30" rows="8" placeholder="Enter Your message Give me Suggestion"></textarea>
                    </div>
                    <div class="form-control">
                        <button type="button" id="feedback_send" class="fav-btn contact-btn">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="nav">
        <div class="brand">
            <a href="index.php" class="logo_cs">
                <img src="img/use/logo.png" alt="img">
            </a>
            <div class="menu">
                <div>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="index.php#course">Course</a>
                    </li>
                    <li>
                        <a href="index.php#tutor">Tutor</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="gallery.php">Gallery</a>
                    </li>
                </div>
            </div>
            <div class="burger">
                <div class="line line-1"></div>
                <div class="line line-2"></div>
                <div class="line line-3"></div>
            </div>
        </div>
        <div class="contact">
            <li class="contact-btn">
                <a href="login.php">Sig In</a>
            </li>
        </div>
    </nav>