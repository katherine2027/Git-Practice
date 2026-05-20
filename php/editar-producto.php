<?php
session_start();

include("conexion.php");

// SOLO ADMIN
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

// Verificar método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];

    // Obtener imagen actual
    $sqlImagen = "SELECT imagen FROM productos WHERE id = ?";
    $stmtImagen = $conn->prepare($sqlImagen);

    if (!$stmtImagen) {
        die("Error en consulta imagen: " . $conn->error);
    }

    $stmtImagen->bind_param("i", $id);
    $stmtImagen->execute();

    $resultadoImagen = $stmtImagen->get_result();
    $producto = $resultadoImagen->fetch_assoc();

    $imagen = $producto['imagen'];

    // Nueva imagen (si existe)
    if (!empty($_FILES['imagen']['name'])) {

        // Ruta antigua
        $rutaVieja = "../img/productos/" . $imagen;

        if (file_exists($rutaVieja)) {
            unlink($rutaVieja);
        }

        // Subir nueva imagen
        $imagen = $_FILES['imagen']['name'];
        $rutaTemporal = $_FILES['imagen']['tmp_name'];

        move_uploaded_file(
            $rutaTemporal,
            "../img/productos/" . $imagen
        );
    }

    // UPDATE PRODUCTO
    $sql = "UPDATE productos 
            SET nombre = ?,
                descripcion = ?,
                precio = ?,
                categoria = ?,
                stock = ?,
                imagen = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error en UPDATE: " . $conn->error);
    }

    $stmt->bind_param(
        "ssdsisi",
        $nombre,
        $descripcion,
        $precio,
        $categoria,
        $stock,
        $imagen,
        $id
    );

    if ($stmt->execute()) {
        header("Location: ../admin/ver-productos.php");
        exit();
    } else {
        echo "Error al actualizar el producto";
    }
}
?>