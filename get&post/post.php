<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- Cara jika action nya dilakukan di file yang sama -->

<!-- Cek apakah user sudah pernah melakukan click button submit -->
<?php if( isset($_POST['submit'])) : ?>
    <h1>Judul bukunya adalah <?= $_POST['judul']; ?></h1>
    <br>
    <h1>Penerbitnya adalah <?= $_POST['penerbit']; ?></h1>
<?php endif; ?>

    <h2>Data Buku</h2>
    
    <form method="post">
        <label for="judul">Masukan Judul Buku</label>
        <input type="text" name="judul" id="judul">
        <br>
        <label for="penerbit">Masukan Penerbit Buku</label>
        <input type="text" name="penerbit" id="penerbit">
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>
    

</body>
</html>