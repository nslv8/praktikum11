<?php
        //koneksi ke database
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "praktikum";
        $conn = mysqli_connect($server, $user, $pass, $database);

        //fungsi untuk mengambil data dari database
        function query($query){
            global $conn;
            $data = mysqli_query($conn, $query);
            $prak112 = [];
            while( $prak11 = mysqli_fetch_assoc($data) ) {
                $prak112[] = $prak11;
            }
            return $prak112;
        }

        function tambah($data){
            global $conn;

            $name = $data["nama"];
            $email = $data["email"];
            $alamat = $data["alamat"];
            $gender = $data["gender"];
            $position = $data["posisi"];
            $status = $data["status"];

            
            $result = query("SELECT * FROM prak11");

            $query = "INSERT INTO prak11 (Nama, Email, Alamat, Gender, Position, `Status`)
                    VALUES
                    ('$name', '$email', '$alamat','$gender', '$position', '$status')
                ";
            
            
            if($result != NULL){
                foreach($result as $row){
                    if($row['email'] == $email){
                        echo "
                            <script>
                            alert('GAGAL!, data email sudah terdaftar!');
                            document.location.href = 'admin.php';
                            </script>
                            ";
                            return mysqli_affected_rows($conn);
                        }
                    }
                }
            // $data = mysqli_query($conn, $query); 
            //menggunakan query untuk menambah data yaitu memerlukan parameter penghubung database dan query sql
            mysqli_query($conn, $query);
            //mengembalikan jumlah pada database,
            //contoh: jika id = 3 terdapat pada database maka akan mereturn nilai 1, jika tidak ada maka return 0
            return mysqli_affected_rows($conn);
        }

        function hapus($id){
            global $conn;
            mysqli_query($conn, "DELETE FROM prak11 WHERE id = $id");
            //mengembalikan jumlah pada database,
            //contoh: jika id = 3 terdapat pada database maka akan mereturn nilai 1, jika tidak ada maka return 0
            return mysqli_affected_rows($conn);
        }

        function edit($id, $data){
            global $conn;   

            $name = $data["nama"];
            $alamat = $data["alamat"];
            $email = $data["email"];
            $gender = $data["gender"];
            $position = $data["posisi"];
            $status = $data["status"];

            $query = "UPDATE prak11 SET Nama='$name', Alamat='$alamat', Email='$email', Position = '$position', Gender = '$gender', `Status` = '$status'
                    WHERE id = '$id'
                ";
            
            $data = mysqli_query($conn, $query); 
            //menggunakan query untuk edit data yaitu memerlukan parameter penghubung database dan query sql
            mysqli_query($conn, $query);
            //mengembalikan jumlah pada database,
            //contoh: jika id = 3 terdapat pada database maka akan mereturn nilai 1, jika tidak ada maka return 0
            return mysqli_affected_rows($conn);
        }
?>