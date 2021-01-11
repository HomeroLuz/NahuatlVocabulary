<!--
	@Autor: Homero Luz
-->
<?php
	include("../config/config.php");
	include("userSession.php");

	$processIn = $_POST['process'];
	$clinicalFindingsIn = $_POST['clinicalFindings'];
	$idAnalysisIn = $_POST['idAnalysisSelected'];
	
	$getAnalysis = "SELECT idAnalysis, title FROM analysis WHERE idAnalysis = '$idAnalysisIn'";
	$result = $conexion->query($getAnalysis);
	$count = mysqli_num_rows($result);

	if($count > 0){
		$registrationDate = date('Y-m-d h:i:s');
		$idAnalysis = (int)$idAnalysisIn;
		$idCreator = $_SESSION['idUser'];

		$query = "INSERT INTO result(process, clinicalFindigns, registrationDate, idCreator, idAnalysis) 
						 VALUES('$processIn', '$clinicalFindingsIn', '$registrationDate', '$idCreator', $idAnalysis)";
		if ($conexion->query($query) === TRUE){
			$updateStatus = "UPDATE analysis SET status = 1 WHERE idAnalysis = '$idAnalysis'";
			$conexion->query($updateStatus);

			echo "<br />" . "<h2>" . "Se ha registrado el resultado de análisis exitosamente!" . "</h2>";
			echo "<h5>" . " " . "<a href='../views/showRequests.php'>Volver</a>" . "</h5>";
		} else {
			echo "Error al registrar el resultado de análisis: " . $query . "<br>" . $conexion->errno . "<br>" . $conexion->error;
		}
	}
	mysqli_close($conexion);
?>