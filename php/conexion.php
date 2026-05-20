<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "dontono_db";

$conexion = new mysqli($host, $user, $password, $dbname);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8mb4");

?>

<?php

$conn = new mysqli("localhost", "root", "", "dontono_db");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>