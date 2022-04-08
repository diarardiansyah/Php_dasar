<?php

    require 'fungsi.php';

    // QUery untuk mendapatkan data mahasiswa
    $mahasiswa = getDataMhs("SELECT * FROM mahasiswa");

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
    
    <h2>Halaman Data Mahasiswa</h2>

    <table border="1", cellpadding="10", cellspacing="0">

    <a href="add_mhs.php">Tambah Data Mahasiswa</a>
    <br><br>

    <tr>
        <th>No.</th>
        <th>Nama Mahasiswa</th>
        <th>Jenis Kelamin</th>
        <th>Aksi</th>
    </tr>
    
    <?php $no = 1; ?>

    <?php foreach ( $mahasiswa as $mhs) : ?>

    <tr>
        <td><?= $no++; ?></td>
        <td><?= $mhs["nama"]; ?></td>
        <td><?= $mhs["jenis_kelamin"]; ?></td>
        <td>
            <a href="">Edit</a>
            <a href="">Delete</a>
        </td>
    </tr>

    <?php endforeach; ?>

    </table>
    <br> <br>

    <a href="index.php">Kembali Ke index</a>

</body>
</html>