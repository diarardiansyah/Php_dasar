<?php

    require 'fungsi.php';

    if ( isset($_POST['submit']) ) {

        if ( addDataMhs($_POST) > 0 ) {
            echo "
                    <script> 
                        alert('Data Berhasil Ditambahkan!');
                        document.location.href = 'mahasiswa.php';
                    </script>
                 ";
        } else {
            echo "
                    <script>
                        alert('Data gagal ditambahkan!');
                        document.location.href = 'mahasiswa.php';
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
    <style>
        label {
            display : block;
        }
    </style>
    <title>Document</title>
</head>
<body>

    <h2>Form Add Data Mahasiswa</h2>

    <form action="" method="post">
        <td>
            <label for="nama">Nama Mahasiswa</label>
            <input type="text" name="nama" id="nama">
        </td> 
        <td>
            <label for="jenis_kelamin">Jenis Kelamnin</label>
            <input type="text" name="jenis_kelamin" id="jenis_kelamin">
        </td><br><br>
        <td>
            <button type="submit" name="submit">Tambah Data Mahasiswa</button>
        </td>

    </form>
    
</body>
</html>