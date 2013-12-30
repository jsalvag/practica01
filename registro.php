<!--
<form action="?sel=registro" method="POST">
	<table>
		<tr>
			<td><label for="registro.php">Nombre: </label></td>
			<td><input type="text" name="nom" id="nombre" required></td>
			<td><label for="registro.php">Apellido: </label></td>
			<td><input type="text" name="ape" id="apellido" required></td>
		</tr>
		<tr>
			<td><label for="correo">Correo: </label></td>
			<td><input type="email" name="email" id="correo" required></td>
			<td><label for="correov"></label>Confirme Correo: </td>
			<td><input type="email" name="emailv" id="correov" required></td>
		</tr>
		<tr>
			<td><label for="clave">Clave: </label></td>
			<td><input type="password" name="pass" id="clave" required></td>
			<td><label for="clavev">Confirme Clave: </label></td>
			<td><input type="password" name="passv" id="clavev" required></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" id="registro_btn" value="Enviar"></td>
			<td></td>
		</tr>
	</table>
</form>
-->

<form action="?sel=registro" method="POST" class="formulario">
 <div id="izq" class="registro_caja">
 	<label class="registro_label" for="user">Usuario: </label><br/>
 	<label class="registro_label" for="nombre">Nombre: </label><br/>
 	<label class="registro_label" for="apellido">Apellido: </label><br/>
 	<label class="registro_label" for="correo">E-mail: </label><br/>
 	<label class="registro_label" for="correov">Confirma email: </label><br/>
 	<label class="registro_label" for="clave">Contraseña: </label><br/>
 	<label class="registro_label" for="clavev">Confirma Contraseña: </label><br/>
 </div>
 <div id="der" class="registro_caja">
 	<input class="registro_input" type="text" name="user" id="user" required /><br/>
 	<input class="registro_input" type="text" name="nom" id="nombre" required /><br/>
 	<input class="registro_input" type="text" name="ape" id="apellido" required /><br/>
 	<input class="registro_input" type="email" name="email" id="email" required /><br/>
 	<input class="registro_input" type="email" name="emailv" id="emailv" required /><br/>
 	<input class="registro_input" type="password" name="pass" id="clave" required /><br/>
 	<input class="registro_input" type="password" name="passv" id="clavev" required /><br/>
 </div>
 <input type="submit" id="Registro_btn" value="Registrar">
</form>

<?php  
if ($_POST) {
	$user = $_POST['user'];
	$nom = $_POST['nom'];
	$ape = $_POST['ape'];
	$email = $_POST['email'];
	$emailv = $_POST['emailv'];
	$pass = $_POST['pass'];
	$passv = $_POST['passv'];

	//Nombre de la base de datos
	$db = 'tanteaki.db';
	//nombre de la tabla de usuarios
	$tabla_user = 'usuarios';
	//consulta SQL
	$consulta = "INSERT INTO ".$tabla_user." (nombre, apellido, email, usuario, clave) VALUES ('".$nom."','".$ape."','".$email."','".$user."','".$pass."');";

	$validar;
	if ($email != $emailv) {
		echo "Los Correos introducidos no coinciden";
		$validar=false;
	} elseif ($pass!=$passv) {
		echo "Las claves introducidas no coinciden";
		$validar=false;
	}else{
		$validar=true;

		$base = new SQLite3($db);

		$resul = $base->query("SELECT * FROM usuarios WHERE email;");

		while ($dato = $resul->fetchArray()) {
			if ($dato['email']==$email) {
				$validar=false;
				echo "El correo: $email ya se encuentra registrado en la base de datos";
			}
		}

		if ($validar) {
			if ($base->exec($consulta)) {
				echo "Se Eviaran los datos a la DB";
			} else {
				echo "Ops... Ocurrio un error en la base de datos";
			}			
			$base->close();
		}
	}
} else {
	echo "<B>Gracias por registrarte el nuestra web<B/>";
}


 ?>
