<!-- Footer Section -->
<section class="main-FirstSection">
    <main class="FirstSection">

        <div class="footer-section">
            <div class="top-side">
                <div class="footer-item footer-first">
                    <div class="img"></div>
                    <div class="course-name">Address : H#571 New l block sec 11 1/2 orangi town karachi, Pakistan</div>
                    <div class="course-name">Thursday, August 05, 2021 @ 16:19PKT</div>

                </div>
                <div class="footer-item">
                    <h2>Courses</h2>
                    <div class="course-name">C.I.T Computer information technology</div>
                    <div class="course-name">D.I.T Diploma Information Technology</div>
                    <div class="course-name">Graphics Designing</div>
                    <div class="course-name">Web Developer</div>
                    <div class="course-name">Web Designing</div>
                    <div class="course-name">Amazon</div>
                    <div class="course-name">Daraz</div>
                </div>
                <div class="footer-item">
                    <h2>Contact Us</h2>
                    <div class="course-name">H#571 New l block sec 11 1/2 orangi town karachi, Pakistan</div>
                    <div class="course-name">03412275518</div>
                    <div class="course-name">info@connect.net.pk</div>
                    <div class="course-name">Developer By: Shamama-Bin-Shakil</div>
                </div>
            </div>
            <div class="bottom-side">
                <p>© 2005-<?php echo date("Y") ?> Connect Communications. All Rights Reserved</p>
            </div>
        </div>
    </main>
</section>

</body>
<!-- Web Icons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<!-- Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Customs Js -->
<script src="./js/main.js"></script>

<script>
    var burger = document.querySelector(".burger");
    var nav = document.querySelector(".nav");
    var menu = document.querySelector(".menu");

    burger.addEventListener("click", () => {
        nav.classList.toggle("height-navbar-resp");
        menu.classList.toggle("v-class-resp");
    });

    // Feedback Open
    var feedback_content = document.getElementById('feedback-content');
    const feedback_btn = document.getElementById('feedback-btn');
    feedback_btn.addEventListener('click', () => {
        feedback_content.classList.add('feedback_active');
    });

    // Feedback Close
    const feedback_close = document.getElementById('feedback-close');
    feedback_close.addEventListener('click', () => {
        feedback_content.classList.remove('feedback_active');
    });

    var feedback_send = select('#feedback_send');
    feedback_send.addEventListener('click', async () => {
        const feedback_email = select('#feedback-email');
        const feedback_message = select('#feedback-message');

        if (feedback_email.value === "") {
            alertError('Email is required');
        } else if (feedback_message.value === "") {
            alertError('Message is required');
        } else {
            const response = await fetch('include/feedback_send.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email: feedback_email.value,
                    message: feedback_message.value
                })
            })
            const result = await response.text();
            if (result) {
                if (result === "insert") {
                    alertSuccess('Feedback has been send successfully');
                } else if (result === "not_insert") {
                    alertError('Some Error Occurred');
                } else if (result === "email") {
                    alertError('Email is required');
                } else if (result === "message") {
                    alertError('Message is required');
                }
            }
            feedback_email.value = "";
            feedback_message.value = "";
        }
    })
</script>

<script>
    let advertisement_layout_close = document.getElementById("advertisement-layout-close");
    let advertisement_layout = document.getElementById("advertisement-layout");

    try {
        advertisement_layout_close.addEventListener("click", () => {
            advertisement_layout.classList.remove("active");
        });
    } catch (error) {

    }
    setTimeout(() => {
        try {
            advertisement_layout.classList.add("active");
        } catch (e) {}
    }, 3000);
</script>

<script>
    $('.header .owl-carousel').owlCarousel({
        loop: true,
        items: 1,
        margin: 0,
        dot: false,
        autoplay: true,
        smartSpeed: 1200,
        mouseDrag: false,
        autoplayTimeout: 5000

    })

    $('#advertisement-layout .owl-carousel').owlCarousel({
        loop: true,
        items: 1,
        dot: false,
        autoplay: true,
        smartSpeed: 1000,
    })

    $('.teacher-card .owl-carousel').owlCarousel({
        loop: true,
        items: 1,
        autoplay: true,
        dot: true,
        smartSpeed: 1000,
        autoplayTimeout: 5000
    })

    $('.advertisement-slider .owl-carousel').owlCarousel({
        loop: true,
        items: 1,
        autoplay: true,
        dot: true,
        smartSpeed: 1000,
        autoplayTimeout: 5000
    })
</script>

</html>