
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">จัดการข้อมูล<?=$title;?></h1>
          </div>

           <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 ">
              <h6 class="m-0 font-weight-bold text-primary ">ตารางข้อมูล<?=$title;?> <a href="<?=base_url('admin/aboutschool/add');?>" class="btn btn-primary btn-sm float-right"> <i class="far fa-plus-square"></i> เพิ่ม<?=$title;?></a></h6>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">

              <table class="table table-bordered" id="dataTable_aboutschool" width="100%" cellspacing="0">
                  <thead>
                    <tr>                     
                      <th>ชื่อเรื่อง</th>
                      <th>วันที่ลง</th>
                      <th>คำสั่ง</th>
                    </tr>
                  </thead>    
                  <?php foreach ($aboutschool as $key => $v_aboutschool) : ?>             
                    <tr>                      
                      <td><?=$v_aboutschool->about_menu;?></td>
                      <td><?=$v_aboutschool->about_date;?></td>
                      <td>
                        <a  href="<?=base_url('admin/control_admin_aboutschool/edit_aboutschool/').$v_aboutschool->about_id;?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> แก้ไข</a>
                        <a  href="<?=base_url('admin/control_admin_aboutschool/delete_aboutschool/').$v_aboutschool->about_id;?>" class="btn btn-danger btn-sm" onClick="return confirm('ต้องการลบข้อมูลหรือไม่?')"><i class="fas fa-trash-alt"></i> ลบ</a>
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

