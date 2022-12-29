<?php
    require 'function.php';
    $id = $_GET["id"];
    if(isset($_POST["submit"])) {
        if( isset($_POST["submit"])){
            //jika sudah ditekan dijalankan function tambah
            if(edit($id,$_POST) > 0) {
                echo "
                    <script>
                        // alert('data berhasil diedit!');
                        document.location.href = 'admin.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('data Berhasil diedit!');
                        document.location.href = 'admin.php';
                    </script>
                ";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Praktikum 11</title>
</head>
<body>
<div style="border:0; padding:50px; width: 7600px; height:auto;">
<form action="" method="POST" enctype="multipart/form-data" id="form1">
    <td width="30%"><font color="black" size="5"><strong>From Data Pegawai</datagrid></strong></font></td><br><br>

    <label for="nama">Nama</label><br>
        <input type="text" id="nama" name="nama" size="50" maxlength="100"><br><br>

    <label for="email">Email</label><br>
        <input type="text" id="email" name="email" size="50" maxlength="100"><br><br>

    <label for="email">Alamat</label><br>
        <input type="text" id="alamat" name="alamat" size="50" maxlength="100">

    <p>Gender</p>
                <input type="radio" value="female" id="female" name="gender" checked />
                <label for="female" class="radio">Perempuan</label>
                <input type="radio" value="male" id="male" name="gender" />
                <label for="male" class="radio">Laki-laki</label><br><br>

    <label for="posisi">Position</label><br>
        <input type="text" id="posisi" name="posisi" size="50" maxlength="100"><br><br>

    <label for="status">Status</label><br>
        <select id="status" name="status">
            <option value="-">- Pilih Status -
            <option value="Fulltime">Fulltime
            <option value="Parttime">Parttime
            <option value="Magang">Magang
        </select><br><br>
    <input type="submit" name="submit" value="Edit">   
    <input type="reset" name="reset" value="Cancel">
</form>
</div>
</body>
</html>