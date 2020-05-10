<style type="text/css">

.my-login-page {
	
 /* background-color: #f7f9fb;*/
  font-size: 14px;
}
		
html body{
	height: 100%;
	position: relative;
	background-image: url(<?=base_url();?>asset/user/img/58.png);
	background-position: bottom;
	background-attachment: fixed;
	background-size: contain;
	background-repeat: no-repeat;
	background-color: #f8f9fa
}
	
.my-login-page .brand {
  width: 90px;
  height: 90px;
  overflow: hidden;
  border-radius: 50%;
  margin: 40px auto;
  box-shadow: 0 4px 8px rgba(0,0,0,.05);
  position: relative;
  z-index: 1;
}

.my-login-page .brand img {
  width: 100%;
}

.my-login-page .card-wrapper {
  width: 400px;
}

.my-login-page .card {
  border-color: transparent;
  box-shadow: 0 4px 8px rgba(0,0,0,.05);
}

.my-login-page .card.fat {
  padding: 10px;
}

.my-login-page .card .card-title {
  margin-bottom: 30px;
}

.my-login-page .form-control {
  border-width: 2.3px;
}

.my-login-page .form-group label {
  width: 100%;
}

.my-login-page .btn.btn-block {
  padding: 12px 10px;
}

.my-login-page .footer {
  margin: 40px 0;
  color: #888;
  text-align: center;
}

@media screen and (max-width: 425px) {
  .my-login-page .card-wrapper {
    width: 90%;
    margin: 0 auto;
  }
}

@media screen and (max-width: 320px) {
  .my-login-page .card.fat {
    padding: 0;
  }

  .my-login-page .card.fat .card-body {
    padding: 15px;
  }
}
</style>
<main id="main"  class="my-login-page">


          <section class=" breadcrumbs" id="breadcrumbs"  >
            <div class="container h-100">
              <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                  <div class="" >
                   <center><img src="<?=base_url('asset/user/img/logo_fav.png');?>" alt="logo" style="width: 30%"></center> 
                  </div>
                  <div class="card fat">
                    <div class="card-body">
                    
                      <form method="post" action="<?=base_url('Control_login/validlogin');?>" class="my-login-validation" novalidate="">
                        <div class="form-group">
                          <label for="username">ชื่อผู้ใช้งาน (Email) </label>
                          <input id="username" type="text" class="form-control" name="username" value="" required autofocus>
                          <div class="invalid-feedback">
                            กรอกอีเมล์ผู้ใช้งาน
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="password">รหัสผ่าน
                            
                          </label>
                          <input id="password" type="password" class="form-control" name="password" required data-eye>
                            <div class="invalid-feedback">
                              กรอกรหัสผ่าน
                            </div>
                        </div>

                        <div class="form-group m-0">
                          <button type="submit" class="btn btn-primary btn-block">
                            Login
                          </button>
                        </div>
                      
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

</main>