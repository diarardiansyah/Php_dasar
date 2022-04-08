<?php

session_start();

if( !isset($_SESSION["login"])){

    header("Location: login.php");
    exit;
}

require 'functions.php';

// konfigurasi pagination
$jumlahDataPerHalaman = 3;
$jumlahData = count(query("SELECT * FROM buku"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["page"])) ? $_GET["page"] : 1;

// halaman = 2, awal data = 3
$dataAwal = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

// query untuk menampilkan data dari databse
$buku = query("SELECT * FROM buku LIMIT $dataAwal, $jumlahDataPerHalaman");

// cek apakah button cari sudah pernah di click atau belum
if ( isset($_POST["search"])){

    // $_POST akan menangkap data apapun itu yang diinputkan dari keyword lalu dikirimkan ke function search
    $buku = search($_POST["keyword"]);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
</head>
<body>

<a href="logout.php" onclick="return confirm('Yakin mau logout ?');">Logout</a>

<h2>Daftar Data Buku</h2>

<a href="tambah_buku.php">Tambah Data Buku</a>
<br><br>

<form action="" method="post">
    <input type="text" name="keyword" size="35" autofocus placeholder="Masukan data yang mau dicari...." autocomplete="off">
    <button type="submit" name="search">Search!</button>
</form>
<br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Judul</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Kota</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>

    <?php $i = 1; ?> 
    
    <?php foreach($buku as $row) : ?>

    <tr>
        <td><?= $i + $dataAwal; ?></td>
        <td><?= $row["judul"]; ?></td>
        <td><?= $row["penerbit"]; ?></td>
        <td><?= $row["tahun"]; ?></td>
        <td><?= $row["kota"]; ?></td>
        <td>
            <img src="img/<?= $row["foto"]; ?>" alt="" width="60">
        </td>
        <td>
            <a href="update.php?id=<?= $row['id']; ?>">Edit</a> |
            <a href="hapus_buku.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus data ini ?');">Delete</a>
        </td>
    </tr>
    
    <?php $i++; ?>
    <?php endforeach; ?>

</table>


<?php if( $halamanAktif > 1 ) : ?>
    <a href="?page=<?= $halamanAktif - 1; ?>">&laquo;</a>
<?php endif ; ?>

<!-- Navigasi pagination -->

<?php for( $i = 1; $i <= $jumlahHalaman; $i++) : ?>
    <?php if( $i == $halamanAktif ) : ?>
        <a href="?page=<?= $i; ?>" style="font-weight : bold; color: red;"><?= $i; ?></a>
    <?php else: ?>
        <a href="?page=<?= $i; ?>"><?= $i; ?></a>
    <?php endif; ?>
<?php endfor; ?>

<!-- Cek navigasi next ke halaman selanjutnya -->
    
<?php if ( $halamanAktif < $jumlahHalaman ) : ?>
    <a href="?page=<?= $halamanAktif + 1; ?>">&raquo;</a>
<?php endif ; ?>

</body>
</html>

