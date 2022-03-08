<?php 

include '../../config/conn.php';

extract($_POST);

$data=  " TITLE='".$title."'";
$update = $koneksi->query('UPDATE tblassesmentlist set  '.$data.' where ASSESMENTLISTID= '.$id);

if($update){
		echo json_encode(array('status'=>1,'id'=>$id));
	
}
