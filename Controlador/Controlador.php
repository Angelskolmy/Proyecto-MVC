<?php
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

    public function ListartablaMedicos(){ 

        $crud_MedicosList= new GestorCita; 
        $Contend=$crud_MedicosList->ListarMedicos(); 
        require_once 'Vista/html/Medicos.php';
   } 

   public function ingresoTablaMedicos($MedCe, $MedNom, $MedApe, $MedLic, $MedTipo){ 

        $Personal_meedico= new Medicos($MedCe, $MedNom, $MedApe, $MedLic, $MedTipo);   
        $gestorCita_2= new GestorCita;  
        $gestorCita_2->InsertarMedicos($Personal_meedico);
   }

   public function cambioTablaMedicos($MedCe2, $MedNom2, $MedApe2, $MedLic2, $MedTipo2, $MedClave1){ 

        $NuevoPersonal_medico= new Medicos($MedCe2, $MedNom2, $MedApe2, $MedLic2, $MedTipo2, $MedClave1); 
        $gestorCita_3= new GestorCita; 
        $gestorCita_3->actualizarmedicos($NuevoPersonal_medico);
   }

   public function eliminacionTablaMedicos($MedClave2){ 

        $BajaPersonal= new Medicos(null,null,null,null,null,$MedClave2);
        $gestorCita_4= new GestorCita;  
        $gestorCita_4->borrarmedicos($BajaPersonal); 
        $Contend=$gestorCita_4->ListarMedicos(); 
        require_once 'Vista/html/Medicos.php';
   } 

   public function ListarTablaTratamientos(){ 
     
        $Crud_tratamientos= new GestorCita; 
        $Contend2=$Crud_tratamientos->ListarTratamientos(); 
        require_once 'Vista/html/Tratamientos.php';

   } 

   public function ingresoTablaTratamiento($TratAsig, $TrataDesc, $TratInc, $TratFin, $TratOb){ 

        $NuevoTrad= new Tratamientos($TratAsig, $TrataDesc, $TratInc, $TratFin, $TratOb); 
        $Crud_tratamientos2= new GestorCita; 
        $Crud_tratamientos2->IngresarTratamientos($NuevoTrad);

   } 

   public function actualizarTablaTratamientos($TratAsig2, $TrataDesc2, $TratInc2, $TratFin2, $TratOb2, $TratClave1){ 

    $AlterTrad= new Tratamientos($TratAsig2, $TrataDesc2, $TratInc2, $TratFin2, $TratOb2, $TratClave1); 
    $Crud_tratamientos3= new GestorCita; 
    $Crud_tratamientos3->CambiarTratamientos($AlterTrad);
   } 

   public function borrarTablaMedicos($TratClave){ 

    $AlterTrad2= new Tratamientos(null,null,null,null,null,$TratClave); 
    $Crud_tratamientos4= new GestorCita; 
    $Crud_tratamientos4->desaparicionTratamiento($AlterTrad2); 
    $Contend2=$Crud_tratamientos4->ListarTratamientos(); 
    require_once 'Vista/html/Tratamientos.php';
   }
}
 