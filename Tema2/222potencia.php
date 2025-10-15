<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 222</title>
</head>

<body>
    <?php
    $base = 2;
    $exponente = 3;
    $potencia= 1;
    for ($i = 1; $i <= $exponente; $i++) {
        $potencia *= $base;
        
    }
    echo "Resultado potencia: $potencia<br>";
    ?>

</body>

</html>