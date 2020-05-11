<style>
.ui.card {
    display: inline-block;
    margin: 10px;
}

.ui.card,
.ui.cards>.card {
    background-color: #5C5D5F;
    color: white;
}

.ui.card.matthew {
    background-color: #2B4B64;
}

.ui.card.kristy {
    background-color: #253E54;
}

.ui.card>.content>a.header,
.ui.cards>.card>.content>a.header,
.ui.card .meta,
.ui.cards>.card .meta,
.ui.card>.content>.description,
.ui.cards>.card>.content>.description,
.ui.card>.extra a:not(.ui),
.ui.cards>.card>.extra a:not(.ui) {
    color: white;
}

.ui.card>.content,
.ui.cards>.card>.content {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    border: none;
    border-top: 1px solid rgba(34, 36, 38, .1);
    background: 0 0;
    margin: 0;
    padding: 1em 1em;
    box-shadow: none;
    font-size: 1em;
    border-radius: 0;
}
</style>

<div class="section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full center">
                    <div class="heading_main text_align_center">
                        <h2><span class="theme_color"><?=$this->uri->segment(2);?></span> </h2>
                        <p class="large">โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Three columns of text below the carousel -->
    <div class="row justify-content-center">
        <?php  $img_p = base_url('uploads/personnel/');
              $img_e = base_url('asset/img/user-icon.svg');
        foreach ($pers as $key => $v_pers) :
              if($v_pers->posi_name == 'ผู้อำนวยการโรงเรียน'): ?>
        <center>
            <div class="col-lg-5 ">
                <img src="<?=$v_pers->pers_img == '' ? $img_e : $img_p.$v_pers->pers_img;?>" alt=""
                    style="border-radius:0" class="img-fluid">
                <h4><?=$v_pers->pers_prefix.$v_pers->pers_firstname.' '.$v_pers->pers_lastname;?></h4>
                <span><?=$v_pers->posi_name;?></span>
            </div><!-- /.col-lg-4 -->
        </center>
        <?php  endif; endforeach;?>
    </div><!-- /.row -->

     <!-- Three columns of text below the carousel -->
     <div class="row justify-content-center">
        <?php  $img_p = base_url('uploads/personnel/');
              $img_e = base_url('asset/img/user-icon.svg');
        foreach ($pers as $key => $v_pers) :
          if($v_pers->posi_name == 'รองผู้อำนวยการโรงเรียน'): ?>
        <center>
            <div class="col-lg-5 ">
                <img src="<?=$v_pers->pers_img == '' ? $img_e : $img_p.$v_pers->pers_img;?>" alt=""
                    style="border-radius:0" class="img-fluid">
                <h4><?=$v_pers->pers_prefix.$v_pers->pers_firstname.' '.$v_pers->pers_lastname;?></h4>
                <span><?=$v_pers->posi_name;?></span>
            </div><!-- /.col-lg-4 -->
        </center>
        <?php  endif; endforeach;?>
    </div><!-- /.row -->
</div>

    <!-- ======= Team Section ======= -->
    <div class="container">
        <div class="row">

            <?php  foreach ($pers_type as $key => $v_pers_type): ?>
            <?php if($v_pers_type->posi_name != 'รองผู้อำนวยการโรงเรียน' && $v_pers_type->posi_name != 'ผู้อำนวยการโรงเรียน'): ?>
            <div class="col-lg-3 col-md-4 d-flex align-items-stretch">
                <div class="member" style="background: transparent;box-shadow:0px 0px 0px 0px;padding:0px;  ">
                    <img src="<?=$img_p.$v_pers_type->pers_img;?>" alt="" style="border-radius:0">
                    <h4><?=$v_pers_type->pers_prefix.$v_pers_type->pers_firstname.' '.$v_pers_type->pers_lastname;?>
                    </h4>
                    <span><?=$v_pers_type->posi_name;?></span>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>



        </div>

    </div>