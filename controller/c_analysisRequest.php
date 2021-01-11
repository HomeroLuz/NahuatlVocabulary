<!--
	@Autor: Homero Luz
-->
<?php
	include("../config/config.php");
	include("userSession.php");
	include("keyGenerator.php");

	$titleIn = $_POST['analysisTitle'];
	$idSampleSelectIn = $_POST['sampleSelect'];
	$senderIn = $_POST['sender'];
	$receiverIn = $_POST['receiver'];
	$observationsIn = $_POST['observations'];

	if (empty($_POST['analysisTypeList'])){
        echo "<br />" . "<h2>" . "Error es necesario complerar todos los campos" . "</h2>";
		echo "<h5>" . " " . "<a href='../views/analysisRequest.php'>Volver</a>" . "</h5>";
    }

	$getSample = "SELECT idSample, sampleCode FROM sample WHERE idSample = '$idSampleSelectIn'";
	$result = $conexion->query($getSample);
	$count = mysqli_num_rows($result);

	if($count > 0){
		$registrationDate = date('Y-m-d h:i:s');
		$idSample = (int)$idSampleSelectIn;
		$idCreator = $_SESSION['idUser'];
		
		foreach ($_POST['analysisTypeList'] as $analysisType) {
			$analysisKeyIn = generateKey(10);
			$query = "INSERT INTO 
								analysis(
									title, 
									type, 
									registrationDate, 
									sender, 
									receiver, 
									observations, 
									analysisCode, 
									status, 
									idCreator, 
									idSample) 
								VALUES(
									'$titleIn', 
									'$analysisType', 
									'$registrationDate', 
									'$senderIn', 
									'$receiverIn', 
									'$observationsIn', 
									'$analysisKeyIn', 
									'0', 
									'$idCreator', 
									'$idSample')";
			if($conexion->query($query) === TRUE){
				$updateStatus = "UPDATE sample SET status = 1 WHERE idSample = '$idSample'";
				$conexion->query($updateStatus);
			}
		}
		echo "<br />" . "<h2>" . "Solicitud registrada exitosamente!" . "</h2>";
		echo "<h5>" . " " . "<a href='../views/analysisRequest.php'>Volver</a>" . "</h5>";
	}
	mysqli_close($conexion);
?>