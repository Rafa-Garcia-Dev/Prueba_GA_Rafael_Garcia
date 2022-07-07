<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">

    <div class="row">

        <div class="col-md-5">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>



            <?php session_unset();
            } ?>

            <form action="guardar_alquiler.php" method="POST">

                <div class="mb-4">
                    <label for="IdPelicula" class="form-label">Id Pelicula</label>
                    <input type="text" class="form-control" name="id_pelicula" placeholder="Ingrese el Id de la pelicula">

                </div>

                <div class="mb-4">
                    <label for="IdUsuario" class="form-label">Id Usuario</label>
                    <input type="text" class="form-control" name="id_usuario" placeholder="Ingrese el Id del usuario">
                </div>

                <div class="mb-4">
                    <label for="fechaInicio" class="form-label">Fecha Inicio</label>
                    <input type="text" class="form-control" name="fecha_inicio" placeholder="AAAA-MM-DD">
                </div>

                <div class="mb-4">
                    <label for="fechaFin" class="form-label">Fecha Fin</label>
                    <input type="text" class="form-control" name="fecha_fin" placeholder="AAAA-MM-DD">
                </div>

                <button type="submit" class="btn btn-success" name="alquilar">Alquilar</button>

            </form>
        </div>

        <div class="col-md-12">
            <div class="d-flex" style="height: 20px;">
                <div class="vr"></div>
            </div>

            <div class="badge bg-primary text-wrap" style="width: 68rem;">

                <p class="fs-3">TABLA PELICULAS</p>
            </div>
            <div class="d-flex" style="height: 20px;">
                <div class="vr"></div>
            </div>


            <div class="col-md-5">

                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>



                <?php session_unset();
                } ?>

                <form action="consultar_alquiler.php" method="POST">

                    <div class="mb-4">
                        <label for="IdUsuarioConsulta" class="form-label">Id Usuario</label>
                        <input type="text" class="form-control" name="id_usuario_consulta" placeholder="Ingrese el Id del usuario a consultar">

                    </div>

                    <button type="submit" class="btn btn-success" name="consultar">consultar</button>

                </form>
            </div>

        </div>

    </div>

</div>

<?php include("includes/footer.php") ?>