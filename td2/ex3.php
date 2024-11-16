<?php
    echo " EXERCICE 3<br><br>";

    for ($i = 0; $i < 100; $i++) {
        echo "<br> $i";
         if ($i%3== 0 && $i%5== 0) {
            echo " FizzBuzz";
        } else if ($i%5== 0) {
            echo " Buzz";
        } else if ($i%3== 0) {
            echo "Fizz ";
        }
    }