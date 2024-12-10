<?php
 class empresa{
    public $idEmpresa;
    public $Nombre;
    public $Direccion;
    public $Telefono;
    public $Giro;
    public $RFC;
    public $table="empresa";

    function __construct($idEmpresa=null, $Nombre=null, $Direccion=null, $Telefono=null, $Giro=null, $RFC=null) {
        $this->idEmpresa = $idEmpresa;
        $this->Nombre = $Nombre;
        $this->Direccion = $Direccion;
        $this->Telefono = $Telefono;
        $this->Giro = $Giro;
        $this->RFC  = $RFC;
    }
    function insertEmpresaStr(){
        return "insert into $this->table values ('$this->idEmpresa','$this->Nombre','$this->Direccion', '$this->Telefono','$this->Giro','$this->RFC')";
    }
    function selectAllEmpresasStr(){
        return "select *from $this->table";
    }
     function selectAllEmpresasUserStr($Email){
        return "SELECT empresa.idEmpresa, empresa.Nombre from empresa INNER JOIN usuarios_empresa on usuarios_empresa.idEmpresa=empresa.idEmpresa INNER JOIN usuarios on usuarios.Email=usuarios_empresa.U_Email WHERE usuarios.Email='$Email'";
    }
    function selectEmpresaStr($Nombre){
        return "select * from $this->table where Nombre='$Nombre'";
    }
    function selectEmpresaIDStr($idEmpresa){
        return "select * from $this->table where idEmpresa='$idEmpresa'";
    }
   function selectEmpresa($idEmpresa){
        return "select Nombre from $this->table where idEmpresa='$idEmpresa'";
    }
    function deleteEmpresaStr(){
        return "delete from $this->table where idEmpresa='$this->idEmpresa'";
    }
 }   
?>