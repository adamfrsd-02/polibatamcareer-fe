<?php
include '../../config/conn.php';
	
	$qry = $koneksi->query("SELECT * from tblquisionerlist where QUISIONERLISTID='".$_GET['id']."' ");
	if($qry){
		echo json_encode($qry->fetch_array());
	}
?>