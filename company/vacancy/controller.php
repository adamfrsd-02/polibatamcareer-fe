
<?php
require_once ("../../include/initialize.php");
 	 if (!isset($_SESSION['COMPANY_USERID'])){
      redirect(web_root."company/index.php");
     }


$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'assesment' :
	doAssesment();
	break;

	case 'insertquestion' :
	doInsertQuestion();
	break;
	
 
	}
   
	function doInsert(){
		if(isset($_POST['save'])){
 // `COMPANYID`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`
 
		if ( $_POST['COMPANYID'] == "None") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$job = New Jobs();
			$job->COMPANYID							= $_POST['COMPANYID']; 
			$job->CATEGORY							= $_POST['CATEGORY']; 
			$job->OCCUPATIONTITLE					= $_POST['OCCUPATIONTITLE'];
			$job->REQ_NO_EMPLOYEES					= $_POST['REQ_NO_EMPLOYEES'];
			$job->SALARIES							= $_POST['SALARIES'];
			$job->DURATION_EMPLOYEMENT				= $_POST['DURATION_EMPLOYEMENT'];
			$job->QUALIFICATION_WORKEXPERIENCE		= $_POST['QUALIFICATION_WORKEXPERIENCE'];
			$job->JOBDESCRIPTION					= $_POST['JOBDESCRIPTION'];
			$job->PREFEREDSEX						= $_POST['PREFEREDSEX'];
			$job->SECTOR_VACANCY					= $_POST['SECTOR_VACANCY']; 
			$job->DATEPOSTED						= date('Y-m-d H:i');
			$job->PROGRESS_DETAIL					= serialize($_POST['assignment']);
			$job->create();
			redirect("index.php?view=assesment");
			
			// $assignment = $_POST['assignment'];
			// $list = implode(" ", $assignment);
			// $assesment = substr_count($list,"assesment");
			// $interview = substr_count($list,"interview");
			// $MC = substr_count($list,"mc");
			// $_SESSION['assesment'] = $assesment;
			// $_SESSION['interview'] = $interview;
			// $_SESSION['medical_checkup'] = $MC;

			// echo "<pre>".print_r($assignment,1)."</pre>";
			// echo "<pre>".print_r($_POST,1)."</pre>";
			// message("New Job Vacancy created successfully!", "success");
			
		}
		}

	}

	function doEdit(){
		if(isset($_POST['save'])){
			if ( $_POST['COMPANYID'] == "None") {
				$messageStats = false;
				message("All field is required!","error");
				redirect('index.php?view=add');
			}else{	
				$job = New Jobs();
				$job->COMPANYID							= $_POST['COMPANYID']; 
				$job->CATEGORY							= $_POST['CATEGORY']; 
				$job->OCCUPATIONTITLE					= $_POST['OCCUPATIONTITLE'];
				$job->REQ_NO_EMPLOYEES					= $_POST['REQ_NO_EMPLOYEES'];
				$job->SALARIES							= $_POST['SALARIES'];
				$job->DURATION_EMPLOYEMENT				= $_POST['DURATION_EMPLOYEMENT'];
				$job->QUALIFICATION_WORKEXPERIENCE		= $_POST['QUALIFICATION_WORKEXPERIENCE'];
				$job->JOBDESCRIPTION					= $_POST['JOBDESCRIPTION'];
				$job->PREFEREDSEX						= $_POST['PREFEREDSEX'];
				$job->SECTOR_VACANCY					= $_POST['SECTOR_VACANCY']; 
				$job->update($_POST['JOBID']);

				message("Job Vacancy has been updated!", "success");
				redirect("index.php");
			}
		}

	}


	function doDelete(){
		// if (isset($_POST['selector'])==''){
		// message("Select a records first before you delete!","error");
		// redirect('index.php');
		// }else{

			$id = $_GET['id'];

			$job = New Jobs();
			$job->delete($id);

			message("Company has been Deleted!","info");
			redirect('index.php');

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$category = New Category();
		// 	$category->delete($id[$i]);

		// 	message("Category already Deleted!","info");
		// 	redirect('index.php');
		// }
		// }
		
	}

	function doAssesment(){
		require_once ("../../config/conn.php");
		extract($_POST);	
		$data=  " TITLE='".$ASSESMENTTITLE."'";
		$data .=  ", JOBID='".$JOBID."'";
		$data .=  ", COMPANYID='".$COMPANYID."'";
		$data .= ", date_updated='".date('Y-m-d H:i')."'";
		$insert_user = $koneksi->query('INSERT INTO tblassesmentlist set  '.$data);
	
		if($insert_user){
				echo json_encode(array('status'=>1,'id'=>$koneksi->insert_id));
			
		}
	}
	function doInsertQuestion() {
		include '../../config/conn.php';
		extract($_POST);
		// echo "<pre>".print_r($_POST,1)."</pre>";
		// die();
		if(empty($id)){
			$last_order = $koneksi->query("SELECT * FROM tblassesment where qid = $qid order by order_by desc limit 1");
			if ($last_order) {
				$last_order->fetch_array()['order_by'];
			}else {
				$last_order = 0;
			}
			$order_by = $last_order > 0 ? $last_order + 1 : 0;
			$data = 'QUESTION = "'.$question.'" ';
			$data .= ', QID = "'.$qid.'" ';
			$insert_question = $koneksi->query("INSERT INTO tblassesment set ".$data);
			if($insert_question){
				$question_id = $koneksi->insert_id;
				$insert = array();
				for($i = 0 ; $i < count($question_opt);$i++){
					$is_right = isset($is_right[$i]) ? $is_right[$i] : 0;
					$insert[] = $koneksi->query("INSERT INTO tblassesmentopt set ASSESMENTID = $question_id, OPTIONTEXT = '".$question_opt[$i]."',`is_right` = $is_right ");
				}
				if(count($insert) == 4){
					echo 1;
				}else{
					$delete = $koneksi->query("DELETE FROM tblassesment where ASSESMENTID =".$question_id);
					$delete2 = $koneksi->query("DELETE FROM tblassesmentopt where ASSESMENTID =".$question_id);
					echo 2;
					
				}
		
			}
		}else{
			$data = 'question = "'.$question.'" ';
			$data .= ', qid = "'.$qid.'" ';
			$update = $koneksi->query("UPDATE tblassesment set ".$data." where ASSESMENTID = ".$id);
			if($update){
				$delete= $koneksi->query("DELETE FROM tblassesmentopt where ASSESMENTID =".$id);
				$insert = array();
				for($i = 0 ; $i < count($question_opt);$i++){
					$answer = isset($is_right[$i]) ? 1 : 0;
					$insert[] = $koneksi->query("INSERT INTO question_opt set ASSESMENTID = $id, option_txt = '".$question_opt[$i]."',`is_right` = $answer ");
					// echo "INSERT INTO question_opt set ASSESMENTID = $id, option_txt = '".$question_opt[$i]."',`is_right` = $answer <br>";
				}
				if(count($insert) == 4){
					echo 1;
				}else{
					$delete = $koneksi->query("DELETE FROM tblassesment where id =".$id);
					$delete2 = $koneksi->query("DELETE FROM tblassesmentopt where ASSESMENTID =".$id);
					echo 2;
					
				}
			}
		}
	}
			

?>