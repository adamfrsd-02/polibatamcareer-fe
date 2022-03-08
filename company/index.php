<?php 
require_once("../include/initialize.php");
 if(!isset($_SESSION['COMPANY_USERID'])){
    redirect(web_root."company/login.php");
  }

$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
  case '1' :
        // $title="Home"; 
    // $content='home.php'; 
    // if ($_SESSION['COMPANY_ROLE']=='Cashier') {
    //     # code...
    //   redirect('orders/');

    // } 
    // if ($_SESSION['COMPANY_ROLE']=='Administrator') {
    //     # code... 

    //   redirect('meals/');

    // } 
    break;  
  default :
 
      $title="Home"; 
    $content ='home.php';    
}
require_once("theme/templates.php");
?>