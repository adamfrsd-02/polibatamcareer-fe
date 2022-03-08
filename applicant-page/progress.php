
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
            <p style="font-size: 1.5vh;">Ada <b>2 Lamaran</b> yang kamu ajukan</p>
        </div>
        <div class="body-tracker">
            <?php
                
                $applicantid = $_SESSION['APPLICANTID'];
                $sql = "SELECT id_progress,detail_progress FROM tblprogress where APPLICANTID = '$applicantid'  ";
                $mydb->setQuery($sql);
                $cur = $mydb->loadResultList();
                if ($cur) :
                $i=1;
                $tahap = "";
            ?>
            <!-- Item -->
            <div class="card mb-3">
                <div class="row">
                    <div class="col-md-4 my-auto px-5">
                        <img src="../assets/logo/perusahaan.png" alt="">
                    </div>
                    <div class="step col-md-8 d-none d-md-block py-5 pe-5">
                        <div class="company-profile">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="header-title">Web Designer</p>
                                    <p class="header-subtitle" style="margin-top: -12px;">Lapmodo Batam</p>
                                </div>
                                <div class="col-md-6 ms-auto">
                                    <button class="btn btn-outline-blue px-5 float-end">Detail</button>
                                    <p class="float-end mt-3">Tanggal Apply : 5 Februari 2022</p>
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
                                    $progress = 0;
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
                            <div class="ps-3"
                                style="margin-top: -10px; display: flex; flex-direction: row; align-items: baseline;">
                                <p class="header-subtitle">Sedang Tahap </p>
                                <p class="ms-2"><b><?php
                                    echo $tahap;
                                ?></b></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                            
                        endif;
                        ?>
            <!-- End Item -->
        </div>
    </div>
    <!-- end progress tracker -->

