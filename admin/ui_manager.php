<?php
include_once('header.php');
?>

<?php
if (isset($_GET['error_mcq'])) {
    $error_mcq = $_GET['error_mcq'];
} else {
    echo '';
}

if (isset($_GET['success_mcq'])) {
    $success_mcq = $_GET['success_mcq'];
} else {
    echo '';
}
?>


<div class="container">
    <div class="student-list">
        <div class="fees-btn">
            <h1>UI Manager</h1>
            <div></div>
        </div>
        <!-- Show Main Data -->
        <div id="ui-manager" class="tabMainContainer">

            <div class="tabContainer">
                <div class="buttonContainer">
                    <button onclick="showPanel(0)">Advertisement</button>
                    <button onclick="showPanel(1)">Teacher</button>
                    <button onclick="showPanel(2)">Course</button>
                    <button onclick="showPanel(3)">Hero Site</button>
                    <button onclick="showPanel(4)">Gallery</button>
                    <button onclick="showPanel(5)">Student Form</button>
                </div>
                <div class="panelContainer">

                    <!-- Advertisement Image Upload -->
                    <div class="tabPanel">
                        <div class="course-upload">
                            <form class="form-control" id="advertisement">
                                <input type="file" id="advertisementImage" multiple />
                                <button type="submit" id="advertisementBtn" class="btn btn-primary">Submit</button>
                            </form>

                            <!-- Append Course Data -->
                            <div id="advertisement-upload-data" class="advertisement-upload-data"></div>

                        </div>
                    </div>

                    <!-- Teacher Upload -->
                    <div class="tabPanel">
                        <!-- Course Tabs -->
                        <div class="course-upload">
                            <form class="form-control" id="teacherUpload">
                                <input type="file" id="teacherImage" />
                                <input type="text" id="teacherTitle" placeholder="Teacher Name" />
                                <input type="text" id="teacherDescription" placeholder="Teacher Description" />
                                <input type="text" id="teacherWhatsapp" placeholder="Whatsapp Link" />
                                <input type="text" id="teacherFacebook" placeholder="Facebook Link" />
                                <button type="submit" id="teacherUploadBtn" class="btn btn-primary">Submit</button>
                            </form>

                            <!-- Append Course Data -->
                            <div id="teacher-upload-data"></div>

                        </div>
                    </div>

                    <!-- Course Upload -->
                    <div class="tabPanel">
                        <!-- Course Tabs -->
                        <div class="course-upload">

                            <form class="form-control" id="courseUpload">
                                <input type="hidden" id="courseCurrent" value="courseCurrent">
                                <input type="file" id="courseImage" />
                                <input type="text" id="courseTitle" placeholder="Course Title" />
                                <input type="text" id="courseDescription" placeholder="Course Description" />
                                <button type="submit" id="courseUploadBtn" class="btn btn-primary">Submit</button>
                            </form>

                            <!-- Append Course Data -->
                            <div id="course-upload-data"></div>

                        </div>
                    </div>

                    <!-- Hero Section -->
                    <div class="tabPanel">
                        <div class="course-upload">
                            <form class="form-control" id="heroUpload">
                                <input type="file" id="heroImage" />
                                <input type="text" id="heroHeading" placeholder="Hero Heading" />
                                <input type="text" id="heroText" placeholder="Hero Text" />
                                <input type="text" id="heroButton" placeholder="Hero Button Link" />
                                <button type="submit" id="heroUploadBtn" class="btn btn-primary">Submit</button>
                            </form>

                            <!-- Append Course Data -->
                            <div id="hero-upload-data"></div>

                        </div>
                    </div>

                    <!-- Event Section -->
                    <div class="tabPanel">
                        <div class="course-upload">
                            <form class="form-control" id="event" class="advertisement-card">
                                <input type="file" id="eventImage" />
                                <input type="text" id="eventHeading" placeholder="Gallery Heading" />
                                <button type="submit" id="eventBtn" class="btn btn-primary">Submit</button>
                            </form>

                            <!-- Append Course Data -->
                            <div id="event-upload-data" class="advertisement-upload-data"></div>

                        </div>
                    </div>

                    <!-- Student Form -->
                    <div class="tabPanel">
                        <h3 style="color: var(--text-color)">Total Students ( <span id="total-data"></span> )</h3>
                        <div></div>
                        <div class="course-upload" id="course-upload">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>

<!-- Handle Alert Message -->
<script>
    <?php if (isset($_GET['error_mcq'])) { ?>
        alertError('<?php echo $error_mcq ?>');
    <?php } ?>

    <?php if (isset($_GET['success_mcq'])) { ?>
        alertSuccess('<?php echo $success_mcq ?>');
    <?php } ?>
</script>

<!-- Read Data -->
<script>
    const receivedata = async () => {
        const response = await fetch("partially/student_form.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            }
        })
        const result = await response.json();
        if (result) {
            document.getElementById("course-upload").innerHTML = result.data;
            document.getElementById("total-data").innerHTML = result.count;
        }

    }
    receivedata();
</script>

<!-- Pagination Script -->
<script>
    async function getid(e) {
        var id = e.value;
        const response = await fetch("./partially/student_form.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                page_id: id
            })
        });
        const result = await response.json();
        if (result) {
            document.getElementById("course-upload").innerHTML = result.data;
        }
    }
</script>



<!-- Hero Upload -->
<?php
include('heroupload.php');
?>


<!-- Course Upload -->
<?php
include('courseupload.php');
?>

<!-- Teacher Upload -->
<?php
include('teacherupload.php');
?>

<!-- advertisement Upload -->
<?php
include('advertisementupload.php');
?>

<!-- advertisement Upload -->
<?php
include('eventupload.php');
?>