<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Odontológica</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilo.css"> 
    <link rel="stylesheet" href="Vista/css/tabla_crud_Pacientes.css"> 
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
            <li><a href="index.php?accion=Pacientes">Pacientes</a> </li> 
        </ul>
        <div id="contenido">
            <h2>Pacientes</h2>
            <form action=""> 
                <input type="button"  class="boton-leer-mas boton-registrar" id="añadirpacientes" onclick="eeeeee" value="Ingreso Pacientes">
            </form> 
            <table id="Tablapacientes">
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nacimeinto</th>
                    <th>Sexo</th>
                    <th>Tratamiento</th> 
                    <th>UPDATE</th>
                    <th>DELETE</th>
                </tr>  
                <?php while($Startlock= $Backlog->fetch_object()){?>
                <tr>
                    <td><?php echo $Startlock->PacIdentificacion;?></td>
                    <td><?php echo $Startlock->PacNombres;?></td>
                    <td><?php echo $Startlock->PacApellidos;?></td>
                    <td><?php echo $Startlock->PacFechaNacimiento;?></td>
                    <td><?php echo $Startlock->PacSexo;?></td>
                    <td><?php echo $Startlock->Pactratamiento;?></td>
                    <td><button class="boton-leer-mas" onclick="pñpp">UPDATE</button></td>
                    <td><button class="boton-leer-mas"><a id="isdex" href="">DELETE</a></button></td>
                </tr>  
                <?php }?>
            </table> 
            <div id="fmrpacientes2" title="Ingreso de Pacientes">
                <form id="datospac2" action="" method="get">
                    <table>
                        <tr>
                            <td>Cedula</td> 
                            <td>
                                <input type="text" name="idPac" id="idPac">
                            </td>
                        </tr> 
                        <tr>
                            <td>Nombres</td> 
                            <td>
                                <input type="text" name="nombrePac" id="nombrePac">
                            </td>
                        </tr>
                        <tr>
                            <td>Apellidos</td> 
                            <td>
                                <input type="text" name="apellidoPac" id="apellidoPac">
                            </td>
                        </tr> 
                        <tr>
                            <td>Fecha de nacimiento</td> 
                            <td>
                                <input type="date" name="bornPac" id="bornPac">
                            </td>
                        </tr> 
                        <tr>
                            <td>Sexo</td> 
                            <td>
                                <select name="sexPac" id="sexPac"> 
                                    <option value=""></option>
                                </select>
                            </td>
                        </tr> 
                        <tr>
                            <td>Tratamientos</td> 
                            <td>
                                <select name="trataamientoPac" id="trataamientoPac"> 
                                    <?php while($Elector= $selector->fetch_object()){?>
                                    <option value="<?php $Elector->TraNumero?>"><?php echo $Elector->TraDescripcion;?></option> 
                                    <?php }?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>