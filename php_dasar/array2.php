<?php

$pekerka = [
    ["Diar Ardiansyah", "22 Tahun", "QA engineer", "Depok"],
    ["Ardiansyah", "23 Tahun", "Software engineer", "Jakarta"],
    ["Budi", "25 Tahun", "Product manager", "Jogja"]
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
    
    <h1>Data Karyawan</h1>

    <?php foreach($pekerka as $k): ?>
    <ul>
            <li>Nama      : <?= $k[0]; ?></li>
            <li>Umur      : <?= $k[1]; ?></li>
            <li>Pekerjaan : <?= $k[2]; ?></li>
            <li>Domisili  : <?= $k[3]; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>