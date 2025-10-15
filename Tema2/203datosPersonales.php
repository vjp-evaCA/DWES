<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 203</title>
</head>

<body>
    <?php
    $nombre = "Bruce";
    $primerApellido = "Weyne";
    $segundoApellido = "Enterprise";
    $email = "batman@dccomics.com";
    $anioNacimiento = "1939";
    $telefono = 666123456;
    ?>
    <table border="1">
    <tr>
        <td>Nombre</td>
        <td><?php echo $nombre; ?></td>
    </tr>
    <tr>
        <td>Primer apellido</td>
        <td><?php echo $primerApellido; ?></td>
    </tr>
    <tr>
        <td>Segundo apellido</td>
        <td><?php echo $segundoApellido; ?></td>
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