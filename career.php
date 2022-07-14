<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/owl-carousel/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/owl-carousel/assets/owl.theme.default.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/owl-carousel/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/style.css" />

    <title>Polibatam Career</title>
    <style>
        .custom-checkbox {
            min-width: 0.75em;
            min-height: 0.75em;
            margin-right: 0.75em;
            border: 2px solid currentColor;
            border-radius: 100%;
            display: inline-block;
        }
    </style>
</head>

<body>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel({
                margin: 20,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                },
                loop: true,
                // nav: true,
                // navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
            });
        });
    </script>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img width="190" height="45" src="assets/logo/logopolcar.png" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-semibold text-blue" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-semibold text-blue" href="index.php#company">Our Partner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-semibold text-blue" href="index.php#career">Career</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-semibold text-blue" href="index.php#contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-semibold text-blue" href="index.php#faq">FAQ</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Dropdown
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </li> 
            <li class="nav-item">
              <a
                class="nav-link disabled"
                href="#"
                tabindex="-1"
                aria-disabled="true"
                >Disabled</a
              >
            </li>-->
                </ul>
                <div class="d-flex">
                    <button class="btn btn-outline-blue shadow-sm px-5" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- modal login -->

    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="header-body p-5">
                        <p class="text-bold text-md text-blue">Sign In</p>
                        <p class="text-blue" style="margin-top: -6px">
                            Silahkan menggunakan identitas yang terdaftar
                        </p>
                        <!-- form -->
                        <form method="post" action="process.php?action=login">
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIK/NIM</label>
                                <input type="text" class="form-control" id="nim"
                                    aria-describedby="nimHelp" name="USERNAME"  value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" />
                                <div id="nimHelp" class="form-text">
                                    Gunakan NIM/NIK yang telah terdaftar.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="PASS" />
                            </div>
                            <!-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
                                <label class="form-check-label" for="remember">Ingat Saya
                                </label>
                            </div> -->
                            <button type="submit" class="btn btn-primary w-100">
                                Submit
                            </button>
                        </form>
                        <div class="another-action text-center mt-4 text-blue">
                            <p>
                                Belum Punya Akun ? <a href="#">Daftar Disini</a>
                            </p>
                            <!-- <a href="#" class="text-bold text-blue" style="text-decoration: none">Lupa Password ?</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal login -->
    <!-- end modal login -->

    <!-- <img
      src="https://images.unsplash.com/photo-1530435460869-d13625c69bbf?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8MTB8fHdlYnNpdGV8ZW58MHwwfHx8MTYyMTQ0NjkyNg&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&amp;h=768"
      class="d-block mx-lg-auto img-fluid"
      alt=""
      loading="lazy"
    /> -->
    <!-- career section -->
    <div class="container">
        <div class="py-5">
            <!-- <div class="header">
                <h2 class="header-title w-50">
                    Mungkin beberapa lowongan kerja ini cocok untukmu
                </h2>
            </div> -->
            <!-- search section -->
            <!-- <div class="form-search">
                <form action="career.php?keyword=" method="get">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label for="" class="mb-2">Nama Perusahaan</label>
                            <input type="text" name="keyword" class="form-control" placeholder="masukkan nama perusahaan">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="mb-2">Jenis Program</label>
                            <select name="" class="form-select" id="">
                                <option value="">pilih jenis program</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="mb-2">Tipe Pekerjaan</label>
                            <select name="" class="form-select" id="">
                                <option value="">pilih tipe pekerjaan</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="mb-2">Urut Berdasarkan</label>
                            <select name="" class="form-select" id="">
                                <option value="">urut berdasarkan jangka waktu</option>
                            </select>
                        </div>
                    </div>
                    <button class="px-5 py-3 rounded bg-myblue text-white"
                        style="border-radius: 10px !important; border-style: none;">Cari
                        Pekerjaan</button>
                </form>
            </div> -->
            <!-- <hr> -->
            <!-- end search section -->
            <!-- search result section -->
                <!-- <div class="row"> -->
                <!-- <div class="header-subtitle py-3">
                    <span class="header-subtitle">Kami menemukan <b class="highlighted">3 Lowongan Kerja</b> yang
                        sesuai</span>
                </div>
                <div class="owl-carousel mt-1 px-2">
                    <items -->
                    <!-- <div class="card p-4 px-4" style="width: auto; border-radius: 20px">
                        <div class="card-heading">
                            <div class="career-overview">
                                <div class="d-flex justify-content-between">
                                    <div class="job-label py-2 px-4">UX Design</div>
                                    <div class="salary text-start">Rp. 5.000.000 <br> per bulan</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="logo p-3">
                                <img src="assets/logo/perusahaan.png" alt="">
                            </div>
                            <div class="career-jobdesc py-2">
                                <p class="job-title">
                                    Web Designer
                                </p>
                                <p class="job-overview">
                                    Kami mencari alumni yang siap untuk terjun langsung dalam proyek nyata di industri .
                                    . .
                                </p>
                            </div>
                            <button class="px-5 py-3 rounded w-100 text-white bg-myorange"
                                style="border-radius: 10px !important; border-style: none;">Apply</button>
                        </div>
                    </div> -->
                    <!-- itemss -

                </div> -->
            <!-- </div> -->
            <!-- end search result section -->
            <!-- new job section -->
            <div class="row">
                <div class="col-md-4">
                        <div style="display: flex; flex-direction: row;" class="mb-1">
                            <i class="fa fa-chevron-down mt-1"></i>
                            <h5 class="ms-2">Job Filter</h5>
                        </div>
                    <hr class="w-50" style="margin-top: -0.1px">
                    <!-- box -->
                    <form action="">
                    <div class="card p-4">
                        <div class="top-section">
                            <p>Search</p>
                            <div class="search-box" style="margin-top: -5px">
                                <input type="text" class="form-control" placeholder="Search" />
                            </div>
                        </div>
                        <div class="bottom-section mt-5">
                            <p>Offer Type :</p>
                            <div class="checkbox row" style="justify-content: between">
                                <label class="mb-2">
                                    <input type="checkbox" value="" class="custom-checkbox">
                                    Full Time
                                </label>
                                
                                <label class="mb-2">
                                    <input type="checkbox" value="" class="custom-checkbox">
                                    Part Time
                                </label>
                                
                                <label class="mb-2">
                                    <input type="checkbox" value="" class="custom-checkbox">
                                    Internship
                                </label>


                            </div>
                        </div>

                        <button class="px-2 py-2 rounded w-100 text-white bg-myblue mt-3"
                                            style="border-radius: 10px !important; border-style: none;" data-bs-target="#exampleModal" data-bs-toggle="modal">Search</button>

                    </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="latest-job ">
                        
                        <?php
                            include 'config/conn.php';
    
                            $query = "SELECT * FROM tbljob
                            INNER JOIN tblcompany ON tbljob.COMPANYID=tblcompany.COMPANYID ORDER BY tbljob.DATEPOSTED DESC";
                            $res = $koneksi->query($query);

                            //count result
                            $count = $res->num_rows;
    
                            echo "<p><b> $count Jobs Found</b></p>";
                            foreach($res as $row) {
                        ?>
                        <div class="row mt-1 px-2 py-2">
                            <!-- items -->
                            <div class="card py-4 px-4">
                                <div class="row">
                                    <div class="col-md-2 my-auto">
                                        <img class="border border-primary rounded-circle" width="90" height="90" src="assets/upload/company_logo/<?= ($row['COMPANYLOGO']) ? $row['COMPANYLOGO'] : 'perusahaan2.png' ?>" alt="">
                                    </div>
                                    <div class="col-md-4">
                                        <h5>
                                            <?= $row['OCCUPATIONTITLE']?>
                                        </h5>
                                        <p style="font-size: 1.7vh">
                                        <?= $row['COMPANYNAME']?>
                                        </p>
                                        <div class="job-label py-2 px-4 w-75"><?= $row['CATEGORY']?></div>
                                    </div>
                                    <div class="col-md-3 my-auto">
                                        <div style="display:flex;" class="my-auto"><i class="fa fa-map-marker"></i><p style="font-size: 1.8vh; margin-left: 10px"><?= $row['COMPANYADDRESS']?></p></div>
                                    </div>
                                    <div class="col-md-3">
                                    <button class="px-2 py-3 rounded w-100 text-white bg-myorange"
                                    style="border-radius: 10px !important; border-style: none;data-bs-target="#exampleModal" data-bs-toggle="modal">See Details</button>
                                            <div class="salary text-start mt-3" style="font-size: 1.7vh">Rp. <?= number_format($row['SALARIES'],2) ?> <br> per bulan</div>
                                    </div>
                                </div>
                                <!-- <div class="single-job-items" style="">
                                    <div class="job-items">
                                        <div class="logo p-3">
                                            <center>
                                            <img class="border border-primary rounded-circle" width="140" height="140" src="assets/upload/company_logo/<?= ($row['COMPANYLOGO']) ? $row['COMPANYLOGO'] : 'perusahaan2.png' ?>" alt="">
                                            </center>
                                        </div>
                                        <div class="career-overview">
                                            <div class="career-jobdesc py-2">
                                                <h4>
                                                    <?= $row['OCCUPATIONTITLE']?>
                                                </h4>
                                                <?= $row['COMPANYNAME']?>
                                                <?= $row['COMPANYADDRESS']?>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="job-label py-2 px-4"><?= $row['CATEGORY']?></div>
                                                <div class="salary text-start">Rp. <?= number_format($row['SALARIES'],2) ?> <br> per bulan</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer" style="border: none !important; background: none !important;">
                                    <button class="px-5 py-3 rounded w-100 text-white bg-myorange"
                                            style="border-radius: 10px !important; border-style: none;" data-bs-target="#exampleModal" data-bs-toggle="modal">See Details</button>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        <!-- itemss -->
    
                    </div>
                </div>
            </div>
            <!-- end new job section -->
        </div>
    </div>
    <!-- end career section -->


    <hr>
    <!-- footer -->
    <div class="container">
        <div class="row p-5 pb-5 pt-5">
            <div class="col-md-3">
                <img src="assets/logo/logopolcar.png" width="190" height="45" alt="">
            </div>
            <div class="col-md-3">
                <p class="text-blue text-bold">
                    POLIBATAM
                </p>
                <div class="link text-blue">
                    <ul style="list-style: none; margin-left: -32px;">
                        <li><a href="#" class="nav-linku">Jurnal Polibatam</a></li>
                        <li><a href="#" class="nav-linku">Dirjen Pendidikan Vokasi</a></li>
                        <li><a href="#" class="nav-linku">Kemendikbud RI</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <p class="text-blue text-bold">
                    JURUSAN
                </p>
                <div class="link text-blue">
                    <ul style="list-style: none; margin-left: -32px;">
                        <li><a href="#" class="nav-linku">Manajemen Bisnis</a></li>
                        <li><a href="#" class="nav-linku">Teknik Informatika</a></li>
                        <li><a href="#" class="nav-linku">Teknik Mesin</a></li>
                        <li><a href="#" class="nav-linku">Teknik Elektronika</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <p class="text-blue text-bold">
                    POLIBATAM CAREER
                </p>
                <div class="link text-blue">
                    <ul style="list-style: none; margin-left: -32px;">
                        <li><a href="#" class="nav-linku">Lowongan Kerja</a></li>
                        <li><a href="#" class="nav-linku">Kerjasama Industri</a></li>
                        <li><a href="#" class="nav-linku">Frequently Asked Question</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="py-3" style="background-color: grey;">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <p class="text-white mt-3 text-bold">Polibatam Career ©2021. Created with <i
                            class="fa fa-heart text-danger fa-lg"></i> by IA
                        Polibatam</p>
                </div>
                <div class="col-md-3">
                    <div class="social-media mt-3 d-flex justify-content-between">
                        <a href="#"><img src="assets/icons/facebook.png" alt=""></a>
                        <a href="#"><img src="assets/icons/Twitter.png" alt=""></a>
                        <a href="#"><img src="assets/icons/Instagram.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->
</body>

</html>