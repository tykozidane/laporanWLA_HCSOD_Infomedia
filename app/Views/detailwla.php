<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Workload Analysis Table
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
<div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">HC Applications</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
   <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('employee') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">WLA - Workload Analysis</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('events') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Event</span>
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
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2 mt-n11">
      <div class="container-fluid py-1">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="text-white opacity-5" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Profile</li>
          </ol>
          <h6 class="text-white font-weight-bolder ms-2">Profile</h6>
        </nav>
        <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                  </div>
                </a>
              </a>
            </li>
           
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="card shadow-lg mx-4 card-profile-bottom" >
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
           <!-- <img src="../assets/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm"> -->
           </div>
          </div>
          <?php 
      foreach($datapegawai as $pegawai){?>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
              <?php echo $pegawai['nama']?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
              <?php echo $pegawai['dept']?>
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                    <a href="<?= base_url('/employee/') ?>" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Back</a>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/printwla/').'/'.$pegawai['nik'] ?>" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Print</a>
                  </a>
                </li>
               </ul>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex justify-content-between">
                <h1 class="mb-0">Workload Analysis</h1>
    
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Detail Information Workload Analysis</p>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0" style="overflow-y: scroll; height:350px;">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ACTIVITIES</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">DETAIL ACTIVITIES</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">AVERAGE TIME (Hours)</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">JOB RELEVANCE</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type of Work</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Duration</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                foreach ($datalaporan as $datanya) {
                ?>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                            
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm"><?php echo $datanya['activity'] ?></h6>
                              </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0"><?php echo $datanya['detail'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <p class="text-xs text-secondary mb-0"><?php echo $datanya['average_time'] ?></p>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-xs text-secondary mb-0"><?php echo $datanya['cat_wla'] ?></span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <p class="text-xs text-secondary mb-0"><?php echo $datanya['type_wla'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <p class="text-xs text-secondary mb-0"><?php echo $datanya['durasi'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <p class="text-xs text-secondary mb-0"><?php echo $datanya['quantity'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <p class="text-xs text-secondary mb-0"><?php echo $datanya['keterangan'] ?></p>
                        </td>
                      </tr>
                      <?php }  ?>
                      
                     
                    </tbody>
                  </table>
                </div>
              </div>


              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                   
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                   
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
             
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                  
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                  
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    
                  </div>
                </div>
               
              </div>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile">
            <img src="../assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-4 col-lg-4 order-lg-2">
                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                  
                  </a>
                </div>
              </div>
            </div>
            <div class="text-center mt-4">
            <h5>
              Sum of Summary<span class="font-weight-light">, Workload Analysis</span>
            </h5>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                      
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Periode:</p>
                          <h6 class="text-sm mb-0">Daily</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Primary:</p>
                        <h6 class="text-sm mb-0"><?php echo $counting['bkpdailyp']+$counting['bkpdaily'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Supportive:</p>
                        <h6 class="text-sm mb-0"><?php echo $counting['bksdailyp']+$counting['bksdaily'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Outside the Job:</p>
                        <h6 class="text-sm mb-0"><?php echo $counting['bkodailyp']+$counting['bkodaily'] ?></h6>
                      </div>
                    </td>
                    
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                      
                        <div class="ms-4">
                          <h6 class="text-sm mb-0">Weekly</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        
                        <h6 class="text-sm mb-0"> <?php echo $counting['bkpweeklyp']+$counting['bkpweekly'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bksweeklyp']+$counting['bksweekly'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bkoweeklyp']+$counting['bkoweekly'] ?></h6>
                      </div>
                    </td>
                   
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                      
                        <div class="ms-4">
                          <h6 class="text-sm mb-0">Monthly</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bkpmonthlyp']+$counting['bkpmonthly'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bksmonthlyp']+$counting['bksmonthly'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bkomonthlyp']+$counting['bkomonthly'] ?></h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                      
                        <div class="ms-4">
                          <h6 class="text-sm mb-0">Yearly</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bkpyearlyp']+$counting['bkpyearly'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bksyearlyp']+$counting['bksyearly'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bkoyearlyp']+$counting['bkoyearly'] ?></h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                      
                        <div class="ms-4">
                          <h6 class="text-sm mb-0">Average Workload</h6>
                        </div>
                      </div>
                    </td>
                    <td colspan="3">
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo ($nonprojectaverage+$projectaverage)/2 ?></h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                      
                        <div class="ms-4">
                          
                          <h6 class="text-sm mb-0">Sum of FTE</h6>
                        </div>
                      </div>
                    </td>
                    <td colspan="3">
                      <div class="text-center">
                     
                        <h6 class="text-sm mb-0"><?php echo $fte ?></h6>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-lg-6 mb-lg-0 mb-2">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Type of Work : Non Project (Rutin)</h6>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                       
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Periode:</p>
                          <h6 class="text-sm mb-0">Daily</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Primary:</p>
                        <h6 class="text-sm mb-0"><?php echo $counting['bkpdaily'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Supportive:</p>
                        <h6 class="text-sm mb-0"><?php echo $counting['bksdaily'] ?></h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <p class="text-xs font-weight-bold mb-0">Outside the Job:</p>
                        <h6 class="text-sm mb-0"><?php echo $counting['bkodaily'] ?></h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                       
                        <div class="ms-4">
                         <h6 class="text-sm mb-0">Weekly</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                       <h6 class="text-sm mb-0"> <?php echo $counting['bkpweekly'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bksweekly'] ?></h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bkoweekly'] ?></h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                        <h6 class="text-sm mb-0">Monthly</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                      <h6 class="text-sm mb-0"><?php echo $counting['bkpmonthly'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bksmonthly'] ?></h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bkomonthly'] ?></h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                          <h6 class="text-sm mb-0">Yearly</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bkpyearly'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bksyearly'] ?></h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bkoyearly'] ?></h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                          <h6 class="text-sm mb-0">Average Workload</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo ($counting['bkpdaily']+$counting['bkpweekly']+ $counting['bkpmonthly']+$counting['bkpyearly'])/4 ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo ($counting['bksdaily']+$counting['bksweekly']+ $counting['bksmonthly']+$counting['bksyearly'])/4 ?></h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <h6 class="text-sm mb-0"><?php echo ($counting['bkodaily']+$counting['bkoweekly']+ $counting['bkomonthly']+$counting['bkoyearly'])/4 ?></h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                          <h6 class="text-sm mb-0">Non Project Average Workload</h6>
                        </div>
                      </div>
                    </td>
                    <td colspan="3">
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $nonprojectaverage ?></h6>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          
        </div>
        <div class="col-lg-6">
          <div class="col-lg-19 mb-lg-0 mb-2">
            <div class="card ">
              <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
           
              <h6 class="mb-2">Type of Work : Project (Non Rutin)</h6>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Periode:</p>
                          <h6 class="text-sm mb-0">Daily</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Primary:</p>
                        <h6 class="text-sm mb-0"><?php echo $counting['bkpdailyp'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Supportive:</p>
                        <h6 class="text-sm mb-0"><?php echo $counting['bksdailyp'] ?></h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <p class="text-xs font-weight-bold mb-0">Outside the Job:</p>
                        <h6 class="text-sm mb-0"><?php echo $counting['bkodailyp'] ?></h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                       
                        <div class="ms-4">
                          <h6 class="text-sm mb-0">Weekly</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bkpweeklyp'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bksweeklyp'] ?></h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                       <h6 class="text-sm mb-0"><?php echo $counting['bkoweeklyp'] ?></h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                           <h6 class="text-sm mb-0">Monthly</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bkpmonthlyp'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                       <h6 class="text-sm mb-0"><?php echo $counting['bksmonthlyp'] ?></h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                         <h6 class="text-sm mb-0"><?php echo $counting['bkomonthlyp'] ?></h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                         <h6 class="text-sm mb-0">Yearly</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                         <h6 class="text-sm mb-0"><?php echo $counting['bkpyearlyp'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bksyearlyp'] ?></h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <h6 class="text-sm mb-0"><?php echo $counting['bkoyearlyp'] ?></h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                         <h6 class="text-sm mb-0">Average Workload</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                         <h6 class="text-sm mb-0"><?php echo ($counting['bkpdailyp']+$counting['bkpweeklyp']+ $counting['bkpmonthlyp']+$counting['bkpyearlyp'])/4 ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <h6 class="text-sm mb-0"><?php echo ($counting['bksdailyp']+$counting['bksweeklyp']+ $counting['bksmonthlyp']+$counting['bksyearlyp'])/4 ?></h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <h6 class="text-sm mb-0"><?php echo ($counting['bkodailyp']+$counting['bkoweeklyp']+ $counting['bkomonthlyp']+$counting['bkoyearlyp'])/4 ?></h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                         <h4 class="text-sm mb-0">Non Project Average Workload</h4>
                        </div>
                      </div>
                    </td>
                    <td colspan="3">
                      <div class="text-center">
                         <h6 class="text-sm mb-0"><?php echo $projectaverage ?></h6>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                by
                <a href="#" class="font-weight-bold" target="_blank">HC Strategy & Organization Development</a>
                for a better HC Technology.
              </div>
            </div>
           
          </div>
        </div>
      </footer>
    </div>
  </div>
 
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>