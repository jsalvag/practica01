<meta http-equiv="content" />
<a href="index.php">Regresar</a>
<h2>Sistema Prueba de la Base de Datos SQLite 3</h2>
<?php 
	echo mt_rand()."<hr>";
	$db = "tanteaki.db";
	$tUser = "usuarios";

	$base = new SQLite3($db);

//Traer todos los datos
	$consultaAll = "SELECT * FROM $tUser";
	$resultAll = $base->query($consultaAll);

	echo "$consultaAll";
	echo "<table border=1>
	<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>E-mail</th>
		<th>Usuario</th>
		<th>Clave</th>
		<th>Foto</th>
		<th>Valoracion</th>
	</tr>";

	while ($fila = $resultAll->fetchArray()) {
		echo "<tr>
						<td>".$fila['id']."</td>
						<td>".$fila['nombre']."</td>
						<td>".$fila['apellido']."</td>
						<td>".$fila['email']."</td>
						<td>".$fila['usuario']."</td>
						<td>".$fila['clave']."</td>
						<td>".$fila['foto']."</td>
						<td>".$fila['valor']."</td>
						<td><a href='?a=ver&id=".$fila['id']."'>Ver</a></td>
						<td><a href='?a=edit&id=".$fila['id']."'>Editar</a></td>
						<td><a href='?a=del&id=".$fila['id']."'>Eliminar</a></td>
					</tr>";
	}echo "</table><hr>";

//Consulta por id
	$id = 1;
	$consultaUno = "SELECT * FROM $tUser WHERE id=$id";

	echo "$consultaUno";

	$resultUno = $base->query($consultaUno);
	
	echo "<table border=1>
	<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>E-mail</th>
		<th>Usuario</th>
		<th>Clave</th>
		<th>Foto</th>
		<th>Valoracion</th>
	</tr>";
	while ($datos = $resultUno->fetchArray()) {
		echo "<tr>
						<td>".$datos['id']."</td>
						<td>".$datos['nombre']."</td>
						<td>".$datos['apellido']."</td>
						<td>".$datos['email']."</td>
						<td>".$datos['usuario']."</td>
						<td>".$datos['clave']."</td>
						<td>".$datos['foto']."</td>
						<td>".$datos['valor']."</td>
						<td><a href='?a=edit&id=".$datos['id']."'>Editar</a></td>
						<td><a href='?a=del&id=".$datos['id']."'>Eliminar</a></td>
					</tr>";
	}echo "</table><hr>";

	
	
	$base->close();

//Funciones

	function edit($db, $tUser, $id, $campo, $dato){
		$bd = new SQLite3($db);
		$query = ("UPDATE $tUser SET $campo=$dato WHERE id=$id;");
		$bd->close();
		echo "$query";
		}

	function del($db, $tUser, $id)	{
		$bd = new SQLite3($db);
		$query = ("DELETE FROM $tUser WHERE id=$id;");
		$bd->close();
		echo "$query";
		}

	function Select($db, $tUser){
		$bd = new SQLite3($db);
		$query = "SELECT * FROM $tUser";
		$res = $bd->query($query);
		echo "<select name='listar' id='listar'>
		<option value='0'></option>";
		while ($fila = $res->fetchArray()) {
			echo "<option value=".$fila['id'].">".$fila['nombre']." ".$fila['apellido']."</option>";
		}
		echo "</select>";
		}
//Formulario Agregar o modificar

//Captura de variable GET
	$tipo = "";
	if (array_key_exists('a', $_GET)) {
		$tipo = $_GET['a'];
	}
$action = "?a=$tipo&id=$id";
Select($db, $tUser,1);
?>
<form action="<?php $action?>">
	<table border=1>
		<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>E-mail</th>
		<th>Usuario</th>
		<th>Clave</th>
		<th>Foto</th>
		<th>Valoracion</th>
	</tr>
	</table>
</form>