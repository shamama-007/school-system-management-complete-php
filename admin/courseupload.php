<!-- Read Course Data -->
<script>
    const courseRead = async () => {
        const response = await fetch('partially/course_upload.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            },
        })
        const result = await response.json();
        if (result.status == "success") {
            select("#course-upload-data").innerHTML = result.data;
        }
    }
    courseRead();
</script>

<!-- Course Upload -->
<script>
    const courseUpload = document.getElementById("courseUpload");
    courseUpload.addEventListener("submit", async function(e) {
        e.preventDefault();
        let courseImage = document.getElementById("courseImage")
        let courseCurrent = document.getElementById("courseCurrent").value
        let courseTitle = document.getElementById("courseTitle").value
        let courseDescription = document.getElementById("courseDescription").value

        if (courseTitle === "") {
            alertError("Course Title field is required");
        } else if (courseDescription === "") {
            alertError("Course Description field is required");
        } else {
            const formData = new FormData();

            formData.append("courseImage", courseImage.files[0])
            formData.append("courseCurrent", courseCurrent)
            formData.append("courseTitle", courseTitle)
            formData.append("courseDescription", courseDescription)
            formData.append("course_post", "course_post");



            let courseUploadBtn = document.getElementById("courseUploadBtn");
            disabledBtn(courseUploadBtn, "loading...", "disabled")

            const response = await fetch("partially/course_upload.php", {
                method: 'post',
                body: formData
            })
            const result = await response.json();
            if (result.status === "success") {
                alertSuccess("Course Add")
                courseRead();
                disabledBtn(courseUploadBtn, "Submit", "")

            } else {
                alertError(result.message);
                heroRead();
                disabledBtn(courseUploadBtn, "Submit", "")

            }
            courseUpload.reset();
        }
    })
</script>

<!-- Delete Course Data -->
<script>
    async function courseHandle(e) {
        let handle = e.value.split("|");
        let id = handle[0];
        let image = handle[1];
        if (confirm("You are sure?")) {
            const response = await fetch('partially/course_upload.php', {
                method: 'post',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    course_delete: "course_delete",
                    course_id: id,
                    image_id: image
                })
            })
            const result = await response.json();
            if (result.status == "success") {
                alertSuccess(result.message);
                courseRead();
            } else {
                alertError(result.message);
            }
        }
    }
</script>