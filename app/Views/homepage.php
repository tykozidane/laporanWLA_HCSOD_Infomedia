<?= $this->extend('basepage'); ?>

<?= $this->section('isi') ?>
<div class="container">
    <?php  
    if (!empty($dataemployee)){
    ?>
    <h1>Data Pegawai</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">NIK</th>
      <th scope="col">Nama</th>
      <th scope="col">Job Level</th>
      <th scope="col">Departemen</th>
      <th scope="col">Divisi</th>
      <th scope="col">Direktorat</th>
      <th scope="col">Full Time Equivalent (FTE)</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  <?php
                foreach ($dataemployee as $datanya) {
                ?>
    <tr>
      <th scope="row"> <a href="<?= base_url('/datapegawai/').'/'.$datanya['nik'] ?>"> <?php echo $datanya['nik'] ?> </a></th>
      <td><?php echo $datanya['nama'] ?></td>
      <td><?php echo $datanya['job_level'] ?></td>
      <td><?php echo $datanya['dept'] ?></td>
      <td><?php echo $datanya['divisi'] ?></td>
      <td><?php echo $datanya['direktorat'] ?></td>
      <td><?php echo $datanya['fte'] ?></td>
    </tr>
    <?php
                }
                ?>
  </tbody>
</table>
<?php } 
   else if (empty($datalaporan)){
    ?>
    <h1>Data Pegawai Tersebut Belum di Import</h1>

    <?php } else { 
      foreach($datapegawai as $pegawai){?>
<h1>Data WLA <br><?php echo $pegawai['nama']?><br><?php echo $pegawai['nik'] ?></h1>
<br> <a href="<?= base_url('/printwla/').'/'.$pegawai['nik'] ?>" class="btn btn-primary">PRINT PDF</a>
<?php } ?>
<table class="table text-center " id="tablewla">
  <thead>
    <tr>
      <td rowspan="2">Activity</td>
      <td rowspan="2">Detail</td>
      <td rowspan="2">Average Time</td>
      <td rowspan="2">Quantity</td>
      <td rowspan="2">Durasi</td>
      <td rowspan="2">Cat_WLA</td>
      <td rowspan="2">Type_WLA</td>
      <td rowspan="2">Periode</td>
      <td colspan="3">Workload Calculation (Posisi / Jabatan)</td>
    </tr>
    <tr>
      <td >Primary</td>
      <td >Supportive</td>
      <td >Outside the Job</td>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  <?php
                foreach ($datalaporan as $datanya) {
                ?>
    <tr>      
      <td><?php echo $datanya['activity'] ?></td>
      <td><?php echo $datanya['detail'] ?></td>
      <td><?php echo $datanya['average_time'] ?></td>
      <td><?php echo $datanya['quantity'] ?></td>
      <td><?php echo $datanya['durasi'] ?></td>
      <td><?php echo $datanya['cat_wla'] ?></td>
      <td><?php echo $datanya['type_wla'] ?></td>
      <td><?php echo $datanya['periode']?></td>
      <td><?php echo $datanya['primary'] ?></td>
      <td><?php echo $datanya['supportive'] ?></td>
      <td><?php echo $datanya['outside'] ?></td>
    </tr>
    <?php }  ?>
    <td></td>
  </tbody>

  <thead>
    <tr>
      <th class="table-bordered" colspan="2">Non Project</th>
      <th class="table-bordered">Primary</th>
      <th class="table-bordered">Supportive</th>
      <th class="table-bordered">Outside the job</th>
    </tr>
    
  </thead>
  <tbody>
    <tr>
      <th class="table-bordered" colspan="2">Daily</th>
      <td class="table-bordered"><?php echo $counting['bkpdaily'] ?></td>
      <td class="table-bordered"><?php echo $counting['bksdaily'] ?></td>
      <td class="table-bordered"><?php echo $counting['bkodaily'] ?></td>
    </tr>
    <tr>
      <th class="table-bordered" colspan="2">Weekly</th>
      <td class="table-bordered"> <?php echo $counting['bkpweekly'] ?></td>
      <td class="table-bordered"><?php echo $counting['bksweekly'] ?></td>
      <td class="table-bordered"><?php echo $counting['bkoweekly'] ?></td>
    </tr>
    <tr>
      <th class="table-bordered" colspan="2">Monthly</th>
      <td class="table-bordered"> <?php echo $counting['bkpmonthly'] ?></td>
      <td class="table-bordered"><?php echo $counting['bksmonthly'] ?></td>
      <td class="table-bordered"><?php echo $counting['bkomonthly'] ?></td>
    </tr>
    <tr>
      <th class="table-bordered" colspan="2">Yearly</th>
      <td class="table-bordered"> <?php echo $counting['bkpyearly'] ?></td>
      <td class="table-bordered"><?php echo $counting['bksyearly'] ?></td>
      <td class="table-bordered"><?php echo $counting['bkoyearly'] ?></td>
    </tr>
    <tr> 
      <td class="table-bordered" colspan="2">Non Project Average Workload</td>
      <td class="table-bordered" colspan="3"> <?php echo $nonprojectaverage ?> </td>
    </tr>
    <td></td>
  </tbody>
  <thead>
    <tr>
      <th class="table-bordered" colspan="2">Project</th>
      <th class="table-bordered">Primary</th>
      <th class="table-bordered">Supportive</th>
      <th class="table-bordered">Outside the job</th>
    </tr>
    
  </thead>
  <tbody>
  <tr>
      <th class="table-bordered" colspan="2">Daily</th>
      <td class="table-bordered"><?php echo $counting['bkpdailyp'] ?></td>
      <td class="table-bordered"><?php echo $counting['bksdailyp'] ?></td>
      <td class="table-bordered"><?php echo $counting['bkodailyp'] ?></td>
    </tr>
    <tr>
      <th class="table-bordered" colspan="2">Weekly</th>
      <td class="table-bordered"> <?php echo $counting['bkpweeklyp'] ?></td>
      <td class="table-bordered"><?php echo $counting['bksweeklyp'] ?></td>
      <td class="table-bordered"><?php echo $counting['bkoweeklyp'] ?></td>
    </tr>
    <tr>
      <th class="table-bordered" colspan="2">Monthly</th>
      <td class="table-bordered"> <?php echo $counting['bkpmonthlyp'] ?></td>
      <td class="table-bordered"><?php echo $counting['bksmonthlyp'] ?></td>
      <td class="table-bordered"><?php echo $counting['bkomonthlyp'] ?></td>
    </tr>
    <tr>
      <th class="table-bordered" colspan="2">Yearly</th>
      <td class="table-bordered"> <?php echo $counting['bkpyearlyp'] ?></td>
      <td class="table-bordered"><?php echo $counting['bksyearlyp'] ?></td>
      <td class="table-bordered"><?php echo $counting['bkoyearlyp'] ?></td>
    </tr>
    <tr> 
      <td class="table-bordered" colspan="2">Project Average Workload</td>
      <td class="table-bordered" colspan="3"> <?php echo $projectaverage ?> </td>
    </tr>
    <td></td>
  </tbody>
  <thead>
    <tr>
      <th class="table-bordered" colspan="4">Total Summary</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th class="table-bordered" colspan="2">Total Average Workload</th>
      <td class="table-bordered" colspan="2"><?php echo $nonprojectaverage+$projectaverage ?></td>
    </tr>
    <tr>
      <th class="table-bordered" colspan="2">Effective Working Hour in 1 Year</th>
      <td class="table-bordered" colspan="2">1504</td>
    </tr>
    <tr>
      <th class="table-bordered" colspan="2">Full Time Equivalent (FTE)</th>
      <td class="table-bordered" colspan="2"><?php echo $fte ?></td>
    </tr>
  </tbody>
</table>
<button id="button-excel">Create Excel</button>

<?php }?>
</div>
<script>
  let button = document.querySelector("#button-excel");

button.addEventListener("click", e => {
  let table = document.querySelector("#tablewla");
  TableToExcel.convert(table);
});
</script>

<?= $this->endSection(); ?>