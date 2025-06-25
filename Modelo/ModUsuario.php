<?php  

    class Users { 

        Private $Usercorreo; 
        private $Usercontraseña; 

        public function __construct($Usercorreo=null, $Usercontraseña=null)
        {   
            $this->Usercorreo=$Usercorreo;
            $this->Usercontraseña=$Usercontraseña;
        } 

        public function obtenerCorreoUsuario(){ 
            return $this->Usercorreo;
        } 
        public function obtenerContraseñaUsuario(){ 
            return $this->Usercontraseña;
        }

    }

?>