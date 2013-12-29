<form action="enviamail.php" method="post" id="formcontacto">
	<table id="tablacontacto">
		<tr>
			<th>
				Formulario de contacto
			</th>
		</tr>
		<tr>
			<td>
				<label for="nombre">Nombre: </label>
			</td>
			<td>
				<input type="text" name="nom" id="nombre" required />
			</td>
		</tr>
		<tr>
			<td>
				<label for="email">E-mail: </label>
			</td>
			<td>
				<input type="email" name="email" id="email" required />
			</td>
		</tr>
		<tr>
			<td>
				<label for="mensaje">Mensaje: </label>
			</td>
			<td><textarea name="mensaje" id="mensaje" cols="20" rows="6"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="enviar" id="enviar" value="Enviar Correo">
			</td>
		</tr>
	</table>
</form>