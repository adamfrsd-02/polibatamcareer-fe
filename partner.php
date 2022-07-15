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

