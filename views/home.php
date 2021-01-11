<!--
	@Autor: Homero Luz
-->
<?php
    include ('../controller/userSession.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>   
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<?php
    	include('menu.php');
	?>
    <form>
    	<label class="formTitle">Sistema para gestion de análisis clínico</label><br/>
        <p align="justify" class="col-md-8">Para iniciar con el registro de solicitud validar si el ejemplar ya fue dado de alta, caso contrario es necesario registrar el ejemplar</p><br/>
        <a href="analysisRequest.php">
            <div class="linkSection">
                Nueva solicitud
            </div>
        </a>
        <a href="specimenRegister.php">
            <div class="linkSection">
                Registro de ejemplar
            </div>
        </a>
    </form>
	<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="../js/vendor/bootstrap.js"></script>
    <script src="../js/main.js"></script>
    <?php
        include('footer.php');
    ?>
</body>
</html>