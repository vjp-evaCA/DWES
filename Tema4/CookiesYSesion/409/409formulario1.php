<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario paso 1</title>
</head>
<body>
    <h1>Formulario (Paso 1 de 2)</h1>
    <form action="409formulario2.php" method="post">
        <label for='nombreCompleto'>Nombre completo:</label><br />
        <input type='text' name='nombreCompleto' id='nombreCompleto' maxlength="100" required /><br /><br />

        <label for='email'>Email:</label><br />
        <input type='email' name='email' id='email' maxlength="100" required /><br /><br />

        <label for='url'>URL página personal:</label><br />
        <input type='url' name='url' id='url' maxlength="1000" /><br /><br />

        <label>Sexo:</label><br />
        <input type='radio' name='sexo' id='hombre' value='Hombre' required />
        <label for='hombre'>Hombre</label>
        <input type='radio' name='sexo' id='mujer' value='Mujer' />
        <label for='mujer'>Mujer</label>
        <input type='radio' name='sexo' id='otro' value='Otro' />
        <label for='otro'>Otro</label>
        <input type='radio' name='sexo' id='prefieroNoDecirlo' value='Prefiero no decirlo' />
        <label for='prefieroNoDecirlo'>Prefiero no decirlo</label>
        <br><br>

        <input type='submit' value='Siguiente'>
    </form>
</body>
</html>