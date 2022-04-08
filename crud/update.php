<?php

session_start();

if( !isset($_SESSION["login"])){

    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET['id'];

$buku = query("SELECT * FROM buku WHERE id = $id")[0]; // <- 0 adalah = untuk mengambil index pertama dari data array yang didapat dari database


// Cek apakah button submit sudah pernah di click atau belum

if ( isset($_POST['submit'])){

    // Cek apakah sudah ada data yang berubah  ke dalam database atau belum
    if ( update($_POST) > 0 ){
        echo "
                <script> 
                    alert('Data Berhasil Diubah!');
                    document.location.href = 'index.php';
                </script>
             ";
    } else {
        echo "
                <script> 
                    alert('Data Gagal Diubah!');
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
    
    <h1>Form Edit Data Buku</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <input type="hidden" name="id" value="<?= $buku['id']; ?>">
            <input type="hidden" name="oldImage" value="<?= $buku['foto']; ?>">
            <li>
                <label for="judul">Judul :</label>
                <input type="text" name="judul" id="judul" required value="<?= $buku["judul"]; ?>">
            </li>
            <li>
                <label for="penerbit">Penerbit :</label>
                <input type="text" name="penerbit" id="penerbit" required value="<?= $buku["penerbit"]; ?>">
            </li>
            <li>
                <label for="tahun">Tahun :</label>
                <input type="text" name="tahun" id="tahun" required value="<?= $buku["tahun"]; ?>"> 
            </li>
            <li>
                <label for="kota">Kota :</label>
                <input type="text" name="kota" id="kota" value="<?= $buku["kota"]; ?>">
            </li>
            <li>
                <label for="foto">Foto :</label><br>
                    <img src="img/<?= $buku["foto"]; ?>" alt="" width="40"><br>
                <input type="file" name="foto" id="foto"">
            </li>
            <li>
                <button name="submit" id="submit">Ubah Data Buku</button>
            </li>
        </ul>
    </form>

</body>
</html>