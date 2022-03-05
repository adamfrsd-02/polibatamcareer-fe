<?php
   require_once("include/initialize.php");
   include("config/conn.php");

   if (isset($_SESSION['APPLICANTID'])) { 
        $sql = "SELECT count(*) as 'COUNTNOTIF' FROM `tbljob` ORDER BY `DATEPOSTED` DESC";
        $mydb->setQuery($sql);
        $showNotif = $mydb->loadSingleResult();
        $notif =isset($showNotif->COUNTNOTIF) ? $showNotif->COUNTNOTIF : 0;
    
    
        $applicant = new Applicants();
        $appl  = $applicant->single_applicant($_SESSION['APPLICANTID']);
    
        $sql ="SELECT count(*) as 'COUNT' FROM `tbljobregistration` WHERE `PENDINGAPPLICATION`=0 AND `HVIEW`=0 AND `APPLICANTID`='{$appl->APPLICANTID}'";
        $mydb->setQuery($sql);
        $showMsg = $mydb->loadSingleResult();
        $msg =isset($showMsg->COUNT) ? $showMsg->COUNT : 0;
    
    
    
    } 
?>


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
                margin: 4,
                items: 2,
                loop: true,
            });
        });
    </script>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
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
                        <a class="nav-link text-semibold text-blue" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-semibold text-blue" href="#company">Our Partner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-semibold text-blue" href="#career">Career</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-semibold text-blue" href="#contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-semibold text-blue" href="#faq">FAQ</a>
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
                <?php if (!isset($_SESSION['APPLICANTID'])) { ?>
                    <div class="d-flex">
                    <button class="btn btn-outline-blue shadow-sm px-5" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Login
                    </button>
             <?php }else{ ?>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="<?php echo web_root.'applicant-page/';?>"><i class="fa fa-user"></i> Howdy, <?php echo $appl->FNAME. ' '.$appl->LNAME ;?></a></li>
          
                        <li class="nav-item"><a class="nav-link" href="<?php echo web_root.'logout.php';?>"><i class="fa fa-user"></i> Logout</a></li>
                    </ul>
                </div>
             <?php } ?> 
                
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
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
                                <label class="form-check-label" for="remember">Ingat Saya
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                Submit
                            </button>
                        </form>
                        <div class="another-action text-center mt-4 text-blue">
                            <p>
                                Belum Punya Akun ? <a href="/register">Daftar Disini</a>
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
    <!-- hero section -->
    <div id="carouselExampleControls" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner container mt-4">
            <!-- item carousel -->
            
            <div class="carousel-item active">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="left-text container">
                            <p class="text-bold text-blue text-xl">
                                Informasi <br />
                                Lowongan Kerja <br />
                                Alumni & Mahasiswa
                            </p>
                            <p class="text-md text-blue text-regular">
                                Gunakan identitas mahasiswamu, dan mulailah untuk mencari
                                kerja melalui platform resmi Politeknik Negeri Batam.
                            </p>
                            <a class="btn btn-primary pt-3" href="career.html">Lihat Lowongan</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="assets/images/hero.png" class="d-block w-100 container" alt="..." />
                    </div>
                </div>
            </div>
            
            <!-- end item carousel -->
            <!-- item carousel -->
            
            <!-- end item carousel -->
            <!-- item carousel -->
            <!-- <div class="carousel-item">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="left-text container">
                            <p class="text-bold text-blue text-xl">
                                Informasi <br />
                                Lowongan Kerja <br />
                                Alumni & Mahasiswa
                            </p>
                            <p class="text-md text-blue text-regular">
                                Gunakan identitas mahasiswamu, dan mulailah untuk mencari
                                kerja melalui platform resmi Politeknik Negeri Batam.
                            </p>
                            <button class="btn btn-primary">Lihat Lowongan</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="assets/images/hero.png" class="d-block w-100 container" alt="..." />
                    </div>
                </div>
            </div> -->
            <!-- end item carousel -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- end hero section -->
    <!-- Company section -->
    <div class="company mb-4 pb-5 pt-4" id="company">
        <div class="container">
            <center>
                <div class="header">
                    <p class="header-title">Partner Industri</p>
                    <p class="header-desc">
                        Untuk meningkatkan kapasitas dan kerjasama yang berkualitas.
                        <br />
                        Polibatam bekerja sama dengan beberapa perusahaan besar.
                    </p>
                </div>
                <div class="body mt-5 mb-5">
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <img src="assets/logo/perusahaan.png" alt="" />
                        </div>
                        <div class="col-md-4">
                            <img src="assets/logo/perusahaan.png" alt="" />
                        </div>
                        <div class="col-md-4">
                            <img src="assets/logo/perusahaan.png" alt="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="assets/logo/perusahaan.png" alt="" />
                        </div>
                        <div class="col-md-4">
                            <img src="assets/logo/perusahaan.png" alt="" />
                        </div>
                        <div class="col-md-4">
                            <img src="assets/logo/perusahaan.png" alt="" />
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <a href="partner.html" class="btn btn-secondary text-center mt-auto pt-3">Lihat Selengkapnya</a>
                </div>
            </center>
        </div>
    </div>
    <!-- end Company section -->
    <!-- <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-2">
            <img src="assets/logo/perusahaan2.png" alt="" />
          </div>
          <div class="col-md-4">
            <h5 class="card-title text-blue"><b>Web-Designer</b></h5>
            <p class="card-text text-blue">
              Kami mencari alumni yang siap untuk terjun langsung dalam proyek
              nyata . . .
            </p>
            <div class="label-wrapper row">
              <div class="label label-orange">UI Design</div>
              <div class="label label-blue mt-2">UX Design</div>
            </div>
          </div>
          <div class="col-md-2">
            <p class="card-title text-bold text-blue">Rp. 5.000.000</p>
            <p class="card-text">per bulan</p>
          </div>
        </div>
      </div>
    </div> -->
    <!-- loker section -->
    <div class="" id="career">
        <div class="lowker">
            <div class="container">
                <div class="header text-center">
                    <p class="header-title">Lowongan Kerja</p>
                    <p class="header-desc">
                        Lowongan kerja tersedia, coba apply. <br />
                        Siapa tahu kamu cocok dan diterima ?
                    </p>
                </div>
                <div class="title-head text-center">
                    <p>
                        <i class="fa fa-chevron-left me-4"></i> slide
                        <i class="fa fa-chevron-right ms-4"></i>
                    </p>
                </div>
            </div>
            <div class="owl-carousel mt-1 px-2">
                <!-- items -->
                <?php
                $query = mysqli_query($koneksi, "SELECT OCCUPATIONTITLE, SALARIES, JOBDESCRIPTION, CATEGORY, OCCUPATIONTITLE, COMPANYLOGO FROM tbljob LEFT JOIN tblcompany ON tbljob.COMPANYID = tblcompany.COMPANYID");
                //print_r($query);
                foreach($query as $item) :
            ?>
                <div class="card py-2 h-100" style="width: auto; height:100%; border-radius: 20px">
                    <div class="card-body h-100">
                        <div class="row mt-0 h-100">
                            <div class="col-md-3 h-100">
                                <img src="assets/upload/company_logo/<?= $item['COMPANYLOGO']?>" class="align-middle" />
                            </div>
                            <div class="col-md-6 h-100">
                                <h5 class="card-title text-blue">
                                    <b><?php echo $item['OCCUPATIONTITLE']?></b>
                                </h5>
                                <p class="card-text text-blue text-justify">
                                    <?= $item['JOBDESCRIPTION']?>
                                </p>
                                <div class="label-wrapper row">
                                    <div class="label label-orange me-2"><?= $item['CATEGORY']?></div>
                                    <!-- <div class="label label-blue">UX Design</div> -->
                                </div>
                            </div>
                            <div class="col-md-3 h-100>
                                <p class="card-title text-bold text-blue">Rp. <?= number_format($item['SALARIES'],00,',','.')?>,-</p>
                                <p class="card-text text-blue" style="margin-top: -10px">
                                    per bulan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <!-- itemss -->
                <!-- items -->
                <!-- <div class="card py-2" style="width: auto; border-radius: 20px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="assets/logo/perusahaan2.png" class="w-100 h-100" alt="" />
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title text-blue">
                                    <b>Web-Designer</b>
                                </h5>
                                <p class="card-text text-blue text-justify">
                                    Kami mencari alumni yang siap untuk terjun langsung dalam
                                    proyek nyata . . .
                                </p>
                                <div class="label-wrapper row">
                                    <div class="label label-orange me-2">UI Design</div>
                                    <div class="label label-blue">UX Design</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="card-title text-bold text-blue">Rp. 5.000.000</p>
                                <p class="card-text text-blue" style="margin-top: -10px">
                                    per bulan
                                </p>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- itemss -->
                <!-- items -->
                <!-- <div class="card py-2" style="width: auto; border-radius: 20px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="assets/logo/perusahaan2.png" class="w-100 h-100" alt="" />
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title text-blue">
                                    <b>Web-Designer</b>
                                </h5>
                                <p class="card-text text-blue text-justify">
                                    Kami mencari alumni yang siap untuk terjun langsung dalam
                                    proyek nyata . . .
                                </p>
                                <div class="label-wrapper row">
                                    <div class="label label-orange me-2">UI Design</div>
                                    <div class="label label-blue">UX Design</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="card-title text-bold text-blue">Rp. 5.000.000</p>
                                <p class="card-text text-blue" style="margin-top: -10px">
                                    per bulan
                                </p>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- itemss -->
                <!-- items -->
                <!-- <div class="card py-2" style="width: auto; border-radius: 20px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="assets/logo/perusahaan2.png" class="w-100 h-100" alt="" />
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title text-blue">
                                    <b>Web-Designer</b>
                                </h5>
                                <p class="card-text text-blue text-justify">
                                    Kami mencari alumni yang siap untuk terjun langsung dalam
                                    proyek nyata . . .
                                </p>
                                <div class="label-wrapper row">
                                    <div class="label label-orange me-2">UI Design</div>
                                    <div class="label label-blue">UX Design</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="card-title text-bold text-blue">Rp. 5.000.000</p>
                                <p class="card-text text-blue" style="margin-top: -10px">
                                    per bulan
                                </p>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- itemss -->
            </div>
            <div class="container">
                <center>
                    <div class="footer">
                        <button class="btn btn-secondary text-center mt-5" onclick="location.href='career.html'">Lowongan
                            Lainnya</button>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <!-- end loker section -->

    <!-- contact us -->
    <div class=" contact-us mt-5 pb-5 mb-4" id="contact">
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
                                    <span class="text-white ms-3 text-start">Batam Centre, Jl. Ahmad
                                        Yani, Tlk. Tering,
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
                                        <label class="form-label" for="form3Example1m">First
                                            name</label>
                                        <input type="text" id="form3Example1m" class="form-control form-control-lg" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example1n">Last
                                            name</label>
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
                                <label class="form-label" for="form3Example8">Pertanyaan /
                                    Pesan</label>
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
                            <strong>Polibatam Career sepenuhnya bebas biaya !</strong> Platform ini
                            ditujukan untuk
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