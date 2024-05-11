<!-- Hero Upload -->
<script>
    const heroUpload = document.getElementById("heroUpload");
    heroUpload.addEventListener("submit", async function(e) {
        e.preventDefault();
        let heroImage = document.getElementById("heroImage")
        let heroHeading = document.getElementById("heroHeading").value
        let heroText = document.getElementById("heroText").value
        let heroButton = document.getElementById("heroButton").value

        if (heroHeading === "") {
            alertError("Teacher Title field is required");
        } else if (heroText === "") {
            alertError("Teacher Description field is required");
        } else if (heroButton === "") {
            alertError("Teacher Whatsapp Link field is required");
        } else {
            const formData = new FormData();
            formData.append("heroImage", heroImage.files[0])
            formData.append("heroHeading", heroHeading)
            formData.append("heroText", heroText)
            formData.append("heroButton", heroButton)
            formData.append("hero_post", "hero_post")

            let heroUploadBtn = document.getElementById("heroUploadBtn");
            disabledBtn(heroUploadBtn, "loading...", "disabled")


            const response = await fetch("partially/hero_upload.php", {
                method: 'post',
                body: formData
            })
            const result = await response.json();
            if (result.status === "success") {
                alertSuccess(result.message)
                heroRead();
                disabledBtn(heroUploadBtn, "Submit", "")
            } else {
                alertError(result.message);
                heroRead();
                disabledBtn(heroUploadBtn, "Submit", "")
            }
            heroUpload.reset();
        }
    })
</script>


<!-- Read Hero Data -->
<script>
    const heroRead = async () => {
        const response = await fetch('partially/hero_upload.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            },
        })
        const result = await response.json();
        if (result.status == "success") {
            select("#hero-upload-data").innerHTML = result.data;
        }
    }
    heroRead();
</script>



<!-- Delete Hero Data -->
<script>
    async function heroHandle(e) {
        let handle = e.value.split("|");
        let id = handle[0];
        let image = handle[1];
        if (confirm("You are sure?")) {
            const response = await fetch('partially/hero_upload.php', {
                method: 'post',
                body: JSON.stringify({
                    hero_delete: "hero_delete",
                    hero_id: id,
                    image_id: image
                })
            })
            const result = await response.json();
            if (result.status == "success") {
                heroRead();
                alertSuccess(result.message)
            } else {
                alertError(result.message);
            }
        }
    }
</script>
