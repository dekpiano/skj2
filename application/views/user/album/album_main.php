
<section id="breadcrumbs" class="portfolio" style="background: #e9ebee;">

    <div class="container">
        <!-- -fluid -->
        <center>
            <h1>รูปภาพกิจกรรมทั้งหมด</h1>
            <p>โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์</p>
        </center>


        <div class="card-columns">
            <?php foreach ($images as $key => $v_images) : ?>
            <div class="card">
                <a target="_blank" title="<?=$v_images->img_title;?>" href="<?=$v_images->img_link;?>">
                    <div class="img-hover-zoom img-hover-zoom--basic">
                        <img class="card-img-top " src="<?=$v_images->img_mainpic;?>" alt="<?=$v_images->img_title;?>"
                            style="width:100%">
                    </div>
                    <div class="card-body text-center">
                        <?=$v_images->img_title?>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    </div>



</section>