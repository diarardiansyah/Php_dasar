<?php

session_start();

if( !isset($_SESSION["login"])){

    header("Location: login.php");
    exit;
}

require 'functions.php';

// Cek apakah button submit sudah pernah di click atau belum

if ( isset($_POST['submit'])){

    // Cek apakah sudah ada data yang bertambah ke dalam database atau belum
    if ( addData($_POST) > 0 ){
        echo "
                <script> 
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'index.php';
                </script>
             ";
    } else {
        echo "
                <script> 
                    alert('Data Gagal Ditambahkan!');
                    document.location.href = 'index.php';
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
</head>
<body>
    
    <h1>Form Tambah Data Buku</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="judul">Judul :</label>
                <input type="text" name="judul" id="judul" required>
            </li>
            <li>
                <label for="penerbit">Penerbit :</label>
                <input type="text" name="penerbit" id="penerbit" required>
            </li>
            <li>
                <label for="tahun">Tahun :</label>
                <input type="text" name="tahun" id="tahun" required>
            </li>
            <li>
                <label for="kota">Kota :</label>
                <input type="text" name="kota" id="kota">
            </li>
            <li>
                <label for="foto">Foto :</label>
                <input type="file" name="foto" id="foto">
            </li>
            <li>
                <button name="submit" id="submit">Tambah</button>
            </li>
        </ul>
    </form>

</body>
</html>