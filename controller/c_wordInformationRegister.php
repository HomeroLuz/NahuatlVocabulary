<?php
	include("../config/config.php");

	$vocabularyWordIn = $_POST['vocabularyWord'];
	$wordAbbreviationIn = $_POST['wordAbbreviation'];
	$meaningSpanishIn = $_POST['meaningSpanish'];
	$usageExampleIn = $_POST['usageExample'];

	$registrationDate = date('Y-m-d h:i:s');
	$query = "INSERT INTO `wordinformation`(`vocabularyWord`, `wordAbbreviation`, `meaningSpanish`, `usageExample`, `registrationDate`)
						VALUES ('$vocabularyWordIn', '$wordAbbreviationIn', '$meaningSpanishIn', '$usageExampleIn', '$registrationDate')";
	if ($conexion->query($query) === TRUE) {
		echo "<div class='contentCenter' <br />" . "<h2>" . "Palabra agregada exitosamente!" . "</h2>";
		echo "<h5>" . " " . "<a href='../views/wordInformationRegister.php'>Volver</a>" . "</h5></div>";
	} else {
		echo "Error al crear el usuario: " . $query . "<br>" . $conexion->errno . "<br>" . $conexion->error;
	}

	mysqli_close($conexion);
?>