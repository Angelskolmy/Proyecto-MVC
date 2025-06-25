<?php 

    class Pacientes2{ 
        
        private $PacCedula;
        private $PacNombres;
        private $PacApellidos;
        private $PacNacimiento; 
        private $PacSexo;
        private $PacTratamiento;  
        private $clavePac;

        public function __construct($PacCedula=null, $PacNombres=null, $PacApellidos=null, $PacNacimiento=null, $PacSexo=null, $PacTratamiento=null,$clavePac=null)
        {
            $this->PacCedula=$PacCedula;
            $this->PacNombres=$PacNombres;
            $this->PacApellidos=$PacApellidos;
            $this->PacNacimiento=$PacNacimiento;
            $this->PacSexo=$PacSexo;
            $this->PacTratamiento=$PacTratamiento; 
            $this->clavePac=$clavePac;
        } 

        public function obtenerCedulaPaciente(){ 
            return $this->PacCedula;
        } 

        public function obtenerNombresPaciente(){ 
            return $this->PacNombres;
        } 

        public function obtenerApellidosPaciente(){ 
            return $this->PacApellidos;
        } 

        public function obtenerNacimientoPaciente(){ 
            return $this->PacNacimiento;
        } 

        public function obtenerSexoPaciente(){ 
            return $this->PacSexo;
        } 

        public function obtenerTratamientoPaciente(){ 
            return $this->PacTratamiento;
        }

        public function obtenerClavePaciente(){ 
            return  $this->clavePac;
        }

    }

?>