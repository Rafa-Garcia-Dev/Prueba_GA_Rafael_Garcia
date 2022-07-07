<?php
    include("db.php");

    if(isset($_GET['id'])){
    
        $id = $_GET['id'];
        $query = "DELETE  FROM alquiler WHERE Id_Cliente1 = $id";
        $resultado = mysqli_query($conn, $query);
        
        if(!$resultado){
            die("query Failed");
        }

        $_SESSION['message'] = 'Alquiler eliminado';
        $_SESSION['message_type'] = 'danger';
        header("location: index.php");

    }

?>