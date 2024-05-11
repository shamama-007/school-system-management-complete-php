<!-- advertisement Image Upload -->
<script>
    const advertisement = document.getElementById("advertisement");
    advertisement.addEventListener("submit", async (e) => {
        e.preventDefault();
        let advertisementImage = document.getElementById("advertisementImage");
        const formData = new FormData();

        for (const file of advertisementImage.files) {
            formData.append("myFiles[]", file);
        }
        formData.append("advertisement_post", "advertisement_post");

        let advertisementBtn = document.getElementById("advertisementBtn");
        disabledBtn(advertisementBtn, "loading...", "disabled")

        const response = await fetch('./partially/advertisement_upload.php', {
            method: 'post',
            body: formData
        })
        const result = await response.json();
        if (result.status === "success") {
            alertSuccess("Image Upload Successfully")
            advertisementRead();
            disabledBtn(advertisementBtn, "Submit", "")
        }
        advertisement.reset();
    });
</script>

<!-- advertisement Image Upload Reader -->
<script>
    async function advertisementRead() {
        const response = await fetch('./partially/advertisement_upload.php', {
            method: 'GET',
        })
        const result = await response.json();
        if (result.status === "success") {
            select("#advertisement-upload-data").innerHTML = result.data;
        }
    }
    advertisementRead();
</script>

<!-- advertisement Image Upload Delete -->
<script>
    async function advertisementHandle(e) {
        let handle = e.value.split("|");
        let id = handle[0];
        let image = handle[1];
        if (confirm("You are sure?")) {
            const response = await fetch('partially/advertisement_upload.php', {
                method: 'post',
                body: JSON.stringify({
                    advertisement_delete: "advertisement_delete",
                    advertisement_id: id,
                    image_id: image
                })
            })
            const result = await response.json();
            if (result.status == "success") {
                alertSuccess(result.message);
                advertisementRead();
            }
        }
    }
</script>

<!-- advertisement Status Controller -->
<script>
    async function statusHandler(e) {
        let id = e.value;
        let content = e.innerHTML;
        const response = await fetch("./partially/status_controller.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                page: "advertisement",
                type: "status",
                operation: content,
                id: id,
            })
        });
        const result = await response.text();
        if (result) {
            if (result == "Active") {
                advertisementRead();
            } else {
                advertisementRead();
            }
        }
    }
</script>