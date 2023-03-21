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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Event</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Detail</h6>
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
              <h6>Detail Event </h6>
              <div class="">
              <button class="btn btn-info btn-sm ms-auto"><a href="<?=  previous_url(); ?>">back</a></button>
              <?php if($check) {?>
                <!-- <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#addSpeakerModal"  data-id="<?php echo $data['id'] ?>">Add Speaker</button> -->
              <button class="btn btn-primary btn-sm ms-auto"><a href="<?= base_url('events').'/editdata'.'/'.$data['id'] ?>">Edit detail</a></button>
                <?php } else {?>
                  <button class="btn btn-primary btn-sm ms-auto" disabled><a href="<?= base_url('events').'/editdata'.'/'.$data['id'] ?>">Edit detail</a></button>
                  <?php }?></div>
            </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Nama Events</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col m-auto">
                    <h5> <?= $data['nama']?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Category Events</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $data['cat_event']?> </h5>
                </div>
              </div>
              <?php  
              $number = 0;
              foreach($dataspeaker as $speaker){
                $number++;
              ?>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Speaker <?= $number?></h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5>(<?= $speaker['nik']?>) <?= $speaker['nama']?> </h5>
                </div>
              </div>
              <?php }?>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Jam</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $data['jam']?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Hari</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= date('l', strtotime($data['tgl']));?> </h5>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Tanggal</h6>
                </div>
                <div class="col col-lg-1">:</div>
                <div class="col">
                    <h5> <?= $data['tgl']?> </h5>
                </div>
              </div>

            </div>
            <div class="row">
                <div class="col col-lg-2 mx-4">
                    <h6>Link Absensi Event</h6>
                </div>
                <div class="col col-lg">
                <div class="input-group input-group-lg mb-3">
                    <input id="copy-text" type="text" class="form-control" value="<?= base_url('/formpesertaevent').'/'.$idencrypt ?>" aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                    <button class="btn btn-outline-secondary px-4" type="button" id="button-addon2" onclick="copyText()" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="coppied"><i class="fas fa-copy"></i></button>
                </div>
                </div>
                <div class="col"></div>
            </div>
          </div>
         

        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
              <h3> <?= number_format($averagenilai, 1) ?> / 5</h3>
              <!-- <button class="btn btn-primary btn-sm ms-auto"><a href="<?= base_url('events').'/editdata'.'/'.$data['id'] ?>">Edit detail</a></button> -->
            </div>
            <div class="d-flex align-items-center">
              <h6>Dari <?= $count ?> orang yang memberikan penilaian</h6>
            </div>
            </div>
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
              <h6>Hadir <?= $jumlahpeserta?> orang </h6>
              <!-- <button class="btn btn-primary btn-sm ms-auto"><a href="<?= base_url('events').'/editdata'.'/'.$data['id'] ?>">Edit detail</a></button> -->
            </div>
            </div>
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Type here...">
              </div>
            </div>
            <div class="card-body px-2 pt-0 pb-2 mx-2">
              <div class="table-responsive p-2">
                <table class="table align-items-center mb-0" id="myTable">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Karyawan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Jabatan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Departemen</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vote</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Masukan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Poin</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  
                  $auth = service('authentication');
                  $userId = $auth->id();
                  $authorize = service('authorization');
                    foreach ($dataabsen as $datanya) {
                      
                        
                    ?>
                   
                        <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php if($datanya['nama_emp']){ echo $datanya['nama_emp']; } else {echo $datanya['nama'];} ?></h6>
                            </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $datanya['divisi'] ?></p>
                        </td>
                      <td class="align-middle  text-sm">
                        <p class="text-xs text-secondary mb-0"><?= $datanya['dept'] ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs text-secondary mb-0"><?php echo $datanya['vote'] ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs text-secondary mb-0"><?php echo $datanya['notes'] ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs text-secondary mb-0"><?php echo $datanya['nilai'] ?></p>
                      </td>
                      <?php if($authorize->inGroup('hcsod', $userId) || $authorize->inGroup('admin', $userId)){ ?>
                      <td class="align-middle text-center text-sm">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-nilai="<?php echo $datanya['nilai'] ?>" data-id="<?php echo $datanya['id'] ?>" data-status="<?php echo $datanya['status'] ?>" data-namaabsen="<?php echo $datanya['nama_emp'] ?>">edit</button>
                      </td><?php } ?>
                    </tr>
                        <?php
                      }
                
                ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
         

        </div>
      </div>
      <?= $this->include('layouts/footer') ?>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Update Data Absen</h5>
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nilai</label>
            <input type="text" class="form-control" id="recipient-name" name="nilai">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Status</label>
            <select class="form-select" id="message-text" name="status">
            <option selected disabled>Kategori Anda</option>
            <option value="Partisipan">Partisipan</option>
            <option value="Panitia">Panitia</option>
            </select>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Update</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- <div class="modal fade" id="addSpeakerModal" tabindex="-1" aria-labelledby="addSpeakerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Add Speaker</h5>
        <h5 class="modal-title" id="addSpeakerModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">NIK Speaker</label>
            <input type="text" class="form-control" id="recipient-name" name="niknewspeaker">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Nama Speaker</label>
            <input type="text" class="form-control" id="recipient-name" name="newspeaker">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Update</button>
      </div>
    </form>
    </div>
  </div>
</div> -->
  </main>
  
  <!--   Core JS Files   -->
  <script>
    function copyText() {
  const text = document.getElementById('copy-text').value.trim();
  navigator.clipboard.writeText(text);
}
  </script>
  <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
})
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
  <script>
//     var addSpeakerModal = document.getElementById('addSpeakerModal')
// addSpeakerModal.addEventListener('show.bs.modal', function (event) {
//   // Button that triggered the modal
//   var button = event.relatedTarget
//   // Extract info from data-bs-* attributes
//   var id = button.getAttribute('data-id')
//   // If necessary, you could initiate an AJAX request here
//   // and then do the updating in a callback.
//   //
//   // Update the modal's content.
//   var modalform = addSpeakerModal.querySelector('.modal-content form')

//   modalform.action = '<?= base_url('events/addspeaker')?>'+'/'+id
// })
    var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var nama = button.getAttribute('data-namaabsen')
  var nilai = button.getAttribute('data-nilai')
  var id = button.getAttribute('data-id')
  var status = button.getAttribute('data-status')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body input')
  var modalform = exampleModal.querySelector('.modal-content form')

  modalform.action = '<?= base_url('events/updateabsen')?>'+'/'+id
  modalTitle.textContent = nama
  modalBodyInput.value = nilai
})
 
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  
  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <!--Search name ini table-->
  <script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
    </script>

</body>

</html>