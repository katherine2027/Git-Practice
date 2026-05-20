<?php
session_start();

include "php/conexion.php";

// Obtener productos
$resultado = $conexion->query("SELECT * FROM productos");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!-- Estilos -->
    <link rel="stylesheet" href="styles/style.css">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <?php require_once("include/navbar.php"); ?>

    <!-- Contenido -->
    <div class="container mt-5">

        <h2 class="mb-4 text-center">

            <i class="fa-solid fa-box-open text-primary"></i>
            Nuestros Productos

        </h2>

        <div class="row">

            <?php while ($producto = $resultado->fetch_assoc()): ?>

                <div class="col-md-4 mb-4">

                    <div class="card h-100 shadow-sm border-0">

                        <!-- Imagen -->
                        <img
                            src="img/productos/<?php echo htmlspecialchars($producto['imagen']); ?>"
                            class="card-img-top"
                            alt="<?php echo htmlspecialchars($producto['nombre']); ?>"
                        >

                        <!-- Card Body -->
                        <div class="card-body d-flex flex-column">

                            <!-- Nombre -->
                            <h5 class="card-title">

                                <?php echo htmlspecialchars($producto['nombre']); ?>

                            </h5>

                            <!-- Descripción -->
                            <p class="card-text text-muted">

                                <?php echo htmlspecialchars($producto['descripcion']); ?>

                            </p>

                            <!-- Precio -->
                            <p class="fw-bold text-primary fs-5">

                                $<?php echo number_format($producto['precio'], 2); ?>

                            </p>

                            <!-- Botón -->
                            <a href="#" class="btn btn-primary mt-auto">

                                <i class="fa-solid fa-eye"></i>
                                Ver más

                            </a>

                        </div>

                    </div>

                </div>

            <?php endwhile; ?>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>