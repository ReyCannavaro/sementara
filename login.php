<?php
//mengaktifkan session pada php
include 'koneksi.php';

$username = $_POST['user'];
$password = $_POST['pass'];

$login = mysqli_query ($mysqli, "select * from user where username= '$username' and password='$password' ");
$cek = mysqli_num_rows($login);

if($cek > 0) {
    $data = mysqli_fetch_assoc($login);

//cek jika user sebagai admin 
    if ($data['level']=="admin"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        header ("location:admin/index.php");


    }else if ($data['level']=="user"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "user";
        header("location:user/landing page.php");

    }else{
        header("location:index.php");
    }
}else{
    header("location:index.php?pesan=gagal");
}
?>