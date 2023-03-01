<?php
    $conn = mysqli_connect("localhost", "root", "", "db_murid");

        function query($query) {
            global $conn;
            $result = mysqli_query($conn, $query);
            $rows = [];
            while( $baju = mysqli_fetch_assoc($result) ) {
                $rows[] = $baju;
            }
            return $rows;
        }

        function tambah($data) {
            global $conn;
            $nama = htmlspecialchars($data["nama"]);
            $nis = htmlspecialchars($data["nis"]);
            $rombel = htmlspecialchars($data["rombel"]); 
            $rayon = htmlspecialchars($data["rayon"]);
            $status = htmlspecialchars($data["status"]);

            $gambar = upload();
            if( !$gambar ) {
                return false;
            }

            $query = "INSERT INTO students
                    VALUES
                    ('',  '$nama', '$nis', '$rombel', '$rayon', '$status', '$gambar')  
                ";
            mysqli_query($conn, $query);

            return mysqli_affected_rows($conn);
        }

        function upload() {
            $namaFile = $_FILES['gambar']['name'];
            $ukuranFile = $_FILES['gambar']['size'];
            $error = $_FILES['gambar']['error'];
            $tmpName = $_FILES['gambar']['tmp_name'];

            if( $error === 4 ) {
                echo "<script>
                        alert('Pilih gambar terlebih dahulu!');
                      </script>";
                return false;
            }

            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
            if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
                echo "<script>
                        alert('Yang anda pilih bukan gambar!');
                      </script>";
                return false;
            }
            
            if( $ukuranFile > 1000000 ) {
                echo "<script>
                        alert('Ukuran gambar terlalu besar!');
                      </script>";
                return false;   
            }

            $namaFileBaru = uniqid();
            $namaFileBaru .= '.'; 
            $namaFileBaru .= $ekstensiGambar; 

            move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

            return $namaFileBaru;
        }

        function hapus($id) {
            global $conn;
            mysqli_query($conn, "DELETE FROM students WHERE id = $id");
            return mysqli_affected_rows($conn);
        }

        function ubah($data) {
            global $conn;
            $id = $data["id"];
            $nama = htmlspecialchars($data["nama"]);
            $nis = htmlspecialchars($data["nis"]);
            $rombel = htmlspecialchars($data["rombel"]);
            $rayon = htmlspecialchars($data["rayon"]);
            $status = htmlspecialchars($data["status"]);
            $gambarLama = htmlspecialchars($data["gambarLama"]);

            if( $_FILES['gambar']['error'] === 4 ) {
                $gambar = $gambarLama;
            } else {
                $gambar = upload();
            }

            $query = "UPDATE students SET
                        nama = '$nama',
                        nis = '$nis',
                        rombel = '$rombel',
                        rayon = '$rayon',
                        status = '$status',
                        gambar = '$gambar'
                    WHERE id = $id
                ";
            mysqli_query($conn, $query);

            return mysqli_affected_rows($conn);
        }

        function cari($keyword) {
            $query = "SELECT * FROM students WHERE
                        nama LIKE '%$keyword%' OR 
                        nis LIKE '%$keyword%' OR 
                        rombel LIKE '%$keyword%' OR 
                        rayon LIKE '%$keyword%' OR 
                        status LIKE '%$keyword%' 
                    ";
            return query($query);
        }
?>