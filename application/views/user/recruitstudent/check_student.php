<section id="breadcrumbs" class="breadcrumbs team d-flex" style="height: calc(100vh - 160px)">
<style type="text/css">
    .form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}
</style>

<div class="container m-auto" >
  <a href="<?=base_url('RegStudent')?>" class="btn btn-outline-primary">< ลงทะเบียนเรียน</a>
    <br/>
    <div class="text-center">
        <img style="width: 150px;" src="<?=base_url('asset/user/img/Logo-SKJ.png');?>">
        <h1>ตรวจสอบข้อมูลการสมัครเรียน ปีการศึกษา <?=(date('Y')+543);?></h1>
    <p>โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์</p>
    </div>
     
	<div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <form class="card card-sm needs-validation" novalidate="" method="get" action="<?=base_url('checkRegister/dataStudent');?>" >
                <div class="card-body row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="icofont-search-2"></i>
                    </div>
                    <!--end of col-->
                    <div class="col">
                        <input class="form-control form-control-lg form-control-borderless " name="search_stu" type="text" placeholder="ระบุ เลขประจำตัวประชาชน" value="<?=@$stu->recruit_idCard == '' ? '' : $stu->recruit_idCard ?>" required data-inputmask="'mask': '9-9999-99999-99-9'">
                        <div class="invalid-feedback">
                          ระบุเลขประจำตัวประชาชน 13 หลัก
                        </div>
                    </div>
                    <!--end of col-->
                    <div class="col-auto">
                        <button class="btn btn-lg btn-success" type="submit">ค้นหา</button>
                    </div>
                    <!--end of col-->
                </div>
            </form>
        </div>
        <!--end of col-->        
    </div>

    <hr>  
  

</div>
</section>