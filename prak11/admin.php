<?php
    require 'function.php';
    $result = query("SELECT * FROM prak11");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>Daftar Pegawai</h1>
    <a href="index.php">Tambah data</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>id</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Address</td>
            <td>Position</td>
            <td>Gender</td>
            <td>Status</td>
            <td colspan="2">Action</td>
        </tr>
        <!-- print data from result -->
        <?php $i = 1; ?>
        <?php 
        if($result != NULL){
            foreach($result as $row) : 
                ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["Nama"]; ?></td>
            <td><?= $row["Email"]; ?></td>
            <td><?= $row["Alamat"]; ?></td>
            <td><?= $row["Position"]; ?></td>
            <td><?= $row["Gender"]; ?></td>
            <td><?= $row["Status"]; ?></td>
            <td>
                <a href="hapus.php?id=<?= $row["id"]; ?>" class="button">Hapus</a>
            </td>
            <td>
                <a href="edit.php?id=<?= $row["id"]; ?>" class="button">edit</a>
            </td>
            <?php $i++; ?>
        </tr>
        <?php endforeach; } ?>
</body>

</html>