<meta http-equiv="content" />
<a href="index.php">Regresar</a>
<h2>Sistema Prueba de la Base de Datos SQLite 3</h2>
<?php 
	$ram = mt_rand();
	echo $ram."<hr>";
	$db = "tanteaki.db";
	$tabla = "usuarios";
/*
	if (file_exists()) {
		echo "<br><h6>El Arcivo de Base de Datos llamado '$db' se encontro en el directorio.<h6><br>";
	} else {
		echo "<br><h6>El Arcivo de Base de Datos llamado '$db' <B style='color:red; font-size:20px;'>NO</B> se encontro en el directorio.<h6><br>";
	}
*/

	include_once "db/sqlite3.class.php";

	echo "<hr>";
	$perra = new BaseDeDatos($db);
	$perra->holaBDD();
	echo "<hr>";
/*Mostrar todos los registros
	$aux = $perra->traerTodo($tabla);
	while ($fila = $aux->fetchArray()) {
		echo $fila['nombre']."<br>";
	}
	echo "<hr>";
	*/
	$aux1 = $perra->mostrarUno($tabla, 3);
	foreach ($aux1 as $key => $value) {
		echo "$key:\t$value<br>";
	}
	echo "<hr>";
	echo "

<form action='sqlite3.php' method='POST'>
	<table>
		<tr>
			<th>Nombre:</th>
			<td><input type='text' name='nom' id='nombre'></td>
		</tr>
		<tr>
			<th>Apellido:</th>
			<td><input type='text' name='ape' id='apellido'></td>
		</tr>
		<tr>
			<th>Correo:</th>
			<td><input type='email' name='email' id='correo'></td>
		</tr>
		<tr>
			<th>Usuario:</th>
			<td><input type='text' name='user' id='ususario'></td>
		</tr>
		<tr>
			<th>Clave:</th>
			<td><input type='password' name='pass' id='clave'></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' name='eviar' id='enviar_btn'></td>
		</tr>
	</table>
</form>

	";
	if ($_POST) {
		$nom = $_POST['nom'];
		$ape = $_POST['ape'];
		$email = $_POST['email'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		if ($perra->agregar($tabla,$nom,$ape,$email,$user,$pass)) {
			echo "Datos enviados";
		}else{
			echo "ocurrio un error";
		}
	}
/* generar registros con numeros aleatorios
	for ($i=0; $i < 150; $i++) { 
		$ram1 = mt_rand();

		$nom = $ram1;
		$ape = $ram1/2;
		$email = $ram1."@".($ram1%2).".com";
		$user = $ram1;
		$pass = $ram1%5;

		$perra->agregar($tabla,$nom,$ape,$email,$user,$pass);
	}
	*/
	echo "<hr>";
	$perra->editar();
	echo "<hr>";
	$perra->eliminar();
	echo "<hr>";
	$perra->close();
	echo "<hr>";

	$base = new SQLite3($db);
	$rows = $base->query("SELECT COUNT(*) as count FROM $tabla");
	$row = $rows->fetchArray();
	$numRows = $row['count'];
		echo "Cantidad de registros: $numRows <br>";

//Traer todos los datos
	$consultaAll = "SELECT * FROM $tabla";
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
	$c=0;
	while ($fila = $resultAll->fetchArray()) {
		$c++;
		echo "<tr>
						<td>".$fila['id']."</td>
						<td>".$fila['nombre']."</td>
						<td>".$fila['apellido']."</td>
						<td>".$fila['email']."</td>
						<td>".$fila['usuario']."</td>
						<td>".$fila['clave']."</td>
						<td>".$fila['foto']."</td>
						<td>".$fila['valor']."</td>
						<td><a href='?a=ver&id=".$fila['id']."#ver1'>Ver</a></td>
						<td><a href='?a=edit&id=".$fila['id']."'>Editar</a></td>
						<td><a href='?a=del&id=".$fila['id']."'>Eliminar</a></td>
					</tr>";
	}echo "</table><hr>";
	echo "Hay $c registros<hr>";

//Consulta por id
	if (array_key_exists('id', $_GET)) {
		$id = $_GET['id'];
	} else {
		$id = 0;
	}
	
	$consultaUno = "SELECT * FROM $tabla WHERE id=$id";

	echo "$consultaUno";

	$resultUno = $base->query($consultaUno);
	
	echo "<table border=1 id='ver1'>
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
	$fila = $resultUno->fetchArray();
		echo "<tr>
						<td>".$fila['id']."</td>
						<td>".$fila['nombre']."</td>
						<td>".$fila['apellido']."</td>
						<td>".$fila['email']."</td>
						<td>".$fila['usuario']."</td>
						<td>".$fila['clave']."</td>
						<td>".$fila['foto']."</td>
						<td>".$fila['valor']."</td>
						<td><a href='?a=edit&id=".$fila['id']."'>Editar</a></td>
						<td><a href='?a=del&id=".$fila['id']."'>Eliminar</a></td>
					</tr>";
	echo "</table><hr>";
	
	$base->close();

//Funciones

	function edit($db, $tabla, $id, $campo, $dato)
	{
		$bd = new SQLite3($db);
		$query = ("UPDATE $tabla SET $campo=$dato WHERE id=$id;");
		$bd->close();
		echo "$query";
	}

	function del($db, $tabla, $id)
	{
		$bd = new SQLite3($db);
		$query = ("DELETE FROM $tabla WHERE id=$id;");
		$bd->close();
		echo "$query";
	}

	function Select($db, $tabla)
	{
		$bd = new SQLite3($db);
		$query = "SELECT * FROM $tabla ORDER BY nombre;";
		$res = $bd->query($query);
		echo "<select name='listar' id='listar'>
		<option value='0'></option>";
		while ($fila = $res->fetchArray()) {
			echo "<option value=".$fila['id'].">".$fila['nombre']."\r\n".$fila['apellido']."</option>";
		}
		echo "</select>";
		$bd->close();
	}

	function contarRegistro($db, $tabla)
	{
		$bd = new SQLite3($db);
		$rows = $bd->query("SELECT COUNT(*) as count FROM $tabla");
		$row = $rows->fetchArray();
		$numRows = $row['count'];
		$bd->close();
		return $numRows;
	}
//Formulario Agregar o modificar

//Captura de variable GET
	$tipo = "";
	if (array_key_exists('a', $_GET)) {
		$tipo = $_GET['a'];
	}
$action = "?a=$tipo&id=$id";

Select($db, $tabla);
echo contarRegistro($db, $tabla);


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
	<tr>
		<th>$id</th>
		<th>$nom</th>
		<th>$ape</th>
		<th>$email</th>
		<th>$user</th>
		<th>$pass</th>
		<th>$foto</th>
		<th>$valor</th>
	</tr>
	<tr>
		<td></td>
		<td><input type='text' name='nom' id='nombre'></td>
		<td><input type='text' name='ape' id='apellido'></td>
		<td><input type='text' name='email' id='correo'></td>
		<td><input type='text' name='user' id='usuario'></td>
		<td><input type='text' name='pass' id='clave'></td>
		<td><input type='text' name='foto' id='foto'></td>
		<td><input type='submit' id='enviar' value='enviar'></td>
	</tr>
	</table>
</form>






