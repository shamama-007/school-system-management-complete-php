<?php
include_once('include/header.php');
?>

<section class="contact-section">
    <div class="content">
        <!-- Left Sidebar -->
        <div class="left-side">
            <h1>JUST REACH US RIGHT HERE</h1>
            <div class="form-control">
                <label for="">Name</label>
                <input type="text" id="name" placeholder="Enter Your Name">
            </div>
            <div class="form-control">
                <label for="">Contact Number</label>
                <input type="text" id="email" placeholder="Enter a valid email address">
            </div>
            <div class="form-control">
                <label for="">Message</label>
                <textarea name="" id="message" cols="30" rows="8" placeholder="Enter Your message"></textarea>
            </div>
            <div class="form-control">
                <button type="button" id="contact_send" class="fav-btn contact-btn">Submit</button>
            </div>
        </div>
        <!-- Right Sidebar -->
        <div class="right-side">
            <h1>LET'S GET SOCIAL!</h1>
            <div class="contact-social">
                <a href="https://www.facebook.com/profile.php?id=100075729646343" target="_blank" class="social-icon facebook">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
                <p class="contact-social-title"><b>Facebook</b></p>
                <p class="contact-social-text">Aqib Noor</p>
            </div>
            <div class="contact-social">
                <a href="https://www.whatsapp.com/" class="social-icon whatsapp">
                    <ion-icon name="logo-whatsapp"></ion-icon>
                </a>
                <p class="contact-social-title"><b>Whatsapp</b></p>
                <p class="contact-social-text">03412275518</p>
                <div class="contact-social">
                    <a href="" target="_blank" class="social-icon location">
                        <ion-icon name="location-outline"></ion-icon>
                    </a>
                    <p class="contact-social-title"><b>Location</b></p>
                    <p class="contact-social-text">H#571 New l block sec 11 1/2 orangi town karachi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include_once('include/footer.php');
?>

<script>
    var contact_send = select('#contact_send');
    contact_send.addEventListener('click', async () => {
        const name = select('#name');
        const email = select('#email');
        const message = select('#message');

        if (name.value === "") {
            alertError('Name is required');
        } else if (email.value === "") {
            alertError('Email is required');
        } else if (message.value === "") {
            alertError('Message is required');
        } else {
            const response = await fetch('include/contact_send.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    name: name.value,
                    email: email.value,
                    message: message.value
                })
            })
            const result = await response.text();
            if (result) {
                if (result === "insert") {
                    alertSuccess('Contact has been send successfully');
                } else if (result === "not_insert") {
                    alertError('Some Error Occurred');
                } else if (result === "name") {
                    alertError('Name is required');
                } else if (result === "email") {
                    alertError('Email is required');
                } else if (result === "message") {
                    alertError('Message is required');
                }
            }
            name.value = "";
            email.value = "";
            message.value = "";
        }
    })
</script>