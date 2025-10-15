<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 233</title>
</head>

<body>
    <?php

    $personas = array("M", "F");

    for ($i = 0; $i < 100; $i++) {
        $persona[] = $personas[array_rand($personas)];
    }

    sort($persona);
    echo "Personas clasificadas por sexo: ". "<br>";
    print_r($persona);

    foreach ($persona as $humano) {
        if ($humano === "M"){
            $humano += "Masculino";
        } else {
            $humano += "Femenino";

        }
        print($humano . "<br>");
    }

    echo "<br>";

    

    ?>
</body>

</html>