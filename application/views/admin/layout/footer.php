      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ออกจากระบบ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">ต้องการออกจากระบบหรือไม่ !</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=base_url('control_login/logout');?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url();?>asset/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url();?>asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url();?>asset/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url();?>asset/js/sb-admin-2.min.js"></script>

  <script src="<?=base_url();?>asset/js/jquery-ui.js?v=1000"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url();?>asset/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url();?>asset/js/demo/chart-area-demo.js"></script>
  <script src="<?=base_url();?>asset/js/demo/chart-pie-demo.js"></script>

<!-- Page level plugins -->
  <script src="<?=base_url();?>asset/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url();?>asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?=base_url();?>asset/vendor/datatables/dataTables.buttons.min.js"></script>
  <script src="<?=base_url();?>asset/vendor/datatables/jszip.min.js"></script>
  <script src="<?=base_url();?>asset/vendor/datatables/pdfmake.min.js"></script>
  <script src="<?=base_url();?>asset/vendor/datatables/vfs_fonts.js"></script>
  <script src="<?=base_url();?>asset/vendor/datatables/buttons.html5.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="<?=base_url();?>asset/js/demo/datatables-demo.js?v=1000"></script>
  <script src="<?=base_url()?>asset/js/jquery.inputmask.min.js"></script>
  <script src="<?=base_url();?>asset/vendor/sweetalert.min.js"></script>

 <script src="https://cdn.tiny.cloud/1/y6b2omlkddg6mbwjuwhrf96ufg0wjfhrf5xw1xes3o6oahi4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<?php $this->load->view('admin/recruitstudent/chart/report_bar.php'); ?>
</body>
<script type="text/javascript">
  $(document).ready(function() {
    $(":input").inputmask();  
    $( ".sidebar" ).sortable();
    $( ".sidebar" ).disableSelection();
    
    $( "#pers_britday" ).datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
      currentText: "วันนี้", // Display text for current month link
      monthNames: ["มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน",
        "กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"], // Names of months for drop-down and formatting
      monthNamesShort: ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."], // For formatting
      dayNames: ["อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์"], // For formatting
      dayNamesShort: ["อา.","จ.","อ.","พ.","พฤ.","ศ.","ส."], // For formatting
      dayNamesMin: ["อ","จ","อ","พ","พ","ศ","ส"],
      yearRange: "1500:2100",
      yearTh:true,
        beforeShow:function(){
            if($(this).val()!=""){
                var arrayDate=$(this).val().split("-");
                arrayDate[2]=parseInt(arrayDate[2])-543;
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
            }
            setTimeout(function(){
                $.each($(".ui-datepicker-year option"),function(j,k){
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
                    $(".ui-datepicker-year option").eq(j).text(textYear);
                });
            },50);
        },
        onChangeMonthYear: function(){
            setTimeout(function(){
                $.each($(".ui-datepicker-year option"),function(j,k){
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
                    $(".ui-datepicker-year option").eq(j).text(textYear);
                });
            },50);
        },
        onClose:function(){
            if($(this).val()!="" && $(this).val()==dateBefore){
                var arrayDate=dateBefore.split("-");
                arrayDate[2]=parseInt(arrayDate[2])+543;
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
            }
        },
        onSelect: function(dateText, inst){
            dateBefore=$(this).val();
            var arrayDate=dateText.split("-");
            arrayDate[2]=parseInt(arrayDate[2])+543;
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
        }

    });   
 

      tinymce.init({
        selector: 'textarea',
    height: 500,
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'table emoticons template paste help'
    ],
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist outdent indent | link image | print preview media fullpage | ' +
      'forecolor backcolor emoticons | help',
    menu: {
      favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
    },
    menubar: 'favs file edit view insert format tools table help',
    content_css: 'css/content.css',

  // enable title field in the Image dialog
  image_title: true, 
  // enable automatic uploads of images represented by blob or data URIs
  automatic_uploads: true,
  // add custom filepicker only to Image dialog
  file_picker_types: 'image',
  file_picker_callback: function(cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.onchange = function() {
      var file = this.files[0];
      var reader = new FileReader();
      
      reader.onload = function () {
        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        // call the callback and populate the Title field with the file name
        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };
    
    input.click();
  }
      });
  });
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

      $("#banner_img").change(function() {
        readURL(this);
      });

  </script> 


<?php if($this->session->flashdata('msg') == 'ok'): ?>
<script type="text/javascript">
  swal("สำเร็จ!", "<?=$this->session->flashdata('messge')?>", "success");
</script>
<?php endif; ?> 
<?php if($this->session->flashdata('msg_uploadfile') == 'on'): ?>
<script type="text/javascript">
  swal("ผิดพลาด!", "<?=$this->session->flashdata('messge')?>", "error");
</script>
<?php endif; ?>
</html>

<script>
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
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
