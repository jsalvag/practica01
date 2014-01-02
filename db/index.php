<?php
  session_start();
    if( $_POST )
 {
     #Comprueba que las variables existan
     if ( isset( $_POST['usuario'] ) and isset( $_POST['password'] ) ){
            # archivo php necesario
   require_once 'php/usuario.class.php';
            # instancia a clase usuario
            $usuario = new usuario();
       if( $usuario->validar_ingreso($_POST['usuario'] , $_POST['password']) ){
                //crea instancia de sesion segura
                $_SESSION["usuario"]=$_POST['usuario'];//variable de sesion;
                # si usuario existe -> redireccionar a nueva pagina 
                echo 'Exito: Usuario '.$_SESSION["usuario"].' logueado';exit;
            }else
              echo 'Error: Acceso Denegado';     
   }
  }        
?>