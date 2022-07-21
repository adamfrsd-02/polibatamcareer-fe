<?php 

include '../config/conn.php';
require_once("../include/initialize.php");  
global $mydb;
extract($_POST);
$points = 0;
foreach ($question_id as $key => $value) {
	$data = ' APPLICANTID = '.$user_id;
    $data .= ', QUISIONERLISTID =  '.$quiz_id;
	$data .= ', QUISIONERID = "'.$question_id[$key].'" ';
	$data .= ', answer = "'.$answer[$key].'" ';
	$insert = $koneksi->query("INSERT INTO tblquisionerresult set ".$data);
}
	echo json_encode(array('status'=>1));
?>