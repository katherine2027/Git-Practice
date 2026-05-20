<?php
session_start();
include("../php/conexion.php");

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
// OBTENER ID DEL PRODUCTO
// =====================================
$id = $_GET['id'];

// =====================================
// CONSULTAR PRODUCTO
// =====================================
$sql = "SELECT * FROM productos WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$producto = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <!-- META -->
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <!-- TÍTULO -->
    <title>Editar Producto</title>

    <!-- BOOTSTRAP -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- FONT AWESOME -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    >

</head>

<body class="bg-light">

    <!-- =====================================
         NAVBAR
    ====================================== -->
    <nav class="navbar navbar-dark bg-dark shadow-sm">

        <div class="container-fluid">

            <!-- TÍTULO -->
            <span class="navbar-brand">

                <i class="fa-solid fa-pen-to-square"></i>
                Editar Producto

            </span>

            <!-- BOTÓN VOLVER -->
            <a
                href="ver-productos.php"
                class="btn btn-secondary"
            >

                <i class="fa-solid fa-arrow-left"></i>
                Volver

            </a>

        </div>

    </nav>

    <!-- =====================================
         CONTENIDO
    ====================================== -->
    <div class="container mt-5">

        <div
            class="card shadow border-0 rounded-4 p-4 mx-auto"
            style="max-width: 700px;"
        >

            <!-- TÍTULO -->
            <h2 class="mb-4 text-center">

                <i class="fa-solid fa-pen text-warning"></i>
                Editar Producto

            </h2>

            <!-- =====================================
                 FORMULARIO
            ====================================== -->
            <form
                method="POST"
                action="../php/editar-producto.php"
                enctype="multipart/form-data"
            >

                <!-- ID OCULTO -->
                <input
                    type="hidden"
                    name="id"
                    value="<?= $producto['id']; ?>"
                >

                <!-- NOMBRE -->
                <div class="mb-3">

                    <label
                        for="nombre"
                        class="form-label"
                    >

                        Nombre

                    </label>

                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        class="form-control"
                        value="<?= htmlspecialchars($producto['nombre']); ?>"
                        required
                    >

                </div>

                <!-- DESCRIPCIÓN -->
                <div class="mb-3">

                    <label
                        for="descripcion"
                        class="form-label"
                    >

                        Descripción

                    </label>

                    <textarea
                        id="descripcion"
                        name="descripcion"
                        class="form-control"
                        rows="3"
                        required
                    ><?= htmlspecialchars($producto['descripcion']); ?></textarea>

                </div>

                <!-- PRECIO -->
                <div class="mb-3">

                    <label
                        for="precio"
                        class="form-label"
                    >

                        Precio

                    </label>

                    <input
                        type="number"
                        id="precio"
                        name="precio"
                        class="form-control"
                        step="0.01"
                        value="<?= $producto['precio']; ?>"
                        required
                    >

                </div>

                <!-- CATEGORÍA -->
                <div class="mb-3">

                    <label
                        for="categoria"
                        class="form-label"
                    >

                        Categoría

                    </label>

                    <input
                        type="text"
                        id="categoria"
                        name="categoria"
                        class="form-control"
                        value="<?= htmlspecialchars($producto['categoria']); ?>"
                        required
                    >

                </div>

                <!-- STOCK -->
                <div class="mb-3">

                    <label
                        for="stock"
                        class="form-label"
                    >

                        Stock

                    </label>

                    <input
                        type="number"
                        id="stock"
                        name="stock"
                        class="form-control"
                        value="<?= $producto['stock']; ?>"
                        required
                    >

                </div>

                <!-- IMAGEN ACTUAL -->
                <div class="mb-3">

                    <label class="form-label">

                        Imagen Actual

                    </label>

                    <div>

                        <img
                            src="../img/productos/<?= htmlspecialchars($producto['imagen']); ?>"
                            alt="Imagen del producto"
                            width="120"
                            class="rounded shadow-sm"
                        >

                    </div>

                </div>

                <!-- NUEVA IMAGEN -->
                <div class="mb-4">

                    <label
                        for="imagen"
                        class="form-label"
                    >

                        Nueva Imagen (Opcional)

                    </label>

                    <input
                        type="file"
                        id="imagen"
                        name="imagen"
                        class="form-control"
                        accept="image/*"
                    >

                </div>

                <!-- BOTÓN -->
                <button
                    type="submit"
                    class="btn btn-warning w-100"
                >

                    <i class="fa-solid fa-floppy-disk"></i>
                    Actualizar Producto

                </button>

            </form>

        </div>

    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>