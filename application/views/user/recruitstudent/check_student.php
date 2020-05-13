<div class="section layout_padding" style="padding: 75px 0px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full center">
                    <div class="heading_main text_align_center">
                         <img style="width: 150px;" src="<?=base_url('asset/user/img/Logo-SKJ.png');?>">
                        <h2><span class="theme_color">ตรวจสอบข้อมูลการสมัครเรียน </span>ปีการศึกษา <?=(date('Y')+543);?>
                        </h2>
                        <p class="large">โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์</p>
                    </div>                    
                </div>                
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}
.bd-callout {
padding: 1.25rem;
margin-top: 1.25rem;
margin-bottom: 1.25rem;
border: 1px solid #eee;
border-left-width: .25rem;
border-radius: 0.25rem;
h4 {
margin-top: 0;
margin-bottom: 0.25rem;
}
}
.bd-callout-info {
border-left-color: #5bc0de;
h4 {
color: #5bc0de;
}
}
.bd-callout-warning {
border-left-color: #f0ad4e;
h4 {
color: #f0ad4e;
}
}
.bd-callout-danger {
border-left-color: #d9534f;
h4 {
color: #d9534f;
}
}
.bd-callout-primary {
border-left-color: #007bff;
h4 {
color: #007bff;
}
}
.bd-callout-success {
border-left-color: #28a745;
h4 {
color: #28a745;
}
}
.bd-callout-default {
border-left-color: #6c757d;
h4 {
color: #6c757d;
}

</style>

<div class="container m-auto" >     
	<div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="bd-callout bd-callout-danger ">
              <h4>ตรวจสอบข้อมูลเพื่อพิมพ์สมัครสอบ </h4>
            </div>
            <form class="card card-sm needs-validation" novalidate="" method="get" action="<?=base_url('checkRegister/dataStudent?edit=').$this->input->get("edit");?>" >
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