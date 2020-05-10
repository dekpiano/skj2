 <!-- Start Banner -->
 <div class="ulockd-home-slider">
     <div class="container-fluid">
         <div class="row">
             <div class="pogoSlider" id="js-main-slider">
                 <?php foreach ($banner as $key => $v_banner) :?>
					<div class="pogoSlider-slide" style="background-image:url(<?=base_url()?>uploads/banner/<?=$v_banner->banner_img;?>);">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<!-- <div class="slide_text">
										<h3><span class="theme_color">EASILY</span> CREATE ONLINE</h3>
										<br>
										<h4>CV AND PROFESSIONAL<br>RESUME IN MINUTES</h4>
										<br>
										<p>Showcase your Profile to the world
											<br>using online CV builder and Get Hired Faster</p>
										<a class="contact_bt" href="#">Contact us</a>
									</div> -->
								</div>
							</div>
						</div>
					</div>
                 <?php endforeach; ?>
             </div>
             <!-- .pogoSlider -->
         </div>
     </div>
 </div>
 <!-- End Banner -->
