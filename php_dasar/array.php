<?php

$angka = [1,2,3,40,90,100]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba Array</title>
    <style>
        .kotak {
            width : 50px;
            height : 50px;
            background-color : red;
            text-align : center;
            line-height : 50px;
            margin : 3px;
            float : left;
        }

        .clear { clear: both;}
    </style>
</head>
<body>

<!-- Cara 1 -->
    
    <?php for ($i=0; $i < count($angka); $i++) : ?>

        <div class="kotak"><?= $angka[$i]; ?></div>
    
    <?php endfor; ?>

<!-- Cara 2 -->

    <div class="clear"></div>
    
    <?php foreach($angka as $a ) : ?>

        <div class="kotak"><?= $a; ?></div>

    <?php endforeach; ?>

</body>
</html>