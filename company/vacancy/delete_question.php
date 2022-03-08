<?php 
include '../../config/conn.php';
extract($_GET);
$delete = $koneksi->query("DELETE FROM tblassesment where  ASSESMENTID=".$id);
if($delete)
	echo true;
?>