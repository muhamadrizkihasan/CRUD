<?php
    require 'functions.php';
    $students = query("SELECT * FROM students");

    if( isset($_POST["cari"]) ) {
        $students = cari($_POST["keyword"]);
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-sm">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="card" style="width: 60rem; height: 46rem;">
                <div class="card-body">
                    <h1>Daftar Siswa</h1>
                    
                                <button type="button" class="btn btn-primary"  style="width: 13rem; height: 3rem">
                                    <ul>
                                        <li>
                                            <a href="tambah.php">Tambah Data Siswa</a>
                                        </li>
                                    </ul>                        
                                </button>
                                 
                    <br><br><br>

                    <form action="" method="post">
                        <div class="input-group mb-2">
                            <input type="text" name="keyword" size="40" autofocus 
                            placeholder=" Search.." autocomplete="off">
                            <button type="submit" name="cari" class="btn btn-dark">Cari!</button>
                        </div>
                    </form>

                    <table border="1" cellpadding="10" cellspacing"0" class="table table-bordered border-primary">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Rombel</th>
                            <th>Rayon</th>
                            <th>Status</th>
                            <th>Gambar</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach ($students as $student) : ?> 
                            <tr>
                                <td><?= $i; ?></td>
                                <td>
                                    <button type="button" class="btn btn-danger"  style="width: 7rem; height: 3rem">
                                        <ul>
                                            <li>
                                                <a href="hapus.php?id=<?= $student["id"];?>" onclick="return confirm('Yakin ingin menghapus data siswa?');">Hapus</a> 
                                            </li>
                                        </ul>
                                    </button>      
                                    <button type="button" class="btn btn-success"  style="width: 7rem; height: 3rem">
                                        <ul>
                                            <li>
                                                <a href="ubah.php?id=<?= $student["id"];?>" onclick="return confirm('Yakin ingin mengubah data siswa?');">Ubah</a> 
                                            </li>
                                        </ul>
                                    </button>
                                </td>
                                <td><?= $student["nama"];?></td>
                                <td><?= $student["nis"];?></td>
                                <td><?= $student["rombel"];?></td>
                                <td><?= $student["rayon"];?></td>
                                <td><?= $student["status"];?></td>
                                <td><img src="img/<?= $student["gambar"];?>" width="50"></td>
                            </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>