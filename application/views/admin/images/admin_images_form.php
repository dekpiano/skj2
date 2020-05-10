

        <!-- Begin Page Content -->
        <div class="container-fluid">     
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo end($breadcrumbs);?></h1>            
          </div>

           <!-- DataTales Example -->
          <div class="row justify-content-lg">
            <div class="col-12">
               <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <?php foreach ($breadcrumbs as $key=>$value) : 
                      if($key != '#') :
                    ?>
                  <li class="breadcrumb-item"><a href="<?php echo $key; ?>"><?php echo $value; ?></a></li>
                <?php else: ?>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $value; ?></li>
                <?php 
                    endif;
                    endforeach; 
                ?>
                </ol>
              </nav>
              <div class="card shadow mb-4 ">
                <div class="card-header py-3 bg-<?=$color?>">
                  <h6 class="m-0 font-weight-bold  text-white "><?=$icon?> <?php echo end($breadcrumbs);?> </h6>              
                </div>

                <div class="card-body"> 
                    
                    <form action="<?=base_url('admin/control_admin_images/').$action;?>" method="post">
                      <div class="form-group row">
                        <label for="img_id" class="col-sm-2 col-form-label">รหัส<?=$title;?></label>
                        <div class="col-sm-10">
                          <input type="text" readonly  class="form-control" id="img_id" name="img_id" value="<?=$action == 'insert_images' ? $images : $img[0]->img_id;?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="img_title" class="col-sm-2 col-form-label">ชื่อ<?=$title;?></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="img_title" name="img_title" value="<?=$action == 'insert_images' ? '' : $img[0]->img_title;?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="img_link" class="col-sm-2 col-form-label">ลิ้งเว็บไซต์</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="img_link" name="img_link" value="<?=$action == 'insert_images' ? '' : $img[0]->img_link;?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="img_mainpic" class="col-sm-2 col-form-label">ลิ้งภาพหลัก (ไว้โชว์หน้าเว็บ)</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="img_mainpic" name="img_mainpic" value="<?=$action == 'insert_images' ? '' : $img[0]->img_mainpic;?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="img_date" class="col-sm-2 col-form-label">วันที่กิจกรรม</label>
                        <div class="col-sm-2">
                          <input type="date" class="form-control" id="img_date" name="img_date" value="<?=$action == 'insert_images' ? '' : $img[0]->img_date;?>" required>
                        </div>
                      </div>
                       <div class="form-group row">
                        <label for="banner_namethai" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-lg btn-<?=$color?>  btn-block"><?=$icon?> <?php echo end($breadcrumbs);?></button>
                        </div>
                      </div>
                    </form>

                </div>
              </div>
            </div>
            
          </div>
          

        

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

