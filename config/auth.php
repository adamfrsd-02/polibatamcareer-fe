<?php
require "conn.php";
session_start();
if(!empty($_POST["nim"])) {
	$sql = "Select * from users where nim = '" . $_POST["nim"] . "'";
        if(!isset($_COOKIE["member_login"])) {
            $sql .= " AND password = '" . md5($_POST["password"]) . "'";
	}
        $result = mysqli_query($koneksi,$sql);
	$user = mysqli_fetch_array($result);
	if($user) {
			$_SESSION["nim"] = $user["nim"];
			
			if(!empty($_POST["remember"])) {
				setcookie ("member_login",$_POST["nim"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
			}
            echo '<script language="javascript">
            window.alert("LOGIN berhasil");
            window.location.href="../index.php";
          </script>';
	} else {
        echo '<script language="javascript">
        window.alert("LOGIN gagal");
        window.location.href="../index.php";
      </script>';
	}
}
?>
