<style>
.card0 {
    box-shadow: 0px 4px 8px 0px #757575;
    border-radius: 0px
}

.card2 {
    margin: 0px 40px
}

.logo {
    width: 200px;
    height: 100px;
    margin-top: 20px;
    margin-left: 35px
}

.image {
    width: 360px;
    height: 280px
}

.border-line {
    border-right: 1px solid #EEEEEE
}

.facebook {
    background-color: #3b5998;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.twitter {
    background-color: #1DA1F2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.linkedin {
    background-color: #2867B2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.line {
    height: 1px;
    width: 45%;
    background-color: #E0E0E0;
    margin-top: 10px
}

.or {
    width: 10%;
    font-weight: bold
}

.text-sm {
    font-size: 14px !important
}

::placeholder {
    color: #BDBDBD;
    opacity: 1;
    font-weight: 300
}

:-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

::-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

input,
textarea {
    padding: 10px 12px 10px 12px;
    border: 1px solid lightgrey;
    border-radius: 2px;
    margin-bottom: 5px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    font-size: 14px;
    letter-spacing: 1px
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #304FFE;
    outline-width: 0
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

a {
    color: inherit;
    cursor: pointer
}

.btn-blue {
    background-color: #1A237E;
    width: 150px;
    color: #fff;
    border-radius: 2px
}

.btn-blue:hover {
    background-color: #000;
    cursor: pointer
}

.bg-blue {
    color: #fff;
    background-color: #1A237E
}

@media screen and (max-width: 991px) {
    .logo {
        margin-left: 0px
    }

    .image {
        width: 300px;
        height: 220px
    }

    .border-line {
        border-right: none
    }

    .card2 {
        border-top: 1px solid #EEEEEE !important;
        margin: 0px 15px
    }
}
</style>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5  mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6 d-none d-sm-none d-lg-block">
                <div class="card1 pb-5">
                    
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img
                            src="<?=base_url('cssjs/images/login/logoletf.png')?>" class="img-fluid"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form method="post" action="<?=base_url('Control_login/validlogin');?>" class="my-login-validation"
                    novalidate="">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row mb-4 px-3">
                            <h6 class="mb-0 mr-4 mt-2"></h6>

                        </div>
                        <div class="row px-3 mb-4">
                            <div class="heading_main text_align_center">
                                <h2><span class="theme_color">เข้าใช้งานระบบ </span></h2>
                            </div>
                        </div>
                        <div class="row px-3">

                            <label class="mb-1" for="username">ชื่อผู้ใช้งาน (Email) </label>
                            <input class="mb-4" id="username" type="text" name="username" value="" required autofocus>
                            <div class="invalid-feedback">
                                กรอกอีเมล์
                            </div>
                        </div>
                        <div class="row px-3">

                            <label class="mb-1" for="password">รหัสผ่าน</label>
                            <input id="password" type="password"  name="password" required data-eye>
                            <div class="invalid-feedback">
                                กรอกรหัสผ่าน
                            </div>
                        </div>
                        <div class="row px-3 mb-4">

                        </div>
                        <div class="row mb-3 px-3">
                            <button type="submit" class="btn btn-blue text-center">Login</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

