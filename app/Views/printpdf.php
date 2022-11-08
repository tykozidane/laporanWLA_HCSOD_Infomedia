<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Data</title>
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script src="library/dselect.js"></script>
</head>
<body>
<div class="container">
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
    </tr>
    <?php }  ?>
    <td></td>
  </tbody>
</table>
</div>

</body>

</div>
</footer>
</html>