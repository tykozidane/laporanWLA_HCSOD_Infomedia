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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Events</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Edit Add Event</h6>
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
              <h6>Edit Event</h6>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              
  <div class="card-body">
    <h5 class="card-title">Form Edit Event</h5>
    <p class="card-text">Masukan detail yang perlu dirubah</p>
    <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#addSpeakerModal"  data-id="<?php echo $data['id'] ?>">Add Speaker</button>
  <?= form_open_multipart('events/editdata/'.$data['id']) ?> 
    <div class="form-group row">
      <div class="mb-3">
        <label for="namaevent" class="form-label">Nama Event</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>  
    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori Event</label>
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        <input type="text" class="form-control" id="cat_event" name="cat_event" value="<?= $data['cat_event']?>" disabled>
    </div>
    
    <?php $count = 1;
     foreach($dataspeaker as $speaker){ ?>
     
       <input type="text" class="form-control" id="idspeaker<?= $count ?>" name="idspeaker<?= $count ?>" value="<?= $speaker['id']?>" hidden>
     <div class="mb-3">
        <label for="speaker" class="form-label">NIK Speaker <?= $count ?></label>
        <input type="text" class="form-control" id="nikspeaker<?= $count ?>" name="nikspeaker<?= $count ?>" value="<?= $speaker['nik']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="speaker" class="form-label">Nama Speaker <?= $count ?></label>
        <input type="text" class="form-control" id="speaker<?= $count ?>" name="speaker<?= $count ?>" value="<?= $speaker['nama']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
      <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#deleteSpeakerModal"  data-id="<?php echo $speaker['id'] ?>" data-nama="<?= $speaker['nama']?>">Delete Speaker</button>
     </div>
    <?php $count++; } ?>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" class="form-control" id="datePickerId" name="tanggal" value="<?= $data['tgl']?>">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="jam" class="form-label">Jam</label>
        <input type="time" class="form-control" id="jam" name="jam" value="<?= $data['jam']?>">
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
    <div class="modal fade" id="addSpeakerModal" tabindex="-1" aria-labelledby="addSpeakerModalLabel" aria-hidden="true">
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
</div>
<!-- Modal -->
<div class="modal fade" id="deleteSpeakerModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Anda yakin akan menghapus Speaker
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger"><a href="<?= base_url('events/deletespeaker')?>">Save changes</a></button>
      </div>
    </div>
  </div>
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
     var addSpeakerModal = document.getElementById('addSpeakerModal')
addSpeakerModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var id = button.getAttribute('data-id')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalform = addSpeakerModal.querySelector('.modal-content form')

  modalform.action = '<?= base_url('events/addspeaker')?>'+'/'+id
}) 
var deleteSpeakerModal = document.getElementById('deleteSpeakerModal')
deleteSpeakerModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var id = button.getAttribute('data-id')
  var nama = button.getAttribute('data-nama')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalbutton = deleteSpeakerModal.querySelector('.modal-footer a')
  var modalTitle = deleteSpeakerModal.querySelector('.modal-title')

  modalbutton.href = '<?= base_url('events/deletespeaker')?>'+'/'+id
  modalTitle.textContent = 'Delete '+ nama
})
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