<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        HC Applications - Cek Rewards
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
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="#">
                            HC Applications
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                        href="#">
                                        <i class="fa fa-info opacity-6 text-red me-1"></i>
                                        HC Information - Comming Soon
                                    </a>
                                </li>
                                <!-- <li class="nav-item active">
                                    <a class="nav-link me-2" href="<?= base_url('claimreward') ?>">
                                        <i class="fa fa-check-square-o opacity-6 text-dark me-1"></i>
                                        Cek Rewards Akhlak
                                    </a>
                                </li> -->
                                <!--<li class="nav-item">
                  <a class="nav-link me-2" href="#">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Sign Up
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="#">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Sign In
                  </a>
                </li>-->
                            </ul>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5"><?= $dataemployee['nama_emp'] ?> -
                            <?= $dataemployee['nik_inf'] ?></h1>
                        <p class="text-lead text-white">LIST REWARD YANG BISA ANDA CLAIM</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4" style="margin: 5px; padding: 5px;">
                            <div class="card-header pb-0">
                                <h6>Jumlah Poin Akhlak <?= $poin ?> </h6>
                            </div>
                            <div class="d-flex flex-wrap">
                                <?php 
                            foreach($datareward as $reward){
                                $done = false; 
                                if(!empty($dataclaimreward)){
                                    
                                    foreach($dataclaimreward as $claim){
                                        if($claim['reward_id'] == $reward['id']){
                                            $done = true;
                                            $status = $claim['status'];
                                        }
                                    }
                                }
                               
                                
                            ?>
                                <!-- Card Reward -->
                                <div class="card-body px-5 pt-0 pb-3 mt-2">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-header" style="padding: 1.5em 1.5em 0em 1.5em; ;">
                                            <?= $reward['status'] ?>
                                        </div>
                                        <div class="card-body" style="padding-top: 0.5em;">
                                            <h5 class="card-title"><?= $reward['nama'] ?></h5>
                                            <p class="card-text"> <?= $reward['deskripsi'] ?></p>
                                            <p class="card-text" style="font-weight: bold;"> Price
                                                <?= $reward['price'] ?> Poin</p>
                                            <?php if($poin >= $reward['price'] && $done === false){ ?>
                                            <a href="<?= base_url('claimthis').'/'.$reward['id'].'/'.$dataemployee['nik_inf'] ?>"
                                                class="btn btn-success">Claim</a>
                                            <?php } else if($poin < $reward['price'] && $done === false) { ?>
                                            <button class="btn btn-secondary" style="margin-bottom: 0.5em;"
                                                disabled>Claim</button>
                                            <p class="fst-italic" style="font-size: 10px; ">*Poin anda tidak mencukupi
                                            </p>
                                            <?php } else { 
                                                if($status == "requested"){ ?>
                                            <button class="btn btn-info" style="margin-bottom: 0.5em;"
                                                disabled><?= $status ?></button>
                                            <?php } else if($status == "verification"){ ?>
                                            <button class="btn btn-secondary" style="margin-bottom: 0.5em;"
                                                disabled><?= $status ?></button>
                                            <?php } else if($status == "success"){ ?>
                                            <button class="btn btn-success" style="margin-bottom: 0.5em;"
                                                disabled><?= $status ?></button>
                                            <?php } ?>
                                            <p class="fst-italic" style="font-size: 10px;">*Sudah di claim </p>

                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>



                            </div>

                        </div>
                    </div>
                </div>
                <div class="card mb-4" style="margin: 5px; padding: 5px;">
                    <div class="card-header pb-0">
                        <div class="d-flex">
                            <h6>Data Claim Reward Anda </h6>
                        </div>
                    </div>
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                                placeholder="Type here...">
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Deskripsi</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tahun</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Quarter</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Price</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>

                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                    foreach ($dataclaimreward as $claim) {
                    ?>

                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"> <?= $claim['nama']; ?> </p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"> <?= $claim['deskripsi']; ?> </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"> <?= $claim['tahun']; ?> </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"> <?= $claim['quarter']; ?> </p>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs text-secondary mb-0"><?php echo $claim['price'] ?></p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold"><?php echo $claim['status'] ?></span>
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
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>