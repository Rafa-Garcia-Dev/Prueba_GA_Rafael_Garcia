<?php

include("db.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "SELECT * FROM alquiler WHERE Id_Cliente1 = $id";
    $resultado = mysqli_query($conn, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $fila =  mysqli_fetch_array($resultado);
        $id_cliente = $fila['Id_Cliente1'];
        $id_pelicula = $fila['Id_Ejemplar1'];
        $fecha_inio = $fila['Fecha_Inicio'];
        $fecha_fin = $fila['Fecha_Fin'];

        
    }
}

if(isset($_POST['editar'])){
    
    $id = $_GET['id'];
    $id_pelicula = $_POST['id_pelicula_edi'];
    $fecha_inicio = $_POST['fecha_inicio_edi'];
    $fecha_fin = $_POST['fecha_fin_edi'];

    $query = "UPDATE alquiler set Id_Ejemplar1 = '$id_pelicula',
    Fecha_Inicio = '$fecha_inicio', Fecha_Fin = '$fecha_fin' 
    WHERE Id_Cliente1 = $id";
    $resultado = mysqli_query($conn, $query);

    if(!$resultado){
        die("query Failed");
    }

    $_SESSION['message'] = 'Alquiler Actualizado';
    $_SESSION['message_type'] = 'success';
    header("location: index.php");

}


?>

<?php include("includes/header.php") ?>


<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">

            <form action="editar_alquiler.php?id=<?php echo $_GET['id']; ?>" method="POST">

                <div class="mb-4">
                    <label for="IdPelicula" class="form-label">Id Pelicula</label>
                    <input type="text" class="form-control" name="id_pelicula_edi"
                     placeholder="Actualiza el Id de la pelicula" value="<?php echo $id_pelicula?>">

                </div>

                <div class="mb-4">
                    <label for="IdUsuario" class="form-label">Id Usuario</label>
                    <input type="text" class="form-control" name="id_usuario_edi"
                     placeholder="Actualiza el Id del usuario" value="<?php echo $id_cliente?>">
                </div>

                <div class="mb-4">
                    <label for="fechaInicio" class="form-label">Fecha Inicio</label>
                    <input type="text" class="form-control" name="fecha_inicio_edi" 
                    placeholder="Actualiza la fecha AAAA-MM-DD" value="<?php echo $fecha_inio?>">
                </div>

                <div class="mb-4">
                    <label for="fechaFin" class="form-label">Fecha Fin</label>
                    <input type="text" class="form-control" name="fecha_fin_edi"
                     placeholder="Actualiza la fecha AAAA-MM-DD" value="<?php echo $fecha_fin?>">
                </div>

                <button type="submit" class="btn btn-success" name="editar">Editar</button>

            </form>

        </div>

    </div>
</div>







<?php include("includes/footer.php") ?>