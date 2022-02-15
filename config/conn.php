<?php
 
//koneksi database
$DB_host = "localhost";
$DB_user = "root"; //username mysql
$DB_pass = ""; //password mysql
$DB_name = "db_jobportal"; //database name
 
$koneksi = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);
if($koneksi->connect_errno)
{
    die("Koneksi bermasalah, coba ulangi : -> ".$koneksi->connect_error);
}
?>