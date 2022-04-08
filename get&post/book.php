<?php 

$buku = [
    [ 
          "judul" => "Pemrograman asik loh",
          "penerbit" => "Diar",
          "tahun" => "2020",
          "kota_asal" => "Depok",
          "foto_buku" => "buku1.jpg"
    ],
    [
          "judul" => "belajar pemrograman dasar python & php",
          "penerbit" => "Ardiansyah",
          "tahun" => "2021",
          "kota_asal" => "Bandung",
          "foto_buku" => "buku2.jpeg"
    ]               
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET METHOD</title>
</head>
<body>

<h1>Belajar method GET</h1>

<?php foreach($buku as $book) : ?>
    <ul>
        <li>
            <a href="detail.php?judul=<?= $book['judul']; ?>&penerbit=<?= $book['penerbit']; ?>&tahun=<?= $book['tahun']; ?>&kota_asal=<?= $book['kota_asal']; ?>&foto_buku=<?= $book['foto_buku']; ?>"><?= $book["judul"]; ?></a>
        </li>
    </ul>
<?php endforeach; ?>



    
</body>
</html>