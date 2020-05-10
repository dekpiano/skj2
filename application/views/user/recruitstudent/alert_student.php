
<?php  if($this->session->flashdata('msg') == 'NO' ):?>
<script type="text/javascript">
  $( document ).ready(function() {
    
	  $('#myModal').modal('show');
	});
</script>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">แจ้งเตือน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <?php if($this->session->flashdata('messge') == 'แก้ไขข้อมูลสำเร็จ') : ?>
        <img src="<?=base_url();?>asset/img/check/checkmark.gif">
        <?php else: ?>
        <img src="<?=base_url();?>asset/img/check/alert-sign.gif">
        <?php endif; ?>
        <p class="h2"><?=$this->session->flashdata('messge');?></p>
        
      </div>   
    </div>
  </div>
</div>
