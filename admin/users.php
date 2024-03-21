<?php

require_once 'connect.php';

require_once 'header.php';

echo "<div class='container'>";

if (isset($_POST['delete'])) {
    $sql = "DELETE FROM users WHERE 'id'=" . $_POST['id'];
    if ($con->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Successfully delete user</div>";
    }
}

$sql    = "SELECT * FROM user";
$result = $con->query($sql);

if ($result ->num_rows > 0) {
?>
    <h2>List of all Users</h2>
    <table class="table table-bordered table-striped">
        <tr>
            <td>Username</td>
            <td>Nama</td>
            <td>Password</td>
            <td>Domisili</td>
            <td width="70px">Delete</td>
            <td width="70px">EDIT</td>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<form action='' method='POST'>";
            echo "<input type='hidden' value='" . $row['id'] . "' name='id
    ' />";
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['domisili'] . "</td>";
            echo "<td><a href='delete_user.php?id=" . $row['id'] . "' class='btn-hapus'>Hapus</a></td>";
            echo "<td><a href='update_user.php?id=" . $row['id'] . "' class='btn-update'>Update</a></td>";
            echo "<tr>";
            echo "</form>";
        }
        ?>
    </table>
<?php
} else {
    echo "<br><br>No Record Found";
}
?>
</div>

<?php

require_once 'footer.php'
?>