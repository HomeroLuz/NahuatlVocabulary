<!--
	@Autor: Homero Luz
-->
<?php 
	include ('../controller/usersession.php');
    include('../config/config.php');

	$analysisCodeIn = $_GET['opc'];
	$analysisSelected = "SELECT analysis.idAnalysis, analysis.title, analysis.type, analysis.registrationDate, analysis.sender, analysis.receiver, analysis.observations, analysis.analysisCode, analysis.status, analysis.idCreator, analysis.idSample, specimen.name, specimen.alias, specimen.specimenClass, specimen.gender, specimen.kind, specimen.age, sample.sampleCode FROM analysis INNER JOIN sample ON analysis.idSample = sample.idSample INNER JOIN specimen ON sample.idSpecimen = specimen.idSpecimen WHERE analysis.analysisCode = '$analysisCodeIn'";
    $result = $conexion->query($analysisSelected);
    $row = $result->fetch_assoc();
    $idAnalysisShow = $row['idAnalysis'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detalle de Análisis</title>   
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<?php
    	include('menu.php');
	?>

	<div class="buildZone">
		<table class="table table-hover analysisTable">
			<label class="formTitle">INFORMACION DE ANÁLISIS SOLICITADO</label><br/>
			<label class="formSubtitle">Código de análisis: <?php echo $row['analysisCode'] ?></label><br/>
			<thead>
				<tr>
					<td class="fondColor1"><label>Titulo:</label> <?php echo $row['title'] ?> </td>
					<td class="fondColor1"><label>Tipo:</label> 
						<?php 
                    		switch ($row['type']) {
                    			case 1:
                    				echo "Coprológico";
                    				break;
                    			case 2:
                    				echo "EGO";
                    				break;
                    			case 3:
                    				echo "Hematológico";
                    				break;
                    			case 4:
                    				echo "Citológico";
                    				break;
                    			case 5:
                    				echo "Gastroentérico";
                    				break;
                    			case 6:
                    				echo "Otros";
                    				break;
                    			default:
                    				break;
                    		}
                        ?>    		
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="fondColor1"><label>Remitente:</label> <?php echo $row['sender'] ?></td>
					<td class="fondColor1"><label>Receptor:</label> <?php echo $row['receiver'] ?></td>
				</tr>
				<tr></tr>
				<tr>
					<td class="fondColor1"><label>Observaciones:</label> <?php echo $row['observations'] ?></td>
					<td class="fondColor1"><label>Fecha de registro:</label> <?php echo $row['registrationDate'] ?></td>
				</tr>
			</tbody>
		</table>

		<table class="table table-hover specimenTable">
			<label class="formTitle">FICHA DE EJEMPLAR</label><br/>
			<thead>
				<tr>
					<td class="fondColor1"><label>Nombre común:</label> <?php echo $row['name'] ?></td>
					<td class="fondColor1"><label>Apodo/Alias:</label> <?php echo $row['alias'] ?></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="fondColor1"><label>Clase:</label> <?php echo $row['specimenClass'] ?></td>
					<td class="fondColor1"><label>Género:</label> 
						<?php 
							if($row['gender'] == 1){
								echo "Macho";
							} else if($row['gender'] == 2){
								echo "Hembra";
							}
						?>
					</td>
				</tr>
				<tr>
					<td class="fondColor1"><label>Especie:</label> <?php echo $row['kind'] ?></td>
					<td class="fondColor1"><label>Edad:</label> <?php echo $row['age'] ?></td>
				</tr>
				<tr>
					<td class="fondColor1"><label>Código de muestra:</label> <?php echo $row['sampleCode'] ?></td>
					<td class="fondColor1"></td>
				</tr>
			</tbody>
		</table>
	</div>
	<hr/>
	<!-- RESULT SECTION -->
	<div class="buildZone">
		<?php
			if($row['status'] == 0){
		?>	
		<form id="resultRegisterForm" action="../controller/c_resultRegister.php" method="POST">
			<label class="formTitle">SECCIÓN PARA LLENAR RESULTADO DE ANÁLISIS CLÍNICO</label><br/>
			<div class="form-group">
	            <label for="process">&emsp;Proceso:</label>
	            <textarea class="form-control" rows="5" name="process" id="process" required="true"></textarea>
	            <small id="processHelp" class="form-text text-muted">&emsp;Numerar el proceso(s) realizados en este análisis</small>
	        </div>
	        <div class="form-group">
	            <label for="clinicalFindings">&emsp;Hallazgos clínicos:</label>
	            <textarea class="form-control" rows="5" name="clinicalFindings" id="clinicalFindings" required="true"></textarea>
	            <small id="clinicalFindings" class="form-text text-muted">&emsp;Listar los hallazgos clínicos de acuerdo a sus resultados obtenidos</small>
	        </div>
	        <div class="form-group">
                <select class="form-control invisible" id="idAnalysisSelected" name="idAnalysisSelected" show="false">
                    <option selected value=" <?php echo $row['idAnalysis']?> "></option>
                    ?>     
                </select>
            </div>
			<div class="contentCenter">
				<button type="submit" class="btn btn-primary">Aceptar</button>
			</div>
        </form>
		<?php	
			} else if ($row['status'] == 1) {
				$resultDetail = "SELECT idResult, process, clinicalFindigns, registrationDate, idCreator, idAnalysis FROM result WHERE idAnalysis = '$idAnalysisShow'";
				$result = $conexion->query($resultDetail);
				$rowResult = $result->fetch_assoc();
		?>
		<table class="table table-hover specimenTable">
			<label class="formTitle">RESULTADO DE ANÁLISIS</label><br/>
			<tr>
				<td class="fondColor1"><label>Proceso:</label> <?php echo $rowResult['process'] ?> </td>
			</tr>
			<tr>
				<td class="fondColor1"><label>Hallazgos clínicos:</label> <?php echo $rowResult['clinicalFindigns'] ?> </td>
			</tr>
			<tr>
				<td class="fondColor1"><label>Fecha de registro:</label> <?php echo $rowResult['registrationDate'] ?></td>
			</tr>
		</table>
		<?php		
			}
		?>
	</div>
	<?php
		$result->free();
		$conexion->close();
	?>
	<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="../js/vendor/bootstrap.js"></script>
    <script src="../js/main.js"></script>
    <?php
        include('footer.php');
    ?>
</body>
</html>