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
// OBTENER PRODUCTOS
// =====================================
$sql = "SELECT * FROM productos";
$resultado = $conn->query($sql);
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
    <title>Ver Productos</title>

    <!-- BOOTSTRAP -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- FONT AWESOME -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
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

                <i class="fa-solid fa-box"></i>
                Admin - Productos

            </span>

            <!-- BOTÓN VOLVER -->
            <a
                href="dashboard.php"
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

        <!-- TÍTULO -->
        <h2 class="mb-4">

            <i class="fa-solid fa-list"></i>
            Lista de Productos

        </h2>

        <!-- TABLA -->
        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle shadow-sm">

                <!-- ENCABEZADO -->
                <thead class="table-dark">

                    <tr>

                        <th>#</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th class="text-center">Acciones</th>

                    </tr>

                </thead>

                <!-- CUERPO -->
                <tbody>

                    <?php while ($producto = $resultado->fetch_assoc()): ?>

                        <tr>

                            <!-- ID -->
                            <th scope="row">

                                <?= htmlspecialchars($producto['id']); ?>

                            </th>

                            <!-- IMAGEN -->
                            <td>

                                <img
                                    src="../img/productos/<?= htmlspecialchars($producto['imagen']); ?>"
                                    alt="<?= htmlspecialchars($producto['nombre']); ?>"
                                    width="70"
                                    class="rounded"
                                >

                            </td>

                            <!-- NOMBRE -->
                            <td>

                                <?= htmlspecialchars($producto['nombre']); ?>

                            </td>

                            <!-- PRECIO -->
                            <td class="text-primary fw-bold">

                                $<?= number_format($producto['precio'], 2); ?>

                            </td>

                            <!-- STOCK -->
                            <td>

                                <?= htmlspecialchars($producto['stock']); ?>

                            </td>

                            <!-- ACCIONES -->
                            <td class="text-center">

                                <!-- EDITAR -->
                                <a
                                    href="editar-producto.php?id=<?= $producto['id']; ?>"
                                    class="btn btn-warning btn-sm"
                                >

                                    <i class="fa-solid fa-pen"></i>

                                </a>

                                <!-- ELIMINAR -->
                                <button
                                    type="button"
                                    class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#eliminarModal"
                                    data-id="<?= $producto['id']; ?>"
                                >

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </td>

                        </tr>

                    <?php endwhile; ?>

                </tbody>

            </table>

        </div>

    </div>

    <!-- =====================================
         MODAL ELIMINAR
    ====================================== -->
    <div
        class="modal fade"
        id="eliminarModal"
        tabindex="-1"
    >

        <div class="modal-dialog">

            <div class="modal-content">

                <!-- HEADER -->
                <div class="modal-header">

                    <h5 class="modal-title">

                        <i class="fa-solid fa-triangle-exclamation text-danger"></i>
                        Confirmar eliminación

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                    ></button>

                </div>

                <!-- BODY -->
                <div class="modal-body">

                    ¿Seguro que deseas eliminar este producto?

                </div>

                <!-- FOOTER -->
                <div class="modal-footer">

                    <!-- CANCELAR -->
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >

                        Cancelar

                    </button>

                    <!-- ELIMINAR -->
                    <a
                        href="#"
                        id="btnEliminar"
                        class="btn btn-danger"
                    >

                        <i class="fa-solid fa-trash"></i>
                        Eliminar

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- =====================================
         BOOTSTRAP JS
    ====================================== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- =====================================
         SCRIPT MODAL
    ====================================== -->
    <script>

        const eliminarModal = document.getElementById('eliminarModal');

        eliminarModal.addEventListener('show.bs.modal', function (event) {

            const button = event.relatedTarget;

            const id = button.getAttribute('data-id');

            const btnEliminar = document.getElementById('btnEliminar');

            btnEliminar.href =
                "../php/eliminar-producto.php?id=" + id;

        });

    </script>

</body>

</html>