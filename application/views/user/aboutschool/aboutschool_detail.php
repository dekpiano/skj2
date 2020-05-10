<section id="breadcrumbs" class="breadcrumbs" style="background: #e9ebee;">
		
		<div class="container ">
<div class="row">
<div class="col-lg-8">
	<div class="card border-5 shadow mb-4">
	 	<div class="card-body">
			<h5 class="m-0"><?=$about[0]->about_menu;?></h5>
			<hr>
			<?=$about[0]->about_detail;?>
		</div>
	</div>
</div>
<div class="col-lg-4">

<div class="card border-2 shadow mb-4">
	 <div class="card-body">
	 	<h5 class="mb-0">เกี่ยวกับโรงเรียน</h5>
	 	<br>
	 	<?php foreach ($Allabout as $key => $v_Allabout) : ?>
		<div class="d-flex justify-content-between small">
			<a href="<?=base_url('AboutSchool/').$v_Allabout->about_id;?>" style="">
			<h6 class="font-weight-bold"><?=$v_Allabout->about_menu;?></h6>
			</a>
		</div>
		<hr class="my-0 mb-2">
		<?php endforeach; ?>
	
	</div>
</div>


</div>
</div>
</div>

</section>
