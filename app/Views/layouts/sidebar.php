<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="../../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">HC Applications</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
   <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a <a <?php 
          $path = current_url(true);
          $array = explode('/', ltrim($path, '/'));
          $cek=0;
          foreach($array as $x){
            if ($x == "wla") { 
              $cek = 1;
          ?> 
         class="nav-link active" 
    <?php  } } if($cek==0) {?>
      class="nav-link"
    <?php }?> href="<?= base_url('wla/dataemployee') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">WLA - Workload Analysis</span>
          </a>
        </li>
        <li class="nav-item">
          <a <?php 
          $path = current_url(true);
          $array = explode('/', ltrim($path, '/'));
          $cek=0;
          foreach($array as $x){
            if ($x == "events") { 
              $cek = 1;
          ?> 
         class="nav-link active" 
    <?php  } } if($cek==0) {?>
      class="nav-link"
    <?php }?>  href="<?= base_url('events') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Event</span>
          </a>
        </li>
        <li class="nav-item">
          <a <a <?php 
          $path = current_url(true);
          $array = explode('/', ltrim($path, '/'));
          $cek=0;
          foreach($array as $x){
            if ($x == "employee") { 
              $cek = 1;
          ?> 
         class="nav-link active" 
    <?php  } } if($cek==0) {?>
      class="nav-link"
    <?php }?> href="<?= base_url('employee/listemployee') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Master Employee </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Culture Alignment</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-paper-diploma text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Learning And Development</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">HC Information</span>
          </a>
        </li>
       </ul>
    </div>
   
  </aside>