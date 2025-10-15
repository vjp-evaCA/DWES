<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 250</title>
</head>

<body>
    <?php
        $frase="Hola mundo";
        echo "La frase es: " . $frase . "<br>";

        $tam=strlen($frase);
        echo "La longitud de la cadena es de " . $tam . "<br>";

        if($frase % 2 == 1){
            
        }

        echo "La frase mostrando los índices impares es: " . $frase[1].$frase[3].$frase[5].$frase[7].$frase[9];
    ?>
</body>

</html>