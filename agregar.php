<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Agregar</title>
</head>
<body>
   <?php
      // Cuando se pulsa el botón enviar, obtiene los registros, cedula , nombre, apellido y semestre.
      if(isset($_POST['enviar'])){
         $cedula = $_POST['cedula'];
         $nombre = $_POST['nombre'];
         $apellido = $_POST['apellido'];
         $semestre = $_POST['semestre'];

         // Incluir la conexión al servidor
         include("conexion.php");

         //Comando SQL para insertar los datos en sus respectivos campos
         $sql = "INSERT INTO estudiantes (Cédula, Nombre, Apellido, Semestre) VALUES ('".$cedula."', '".$nombre."', '".$apellido."', '".$semestre."')";

         // Variable que realiza el query al servidor
         $resultado = mysqli_query($conexion, $sql);

         // Si funciona el query, manda una alerta.
         if ($resultado) {
            echo "<script language='JavaScript'> alert('El estudiante fue añadido correctamente!'); location.assign('index.php'); </script>";
         }
      
      mysqli_close($conexion);
         
      }else{

      }
   ?>

   <h1>
      Agregar Nuevo Estudiante
   </h1>

   <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
      <label>Cédula: </label>
      <input type="text" name="cedula"> <br>
      <label>Nombre: </label>
      <input type="text" name="nombre"> <br>
      <label>Apellido: </label>
      <input type="text" name="apellido"> <br>
      <label>Semestre: </label>
      <input type="text" name="semestre"> <br>
      <input type="submit" name="enviar" value="AGREGAR">
      <a href="index.php">Regresar</a>
   </form>
</body>
</html>