<?php  
session_start();
class Controlador
{ 
    public function verPagina($ruta)
    {
        require_once $ruta;
    }

    public function agregarCita($doc, $med, $fec, $hor, $con, $obs)
    {
        $cita = new Cita(null, $fec, $hor, $doc, $med, $con, "Solicitada", $obs);

        $gestorCita = new GestorCita();

        $id = $gestorCita->agregarCita($cita);

        $result = $gestorCita->consultarCitaPorId($id);

        require_once 'Vista/html/confirmarCita.php';
    }

    public function consultarCitas($doc)
    {
        $gestorCita = new GestorCita();

        $result = $gestorCita->consultarCitasPorDocumento($doc);

        require_once 'Vista/html/consultarCitas.php';
    }

    public function cancelarCitas($doc)
    {
        $gestorCita = new GestorCita();

        $result = $gestorCita->consultarCitasPorDocumento($doc);

        require_once 'Vista/html/cancelarCitas.php';
    }

    public function consultarPaciente($doc)
    {
        $gestorCita = new GestorCita();

        $result = $gestorCita->consultarPaciente($doc);

        require_once 'Vista/html/consultarPaciente.php';
    }

    public function agregarPaciente($doc, $nom, $ape, $fec, $sex)
    {
        $paciente = new Paciente($doc, $nom, $ape, $fec, $sex);
        $gestorCita = new GestorCita();
        $registros = $gestorCita->agregarPaciente($paciente);
        if ($registros > 0) {
            echo "Se insertó el paciente con exito";
        } else {
            echo "Error al grabar el paciente";
        }
    }

    public function cargarAsignar()
    {
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarMedicos();
        $result2 = $gestorCita->consultarConsultorios();
        require_once 'Vista/html/asignar.php';
    }

    public function consultarHorasDisponibles($medico, $fecha)
    {
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarHorasDisponibles(
            $medico,
            $fecha
        );
        require_once 'Vista/html/consultarHoras.php';
    }
    public function verCita($cita)
    {
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarCitaPorId($cita);
        require_once 'Vista/html/confirmarCita.php';
    }

    public function confirmarCancelarCita($cita)
    {
        $gestorCita = new GestorCita();
        $registros = $gestorCita->cancelarCita($cita);
        if ($registros > 0) {
            echo "La cita se ha cancelado con éxito";
        } else {
            echo "Hubo un error al cancelar la cita";
        }
    }

    public function ListartablaMedicos()
    {

        $crud_MedicosList = new GestorCita;
        $Contend = $crud_MedicosList->ListarMedicos();
        require_once 'Vista/html/Medicos.php';
    }

    public function ingresoTablaMedicos($MedCe, $MedNom, $MedApe, $MedLic, $MedTipo)
    {

        $Personal_meedico = new Medicos($MedCe, $MedNom, $MedApe, $MedLic, $MedTipo);
        $Personal_meedico22 = new Medicos($MedCe, null, null, null, null, null, null);
        $gestorCita_2 = new GestorCita;
        $Comparador = $gestorCita_2->previainsertarmedicos($Personal_meedico22);
        if ($Comparador == 0) {
            $gestorCita_2->InsertarMedicos($Personal_meedico);
        } else {
            $GLOBALS['mensaje_errorMedico'] = "Medico ya registrado";
        }
    }

    public function cambioTablaMedicos($MedCe2, $MedNom2, $MedApe2, $MedLic2, $MedTipo2, $MedClave1)
    {

        $NuevoPersonal_medico = new Medicos($MedCe2, $MedNom2, $MedApe2, $MedLic2, $MedTipo2, $MedClave1);
        $gestorCita_3 = new GestorCita;
        $gestorCita_3->actualizarmedicos($NuevoPersonal_medico);
    }

    public function eliminacionTablaMedicos($MedClave2)
    {

        $BajaPersonal = new Medicos(null, null, null, null, null, $MedClave2);
        $gestorCita_4 = new GestorCita;
        $gestorCita_4->borrarmedicos($BajaPersonal);
        $Contend = $gestorCita_4->ListarMedicos();
        require_once 'Vista/html/Medicos.php';
    }

    public function ListarTablaTratamientos()
    {

        $Crud_tratamientos = new GestorCita;
        $Contend2 = $Crud_tratamientos->ListarTratamientos();
        require_once 'Vista/html/Tratamientos.php';
    }

    public function ingresoTablaTratamiento($TratAsig, $TrataDesc, $TratInc, $TratFin, $TratOb)
    {

        $NuevoTrad = new Tratamientos($TratAsig, $TrataDesc, $TratInc, $TratFin, $TratOb);
        $Crud_tratamientos2 = new GestorCita;
        $Crud_tratamientos2->IngresarTratamientos($NuevoTrad);
    }

