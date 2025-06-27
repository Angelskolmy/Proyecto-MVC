<?php
class GestorCita
{ 
    public function loger(Users $Users){ 
        $Conexion19= new Conexion; 
        $Conexion19->abrir();  

        $Correo= $Users->obtenerCorreoUsuario(); 
        $Contraseña= $Users->obtenerContraseñaUsuario();

        $sql=("SELECT * FROM users WHERE email='$Correo' AND UserPasword='$Contraseña'");  
        $Conexion19->consulta($sql);
        $ComparadorLoger=$Conexion19->obtenerResult(); 
        $Conexion19->cerrar(); 
        return $ComparadorLoger;
    } 

    public function agregarCita(Cita $cita)
    {
        $conexion = new Conexion();

        $conexion->abrir();

        $fecha = $cita->obtenerFecha();

        $hora = $cita->obtenerHora();

        $paciente = $cita->obtenerPaciente();

        $medico = $cita->obtenerMedico();

        $consultorio = $cita->obtenerConsultorio();

        $estado = $cita->obtenerEstado();

        $observaciones = $cita->obtenerObservaciones();

        $sql = "INSERT INTO citas(CitFecha, CitHora, CitPaciente, CitMedico, CitConsultorio, CitEstado, CitObservaciones) VALUES('$fecha','$hora',
        '$paciente','$medico','$consultorio','$estado','$observaciones')";

        $conexion->consulta($sql);

        $citaId = $conexion->obtenerCitaId();

        $conexion->cerrar();

