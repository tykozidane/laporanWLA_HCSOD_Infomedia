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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
 <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="../../assets/css/stars.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body class="g-sidenav-show   bg-gray-100">
  
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
              <h6>Event</h6>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              
  <div class="card-body">
    <h5 class="card-title"><?= $passdataevent['nama'] ?><br>Speaker : <?= $passdataevent['speaker'] ?></h5>
    <p class="card-text">Pada Tanggal : <?= $passdataevent['tgl'] ?> <br>Jam : <?= $passdataevent['jam'] ?></p>
    
  <?= form_open_multipart('/absen/vote/'.$idencrypt) ?> 
  <legend>Vote</legend>
  <div class="row mb-3">
      <label for="disabledTextInput" class="form-label">NIK</label>
      <input type="text" id="nik" name="nik" class="form-control" value="<?= $dataemployee['nik'] ?>"  readonly>
    </div>
    <div class="row mb-3">
      <label for="disabledTextInput" class="form-label">Nama</label>
      <input type="text" id="nama" name="nama" class="form-control" value="<?= $dataemployee['nama'] ?>"  readonly>
    </div>
    <div class="row mb-3">
      <label for="disabledTextInput" class="form-label">Masukan</label>
      <input type="text" id="notes" name="notes" class="form-control" placeholder="Kritik dan Saran">
    </div>
    <div class="row justify-content-start">
      <p>Berikan Penilaian Anda</p>
    <div class="col-2 rating">
    <input type="radio" id="star1" name="rate" value="1" style="display: none;"/>
    <label for="star1" title="text"><img src="../../assets/img/emoticons/angry.png" width="35px"></label>
    <input type="radio" id="star2" name="rate" value="2" style="display: none;"/>
    <label for="star2" title="text"><img src="../../assets/img/emoticons/sad.png" width="35px"></label>
    <input type="radio" id="star3" name="rate" value="3" style="display: none;"/>
    <label for="star3" title="text"><img src="../../assets/img/emoticons/neutral.png" width="35px"></label>
    <input type="radio" id="star4" name="rate" value="4" style="display: none;"/>
    <label for="star4" title="text"><img src="../../assets/img/emoticons/smile.png" width="35px"></label>
    <input type="radio" id="star5" name="rate" value="5" style="display: none;" checked="checked"/>
    <label for="star5" title="text"><img src="../../assets/img/emoticons/smiling.png" width="35px"></label>
  </div>
</div>
  <div class="">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
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

</html>