<?php

require 'functions.php';

// Cek apakah user sudah menekan button sign up atau belum 
if ( isset($_POST["submit"])){

    // Jika sudah, cek apakah data yang diiunputkan user berhasil atau tidak
    if ( register($_POST) > 0){

        echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                </script>
             ";
    } else {
        echo "
                <script>
                    alert('Data gagal ditambahkan!');
                </script>
             ";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
            display : block;
        }
    </style>
</head>
<body>

    <h2>Halaman Registrasi</h2>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Konfirmasi Password :</label>
                <input type="password" name="password2" id="password2">
            </li><br>
            <li>
                <button type="submit" name="submit">Sign Up!</button>
            </li>
        </ul>
    </form>
    
</body>
</html>