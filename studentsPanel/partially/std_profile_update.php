<?php
require 'db.php';



if (isset($_POST['std-update'])) {
    $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../img/" .  $image);
    if ($_FILES['image']['type'] != 'image/jpeg' && $_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg') {
        header('location: ../profile.php?error_mcq=please select png || jpg || jpeg format');
    } elseif ($_FILES['image']['size'] >= '300000') {
        header('location: ../profile.php?error_mcq=File is smaller than 300 (KB)');
    } else {
        $id = $_SESSION['USER_ID'];
        $sql = "UPDATE `students` SET image = '$image' WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header('location: ../profile.php?success_mcq=Profile Image Update');
        } else {
            header('location: ../profile.php?error_mcq=Profile Image Not Update');
        }
    }
}
?>
