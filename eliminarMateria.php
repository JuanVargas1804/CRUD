<?php
    include("conexion.php");


    $id= $_GET['id'];


    $sqlDelete = "DELETE FROM materias WHERE ID = '".$id."'";

    $result = mysqli_query($conexion, $sqlDelete);

    if($result){
        echo "<script language='JavaScript'>
            alert('Los datos se elimitaron correctamente');
            location.assign('index.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
            alert('Los datos no se eliminaron. Error: " . mysqli_error($conexion) . "');
            location.assign('index.php');
        </script>";
    }
?>