<!--
	@Autor: Homero Luz
-->
<?php
    include ('../controller/userSession.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>	
	<title>AGREGAR NUEVA PALABRA</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class=" ">
	<?php
		include('menu.php');
	?>	
	<form id="registerForm" action="../controller/c_wordInformationRegister.php" method="POST">
		<label><h1>&ensp;AGREGAR NUEVA PALABRA</h1></label><br/>
		<hr/>
		<div class="form-group">
			<label for="vocabularyWord">&emsp;Náhuatl</label>
			<input type="text" class="form-control" id="vocabularyWord" name="vocabularyWord" placeholder="i.e. achi" required="true">
		</div>

		<div class="form-group">
			<label for="wordAbbreviation">&emsp;Abreviatura</label>
			<input type="text" class="form-control" id="wordAbbreviation" name="wordAbbreviation" placeholder="i.e. adj.">
		</div>

		<div class="form-group">
            <label for="meaningSpanish">&emsp;Significado en Español:</label>
            <textarea class="form-control" rows="3" name="meaningSpanish" id="meaningSpanish" required="true"></textarea>
        </div>

		<div class="form-group">
            <label for="usageExample">&emsp;Ejemplo de la palabra:</label>
            <textarea class="form-control" rows="3" name="usageExample" id="usageExample"></textarea>
        </div>

		<div class="contentCenter">
			<button type="submit" class="btn btn-primary">Agregar</button>
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


