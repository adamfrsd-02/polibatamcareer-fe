<?php
require_once ("../include/initialize.php");
	  if (!isset($_SESSION['APPLICANTID'])){
      redirect(web_root."index.php");
     }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'editprofile' :
	doEditProfile();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;

 
	}

	function doEdit(){
		global $mydb;
		// $birthdate =  date_format(date_create($_POST['BIRTHDATE']),'Y-m-d');

		// 	$age = date_diff(date_create($birthdate),date_create('today'))->y;
		//  	if ($age < 20 ){
		//        message("Invalid age. 20 years old and above is allowed.", "error");
		//        redirect("index.php?view=accounts");

		//     }else{
			// $name = explode(' ', $_POST['nama_lengkap']);
			// echo "<pre>".print_r($_POST,1)."</pre>";

					$applicant =New Applicants(); 
					$applicant->FNAME = $_POST['first_name'];
					$applicant->LNAME = $_POST['last_name'];
					$applicant->CONTACTNO = $_POST['contactinfo'];
					$applicant->LINKEDINLINK = $_POST['linkedin'];
					$applicant->update($_SESSION['APPLICANTID']);
					extract($_POST);
					$id = $_SESSION['APPLICANTID'];
					$keahlian_secondary = serialize(explode(',', $keahlian_secondary));
					$pendidikan = serialize(explode(',', $pendidikan));
					$querycheck = "SELECT 1
					FROM tbl_curriculum_vitae
					WHERE APPLICANTID = $id;";
					$mydb->setQuery($querycheck);
					// echo "<pre>".print_r(,1)."</pre>";
					if ($mydb->loadSingleResult()) {
						$query = "UPDATE tbl_curriculum_vitae SET skill_utama = '$keahlian_utama',skill_secondary = '$keahlian_secondary', jenjang_sekolah = '$pendidikan' WHERE APPLICANTID = '$id'";
					} else {
						$query = "INSERT INTO tbl_curriculum_vitae VALUES (NULL,'$id','$keahlian_utama','$keahlian_secondary','$pendidikan')";
					}
					$mydb->setQuery($query);
					message("Account has been updated!", "success");
					redirect("index.php?view=cv");
	    	// }
	}

	function doEditProfile(){
		$birthdate =  date_format(date_create($_POST['BIRTHDATE']),'Y-m-d');

			$age = date_diff(date_create($birthdate),date_create('today'))->y;
		 	if ($age < 20 ){
		       message("Invalid age. 20 years old and above is allowed.", "error");
		       redirect("index.php?view=accounts");

		    }else{ 
					$applicant =New Applicants(); 
					$applicant->FNAME = $_POST['FNAME'];
					$applicant->LNAME = $_POST['LNAME'];
					// $applicant->MNAME = $_POST['MNAME'];
					$applicant->ADDRESS = $_POST['ADDRESS'];
					$applicant->SEX = $_POST['optionsRadios'];
					$applicant->CIVILSTATUS = $_POST['CIVILSTATUS'];
					$applicant->BIRTHDATE = $birthdate;
					$applicant->BIRTHPLACE = $_POST['BIRTHPLACE'];
					$applicant->AGE = $age; 
					$applicant->EMAILADDRESS = $_POST['EMAILADDRESS'];
					$applicant->CONTACTNO = $_POST['TELNO'];
					$applicant->DEGREE = $_POST['DEGREE'];
					$applicant->update($_SESSION['APPLICANTID']);

					message("Account has been updated!", "success");
					redirect("index.php?view=accounts");
	    	}
	}
   
	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile = date("dmYhis") . $_FILES['photo']['name'];
		 	$location="photos/".$myfile;


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
		}else{
	 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Uploaded file is not an image!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"photos/" . $myfile);
		 	
					 

						$applicant = New Applicants();
						$applicant->APPLICANTPHOTO 			= $location;
						$applicant->update($_SESSION['APPLICANTID']);
						redirect(web_root."applicant-page/");
						 
							
					}
			}
			 
		}



function doAddFiles(){
global $mydb;
 // `JOBID`, `FILE_NAME`, `FILE_LOCATION`, `USERATTACHMENTID`
		$picture = UploadImage();
		$location = "photos/". $picture ;

		$sql = "INSERT INTO `tblattachmentfile` (`JOBID`, `FILE_NAME`, `FILE_LOCATION`, `USERATTACHMENTID`) 
		VALUES ('".$_SESSION['APPLICANTID']."','','Resume','{$location}','".$_SESSION['APPLICANTID']."')";
		$mydb->setQuery($sql); 
		$res = $mydb->executeQuery();

		message("File has been uploaded!", "success");
		redirect("index.php?tab=files");
	 



} 

function UploadImage(){
	$target_dir = "photos/";
	$target_file = $target_dir . date("dmYhis") . basename($_FILES["picture"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	
	if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
|| $imageFileType != "gif" ) {
		 if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
			return  date("dmYhis") . basename($_FILES["picture"]["name"]);
		}else{
			echo "Error Uploading File";
			exit;
		}
	}else{
			echo "File Not Supported";
			exit;
		}
} 

?>