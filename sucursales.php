<?php
session_start();

include "php/conexion.php";

// Obtener sucursales
$resultado = $conexion->query("SELECT * FROM Sucursales");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucursales</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!-- Estilos -->
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <!-- Navbar -->
    <?php require_once("include/navbar.php"); ?>

    <!-- Contenido -->
    <div class="container mt-5">

        <h2 class="mb-4 text-center">
            <i class="fa-solid fa-store"></i>
            Nuestras Sucursales
        </h2>

        <div class="row">

            <?php while ($sucursal = $resultado->fetch_assoc()): ?>

                <div class="col-md-4 mb-4">

                    <div class="card h-100 shadow-sm">

                        <!-- Imagen -->
                        <img 
                            src="img/sucursales/<?php echo htmlspecialchars($sucursal['imagen']); ?>"
                            class="card-img-top"
                            alt="<?php echo htmlspecialchars($sucursal['nombre']); ?>"
                        >

                        <!-- Contenido -->
                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title">
                                <?php echo htmlspecialchars($sucursal['nombre']); ?>
                            </h5>

                            <p class="card-text">
                                <?php echo htmlspecialchars($sucursal['descripcion']); ?>
                            </p>

                            <p class="card-text text-muted">
                                <i class="fa-solid fa-location-dot"></i>
                                <?php echo htmlspecialchars($sucursal['ubicacion']); ?>
                            </p>

                            <a href="#" class="btn btn-primary mt-auto">
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