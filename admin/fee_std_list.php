<?php
include_once('header.php');

$user_id = $_GET['id'];
$sql = "SELECT * FROM `students` WHERE id='$user_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$fees_sql = "SELECT * FROM `fees` WHERE `user_id` = '$user_id' order by id desc ";
$fees_result = mysqli_query($con, $fees_sql);
$num_row = mysqli_num_rows($fees_result);

?>
<!-- Modal Fee Payment Here -->
<div class="modal" id="modal-fees">
    <div class="modal-setting">
        <header>
            <h5>Students Payment</h5>
            <div class="modal-close" id="modal-fees-close">+</div>
        </header>
        <section>
            <form method="POST">

                <input type="hidden" id="id" value="<?php echo $user_id ?>">
                <div class="form-control">
                    <input type="text" disabled id="std-name-fee" value="<?php echo $row['student_name'] ?>">
                </div>
                <div class="form-control">
                    <input type="text" disabled id="email-fee" value="<?php echo $row['email'] ?>">
                </div>
                <div class="form-control">
                    <input type="date" placeholder="Date" id="date-fee">
                </div>
                <div class="form-control">
                    <select name="month" id="month-fee">
                        <option selected disabled value="">Select Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                </div>
                <div class="form-control">
                    <input type="number" placeholder="Fees" id="fees">
                </div>

            </form>
        </section>
        <footer>
            <div class="form-control">
                <button type="button" id="fee-pay" onclick="feePay()">Pay</button>
            </div>
        </footer>
    </div>
</div>

<div class="container">
    <div class="student-list">
        <div class="fees-btn">
            <h1>Student Fees</h1>
            <h3 style="color: var(--text-color)">Total Found( <?php echo $num_row ?> )</h3>
            <button type="button" class="status primary py-5" id="btn-fees">Fee Payment</button>
        </div>
        <input type="hidden" id="idKey" value="<?php echo $_GET['id']?>">
        <table>
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Month</th>
                    <th>Fees</th>
                </tr>
            </thead>
            <tbody id="fee_std_list">

            </tbody>
        </table>
    </div>
</div>
<?php
include('footer.php');
?>

<!-- FETCH API AUTO LOAD WITH INSERT TIME -->
<script>
    const feesData = async () => {
        let id = document.getElementById("idKey").value;
        const response = await fetch("partially/fee_std_list_data.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({id})
        })
        const result = await response.text();
        select("#fee_std_list").innerHTML = result;
    }
    feesData()
</script>

<!-- Fee Paid Modal -->
<script>
    // fees Modal
    const btn_fees = document.getElementById('btn-fees');
    const modal_fees = document.getElementById('modal-fees');
    const modal_fees_close = document.getElementById('modal-fees-close');
    modal(btn_fees, modal_fees, modal_fees_close);


    async function feePay() {
        const fee_pay = document.getElementById('fee-pay');
        const id = document.getElementById('id');
        const std_name = document.getElementById('std-name-fee');
        const email = document.getElementById('email-fee');
        const date = document.getElementById('date-fee');
        const month = document.getElementById('month-fee');
        const fees = document.getElementById('fees');

        if (month.value === '') {
            alertError('Month is required');
        } else if (fees.value === "") {
            alertError('Fees is required');
        } else {
            // Button function
            disabledBtn(fee_pay, "loading...", "disabled")

            const response = await fetch('partially/fees_handle.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: id.value,
                    std_name: std_name.value,
                    email: email.value,
                    date: date.value,
                    month: month.value,
                    fees: fees.value,
                })
            })
            const result = await response.text();
            if (result) {
                if (result === 'insert') {
                    alertSuccess('Fee Paid');
                    feesData()
                    modalClose(modal_fees);
                } else if (result === 'not_insert') {
                    alertError('Fee Paid Failed');
                }
                // Button function
                disabledBtn(fee_pay, "Pay", "")
            }
            date.value = "";
            month.value = "";
            fees.value = "";
        }

    }
</script>