<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Odontológica</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilo.css"> 
    <link rel="stylesheet" href="Vista/css/boton_logo.css"> 
    <link rel="stylesheet" href="Vista/css/usernom.css">
    <link href="Vista/jquery/jquery-ui-1.14.1.custom/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <script src="Vista/Jquery/jquery.js"></script>
    <script src="Vista/jquery/jquery-ui-1.14.1.custom/jquery-ui.js" type="text/javascript"></script>
    <script src="Vista/js/script.js"></script>


<body> 
    <div class="user-info">
        <img class="user_img" src="Vista/img/imguser.avif" alt="" width="50px" height="50px">
        <h5 class="user"><?php echo $_SESSION['CorreoDelUsuario'];?></h5>
    </div>
    <button class="rupert"><a class="rupert2" href="index.php?accion=logouterwild">Logout</a></button>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Sistema de Gestión Odontológica</h1>
        </div>
        <?php 
            if($_SESSION['RolDelUsuario']=="Admin"){?>
        <ul id="menu">
            <li><a href="index.php?accion=inicio">inicio</a> </li>
            <li><a href="index.php?accion=asignar">Asignar</a> </li>
            <li><a href="index.php?accion=consultar">Consultar Cita</a> </li>
            <li><a href="index.php?accion=cancelar">Cancelar Cita</a> </li> 
            <li><a href="index.php?accion=Medicos">Medicos</a> </li> 
            <li><a href="index.php?accion=Tratamientos">Tratamientos</a> </li> 
            <li><a href="index.php?accion=Pacientes">Pacientes</a> </li>  
        </ul> 
        <?php }?> 

        <?php 
            if($_SESSION['RolDelUsuario']=="Medico"){ 
        ?>  
        <ul id="menu">
            <li><a href="index.php?accion=inicio">inicio</a> </li>
            <li><a href="index.php?accion=Tratamientos">Tratamientos</a> </li> 
            <li><a href="index.php?accion=Pacientes">Pacientes</a> </li>   
            <li><a href="">Cronograma</a></li> 
        </ul> 
        <?php }?> 
        <?php 
         if($_SESSION['RolDelUsuario']=="Paciente"){ 
        ?> 
        <ul id="menu">
            <li><a href="index.php?accion=inicio">inicio</a> </li>
            <li><a href="index.php?accion=asignar">Asignar</a> </li>
            <li><a href="index.php?accion=cancelar">Cancelar Cita</a> </li> 
            <li><a href="index.php?accion=CitaPac2">Citas</a></li> 
            <li><a href="index.php?accion=Procedimiento">Procedimeintos</a></li>  
        </ul> 
        <?php }?> 
        <div id="contenido">
            <h2>Asignar cita</h2>
            <br>
            <form id="frmasignar" action="index.php?accion=guardarCita" method="post">
                <table>
                    <tr>
                        <td>Documento del paciente</td>
                        <td><input type="text" name="asignarDocumento" id="asignarDocumento"></
                                td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" value="Consultar"
                                name="asignarConsultar" id="asignarConsultar" onclick="consultarPaciente()"></td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="paciente"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Médico</td>
                        <td>
                            <select id="medico" name="medico" onchange="cargarAsignar()">
                                <option value="-1" selected="selected">---Selecione el
                                    Médico</option>
                                <?php

                                while ($fila = $result->fetch_object()) {
                                ?>

                                    <option value=<?php echo $fila->MedIdentificacion; ?>>
                                        <?php echo $fila->MedIdentificacion . " " . $fila->MedNombres . " " . $fila->MedApellidos; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td>
                            <input type="date" id="fecha" name="fecha" onchange="cargarHoras()">
                        </td>
                    </tr>
                    <tr>
                        <td>Hora</td>
                        <td>
                            <select id="hora" name="hora" onmousedown="seleccionarHora()">
                                <option value="-1" selected="selected">---Seleccione
                                    la hora ---</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Consultorio</td>
                        <td>
                            <select id="consultorio" name="consultorio"
                                onchange="cargarHoras()">
                                <option value="-1" selected="selected">---Selecione el
                                    Consultorio</option>
                                <?php

                                while ($fila = $result2->fetch_object()) {
                                ?>

                                    <option value=<?php echo $fila->ConNumero; ?>>
                                        <?php echo $fila->ConNumero . " - " . $fila->ConNombre;

                                        ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>observaciones</td>
                        <td>
                            <textarea name="Observaciones">

                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="asignarEnviar" value="Enviar" id="asignarEnviar"> 
                            <button><a href="index.php?accion=eselx">Descargar Citas</a></button>
                        </td> 
                    </tr>
                </table>
            </form>
            //
            <div id="frmPaciente" title="Agregar Nuevo Paciente">
                <form id="agregarPaciente" action="index.php?accion=ingresarPaciente" method="get">
                    <table>
                        <tr>
                            <td>Documento</td>

                            <td><input type="text" name="PacDocumento"

                                    id="PacDocumento"></td>
                        </tr>
                        <tr>

                            <td>Nombres</td>

                            <td><input type="text" name="PacNombres"

                                    id="PacNombres"></td>
                        </tr>
                        <tr>

                            <td>Apellidos</td>

                            <td><input type="text" name="PacApellidos"

                                    id="PacApellidos"></td>
                        </tr>
                        <tr>

                            <td>Fecha de Nacimiento</td>

                            <td><input type="text" name="PacNacimiento"

                                    id="PacNacimiento"></td>
                        </tr>
                        <tr>

                            <td>Sexo</td>

                            <td>

                                <select id="pacSexo" name="PacSexo">
                                    <option value="-1" selected="selected">--Selecione el sexo ---</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>

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