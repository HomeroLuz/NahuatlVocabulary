<!--
	@Autor: Homero Luz
-->
<?php
include('../config/config.php');
include('../controller/usersession.php');
include("keyGenerator.php");

	$nameIn = $_POST['name'];
	$aliasIn = $_POST['alias'];
	$specimenClassIn = $_POST['specimenClass'];
	$genderIn = $_POST['gender'];
	$kindIn = $_POST['kind'];
	$ageIn = $_POST['age'];

	$findSpecimen = "SELECT idSpecimen, name FROM specimen WHERE name = '$nameIn'";
	$result = $conexion->query($findSpecimen);
	$count = mysqli_num_rows($result);

	if($count > 0){
		echo "<br />". "El ejemplar con el nombre común ingresado ya fue registrado" . "<br />";
		echo "<a href='../views/specimenRegister.php'>Valide su información</a>";
	} else {
		$creationDate = date('Y-m-d h:i:s');
		$gender = (int)$genderIn;
		$age = (int)$ageIn;
		$idCreator = $_SESSION['idUser'];
		$specimenKeyIn = generateKey(10);
		$query = "INSERT INTO specimen(name, specimenClass, alias, gender, kind, age, specimenCode, creationDate, idCreator)
						 VALUES('$nameIn', '$specimenClassIn', '$aliasIn', '$gender', '$kindIn', '$age', '$specimenKeyIn', '$creationDate', '$idCreator')";
		if ($conexion->query($query) === TRUE){
			echo "<br />" . "<h2>" . "Ejemplar registrado Exitosamente!" . "</h2>";
			echo "<h5>" . " " . "<a href='../views/specimenRegister.php'>Volver</a>" . "</h5>";
		} else {
			echo "Error al registrar el ejemplar: " . $query . "<br>" . $conexion->errno . "<br>" . $conexion->error;
		}
	}

	mysqli_close($conexion);
?>