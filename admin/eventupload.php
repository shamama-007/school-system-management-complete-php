
<!-- Event Image Upload -->
<script>
    const event = document.getElementById("event");
    event.addEventListener("submit", async (e) => {
        e.preventDefault();
        let eventImage = document.getElementById("eventImage");
        let eventHeading = document.getElementById("eventHeading");
        
        const formData = new FormData();

    
        formData.append("galleryImage", eventImage.files[0]);
        formData.append("eventHeading", eventHeading.value);
        formData.append("event_post", "event_post");

        let eventBtn = document.getElementById("eventBtn");
        disabledBtn(eventBtn, "loading...", "disabled")


        const response = await fetch('./partially/event_upload.php', {
            method: 'post',
            body: formData
        })
        const result = await response.json();
        if (result.status === "success") {
            alertSuccess("Image Upload Successfully")
            eventRead();
        }
        disabledBtn(eventBtn, "Submit", "")

        event.reset();
    });
</script>

<!-- event Image Upload Reader -->
<script>
    async function eventRead() {
        const response = await fetch('./partially/event_upload.php', {
            method: 'GET',
        })
        const result = await response.json();
        if (result.status === "success") {
            select("#event-upload-data").innerHTML = result.data;
        }
    }
    eventRead();
</script>

<!-- event Image Upload Delete -->
<script>
    async function eventHandle(e) {
        let handle = e.value.split("|");
        let id = handle[0];
        let image = handle[1];

        if (confirm("You are sure?")) {
            const response = await fetch('partially/event_upload.php', {
                method: 'post',
                body: JSON.stringify({
                    event_delete: "event_delete",
                    event_id: id,
                    image_id: image
                })
            })
            const result = await response.json();
            if (result.status == "success") {
                alertSuccess(result.message);
                eventRead();
            }
        }
    }
</script>

