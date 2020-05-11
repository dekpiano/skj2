<!-- Start Footer -->
<footer class="footer-box">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 white_fonts">
                <h4 class="text-align">Contact Us</h4>
            </div>
            <div class="margin-top_30 col-md-8 offset-md-2 white_fonts">
                <div class="row">
                    <div class="col-md-4">
                        <div class="full icon text_align_center">
                            <i class="fas fa-university fa-4x"></i>
                        </div>
                        <div class="full white_fonts text_align_center">
                            <p>160 เมืองนครสวรรค์
                                <br>นครสวรรค์</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="full icon text_align_center">
                            <i class="fas fa-envelope fa-4x"></i>
                        </div>
                        <div class="full white_fonts text_align_center">
                            <p>skj160@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="full icon text_align_center">
                            <i class="fas fa-phone-alt fa-4x"></i>
                        </div>
                        <div class="full white_fonts text_align_center">
                            <p> 056-255857</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row white_fonts margin-top_30">
            <div class="col-lg-12">
                <div class="full">
                    <div class="center">
                        <ul class="social_icon">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<div class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="crp">© 2020 SKJ . All Rights Reserved.</p>
                <!-- <ul class="bottom_menu">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Find jobs</a></li>
                        <li><a href="contact.html">Contact us</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul> -->
            </div>
        </div>
    </div>
</div>

<a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>

<!-- ALL JS FILES -->
<script src="<?=base_url()?>cssjs/js/jquery.min.js"></script>
<script src="<?=base_url()?>cssjs/js/popper.min.js"></script>
<script src="<?=base_url()?>cssjs/js/bootstrap.min.js"></script>
<!-- ALL PLUGINS -->
<script src="<?=base_url()?>cssjs/js/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>cssjs/js/jquery.pogo-slider.min.js"></script>
<script src="<?=base_url()?>cssjs/js/slider-index.js"></script>
<script src="<?=base_url()?>cssjs/js/smoothscroll.js"></script>
<script src="<?=base_url()?>cssjs/js/form-validator.min.js"></script>
<script src="<?=base_url()?>cssjs/js/contact-form-script.js"></script>
<script src="<?=base_url()?>cssjs/js/isotope.min.js"></script>
<script src="<?=base_url()?>cssjs/js/images-loded.min.js"></script>
<script src="<?=base_url()?>cssjs/js/custom.js"></script>

<script src="<?=base_url()?>cssjs/js/smartwizard/jquery.smartWizard.min.js"></script>

<script src="<?=base_url()?>asset/js/jquery.inputmask.min.js"></script>
<!-- Template Main JS File -->
<script src="<?=base_url()?>/asset/user/js/main.js?v=1000"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

</body>
<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $(":input").inputmask();

      // Step show event
      $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
               //alert("You are on step "+stepNumber+" now");
               if(stepPosition === 'first'){
                   $("#prev-btn").addClass('disabled');
               }else if(stepPosition === 'final'){
                   $("#next-btn").addClass('disabled');
               }else{
                   $("#prev-btn").removeClass('disabled');
                   $("#next-btn").removeClass('disabled');
               }
            });

            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finish')
                                             .addClass('btn btn-info')
                                             .on('click', function(){ alert('Finish Clicked'); });
            var btnCancel = $('<button></button>').text('Cancel')
                                             .addClass('btn btn-danger')
                                             .on('click', function(){ $('#smartwizard').smartWizard("reset"); });


            // Smart Wizard
            $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'dots',
                    transitionEffect:'fade',
                    showStepURLhash: true,
                    toolbarSettings: {
                                      showNextButton: false, // show/hide a Next button
                                      showPreviousButton: false, // show/hide a Previous button
                                    }
            });


            // External Button Events
            $("#reset-btn").on("click", function() {
                // Reset wizard
                $('#smartwizard').smartWizard("reset");
                return true;
            });

            $("#prev-btn").on("click", function() {
                // Navigate previous
                $('#smartwizard').smartWizard("prev");
                return true;
            });

            $("#next-btn").on("click", function() {
                // Navigate next
                $('#smartwizard').smartWizard("next");
                return true;
            });
    
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown("400");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp("400");
            $(this).toggleClass('open');
        }
    );

});

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';

      window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                      swal("แจ้งเตือน", "กรุณากรอกข้อมูลให้ครบ!", "warning")
                  }
                  form.classList.add('was-validated');

              }, false);
          });
      }, false);
    })();

</script>
<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#recruit_img").change(function() {
    readURL(this);
});
</script>

</html>
<?php $this->load->view('user/recruitstudent/alert_student.php') ?>