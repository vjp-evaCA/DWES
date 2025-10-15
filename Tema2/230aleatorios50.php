<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 230</title>
</head>

<body>
    <?php

    for ($i = 0; $i < 50; $i++) {
        $num[] = rand(0, 99);
    }

    sort($num);

    foreach ($num as $numero) {
        print($numero . "<br>");
    }

    ?>
</body>

</html>