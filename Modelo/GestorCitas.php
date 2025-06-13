<?php
class GestorCita
{
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

        $sql = "INSERT INTO Pacientes VALUES ('$identificacion','$nombres','$apellidos'," . "'$fechaNacimiento','$sexo')";

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
        $sql="SELECT * FROM  medicos ";  
        $Conexion2->consulta($sql);
        $listado=$Conexion2->obtenerResult(); 
        $Conexion2->cerrar();
        return $listado;
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

        $sql="DELETE FROM medicos WHERE MedIdentificacion='$ClaveMed_3'"; 

        $Conexion5-> consulta($sql);

        $roows_3=$Conexion5->obtenerFilasAfectadas(); 

        $Conexion5->cerrar();
        
        return $roows_3;

    }  

    public function ListarTratamientos(){ 

        $Conexion6= new Conexion;  
        $Conexion6-> abrir();   

        $sql="SELECT * FROM tratamientos"; 
        $Conexion6->consulta($sql); 

        $BOX=$Conexion6->obtenerResult();  
        $Conexion6->cerrar(); 
        return $BOX;

    }
}