        return $citaId;
    }

    public function consultarCitaPorId($id)
    {

        $conexion = new Conexion();

        $conexion->abrir();

        $sql = "SELECT pacientes.* , medicos.*, consultorios.*, citas.*"
            . "FROM Pacientes as pacientes, Medicos as medicos, Consultorios as consultorios ,citas "
            . "WHERE citas.CitPaciente = pacientes.PacIdentificacion "
            . " AND citas.CitMedico = medicos.MedIdentificacion "
            . " AND citas.CitNumero = $id";

        $conexion->consulta($sql);

        $result = $conexion->obtenerResult();

        $conexion->cerrar();
        return $result;
    }

    public function consultarCitasPorDocumento($doc)
    {

        $conexion = new Conexion();

        $conexion->abrir();

        $sql = "SELECT * FROM citas "
            . "WHERE CitPaciente = '$doc' "
            . " AND CitEstado = 'Solicitada' ";

        $conexion->consulta($sql);

        $result = $conexion->obtenerResult();

        $conexion->cerrar();

        return $result;
    }

    public function consultarPaciente($doc)
    {
        $conexion = new Conexion();

        $conexion->abrir();

        $sql = "SELECT * FROM Pacientes WHERE PacIdentificacion = '$doc' ";

        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result;
    }

    public function agregarPaciente(Paciente $paciente)
    {
        $conexion = new Conexion();

        $conexion->abrir();

        $identificacion = $paciente->obtenerIdentificacion();

        $nombres = $paciente->obtenerNombres();

        $apellidos = $paciente->obtenerApellidos();

        $fechaNacimiento = $paciente->obtenerFechaNacimiento();

        $sexo = $paciente->obtenerSexo();

        $sql = "INSERT INTO Pacientes (PacIdentificacion, PacNombres, PacApellidos, PacFechaNacimiento, PacSexo) VALUES 
        ('$identificacion','$nombres','$apellidos'," . "'$fechaNacimiento','$sexo')";

        $conexion->consulta($sql);

        $filasAfectadas = $conexion->obtenerFilasAfectadas();

        $conexion->cerrar();

        return $filasAfectadas;
    }

    public function consultarMedicos()
    {

        $conexion = new Conexion();

        $conexion->abrir();

        $sql = "SELECT * FROM Medicos ";

        $conexion->consulta($sql);

        $result = $conexion->obtenerResult();

        $conexion->cerrar();

        return $result;
    }

    public function consultarHorasDisponibles($medico, $fecha)
    {
        $conexion = new Conexion();

        $conexion->abrir();

        $sql = "SELECT hora FROM horas WHERE hora NOT IN "
            . "( SELECT CitHora FROM citas WHERE CitMedico = '$medico' AND CitFecha = '$fecha'"
            . " AND CitEstado = 'Solicitada') ";

        $conexion->consulta($sql);

        $result = $conexion->obtenerResult();

        $conexion->cerrar();

        return $result;
    }

    public function consultarConsultorios()
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT * FROM consultorios ";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result;
    }

    public function cancelarCita($cita)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "UPDATE citas SET CitEstado = 'Cancelada' "
            . " WHERE CitNumero = $cita ";
        $conexion->consulta($sql);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    } 

    public function ListarMedicos (){ 

        $Conexion2= new Conexion(); 
        $Conexion2->abrir(); 
        $sql="SELECT * FROM  medicos WHERE estado='Activo'";  
        $Conexion2->consulta($sql);
        $listado=$Conexion2->obtenerResult(); 
        $Conexion2->cerrar();
        return $listado;
    }  

    public function previainsertarmedicos(Medicos $Medicos11){ 

        $Conexion17= new Conexion; 
        $Conexion17->abrir();  

        $Cedulamedico= $Medicos11->obtenerCedulaMedico(); 
        $sql=("SELECT MedIdentificacion FROM medicos WHERE MedIdentificacion='$Cedulamedico'"); 
        $Conexion17->consulta($sql); 
        $roows_13= $Conexion17->obtenerFilasAfectadas(); 

        $Conexion17->cerrar(); 
        return $roows_13;
    }

    public function InsertarMedicos(Medicos $Medicos){ 
        $Conexion3= new Conexion(); 
        $Conexion3-> abrir(); 

        $Indentificacion= $Medicos->obtenerCedulaMedico(); 
        $Nombre= $Medicos->obtenerNombreMedico(); 
        $Apellido= $Medicos->obtenerApellidosMedicos(); 
        $licencia=$Medicos->obtenerLicenciaMedicos(); 
        $Tipo= $Medicos->obtenerTipo();  

        $sql= "INSERT INTO medicos (MedIdentificacion, MedNombres, MedApellidos, MedLicencia, MedTipo)VALUES  
        ('$Indentificacion','$Nombre','$Apellido','$licencia','$Tipo')
        "; 

        $Conexion3->consulta($sql); 
        $roows= $Conexion3->obtenerFilasAfectadas(); 
        $Conexion3 -> cerrar(); 
        return $roows;
    } 

    public function actualizarmedicos(Medicos $Medicos2){ 

        $Conexion4= new Conexion(); 
        $Conexion4-> abrir(); 

        $identificaccion_2= $Medicos2-> obtenerCedulaMedico() ;  
        $ClaveMed_2= $Medicos2-> obtenerClave(); 
        $nombre_2= $Medicos2-> obtenerNombreMedico();   
        $apellido_2= $Medicos2-> obtenerApellidosMedicos(); 
        $licencia_2= $Medicos2-> obtenerLicenciaMedicos(); 
        $Tipo_2= $Medicos2-> obtenerTipo();   
        
        $sql="UPDATE medicos SET MedIdentificacion='$identificaccion_2', MedNombres='$nombre_2', MedApellidos='$apellido_2', MedLicencia='$licencia_2', MedTipo='$Tipo_2' WHERE MedIdentificacion='$ClaveMed_2' "; 

        $Conexion4-> consulta($sql); 

        $roows_2= $Conexion4-> obtenerFilasAfectadas(); 

        $Conexion4-> cerrar(); 

        return $roows_2;

    } 

    public function borrarmedicos(Medicos $Medicos3){ 

        $Conexion5= new Conexion; 
        $Conexion5->abrir(); 

        $ClaveMed_3= $Medicos3->obtenerClave(); 

        $sql="UPDATE medicos SET estado='Desactivado' WHERE MedIdentificacion='$ClaveMed_3'"; 

        $Conexion5-> consulta($sql);

        $roows_3=$Conexion5->obtenerFilasAfectadas(); 

        $Conexion5->cerrar();
        
        return $roows_3;

    }  

    public function ListarTratamientos(){ 

        $Conexion6= new Conexion;  
        $Conexion6-> abrir();   

        $sql="SELECT * FROM tratamientos WHERE estado='Activo'"; 
        $Conexion6->consulta($sql); 

        $BOX=$Conexion6->obtenerResult();  
        $Conexion6->cerrar(); 
        return $BOX;

    } 

    public function IngresarTratamientos(Tratamientos $Tratmaientos2){ 
     
        $Conexion7= new Conexion; 
        $Conexion7->abrir();  

        $Creacion= $Tratmaientos2->obtenerFechaCreacionTrat(); 
        $Descripcion=$Tratmaientos2->obtenerDescripcionTrat();  
        $Inicio=$Tratmaientos2->obtenerFechaInicioTrat(); 
        $Fin=$Tratmaientos2-> obtenerFechaFinTrat(); 
        $Observacion=$Tratmaientos2->obtenerObservacionTrat(); 

        $sql=("INSERT INTO tratamientos (
        TraFechaAsignado,
        TraDescripcion,
        TraFechaInicio,
        TraFechaFin,
        TraObservaciones)VALUES 
        ('$Creacion', 
        '$Descripcion', 
        '$Inicio', 
        '$Fin',
        '$Observacion')"); 

        $Conexion7->consulta($sql);

        $roows_5=$Conexion7->obtenerFilasAfectadas();  

        $Conexion7->cerrar(); 

        return $roows_5; 
    } 

    public function CambiarTratamientos(Tratamientos  $Tratamientos3){ 

        $Conexion8= new conexion; 
        $Conexion8->abrir(); 

        $Idtrat= $Tratamientos3->obtenerClaveTrat();
        $FechCreacion= $Tratamientos3-> obtenerFechaCreacionTrat(); 
        $FechDescripcion=$Tratamientos3->obtenerDescripcionTrat();
        $FechInicio=$Tratamientos3->obtenerFechaInicioTrat();
        $FechFin=$Tratamientos3->obtenerFechaFinTrat(); 
        $Tratobser=$Tratamientos3->obtenerObservacionTrat(); 

        $sql=("UPDATE tratamientos SET TraFechaAsignado='$FechCreacion', TraDescripcion='$FechDescripcion', TraFechaInicio='$FechInicio', TraFechaFin='$FechFin', TraObservaciones='$Tratobser'  WHERE  TraNumero='$Idtrat'"); 

        $Conexion8->consulta($sql); 

        $roows_6=$Conexion8->obtenerFilasAfectadas(); 

        $Conexion8->cerrar(); 
        
        return $roows_6;
    }   

    public function desaparicionTratamiento(Tratamientos $Tratamientos4){ 

        $Conexion9= new Conexion; 
        $Conexion9->abrir(); 

        $clavedecomando= $Tratamientos4->obtenerClaveTrat(); 
        $sql=("UPDATE tratamientos SET estado='Desactivado' WHERE TraNumero='$clavedecomando'");
        $Conexion9->consulta($sql); 
        $roows_7=$Conexion9->obtenerFilasAfectadas(); 
        
        $Conexion9->cerrar(); 

        return $roows_7;

    } 

    public function listarPacientes(){ 
          
        $Conexion10= new Conexion;  
        $Conexion10->abrir(); 

        $sql=("SELECT * FROM pacientes WHERE Pacestado='Activo'"); 
        $Conexion10->consulta($sql); 
        $TablePac=$Conexion10->obtenerResult();  
        $Conexion10->cerrar(); 
        return $TablePac;
    } 

    public function selectPacTratamientos(){ 

        $Conexion11= new Conexion; 
        $Conexion11->abrir(); 

        $sql=("SELECT * FROM tratamientos"); 
        $Conexion11->consulta($sql); 
        $selectpac=$Conexion11->obtenerResult(); 
        $Conexion11->cerrar(); 
        return $selectpac;
    } 

    public function EntrarPacientes(Pacientes2 $Pacientes2){ 

        $Conexion12= new Conexion; 
        $Conexion12->abrir(); 

        $Cedula=$Pacientes2->obtenerCedulaPaciente(); 
        $Nombres=$Pacientes2->obtenerNombresPaciente(); 
        $apellidos=$Pacientes2->obtenerApellidosPaciente();
        $fechanacimento=$Pacientes2->obtenerNacimientoPaciente(); 
        $sexo=$Pacientes2->obtenerSexoPaciente(); 
        $tratamiento=$Pacientes2->obtenerTratamientoPaciente(); 

        $sql=("INSERT INTO pacientes (
        PacIdentificacion,
        PacNombres,
        PacApellidos,
        PacFechaNacimiento,
        PacSexo,
        Pactratamiento)VALUES  
        ('$Cedula',
        '$Nombres',
        '$apellidos', 
        '$fechanacimento', 
        '$sexo', 
        '$tratamiento')");  

        $Conexion12->consulta($sql);  

        $roows_8= $Conexion12->obtenerFilasAfectadas(); 
        $Conexion12->cerrar();  

        return $roows_8;
    } 

    public function busquedaPreviaingPac(Pacientes2 $Pacientes2){  

        $Conexion13= new Conexion; 
        $Conexion13->abrir(); 

        $Identificadorclave= $Pacientes2->obtenerCedulaPaciente(); 
        $sql=("SELECT PacIdentificacion FROM pacientes WHERE PacIdentificacion='$Identificadorclave'");   
        $Conexion13->consulta($sql);  
        $roows_9= $Conexion13->obtenerFilasAfectadas();  
        $Conexion13->cerrar(); 
        return $roows_9;
    } 

    public function actulaizacionPacientes (Pacientes2 $Pacientes3){ 

        $Conexion14= new Conexion; 
        $Conexion14->abrir();  

        $cedula= $Pacientes3->obtenerCedulaPaciente(); 
        $nombre= $Pacientes3->obtenerNombresPaciente(); 
        $apellido= $Pacientes3->obtenerApellidosPaciente();
        $bornfech= $Pacientes3->obtenerNacimientoPaciente(); 
        $sexo= $Pacientes3->obtenerSexoPaciente(); 
        $tratamiento= $Pacientes3->obtenerTratamientoPaciente();   
        $clave= $Pacientes3->obtenerClavePaciente();
         
        $sql=("UPDATE pacientes SET 
        PacIdentificacion='$cedula', 
        PacNombres='$nombre', 
        PacApellidos='$apellido', 
        PacFechaNacimiento='$bornfech', 
        PacSexo='$sexo', 
        Pactratamiento='$tratamiento' 
        WHERE PacIdentificacion='$clave' "); 

        $Conexion14->consulta($sql); 

        $roows_10= $Conexion14->obtenerFilasAfectadas();  

        $Conexion14->cerrar();

        return $roows_10;
    }


    public function  DeletePaciente(Pacientes2 $Pacientes4){ 

        $Conexion16= new conexion; 
        $Conexion16->abrir(); 

        $Clave2= $Pacientes4->obtenerClavePaciente(); 
        $sql=("UPDATE pacientes SET Pacestado='Inactivo' WHERE PacIdentificacion='$Clave2'");  
        $Conexion16->consulta($sql);  
        $roows_12= $Conexion16->obtenerFilasAfectadas(); 
        $Conexion16->cerrar();  

        return $roows_12;

    }  

    public function ListarCitasporMedicos(){ 
        
        $Conexion20= new Conexion; 
        $Conexion20->abrir(); 
        
        $sql=("SELECT * FROM citas WHERE CitMedico='$_SESSION[IdDelUsuario]'"); 
        $Conexion20->consulta($sql);
        $FortBox= $Conexion20->obtenerResult(); 
        $Conexion20->cerrar(); 

        return $FortBox;
    } 

    public function ListarCitaporCitas(){ 

        $Conexion21= new Conexion; 
        $Conexion21->abrir(); 

        $sql=("SELECT * FROM citas WHERE CitPaciente='$_SESSION[IdDelUsuario]'");
        $Conexion21->consulta($sql); 
        $Fortres= $Conexion21->obtenerResult(); 
        $Conexion21->cerrar(); 

        return $Fortres; 
    } 

    public function ListratratamientoporPaciente(){ 

        $Conexion22= new Conexion; 
        $Conexion22->abrir(); 

        $sql=("SELECT tratamientos.*, pacientes.PacNombres FROM tratamientos JOIN pacientes ON tratamientos.TraNumero = pacientes.Pactratamiento WHERE PacIdentificacion='$_SESSION[IdDelUsuario]'"); 

        $Conexion22->consulta($sql); 

        $DragonStone= $Conexion22->obtenerResult(); 

        $Conexion22->cerrar(); 

        return $DragonStone;
    }

    


}
