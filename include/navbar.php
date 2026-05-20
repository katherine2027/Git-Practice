<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">

    <div class="container-fluid">

        <!-- =====================================
             LOGO / BRAND
        ====================================== -->
        <a
            href="index.php"
            class="navbar-brand fw-bold"
        >

            Don Toño

        </a>

        <!-- =====================================
             BOTÓN RESPONSIVE
        ====================================== -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- =====================================
             MENÚ
        ====================================== -->
        <div
            class="collapse navbar-collapse"
            id="navbarNav"
        >

            <!-- =====================================
                 LINKS IZQUIERDA
            ====================================== -->
            <ul class="navbar-nav">

                <!-- SUCURSALES -->
                <li class="nav-item">

                    <a
                        href="sucursales.php"
                        class="nav-link"
                    >

                        Sucursales

                    </a>

                </li>

                <!-- PRECIOS -->
                <li class="nav-item">

                    <a
                        href="#"
                        class="nav-link"
                    >

                        Precios

                    </a>

                </li>

                <!-- PRODUCTOS -->
                <li class="nav-item dropdown">

                    <a
                        href="#"
                        class="nav-link dropdown-toggle"
                        role="button"
                        data-bs-toggle="dropdown"
                    >

                        Productos

                    </a>

                    <ul class="dropdown-menu">

                        <li>

                            <a
                                href="#"
                                class="dropdown-item"
                            >

                                Herramientas

                            </a>

                        </li>

                        <li>

                            <a
                                href="#"
                                class="dropdown-item"
                            >

                                Construcción

                            </a>

                        </li>

                        <li>

                            <a
                                href="#"
                                class="dropdown-item"
                            >

                                Techo

                            </a>

                        </li>

                    </ul>

                </li>

            </ul>

            <!-- =====================================
                 USUARIO / LOGIN
            ====================================== -->
            <div class="ms-auto">

                <?php if (isset($_SESSION['usuario_id'])): ?>

                    <!-- USUARIO LOGUEADO -->
                    <div class="dropdown">

                        <a
                            href="#"
                            class="btn btn-outline-secondary dropdown-toggle d-flex align-items-center"
                            role="button"
                            data-bs-toggle="dropdown"
                        >

                            <i class="fa-solid fa-circle-user me-2"></i>

                            <?= htmlspecialchars($_SESSION['nombre']); ?>

                        </a>

                        <!-- MENÚ USUARIO -->
                        <ul class="dropdown-menu dropdown-menu-end">

                            <!-- PERFIL -->
                            <li>

                                <a
                                    href="profile.php"
                                    class="dropdown-item"
                                >

                                    <i class="fa-solid fa-id-card me-2"></i>
                                    Perfil

                                </a>

                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <!-- LOGOUT -->
                            <li>

                                <a
                                    href="php/logout.php"
                                    class="dropdown-item text-danger"
                                >

                                    <i class="fa-solid fa-right-from-bracket me-2"></i>
                                    Cerrar sesión

                                </a>

                            </li>

                        </ul>

                    </div>

                <?php else: ?>

                    <!-- LOGIN -->
                    <a
                        href="login.html"
                        class="btn btn-outline-primary me-2"
                    >

                        Login

                    </a>

                    <!-- REGISTRO -->
                    <a
                        href="registro.html"
                        class="btn btn-primary"
                    >

                        Registrarse

                    </a>

                <?php endif; ?>

            </div>

        </div>

    </div>

</nav>