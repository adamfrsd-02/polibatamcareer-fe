<?php
include '../../config/conn.php';
$data = array();
$qry = $koneksi->query("SELECT * FROM tblassesment where ASSESMENTID =  ".$_GET['id']);

foreach($qry->fetch_array() as $k => $v){
	$data['qdata'][$k] = $v;
}
$qry2 = $koneksi->query("SELECT * FROM tblassesmentopt where ASSESMENTID =  ".$_GET['id']);
while($row = $qry2->fetch_assoc()){
	$data['odata'][] = $row;
}
echo json_encode($data);

