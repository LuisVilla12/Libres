<?php
    header('Content-Type: text/html; charset=utf-8');
    require_once "config.php"; 

    class ConnectDB{

		private $conn;

		function connect(){
			$this->conn=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			if(!$this->conn){
				echo "Error al conectarse a la BD".$this->conn->connect_error;
			}else{				
				$this->conn->set_charset("utf8");
				//echo "Conexión Satisfactoria";	
			}							
        }
        function close(){
            if($this->conn){
                $this->conn->close();
            }
        }
        function insert($str){
            $r=$this->conn->query($str);
            if(!$r){
                echo "Error ".$this->conn->error;
            }
            return $r;
        }
        function update($str){
            $r=$this->conn->query($str);
            if(!$r){
                echo "Error ".$this->conn->error;
            }
            return $r;
        }
        function delete($str){
            $r=$this->conn->query($str);
            if(!$r){
                echo "Error ".$this->conn->error;
            }
            return $r;
        }
        function select($str){
            $r=$this->conn->query($str);
            if($r){
                $output=array();
                $output=$r->fetch_all(MYSQLI_ASSOC);
                return $output;
            }else{
                echo "Error ".$this->conn->error;
            }
        }
    } 
   /*$conexion=new ConnectDB();
   $conexion->connect();*/
?>