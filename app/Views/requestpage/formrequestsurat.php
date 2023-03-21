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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="../../assets/css/stars.css" rel="stylesheet" />
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
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../pages/dashboard.html">
        HC Applications
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
        data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
      style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
            <p class="text-lead text-white">Finding Knowledge Make We a People Smart. <br />Do it now, before "LATER"
              change to "NEVER"</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Form Register</h5>
            </div>
            <?= form_open_multipart('/absen/vote/'.$idencrypt) ?>
            <div class="card-body">
              <div class="mb-3">
                <h6>Kategori Kegiatan : <?= $passdataevent['nama'] ?></h6>
                <h6>Nama Pembicara : <?= $passdataevent['speaker'] ?></h6>
                <h6>Tanggal : <?= $passdataevent['tgl'] ?> </h6>
                <h6>Jam : <?= $passdataevent['jam'] ?></h6>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">NIK</label>
                  <input type="text" id="nik" name="nik" class="form-control" value="<?= $dataemployee['nik'] ?>"
                    readonly>
                </div>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Nama</label>
                  <input type="text" id="nama" name="nama" class="form-control" value="<?= $dataemployee['nama'] ?>"
                    readonly>
                </div>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Bagaimana Pendapat Anda Mengenai Event ini</label>
                  <textarea type="text" id="pd_web" name="pd_web" class="form-control" placeholder="Menarik Sekali"
                    aria-label="Menarik Sekali"></textarea>
                </div>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Bagaimana Pendapat Anda Mengenai Pembicara Pada
                    Event ini</label>
                  <textarea type="text" id="pd_speaker" name="pd_speaker" class="form-control"
                    placeholder="Sangat Informatif" aria-label="Sangat Informatif"></textarea>
                </div>
                <div class=" mb-3">
                  <p>Berikan Penilaian Anda</p>
                  <div class="col-2 rating">
                    <input type="radio" id="star1" name="rate" value="1" style="display: none;" />
                    <label for="star1" title="text"><img src="../../assets/img/emoticons/angry.png"
                        width="35px"></label>
                    <input type="radio" id="star2" name="rate" value="2" style="display: none;" />
                    <label for="star2" title="text"><img src="../../assets/img/emoticons/sad.png" width="35px"></label>
                    <input type="radio" id="star3" name="rate" value="3" style="display: none;" />
                    <label for="star3" title="text"><img src="../../assets/img/emoticons/neutral.png"
                        width="35px"></label>
                    <input type="radio" id="star4" name="rate" value="4" style="display: none;" />
                    <label for="star4" title="text"><img src="../../assets/img/emoticons/smile.png"
                        width="35px"></label>
                    <input type="radio" id="star5" name="rate" value="5" style="display: none;" checked="checked" />
                    <label for="star5" title="text"><img src="../../assets/img/emoticons/smiling.png"
                        width="35px"></label>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Usulan Event Berikutnya</label>
                  <textarea type="text" id="notes" name="notes" class="form-control" placeholder="Kritik dan Saran"
                    aria-label="Kritik dan Saran"></textarea>
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