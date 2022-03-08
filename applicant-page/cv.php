
    <!-- progress tracker -->
    <div class="container py-3">
        <div class="header">
            <h2 class="header-title w-50">
                Silahkan isi data dengan informasi yang valid
            </h2>
        </div>
        <hr>
        <div class="heading" style="display: flex; flex-direction: row; justify-content: space-between;">
            <p style="font-size: 1.5vh">Kamu sedang berada di halaman : Curriculum Vitae / <b>CV Maker</b></p>
            <!-- <p style="font-size: 1.5vh;">Ada <b>2 Lamaran</b> yang kamu ajukan</p> -->
        </div>
        <!-- body cv -->
        <!-- profile section -->
        <center>
            <div class="header-profile row mt-4">
                <div class="profile-photo col-md-6">
                    <img style="width: 180px; height: 180px; border-radius: 50%;" src="../assets/images/_DSC6958.JPG"
                        alt="foto profile">
                </div>
                <div class="profile-info col-md-6 text-start">
                    <p class="header-title">Adam Firdaus</p>
                    <h3 class="text-muted" style="margin-top: -10px;">4311901038</h3>
                    <h3 class="text-muted">Teknik Informatika</h3>

                </div>
            </div>
        </center>
        <?php
            $applicantid = $_SESSION['APPLICANTID'];
            $sql = "SELECT * FROM tblapplicants where APPLICANTID = '$applicantid'  ";
            $mydb->setQuery($sql);
            $cur = $mydb->loadSingleResult();

            $sqlcv = "SELECT * FROM tbl_curriculum_vitae where APPLICANTID = '$applicantid'";
            $mydb->setQuery($sqlcv);
            $rescv = $mydb->loadSingleResult();
        ?>
        <div class="body-profile mt-5">
            <div class="card p-5">
                <form action="controller.php?action=edit" method="post">
                    <label for="basic-url" class="form-label">Profil & Kontak</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="masukkan nama depan kamu"
                            aria-label="Username" name="first_name" aria-describedby="basic-addon1" value="<?= $cur->FNAME; ?>">
                        
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="masukkan nama belakang kamu"
                            aria-label="Username" name="last_name" aria-describedby="basic-addon1" value="<?= $cur->LNAME; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                        <input type="text" class="form-control" placeholder="masukkan no. WA / handphone aktif"
                            aria-label="Username" name="contactinfo" aria-describedby="basic-addon1" value="<?= $cur->CONTACTNO; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-linkedin"></i></span>
                        <input type="text" class="form-control" placeholder="masukkan link linkedin"
                            aria-label="Username" name="linkedin" aria-describedby="basic-addon1" value="<?= $cur->LINKEDINLINK; ?>" >
                    </div>
                    <hr>
                    <label for="basic-url" class="form-label">Skill & Pendidikan</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-cog"></i></span>
                        <input type="text" class="form-control"
                            placeholder="masukkan satu keahlian yang kamu kuasai, contoh:(Graphic Design)"
                            aria-label="Username" name="keahlian_utama" aria-describedby="basic-addon1" value="<?= ($rescv) ? $rescv->skill_utama : ''; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-cogs"></i></span>
                        <input type="text" class="form-control"
                            placeholder="pisahkan dengan koma contoh: (Web Development,Android Development,Photography)"
                            aria-label="Username" name="keahlian_secondary" aria-describedby="basic-addon1" value="<?= ($rescv) ? implode (", ", unserialize($rescv->skill_secondary)) : ''; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-building-o"></i></span>
                        <input type="text" class="form-control"
                            placeholder="pisahkan dengan koma contoh: (SMK Al-Azhar(2019-2020),Politeknik Negeri Batam(2021-2023))"
                            aria-label="Username" name="pendidikan" aria-describedby="basic-addon1" value="<?= ($rescv) ? implode (", ", unserialize($rescv->jenjang_sekolah)) : ''; ?>">
                    </div>
                    <!-- <hr>
                    <label for="basic-url" class="form-label">Pengalaman & Sertifikasi</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Skill Utama</span>
                        <input type="text" class="form-control"
                            placeholder="masukkan satu keahlian yang kamu kuasai, contoh:(Graphic Design)"
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Skill Lainnya</span>
                        <input type="text" class="form-control"
                            placeholder="pisahkan dengan koma contoh: (Web Development,Android Development,Photography)"
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Jenjang Sekolah</span>
                        <input type="text" class="form-control"
                            placeholder="pisahkan dengan koma contoh: (SMK Al-Azhar(2019-2020),Politeknik Negeri Batam(2021-2023))"
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div> -->

                    <button class="mx-auto btn bg-myorange text-white w-25 mt-2">Submit</button>
                </form>
            </div>
        </div>
        <!-- end profile section -->
        <!-- end body cv -->
    </div>
    <!-- end progress tracker -->
