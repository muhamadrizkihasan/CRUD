<?php
    if( isset($_POST["submit"]) ) {
        if( $_POST["username"] == "hasan" && $_POST["password"] == "kiki123") {
            header("Location: admin.php");
            exit; 
        } else {
            $error = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url('img/login.jpg');
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container-sm">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="card" style="width: 30rem; height: 23rem;">
                <div class="card-body">
                    <h1>User Login</h1>
                        <?php if( isset($error) ) : ?>
                            <p>username / password salah!</p>
                        <?php endif; ?>
                        <br>

                    <form action="" method="post">
                        <div class="mb-4">
                            <div class="form-floating">
                                <input type="username" name="username" class="form-control" placeholder="Leave a comment here" id="floatinginput" autocomplete="off"></input>
                                <label for="floatinginput">Username</label>
                            </div>                           
                        </div>
                        <div class="mb-4">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" placeholder="Leave a comment here" id="floatinginput"></input>
                                <label for="floatinginput">Password</label>
                            </div>               
                        </div>
                        <button type="submit" name="submit" class="w-100 btn btn-lg btn-primary">Login!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>   
</body>
</html>