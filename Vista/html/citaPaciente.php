<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Odontológica</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilo.css"> 
    <link rel="stylesheet" href="Vista/css/tabla_citasPorpaciente.css"> 
    <link rel="stylesheet" href="Vista/css/boton_logo.css"> 
    <link rel="stylesheet" href="Vista/css/usernom.css">
</head>

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
            <li><a href="index.php?accion=CronoMed">Cronograma</a></li> 
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
            <h2>Citas del paciente</h2>
            <table id="ultimacitas"> 
                <tr>
                    <th>Id</th> 
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Paciente</th>
                    <th>Cc Med</th>
                    <th>Consultorio</th>
                    <th>Estado</th>
                    <th>Observaciones</th>
                </tr>  
                <?php while($Astel= $RecapPac->fetch_object()){?>
                <tr>
                    <td><?php echo $Astel->CitNumero;?></td>
                    <td><?php echo $Astel->CitFecha;?></td>
                    <td><?php echo $Astel->CitHora;?></td>
                    <td><?php echo $Astel->CitPaciente;?></td>
                    <td><?php echo $Astel->CitMedico;?></td>
                    <td><?php echo $Astel->CitConsultorio;?></td>
                    <td><?php echo $Astel->CitEstado;?></td>
                    <td><?php echo $Astel->CitObservaciones;?></td>
                </tr> 
                <?php }?>
            </table>
        </div>
    </div>
</body>

</html>