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
    <script src="Vista/js/script_tratamientos.js"></script> 
    <script src="Vista/js/script_tratamientos2.js"></script>
</head>

<body>
    <!-- Contenido visible -->
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
                <input type="button" class="boton-leer-mas boton-registrar" id="añadirMedico" onclick="mostrar_tratamientos()" value="Registrar Tratamiento">
            </form>
                <table> 
                    <tr>
                        <td>
                            <div id="Tratar1"></div> 
                            <div id="Tratar2"></div>
                        </td>
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
                                    <td><button class="boton-leer-mas" onclick="mostrarModalupdate(this)" 
                                        
                                        data-idtrat="<?php echo"$Malinoa->TraNumero"?>"
                                        data-creacion="<?php echo"$Malinoa->TraFechaAsignado"?>"  
                                        data-descripcion="<?php echo"$Malinoa->TraDescripcion"?>" 
                                        data-fechinicio="<?php echo"$Malinoa->TraFechaInicio"?>" 
                                        data-fechcierre="<?php echo"$Malinoa->TraFechaFin"?>" 
                                        data-observar="<?php echo"$Malinoa->TraObservaciones"?>"

                                    >UPDATE</button></td> 
                                    <td><button class="boton-leer-mas"><a id="isdex" href="index.php?accion=borrarTratamiento&datoDesactivacion=<?php echo"$Malinoa->TraNumero"?>">DELETE</a></button></td> 
                                </tr> 
                            <?php };?>
                        </table>
                    </tr>
                </table> 
                <!-- Contenido visible -->

                <!-- Contenido invisible --> 

                <!-- Ingreso -->
                <div id="fmrTratemaientos" title="ingreso de Tratamientos"> 
                    <form id="IngMedico" action="" method="get">
                        <table> 
                            <tr> 
                                <td> Fecha Creacion </td>
                                <td>
                                    <input type="date" name="TratAsignado" id="TratAsignado">
                                </td>
                            </tr> 
                            <tr> 
                                <td> Descripcion </td> 
                                <td>
                                    <textarea name="TrataDescripcion" id="TrataDescripcion"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td> Fecha Inicio </td> 
                                <td>
                                    <input type="date" name="TratInicio" id="TratInicio">
                                </td>
                            </tr>
                            <tr> 
                                <td> Fecha Final </td>
                                <td>
                                    <input type="date" name="TratFin" id="TratFin">
                                </td>
                            </tr>
                            <tr> 
                                <td> Observaciones </td> 
                                <td>
                                    <textarea name="TratObservacion" id=""></textarea>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>  
                <!-- Ingreso --> 

                <!-- Actualizar -->
                <div id="fmrTratamientos2" title="Actualizar Tratamiento"> 
                    <form action="index.php?accion=actualizetratamiento" method="get" id="cambioTratamiento"> 
                        <table>
                            <tr>
                                <td>Fecha Creacion</td>
                                <td>
                                    <input type="date" name="TratAsignado2" id="TratAsignado2"> 
                                    <input type="hidden" name="ClaveTratamiento" id="CLaveTratamiento">
                                </td>
                            </tr> 
                            <tr>
                                <td>Descripcion</td>
                                <td>
                                    <textarea name="TratDescripcion2" id="TratDescripcion2"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Fecha Inicio</td>
                                <td>
                                    <input type="date" name="TratInicio2" id="TratInicio2"> 
                                </td>
                            </tr>
                            <tr>
                                <td>Fecha Fin</td>
                                <td>
                                    <input type="date" name="TratFin2" id="TratFin2"> 
                                </td>
                            </tr>
                            <tr>
                                <td>Observaciones</td>
                                <td>
                                    <textarea name="TratObservacion2" id="TratObservacion2"></textarea> 
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <!-- Actualizar -->

                <!-- Contenido invisible -->
        </div>
    </div>
</body>

</html>