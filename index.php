<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/estilos.css">
	<title>TantAKI</title>
</head>
<body>
	<div id="cuerpo">
		<header>
			<div id="login">
				<form action="login.php" method="POST">
					<input type="text" name="user" />
					<input type="password" name="pass" />
					<input type="submit" value="LogIn" name="login"/>
				</form>
				<a href="?sel=registro">Registrate</a>
			</div>
			<div id="logolink">
				<a href="index.php" id="">
					<div id="logo">
						<img src="css/logoJSGL.svg" alt="">
					</div>
				</a>
			</div>
			<a href="index.php">
				<h1>Tante<span id="A">A</span><span id="K">K</span><span id="I">I</span></h1>
				<h2>Trabajo y entretenimiento facil de encontrar</h2>
			</a>
			<nav id="menu">
				<ul>
					<li><a href="?sel=home" >Inicio</a></li>
					<li><a href="?sel=contacto" >Contacto</a></li>
					<li><a href="?sel=top&tipo=aleatorio" >TOP</a></li>
					<li><a href="?sel=usuario" >Usuarios</a></li>
				</ul>
			</nav>
		</header>
		<section id="principal">
			<aside>
				<h3>Contenido relevante a todo el sitio</h3>
				<ul>
					<li>
						<a href="?sel=top&tipo=comida"class="icono">
							<img class="imgico" src="css/comidaInk.svg" alt="">
							<span class="cometico">
								Comida
							</span>
						</a>
					</li>
					<li>
						<a href="?sel=top&tipo=comercio"class="icono">
							<img class="imgico" src="css/tiendasInk.svg" alt="">
							<span class="cometico">
								Comercios
							</span>
						</a>
				</li>
					<li>
						<a href="?sel=top&tipo=entreteniminto"class="icono">
							<img class="imgico" src="css/entretenimientoInk.svg" alt="">
							<span class="cometico">
								Entretenimiento
							</span>
						</a>
				</li>
					<li>
						<a href="?sel=top&tipo=servicios"class="icono">
							<img class="imgico" src="css/serviciosInk.svg" alt="">
							<span class="cometico">
								Servicios
							</span>
						</a>
				</li>
				</ul>
			</aside>
			<div id="contenido">
				<?php 

				if ($_GET) {
					$sel = $_GET['sel'];
				} else {
					$sel = 'home';
				}
				
				switch ($sel) {
					case 'home':
						include 'home.php';
						break;
					
					case 'contacto':
						include 'contacto.php';
						break;
					
					case 'top':
						include "top.php";
						break;
						
					case 'usuario':
						include 'usuario.php';
						break;
						
					case 'registro':
						include 'registro.php';
						break;
					
					default:
						include 'home.php';
						break;
				}
				 
				?>
			</div>
		</section>
		<footer>
			<h6>(c) 2014 - Jose Salvador Guevara Lunar</h6>
			<a href="sqlite3.php">SQLite3 Pruebas</a>
			<form action="http://php">
				<input type="submit" value="Regresar" />
			</form>
		</footer>
	</div>
</body>
</html>