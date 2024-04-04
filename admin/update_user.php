<?php
include '../koneksi.php';

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $domisili = $_POST['domisili'];

    // Lakukan proses update data di database
    $query = "UPDATE user SET nama='$nama', username='$username', password='$password', domisili='$domisili' WHERE id=$id";
    $result = mysqli_query($mysqli, $query);

    if($result) {
        echo "Data berhasil diperbarui.";
        header("Location: users.php"); // Redirect kembali ke halaman data user
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($mysqli);
    }
}

// Mendapatkan data user yang akan diupdate
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM user WHERE id=$id";
    $result = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    echo "ID user tidak ditemukan.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="styleupdate.css">
</head>
<body>
<div class="container">
        <header>
            <h1 class="title">Update User</h1>
        </header>
        <section class="form">
        <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

        <label for="username">Nama</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>"><br>

        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo $data['username']; ?>"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" value="<?php echo $data['password']; ?>"><br>

        <label for="domisili">domisili:</label><br>
        <input type="domisili" id="domisili" name="domisili" value="<?php echo $data['domisili']; ?>"><br><br>
        <input type="submit" name="update" value="Update" class="button">
    </form>
        </section>
    </div>
    
</body>
</html>