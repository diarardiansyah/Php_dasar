<?php

    require 'fungsi.php';

    if ( isset($_POST["kirim"]) ) {


        if ( addData($_POST) > 0 ) {
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
    <style>
        label {
            display : block;
        }
    </style>
</head>
<body>

    <h2>Nilai Mahasiswa</h2>
    
<form action="" method="post">
    <tr>
         <td>
            <label for="nama">Nama Mahasiswa : </label>
            <select name="nama" id="nama">
                <option value="">-- Pilih Nama Mahasiswa</option>
                    <?php
                        $maha = getDataMhs("SELECT * FROM mahasiswa");

                        foreach ( $maha as $q ) :
                    ?>
                        <option value="<?= $q['id_mahasiswa']; ?>"><?= $q['nama']; ?></option>

                    <?php endforeach; ?>
            </select>
        </td><br><br>
        <td>
            <label for="kehadiran">Jumlah Kehadiran : </label>
            <input type="text" name="kehadiran" id="kehadiran" required>
        </td><br> 
        <td>
            <label for="tugas">Nilai Tugas : </label>
            <input type="text" name="tugas" id="tugas" required>
        </td><br>
        <td>
            <label for="uts">Nilai UTS : </label>
            <input type="text" name="uts" id="uts" required>
        </td><br>
        <td>
            <label for="uas">Nilai UAS : </label>
            <input type="text" name="uas" id="uas">
        </td><br><br>
        <td>
            <button type="submit" name="kirim">Tambah Data Nilai!</button>
        </td>
    </tr>
</form>

</body>
</html>