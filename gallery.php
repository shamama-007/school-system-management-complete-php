<?php
include_once('include/header.php');
?>

<section class="section-gallery">
    <main class="section-gallery-layout">

        <?php
        foreach ($event as $key => $value) { ?>

            <div class="gallery-item">
                <img src="admin/img/<?php echo $value['image']?>" alt="">
                <div class="gallery-detail">
                    <h3><?php echo $value['heading']?></h3>
                </div>
            </div>

        <?php
        }
        ?>
    </main>
</section>

<?php
include_once('include/footer.php');
?>