<?php
session_start();
unset($_SESSION['USER_PAPER']);
header('location: ../std_result.php');
?>