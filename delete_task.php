<?php
    include("db.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM task WHERE id = $id";
        $result = $conexion->query($sql);
        if(!$result){
            die("Query Failed");
        } 
        $_SESSION['message'] = 'Tarea removida correctamente!';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }
?>