    public function actualizarTablaTratamientos($TratAsig2, $TrataDesc2, $TratInc2, $TratFin2, $TratOb2, $TratClave1)
    {

        $AlterTrad = new Tratamientos($TratAsig2, $TrataDesc2, $TratInc2, $TratFin2, $TratOb2, $TratClave1);
        $Crud_tratamientos3 = new GestorCita;
        $Crud_tratamientos3->CambiarTratamientos($AlterTrad);
    }

    public function borrarTablatrataminetos($TratClave)
    {

        $AlterTrad2 = new Tratamientos(null, null, null, null, null, $TratClave);
        $Crud_tratamientos4 = new GestorCita;
        $Crud_tratamientos4->desaparicionTratamiento($AlterTrad2);
        $Contend2 = $Crud_tratamientos4->ListarTratamientos();
        require_once 'Vista/html/Tratamientos.php';
    }

    public function listarTablaPacientes()
    {

        $crud_pacientes1 = new GestorCita;
        $Backlog = $crud_pacientes1->listarPacientes();
        $selector = $crud_pacientes1->selectPacTratamientos();
        $selector2 = $crud_pacientes1->selectPacTratamientos();
        require_once 'Vista/html/Pacientes.php';
    }


    public function PreviolistarrTablaPacientes($cedulaPac, $nomPac, $apePac, $bornPac, $sexoPac, $tratamientoPac)
    {

        $AlterPac = new Pacientes2($cedulaPac, $nomPac, $apePac, $bornPac, $sexoPac, $tratamientoPac);
        $AlterPac2 = new Pacientes2($cedulaPac, null, null, null, null, null);
        $crud_pacientes22 = new GestorCita;
        $Comprobar = $crud_pacientes22->busquedaPreviaingPac($AlterPac2);

        if ($Comprobar == 0) {
            $crud_pacientes22->EntrarPacientes($AlterPac);
        } else {
            $GLOBALS['mensaje_error'] = "Paciente ya registrado";
        }
    }

    public function actualizarTablaPacientes($cedulaPac2, $nomPac2, $apePac2, $bornPac2, $sexoPac2, $tratamientoPac2, $calvePac1)
    {

        $Modal = new Pacientes2($cedulaPac2, $nomPac2, $apePac2, $bornPac2, $sexoPac2, $tratamientoPac2, $calvePac1);
        $Crud_pacientes3 = new GestorCita;
        $Crud_pacientes3->actulaizacionPacientes($Modal);
    }

    public function borrarPacientes($clavePac3)
    {

        $Modalpac = new Pacientes2(null, null, null, null, null, null, $clavePac3);
        $Crud_pacientes4 = new GestorCita;
        $Crud_pacientes4->DeletePaciente($Modalpac);
        $Backlog = $Crud_pacientes4->listarPacientes();
        require_once 'Vista/html/Pacientes.php';
    }

    public function loginMaster($mail, $cont){  

            $Usuario= new Users($mail, $cont);
            $logan= new GestorCita; 
            $Comparadorloger=$logan->loger($Usuario);     

            while($Llave= $Comparadorloger->fetch_object()){ 

                if($Llave->email== $mail && $Llave->UserPasword== $cont){ 
                    
                    $_SESSION['CorreoDelUsuario']=$Llave->email;
                    $_SESSION['ContraseñaDelUsuario']=$Llave->UserPasword; 
                    $_SESSION['RolDelUsuario']=$Llave->Rol;  
                    $_SESSION['IdDelUsuario']=$Llave->idUsuario;

                    require_once 'Vista/html/inicio.php'; 
                    exit;
                }          
            }
            $_SESSION['MesnajeError']="Usuario Inexistente"; 
            header ("Location: index.php");
            exit;

    } 

    public function listadoTablaCitasXMed(){ 

        $Mobius= new GestorCita; 
        $Recapitulacion=$Mobius->ListarCitasporMedicos(); 
        require_once 'Vista/html/CronogramaMedico.php';
    } 

    public function listadoTablaCitasporPaciente(){ 

        $Mobius2= new GestorCita; 
        $RecapPac= $Mobius2->ListarCitaporCitas(); 
        require_once 'Vista/html/citaPaciente.php';
    } 

    public function ListadoTablaTratamientosporPacinte(){ 
         
        $Mobius3= new GestorCita; 
        $ActarPac=$Mobius3->ListratratamientoporPaciente();  
        require_once 'Vista/html/Procedimientos.php';

    }  

    public function cerrarsesion(){

        session_start(); 
        session_unset(); 
        session_destroy(); 

        header("Location: index.php");
    }

    
}
