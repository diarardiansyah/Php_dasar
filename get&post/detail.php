<?php
    // cek apakah di dalam method get ada data atau tidak
    if( !isset($_GET["judul"]) || 
        !isset($_GET["penerbit"]) || 
        !isset($_GET["tahun"]) || 
        !isset($_GET["kota_asal"]) || 
        !isset($_GET["foto_buku"]) ) {

        header("Location: book.php");
        exit;
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
    <h2>Detail Buku</h2>

    <ul>
        <li>
            <img src="img/<?= $_GET['foto_buku']; ?>" alt="">
        </li>
        <li><?= $_GET['judul']; ?></li>
        <li><?= $_GET['penerbit']; ?></li>
        <li><?= $_GET['tahun']; ?></li>
        <li><?= $_GET['kota_asal']; ?></li>
    </ul>

    <a href="book.php">Kembali ke data buku</a>
</body>
</html>