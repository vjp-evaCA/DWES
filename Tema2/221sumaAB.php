<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 220</title>
</head>

<body>
    <?php
    $inicio = $_GET["inicio"];
    $fin = $_GET["fin"];


    $suma = 0;
    for ($ininio; $inicio <= $fin; $inicio++) {
        $suma += $inicio;
    }
    echo "Total: $suma<br>";
    ?>


</body>

</html>