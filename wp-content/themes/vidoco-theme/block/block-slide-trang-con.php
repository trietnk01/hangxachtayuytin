<div class="owl-carousel-slide owl-carousel owl-theme owl-loaded">
    <?php
    for($i=1;$i<=2;$i++){
        ?>
        <div class="item">
            <div style="background-image: url('<?php echo wp_upload_dir( null,true,false )["url"]."/header-img-".$i.".jpg"; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (1439/543));"></div>
        </div>
        <?php
    }
    ?>
</div>