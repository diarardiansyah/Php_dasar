<?php 

$angka = 20;

for ($i=1; $i <= 20 ; $i++) { 
    
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "Fizz Buzz <br>";
    } elseif ($i % 3 == 0) {
        echo "Fizz <br>";
    } elseif ($i % 5 == 0) {
        echo "Buzz <br>";
    } else {
        echo "$i <br>";
    }
}