<?php

$buku = [
    [ 
          "judul" => "Pemrograman asik loh",
          "penerbit" => "Diar",
          "tahun" => "2020",
          "kota asal" => "Depok",
          "foto buku" => "buku1.jpg"
    ],
    [
          "judul" => "belajar pemrograman dasar python & php",
          "penerbit" => "Ardiansyah",
          "tahun" => "2021",
          "kota asal" => "Bandung",
          "foto buku" => "buku2.jpeg"
    ]               
];


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

<h2>Data Buku</h2>

<?php foreach($buku as $book) : ?>

<ul>
    <li>Foto Buku : 
        <img src="img/<?= $book["foto buku"] ?>" alt="">
    </li>
    <li>Judul : <?= $book["judul"]; ?></li>
    <li>Penerbit : <?= $book["penerbit"]; ?></li>
    <li>Tahun : <?= $book["tahun"]; ?></li>
    <li>Kota Asal : <?= $book["kota asal"]; ?></li>
</ul>

<?php endforeach; ?>

</body>
</html>