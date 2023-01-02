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
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
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
          <h6 class="font-weight-bolder text-white mb-0">Edit Employee</h6>
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
              <h6>Edit Data Employee</h6>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              
  <div class="card-body">
    <h5 class="card-title">Form Edit Event</h5>
    <p class="card-text">Masukan detail yang perlu dirubah</p>
  <?= form_open_multipart('employee/editdata/'.$data['id']) ?> 
    <div class="form-group row">
      <div class="mb-3">
        <label for="namaevent" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama_emp']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>  
    <div class="mb-3">
        <label for="kategori" class="form-label">Periode</label>
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        <input type="date" class="form-control" id="" name="" value="<?= $data['periode']?>" disabled>
    </div>
    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $data['sub_kategori']?>">
    </div>
    <div class="mb-3">
        <label for="speaker" class="form-label">Jenis Kelamin</label>
        <input type="text" class="form-control" id="jeniskelamin" name="jeniskelamin" value="<?= $data['jenis_kelamin']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal Join</label>
        <input type="text" class="form-control" id="join_date" name="join_date" value="<?= $data['join_date']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="jam" class="form-label">Agama</label>
        <input type="text" class="form-control" id="agama" name="agama" value="<?= $data['agama']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Status</label>
        <input type="text" class="form-control" id="status" name="status" value="<?= $data['status']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="jam" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $data['email']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">No. Handphone</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $data['phone_number']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="jam" class="form-label">Pendidikan</label>
        <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?= $data['pendidikan']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="jam" class="form-label">Tanggal Lahir</label>
        <input type="text" class="form-control" id="date_birth" name="date_birth" value="<?= $data['birth_date']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Kota Lahir</label>
        <input type="text" class="form-control" id="kota_lahir" name="kota_lahir" value="<?= $data['kota_lahir']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="jam" class="form-label">Status Karyawan</label>
        <input type="text" class="form-control" id="status_karyawan" name="status_karyawan" value="<?= $data['status_karyawan']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="jam" class="form-label">Unit</label>
        <input type="text" class="form-control" id="unit_now" name="unit_now" value="<?= $data['unit_aktif']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Posisi</label>
        <input type="text" class="form-control" id="posisi" name="posisi" value="<?= $data['posisi']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="jam" class="form-label">Penempatan</label>
        <input type="text" class="form-control" id="penempatan" name="penempatan" value="<?= $data['penempatan']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="jam" class="form-label">Job Family</label>
        <input type="text" class="form-control" id="job_familiy" name="job_familiy" value="<?= $data['job_familiy']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Job Function</label>
        <input type="text" class="form-control" id="job_function" name="job_function" value="<?= $data['job_function']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="jam" class="form-label">Job Role</label>
        <input type="text" class="form-control" id="job_role" name="job_role" value="<?= $data['job_role']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="jam" class="form-label">Divisi</label>
        <input type="text" class="form-control" id="divisi" name="divisi" value="<?= $data['divisi']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Dir</label>
        <input type="text" class="form-control" id="dir" name="dir" value="<?= $data['sub_direk']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="jam" class="form-label">Direktorat</label>
        <input type="text" class="form-control" id="nama_atasan1" name="nama_atasan1" value="<?= $data['direktorat']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
      </div>
      <div class="form-group row">
        <div class="col-sm">
          <button type="submit" class="btn btn-success">Save New Data Event</button>
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