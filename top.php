<?php 
if ($_GET['tipo']) {
	$tipo = $_GET['tipo'];
}else{
	$tipo = "Aleatorio";
}
error_reporting(E_ALL);
 ?>

<div id="alfa">
	<h2><?php echo $tipo; ?></h2>
	<?php 
		for ($i=1; $i < 10; $i++) { 
			echo "<div class='alfa'>
			<img src='css/porlamar01.jpg' alt='Imagen de Cliente' class='imagencliente'>
			<p class='textoalfa'>CLIENTE ALFA #".$i."</p>
			</div>";
		}
	?>
</div>
<div id="beta">
	<?php 
		for ($i=1; $i < 91; $i++) { 
			echo "<div class='beta'>
			<img src='css/porlamar02.jpg' alt='Imagen de Cliente' class='imagencliente'>
			<p class='textobeta'>BETA #".$i."</p>
			</div>";
		}
	 ?>
</div>