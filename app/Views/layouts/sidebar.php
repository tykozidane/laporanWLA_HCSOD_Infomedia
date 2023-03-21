<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="../../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo" onError="this.onerror=null;this.src='../../../assets/img/logo-ct-dark.png';">
        <span class="ms-1 font-weight-bold">HC Applications</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
   <div class="collapse navbar-collapse ">
      <ul class="navbar-nav">
        <?php 
        $auth = service('authentication');
        $userId = $auth->id();
        $authorize = service('authorization');
        if($authorize->inGroup('hcsod', $userId) || $authorize->inGroup('admin', $userId)){
        ?>
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
        <?php } ?>
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
        <!-- <li class="nav-item">
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
        </li> -->
        <li class="nav-item">
          <a <a <?php 
          $path = current_url(true);
          $array = explode('/', ltrim($path, '/'));
          $cek=0;
          foreach($array as $x){
            if ($x == "storage") { 
              $cek = 1;
          ?> 
         class="nav-link active" 
    <?php  } } if($cek==0) {?>
      class="nav-link"
    <?php }?> href="<?= base_url('storage') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <img src="../../assets/img/icons/downloads/hosting.png" width="15px" height="15px" alt="main_logo">
            </div>
            <span class="nav-link-text ms-1">Storage</span>
          </a>
        </li>
        <li class="nav-item">
          <a <a <?php 
          $path = current_url(true);
          $array = explode('/', ltrim($path, '/'));
          $cek=0;
          foreach($array as $x){
            if ($x == "themplate") { 
              $cek = 1;
          ?> 
         class="nav-link active" 
    <?php  } } if($cek==0) {?>
      class="nav-link"
    <?php }?> href="<?= base_url('themplate') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <img src="../../assets/img/icons/downloads/hosting.png" width="15px" height="15px" alt="main_logo">
            </div>
            <span class="nav-link-text ms-1">Themplate</span>
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"/></svg>
            </div>
            <span class="text-danger">Sign Out</span>
          </a>
        </li>
       </ul>
    </div>
  </aside>