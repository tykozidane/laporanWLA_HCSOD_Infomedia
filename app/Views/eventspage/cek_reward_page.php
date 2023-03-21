
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    HC Applications - Cek Rewards
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

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="#">
              HC Applications
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="#">
                    <i class="fa fa-info opacity-6 text-red me-1"></i>
                    HC Information - Comming Soon
                  </a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link me-2" href="<?= base_url('claimreward') ?>">
                    <i class="fa fa-check-square-o opacity-6 text-dark me-1"></i>
                    Cek Rewards Akhlak
                  </a>
                </li>
                <!--<li class="nav-item">
                  <a class="nav-link me-2" href="#">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Sign Up
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="#">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Sign In
                  </a>
                </li>-->
              </ul>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
 <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
     <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">REWARDS AKHLAK!</h1>
            <p class="text-lead text-white">I appreciate the results of you joining the event to do something new</p>
          </div>
        </div>
		<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Silahkan Masukkan Nomor Induk Pekerja (perner)</h6>
            </div>
            <?= form_open_multipart('/cekreward') ?> 
              <div class="card-body px-5 pt-0 pb-2">
                <div class="input-group">
              <input type="text" class="form-control" placeholder="Please input NIK..." name="nik">
			  <button type="submit"><span type="button" class="btn bg-gradient-dark mb-0">Cek Poin</span></button>
            </div>
      </div>
      <?= form_close(); ?>
	  <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Detail Poin Rewards AKHLAK</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NAMA</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DEPARTEMEN</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DIVISI</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">KATEGORI AKHLAK</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NAMA EVENT</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TANGGAL EVENT</th>
					    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PEMBICARA</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">POIN</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($passdataabsen){ 
                        foreach($passdataabsen as $dataabsen){?>
                    <tr>
                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= $dataabsen['nik'] ?></td>
                      <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><?= $datadiri['nama'] ?></td>
                      <?php if(!empty($dataemployee)){ ?>
                      <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= $dataemployee['dept'] ?></td>
                      <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= $dataemployee['divisi'] ?></td>
                      <?php } else { ?>
                        <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">-</td>
                      <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">-</td>
                        <?php } ?>
                      <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= $dataabsen['program_akhlak'] ?></td>
					  <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= $dataabsen['nama'] ?></td>
                      <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= $dataabsen['tgl'] ?></td>
					    <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?php  
             if(!$dataspeaker){echo "-";}else {
              foreach($dataspeaker as $speaker){
               if($speaker['id_event'] == $dataabsen['id_event']){
               echo $speaker['nama']?>,
              <?php } }}?></td>
                      <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= $dataabsen['nilai'] ?></td>
                    </tr>
                      <?php }
                    } ?>
                  </tbody>
      </div>
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
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>