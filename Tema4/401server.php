<?php
echo "<h2>Valores de \$_SERVER</h2>";

echo "<strong>PHP_SELF:</strong> " . $_SERVER["PHP_SELF"] . "<br>";
echo "<strong>SERVER_SOFTWARE:</strong> " . $_SERVER["SERVER_SOFTWARE"] . "<br>";
echo "<strong>SERVER_NAME:</strong> " . $_SERVER["SERVER_NAME"] . "<br>";
echo "<strong>REQUEST_METHOD:</strong> " . $_SERVER["REQUEST_METHOD"] . "<br>";
echo "<strong>REQUEST_URI:</strong> " . $_SERVER["REQUEST_URI"] . "<br>";
echo "<strong>QUERY_STRING:</strong> " . $_SERVER["QUERY_STRING"] . "<br>";
echo "<strong>HTTP_USER_AGENT:</strong> " . $_SERVER["HTTP_USER_AGENT"] . "<br>";

if (isset($_SERVER["HTTP_REFERER"])) {
    echo "<strong>HTTP_REFERER:</strong> " . $_SERVER["HTTP_REFERER"] . "<br>";
} else {
    echo "<strong>HTTP_REFERER:</strong> (No hay valor, se ha accedido directamente)<br>";
}

echo "<hr><h2>Valores recibidos por GET</h2>";
if (!empty($_GET)) {
    print_r($_GET);
} else {
    echo "No se han recibido parámetros por GET";
}

echo "<hr><h2>Valores recibidos por POST</h2>";
if (!empty($_POST)) {
    print_r($_POST);
} else {
    echo "No se han recibido parámetros por POST";
}
?>