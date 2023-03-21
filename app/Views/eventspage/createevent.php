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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <?= $this->include('layouts/sidebar') ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
      data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Events</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Form Add Event</h6>
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
              <div class="d-flex justify-content-between align-items-center">
                <h6>Add Event</h6>
                <div>
                  <button class="btn btn-danger btn-sm ms-auto"><a href="<?=  previous_url(); ?>">cancel</a></button>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <?php
    $session = \Config\Services::session();
    if(!empty($session->getFlashdata('pesan'))) {
      echo '<div class="alert alert-success" role="alert">
      '. $session->getFlashdata('pesan') .'</div>';
    } 
    ?>
                <?php $validation = \Config\Services::validation(); ?>
                <div class="card-body">
                  <h5 class="card-title">Form Event</h5>
                  <p class="card-text">Masukan detail yang ada sesuai dengan event yang akan dilaksanakan</p>
                  <?= form_open_multipart('events/upload') ?>
                  <div class="form-group row">
                    <div class="mb-3">
                      <label for="divisi" class="form-label">Divisi</label>
                      <select class="form-select" id="divisi" name="divisi" aria-label="Default select example"
                        required>
                        <option selected disabled>Pilih Divisi Anda</option>
                        <?php
              foreach($detailgroup as $divisi)
              {
              
              echo '<option value="'.$divisi["name"].'">'.$divisi["name"].'</option>';
              }  ?>
                      </select>
                      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama Event</label>
                      <input type="text" class="form-control" id="nama" name="nama" required>
                      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                      <label for="kategori" class="form-label">Kategori AKHLAK</label>
                      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                      <select class="form-select" id="cat_akhlak" name="cat_akhlak" aria-label="Default select example"
                        required>
                        <option selected disabled>Pilih Kategori Akhlak</option>
                        <?php
              foreach($dataakhlak as $row)
              {
              
              echo '<option value="'.$row["id"].'">'.$row["nama"].'</option>';
              }  ?>
                      </select>
                      <?php if($validation->getError('cat_akhlak')) {?>
                      <div class="text-danger text-opacity-50">Kategori AKHLAK tidak boleh kosong</div>
                      <?php }?>
                    </div>

                    <div class="mb-3">
                      <label for="kategori" class="form-label">Kategori Program AKHLAK</label>
                      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                      <select class="form-select" id="programakhlak" name="programakhlak"
                        aria-label="Default select example" required>
                        <option selected disabled>Pilih Kategori Program </option>

                      </select>

                    </div>
                    <?php if($validation->getError('programakhlak')) {?>
                    <div class="text-danger text-opacity-50">Program AKHLAK tidak boleh kosong</div>
                    <?php }?>
                    <div class="mb-3">
                      <label for="kategori" class="form-label">Kategori Event</label>
                      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                      <select class="form-select" id="cat_event" name="cat_event" aria-label="Default select example"
                        required>
                        <option selected disabled>Open this select menu</option>
                        <option value="Leader Talk Value">Leader Talk Value</option>
                        <option value="Sharing Session">Sharing Session</option>
                      </select>

                    </div>
                    <?php if($validation->getError('cat_event')) {?>
                    <div class="text-danger text-opacity-50">Kategori event tidak boleh kosong</div>
                    <?php }?>
                    <div class="mb-3">
                      <label for="jmlhspeaker" class="form-label">Jumlah Speaker</label>
                      <input type="number" class="form-control" id="jmlhspeaker" name="jmlhspeaker" required>
                      <div id="emailHelp" class="form-text">Jika Speaker eksternal Kolom NIK bisa diisikan ( - )</div>
                      <?php if($validation->getError('jmlhspeaker')) {?>
                    <div class="text-danger text-opacity-50">Minimal ada satu Speaker</div>
                    <?php }?>
                    </div>
                    <div id="loopspeaker">

                    </div>
                    
                    <div class="mb-3">
                      <label for="tanggal" class="form-label">Tanggal</label>
                      <input type="date" class="form-control" id="datePickerId" name="tanggal" required>
                      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                      <?php if($validation->getError('tanggal')) {?>
                      <div class="text-danger text-opacity-50">Tanggal tidak boleh kosong</div>
                      <?php }?>
                    </div>
                    <div class="mb-3">
                      <label for="jam" class="form-label">Jam</label>
                      <input type="time" class="form-control" id="jam" name="jam" required>
                      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                      <?php if($validation->getError('jam')) {?>
                      <div class="text-danger text-opacity-50">Jam tidak boleh kosong</div>
                      <?php }?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm">
                      <button type="submit" class="btn btn-success">Add Event</button>
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

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
      $('#jmlhspeaker').change(function () {

        var jmlh = $('#jmlhspeaker').val();
        console.log(jmlh);

        if (jmlh != '') {
          var html = '';
          for(var i = 1; i <= jmlh; i ++) {
            html += '<div class="mb-3">';
            html += '<label for="nikspeaker'+i+'" class="form-label">NIK '+i+'</label>';
          html += '<input type="text" class="form-control" id="nikspeaker'+i+'" name="nikspeaker'+i+'" required>';
          html += '<label for="speaker" class="form-label">Speaker '+i+'</label>';
          html += '<input type="text" class="form-control" id="speaker'+i+'" name="speaker'+i+'" required>';
          html += '</div>';
        
    }         
          $('#loopspeaker').html(html);
        } else {
          $('#loopspeaker').val('');
        }
      });
      $('#cat_akhlak').change(function () {

        var id_akhlak = $('#cat_akhlak').val();
        console.log(id_akhlak);
        if (id_akhlak != '') {
          $.ajax({
            url: "<?php echo base_url('/getprogram'); ?>" + "/" + id_akhlak,
            method: "POST",
            data: {
              id_akhlak: id_akhlak
            },
            dataType: "JSON",
            success: function (data) {
              var html = '<option value="">Select State</option>';

              for (var count = 0; count < data.length; count++) {

                html += '<option value="' + data[count].program + '">' + data[count].program +
                '</option>';
                console.log(data[count].program);
              }

              $('#programakhlak').html(html);
            }
          });
        } else {
          $('#programakhlak').val('');
        }
      });
      // $('#cat_speaker').change(function () {

      //   var cat_speaker = $('#cat_speaker').val();
      //   console.log(cat_speaker);
      //   if (cat_speaker == 'Internal') {
      //     $.ajax({
      //       url: "<?php echo base_url('/getemployee'); ?>",
      //       method: "POST",
      //       data: {},
      //       dataType: "JSON",
      //       success: function (data) {
      //         var html =
      //           '<label for="kategori" class="form-label">Speaker</label><div class="input-group mb-3"><div class="input-group-prepend"><label class="input-group-text" for="inputGroupSelect01">Speaker</label></div><select id="speaker" name="speaker"><option selected>Choose...</option>';

      //         for (var count = 0; count < data.length; count++) {

      //           html += '<option value="' + data[count].nama_emp + '">' + data[count].nama_emp +
      //             '</option>';

      //         }
      //         html += '</select></div>';
      //         $('#choose_speaker').html(html);


      //       }
      //     });
      //   } else if (cat_speaker == 'Eksternal') {
      //     var html = '<label for="speaker" class="form-label">Speaker</label>';
      //     html += '<input type="text" class="form-control" id="speaker" name="speaker">';
      //     $('#choose_speaker').html(html);
      //   } else {
      //     $('#choose_speaker').val('');
      //   }
      // });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#nik').select2();
    });
  </script>
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
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