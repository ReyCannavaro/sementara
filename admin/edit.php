<?php

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
    <?php

    if (isset($_POST['update'])) {

        if (
            empty($_POST['username']) || empty($_POST['nama']) ||
            empty($_POST['password']) || empty($_POST['domisili'])
        ) {
            echo "Please fillout all required fields";
        } else {
            $firstname  = $_POST['username'];
            $lastname   = $_POST['nama'];
            $address    = $_POST['password'];
            $contact    = $_POST['domisili'];
            $sql = "UPDATE users SET username='{$firstname}', nama='{$lastname}',
                    password='{$address}', domisli='{$contact}' 
                    WHERE user_id=" . $_POST['userid'];

            if ($con->query($sql) === TRUE) {
                echo "<div class=alert alert-success'>Successfully updated user</div>";
            } else {
                echo "<div class=alert alert-danger'>Error: There was an error while updating user info</div>";
            }
        }
    }
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    $sql = "SELECT * FROM users WHERE id={$id}";
    $result = $con->query($sql);

    if ($result->num_rows < 1) {
        header('Location: index.php');
        exit;
    }
    $row = $result->fetch_assoc();
    ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box">
                <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;MODIFY User</h3>
                <form action="" method="POST">
                    <input type="hidden" value="<?php echo $row['user_id']; ?>" name="id">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" class="form-control"><br>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" class="form-control"><br>
                    <label for="password">Password</label>
                    <textarea rows="4" name="password" class="form-control"><?php echo $row['password']; ?></textarea><br>
                    <label for="domisili">Domisili</label>
                    <input type="text" id="domisili" name="domisili" value="<?php echo $row['domisili']; ?>" class="form-control"><br>
                    <br>
                    <input type="submit" name="update" class="btn btn-success" value="Update">
                </form>
            </div>
        </div>
    </div>
</div>

<?php

require_once 'footer.php';
?>