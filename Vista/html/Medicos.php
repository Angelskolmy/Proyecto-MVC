<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Odontológica</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilo.css">  
    <link rel="stylesheet" href="Vista/css/tabla_crud_Medicos.css">
    <link href="Vista/jquery/jquery-ui-1.14.1.custom/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <script src="Vista/Jquery/jquery.js"></script>
    <script src="Vista/jquery/jquery-ui-1.14.1.custom/jquery-ui.js" type="text/javascript"></script>
    <script src="Vista/js/script_medico.js"></script> 
    <script src="Vista/js/script_medico2.js"></script>
</head>
<!--contenido visble--> 
<body>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Sistema de Gestión Odontológica</h1>
        </div>
        <ul id="menu">
            <li><a href="index.php?accion=inicio">inicio</a> </li>
            <li><a href="index.php?accion=asignar">Asignar</a> </li>
            <li><a href="index.php?accion=consultar">Consultar Cita</a> </li>
            <li><a href="index.php?accion=cancelar">Cancelar Cita</a> </li>  
            <li><a href="index.php?accion=Medicos">Medicos</a> </li>  
            <li><a href="index.php?accion=Tratamientos">Tratamientos</a> </li> 
            <li><a href="index.php?accion=Pacientes">Pacientes</a> </li> 

        </ul>
        <div id="contenido">
            <h2>Medicos</h2> 
                <table> 
                    <tr> 
                        <td>  
                            <form action="" method="">
                                <input class="boton-leer-mas" type="button" value="Registrar Medico" id="ingresoDeMedico" name="ingresoDeMedico" onclick="mostrarFormulario()" > 
                            </form>
                        </td>  
                    </tr> 
                    <tr>
                        <td>
                            <div id="Medicina"></div>
                        </td> 
                        <td>
                            <div id="Medicina2"></div>
                        </td>
                    </tr>
                    <tr>
                        <table id="tablaMedicos"> 
                            <tr> 
                                <th>CC</th> 
                                <th>Nombre</th>
                                <th>Apellido</th> 
                                <th>Licencia</th> 
                                <th>Tipo</th>
                                <th>Actualizar</th> 
                                <th>Eliminar</th>
                            </tr> 
                            <?php  
                                while($operator= $Contend->fetch_object()){   
                                ?>
                            <tr>
                                <td><?php echo $operator-> MedIdentificacion; ?></td> 
                                <td><?php echo $operator-> MedNombres; ?></td>
                                <td><?php echo $operator-> MedApellidos; ?></td>
                                <td><?php echo $operator-> MedLicencia; ?></td> 
                                <td><?php echo $operator-> MedTipo; ?></td> 
                                <td>
                                    <button onclick="mostrarFormulario2(this)" 
                                        id="actualizarMedicina" 
                                        class="boton-leer-mas"
                                        data-id_2="<?php echo $operator-> MedIdentificacion;?>"
                                        data-clave_2="<?php echo $operator-> MedIdentificacion;?>" 
                                        data-nombre_2="<?php echo $operator-> MedNombres;?>" 
                                        data-apellido_2="<?php echo $operator-> MedApellidos;?>" 
                                        data-lic_2="<?php echo $operator-> MedLicencia; ?>">
                                        UPDATE
                                    </button>
                                </td>
                                <td><button class="boton-leer-mas"><a  id="isde" href="index.php?accion=borrarMedico&Claveborrado=<?php echo $operator-> MedIdentificacion;?>">DELETE</a></button></td>
                               
                            </tr> 
                            <?php } ?>
                        </table>
                    </tr>
                </table> 
<!--contenido visble-->    
<!--contenido invisble-->
            <div id="fmrMedicos" title="ingreso de nuevos medico">
                <form action="index.php?accion=ingresarMedicos" id="agregarMedico" method="get"> 
                    <table> 
                        <tr>
                            <td>Cedula</td> 
                            <td> 
                                <input type="text" name="MedCedula" id="MedCedula">
                            </td>
                        </tr> 
                        <tr>
                            <td>Nombre</td> 
                            <td>
                                <input type="text" name="MedNombre" id="MedNombre">
                            </td>
                        </tr>
                        <tr>
                            <td>Apellido</td> 
                            <td>
                                <input type="text" name="MedApellido" id="MedApellido">
                            </td>
                        </tr>
                        <tr> 
                            <td>Licencia</td> 
                            <td> 
                                <input type="text" name="MedLicencia" id="MedLicencia">
                            </td>
                        </tr>
                        <br>
                        <tr>
                            <td>Tipo</td> 
                            <td>
                                <select name="MedTipo" id="MedTipo"> 
                                    <option value="Planta">Planta</option> 
                                    <option value="Practicante">Practicante</option>
                                </select>
                            </td>
                        </tr>
                    </table>

                </form>
            </div>    
            <div id="fmrMedicos2" title="Actualizar un medico"> 
                <form action="index.php?accion=actualizarMedico" id="cambiarMedico" method="get" > 
                    <table> 
                        <tr>
                            <td>Cedula</td> 
                            <td>
                                <input type="text" name="actMedCed" value=""> 
                                <input type="hidden" name="MedCedclave" value="">
                            </td>
                        </tr> 
                        <tr>
                            <td>Nombre</td> 
                            <td>
                                <input type="text" name="actMedNom" value="">
                            </td>
                        </tr> 
                        <tr>
                            <td>Apellido</td> 
                            <td>
                                <input type="text" name="actMedApe" value="">
                            </td>
                        </tr> 
                        <tr>
                            <td>Licencia</td> 
                            <td>
                                <input type="text" name="actMedLic" value="">
                            </td>
                        </tr> 
                        <tr>
                            <td>Rol</td> 
                            <td>
                                <select name="actMedTipo"> 
                                    <option value="Planta">Planta</option> 
                                    <option value="Practicante">Practicante</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
<!--contenido invisble-->
        </div>
    </div>
</body>

</html>