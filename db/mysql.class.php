<?php
# CLASE PARA GESTIONAR LA BASE DE DATOS
class mysql
{
#____________________________________________________________________________soy_una_barra_separadora :)  
    private $localhost = "localhost";    
    private $usuario = "USUARIO";
    private $password = "CONTRASEÑA MYSQL";
    private $database = "tuto_slogin"; 
#____________________________________________________________________________soy_una_barra_separadora :)  
    /* METODO PARA CONECTAR CON LA BASE DE DATOS*/
 public function conectar()
 {
  if(!isset($this->conexion)){
    $this->conexion = (mysql_connect($this->localhost, $this->usuario,$this->password)) or die(mysql_error() );
    mysql_select_db($this->database , $this->conexion) or die(mysql_error());      
  }
 }     
#____________________________________________________________________________soy_una_barra_separadora :)  
 // METODO PARA REALIZAR UNA CONSULTA 
 // INPUT: $q -> consulta
 // OUTPUT: $result
 public function consulta($q)
 {
    $resultado = mysql_query($q,$this->conexion);
    if(!$resultado){
     echo 'MySQL Error: ' . mysql_error();
     exit;
    }
    return $resultado; 
 }
#____________________________________________________________________________soy_una_barra_separadora :) 
 // METODO PARA CONTAR EL NUMERO DE FILAS DEVUELTAS
 // INPUT: $r
 // OUTPUT: numero de filas 
 function numero_de_filas($result){
  if(!is_resource($result)) 
            return false;
  return mysql_num_rows($result);
 }
#____________________________________________________________________________soy_una_barra_separadora :)  
}
?>