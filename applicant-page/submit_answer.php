<?php 

include '../config/conn.php';
require_once("../include/initialize.php");  
global $mydb;
// echo "<pre>".print_r($_POST,1)."</pre>";
extract($_POST);
$points = 0;
foreach ($question_id as $key => $value) {
	$data = ' APPLICANTID = '.$user_id;
	$data .= ', ASSESMENTLISTID =  '.$quiz_id;
	$data .= ', ASSESMENTID = "'.$question_id[$key].'" ';
	$is_right = 0;
	if(isset($option_id[$key])){
		$data .= ', option_id = "'.$option_id[$key].'" ';
		$is_right = $koneksi->query("SELECT * FROM tblassesmentopt where ASSESMENTOPTID = '".$option_id[$key]."' ")->fetch_array()['is_right'];
	}
	$data .= ', is_right = "'.$is_right.'" ';
	// $insert = $koneksi->query("INSERT INTO answers set ".$data);
	if( $is_right > 0)
		$points++;
	// echo("INSERT INTO answers set ".$data);
}
$qpoints = count($question_id) * 1;
$score = $points * $qpoints;
$total = count($question_id) * $qpoints;
	$data = ' ASSESMENTLISTID =  '.$quiz_id;
	$data .= ', APPLICANTID = '.$user_id;
	$data .= ', score =  '.$score;
	$data .= ', total_score =  '.$total;
	$insert2 = $koneksi->query("INSERT INTO tblassesmentresult set ".$data);
    $querydata = "SELECT ASSESMENTID FROM tblprogress WHERE APPLICANTID = '$user_id' AND id_progress = '$progress_id'";
    $mydb->setQuery($querydata);
    $datas = $mydb->loadSingleResult();
    $ydata = "SELECT progres_step FROM tbl_user_progress WHERE APPLICANTID = '$user_id' AND id_progress = '$progress_id'";
    $mydb->setQuery($ydata);
    $datap = $mydb->loadSingleResult();
    // echo "<pre>".print_r($datas->ASSESMENTID,1)."</pre>";
    $datapp = $datap->progres_step + 1;
    if( strpos($datas->ASSESMENTID, ",") !== false ) {
        $progressid = $quiz_id.",";
   }else {
       $progressid = $quiz_id;
   }
//    echo "<pre>".print_r($quiz_id,1)."</pre>";
    $assid = str_replace($progressid, '', $datas->ASSESMENTID);
    $update3 = $koneksi->query("UPDATE tblprogress SET ASSESMENTID = $assid where id_progress = $progress_id ");
    $update4 = $koneksi->query("UPDATE tbl_user_progress SET progres_step = $datapp where id_progress = $progress_id AND APPLICANTID = '$user_id'");
	if($insert2 && $update3 && $update4)
	echo json_encode(array('status'=>1,'score'=>$score.'/'.$total));
?>