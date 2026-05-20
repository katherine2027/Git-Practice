<?php
session_start();

include("php/conexion.php");

// Proteger página
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

// ID del usuario
$id = $_SESSION['usuario_id'];

// Consulta segura
$sql = "SELECT nombre, correo, rol FROM usuarios WHERE usuarioID = ?";

$stmt = $conn->prepare($sql);

// Verificar consulta
if (!$stmt) {
    die("Error en la consulta: " . $conn->error);
}

// Ejecutar consulta
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow border-0 rounded-4 p-4 mx-auto" style="max-width: 500px;">

            <!-- Título -->
            <div class="text-center mb-4">

                <i class="fa-solid fa-user-circle fa-4x text-primary mb-3"></i>

                <h2 class="fw-bold">
                    Perfil del Usuario
                </h2>

            </div>

            <!-- Información -->
            <div class="mb-3">

                <strong>
                    <i class="fa-solid fa-user"></i>
                    Nombre:
                </strong>

                <p class="text-muted">
                    <?php echo htmlspecialchars($usuario['nombre']); ?>
                </p>

            </div>

            <div class="mb-3">

                <strong>
                    <i class="fa-solid fa-envelope"></i>
                    Correo:
                </strong>

                <p class="text-muted">
                    <?php echo htmlspecialchars($usuario['correo']); ?>
                </p>

            </div>

            <div class="mb-4">

                <strong>
                    <i class="fa-solid fa-shield-halved"></i>
                    Rol:
                </strong>

                <p class="text-muted">
                    <?php echo htmlspecialchars($usuario['rol']); ?>
                </p>

            </div>

            <!-- Botón -->
            <a href="index.php" class="btn btn-secondary w-100">
                <i class="fa-solid fa-arrow-left"></i>
                Volver al Inicio
            </a>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>