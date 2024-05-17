<?php
    include("conexion.php");

    //select  
    $sql ="select * from estudiantes";
    $resultado =mysqli_query($conexion,$sql);

    $sqlmaterias ="select * from materias";
    $resultadomaterias =mysqli_query($conexion,$sqlmaterias);
?>

<html>

<head>
    <title>lista de usuarios</title>


    <script type="text/javascript">
        function confirmar() {
            return confirm ('Esta totalmente seguro de querer eliminar este estudiante?');
        }
    </script>
</head>

<body>
    <a href="agregar.php">Nuevo Estudiante</a><br><br>
    <table>
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Semestre</th>
            </tr>
        </thead>
         <tbody>
            <?php  
                while($filas=mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td> <?php echo $filas['Cédula']; ?> </td>
                <td> <?php echo $filas['Nombre']; ?> </td>
                <td> <?php echo $filas['Apellido']; ?> </td>
                <td> <?php echo $filas['Semestre']; ?> </td>
                <td>
                    <?php     
                        echo '<a href="EditarEstudiante.php?id='.$filas['Cédula'].'"> Editar </a>';
                        echo '<a href="eliminarEstudiante.php?id='.$filas['Cédula'].'" onclick="return confirmar()">Eliminar</a>';
                    ?>
                </td>
            </tr>
            <?php }?>
         </tbody>
    </table>

    <a href="agregarMateria.php">Nueva Asignatura</a><br><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>

            </tr>
        </thead>
         <tbody>
            <?php  
                while($filas=mysqli_fetch_assoc($resultadomaterias)){
            ?>
            <tr>
                <td> <?php echo $filas['ID']; ?> </td>
                <td> <?php echo $filas['Nombre']; ?> </td>

                <td>
                    <?php     
                        echo '<a href="editarMateria.php?id='.$filas['ID'].'"> Editar </a>';
                        echo '<a href="eliminarMateria.php?id='.$filas['ID'].'" onclick="return confirmar()">Eliminar</a>';
                    ?>
                </td>
            </tr>
            <?php }?>
         </tbody>
    </table>

    <?php   
    mysqli_close($conexion);
?>  
</head>
<body>
<?php
 include("conexion.php");
 //select  
 $sql="select * from estudiantes";
 $resultado=mysqli_query($conexion,$sql);
?>
</body>
</html>