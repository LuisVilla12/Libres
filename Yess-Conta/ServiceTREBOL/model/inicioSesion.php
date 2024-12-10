<?php
 class usuarios{
    public $Nombre;
    public $APP;
    public $APM;
    public $Tel;
    public $Email;
    public $Contrasena;
    public $table="usuarios";

    function __construct($Nombre=null, $APP=null, $APM=null, $Tel=null, $Email=null, $Contrasena=null) {
        $this->Nombre = $Nombre;
        $this->APP = $APP;
        $this->APM = $APM;
        $this->Tel = $Tel;
        $this->Email = $Email;
        $this->Contrasena  = $Contrasena;
    }
   
    function selectUsuario($Email, $Contrasena){
        return "select *from $this->table where Email = '$Email' and Contrasena = '$Contrasena' ";
    }
    function selectAllUsuariosStr(){
        return "select *from $this->table";
    }
    function selectUsua($Email){
        return "select Nombre, APP, APM from $this->table where Email= '$Email' ";
    }
 }   
?>