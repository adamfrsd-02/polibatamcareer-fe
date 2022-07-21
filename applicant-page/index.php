<?php 
require_once("../include/initialize.php");  
if (!isset($_SESSION['APPLICANTID'])) {
	# code...
	redirect(web_root.'index.php');
}
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) { 
	// case 'appliedjobs' :
	//     $title="Profile";	
    //     $_SESSION['appliedjobs']	='active' ; 
	// 	$content ='Profile.php';
	// 	break;

	// case 'notification' :
	//     $title="Profile";	
    //     $_SESSION['notification']	='active' ; 
	// 	$content ='Profile.php';
	// 	break;
  
	case 'accounts' : 
	    $title="Profile";	
        $_SESSION['accounts']	='active' ;
        $content ='accountprofile.php';
		break;
    case 'cv' :
        $title = "Curriculum Vitae";
        $_SESSION['cv'] = 'active';
        $content = 'cv.php';
        break;
    case 'career' :
        $title = "Career";
        $_SESSION['career'] = 'active';
        $content = 'career.php';
        break;
    case 'assesment' :
        $title = "Assesment";
        $_SESSION['assesment'] = 'active';
        $content = 'assesment.php';
        break;
    case 'quisioner' :
        $title = "Quisioner";
        $_SESSION['quisioner'] = 'active';
        $content = 'quisioner.php';
        break;
	default : 
	    $title="Profile";	
        $_SESSION['appliedjobs']	='active' ;
		$content ='progress.php';		
}
require_once("../theme/template-applicant.php");
?>