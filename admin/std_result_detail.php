<?php
include_once('header.php');
// $id = $_SESSION['ADMIN_ID'];
$id = $_GET['id'];
$sql = "SELECT * FROM `marks` WHERE id = '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$num = mysqli_num_rows($result);
?>



<div class="container profile-container">
    <div class="profile-main profile-section">
        <h1>Student Marks Detail</h1>
        <button type="button" class="profile-image-admin profile-img">
            <img class="" src="../img/avater.png ?>" alt="profile_image">
        </button>
        <div class="student-detail">
            <div class="detail-left">
                <p>Register ID:</p>
                <p>Student Name:</p>
                <p>Email:</p>
                <p>Course:</p>
                <p>Total Question:</p>
                <p>Attempt:</p>
                <p>Score:</p>
                <p>Percentage:</p>
                <p>Grade:</p>
                <p>Year:</p>
                <p>Date:</p>
            </div>
            <div class="detail-right">
                <p class="detail"><?php echo $row['reg_no'] ?></p>
                <p class="detail"><?php echo $row['std_name'] ?></p>
                <p class="detail"><?php echo $row['email'] ?></p>
                <p class="detail"><?php echo $row['course'] ?></p>
                <p class="detail"><?php echo $row['total_question'] ?></p>
                <p class="detail"><?php echo $row['attemp'] ?></p>
                <p class="detail"><?php echo $row['score'] ?></p>
                <p class="detail"><?php echo $row['percentage'] ?>%</p>
                <p class="detail"><?php echo $row['grade'] ?></p>
                <p class="detail"><?php echo $row['year'] ?></p>
                <p class="detail"><?php echo $row['date'] ?></p>
            </div>
        </div>
        <button class="std-profile-btn img-btn" onclick="window.print()">Download PDF</button>
    </div>
</div>

<div class="print-container" style="visibility: hidden;">
    <div class="print-navbar">
        <div class="logo">
            <img src="./img/use/logo.png" alt="logo">
        </div>
        <div class="heading">
            <h2>Computer Skills</h2>
        </div>
    </div>

    <div class="print-content">
        <table>
            <tbody>
                <tr>
                    <td>Roll No:</td>
                    <td><?php echo $row['reg_no'] ?></td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><?php echo $row['std_name'] ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $row['email'] ?></td>
                </tr>
                <tr>
                    <td>Course:</td>
                    <td><?php echo $row['course'] ?></td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td><?php echo $row['date'] ?></td>
                </tr>
            </tbody>
        </table>

        <div class="print-result">
            <table>
                <thead>
                    <tr>
                        <th>Total Number</th>
                        <th>Obtained</th>
                        <th>Percentage</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row['total_question'] ?></td>
                        <td><?php echo $row['score'] ?></td>
                        <td><?php echo $row['percentage'] ?>%</td>
                        <td><?php echo $row['grade'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="print-footer">
            <div class="print-signature">
                <div class="student-sign">
                    <h5>Faculty Signature</h5>
                </div>
                <div class="teacher-sign">
                    <div class="signature-layout">
                        <img src="./img/signature.png" alt="signature">
                    </div>
                    <h5>Admin Signature</h5>
                </div>
            </div>

            <div class="main-footer">
                <p>Address: H#571 New l block sec 11 1/2 orangi town karachi, Pakistan</p>
                <p>Contact Number: 0341-2275518</p>
            </div>
        </div>

    </div>


</div>


<?php
include('footer.php');
?>