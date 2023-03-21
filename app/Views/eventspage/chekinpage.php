<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <title>
       HC Applications - Event
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white">
        HC Applications - Event
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
            <p class="text-lead text-white">Finding Knowledge Make We a People Smart. <br />Do it now, before "LATER" change to "NEVER"</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h4>Form Register</h4>
            </div>
            <div class="card-body">
            <h6>Kategori Kegiatan : <?= $passdataevent['nama'] ?></h6>
            <?php  
              $number = 0;
              foreach($dataspeaker as $speaker){
                $number++;
              ?>
              
              <h6>Nama Pembicara <?= $number ?>   : <?= $speaker['nama']?></h6>
              <?php }?>
				          <h6>Tanggal           : <?= $passdataevent['tgl'] ?> </h6>
                  <h6>Jam               : <?= $passdataevent['jam'] ?></h6>
    
  <?= form_open_multipart('/absen/checkin/'.$idencrypt) ?> 
  <legend>Absensi</legend>
      <?php if($corporate){  ?>
      <input type="text" id="corporate" name="corporate" class="form-control" value="<?= $corporate ?>"  hidden>
      <?php }else {  ?>
        <input type="text" id="corporate" name="corporate" class="form-control" value="<?= $corporate ?>"  hidden>
      <?php } ?>
  <div class="mb-3">
      <label for="disabledTextInput" class="form-label">NIK</label>
      <input type="text" id="nik" name="nik" class="form-control" value="<?= $dataemployee['nik'] ?>"  readonly>
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Nama</label>
      <input type="text" id="nama" name="nama" class="form-control" value="<?= $dataemployee['nama'] ?>"  readonly>
    </div>
    
    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Hadir!!</button>
    <?= form_close(); ?>
  
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
 <script type="text/javascript">
 $(document).ready(function() {
     $('#nik').select2();
 });
</script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  
  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  

</body>