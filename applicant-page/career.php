<?php 
	$searchfor = (isset($_GET['searchfor']) && $_GET['searchfor'] != '') ? $_GET['searchfor'] : '';
	
?>
    <!-- career section -->
    <div class="container">
        <div class="py-5">
            <div class="header">
                <h2 class="header-title w-50">
                    Mungkin beberapa lowongan kerja ini cocok untukmu
                </h2>
            </div>
            <!-- search section -->
            <hr>
            <div class="form-search">
                <form action="?view=career&searchfor=advancesearch" method="post">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label for="" class="mb-2">Nama Perusahaan</label>
                            <input type="text" name="SEARCH" class="form-control" placeholder="masukkan nama perusahaan">
                        </div>
                        <!-- <div class="col-md-3">
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
                        </div> -->
                        <div class="col-md-3">
                            <label for="" class="mb-2">CATEGORY : </label>
                            <select name="CATEGORY" class="form-select" id="">
                                <option value="">All</option>
                                <?php
												$sql = "SELECT * FROM `tblcategory`";
												$mydb->setQuery($sql);
												$res = $mydb->loadResultList();
												foreach ($res as $row) { 
													echo '<option>'.$row->CATEGORY.'</option>';
												}
											?>
                            </select>
                        </div>
                    </div>
                    <button class="px-5 py-3 rounded bg-myblue text-white"
                        style="border-radius: 10px !important; border-style: none;">Cari
                        Pekerjaan</button>
                </form>
            </div>
            <hr>
            <!-- end search section -->
            <!-- search result section -->
            <div class="row">
                <div class="header-subtitle py-3">
                    <span class="header-subtitle">Kami menemukan <b class="highlighted">3 Lowongan Kerja</b> yang
                        sesuai</span>
                </div>
                <div class="owl-carousel mt-1 px-2">
                    <!-- items -->
                    <div class="card p-4 px-4" style="width: auto; border-radius: 20px">
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
                                <img src="../assets/logo/perusahaan.png" alt="">
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
                    </div>
                    <!-- itemss -->

                </div>
            </div>
            <!-- end search result section -->
            <!-- new job section -->
            <div class="latest-job mt-5">
                <h2 class="header-title w-50 mb-4" style="color: #183a64;">
                    Lowongan Kerja Terbaru
                </h2>
                <div class="owl-carousel mt-1 px-2">
                    <!-- items -->
                    <div class="card p-4 px-4" style="width: auto; border-radius: 20px">
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
                                <img src="../assets/logo/perusahaan.png" alt="">
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
                    </div>
                    <!-- itemss -->

                </div>
            </div>
        <section class="ftco-section bg-light">
            <div class="container">
    
                <div class="row">
								<?php 


								 $search = isset($_POST['SEARCH']) ? ($_POST['SEARCH']!='') ? $_POST['SEARCH'] : 'All' : 'All';
								 $company = isset($_POST['COMPANY']) ? ($_POST['COMPANY']!='') ? $_POST['COMPANY'] : 'All' : 'All';
								 $category = isset($_POST['CATEGORY']) ? ($_POST['CATEGORY']!='') ? $_POST['CATEGORY'] : 'All' : 'All';

								switch ($searchfor) {
									case 'bycompany':
										# code...
									echo 'Result : '  . $search . ' | Company : ' . $company;
										break;
									case 'advancesearch':
										# code... 
									echo 'Result : '  . $search . ' | Company : ' . $company . ' | Function : ' . $category; 
									    break;
									case 'byfunction':
										# code... 
									echo 'Result : '  . $search . ' | Function : ' . $category; 
									    break;

									case 'bytitle':
										# code... 
									echo 'Result : '  . $search; 
									    break;
									
									default:
										# code...
										break;
								}


								?>
							</div>
						</div>
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
									<?php 

									 $search = isset($_POST['SEARCH']) ? $_POST['SEARCH'] : '';
									 $company = isset($_POST['COMPANY']) ? $_POST['COMPANY'] : '';
									 $category = isset($_POST['CATEGORY']) ? $_POST['CATEGORY'] : '';
                                     $sql = "SELECT * FROM `tbljob` j, `tblcompany` c 
										WHERE j.`COMPANYID`=c.`COMPANYID` AND CATEGORY LIKE '%{$category}%' AND (COMPANYNAME LIKE '%{$search}%' OR (`OCCUPATIONTITLE` LIKE '%{$search}%') OR `JOBDESCRIPTION` LIKE '%{$search}%' OR `QUALIFICATION_WORKEXPERIENCE` LIKE '%{$search}%')";
										$mydb->setQuery($sql);
										$cur = $mydb->executeQuery();
										$maxrow = $mydb->num_rows($cur);
                                        
										if ($maxrow > 0) {
                                            # code... 
                                            $res = $mydb->loadResultList();
                                            echo "<pre>".print_r($res,1)."</pre>";
										foreach ($res as $row) { 
									?>
				 


        <div class="col-md-12 ftco-animate">

            <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
                <div class="job-post-item-header d-flex align-items-center">
                  <h2 class="mr-3 text-black h3"><?php echo $row->OCCUPATIONTITLE ?></h2>
                  <div class="badge-wrap">
                   <span class="bg-primary text-white badge py-2 px-3"><?php echo $row->CATEGORY ?></span>
                  </div>
                </div>
                <div class="job-post-item-body d-block d-md-flex">
                  <div class="mr-3"><span class="icon-layers"></span> <a href="#"><?php echo $row->COMPANYNAME ?></a></div>
                  <div><span class="icon-my_location"></span> <span><?php echo $row->COMPANYADDRESS ?></span></div>
                </div>
              </div>

              <div class="ml-auto d-flex">
                <a href="<?php echo web_root; ?>index.php?q=apply&job=<?php echo $row->JOBID;?>&view=personalinfo" class="btn btn-primary py-2 mr-1">Apply Job</a>
              
              </div>
            </div>
          </div><!-- end -->



								<?php } }else {
									echo '<tr><td>No result found!.....</td></tr>';

								}?>
								 
					 
			</div>
	</section> 