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
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Event</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Tables Reward</h6>
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
                <h6>List Reward Event</h6>
                <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                  data-bs-target="#addRewardModal">Add Reward</button>
                <!-- <button class="btn btn-primary btn-sm ms-auto"><a href="<?= base_url('events').'/create' ?>">Add Event</a></button> -->
              </div>
            </div>
            <?php
    $session = \Config\Services::session();
    if(!empty($session->getFlashdata('pesan'))) {
      echo '<div class="alert alert-success" role="alert">
      '. $session->getFlashdata('pesan') .'</div>';
    } 
    ?>
            <div class="d-flex justify-content-start">
              <?php  
                    foreach ($datareward as $datanya) {
                    ?>
              <!-- Card Reward -->
              <div class="card-body px-5 pt-0 pb-3 mt-2">
                <div class="card" style="width: 18rem;">
                  <div class="card-header" style="padding: 1.5em 1.5em 0em 1.5em; ;">
                    <?= $datanya['status'] ?> Q<?= $datanya['quarter'] ?> <?= $datanya['tahun'] ?>
                  </div>
                  <div class="card-body" style="padding-top: 0.5em;">
                    <h5 class="card-title"><?= $datanya['nama'] ?></h5>
                    <p class="card-text"> <?= $datanya['deskripsi'] ?></p>
                    <p class="card-text" style="font-weight: bold;"> Price <?= $datanya['price'] ?> Poin</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                      data-nama="<?php echo $datanya['nama'] ?>" data-id="<?php echo $datanya['id'] ?>"
                      data-status="<?php echo $datanya['status'] ?>"
                      data-deskripsi="<?php echo $datanya['deskripsi'] ?>"
                      data-price="<?php echo $datanya['price'] ?>">edit</button>
                    <?php if($datanya['candelete'] == 0){ ?>
                    <button type="button" class="btn btn-danger " data-bs-toggle="modal"
                      data-bs-target="#deleteRewardModal" data-id="<?php echo $datanya['id'] ?>"
                      data-nama="<?= $datanya['nama']?>" disabled>Delete Reward</button>
                    <?php } else if($datanya['candelete'] == 1){ ?>
                    <button type="button" class="btn btn-danger " data-bs-toggle="modal"
                      data-bs-target="#deleteRewardModal" data-id="<?php echo $datanya['id'] ?>"
                      data-nama="<?= $datanya['nama']?>">Delete Reward</button>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <?php
                }
                ?>
            </div>
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Type here...">
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="myTable">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deskripsi
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone
                        Number</th>

                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                    foreach ($dataClaimReward as $claim) {
                    ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>

                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $claim['nama_emp'] ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php foreach($datareward as $reward){
                          if($reward['id'] == $claim['reward_id']){echo $reward['nama'];}
                        } ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs text-secondary mb-0"><?php echo $claim['price'] ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $claim['status'] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $claim['email'] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span
                          class="text-secondary text-xs font-weight-bold"><?php echo $claim['phone_number'] ?></span>
                      </td>
                      <td class="align-middle">
                        <?php if($claim['status'] == "requested"){ ?>
                        <a href="<?= base_url('events/sendingreward/').'/'.$claim['id'] ?>">
                          <button class="btn btn-info mb-0">Verification</a>
                        <?php } else if ($claim['status'] == "verification") { ?>
                        <a href="<?= base_url('events/successsendingreward/').'/'.$claim['id'] ?>">
                          <button class="btn btn-success mb-0">Success</a>
                        <?php } else if($claim['status'] == "success") { ?>
                        <button class="btn btn-success mb-0" disabled>Done</button>
                        <?php } ?>
                      </td>
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
    <!-- Modal edit -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5>Update Data Reward</h5>
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nama</label>
                <input type="text" class="form-control nama" id="inputnama" name="nama">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Deskripsi</label>
                <input type="text" class="form-control deskripsi" id="inputdeskripsi" name="deskripsi">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Price</label>
                <input type="text" class="form-control price" id="inputprice" name="price">
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Status</label>
                <select class="form-select" id="inputstatus" name="status">
                  <option value="claimable">Claimable</option>
                  <option value="unclaimable">Unclaimable</option>
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
    <!-- Modal Add -->
    <div class="modal fade" id="addRewardModal" tabindex="-1" aria-labelledby="addRewardModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5>Add Data Reward</h5>
            <h5 class="modal-title" id="addRewardModalLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" enctype="multipart/form-data" action="<?= base_url('events/addreward')?>">
            <div class="modal-body">

              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nama</label>
                <input type="text" class="form-control nama" id="addinputnama" name="nama">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Deskripsi</label>
                <input type="text" class="form-control deskripsi" id="addinputdeskripsi" name="deskripsi">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Price</label>
                <input type="text" class="form-control price" id="addinputprice" name="price">
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Status</label>
                <select class="form-select" id="addinputstatus" name="status">
                  <option value="claimable">Claimable</option>
                  <option value="unclaimable">Unclaimable</option>
                </select>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save New Reward</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal Delete-->
    <div class="modal fade" id="deleteRewardModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Anda yakin akan menghapus Reward
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger"><a href="#">Delete Reward</a></button>
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
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function (event) {
      // Button that triggered the modal
      var button = event.relatedTarget
      // Extract info from data-bs-* attributes
      var nama = button.getAttribute('data-nama')
      var price = button.getAttribute('data-price')
      var id = button.getAttribute('data-id')
      var status = button.getAttribute('data-status')
      var deskripsi = button.getAttribute('data-deskripsi')
      // If necessary, you could initiate an AJAX request here
      // and then do the updating in a callback.
      //
      // Update the modal's content.
      var modalTitle = exampleModal.querySelector('.modal-title')
      var modalBodyInputnama = document.getElementById('inputnama')
      var modalBodyInputdeskripsi = document.getElementById('inputdeskripsi')
      var modalBodyInputprice = document.getElementById('inputprice')
      var modalBodyInputstatus = document.getElementById('inputstatus')
      var modalform = exampleModal.querySelector('.modal-content form')

      modalform.action = '<?= base_url('events/updatedatareward')?>' + '/' + id

      modalBodyInputnama.value = nama
      modalBodyInputdeskripsi.value = deskripsi
      modalBodyInputprice.value = price
      modalBodyInputstatus.val(status)
    })
    var addRewardModal = document.getElementById('addRewardModal')
    addRewardModal.addEventListener('show.bs.modal', function (event) {
      // Button that triggered the modal
      var button = event.relatedTarget
      // Extract info from data-bs-* attributes


    })
    var deleteRewardModal = document.getElementById('deleteRewardModal')
    deleteRewardModal.addEventListener('show.bs.modal', function (event) {
      // Button that triggered the modal
      var button = event.relatedTarget
      // Extract info from data-bs-* attributes
      var id = button.getAttribute('data-id')
      var nama = button.getAttribute('data-nama')
      // If necessary, you could initiate an AJAX request here
      // and then do the updating in a callback.
      //
      // Update the modal's content.
      var modalbutton = deleteRewardModal.querySelector('.modal-footer a')
      var modalTitle = deleteRewardModal.querySelector('.modal-title')

      modalbutton.href = '<?= base_url('
      events / deletedatareward ')?>' + '/' + id
      modalTitle.textContent = 'Delete Reward ' + nama
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