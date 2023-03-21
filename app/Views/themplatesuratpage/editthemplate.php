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
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="../../assets/css/toolkit.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <!-- <script type="text/javascript" src="<?= base_url()?>/assets/js/argon-dashboard.min.js"></script> -->
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <!-- <script type="text/javascript" src="<?= base_url()?>/assets/js/core/bootstrap.bundle.min.js"></script> -->
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <link href="<?= base_url()?>/summernote/summernote-lite.min.css" rel="stylesheet">
  <script src="<?= base_url()?>/summernote/summernote-lite.min.js"></script>
 
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> -->
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Themplate</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Edit Themplate</h6>
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
              <h6>Edit Themplate</h6>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              
  <div class="card-body">
    <h5 class="card-title">Form Add Themplate</h5>
    <p class="card-text">Masukan data</p>
    <?= form_open_multipart('themplate/edit/saveupdate/'.$themplate['id']) ?> 
    <div class="form-group row">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $themplate['nama']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>  
    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $themplate['kategori']?>" disabled>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">deskripsi</label>
        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $themplate['deskripsi']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Judul</label>
        <textarea id="summernote" name="judul"><?= $themplate['judul']?></textarea>
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Isi</label>
        <textarea id="summernote2" name="isi"><?= $themplate['isi']?></textarea>
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanda Tangan Pengesahan</label>
        <textarea id="summernote3" name="tandatangan"><?= $themplate['tandatangan']?></textarea>
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
      </div>
      <div class="form-group row">
        <div class="col-sm">
          <button type="submit" class="btn btn-success">Save Update Data Themplate</button>
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
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
  <script>
    $(document).ready(function() {
        $('#summernote2').summernote();
    });
  </script>
  <script>
    $(document).ready(function() {
        $('#summernote3').summernote();
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script>

var select_box_element = document.querySelector('#nik');

dselect(select_box_element, {
    search: true
});

</script>
<script>
    datePickerId.min = new Date().toISOString().split("T")[0];
</script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  
  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  

</body>

</html>