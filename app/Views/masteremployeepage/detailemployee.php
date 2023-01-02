<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <title>
    HC Applications
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
   
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <?= $this->include('layouts/sidebar') ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Employee</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">List</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
          
            </div>
          </div>
          
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
              <h6>Detail Employee </h6>
              <button class="btn btn-primary btn-sm ms-auto"><a href="<?= base_url('employee').'/editdetailpage'.'/'.$dataemployee['id'] ?>">Edit detail</a></button>
            </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Kategori </h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col m-auto">
                    <h5> <?= $dataemployee['sub_kategori']?> </h5>
                </div>
              </div>  
            <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Nama </h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col m-auto">
                    <h5> <?= $dataemployee['nama_emp']?> </h5>
                </div>
              </div>
    
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>jenis Kelamin</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['jenis_kelamin']?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Agama</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['agama']?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Status</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['status'] ?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Email</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['email'] ?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>No. Handphone</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['phone_number'] ?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Pendidikan</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['pendidikan']?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Tanggal Lahir </h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col m-auto">
                    <h5> <?= $dataemployee['birth_date']?> </h5>
                </div>
              </div>  
            <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Usia </h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col m-auto">
                    <h5> <?= $dataemployee['usia']?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Range Age </h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col m-auto">
                    <h5> 
                      <?php 
                      if($dataemployee['usia'] < 25 ){echo 'Usia <25';}
                      else if($dataemployee['usia'] < 30 ){echo 'Usia 25-29';}
                      else if($dataemployee['usia'] <= 40 ){echo 'Usia 30-40';}
                      else if($dataemployee['usia'] <= 50 ){echo 'Usia 41-50';}
                      else if($dataemployee['usia'] <=55 ){echo 'Usia 51-55';}
                      else if($dataemployee['usia'] < 70 ){echo 'Usia diatas 55';}
                      ?> 
                  </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Range Age 2 </h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col m-auto">
                    <h5> 
                    <?php 
                      if($dataemployee['usia'] < 25 ){echo 'Usia <25';}
                      else if($dataemployee['usia'] < 30 ){echo 'Usia 25-29';}
                      else if($dataemployee['usia'] <= 40 ){echo 'Usia 30-40';}
                      else if($dataemployee['usia'] <= 50 ){echo 'Usia 41-50';}
                      else if($dataemployee['usia'] <=55 ){echo 'Usia 51-55';}
                      else if($dataemployee['usia'] < 70 ){echo 'Usia diatas 55';}
                      ?> 
                  </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Kota Lahir</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['kota_lahir']?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Join Date</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['join_date']?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Masa Kerja</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['masa_kerja']?> tahun </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Tahun Pensiun</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['tahun_retire']?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Status Karyawan</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['status_karyawan']?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Unit</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['unit_aktif']?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Posisi</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['posisi'] ?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Penempatan </h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col m-auto">
                    <h5> <?= $dataemployee['penempatan']?> </h5>
                </div>
              </div>  
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>level Position</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['level_position']?> </h5>
                </div>
              </div>
            <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Job Family</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col m-auto">
                    <h5> <?= $dataemployee['job_familiy']?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Job Function</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['job_function']?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>job_role</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['job_role']?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Divisi</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['divisi']?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Dir</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['sub_direk'] ?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Direktorat</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $dataemployee['direktorat'] ?> </h5>
                </div>
              </div>

            </div>
          </div>
         

        </div>
      </div>
    
      <?= $this->include('layouts/footer') ?>
    </div>
  </main>
 


</body>

</html>