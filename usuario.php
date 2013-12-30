<p>Usuario</p>

<table>
	<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Correo</th>
		<th>Usuario</th>
		<th>Clave</th>
		<th>Foto</th>
		<th>Valoracion</th>
	</tr>
	<tr>
		<?php 
	$base = new SQLite3('tanteaki.db');

	$resul = $base->query("SELECT * FROM usuarios");
	$id;
	$nom;
	$ape;
	$email;
	$user;
	$pass;
	$foto;
	$valor;

	//while($fila = $result->fetchArray()) {}

?>
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>
</table>