<?php

session_start();

$localhost = 'localhost';
$username = 'root';
$password= '';
$database = 'schoolsystem';

$con = mysqli_connect($localhost, $username, $password, $database);
