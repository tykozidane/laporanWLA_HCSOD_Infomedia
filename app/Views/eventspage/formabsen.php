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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

</head>

<body class="">
<section class="py-5 text-center container">
    <div class="row py-lg-5">
    
      <div class="col-lg-6 col-md-8 mx-auto">
      <?php
                foreach ($dataevent as $data) {
                ?>
        <h1 class="fw-light"><?= $data['nama'] ?></h1>
        <p class="lead text-muted"><?= $data['speaker'] ?></p>
        <p>
          <a href="#" class="btn btn-primary my-2"><?= $data['tgl'] ?></a>
          <a href="#" class="btn btn-secondary my-2"><?= $data['jam'] ?></a>
        </p>
        <?php
                }
                ?>
        <?= form_open_multipart('absen/check') ?> 
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
      <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-4">
          <button type="submit" class="btn btn-success">Next</button>
        </div>
      </div>
    <?= form_close(); ?>
      </div>
    </div>
  </section>
    
</body>

</html>