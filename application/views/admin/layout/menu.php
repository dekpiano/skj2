<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('admin')?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ระบบจัดการสารสนเทศ  </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="<?=base_url('admin')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider">
      <?php $status = $this->session->userdata('status')?>

      <?php   $ar = array('เมนูหลัก','ข้อมูลเบื้องต้น','ข้อมูลระบบ','ระบบโรงเรียน');
      foreach ($ar as $k_value => $value) :  ?>

          <div class="sidebar-heading"><?=$value;?></div>
          
      <?php  foreach ($menu as $k_menu => $v_menu) :
                if($v_menu->Amenu_group == $k_value && $v_menu->Amenu_submenu == ''): 
                      $permi_menu = @explode("|",$v_menu->Amenu_permission);
                      $permi_user = @explode("|",$this->session->userdata('permission_menu'));
                  
                  if($v_menu->Amenu_url != '#' ):  
                       foreach ($permi_menu as $key => $v_permi):
                          if(in_array($v_permi,$permi_user)  || $status =='admin'):
      ?>            
                           <li class="nav-item ">
                              <a class="nav-link collapsed" href="<?=base_url($v_menu->Amenu_url);?>">
                                <i class="fas fa-fw fa-cog"></i>
                                <span><?=$v_menu->Amenu_name?></span> 
                              </a>        
                            </li>
                  <?php endif; ?> 
                <?php  endforeach; ?>
          <?php else: ?>
                  <?php 
                      foreach ($permi_menu as $key => $v_permi):
                          if(in_array($v_permi,$permi_user)  || $status =='admin'):
                  ?>
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages<?=$k_menu?>" aria-expanded="true" aria-controls="collapsePages<?=$k_menu?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span><?=$v_menu->Amenu_name?></span> 
                      </a>
                      <div id="collapsePages<?=$k_menu?>" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                          <?php foreach ($menu as $k_menusub => $v_menusub) : 
                                  if($v_menusub->Amenu_submenu == $v_menu->Amenu_id):?>
                            <a class="collapse-item" href="<?=base_url($v_menusub->Amenu_url);?>"><?=$v_menusub->Amenu_name;?></a>
                            <?php endif; ?>  
                          <?php endforeach; ?>             
                        </div>
                      </div>
                    </li>
                    <?php endif; ?> 
                <?php  endforeach; ?> 
          <?php endif;
              endif;
            endforeach;?>
             <hr class="sidebar-divider">
          <?php endforeach; 
          ?>



      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>