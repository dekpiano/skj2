
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">จัดการข้อมูล<?=$title;?></h1>
          </div>

           <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 ">
              <h6 class="m-0 font-weight-bold text-primary ">ตารางข้อมูล<?=$title;?> <a href="<?=base_url('admin/personnel/add');?>" class="btn btn-primary btn-sm float-right"> <i class="far fa-plus-square"></i> เพิ่ม<?=$title;?></a></h6>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">

              <table class="table table-bordered" id="dataTable_personnel" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>รูป</th>
                      <th>ชื่อ - นามสกุล<?=$title;?></th>
                      <th>ตำแหน่ง</th>
                      <th>กลุ่มสาระ</th>
                      <th>Email</th>
                      <th>เบอร์โทรศัพท์</th>
                      <th>คำสั่ง</th>
                    </tr>
                  </thead>    
                  <?php foreach ($pers as $key => $v_personnel) : ?>             
                    <tr>
                      <td><img style="width: 100px;" src="<?=base_url()?>uploads/personnel/<?=$v_personnel->pers_img;?>" class="img-fluid" alt="Responsive image"></td>
                      <td><?=$v_personnel->pers_prefix.$v_personnel->pers_firstname.' '.$v_personnel->pers_lastname;?></td>
                      <td><?=$v_personnel->pers_position;?></td>
                      <td><?=$v_personnel->pers_learning;?></td>
                      <td><?=$v_personnel->pers_username;?></td>
                      <td><?=$v_personnel->pers_phone;?></td>
                      <td>
                        <a  href="<?=base_url('admin/control_admin_personnel/edit_personnel/').$v_personnel->pers_id;?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> แก้ไข</a>
                        <a  href="<?=base_url('admin/control_admin_personnel/delete_personnel/').$v_personnel->pers_id.'/'.$v_personnel->pers_img;?>" class="btn btn-danger btn-sm" onClick="return confirm('ต้องการลบข้อมูลหรือไม่?')"><i class="fas fa-trash-alt"></i> ลบ</a>
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

