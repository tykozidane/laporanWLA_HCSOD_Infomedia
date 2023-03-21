<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    HC Applications
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">WLA Tables</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Tables</h6>
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
              <h6>Workload Analysis table</h6>
              <button class="btn btn-primary btn-sm ms-auto"><a href="<?= base_url('wla/import') ?>">Import WLA</a></button>
            </div>
            </div>
            <?php
    $session = \Config\Services::session();
    if(!empty($session->getFlashdata('pesan'))) {
      echo '<div class="alert alert-danger" role="alert">
      '. $session->getFlashdata('pesan') .'</div>';
    } else if(!empty($session->getFlashdata('berhasil'))) {
      echo '<div class="alert alert-success" role="alert">
      '. $session->getFlashdata('berhasil') .'</div>';
    } 
    ?>
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Type here...">
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <!-- <table id="example" class="table table-striped" style="width:100%">
              <thead>
                    <tr>
                      <th >Nama Karyawan</th>
                      <th >Jabatan</th>
                      <th >Departemen</th>
                      <th >FTE</th>
                      <th >Keterangan</th>
                      <th ></th>
                    </tr>
                  </thead>
                  <?php  
                    foreach ($dataemployee as $datanya) {
                    ?>
                    <tr>
                      <td>
                          <?php echo $datanya['nama_emp'] ?>
                      </td>
                      <td>
                        <?php echo $datanya['dept'] ?>
                        </td>
                      <td >
                        <?php echo $datanya['divisi'] ?>
                      </td>
                      <?php  
                      $cek =0;
                    foreach ($datafte as $fte) {
                      if ($fte['nik'] == $datanya['nik_inf']){
                    ?>
                      <td >
                        <?php echo $fte['nilai'] ?>
                      </td>
                      <?php if($fte['nilai'] < 0.99 & $fte['nilai'] > 0) {?>
                      <td>
                        Underload
                      </td>
                      <?php } else if($fte['nilai'] > 1 & $fte['nilai'] < 1.28 ) {  ?>
                        <td >
                        Normal
                      </td>
                      <?php } else if($fte['nilai'] > 1.28 ) {  ?>
                        <td >
                        Overload
                      </td>
                      <?php } else {?>
                        <td>
                        -
                      </td>
                      <?php }$cek +=1;}
                      }if($cek == 0){ ?>
                        <td >
                        -
                      </td>
                      <td >
                        -
                      </td>
                      <?php
                          }
             ?>
                      <td >
                        <button >
                          <a href="<?= base_url('wla/datapegawai/').'/'.$datanya['nik_inf'] ?>"><img src="../assets/img/info.png" alt="main_logo"></a> 
                        </button>
                      </td>
                    </tr>
                    <?php
                }
                ?>
                    
                  </tbody>
            </table> -->
                <table class="table align-items-center mb-0" id="myTable">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Karyawan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Jabatan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Departemen</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FTE</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  
                    foreach ($dataemployee as $datanya) {
                    ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $datanya['nama_emp'] ?></h6>
                            </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $datanya['dept'] ?></p>
                        </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs text-secondary mb-0"><?php echo $datanya['divisi'] ?></p>
                      </td>
                      <?php  
                      $cek =0;
                    foreach ($datafte as $fte) {
                      if ($fte['nik'] == $datanya['nik_inf']){
                    ?>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $fte['nilai'] ?></span>
                      </td>
                      <?php if($fte['nilai'] < 0.99 & $fte['nilai'] > 0) {?>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Underload</span>
                      </td>
                      <?php } else if($fte['nilai'] > 1 & $fte['nilai'] < 1.28 ) {  ?>
                        <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Normal</span>
                      </td>
                      <?php } else if($fte['nilai'] > 1.28 ) {  ?>
                        <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Overload</span>
                      </td>
                      <?php } else {?>
                        <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">-</span>
                      </td>
                      <?php }$cek +=1;}
                      }if($cek == 0){ ?>
                        <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">-</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">-</span>
                      </td>
                      <?php
                          }
             ?>
                      <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0">
                          <a href="<?= base_url('wla/datapegawai/').'/'.$datanya['nik_inf'] ?>"><img src="../assets/img/info.png" alt="main_logo"></a> 
                        </button>
                      </td>
                    </tr>
                    <?php
                }
                ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
         

        </div>
      </div>
    
      <?= $this->include('layouts/footer') ?>
    </div>
  </main>
 
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
<script>
  $(document).ready(function () {
    $('#example').DataTable();
});
</script>
  
  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <!--Search name ini table-->
  <script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
    </script>

</body>

</html>