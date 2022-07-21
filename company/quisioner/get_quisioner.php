<?php
include '../../config/conn.php';
$data = array();
$qry = $koneksi->query("SELECT * FROM tblquisioner where QUISIONERID =  ".$_GET['id']);

foreach($qry->fetch_array() as $k => $v){
	$data['qdata'][$k] = $v;
}
echo json_encode($data);

