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
    <script src="Vista/js/script_pacientes.js"></script> 
    <script src="Vista/js/script_pacientes2.js"></script>
</head>

<body>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Sistema de Gestión Odontológica</h1>
        </div> 
        <div id="ingpacker"></div> 
        <div id="inguppacker"></div>
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
                <input type="button"  class="boton-leer-mas boton-registrar" id="añadirpacientes" onclick="mostrarPacdialog()" value="Ingreso Pacientes">
            </form>  
            <div id="#mensaje_error"></div>
            <table id="Tablapacientes">
                <tr>
                    <th>CC</th>
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
                    <td><button 
                        class="boton-leer-mas" 
                        onclick="mostraractualizacionpac(this)" 
                        data-cedulapaciente="<?php echo $Startlock->PacIdentificacion;?>" 
                        data-clavepaciente="<?php echo $Startlock->PacIdentificacion;?>"
                        data-nombrepaciente="<?php echo $Startlock->PacNombres;?>" 
                        data-apellidopaciente="<?php echo $Startlock->PacApellidos;?>" 
                        data-fechabornpaciente="<?php echo $Startlock->PacFechaNacimiento;?>" 
                        data-sexopaceinte="<?php echo $Startlock->PacSexo;?>" 
                        data-tratamientopaciente="<?php echo $Startlock->Pactratamiento;?>"
                    >UPDATE</button></td>
                    <td><button class="boton-leer-mas"><a id="isdex" href="index.php?accion=Delpacstar&Delpacclave=<?php echo $Startlock->PacIdentificacion;?>">DELETE</a></button></td>
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
                                    <option value="">---seleccione---</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </td>
                        </tr> 
                        <tr>
                            <td>Tratamientos</td> 
                            <td>
                                <select name="tratamientoPac" id="tratamientoPac">  
                                    <option value="">---seleccione---</option>
                                    <?php while($Elector= $selector->fetch_object()){?>
                                    <option value="<?php echo $Elector->TraNumero;?>"><?php echo $Elector->TraDescripcion;?></option> 
                                    <?php }?>
                                </select>
                            </td>
                        </tr> 
                    </table>
                </form>
            </div> 
            <div id="fmrpacientes3" title="Actualizar paciente"> 
                <form action="" id="actuPac" method="get"> 
                    <table> 
                        <tr> 
                            <td>Cedula</td> 
                            <td>
                                <input type="text" name="idPac2" id="idPac2"> 
                                <input type="hidden" name="clavePac" id="clavePac">
                            </td>
                        </tr> 
                        <tr> 
                            <td>Nombre</td> 
                            <td>
                                <input type="text" name="nomPac2" id="nomPac2">
                            </td>
                        </tr>
                        <tr> 
                            <td>Apellido</td> 
                            <td>
                                <input type="text" name="apePac2" id="apePac2">
                            </td>
                        </tr>
                        <tr> 
                            <td>Fecha de nacimiento</td> 
                            <td>
                                <input type="date" name="bornPac2" id="bornPac2">
                            </td>
                        </tr> 
                        <tr> 
                            <td>Sexo</td>  
                            <td>
                                <select name="sexPac2" id="sexPac2"> 
                                    <option value="">---seleccione---</option> 
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </td>
                        </tr> 
                        <tr> 
                            <td>Tratamientos</td>  
                            <td>
                                <select name="tratPac2" id="tratPac2"> 
                                    <option value="">---seleccione---</option> 
                                    <?php while($Pekaboo=$selector2->fetch_object()){?> 
                                        <option value="<?php echo $Pekaboo->TraNumero;?>"><?php echo $Pekaboo->TraDescripcion;?></option> 
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