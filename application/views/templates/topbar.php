  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <style>
    .bg-white1{
      background-color: #36b9cc!important;
    }
    .bg-white2{
      background-color: #e74a3b!important;;
    }
    .bg-white3{
      background-color: #5a5c69!important;
    }
    </style>
    <?php
    $role_id = $this->session->userdata('role_id');
    if ($role_id == 1) {
    echo "<nav class='navbar navbar-expand navbar-light bg-white1 topbar mb-4 static-top shadow'>";
    }else if ($role_id == 3) {
    echo "<nav class='navbar navbar-expand navbar-light bg-white2 topbar mb-4 static-top shadow'>";
    }else{
    ?>
    <!-- Sidebar bg-gradient-dark -->
    <nav class="navbar navbar-expand navbar-light bg-white3 topbar mb-4 static-top shadow">
    <?php    
    }
    ?>  
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

   

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto"> 
      <!-- Nav Item - Alerts -->
     

          <?php
          if ($user['role_id']=='2'){
            $d='1';
          }else{
            $d ='0';
          }
          ?>
        
       
         

 <!-- Nav Item - Messages -->
 <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-warning badge-counter">&nbsp;</span>
              </a>
              
             <!-- Dropdown - Messages -->
             <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header"> Notifikasi </h6>
                  <?php if($user['role_id']=='2'){?>
                    <?php foreach ($list as $r) : ?>
                    <?php $s= substr($r['nik'],5,8); ?>
                    <?php if($s == $user['id'] AND $r['detect'] != 2){?>
                 <a class="dropdown-item d-flex align-items-center" href="">
                  <div class="dropdown-list-image mr-3">
                  <div class="mr-3"> 
              <div class="icon-circle bg-primary">
                <i class="fas fa-file-alt text-white"></i>
              </div>
            </div>  <!-- <form>
                      <input class="status-indicator bg-success" type="checkbox" value="1" name="is_active" id="is_active" checked="">
                      </form> -->
                       </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?= substr($r['description'],0,20).'...'; ?></div>
                    <div class="small text-gray-500"><?= $r['name']; ?> &nbsp;<h7 class="small text-gray-500">
                    <?= date('d/m/Y',strtotime($r['date_problem'])); ?>|&nbsp;|<?= $r['time']; ?></h7>
                    <f class="small text-700" style="color:red"><?= $r['respont']; ?></f>
                    </div>
                  </div>
                </a>
                <?php } ?>
                <?php endforeach; ?>
                <a class="dropdown-item text-center small text-gray-500" href=" <?=base_url('order/list');?>">Read More Notifikasi</a>
              <?php
            } else { ?>
                   <?php foreach ($list as $r) : ?>
                   <?php if($r['detect'] == 0): ?>
            <a class="dropdown-item d-flex align-items-center"<?php if($user['role_id']=='3'){?> href="<?=base_url('request/detail/'.$r['id']);?>"<?php }?>>
                  <div class="dropdown-list-image mr-3">
                  <div class="mr-3"> 
              <div class="icon-circle bg-primary">
                <i class="fas fa-file-alt text-white"></i>
              </div>
            </div>  <!-- <form>
                      <input class="status-indicator bg-success" type="checkbox" value="1" name="is_active" id="is_active" checked="">
                      </form> -->
                       </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?= substr($r['description'],0,20).'...'; ?></div>
                    <div class="small text-gray-500"><?= $r['name']; ?> &nbsp;<h7 class="small text-gray-500">
                    <?= date('d/m/Y',strtotime($r['date_problem'])); ?>|&nbsp;|<?= $r['time']; ?></h7>
                    <f class="small text-700" style="color:red"><?= $r['respont']; ?></f>
                    </div>
                  </div>
                </a>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php if($user['role_id']=='3'){?> <a class="dropdown-item text-center small text-gray-500" href="<?=base_url('request');?>">Read More Notifikasi</a>
              <?php }} ?>
              </div>
            </li>

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name'] ; ?></span>
          <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/').$user['image'] ?>">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?= base_url('user');?>">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= $user['name'] ; ?>
          </a>
          <!-- <a class="dropdown-item" href="#">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            <input type="button" value="Reload Page" onClick="document.location.reload(true)">  
          </a> -->
          <!-- <a class="dropdown-item" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            Activity Log
          </a> -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>

    </ul>

  </nav>
  <!-- End of Topbar -->
