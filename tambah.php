<?php
    require 'functions.php';

    if( isset($_POST["submit"]) ) {
        if( tambah($_POST) > 0 ) {
            echo "<script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'admin.php';
                </script>";
        } else {
            echo "<script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'admin.php';
                </script> ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Data</title>
    <style>
        body {
            background-image: url('img/biru1.jpg');
            
        }
    </style>
</head>
<body>
    <div class="container-sm">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="card" style="width: 40rem; height: 37rem;">
                <div class="card-body">
                    <h1>Tambah Data</h1>    
                    <form action="" method="post" enctype="multipart/form-data">
                        <ul>
                            <li>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Leave a comment here" id="floatinginput" autocomplete="off" name="nama">
                                        <label for="floatinginput" class="form-label">Nama</label> 
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Leave a comment here" id="floatinginput" autocomplete="off" name="nis">
                                        <label for="floatinginput" class="form-label">NIS</label> 
                                    </div>
                                </div>
                            </li>
                            
                            <li>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Leave a comment here" id="floatinginput" autocomplete="off" name="rombel">
                                        <label for="floatinginput" class="form-label">Rombel</label> 
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Leave a comment here" id="floatinginput" autocomplete="off" name="rayon">
                                        <label for="floatinginput" class="form-label">Rayon</label> 
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Leave a comment here" id="floatinginput" autocomplete="off" name="status">
                                        <label for="floatinginput" class="form-label">Status</label> 
                                    </div>
                                </div>
                            </li>
                            <li>
                                <label for="gambar" class="form-label">Gambar:</label>
                                <input type="file" class="form-control" name="gambar" id="gambar"> <br>
                            </li>
                            <li>
                                <button type="submit" name="submit" class="btn btn-primary">Tambah Data!</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>   
</body>
</html>