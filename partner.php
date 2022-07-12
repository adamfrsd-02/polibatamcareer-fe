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
    <!-- career section -->
    <?php
    //require_once("include/initialize.php");
    include("config/conn.php");
    
    $query = "SELECT * FROM tblcompany";
    $result = mysqli_query($koneksi, $query);

    $count = mysqli_num_rows($result);


    ?>
    <div class="container py-5">
        <div class="header-partner mb-4">
            <h2 class="header-title">Partner Industri</h2>
            <div class="header-subtitle">
                <span class="header-subtitle">Ada <b class="highlighted"><?= $count ?> perusahaan</b> yang
                    yang bekerja sama dengan <b class="highlighted">Polibatam</b></span>
            </div>
        </div>
        <div class="body-partner">
            <div class="row">
                <!-- items -->
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                     <div class="col-md-4 mb-3">
                    <div class="card p-4 px-3 h-100" style="width: auto; border-radius: 15px">
                        <div class="card-heading">
                            <div class="career-overview">
                                <div class="d-flex justify-content-between">
                                    <div class="mou-label <?= ($row['COMPANYSTATUS'] == 'VERIFIED') ? 'bg-myblue' : 'bg-myorange'  ?> text-white text-center my-auto py-2 px-5"
                                        style="border-radius: 15px;"><b><?= strtolower($row['COMPANYSTATUS']) ?></b>
                                    </div>
                                    <div class="salary text-start w-25"><?= $row['COMPANYADDRESS']?></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="logo p-3">
                                <img src="assets/logo/perusahaan2.png" class="w-100" alt="">
                            </div>
                            <div class="career-jobdesc py-2">
                                <p class="job-title">
                                    <?= $row['COMPANYNAME']?>
                                </p>
                                <p class="job-overview">
                                    <?= $row['COMPANYMISSION']?>
                                </p>
                            </div>
                            <button class="px-5 py-3 rounded w-100 text-white bg-myorange"
                                style="border-radius: 10px !important; border-style: none;">Detail Perusahaan</button>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                <!-- end items -->
                
            </div>
        </div>
    </div>
    <!-- end career section -->


    <!-- contact us -->
    <div class="contact-us mt-5 pb-5 mb-4" id="contact">
        <div class="container py-4">
            <center>
                <div class="header">
                    <p class="header-title">Butuh Bantuan ?</p>
                    <p class="header-desc">
                        Silahkan hubungi kami lebih lanjut melalui <br />
                        beberapa media informasi kami.
                    </p>
                </div>
            </center>
            <div class="body mt-5">
                <div class="row">
                    <div class="col-md-5 p-3 px-5 py-5 rounded-start" style="background-color: #183a64;">
                        <div class="content">
                            <div class="head">
                                <p class="header-title text-white">Kontak Kami</p>
                                <p class="text-white" style="margin-top: -10px">
                                    Isi form yang tersedia dengan data dan informasi yang tepat
                                </p>
                            </div>
                            <div class="body mt-5">
                                <div class="phone">
                                    <img src="assets/icons/phone.png" width="30" height="30" alt="" />
                                    <span class="text-white ms-3">0891-2718-281</span>
                                </div>
                                <div class="messages mt-4">
                                    <img src="assets/icons/message.png" width="30" height="30" alt="" />
                                    <span class="text-white ms-3">admin@polibatam.ac.id</span>
                                </div>
                                <div class="place mt-4 d-flex">
                                    <img src="assets/icons/bookmark.png" width="30" height="35" alt="" />
                                    <span class="text-white ms-3 text-start">Batam Centre, Jl. Ahmad Yani, Tlk. Tering,
                                        Kec.
                                        Batam Kota,
                                        Kota Batam, Kepulauan Riau 29461</span>
                                </div>
                            </div>
                            <div class="footer mt-5">
                                <div class="d-flex justify-content-between">
                                    <img src="assets/icons/facebook.png" alt="">
                                    <img src="assets/icons/Twitter.png" alt="">
                                    <img src="assets/icons/Instagram.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 p-5 rounded-end" style="background-color: white">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example1m">First name</label>
                                        <input type="text" id="form3Example1m" class="form-control form-control-lg" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example1n">Last name</label>
                                        <input type="text" id="form3Example1n" class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example8">Jenis Instansi</label>
                                <input type="text" id="form3Example8" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example8">Nama Instansi</label>
                                <input type="text" id="form3Example8" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example8">Pertanyaan / Pesan</label>
                                <textarea type="text" id="form3Example8"
                                    class="form-control form-control-lg"></textarea>
                            </div>

                            <div class="pt-3 mb-3" style="margin-top: -5px">
                                <button type="button" class="btn btn-secondary btn-lg ms-2 fs-6 text-white"
                                    style="width: 40%; height: 50px;">
                                    Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact us -->
    <div class="faq" id="faq">
        <div class="container mt-5 mb-5">
            <center>
                <div class="header">
                    <p class="header-title">Frequently Asked Question</p>
                    <p class="header-desc mb-4">
                        Berikut adalah pertanyaan yang sering ditanyakan
                    </p>
                </div>
            </center>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Apakah Polibatam Career Gratis ?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Polibatam Career sepenuhnya bebas biaya !</strong> Platform ini ditujukan untuk
                            alumni yang ingin mencari kerjaan tanpa dipungut biaya sedikitpun
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Apakah Aman ?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Pasti !</strong>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Apakah Dijamin Akan Mendapatkan Pekerjaan ?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Daftar aja dulu
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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