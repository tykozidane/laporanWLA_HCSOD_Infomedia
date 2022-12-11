<?= $this->extend('basepage'); ?>

<?=$this->section('isi'); ?>

<div class="container ">
<div class="card">
  <div class="card-header">
    Import
  </div>
  <div class="card-body">
    <h5 class="card-title">Upload File Data yang akan diimport</h5>
    <p class="card-text">File harus berformat xlx. dll</p>
  <?= form_open_multipart('wla/upload') ?> 
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
<script type="text/javascript">
 $(document).ready(function() {
     $('#nik').select2();
 });
</script>

<?= $this->endSection(); ?>