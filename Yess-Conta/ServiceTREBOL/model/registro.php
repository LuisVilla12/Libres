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
    function insertUsuarioStr(){
        return "insert into $this->table values ('$this->Nombre','$this->APP','$this->APM', 
        '$this->Tel','$this->Email','$this->Contrasena')";
    }
    function selectAllUsuariosStr(){
        return "select *from $this->table";
    }
    function selectUsuarioStr(){
        return "select  *from $this->table where Email='$Email'";
    }
   
    function deleteUsuarioStr(){
        return "delete *from $this->table where Email='$this->Email'";
    }
    function selectUsuario($Email){
        return "select *from $this->table where Email = '$Email'";
    }
 }   
?>