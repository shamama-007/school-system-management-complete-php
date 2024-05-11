<?php
require 'db.php';

if (!empty($_POST['checkid'])) {

    // Loop Iterator Count()
    $sql_question_iterator = "SELECT * FROM `question` ORDER BY ans DESC LIMIT 1";
    $result_question_iterator = mysqli_query($con, $sql_question_iterator);
    $q_id_value = mysqli_fetch_assoc($result_question_iterator);
    $loop_iterator_value = $q_id_value['ans'];


    $id = $_SESSION['USER_ID'];
    $sql_std = "SELECT * FROM `students` WHERE id = '$id'";
    $result_std = mysqli_query($con, $sql_std);
    $row = mysqli_fetch_assoc($result_std);
    $reg_no = $row['reg_no'];
    $student_name = $row['student_name'];
    $email = $row['email'];
    $course_std = $row['course'];

    $count = count($_POST['checkid']);
    $result = 0;
    $i = 1;
    $selected = $_POST['checkid'];
    // print_r($selected);
    echo "<br>";

    // $query = "SELECT * FROM question";
    // $result_q = mysqli_query($con, $query);


    // while ($rows = mysqli_fetch_assoc($result_q)) {
    //     $checked = $rows['ans'] == $selected[$i];
    //     echo "ans";
    //     var_dump($rows['ans']);
    //     echo "selected";
    //     // var_dump($selected[$i]);
    //     echo "<br>";
    //     if ($checked) {
    //         $result++;
    //     } else {
    //         $result;
    //     }
    // }

    for ($i = 1; $i <= $loop_iterator_value; $i++) {
        $query = "SELECT * FROM question";
        $result_q = mysqli_query($con, $query);
        while ($rows = mysqli_fetch_assoc($result_q)) {
            $checked = $rows['ans'] == $selected[$i];
            if ($checked) {
                $result++;
            } else {
                $result;
            }
        }
    }
    
    $percentage = round($result * 100 / $count, 0);
    $grade = '';
    if ($percentage <= 100 && $percentage >= 80) {
        $grade = 'A+1';
    } elseif ($percentage <= 79 && $percentage >= 70) {
        $grade = 'A';
    } elseif ($percentage <= 69 && $percentage >= 60) {
        $grade = 'B';
    } elseif ($percentage <= 59 && $percentage >= 50) {
        $grade = 'C';
    } elseif ($percentage <= 49 && $percentage >= 40) {
        $grade = 'D';
    } elseif ($percentage <= 39 && $percentage >= 33) {
        $grade = 'E';
    } else {
        $grade = 'FAIL';
    }
    $date = date("j-m-Y");
    $year = date("Y");

    $sql_mark = "INSERT INTO `marks` (`user_id`, `reg_no`, `std_name`,`email`, `course`, `total_question`, `attemp`, `score`, `percentage`, `year`, `date`, `grade`, `status`) VALUES ('$id', '$reg_no', '$student_name', '$email', '$course_std', '$count', '$count', '$result', '$percentage', '$year', '$date', '$grade', '1')";
    $result_mark = mysqli_query($con, $sql_mark);
    if ($result_mark) {
        header('location: ../exam.php?success_mcq=Your paper has been submitted');
    } else {
        header('location: ../exam.php?error_mcq=Your paper has not been submitted');
    }
} else {
    header("location: ../exam.php?error_mcq=Please select MCQs");
}
