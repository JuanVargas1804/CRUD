<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>AGREGAR</title>
</head>
<body>
   <?php
      // Cuando se pulsa el botón enviar, obtiene los registros, ID y POST.
      if(isset($_POST['enviar'])){
         $id = $_POST['ID'];
         $nombre = $_POST['nombre'];

         // Incluir la conexión al servidor
         include("conexion.php");

         //Comando SQL para insertar los datos en sus respectivos campos
         $sql = "INSERT INTO materias (ID, Nombre) VALUES ('$id', '$nombre')";

         // Variable que realiza el query al servidor
         $resultado = mysqli_query($conexion, $sql);


         // Si funciona el query, manda una alerta.
         if ($resultado) {
            echo "<script language='JavaScript'> alert('Los datos fueron ingresados correctamente'); location.assign('index.php'); </script>";
         } else {
            echo "<script language='JavaScript'> alert('Error al insertar los datos. Error: " . mysqli_error($conexion) . "'); </script>";
         }

         mysqli_close($conexion);
      }
   ?>

   <h1>Agregar Nueva Materia</h1>
   <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
      <label>ID: </label>
      <input type="text" name="ID" required> <br>
      <label>Nombre: </label>
      <input type="text" name="nombre" required> <br>

      <input type="submit" name="enviar" value="AGREGAR">
      <a href="index.php">Regresar</a>
   </form>
</body>
</html>
