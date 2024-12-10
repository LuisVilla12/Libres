<?php
 class usuarios_empresa{
    public $U_Email;
    public $idEmpresa;
    public $table="usuarios_empresa";

    function __construct($U_Email=null, $idEmpresa=null) {
        $this->U_Email = $U_Email;
        $this->idEmpresa = $idEmpresa;
        
    }

    function insertUsuaEmpStr(){
        return "insert into $this->table values ('$this->U_Email','$this->idEmpresa')";
    }
    
 }   
?>