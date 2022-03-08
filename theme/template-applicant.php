<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/owl-carousel/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="../assets/owl-carousel/assets/owl.theme.default.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../assets/owl-carousel/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/css/style.css" />

    <title><?= $title;?></title>
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
            <a class="navbar-brand" href="../">
                <img width="190" height="45" src="../assets/logo/logopolcar.png" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link text-semibold text-blue" aria-current="page" href="#">Home</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link text-semibold text-blue" href="<?php echo web_root; ?>applicant-page/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-semibold text-blue <?php if(isset($_GET['q'])) { if($_GET['q']=='Contact'){ echo 'active'; }else{ echo ''; }}  ?>" href="<?php echo web_root; ?>applicant-page/index.php?view=cv">Curriculum Vitae</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-semibold text-blue" href="<?php echo web_root; ?>applicant-page/index.php?view=career">Career</a>
                    </li>
                    <center>
                        <div class="dropdown d-none d-sm-block d-md-none">
                            <img style="width: 55px; height: 55px; border-radius: 50%;"
                                src="../assets/images/_DSC6958.JPG" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <ul class="dropdown-menu mt-3 p-3" style="right: 0 !important;
                        left: auto !important;" aria-labelledby="navbarDropdownMenuLink">
                                <h4><b>Adam Firdaus</b></h4>
                                <div class="menu mt-3">
                                    <li style="justify-content: space-between"><a class="dropdown-item" href="#"><i
                                                class="fa fa-bookmark fa-lg me-2"></i>
                                            Lowongan
                                            Tersimpan</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-cogs fa-lg me-2"></i>
                                            Pengaturan
                                            Akun</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="fa fa-question-circle fa-lg me-2"></i>
                                            Butuh
                                            Bantuan
                                            ?</a>
                                    </li>
                                    <hr>
                                    <li><a class="dropdown-item" href="<?php echo web_root; ?>logout.php"><i class="fa fa-sign-out fa-lg me-2"></i>
                                            Logout</a>
                                    </li>
                                </div>

                            </ul>
                        </div>
                    </center>
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
                <div class="d-flex ms-auto">
                    <div class="dropdown d-sm-none d-md-block ">
                        <img style="width: 55px; height: 55px; border-radius: 50%;" src="../assets/images/_DSC6958.JPG"
                            id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <ul class="dropdown-menu mt-3 p-3" style="right: 0 !important;
                        left: auto !important;" aria-labelledby="navbarDropdownMenuLink">
                            <h4><b>Adam Firdaus</b></h4>
                            <div class="menu mt-3">
                                <li style="justify-content: space-between"><a class="dropdown-item" href="#"><i
                                            class="fa fa-bookmark fa-lg me-2"></i>
                                        Lowongan
                                        Tersimpan</a></li>
                                <li><a class="dropdown-item" href="<?php echo web_root; ?>applicant-page/index.php?view=accounts"><i class="fa fa-cogs fa-lg me-2"></i> Pengaturan
                                        Akun</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-question-circle fa-lg me-2"></i>
                                        Butuh
                                        Bantuan
                                        ?</a>
                                </li>
                                <hr>
                                <li><a class="dropdown-item" href="<?php echo web_root; ?>logout.php"><i class="fa fa-sign-out fa-lg me-2"></i>
                                        Logout</a>
                                </li>
                            </div>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- modal login -->

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
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">NIK/NIM</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" />
                                <div id="emailHelp" class="form-text">
                                    Gunakan NIM/NIK yang telah terdaftar.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" />
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                <label class="form-check-label" for="exampleCheck1">Ingat Saya
                                </label>
                            </div>
                            <butto type="submit" class="btn btn-primary w-100">
                                Submit
                            </butto n>
                        </form>
                        <div class="another-action text-center mt-4 text-blue">
                            <p>
                                Belum Punya Akun ? <a href="register.html">Daftar Disini</a>
                            </p>
                            <a href="#" class="text-bold text-blue" style="text-decoration: none">Lupa Password ?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal login -->

    <!-- <img
      src="https://images.unsplash.com/photo-1530435460869-d13625c69bbf?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8MTB8fHdlYnNpdGV8ZW58MHwwfHx8MTYyMTQ0NjkyNg&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&amp;h=768"
      class="d-block mx-lg-auto img-fluid"
      alt=""
      loading="lazy"
    /> -->
    <?php require_once($content);?>

    <hr>
    <!-- footer -->
    <div class="container">
        <div class="row p-5 pb-5 pt-5">
            <div class="col-md-3">
                <img src="../assets/logo/logopolcar.png" width="190" height="45" alt="">
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
                        <a href="#"><img src="../assets/icons/facebook.png" alt=""></a>
                        <a href="#"><img src="../assets/icons/Twitter.png" alt=""></a>
                        <a href="#"><img src="../assets/icons/Instagram.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->
</body>

</html>