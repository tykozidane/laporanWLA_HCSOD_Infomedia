<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
     HC Applications - Create Agreement
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
 
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
   
    <!-- End Navbar -->
    
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-15">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Agreement Dokumen</p>
              </div>
            </div>
            <?= form_open_multipart('/absen/vote/') ?>
            <div class="card-body">
              <div class="row">
			  <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Lengkap</label>
                    <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lengkap Anda" >
				  </div>
                </div>
				<div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Jenis Kelamin</label>
                   <select class="form-control" id="sel1" name="jeniskelamin">
					   <option>Pilih Jenis Kelamin</option>                       
					   <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                        </select>
                  </div>
                </div>
				<div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nomor KTP</label>
                    <input class="form-control" type="text" name="noktp" placeholder="Nomor Identitas KTP">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Tempat Lahir</label>
                    <input class="form-control" type="text" name="tempatlahir">
                  </div>
                </div>
				<div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                    <input class="form-control" type="Date" name="tanggallahir">
                  </div>
                </div>
				<div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Alamat Lengkap</label>
                    <input class="form-control" type="text" name="alamat" placeholder="Masukkan Alamat sesuai KTP">
                  </div>
                </div>
				<div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nomor Handphone</label>
                    <input class="form-control" type="text" name="nohp" placeholder="Nomor Handphone">
                  </div>
                </div>
			<div class="col-md-12">
               <div class="form-check form-check-info text-start">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    I agree the <a href="../pages/agreement_doc.html" class="text-dark font-weight-bolder">Terms and Conditions</a>
                  </label>
                </div>
            </div>    
             <!-- <div class="text-center">
                  <button type="button" class="btn bg-gradient-dark w-100 my-4 mb-2">SUBMIT</button>
                </div>-->
              </div>
            </div>
            <?= form_close() ?>
          </div>
        </div>
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