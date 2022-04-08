<?php

    require 'fungsi.php';

    // Query select from tbl mahasiswa
    $mhs = getData("SELECT tblmhs.*, tblmhs.id, mahasiswa.nama FROM tblmhs INNER JOIN mahasiswa ON tblmhs.id_mahasiswa = mahasiswa.id_mahasiswa ");

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

<nav>
  <ul>
    <li><a href="mahasiswa.php">Data Mahasiswa</a></li>
 </ul>
</nav>

    <h2>Data nilai Mahasiswa</h2>

    <a href="tambah_nilai.php">Tambah Data Nilai</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama Mahasiswa</th>
            <th>Jumlah Kehadiran</th>
            <th>Nilai Tugas</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Grade</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>

        <?php foreach( $mhs as $m ) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $m["nama"]; ?></td>
            <td><?= $m["kehadiran"]; ?></td>
            <td><?= $m["tugas"]; ?></td>
            <td><?= $m["uts"]; ?></td>
            <td><?= $m["uas"]; ?></td>
            <td><?= $m["nilai_akhir"]; ?></td>
            <td><?= $m["grade"]; ?></td>
            <td>
                <a href="delete.php?id=<?= $m['id']; ?>" onclick="return confirm('Yakin hapus data ini ?');">Delete</a>
            </td>
        </tr>

        <?php $i++; ?>
        <?php endforeach; ?>

    </table>
    
</body>
</html>