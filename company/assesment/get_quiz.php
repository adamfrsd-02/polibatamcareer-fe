<?php
include '../../config/conn.php';
	
	$qry = $koneksi->query("SELECT * from tblassesmentlist where ASSESMENTLISTID='".$_GET['id']."' ");
	if($qry){
		echo json_encode($qry->fetch_array());
	}
?>