<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio.php</title>
</head>

<body>
    <?php
    include __DIR__ . "/vendor/autoload.php";

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    $log = new Logger("MiLogger");
    $log->pushHandler(new StreamHandler("logs/milog.log", \Monolog\Level::Debug));

    $log->debug("Esto es un mensaje de DEBUG");
    $log->info("Esto es un mensaje de INFO");
    $log->warning("Esto es un mensaje de WARNING");
    $log->error("Esto es un mensaje de ERROR");
    $log->critical("Esto es un mensaje de CRITICAL");
    $log->alert("Esto es un mensaje de ALERT");
    ?>
</body>

</html>