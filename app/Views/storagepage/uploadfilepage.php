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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Storage</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Upload</h6>
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
              <h6>Upload File</h6>
              </div>
            </div>
            <?php
    $session = \Config\Services::session();
    if(!empty($session->getFlashdata('pesanupload'))) {
      echo '<div class="alert alert-danger" role="alert">
      '. $session->getFlashdata('pesanupload') .'</div>';
    } 
    ?>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <div class="card-body">
    <h5 class="card-title">Upload File yang akan disimpan</h5>
    <p class="card-text">File harus berformat pdf </p>
  <?= form_open_multipart('storage/upload') ?> 
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kategori Dokumen</label>
        <div class="col-sm-4">
          <select class="form-select" aria-label="Default select example" name="kategori" required>
              <option value="">Pilih Kategori</option>
              <option value="SOP">SOP</option>
              <option value="IK">IK</option>
              <option value="KEBIJAKAN">KEBIJAKAN</option>
              <option value="AMANDEMENT">AMANDEMENT</option>
              <option value="PKB">PKB</option>
          </select>
        </div>
      </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tipe Dokumen</label>
        <div class="col-sm-4">
          <select class="form-select" aria-label="Default select example" name="type" required>
              <option value="">Public / Private</option>
              <option value="public">PUBLIC</option>
              <option value="private">PRIVATE</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nomor Dokumen</label>
        <div class="col-sm-4">
          <input type="text" name="nomor_dokumen" class="form-control" required>
        </div>
      </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Dokumen</label>
        <div class="col-sm-4">
          <input type="text" name="nama_dokumen" class="form-control" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-4">
          <textarea name="deskripsi" class="form-control" required placeholder="Deskripsi sesuai isi dokumen"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tipe Dokumen</label>
        <div class="col-sm-4">
          <select class="form-select" aria-label="Default select example" name="status">
              
              <option selected value="Berlaku">BERLAKU</option>
              <option value="Tidak Berlaku">TIDAK BERLAKU</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Berlaku</label>
        <div class="col-sm-4">
          <input type="date" name="tanggal_berlaku" class="form-control" required>
        </div>
      </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Upload</label>
        <div class="col-sm-4">
          <input type="file" name="fileupload" class="form-control">
        </div>
      </div>
      <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-4">
          <button type="submit" class="btn btn-success">Upload File</button>
        </div>
      </div>
    <?= form_close(); ?>
  </div>
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

  
  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <!--Search name ini table-->

</body>

</html>