<?php
session_start();

// Verificar acceso admin
if (
    !isset($_SESSION['usuario_id']) ||
    $_SESSION['rol'] !== 'admin'
) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título -->
    <title>Crear Producto</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    >

</head>

<body class="bg-light">

    <!-- =========================
         NAVBAR
    ========================== -->
    <nav class="navbar navbar-dark bg-dark shadow-sm">

        <div class="container-fluid">

            <span class="navbar-brand mb-0 h1">

                <i class="fa-solid fa-plus"></i>
                Crear Producto

            </span>

            <a href="dashboard.php" class="btn btn-secondary">

                <i class="fa-solid fa-arrow-left"></i>
                Volver

            </a>

        </div>

    </nav>

    <!-- =========================
         CONTENIDO
    ========================== -->
    <div class="container mt-5">

        <div
            class="card shadow border-0 rounded-4 p-4 mx-auto"
            style="max-width: 700px;"
        >

            <!-- Título -->
            <h2 class="mb-4 text-center">

                <i class="fa-solid fa-box-open text-success"></i>
                Nuevo Producto

            </h2>

            <!-- =========================
                 FORMULARIO
            ========================== -->
            <form
                method="POST"
                action="../php/crear-producto.php"
                enctype="multipart/form-data"
            >

                <!-- Nombre -->
                <div class="mb-3">

                    <label for="nombre" class="form-label">
                        Nombre
                    </label>

                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        class="form-control"
                        placeholder="Ingrese el nombre del producto"
                        required
                    >

                </div>

                <!-- Descripción -->
                <div class="mb-3">

                    <label for="descripcion" class="form-label">
                        Descripción
                    </label>

                    <textarea
                        id="descripcion"
                        name="descripcion"
                        class="form-control"
                        rows="4"
                        placeholder="Ingrese una descripción"
                        required
                    ></textarea>

                </div>

                <!-- Precio -->
                <div class="mb-3">

                    <label for="precio" class="form-label">
                        Precio
                    </label>

                    <input
                        type="number"
                        id="precio"
                        name="precio"
                        class="form-control"
                        step="0.01"
                        placeholder="0.00"
                        required
                    >

                </div>

                <!-- Categoría -->
                <div class="mb-3">

                    <label for="categoria" class="form-label">
                        Categoría
                    </label>

                    <input
                        type="text"
                        id="categoria"
                        name="categoria"
                        class="form-control"
                        placeholder="Ejemplo: Electrónica"
                        required
                    >

                </div>

                <!-- Stock -->
                <div class="mb-3">

                    <label for="stock" class="form-label">
                        Stock
                    </label>

                    <input
                        type="number"
                        id="stock"
                        name="stock"
                        class="form-control"
                        placeholder="Cantidad disponible"
                        required
                    >

                </div>

                <!-- Imagen -->
                <div class="mb-4">

                    <label for="imagen" class="form-label">
                        Imagen del Producto
                    </label>

                    <input
                        type="file"
                        id="imagen"
                        name="imagen"
                        class="form-control"
                        accept="image/*"
                        required
                    >

                </div>

                <!-- Botón -->
                <button type="submit" class="btn btn-success w-100">

                    <i class="fa-solid fa-floppy-disk"></i>
                    Crear Producto

                </button>

            </form>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>