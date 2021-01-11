<!--
	@Autor: Homero Luz
-->
<?php
    include ('../controller/userSession.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>	
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class=" ">
	<?php
		include('menu.php');
	?>	
	<form id="registerForm" action="../controller/c_register.php" method="POST">
		<!-- DATOS PERSONALES -->
		<label><h3>&ensp;DATOS PERSONALES</h3></label><br/>
		<hr/>
		<div class="form-group">
			<label for="personalName">&emsp;Nombre</label>
			<input type="text" class="form-control" id="personalName" name="personalName" placeholder="i.e. Mario Perez" required="true">
		</div>
		
		<div class="form-group">
			<label for="emailAddress">&emsp;Correo electrónico</label>
			<input type="email" class="form-control" id="emailAddress" name="emailAddress" aria-describedby="emailHelp" placeholder="ejemplo@servidor.com" required="true">
			<small id="emailHelp" class="form-text text-muted">&emsp;We'll never share your email with anyone else.</small>
		</div>

		<!-- DATOS DE USUARIO -->
		<hr/>
		<div class="divider"/>
		<label><h3>&ensp;DATOS DE USUARIO</h3></label><br/>
		<div class="form-group">
			<label for="userName">&emsp;Nombre de usuario</label>
			<input type="text" class="form-control" id="userName" name="userName" placeholder="i.e. mario_p" required="true">
		</div>
		<div class="form-group">
			<label for="userType">&emsp;Perfil de usuario:</label>
			<select class="form-control" id="userType" name="userType">
				<option>Administrador</option>
				<option>Capturador</option>
				<option>Usuario</option>
			</select>
		</div>
		<div class="form-group">
			<label for="inputPassword">&emsp;Contraseña</label>
			<input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required="true">
		</div>
		<div class="form-group">
			<label for="inputPassword">&emsp;Confirmar Contraseña</label>
			<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required="true">
		</div>
		<div class="contentCenter">
			<button type="submit" class="btn btn-primary">Registrarse</button>
		</div>
	</form>
	<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
	<script src="../js/vendor/bootstrap.js"></script>
	<script src="../js/main.js"></script>
	<?php
		include('footer.php');
	?>
</body>
</html>


