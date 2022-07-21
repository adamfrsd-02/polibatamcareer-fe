<?php 
include '../../config/conn.php';
extract($_GET);
$delete = $koneksi->query("DELETE FROM tblquisioner where  QUISIONERID=".$id);
if($delete)
	echo true;
?>