
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
                    <form id="searchJob">
                    <div class="card p-4">
                        <div class="top-section">
                            <p>Search</p>
                            <div class="search-box" style="margin-top: -5px">
                                <input name="search" type="text" class="form-control" placeholder="Search" />
                            </div>
                        </div>
                        <div class="bottom-section mt-5">
                            <p>Category :</p>
                            <div class="checkbox row" style="justify-content: between">
                            <?php
                                $query = $koneksi->query("select * from tblcategory");
                                foreach ($query as $key ) {
                            ?>
                                <label class="mb-2">
                                    <input type="checkbox" name="checkbox[]" value="<?= $key['CATEGORY']; ?>" class="custom-checkbox">
                                   <?= $key['CATEGORY']; ?>
                                </label>
                            <?php
                                }
                            ?>
                                
                                <!-- <label class="mb-2">
                                    <input type="checkbox" value="" class="custom-checkbox">
                                    Part Time
                                </label>
                                
                                <label class="mb-2">
                                    <input type="checkbox" value="" class="custom-checkbox">
                                    Internship
                                </label> -->


                            </div>
                        </div>

                        <button class="px-2 py-2 rounded w-100 text-white bg-myblue mt-3" style="border-radius: 10px !important; border-style: none;" >Search</button>

                    </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="latest-job " id="jobresult">
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
                            <div class="card py-4 px-4">
                                <div class="row">
                                    <div class="col-md-2 my-auto">
                                        <img class="border border-primary rounded-circle" width="90" height="90" src="assets/upload/company_logo/<?= ($row['COMPANYLOGO']) ? $row['COMPANYLOGO'] : 'logopolcareer.png' ?>" alt="">
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
                                    <?php
                                    if(!isset($_SESSION['APPLICANTID'])){
                                        ?>
                                        <button class="px-2 py-3 rounded w-100 text-white bg-myorange"
                                    style="border-radius: 10px !important; border-style: none;" data-bs-target="#exampleModal" data-bs-toggle="modal">See Details</button>
                                        <?php
                                            }else{ 
                                        ?>
                                        <a href="<?php echo web_root; ?>index.php?q=apply&job=<?php echo $row['JOBID'];?>&view=personalinfo" class="btn px-2 py-3 rounded w-100 text-white bg-myorange"> See Details</a>

                                        <?php } ?>
                                            <div class="salary text-start mt-3" style="font-size: 1.7vh">Rp. <?= number_format($row['SALARIES'],2) ?> <br> per bulan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
    
                    </div>
                </div>
            </div>
            <!-- end new job section -->
        </div>
    </div>
    <!-- end career section -->
<script>
    
$(function() {
    $("#searchJob").submit(function(e){
        e.preventDefault();
        console.log($( this ).serialize())
        $.ajax({
            url: "searchjob.php",
            data: $(this).serialize(),
            success:function(resp){
					if(typeof resp != undefined){
                               $('#jobresult').html(resp) 
					}
				}
            });
    });
});
</script>