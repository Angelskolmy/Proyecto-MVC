<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Odontológica</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilo.css">  
    <link rel="stylesheet" href="Vista/css/tabla_crud_Tratamientos.css">
    <link href="Vista/jquery/jquery-ui-1.14.1.custom/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <script src="Vista/Jquery/jquery.js"></script>
    <script src="Vista/jquery/jquery-ui-1.14.1.custom/jquery-ui.js" type="text/javascript"></script>
</head>

<body>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Sistema de Gestión Odontológica</h1>
        </div>
        <ul id="menu">
            <li><a href="index.php">inicio</a> </li>
            <li><a href="index.php?accion=asignar">Asignar</a> </li>
            <li><a href="index.php?accion=consultar">Consultar Cita</a> </li>
            <li><a href="index.php?accion=cancelar">Cancelar Cita</a> </li>  
            <li><a href="index.php?accion=Medicos">Medicos</a> </li>  
            <li><a href="index.php?accion=Tratamientos">Tratamientos</a> </li> 

        </ul>
        <div id="contenido">
            <h2>Tratamientos</h2> 
            <form action="" method=""> 
                <input type="button" class="boton-leer-mas boton-registrar" id="añadirMedico" onclick="ppp" value="Registrar Tratamiento">
            </form>
                <table> 
                    <tr>
                        
                    </tr> 
                    <tr>
                        <table id="TablaTratamientos"> 
                            <tr>
                                <th>ID</th> 
                                <th>Creacion</th>
                                <th>Descripcion</th>
                                <th>Inicio</th>
                                <th>Cierre</th>
                                <th>Observaciones</th> 
                                <th>Actualizar</th> 
                                <th>Borrar</th>
                            </tr> 
                            <?php while($Malinoa= $Contend2->fetch_object()){?> 
                                <tr> 
                                    <td><?php echo"$Malinoa->TraNumero"?></td> 
                                    <td><?php echo"$Malinoa->TraFechaAsignado"?></td> 
                                    <td><?php echo"$Malinoa->TraDescripcion"?></td> 
                                    <td><?php echo"$Malinoa->TraFechaInicio"?></td> 
                                    <td><?php echo"$Malinoa->TraFechaFin"?></td> 
                                    <td><?php echo"$Malinoa->TraObservaciones"?></td> 
                                    <td><button class="boton-leer-mas">UPDATE</button></td> 
                                    <td><button class="boton-leer-mas"><a id="isdex" href="">DELETE</a></button></td> 
                                </tr> 
                            <?php };?>
                        </table>
                    </tr>
                </table>
        </div>
    </div>
</body>

</html>