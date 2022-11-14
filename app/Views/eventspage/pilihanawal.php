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
  <script src="library/dselect.js"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
   
</head>

<body class="g-sidenav-show   bg-gray-100">
  
  <main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
              <h6>Events</h6>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              
  <div class="card-body">
    <h5 class="card-title">Upload File Data yang akan diimport</h5>
    <p class="card-text">File harus berformat xlx. dll</p>
  <?= form_open_multipart('import/upload') ?> 
    <?php
    $session = \Config\Services::session();
    if(!empty($session->getFlashdata('pesan'))) {
      echo '<div class="alert alert-danger" role="alert">
      '. $session->getFlashdata('pesan') .'</div>';
    } 
    ?>
    <div class="form-group row">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
       <label class="input-group-text" for="inputGroupSelect01">Employee</label>
      </div>
        <select id="nik" name="nik">
        <option selected>Choose...</option>
        <?php
                foreach ($dataemployee as $datanya) {
                ?>
        <option value="<?= $datanya['nik'] ?>">(<?php echo $datanya['nik'] ?>) <?php echo $datanya['nama'] ?></option>
        <?php
                }
                ?>
        </select>
      </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">Upload</label>
        <div class="col-sm-4">
          <input type="file" name="fileimport" class="form-control">
        </div>
      </div>
      <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-4">
          <button type="submit" class="btn btn-success">Import Data</button>
        </div>
      </div>
    <?= form_close(); ?>
  </div>
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
  <script>

var select_box_element = document.querySelector('#nik');

dselect(select_box_element, {
    search: true
});

</script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  
  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  

</body>

</html>