<?php
include_once('header.php');

// Add Pagination
$total_num_page = 20;

if (isset($_GET['page_id'])) {
    $page_id = $_GET['page_id'];
} else {
    $page_id = 1;
}
$start_form = ($page_id - 1) * 20;

$sql = "SELECT * FROM `marks` lIMIT $start_form, $total_num_page";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);

?>

<div class="container">
    <div class="student-list">
        <div class="fees-btn">
            <h1>Student Fees</h1>
            <h3 style="color: var(--text-color)">Total Found ( <?php echo $num ?> )</h3>
            <div><a href="pdf/index.php" id="download_pdf" onclick="download_pdf()" class="status primary">Download PDF <i class='bx bx-download icon'></i></a></div>
        </div>
        <div id="std-result">
        </div>

    </div>
</div>
<?php
include('footer.php');
?>

<!-- Read Students Result Data -->
<script>
    const std_result = async () => {
        const response = await fetch("partially/std_result_data.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            }
        })
        const result = await response.text();
        document.getElementById("std-result").innerHTML = result;
    }
    std_result();
</script>

<!-- PDF Result Download -->
<script>
    async function download_pdf() {
        const download_pdf = document.getElementById("download_pdf");
        // Button function
        disabledBtn(download_pdf, "loading...", "disabled")
        const response = await fetch('pdf/index.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
        })
        const result = await response.text();
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
                page: "std_result",
                type: "status",
                operation: content,
                id: id,
            })
        });
        const result = await response.text();
        if (result) {
            if (result == "Active") {
                std_result();
            } else {
                std_result();
            }
        }
    }
</script>


<!-- Use Pagination -->
<script>
    async function getid(e) {
        var id = e.value;
        const response = await fetch("./partially/std_result_data.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                page_id: id
            })
        });
        const result = await response.text();
        document.getElementById("std-result").innerHTML = result;
    }
</script>