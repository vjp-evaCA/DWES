<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 232</title>
</head>

<body>
    <?php

    for ($i = 0; $i < 33; $i++) {
        $num[] = rand(0, 100);
    }

    sort($num);

    foreach ($num as $numero) {
        print($numero . "<br>");
    }

    echo "<br>";

    $numMax = max($num);
    echo "Número mayor: " . $numMax . "<br>";

    $numMin = min($num);
    echo "Número menor: " . $numMin . "<br>"; 

    $numMedia = array_sum($num) / count($num);
    echo "Media: " . $numMedia . "<br>";


    

    ?>
</body>

</html>