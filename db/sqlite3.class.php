<?php 
/**
* Clase para la gestion de SQLite3
*/

class BaseDeDatos extends SQLite3
{
	private $nombre_db;
	private $base;

	public function __construct($nombre_db)
	{
		$this->nombre_db = $nombre_db;
		$this->open($nombre_db);
		echo "<br>Clase <B style='color:red; font-size:20px;'>BaseDeDatos</B> incluida<br>";
	}

	public function holaBDD()
	{
		echo "<br/>hola perra: $this->nombre_db<br/>";
	}

	public function traerTodo($tabla)
	{
		return $this->query("SELECT * FROM $tabla;");
	}

	public function mostrarUno($tabla, $id)
	{
		return $this->querySingle("SELECT * FROM $tabla WHERE id='$id';",true);
	}

	public function agregar($tabla,$nom,$ape,$email,$user,$pass)
	{
		if (($nom||$ape||$email||$user||$pass)=="") {
			return false;
		} else {
			$this->exec("INSERT INTO $tabla 
			(nombre, apellido, email, usuario, clave) 
			VALUES ('$nom','$ape','$email','$user','$pass');");
			return true;
		}
		
		
	}

	public function editar()
	{
		echo "<br/>editar usuarios de la db<br/>";
	}

	public function eliminar()
	{
		echo "<br/>eliminar usuarios de la db<br/>";
	}
}
?>