<?php

// untuk koneksi ke database

$conn = mysqli_connect("localhost","root","","tblbuku");

// query untuk menampilkan data dari databse

$result = mysqli_query($conn, "SELECT * FROM buku");


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

<h2>Daftar Data Buku</h2>

<a href="">Tambah Data Buku</a>


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
    
    <?php while($row = mysqli_fetch_assoc($result)) : ?>

    <tr>
        <td><?= $i; ?></td>
        <td><?= $row["judul"]; ?></td>
        <td><?= $row["penerbit"]; ?></td>
        <td><?= $row["tahun"]; ?></td>
        <td><?= $row["kota"]; ?></td>
        <td>
            <img src="img/<?= $row["foto"]; ?>" alt="" width="60">
        </td>
        <td>
            <a href="">Edit</a> |
            <a href="">Delete</a>
        </td>
    </tr>
    
    <?php $i++; ?>
    <?php endwhile; ?>

</table>
    
</body>
</html>