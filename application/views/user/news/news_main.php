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

<!--Container-->
<div class="container">
    <!--Start code-->
    <div class="row">
        <div class="col-12 pb-5">
            <!--SECTION START-->
            <section class="row">


                <!--Start slider news-->
                <div class="col-12 col-md-6 pb-0 pb-md-3 pt-2 pr-md-1">
                    <div id="featured" class="carousel slide carousel" data-ride="carousel">
                        <!--dots navigate-->
                        <ol class="carousel-indicators top-indicator">                        
                            <li data-target="#featured" data-slide-to="0" class="active"></li>
                            <?php foreach ($news as $key => $v_news) : ?>
                                <li data-target="#featured" data-slide-to="<?=$key+1?>"></li>
                            <?php endforeach; ?>
                        </ol>

                        <!--carousel inner-->
                        <div class="carousel-inner">

                            <?php foreach ($news as $key => $v_news) : ?>
                            <!--Item slider-->
                            <div class="carousel-item <?=$key == 0 ? 'active' : '' ?>">
                                <div class="card border-0 rounded-0 text-light overflow zoom">
                                    <div class="position-relative">
                                        <!--thumbnail img-->
                                        <div class="ratio_left-cover-1 image-wrapper">
                                            <a href="<?=base_url('news/newsDetail/').$v_news->news_id;?>">
                                                <img class="img-fluid w-100"
                                                    src="<?=base_url('uploads/news/').$v_news->news_img;?>"
                                                    alt="<?=$v_news->news_topic;?>">
                                            </a>
                                        </div>
                                        <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                            <!--title-->
                                            <a href="<?=base_url('news/newsDetail/').$v_news->news_id;?>">
                                                <h2 class="h3 post-title text-white my-1">
                                                <?=$v_news->news_topic;?>
                                                </h2>
                                            </a>
                                            <!-- meta title -->
                                            <div class="news-meta">
                                                <span class="news-author"><?php echo $time_elapsed = $this->timeago->timeAgo_T($v_news->news_date); ?></span>
                                                <span class="news-date"><i
                                            class="icofont-eye-alt"> <?=$v_news->news_view;?></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <!--end carousel inner-->
                    </div>

                    <!--navigation-->
                    <a class="carousel-control-prev" href="#featured" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#featured" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--End slider news-->

                <!--Start box news-->
                <div class="col-12 col-md-6 pt-2 pl-md-1 mb-3 mb-lg-4">
                    <div class="row">
                        <!--news box-->
                         <?php foreach ($news as $key => $v_news) : ?>
                        <div class="col-6 pb-1 pt-0 pr-1">
                            <div class="card border-0 rounded-0 text-white overflow zoom">
                                <div class="position-relative">
                                    <!--thumbnail img-->
                                    <div class="ratio_right-cover-2 image-wrapper">
                                        <a href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">
                                            <img class="img-fluid" src="<?=base_url('uploads/news/').$v_news->news_img;?>"
                                                alt="simple blog template bootstrap">
                                        </a>
                                    </div>
                                    <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                        <!-- category -->
                                        <a class="p-1 badge badge-primary rounded-0"
                                            href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/"><?=$v_news->news_category;?></a>

                                        <!--title-->
                                        <a href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">
                                            <h2 class="h5 text-white my-1"><?=$v_news->news_topic;?>
                                            </h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                        <!--end news box-->
                    </div>
                </div>
                <!--End box news-->
            </section>
            <!--END SECTION-->
        </div>
    </div>
    <!--end code-->

</div>
