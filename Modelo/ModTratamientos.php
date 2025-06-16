<?php 

    class Tratamientos{ 

        private $TratFechCreacion; 
        private $TratDescripcion; 
        private $TratFechInicio; 
        private $TratFechFin; 
        private $TratObservacion;  
        private $TratClave;

        public function __construct($TratFechCreacion=null, $TratDescripcion=null, $TratFechInicio=null, $TratFechFin=null, $TratObservacion=null, $TratClave=null)
        {
            $this->TratFechCreacion=$TratFechCreacion; 
            $this->TratDescripcion=$TratDescripcion; 
            $this->TratFechInicio=$TratFechInicio; 
            $this->TratFechFin=$TratFechFin; 
            $this->TratObservacion=$TratObservacion;  
            $this->TratClave=$TratClave;
        }

        public function obtenerFechaCreacionTrat(){ 
            return $this->TratFechCreacion; 
        } 

        public function obtenerDescripcionTrat(){ 
            return $this->TratDescripcion; 
        } 

        public function obtenerFechaInicioTrat(){
            return $this->TratFechInicio;
        } 

        public function obtenerFechaFinTrat(){ 
            return $this->TratFechFin;
        } 

        public function obtenerObservacionTrat(){ 
            return $this->TratObservacion;
        } 

        public function obtenerClaveTrat(){ 
            return $this->TratClave;
        }
    } 
?>