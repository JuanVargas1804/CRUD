<?php
    include("conexion.php");

    if(isset($_POST['enviar'])){
        // Obtención de valores a modificar
        $id = $_POST['ID'];
        $nombre = $_POST["nombre"];


        // Construye la consulta SQL para actualizar un estudiante
        $sql = "UPDATE materias SET Nombre='$nombre' WHERE ID='$id'";
        $resultado = mysqli_query($conexion, $sql);

        // Verifica si la consulta se ejecutó correctamente
        if($resultado){
            echo "<script language='JavaScript'>
                alert('Los datos se actualizaron correctamente');
                location.assign('index.php');
            </script>";
        } else {
            echo "<script language='JavaScript'>
                alert('Los datos no se actualizaron. Error: " . mysqli_error($conexion) . "');
                location.assign('index.php');
            </script>";
        }
    } else {
        //Obtención del ID
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Query para obtener todos sus datos
            $SQLQuery = "SELECT * FROM materias WHERE ID = '$id'";
            $result = mysqli_query($conexion, $SQLQuery);


            // Rellena los campos con los valores obtenidos anteriormente
            if (mysqli_num_rows($result) > 0) {
                $fila = mysqli_fetch_assoc($result);
                $nombre = $fila["Nombre"];
            } else {
                echo "No se encontró ningún registro con el ID proporcionado.";
                exit;
            }
        } else {
            echo "No se proporcionó ningún ID en la URL.";
            exit;
        }
    }
    mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante</title>
</head>
<body>
    <h1>Editar Estudiante</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Nombre: </label>
        <input type="text" name="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>"> <br>

        <input type="hidden" name="ID" value="<?php echo isset($id) ? $id : ''; ?>">
        <input type="submit" name="enviar" value="Actualizar">
        <a href="index.php">Regresar</a>
    </form>
</body>
</html>
