<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?=$title?> | SKJ</title>
    <meta name="description" content="<?=$description;?>" />
    <meta
        content="โรงเรียนสวนกุหลาบวิทยาลัย,โรงเรียน,สวนกุหลาบ,จิรประวัติ,นครสวรรค์,สวนกุหลาบจิรประวัติ,โรงเรียนสวนกุหลาบ"
        name="keywords">
    <meta http-equiv="content-language" content="th" />
    <meta name="robots" content="index, follow" />
    <meta name="revisit-after" content="1 day" />
    <meta name="author" content="Dekpiano" />
    <meta property="og:url" content="<?=$full_url;?>" />
    <meta property="og:title" content="<?=$title?> | SKJ" />
    <meta property="og:description" content="<?=$description;?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="" />
    <link rel="image_src" href="images/content/content-37.png" />
    <!-- Favicons -->
    <link href="<?=base_url()?>/asset/user/img/logo_fav.png" rel="icon">
    <link href="<?=base_url()?>/asset/user/img/logo_fav.jpg" rel="apple-touch-icon">


      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="<?=base_url()?>cssjs/css/pogo-slider.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="<?=base_url()?>cssjs/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?=base_url()?>cssjs/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=base_url()?>cssjs/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->   
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165844207-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-165844207-1');
    </script>
</head>

<style type="text/css">
.img-hover-zoom {
    overflow: hidden;
}

.img-hover-zoom--basic img {
    transition: transform .5s ease;
}

.img-hover-zoom--basic:hover img {
    transform: scale(1.5);
}


</style>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="<?=base_url()?>cssjs/images/loader.gif" alt="#" />
        </div>
    </div>
    <!-- end loader -->
    <!-- END LOADER -->

    <!-- Start header -->
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html"><img src="<?=base_url()?>cssjs/images/logo.png" alt="image"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                            <a class=" nav-link dropdown-toggle" href="http://example.com" id="dropdown01"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="icofont-university"></i> เกี่ยวกับโรงเรียน</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <?php foreach ($Allabout as $key => $v_about) : ?>
                                <a class="dropdown-item" href="<?=base_url('AboutSchool/').$v_about->about_id;?>"><i
                                        class="icofont-dotted-right"></i> <?=$v_about->about_menu;?></a>
                                <?php endforeach; ?>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class=" nav-link dropdown-toggle" href="http://example.com" id="dropdown01"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="icofont-teacher"></i> บุคลากร</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="<?=base_url('Personnel/คณะผู้บริหาร')?>"><i
                                        class="icofont-dotted-right"></i> คณะผู้บริหาร</a>
                                <?php foreach ($lear as $key => $v_lear) : ?>
                                <a class="dropdown-item" href="<?=base_url('Personnel/').$v_lear->lear_namethai?>"><i
                                        class="icofont-dotted-right"></i>
                                    กลุ่มสาระการเรียนรู้<?=$v_lear->lear_namethai?></a>
                                <?php endforeach; ?>
                                <a class="dropdown-item" href="#about"><i class="icofont-dotted-right"></i>
                                    ฝ่ายสนับสนุนการสอน</a>
                            </div>
                        </li>
                        <li class="nav-item animated  heartBeat delay-1s">
                            <a class=" nav-link" href="<?=base_url('RegStudent');?>"><i
                                    class="icofont-download "></i> รับสมัครนักเรียน</a>
                        </li>
                        <li><a class="nav-link active" style="background:#fff;color:#000;" href="<?=base_url('login')?>">Login</a></li>
                    </ul>
                </div>
                <div class="search-box">
                    <input type="text" class="search-txt" placeholder="Search">
                    <a class="search-btn">
                        <img src="<?=base_url()?>cssjs/images/search_icon.png" alt="#" />
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->



    </nav><!-- .nav-menu -->
    <style type="text/css">
    .heartBeat {
        animation-duration: 5s;
        animation-delay: 5s;
        animation-iteration-count: infinite;
    }
    </style>