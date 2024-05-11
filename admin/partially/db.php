<?php
session_start();

$localhost = 'localhost';
$username = 'root';
$password= '';
$database = 'schoolSystem';

$con = mysqli_connect($localhost, $username, $password, $database);
?>