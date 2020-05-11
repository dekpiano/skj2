<style>
img.lazy {
      
        
        /* optional way, set loading as background */
        background-image: url('<?=base_url()?>cssjs/images/loader.gif');
        background-repeat: no-repeat;
        background-position: 50% 50%;
    }
    </style>
<div class="section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full center">
                    <div class="heading_main text_align_center">
                        <h2><span class="theme_color">รูปภาพกิจกรรม</span> ทั้งหมด</h2>
                        <p class="large">โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card-columns" >
        <?php for($i = 0; $i <=10; $i++): foreach ($images as $key => $v_images) : ?>
        <div class="card" id="container">
            <a target="_blank" title="<?=$v_images->img_title;?>" href="<?=$v_images->img_link;?>">
                <div class="img-hover-zoom img-hover-zoom--basic">
                    <img  class="card-img-top lazy" data-src="<?=$v_images->img_mainpic;?>" src="" alt="<?=$v_images->img_title;?>"
                        style="width:100%">
                </div>
                <div class="card-body text-center h5">
                    <?=$v_images->img_title?>
            </a>
        </div>
    </div>
    <?php endforeach; endfor;  ?>
    
</div>

</div>