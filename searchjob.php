<?php
    include 'config/conn.php';
extract($_GET);
$result = array();
$count = 0;
if ($search != '' && isset($checkbox)) {
    foreach ($checkbox as $key => $value) {
        $querysearch = $koneksi->query("SELECT * FROM tbljob INNER JOIN tblcompany ON tbljob.COMPANYID=tblcompany.COMPANYID where CATEGORY = '$value' AND OCCUPATIONTITLE LIKE '%".$search."%' OR JOBDESCRIPTION LIKE '%".$search."%'  ORDER BY tbljob.DATEPOSTED DESC");
        $count = $querysearch->num_rows;
        foreach ($querysearch as $hasil ) {
            $result[] = $hasil;
        }
    }
}else if ($search == '' && isset($checkbox)) {
    foreach ($checkbox as $key => $value) {
        $querysearch = $koneksi->query("SELECT * FROM tbljob INNER JOIN tblcompany ON tbljob.COMPANYID=tblcompany.COMPANYID where CATEGORY = '$value'  ORDER BY tbljob.DATEPOSTED DESC");
        $count = $querysearch->num_rows;
        foreach ($querysearch as $hasil ) {
            $result[] = $hasil;
        }
    }
}else if($search != '' && !isset($checkbox)){
    $querysearch = $koneksi->query("SELECT * FROM tbljob INNER JOIN tblcompany ON tbljob.COMPANYID=tblcompany.COMPANYID where OCCUPATIONTITLE LIKE '%".$search."%' OR JOBDESCRIPTION LIKE '%".$search."%'  ORDER BY tbljob.DATEPOSTED DESC");
    $count = $querysearch->num_rows;
    foreach ($querysearch as $hasil ) {
        $result[] = $hasil;
    }
}else {
    $querysearch = $koneksi->query("SELECT * FROM tbljob INNER JOIN tblcompany ON tbljob.COMPANYID=tblcompany.COMPANYID ORDER BY tbljob.DATEPOSTED DESC");
    $count = $querysearch->num_rows;
    foreach ($querysearch as $hasil ) {
        $result[] = $hasil;
    }
}
$data = array(
    'no' => $count,
    'data' => $result
);
echo '<p><b>'.$count.' Jobs Found</b></p>';
if ($result) {
    foreach ($result as $row ) {
        if(!isset($_SESSION['APPLICANTID'])){
           $button = ' <button class="px-2 py-3 rounded w-100 text-white bg-myorange"
        style="border-radius: 10px !important; border-style: none;" data-bs-target="#exampleModal" data-bs-toggle="modal">See Details</button>';
                }else{ 

           $button = ' <a href="'.web_root.'index.php?q=apply&job='.$row["JOBID"].'&view=personalinfo" class="btn px-2 py-3 rounded w-100 text-white bg-myorange"> See Details</a>';

        } 
        $logo = ($row["COMPANYLOGO"]) ? $row["COMPANYLOGO"] : "logopolcareer.png";
        echo '<div class="row mt-1 px-2 py-2">
        <div class="card py-4 px-4">
            <div class="row">
                <div class="col-md-2 my-auto">
                    <img class="border border-primary rounded-circle" width="90" height="90" src="assets/upload/company_logo/'.$logo.'" alt="">
                </div>
                <div class="col-md-4">
                    <h5>
                        '.$row["OCCUPATIONTITLE"].'
                    </h5>
                    <p style="font-size: 1.7vh">
                    '.$row["COMPANYNAME"].'
                    </p>
                    <div class="job-label py-2 px-4 w-75">'. $row["CATEGORY"].'</div>
                </div>
                <div class="col-md-3 my-auto">
                    <div style="display:flex;" class="my-auto"><i class="fa fa-map-marker"></i><p style="font-size: 1.8vh; margin-left: 10px">'.$row["COMPANYADDRESS"].'</p></div>
                </div>
                <div class="col-md-3">
                '.$button.'
                        <div class="salary text-start mt-3" style="font-size: 1.7vh">Rp. '. number_format($row["SALARIES"],2) .' <br> per bulan</div>
                </div>
            </div>
        </div>
    </div>';
    }
}else {
    echo "No Job Found...";
}
?>