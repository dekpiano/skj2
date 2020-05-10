<div class="section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full center">
                    <div class="heading_main text_align_center">
                        <h2><span class="theme_color">ประชาสัมพันธ์</span> กิจกรรม</h2>
                        <p class="large">สวนกุหลาบวิทยาลัย จิรประวัติ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container pad-3">
    <div class="col-12">
        <!--- หัวข้อ --->

        <!--- หัวข้อ --->
        <div class="row">
            <?php foreach ($news as $key => $v_news) : ?>

            <div class="col-md-6 col-sm-6  col-lg-4 mb-3 animated fadeInUp">
                <a href="<?=base_url('news/newsDetail/').$v_news->news_id;?>">
                    <div class="card mb-4 box-shadow h-100">
                        <?php if ($v_news->news_img == '') : ?>
                        <img class="card-img-top"
                            data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                            alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                            src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1717cabdaf5%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1717cabdaf5%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71875%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                            data-holder-rendered="true">
                        <?php else: ?>
                        <img class="card-img-top" src="<?=base_url('uploads/news/').$v_news->news_img;?>"
                            style="height: 225px; width: 100%; display: block;">
                        <?php endif; ?>
                        <div class="card-body">
                            <h4><?=$v_news->news_topic?></h4>
                            <!--  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"> <i
                                            class="icofont-eye-alt"> <?=$v_news->news_view;?></i></button>
                                    <button type="button"
                                        class="btn btn-sm btn-outline-secondary"><?=$v_news->news_category;?></button>
                                </div>
                                <small
                                    class="text-muted"><?php echo $time_elapsed = $this->timeago->timeAgo_T($v_news->news_date); ?></small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <?php endforeach; ?>
        </div>

    </div>
</div>