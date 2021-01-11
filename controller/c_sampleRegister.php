<!--
	@Autor: Homero Luz
-->
<?php
	include('../config/config.php');
	include('../controller/usersession.php');

	$specimenSelectIn = $_POST['specimenSelect'];
	$sampleNumIn = $_POST['sampleNum'];
	$yearIn = $_POST['year'];

	$idSpecimen = (int)$specimenSelectIn;
	$getSpecimen = "SELECT idSpecimen, specimenClass FROM specimen where idSpecimen = '$idSpecimen'";
	$resultGetSpecimen = $conexion->query($getSpecimen);
	$rowGroup = $resultGetSpecimen->fetch_array(MYSQLI_ASSOC);
	$specimenClassIn = $rowGroup['specimenClass'];

	// Valida codigo de muestra
	$sampleCodeIn = $specimenClassIn . $sampleNumIn . $yearIn;
	$findSample = "SELECT idSample, sampleCode FROM sample WHERE sampleCode = '$sampleCodeIn'";
	$result = $conexion->query($findSample);
	$count = mysqli_num_rows($result);

	if($count > 0){
		echo "<br />". "El código de muestra ya fue registrado" . "<br />";
		echo "<a href='../views/analisysRequest.php'>Valide su información</a>";
	} else {
		$creationDate = date('Y-m-d h:i:s');
		$sampleNum = (int)$sampleNumIn;
		$year = (int)$yearIn;
		$idCreator = $_SESSION['idUser'];
		
		$query = "INSERT INTO sample(sampleNumber, year, sampleCode, idCreator, creationDate, idSpecimen)
						VALUES('$sampleNum', '$year', '$sampleCodeIn', '$idCreator', '$creationDate', '$idSpecimen')";
		if ($conexion->query($query) === TRUE){
			echo "<br />" . "<h2>" . "Muestra registrada exitosamente!" . "</h2>";
			echo "<h5>" . " " . "<a href='../views/analysisRequest.php'>Volver</a>" . "</h5>";
		} else {
			echo "Error al registrar el muestra: " . $query . "<br>" . $conexion->errno . "<br>" . $conexion->error;
		}
	}

	mysqli_close($conexion);
?>