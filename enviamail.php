<?php 

if ($_POST) {
	$nom=$_POST['nom'];
	$email=$_POST['email'];
	$mensaje=$_POST['mensaje'];

	echo "
<table>
	<tr>
		<td>Nombre: </td>
		<td>".$nom."</td>
	</tr>
	<tr>
		<td>E-mail: </td>
		<td>".$email."</td>
	</tr>
	<tr>
		<td>Mensaje: </td>
		<td>".$mensaje."</td>
	</tr>
</table>
	";
} else {
	echo "No se ha enviado ningun dato...";
}

$para='jsalvag@gmail.com';
$asunto='tanteaki';
$mj='Nombre: '.$nom.'<br>
E-mail: '.$email.' <br>
Mensaje: '.$mensaje;

if (mail($para, $asunto, $mj)) {
	echo "Correo enviado correctamente a ".$para;
} else {
	echo "El envio a fallado...";
}


?>
<form action="index.php">
	<input type="submit" value="Regresar">
</form>
