<?php
include("db.php");

if(isset($_POST['alquilar'])){

    $id_pelicula = $_POST['id_pelicula'];
    $id_usuario = $_POST['id_usuario'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
   
   $query = "INSERT INTO alquiler(Id_Ejemplar1,Id_Cliente1,Fecha_Inicio,Fecha_Fin) VALUES ('$id_pelicula','$id_usuario','$fecha_inicio','$fecha_fin')";
   $resultado = mysqli_query($conn,$query);

   if(!$resultado){
    $_SESSION ['message'] = 'Datos Ingresados de Manera Incorrecta';
    $_SESSION ['message_type'] = 'danger';
    header("location: index.php");
    die("Query failed");

}
    $_SESSION ['message'] = 'Alquiler Exitoso';
    $_SESSION ['message_type'] = 'success';
    header("location: index.php");
}
?>