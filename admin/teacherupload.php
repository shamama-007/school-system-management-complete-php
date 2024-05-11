<!-- Course Upload -->
<script>
    const teacherUpload = document.getElementById("teacherUpload");
    teacherUpload.addEventListener("submit", async function(e) {
        e.preventDefault();
        let teacherImage = document.getElementById("teacherImage")
        let teacherTitle = document.getElementById("teacherTitle").value
        let teacherDescription = document.getElementById("teacherDescription").value
        let teacherWhatsapp = document.getElementById("teacherWhatsapp").value
        let teacherFacebook = document.getElementById("teacherFacebook").value
        if (teacherTitle === "") {
            alertError("Teacher Title field is required");
        } else if (teacherDescription === "") {
            alertError("Teacher Description field is required");
        } else if (teacherWhatsapp === "") {
            alertError("Teacher Whatsapp Link field is required");
        } else if (teacherFacebook === "") {
            alertError("Teacher Facebook Link field is required");
        } else {
            const formData = new FormData();
            formData.append("teacherImage", teacherImage.files[0])
            formData.append("teacherTitle", teacherTitle)
            formData.append("teacherDescription", teacherDescription)
            formData.append("teacherWhatsapp", teacherWhatsapp)
            formData.append("teacherFacebook", teacherFacebook)

            formData.append("teacher_post", "teacher_post");


            let teacherUploadBtn = document.getElementById("teacherUploadBtn");
            disabledBtn(teacherUploadBtn, "loading...", "disabled")

            const response = await fetch("partially/teacher_upload.php", {
                method: 'post',
                body: formData
            })
            const result = await response.json();
            if (result.status === "success") {
                alertSuccess(result.message)
                teacherRead();
                disabledBtn(teacherUploadBtn, "Submit", "")
            } else {
                alertError(result.message);
                heroRead();
                disabledBtn(teacherUploadBtn, "Submit", "")
            }
            teacherUpload.reset();
        }
    })
</script>

<!-- Read Course Data -->
<script>
    const teacherRead = async () => {
        const response = await fetch('partially/teacher_upload.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            },
        })
        const result = await response.json();
        if (result.status == "success") {
            select("#teacher-upload-data").innerHTML = result.data;
        }
    }
    teacherRead();
</script>


<!-- Delete Teacher Data -->
<script>
    async function teacherHandle(e) {
        let handle = e.value.split("|");
        let id = handle[0];
        let image = handle[1];
        if (confirm("You are sure?")) {
            const response = await fetch('partially/teacher_upload.php', {
                method: 'post',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    teacher_delete: "teacher_delete",
                    teacher_id: id,
                    image_id: image
                })
            })
            const result = await response.json();
            if (result.status == "success") {
                alertSuccess(result.message);
                teacherRead();
            } else {
                alertError(result.message);
            }
        }
    }
</script>