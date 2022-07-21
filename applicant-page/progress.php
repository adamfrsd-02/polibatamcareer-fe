
 <?php
	$applicantid = $_SESSION['APPLICANTID'];
                
	 $sql = "SELECT JOBID,COMPANYID FROM tblprogress where APPLICANTID = '$applicantid'  ";
	 $mydb->setQuery($sql);
	 $curs = $mydb->loadResultList();
 ?>  
   <!-- progress tracker -->
    <div class="container py-3">
        <div class="header">
            <h2 class="header-title w-50">
                Job yang kamu apply <br> tampil disini
            </h2>
        </div>
        <hr>
        <div class="heading" style="display: flex; flex-direction: row; justify-content: space-between;">
            <p style="font-size: 1.5vh">Kamu sedang berada di halaman : Home / <b>Application Progress</b></p>
            <p style="font-size: 1.5vh;">Ada <b><?= count($curs); ?> Lamaran</b> yang kamu ajukan</p>
        </div>
        <div class="body-tracker">

            <?php
				foreach ($curs as $key ) :
					$sql = "SELECT id_progress,detail_progress FROM tblprogress where APPLICANTID = '$applicantid' AND COMPANYID = '$key->COMPANYID'  AND JOBID = $key->JOBID";
					$mydb->setQuery($sql);
					$cur = $mydb->loadResultList();
                    $jobid = $key->JOBID;
                    $companyid = $key->COMPANYID;
					if ($cur) :
					$i=1;
					$progress = 1;
					$tahap = "";
					$querycompany = "SELECT COMPANYNAME, COMPANYLOGO FROM tblcompany WHERE COMPANYID = $key->COMPANYID";
					$mydb->setQuery($querycompany);
					$rescompany = $mydb->loadSingleResult();
					
					$queryjob = "SELECT OCCUPATIONTITLE FROM tbljob WHERE JOBID = $key->JOBID";
					$mydb->setQuery($queryjob);
					$resjob = $mydb->loadSingleResult();

					$queryjobreg = "SELECT REGISTRATIONDATE FROM tbljobregistration WHERE JOBID = '$key->JOBID' AND APPLICANTID = '$applicantid'";
					$mydb->setQuery($queryjobreg);
					$resjobreg = $mydb->loadSingleResult();
					foreach ($cur as $details ) {
                        // echo "<pre>".print_r($cur,1)."</pre>";
						$progid = $details->id_progress;
						$detail = unserialize($details->detail_progress);
                        $queryprogress = "SELECT progres_step FROM tbl_user_progress where APPLICANTID = $applicantid AND id_progress = $progid";
                        $mydb->setQuery($queryprogress);
                        $resprogress = $mydb->loadSingleResult();
                        $detail = array_values($detail);
					}
					// echo "<pre>".print_r($detail,1)."</pre>";

            ?>

            <!-- Item -->
            <div class="card mb-3">
                <div class="row">
                    <div class="col-md-4 my-auto px-5">
                        <img src="../assets/upload/company_logo/<?= $rescompany->COMPANYLOGO; ?>" alt="">
                    </div>
                    <div class="step col-md-8 d-none d-md-block py-5 pe-5">
                        <div class="company-profile">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="header-title"><?= $resjob->OCCUPATIONTITLE; ?></p>
                                    <p class="header-subtitle" style="margin-top: -12px;"><?= $rescompany->COMPANYNAME; ?></p>
                                </div>
                                <div class="col-md-6 ms-auto">
									<?php
										if ($detail[$resprogress->progres_step - 1] == 'assesment') {
											$querydet = "SELECT ASSESMENTID FROM tblprogress WHERE id_progress = $progid";
											$mydb->setQuery($querydet);
											$resdet = $mydb->loadSingleResult();
											if( strpos($resdet->ASSESMENTID, ",") !== false ) {
												$datadetails = explode(",",$resdet->ASSESMENTID)[0];
											}else {
												$datadetails = $resdet->ASSESMENTID;
											}
									?>
									<a href="index.php?view=assesment&id=<?= $datadetails; ?>&progress=<?= $progid; ?>" class="btn btn-outline-blue px-5 float-end">Detail</a>
										<!-- <button class="btn btn-outline-blue px-5 float-end">Detail</button> -->
									<?php
										}else {

										}
									?>
                                    <p class="float-end mt-3">Tanggal Apply : <?= date("d F Y", strtotime($resjobreg->REGISTRATIONDATE)); ?></p>
                                </div>
                            </div>

                        </div>

                        <div class="card px-3">
                            <div class="steps">
                                <progress id="progress" value=0 max=100></progress>
                                <?php
                                foreach($cur as $item) :
                                    // echo "<pre>".print_r(,1)."</pre>";
                                    $sql2 = "SELECT * FROM tbl_user_progress where id_progress = '$item->id_progress' && APPLICANTID = '$applicantid' ";
                                    $mydb->setQuery($sql2);
                                    $cur2 = $mydb->loadResultList();
                                    foreach ($cur2 as $key ) {
                                        // echo "<pre>".print_r($key,1)."</pre>";
                                        $progress = $key->progres_step;
                                    }
                                    foreach(unserialize($item->detail_progress) as $list) :
                                        // echo "<pre>".print_r($progress,1)."</pre>";
                                        ?>
                                <div class="step-item" style="margin-top: -1px">
                                    <button class="step-button text-center" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne"
                                        aria-expanded="<?php echo ($i > $progress) ? "false" : "true" ?>"
                                        aria-controls="collapseOne">
                                        <?php
                                                    echo $i;
                                                ?>
                                    </button>
                                    <div class="step-title">
                                        <?php
                                                if ($i == $progress) {
                                                    $tahap = $list;
                                                }
                                                    echo $list;
                                                ?>
                                    </div>
                                </div>
                                <?php  
                                            $i++;
                                        endforeach;
                                endforeach;
                                ?>

                            </div>
                            <div class="ps-3 justify-between" style="margin-top: -10px; display: flex; flex-direction: row; align-items: baseline;">
                            <div class="flex-center">
                                <?php
                                    if ($tahap == 'hired') {
                                        $subtitle = 'Anda Sudah Di';
                                    }else {
                                        $subtitle = 'Sedang Tahap';
                                    }
                                ?>
                               <p class="header-subtitle"><?= $subtitle; ?></p>
                                <p class="ms-2"><b><?php
                                    echo $tahap;
                                ?></b></p>
                            </div>
                                <?php
                                // echo "<pre>".print_r($companyid,1)."</pre>";
                                if ($tahap == 'interview') {
                                    $queryinterview = "SELECT * FROM tblinterview WHERE id_progress = $progid";
                                    $mydb->setQuery($queryinterview);
                                    $resinterview = $mydb->loadSingleResult();
                                    if ($resinterview) {
                                        # code...
                                    
                                ?>
                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#form_modal<?php echo $resinterview->INTERVIEWID;?>">Interview Link</button>
                                    <div class="modal fade" id="form_modal<?php echo $resinterview->INTERVIEWID;?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Link Interview</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-8">
                                                        Interview akan dilakukan pada : <?= $resinterview->INTERVIEWDATE; ?><br>
                                                        link interview = <a href="<?= $resinterview->INTERVIEWLINK; ?>"><?= $resinterview->INTERVIEWLINK; ?></a>
                                                    </div>
                                                </div>
                                                <div style="clear:both;"></div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }else {
                                    ?>
                                    Interview Belum Dijadwalkan
                                    <?php
                                    }
                                }else if($tahap == 'quisioner') {
                                    $queryquis = "SELECT * FROM tblquisionerlist WHERE JOBID = $jobid AND COMPANYID = $companyid";
                                    $mydb->setQuery($queryquis);
                                    $resquis = $mydb->loadSingleResult();
                                    if ($resquis) {
                                        
                                    $queryresult = "SELECT * FROM tblquisionerresult WHERE APPLICANTID = $applicantid AND QUISIONERLISTID = $resquis->QUISIONERLISTID";
                                    $mydb->setQuery($queryresult);
                                    $resultq = $mydb->loadSingleResult();
                                        if ($resultq) {?>
                                        Anda Sudah Mengisi Quisioner
                                        <?php
                                        }else {
                                ?>
                                    <a href="index.php?view=quisioner&id=<?=$resquis->QUISIONERLISTID;?>&progress=<?= $progid; ?>">Isi Kuisioner Anda</a>
                                    
                                <?php
                                        }
                                    }
                                }
                                    ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                            
                        endif;
					endforeach;
                        ?>
            <!-- End Item -->
        </div>
    </div>
    <!-- end progress tracker -->

