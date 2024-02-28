<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styleregist.css">

    <div class="container">
        <form action="register.php" method="post" class="register-form">
            <h2>Register</h2>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="level">Level</label>
            <select id="level" name="level" required>
                <option value="user">User</option>
            </select>

            <label for="domisili">Domisili</label>
            <input type="text" id="domisili" name="domisili" required>

            <button type="submit" name="Submit">Register</button>
        </form>
    </div>
</body>
</html>

<?php

        if (isset($_POST['Submit'])) {
            $nama= $_POST['nama'];
            $username= $_POST['username'];
            $password= $_POST['password'];
            $level= $_POST['level'];
            $domisili= $_POST['domisili'];
            echo($password);

            include_once("../koneksi.php");

            $result = mysqli_query($mysqli,"INSERT INTO user(nama,username,password,level,domisili)
            VALUES('$nama','$username','$password','$level','$domisili')");

            header("location:../index.php");
        }
        ?>

</head>
<body>