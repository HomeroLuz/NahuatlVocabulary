<!--
	@Autor: Homero Luz
-->
<?php
    include ('../controller/usersession.php');
    include('../config/config.php');

    $listSpecimens = "SELECT idSpecimen, name, specimenClass, alias FROM specimen";
    $result = $conexion->query($listSpecimens);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro de solicitud</title>   
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<?php
    	include('menu.php');
	?>
    <label class="formTitle">SOLICITUD DE ANALISIS CLINICO</label><br/>
    <div class="buildZone">
        <div class="contentCenter">
            <label class="formSubtitle">Registrar muestra</label><br/>
        </div>
        <form id="sampleRegisterForm" action="../controller/c_sampleRegister.php" method="POST">
            <div class="form-group">
                <label for="specimenSelect">&emsp;Muestra para ejemplar:</label>
                <select class="form-control" id="specimenSelect" name="specimenSelect">
                    <option selected value="0">Seleccione una opción</option>
                    <?php    
                    while ( $row = $result->fetch_array() )    
                    {
                        ?>
                        <option value=" <?php echo $row['idSpecimen'] ?> " >
                            <?php echo $row['name']; ?> - <?php echo $row['alias']?>
                        </option>
                        <?php
                    }
                   /* $result->free();
                    $conexion->close();*/
                    ?>     
                </select>
            </div>
            <div class="form-group">
                <label for="sampleNum">&emsp;Numero de muestra</label>
                <input type="text" class="form-control" id="sampleNum" name="sampleNum" placeholder="i.e. 01" required="true">
            </div>
            <div class="form-group">
                <label for="year">&emsp;Año</label>
                <input type="text" class="form-control" id="year" name="year" placeholder="i.e. 2019" required="true">
            </div>           
            <div class="contentCenter">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>
    <hr/>
    <div class="buildZone">
        <div class="contentCenter">
            <label class="formSubtitle">Datos de solicitud</label><br/>
        </div>
        <form id="analysisRegisterForm" action="../controller/c_analysisRequest.php" method="POST">
            <div class="form-group">
                <label for="analysisTitle">&emsp;Título</label>
                <input type="text" class="form-control" id="analysisTitle" name="analysisTitle" placeholder="i.e. Examen de Rutina Bimestral" required="true">
            </div>
            <div class="form-group">
                <label for="sampleSelect">&emsp;Seleccione código de muestra:</label>
                <select class="form-control" id="sampleSelect" name="sampleSelect">
                    <option selected value="0">Seleccione una opción</option>
                    <?php
                    $listSamples = "SELECT sample.idSample, sample.sampleCode, specimen.alias FROM sample INNER JOIN specimen ON specimen.idSpecimen = sample.idSpecimen WHERE sample.status = 0";
                    $result = $conexion->query($listSamples);

                    while ( $row = $result->fetch_array() )    
                    {
                        ?>
                        <option value=" <?php echo $row['idSample'] ?> " >
                            <?php echo $row['sampleCode']; ?> - <?php echo $row['alias']?>
                        </option>
                        <?php
                    }
                    $result->free();
                    $conexion->close();
                    ?>     
                </select>
            </div>
            <div class="form-group">
                <label for="sender">&emsp;Remitente</label>
                <input type="text" class="form-control" id="sender" name="sender" placeholder="i.e. Jose Gomez Baeza" required="true">
            </div>
            <div class="form-group">
                <label for="receiver">&emsp;Receptor</label>
                <input type="text" class="form-control" id="receiver" name="receiver" placeholder="i.e. QFB Josefino Osorio" required="true">
            </div>
            <div class="form-group">
                <label for="analysisTypeList">&emsp;Seleccione estudio(s) solicitado</label><br/>
                <div class="contentCenter">
                    <input type="checkbox" name="analysisTypeList[]" value="1">&ensp;Coprológico&emsp;</input>
                    <input type="checkbox" name="analysisTypeList[]" value="2">&ensp;EGO&emsp;</input>
                    <input type="checkbox" name="analysisTypeList[]" value="3">&ensp;Hematológico&emsp;</input>
                    <input type="checkbox" name="analysisTypeList[]" value="4">&ensp;Citológico&emsp;</input>
                    <input type="checkbox" name="analysisTypeList[]" value="5">&ensp;Gastroentérico&emsp;</input>
                    <input type="checkbox" name="analysisTypeList[]" value="6">&ensp;Otros&emsp;</input>
                </div>
                <small id="analysisTypeHelp" class="form-text text-muted">&emsp;Puede seleccionar mas de una opción, de acuerdo a los examenes solicitados</small>
            </div>
            <div class="form-group">
                <label for="observations">&emsp;Observaciones:</label>
                <textarea class="form-control" rows="5" name="observations" id="observations" required="true"></textarea>
                <small id="observationsHelp" class="form-text text-muted">&emsp;IMPORTANTE en caso de Citología indique tipo(Impronta, PAF, Raspado o H isopado). Especifique: tiempo de aparación, localización, tamaño, apariencia, tipo de tinción requerido.<br/>&emsp;Para EGO: Indique método de obtencion(Micción espontanea, Sondeo, Citocentésis, etc)</small>
            </div>
            <div class="contentCenter">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="../js/vendor/bootstrap.js"></script>
    <script src="../js/main.js"></script>
    <?php
        include('footer.php');
    ?>
</body>
</html>