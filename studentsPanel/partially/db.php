<?php

session_start();
$localhost = 'localhost';
$username = 'root';
$password= '';
$database = 'schoolsystem';

// $localhost = 'sql313.epizy.com';
// $username = 'epiz_32107730';
// $password= '7mN2GEXQrwPll';
// $database = 'epiz_32107730_schoolSystem';

$con = mysqli_connect($localhost, $username, $password, $database);
