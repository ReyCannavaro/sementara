<?php
$databasehost = "localhost";
$databasename = "budalkirim";
$databaseusername = "root";
$databasepassword = "";

$mysqli = mysqli_connect($databasehost, $databaseusername, $databasepassword, $databasename);

if ($mysqli){
    //echo "koneksi db berhasil.<br/>";
}else{
    echo "koneksi db gagal.<br/>";
}
?>