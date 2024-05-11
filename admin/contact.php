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
            <h1>User Contacts</h1>
            <h3 style="color: var(--text-color)">Total Found ( <span id="total-data"></span> )</h3>
            <div></div>
        </div>

        <div id="contact-data"></div>

    </div>
</div>

<?php
include('footer.php');
?>

<script>
    <?php if (isset($_GET['error_mcq'])) { ?>
        alertError('<?php echo $error_mcq ?>');
    <?php } ?>

    <?php if (isset($_GET['success_mcq'])) { ?>
        alertSuccess('<?php echo $success_mcq ?>');
    <?php } ?>
</script>

<!-- Read Contact Data -->
<script>
    const contactData = async () => {
        const response = await fetch('./partially/contact_read.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
        })
        const result = await response.json();
        select("#contact-data").innerHTML = result.data;
        select("#total-data").innerHTML = result.count;

    }
    contactData();
</script>

<!-- Delete Contact Data -->
<script>
    async function contactHandle(e) {
        let id = e.value;
        const response = await fetch('./partially/contact_feedback_handle.php', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                type: "contact",
                id
            })
        })
        const result = await response.text();
        if (result) {
            document.getElementById("contact-data").innerHTML = result;

            contactData();
          
        }
    }
</script>

<!-- Use Pagination -->
<script>
    async function getid(e) {
        var id = e.value;

        const response = await fetch("./partially/contact_read.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                page_id: id
            })
        });
        const result = await response.json();
        document.getElementById("contact-data").innerHTML = result.data;
    }
</script>


<!-- Status Controller -->
<script>
    async function contactStatus(e) {
        let id = e.value;
        let content = e.innerHTML;
        const response = await fetch('./partially/contact_feedback_handle.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                page: "contact",
                type: "status",
                operation: content,
                id,
            })
        })
        const result = await response.text();
        if (result) {
            contactData();
        }
    }
</script>