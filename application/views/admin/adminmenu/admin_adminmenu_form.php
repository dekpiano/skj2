

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
                    
                    <form action="<?=base_url('admin/control_admin_adminmenu/').$action;?>" method="post">
                      <div class="form-group row">
                        <label for="Amenu_id" class="col-sm-2 col-form-label">รหัส<?=$title;?></label>
                        <div class="col-sm-10">
                          <input type="text" readonly  class="form-control" id="Amenu_id" name="Amenu_id" value="<?=$action == 'insert_adminmenu' ? $adminmenu : $Amenu[0]->Amenu_id;?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Amenu_name" class="col-sm-2 col-form-label">ชื่อ<?=$title;?></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Amenu_name" name="Amenu_name" value="<?=$action == 'insert_adminmenu' ? '' : $Amenu[0]->Amenu_name;?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Amenu_url" class="col-sm-2 col-form-label">ลิ้ง URL <?=$title;?></label>
                        <div class="col-sm-10">
                          <input placeholder="กรณีมี Sub เมนู กรอกเครื่องหมาย #" type="text" class="form-control" id="Amenu_url" name="Amenu_url" value="<?=$action == 'insert_adminmenu' ? '' : $Amenu[0]->Amenu_url;?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="banner_namethai" class="col-sm-2 col-form-label">กรุ๊ป <?=$title;?></label>
                        <div class="col-sm-10">
                          <select class="form-control" id="Amenu_group" name="Amenu_group">
                            <option value="">เลือก</option>
                             <?php $amenu = array('เมนูหลัก','ข้อมูลเบื้องต้น','ข้อมูลระบบ','ระบบโรงเรียน');
                             foreach ($amenu as $key => $v_amenu): ?>
                                <option <?=$Amenu[0]->Amenu_group == $key && $action != 'insert_adminmenu' ? 'selected' : '' ?> value="<?=$key?>"><?=$v_amenu?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="banner_namethai" class="col-sm-2 col-form-label">sub <?=$title;?></label>
                        <div class="col-sm-10">
                          <select class="form-control" id="Amenu_submenu" name="Amenu_submenu">
                            <option value="">กรณีไม่เป็น Sup เมนูไม่ต้องเลือก...</option>
                             <?php foreach (($action == 'insert_adminmenu' ? $Amenu : $AmenuAll) as $key => $v_Amenu): ?>
                                <option  <?=$Amenu[0]->Amenu_submenu == $v_Amenu->Amenu_id && $action != 'insert_adminmenu' ? 'selected' : '' ?> value="<?=$v_Amenu->Amenu_id?>"><?=$v_Amenu->Amenu_name?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="banner_namethai" class="col-sm-2 col-form-label">สิทธิ์การใช้งาน <?=$title;?></label>
                        <div class="col-sm-10">
                          <?php foreach ($work as $key => $v_work):    

                              $w = @explode("|",$Amenu[0]->Amenu_permission);
                          ?>
                        <div class="custom-control custom-checkbox">
                          <?php if($action == 'insert_personnel'):?>
                            <input type="checkbox" class="custom-control-input" id="Amenu_permission<?=$key?>" name="Amenu_permission[]" value="<?=$v_work->work_id;?>" >
                          <?php else : ?>
                            <input type="checkbox" class="custom-control-input" id="Amenu_permission<?=$key?>" name="Amenu_permission[]" value="<?=$v_work->work_id;?>"  <?=in_array($v_work->work_id,$w) ? 'checked' : '';?>>
                          <?php endif; ?>                          
                          <label class="custom-control-label" for="Amenu_permission<?=$key?>"><?=$v_work->work_name?></label>
                        </div>
                        <?php endforeach; ?>
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

