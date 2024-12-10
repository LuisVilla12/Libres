<?php
 class naturaleza{
    public $Codigo_Naturaleza;
    public $Tipo_Naturaleza;
    public $table="naturaleza";

    function __construct($Codigo_Naturaleza=null, $Tipo_Naturaleza=null) {
        $this->Codigo_Naturaleza = $Codigo_Naturaleza;
        $this->Tipo_Naturaleza = $Tipo_Naturaleza;
        
    }

    function selectAllStr(){
        return "select *from $this->table";
    }

   }   
?>