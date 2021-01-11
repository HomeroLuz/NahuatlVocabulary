<!--
	@Autor: Homero Luz
-->
<?php
    include ('../controller/usersession.php');
    include('../config/config.php');

    $specimensList = "SELECT idSpecimen, name, specimenClass, alias, gender, kind, age, specimenCode, creationDate FROM specimen";
    $result = $conexion->query($specimensList);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ejemplares</title>   
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<?php
    	include('menu.php');
	?>
    <label class="formTitle">Lista de ejemplares</label><br/>
    <table class="table">
        <tr>
            <th>Nombre Común</th>
            <th>Clase</th>
            <th>Apodo/alias</th>
            <th>Género</th>
            <th>Especie</th>
            <th>Edad</th>
            <th>Fecha de Registro</th>
            <th>Historia clínica</th>
        </tr>
        <?php
            $count = $result->num_rows;
            if($count > 0){
                while ($row = $result->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['specimenClass']?></td>
                        <td><?php echo $row['alias']?></td>
                        <td><?php echo $row['gender']?></td>
                        <td><?php echo $row['kind']?></td>
                        <td><?php echo $row['age']?></td>
                        <td><?php echo $row['creationDate']?></td>
                        <td>
                            <a href="<?php echo "clinicHistory.php?opc=". $row['specimenCode'] ?>" class="link_detail">Ver detalle</a>
                        </td>
                    </tr>
                <?php    
                }
            }
            $result->free();
            $conexion->close();
        ?>
    </table>

    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="../js/vendor/bootstrap.js"></script>
    <script src="../js/main.js"></script>
    <?php
        include('footer.php');
    ?>
</body>
</html>