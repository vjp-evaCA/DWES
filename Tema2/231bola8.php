<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 231</title>
</head>

<body>
    <?php
    $pregunta = $_GET["pregunta"];
    ?>

    <?php echo "Pregunta: " . $pregunta;  ?>
    <?php echo "<br>";  ?>

    <?php
    $respuestas = array("Si", "No", "Quizás", "Claro que sí", "Por supesto que no", "No lo tengo claro", "Seguro", "Yo diría que sí", "Ni de coña");

    $respuestaAleatoria = $respuestas[array_rand($respuestas)];

    echo "Respuesta: ".$respuestaAleatoria;
    ?>

</body>

</html>