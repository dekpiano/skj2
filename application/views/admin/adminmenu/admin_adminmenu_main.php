
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">จัดการข้อมูล<?=$title;?></h1>
          </div>

           <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 ">
              <h6 class="m-0 font-weight-bold text-primary ">ตารางข้อมูล<?=$title;?> <a href="<?=base_url('admin/adminmenu/add');?>" class="btn btn-primary btn-sm float-right"> <i class="far fa-plus-square"></i> เพิ่ม<?=$title;?></a></h6>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>รหัส<?=$title;?></th>
                      <th>ชื่อ<?=$title;?></th>
                      <th>ลื้ง URL<?=$title;?></th>
                      <th>Sup <?=$title;?></th>
                      <th>กรุ๊ป<?=$title;?></th>
                      <th>คำสั่ง</th>
                    </tr>
                  </thead>    
                  <?php foreach ($Amenu as $key => $v_menu) : ?>             
                    <tr>
                      <td><?=$v_menu->Amenu_id;?></td>
                      <td><?=$v_menu->Amenu_name;?></td>
                      <td><?=$v_menu->Amenu_url;?></td>
                      <td><?=$v_menu->Amenu_submenu;?></td>
                      <td><?=$v_menu->Amenu_group;?></td>
                      <td>
                        <a  href="<?=base_url('admin/control_admin_adminmenu/edit_adminmenu/').$v_menu->Amenu_id;?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> แก้ไข</a>
                        <a  href="<?=base_url('admin/control_admin_adminmenu/delete_adminmenu/').$v_menu->Amenu_id;?>" class="btn btn-danger btn-sm" onClick="return confirm('ต้องการลบข้อมูลหรือไม่?')"><i class="fas fa-trash-alt"></i> ลบ</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

