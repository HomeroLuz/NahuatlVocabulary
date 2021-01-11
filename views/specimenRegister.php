<!--
	@Autor: Homero Luz
-->
<?php
    include ('../controller/usersession.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro de ejemplar</title>   
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<?php
    	include('menu.php');
	?>
    <form id="registerForm" action="../controller/c_specimenRegister.php" method="POST">
	   <label><h3>&ensp;NUEVO EJEMPLAR</h3></label><br/>
        <div class="form-group">
            <label for="name">&emsp;Nombre común</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="i.e. Oso negro" required="true">
        </div>
        <div class="form-group">
            <label for="alias">&emsp;Apodo(alias)</label>
            <input type="text" class="form-control" id="alias" name="alias" placeholder="i.e. Bison" required="true">
        </div>
        <div class="form-group">
            <label for="specimenClass">&emsp;Clase</label>
            <input type="text" class="form-control" id="specimenClass" name="specimenClass" placeholder="i.e. M" required="true">
        </div>
        <div class="form-group">
            <label for="gender">&emsp;Género</label>
            <select class="form-control" id="gender" name="gender">
                <option selected value="0">Seleccione una opción</option>
                <option value="1">Macho</option>
                <option value="2">Hembra</option>
            </select>
        </div>
        <div class="form-group">
            <label for="kind">&emsp;Especie</label>
            <input type="text" class="form-control" id="kind" name="kind" placeholder="i.e. Mamífero carnívoro" required="true">
        </div>
        <div class="form-group">
            <label for="age">&emsp;Edad(años)</label>
            <input type="text" class="form-control" id="age" name="age" placeholder="i.e. 25" required="true">
        </div>
        <div class="contentCenter">
            <button type="submit" class="btn btn-primary">Registrar</button>
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