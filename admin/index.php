<?php
include_once('header.php');
?>

<div class="container">
    <div class="student-list">
        <div class="fees-btn">
            <h1>Student Lists</h1>
            <h3 style="color: var(--text-color)">Total Students ( <span id="total-data"></span> )</h3>
            <div></div>
        </div>
        <div id="tableData" style="width: 100%; height: 100%;">

        </div>
    </div>
</div>
<?php
include('footer.php');
?>

<!-- Read Data -->
<script>
    const receivedata = async () => {
        const response = await fetch("partially/student_data.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            }
        })
        const result = await response.json();
        if(result) {
            document.getElementById("tableData").innerHTML = result.data;
            document.getElementById("total-data").innerHTML = result.count;
        }
        
    }
    receivedata();
</script>


<!-- Pagination Script -->
<script>
    async function getid(e) {
        var id = e.value;

        const response = await fetch("./partially/student_data.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                page_id: id
            })
        });
        const result = await response.json();
        if(result) {
            document.getElementById("tableData").innerHTML = result.data;
        }
    }
</script>


<!-- Status Controller -->
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
                page: "student",
                type: "status",
                operation: content,
                id: id,
            })
        });
        const result = await response.text();
        if (result) {
            if (result == "Active") {
                receivedata();
            } else {
                receivedata();
            }
        }
    }
</script>