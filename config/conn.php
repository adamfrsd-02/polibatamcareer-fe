<?php
 
//koneksi database
$DB_host = "localhost";
$DB_user = "root"; //username mysql
$DB_pass = ""; //password mysql
$DB_name = "db_jobportal"; //database name
 

$koneksi= new mysqli('localhost','root','','db_jobportal')or die("Could not connect to mysql".mysqli_error($con));

if($koneksi->connect_errno)
{
    die("Koneksi bermasalah, coba ulangi : -> ".$koneksi->connect_error);
}
?>