<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 204</title>
</head>

<body>
    <?php
    $nombre = $_GET["nombre"];
    $apellido1 = $_GET["apellido1"];
    $apellido2 = $_GET["nombre"];
    $email = $_GET["email"];
    $anioNacimiento = $_GET["anioNacimiento"];
    $telefono = $_GET["telefono"];
    ?>

    <table border="1">
    <tr>
        <td>Nombre</td>
        <td><?php echo $nombre; ?></td>
    </tr>
    <tr>
        <td>Primer apellido</td>
        <td><?php echo $apellido1; ?></td>
    </tr>
    <tr>
        <td>Segundo apellido</td>
        <td><?php echo $apellido2; ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $email; ?></td>
    </tr>
    <tr>
        <td>Año de nacimiento</td>
        <td><?php echo $anioNacimiento; ?></td>
    </tr>
    <tr>
        <td>Teléfono</td>
        <td><?php echo $telefono; ?></td>
    </tr>
</table>
</body>

</html>