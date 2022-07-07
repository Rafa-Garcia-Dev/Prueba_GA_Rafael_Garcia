<?php
include("db.php");

if (isset($_POST['consultar'])) {

    $id_usuario_consulta = $_POST['id_usuario_consulta'];
}
?>

<?php

include("includes/header.php") ?>

<div class="col-md-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id Cliente</th>
                <th>Id pelicula</th>
                <th>Nombre pelicula</th>
                <th>Fecha Inicial</th>
                <th>Fecha de Entrega</th>
                <th>Director Pelicula</th>
                <th>Nacionalidad del Director</th>
                <th>Actores</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <TBody>
            <?php

            $query = "SELECT * FROM alquiler  WHERE Id_Cliente1 = $id_usuario_consulta ";


            $query1 = "SELECT  *
                    FROM pelicula as p
                    INNER JOIN ejemplar as e on p.Id_Pelicula = e.Id_Pelicula3
                    INNER JOIN alquiler as a on e.Id_Ejemplar = a.Id_Ejemplar1
                    INNER JOIN director as d on p.Id_Director1 = d.Id_Director
                    INNER JOIN nacionalidad as n on d.Id_Nacionalidad3 = n.Id_Nacionalidad
                    INNER JOIN pelicula_actor as pa on p.Id_Pelicula = pa.Id_Pelicula1
                    INNER JOIN actor as ac on pa.Id_Actor2 = ac.Id_Actor
                    WHERE a.Id_Cliente1 = $id_usuario_consulta";



            $resultado_peliculas = mysqli_query($conn, $query1);


            while ($fila = mysqli_fetch_array($resultado_peliculas)) {  ?>

                <tr>
                    <td><?php echo $fila['Id_Cliente1'] ?></td>
                    <td><?php echo $fila['Id_Ejemplar1'] ?></td>
                    <td><?php echo $fila['Titulo_Pelicula'] ?></td>
                    <td><?php echo $fila['Fecha_Inicio'] ?></td>
                    <td><?php echo $fila['Fecha_Fin'] ?></td>
                    <td><?php echo $fila['Nombre_Director'] ?></td>
                    <td><?php echo $fila['Nombre_Nacionalidad'] ?></td>
                    <td><?php echo $fila['Nombre_Actor'] ?></td>
                    <td>

                        <a href="editar_alquiler.php?id=<?php echo $fila['Id_Cliente1'] ?>" class="btn
                        btn-secondary">
                            <i class="fas fa-marker"></i>
                        </a>

                        <a href="eliminar_alquiler.php?id=<?php echo $fila['Id_Cliente1'] ?>" class="btn
                        btn-danger">
                            <i class="fas fa fa-trash"></i>

                        </a>

                    </td>
                </tr>

            <?php } ?>

        </TBody>

    </table>

</div>