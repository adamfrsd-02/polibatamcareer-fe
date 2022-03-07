
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