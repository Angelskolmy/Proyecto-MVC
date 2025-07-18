<?php

    require_once 'Controlador/Controlador.php';
    require_once 'Modelo/GestorCitas.php';
    require_once 'Modelo/Cita.php';
    require_once 'Modelo/Pacientes.php';
    require_once 'Modelo/Conexion.php'; 
    require_once 'Modelo/ModMedicos.php'; 
    require_once 'Modelo/ModTratamientos.php'; 
    require_once 'Modelo/ModPacientes.php'; 
    require_once 'Modelo/ModUsuario.php';

    $controlador = new Controlador();

    if (isset($_GET["accion"])) {  

        if($_GET["accion"] == "entrarsoft"){ 
            $controlador->loginMaster( 
                $_POST['usemail'],
                $_POST['usepassword']
            );
        }

        if($_GET["accion"] == "inicio"){ 
            $controlador->verPagina('Vista/html/inicio.php');
        }

        if ($_GET["accion"] == "asignar") {
            $controlador->cargarAsignar();
        }
        if ($_GET["accion"] == "consultar") {
            $controlador->verPagina('Vista/html/consultar.php');
        }
        if ($_GET["accion"] == "cancelar") {
            $controlador->verPagina('Vista/html/cancelar.php'); 
        }  
        if($_GET["accion"]== "Medicos"){  
            $controlador->ListartablaMedicos();
        } 
        if($_GET["accion"]=="Tratamientos"){ 
            $controlador->ListarTablaTratamientos();
        } 
        if ($_GET["accion"]=="Pacientes"){ 
            $controlador->listarTablaPacientes();
        } 
        if($_GET["accion"]=="CronoMed"){ 
            $controlador->listadoTablaCitasXMed();
        } 
        if($_GET["accion"]=="CitaPac2"){ 
            $controlador->listadoTablaCitasporPaciente();
        } 
        if($_GET["accion"]=="Procedimiento"){ 
            $controlador->ListadoTablaTratamientosporPacinte();
        } 
        
        elseif ($_GET["accion"] == "guardarCita") {

            $controlador->agregarCita(
                $_POST["asignarDocumento"],
                $_POST["medico"],
                $_POST["fecha"],
                $_POST["hora"],
                $_POST["consultorio"],
                $_POST["Observaciones"]
            );
        } 
        elseif ($_GET["accion"] == "consultarCita") {

            $controlador->consultarCitas($_GET["consultarDocumento"]);
        } 
        elseif ($_GET["accion"] == "cancelarCita") {
            $controlador->cancelarCitas($_GET["cancelarDocumento"]);
        } 
        elseif ($_GET["accion"] == "consultarPaciente") {
            $controlador->consultarPaciente($_GET["documento"]);
        } 
        elseif ($_GET["accion"] == "ingresarPaciente") {
            $controlador->agregarPaciente(
                $_GET["PacDocumento"],
                $_GET["PacNombres"],
                $_GET["PacApellidos"],
                $_GET["PacNacimiento"],
                $_GET["PacSexo"]
            );
        } 
        elseif ($_GET["accion"] == "consultarHora") {
            $controlador->consultarHorasDisponibles($_GET["medico"], $_GET["fecha"]);
        } 
        elseif ($_GET["accion"] == "verCita") {
            $controlador->verCita($_GET["numero"]);
        }   
        elseif($_GET["accion"] == "confirmarCancelar"){
            $controlador->confirmarCancelarCita($_GET["numero"]);
        } 
        elseif($_GET["accion"]=="ingresarMedicos"){ 
            $controlador-> ingresoTablaMedicos( 
                $_GET["MedCedula"], 
                $_GET["MedNombre"],
                $_GET["MedApellido"],
                $_GET["MedLicencia"],
                $_GET["MedTipo"]
            );
        } 
        elseif($_GET['accion']=="Medupdate"){  

            $controlador-> cambioTablaMedicos( 
                $_GET["actMedCed"],  
                $_GET["actMedNom"],
                $_GET["actMedApe"], 
                $_GET["actMedLic"], 
                $_GET["actMedTipo"], 
                $_GET["MedCedclave"] 
            );
        } 

        elseif($_GET['accion']=="borrarMedico"){ 

            $controlador->eliminacionTablaMedicos( 
                $_GET['Claveborrado']
            );
        } 
        elseif($_GET['accion']=="insertarTratamiento"){ 

            $controlador->ingresoTablaTratamiento(

                $_GET['TratAsignado'],
                $_GET['TrataDescripcion'],
                $_GET['TratInicio'],
                $_GET['TratFin'],
                $_GET['TratObservacion']
            );
        }
        elseif($_GET['accion']=="actualizetratamiento"){

            $controlador->actualizarTablaTratamientos(

                $_GET['TratAsignado2'], 
                $_GET['TratDescripcion2'],
                $_GET['TratInicio2'],
                $_GET['TratFin2'],
                $_GET['TratObservacion2'],
                $_GET['ClaveTratamiento']
            );

        } 
        elseif($_GET['accion']=="borrarTratamiento"){ 
            
            $controlador->borrarTablatrataminetos( 
                $_GET['datoDesactivacion']
            );
        } 
        elseif($_GET['accion']=="ingresarPacientes22"){ 

            $controlador->PreviolistarrTablaPacientes( 

                $_GET['idPac'],
                $_GET['nombrePac'],
                $_GET['apellidoPac'],
                $_GET['bornPac'],
                $_GET['sexPac'],
                $_GET['tratamientoPac']
            );
        } 
        elseif($_GET['accion']=="uptacker"){ 

            $controlador->actualizarTablaPacientes( 
                $_GET['idPac2'], 
                $_GET['nomPac2'],
                $_GET['apePac2'],
                $_GET['bornPac2'],
                $_GET['sexPac2'],
                $_GET['tratPac2'],
                $_GET['clavePac']
            );
        } 
        elseif($_GET['accion']=="Delpacstar"){ 

            $controlador->borrarPacientes(
                $_GET['Delpacclave']
            );
        }  
        elseif($_GET['accion']=="logouterwild"){ 

            $controlador->cerrarsesion();
        }
        
    } 
    else {
        $controlador->verPagina('Vista/html/Login.php');
    }
