
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
       HC Applications - Event
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
              
                <div class="mb-3">
                  <h6>Kategori Kegiatan : <?= $passdataevent['nama'] ?> </h6>
                  <?php  
              $number = 0;
              foreach($dataspeaker as $speaker){
                $number++;
              ?>
              
              <h6>Nama Pembicara <?= $number ?>   : <?= $speaker['nama']?></h6>
              <?php }?>
				          <h6>Tanggal           : <?= $passdataevent['tgl'] ?> </h6>
                  <h6>Jam               : <?= $passdataevent['jam'] ?></h6>
                  
                  <?php
    $session = \Config\Services::session();
    if(!empty($session->getFlashdata('pesan'))) {
      echo '<div class="alert alert-success" role="alert">
      '. $session->getFlashdata('pesan') .'</div>';
    } 
    ?>
    </div>
  <?= form_open_multipart('/absen/check/'.$idencrypt) ?>   
  <div class="mb-3">
        <label for="kategori" class="form-label">Kategori Anda</label>
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        <select class="form-select" id="corporate" name="corporate" aria-label="Default select example" required>
            <option selected disabled>Kategori Anda</option>
            <option value="1">Corporate</option>
            <option value="0">Non Corporate</option>
        </select>
    </div>
    
				<div class="mb-3" id="datadiri">
                        <div class="form-group">
                          <label><h6>Data Anda: </h6></label>
                    </div>
                
                
               <!-- <div class="form-check form-check-info text-start">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                  <label class="form-check-label" for="flexCheckDefault">
                    I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                  </label>
                </div>-->
                
               
            </div>
            <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Next</button>
                </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
  
    </div>
    </div>
  </main>
  
  <?= $this->include('layouts/footer') ?>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->  
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script>

$(document).ready(function(){
    $('#corporate').change(function(){

      var corporate = $('#corporate').val();
      console.log(corporate);
      if(corporate == 1)
        {
          $.ajax({
            url:"<?php echo base_url('/getemployee'); ?>",
            method:"POST",
            data:{},
            dataType:"JSON",
            success:function(data)
            {
              var html = '<label><h6>Pilih Nama Anda: </h6></label><select class="form-control" id="nik" name="nik"><option selected>Pilih nama...</option>';

            for(var count = 0; count < data.length; count++)
            {

                html += '<option value="'+data[count].nik_inf+'">'+data[count].nama_emp+'</option>';
             
            }
            html += '</select></div>';
            $('#datadiri').html(html);
            
            
            }
          });
        }
        else if(corporate == 0){
          var html = '<label for="nama" class="form-label">NIK Anda</label>';
          html += '<input type="text" class="form-control" id="nik" name="nik">';
          html += '<label for="nama" class="form-label">Nama Anda</label>';
          html += '<input type="text" class="form-control" id="nama" name="nama">';
          $('#datadiri').html(html);
        }
        else
        {
          $('#datadiri').val('');
        }
      });
      $('#nik').select2({
      theme: 'bootstrap4',
      placeholder: "Please Select"
     });
});

</script>
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
   <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>  -->
        <!-- js untuk bootstrap4  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>
<!-- js untuk select2  -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        
  <script type="text/javascript">
 $(document).ready(function() {
     $('#nik').select2({
      theme: 'bootstrap4',
      placeholder: "Please Select"
     });
 });
</script> -->
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>