<?php 

    class Medicos { 
        
        private $MedCedula; 
        private $MedNombre; 
        private $MedApellido;
        private $MedLicencia;
        private $MedTipo;  
        private $MedClaveCedula;
        
        

        public function __construct($MedCedula=null, $MedNombre=null, $MedApellido=null, $MedLicencia=null, $MedTipo=null, $MedClaveCedula=null){ 

            $this->MedCedula= $MedCedula; 
            $this->MedNombre= $MedNombre; 
            $this->MedApellido= $MedApellido; 
            $this->MedLicencia= $MedLicencia; 
            $this->MedTipo= $MedTipo; 
            $this->MedClaveCedula= $MedClaveCedula;

        } 

        public function obtenerCedulaMedico(){ 
            return $this->MedCedula;
        } 

        public function obtenerNombreMedico(){ 
            return $this->MedNombre;
        } 

        public function obtenerApellidosMedicos(){ 
            return $this ->MedApellido;
        }
 
        public function obtenerLicenciaMedicos(){ 
            return $this->MedLicencia;
        } 

        public function obtenerTipo(){ 
            return $this->MedTipo;
        }

        public function obtenerClave(){ 
            return $this->MedClaveCedula;
        }

    }

?>