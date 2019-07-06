<?php
$hp_slogan_rpt=get_field("hp_slogan_rpt","option");
if(count(@$hp_slogan_rpt) > 0){
    ?>
    <div class="renu-gowatch">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="hon-mot-trieu-nguoi-tin-dung">Hơn 1 triệu người tin dùng</h2>
                    <h2 class="chung-toi-cam-ket">Chúng tôi cam kết mang lại những giá trị cao nhất cho khách hàng khi đến với <?php echo get_bloginfo( 'name', 'raw' ); ?></h2>
                </div>
            </div>
        </div>
        <div class="box-slogan">
            <div class="container">
                <?php
                $k=0;
                $m=1;
                foreach ($hp_slogan_rpt as $key => $value) {
                    if($k%3==0){
                        echo '<div class="row">';
                    }
                    ?>
                    <div class="col-md-4">
                        <div class="box-item-slogan">
                            <div class="box-item-sl-img">
                                <div style="background-image: url('<?php echo get_template_directory_uri()."/assets/images/icon-".$m.".svg"; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (100/100));"></div>
                            </div>
                            <div class="box-item-sl-info">
                                <h3 class="box-item-sl-title"><?php echo @$value["hp_slogan_item_title"]; ?></h3>
                                <div class="box-item-sl-excerpt"><?php echo @$value["hp_slogan_item_excerpt"]; ?></div>
                            </div>
                            <div class="clr"></div>
                        </div>
                    </div>
                    <?php
                    $k++;
                    $m++;
                    if($k%3 == 0 || $k == count(@$hp_slogan_rpt)){
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}
?>