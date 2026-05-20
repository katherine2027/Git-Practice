<?php
session_start();

include("conexion.php");

// =====================================
// VERIFICAR ACCESO ADMIN
// =====================================
if (
    !isset($_SESSION['usuario_id']) ||
    $_SESSION['rol'] !== 'admin'
) {
    header("Location: ../index.php");
    exit();
}

// =====================================
// VALIDAR MÉTODO POST
// =====================================
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // =====================================
    // OBTENER DATOS DEL FORMULARIO
    // =====================================
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $precio = $_POST['precio'];
    $categoria = trim($_POST['categoria']);
    $stock = $_POST['stock'];

    // =====================================
    // DATOS DE LA IMAGEN
    // =====================================
    $imagen = $_FILES['imagen']['name'];

    // Ruta temporal
    $ruta_temporal = $_FILES['imagen']['tmp_name'];

    // Carpeta destino
    $carpeta_destino = "../img/productos/";

    // Ruta final
    $ruta_final = $carpeta_destino . $imagen;

    // =====================================
    // SUBIR IMAGEN
    // =====================================
    move_uploaded_file($ruta_temporal, $ruta_final);

    // =====================================
    // INSERTAR PRODUCTO
    // =====================================
    $sql = "
        INSERT INTO productos (
            nombre,
            descripcion,
            precio,
            categoria,
            stock,
            imagen
        )
        VALUES (?, ?, ?, ?, ?, ?)
    ";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssdsis",
        $nombre,
        $descripcion,
        $precio,
        $categoria,
        $stock,
        $imagen
    );

    // =====================================
    // EJECUTAR CONSULTA
    // =====================================
    if ($stmt->execute()) {

        header("Location: ../admin/ver-productos.php");
        exit();

    } else {

        echo "Error al crear producto";

    }

}
?>