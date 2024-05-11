<?php
include_once('include/header.php');
?>

<!-- Advertisement Section -->

<?php
if (count($advertisement) !== 0) {
?>

    <section id="advertisement-layout">
        <div class="advertisement-layout-close" id="advertisement-layout-close">+</div>
        <div class="advertisement-container">
            <div class="owl-carousel owl-theme">
                <?php
                foreach ($advertisement as $key => $value) { ?>
                    <div class="item">
                        <img src="admin/img/<?php echo $value["image"] ?>" alt="not support">
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

<?php
}
?>

<!-- Header -->
<header>
    <main class="header">
        <div class="left-side">
            <div class="owl-carousel">
                <?php
                foreach ($hero as $key => $value) { ?>
                    <div class="item">
                        <img src="admin/img/<?php echo $value['image'] ?>" alt="image">
                        <div class="hero-item-detail">
                            <div class="hero-item-detail-content">
                                <div class="detail-left">
                                    <h1><?php echo $value['heading'] ?></h1>
                                    <p><?php echo $value['text'] ?></p>
                                    <button onclick="window.location.href='<?php echo $value['button'] ?>'">Learn more</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </main>
</header>


<!-- Course First Section -->
<section class="main-FirstSection" id="course">
    <main class="FirstSection">
        <div class="title">
            <h1>Our Popular Courses</h1>
        </div>
        <div class="course-control">


            <?php
            foreach ($course as $key => $value) { ?>
                <div class="service-item">
                    <div class="service-img">
                        <img src="admin/img/<?php echo $value['image'] ?>" alt="">
                    </div>

                    <div class="service-detail">
                        <div class="headings">
                            <h3><?php echo $value['title'] ?></h3>
                            <p><?php echo $value['description'] ?></p>
                        </div>
                        <div class="add-date">
                            <span>Computer Skills</span>
                        </div>

                    </div>

                </div>
            <?php
            }
            ?>

        </div>
    </main>
</section>



<!-- Review Third Section -->
<section class="main-FirstSection">
    <main class="FirstSection">
        <div class="title">
            <h1>Our Review</h1>
        </div>
        <div class="review-section">
            <div class="review-item">
                <div class="review-icon">
                    <ion-icon name="school-outline"></ion-icon>
                </div>
                <h2>5+</h3>
                    <h1>Teacher</h1>
            </div>
            <div class="review-item">
                <div class="review-icon">
                    <ion-icon name="people-outline"></ion-icon>
                </div>
                <h2>100+</h2>
                <h1>Students</h1>

            </div>
            <div class="review-item">
                <div class="review-icon">
                    <ion-icon name="book-outline"></ion-icon>
                </div>
                <h2>10+</h3>
                    <h1>Course</h1>
            </div>
        </div>

    </main>
</section>


<!-- Teacher Fourth Section -->
<section class="main-FirstSection" id="tutor">
    <main class="FirstSection">
        <div class="title">
            <h1>Our Faculty</h1>
        </div>

        <div class="teacher-section">

            <div class="teacher-card">
                <div class="owl-carousel owl-theme">

                    <?php
                    foreach ($teacher as $key => $value) { ?>
                        <div class="item">

                            <div class="teacher-img">
                                <img src="admin/img/<?php echo $value['image'] ?>" alt="teacher image">
                            </div>

                            <div class="teacher-detail">
                                <h3><?php echo $value['sir_name'] ?></h3>
                                <p><?php echo $value['description'] ?></p>
                            </div>

                            <div class="teacher-social-icon">
                                <a href="<?php echo $value['description'] ?>" class="social-icon whatsapp"><ion-icon name="logo-whatsapp"></ion-icon></a>
                                <a href="<?php echo $value['description'] ?>" class="social-icon facebook"><ion-icon name="logo-facebook"></ion-icon></a>
                            </div>

                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <!-- <div class="teacher-card">
                <div class="teacher-img teacher-img-2">
                </div>
                <div class="teacher-detail">
                    <h2>Sir Hammad Khan</h2>
                    <h4>C.I.T</h4>
                    <div class="teacher-social-icon">
                        <div class="teacher-icon-detail-fb"><a href="https://www.facebook.com/" target="_blank">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>facebook</div>
                        <div class="teacher-icon-detail-fb"><a href="https://www.instagram.com/" target="_blank">
                                <ion-icon name="logo-whatsapp"></ion-icon>
                            </a>Whatsapp</div>
                        <div class="teacher-icon-detail-fb"><a href="https://twitter.com/" target="_blank">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>Twitter</div>
                        <div class="teacher-icon-detail-fb"><a href="https://www.youtube.com/" target="_blank">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>Instagram</div>
                    </div>
                </div>
            </div>

            <div class="teacher-card">
                <div class="teacher-img teacher-img-3">
                </div>
                <div class="teacher-detail">
                    <h2>Sir Daniyal Ali</h2>

                    <h4>Graphics Designing</h4>
                    <div class="teacher-social-icon">
                        <div class="teacher-icon-detail-fb"><a href="https://www.facebook.com/" target="_blank">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>facebook</div>
                        <div class="teacher-icon-detail-fb"><a href="https://www.instagram.com/" target="_blank">
                                <ion-icon name="logo-whatsapp"></ion-icon>
                            </a>Whatsapp</div>
                        <div class="teacher-icon-detail-fb"><a href="https://twitter.com/" target="_blank">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>Twitter</div>
                        <div class="teacher-icon-detail-fb"><a href="https://www.youtube.com/" target="_blank">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>Instagram</div>
                    </div>
                </div>
            </div>

            <div class="teacher-card">
                <div class="teacher-img teacher-img-4">
                </div>
                <div class="teacher-detail">
                    <h2>Sir Shamawoon Mumtaz</h2>
                    <h4>Graphics Designing</h4>
                    <div class="teacher-social-icon">
                        <div class="teacher-icon-detail-fb"><a href="https://www.facebook.com/" target="_blank">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>facebook</div>
                        <div class="teacher-icon-detail-fb"><a href="https://www.instagram.com/" target="_blank">
                                <ion-icon name="logo-whatsapp"></ion-icon>
                            </a>Whatsapp</div>
                        <div class="teacher-icon-detail-fb"><a href="https://twitter.com/" target="_blank">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>Twitter</div>
                        <div class="teacher-icon-detail-fb"><a href="https://www.youtube.com/" target="_blank">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>Instagram</div>
                    </div>
                </div>
            </div> -->


        </div>
    </main>
</section>


<!-- Advertisement Slider Second Section -->
<?php
if (count($advertisement) !== 0) {
?>
    <section class="main-FirstSection">
        <main class="FirstSection">

            <div class="advertisement-slider">
                <div class="owl-carousel owl-theme">
                    <?php
                    foreach ($advertisement as $key => $value) { ?>
                        <div class="item">
                            <img src="admin/img/<?php echo $value["image"] ?>" alt="not support">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </main>
    </section>


    <!-- Students Form Fifth Section -->
    <section class="main-FirstSection">
        <main class="FirstSection">

            <div class="student-enroll">
                <div class="left-side">
                    <h1>Student Enroll Now</h2>
                        <div class="form-control">
                            <label for="">Name</label>
                            <input type="text" id="name">
                        </div>
                        <div class="form-control">
                            <label for="">Email (Optional)</label>
                            <input type="text" id="email">
                        </div>
                        <div class="form-control">
                            <label for="">Contact Number</label>
                            <input type="number" id="contact_number">
                        </div>
                        <div class="form-control">
                            <label for="">Qualification</label>
                            <input type="text" id="qualification">
                        </div>

                        <div class="form-control">
                            <button type="button" id="contact_send" class="fav-btn contact-btn">Submit</button>
                        </div>
                </div>
            </div>
        </main>
    </section>
<?php
}
?>

<!-- Footer Section -->
<?php
include_once('include/footer.php');
?>

<script>
    var contact_send = select('#contact_send');
    contact_send.addEventListener('click', async () => {
        const name = select('#name');
        const email = select('#email');
        const contact_number = select('#contact_number');
        const qualification = select('#qualification');

        if (name.value === "") {
            alertError('Name is required');
        } else if (contact_number.value === "") {
            alertError('Contact Number is required');
        } else if (qualification.value === "") {
            alertError('Qualification is required');
        } else {
            const response = await fetch('include/student_enroll.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    name: name.value,
                    email: email.value,
                    contact_number: contact_number.value,
                    qualification: qualification.value
                })
            })
            const result = await response.text();
            if (result) {
                if (result === "insert") {
                    alertSuccess('Student form has been submitted');
                } else if (result === "not_insert") {
                    alertError('Some Error Occurred');
                } else if (result === "name") {
                    alertError('Name is required');
                } else if (result === "contact_number") {
                    alertError('Contact Number is required');
                } else if (result === "qualification") {
                    alertError('Qualification is required');
                }
            }
            name.value = "";
            email.value = "";
            contact_number.value = "";
            qualification.value = "";
         
        }
    })
</script>