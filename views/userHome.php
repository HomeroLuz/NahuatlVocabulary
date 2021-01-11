<!--
	@Autor: Homero Luz
-->
<?php
    include ('../config/config.php');
    include ('../controller/userSession.php');
    $message = "";
    $stringTest = "";
    $count = 0;

    if ($_POST) {
        $codeIn = trim($_POST['analysisCode']);
        $getAnalysis = "SELECT analysis.idAnalysis, analysis.title, analysis.type, analysis.registrationDate, analysis.sender, analysis.receiver, analysis.analysisCode, analysis.status, analysis.idCreator, analysis.idSample, specimen.name, specimen.alias, sample.sampleCode FROM analysis INNER JOIN sample ON analysis.idSample = sample.idSample INNER JOIN specimen ON sample.idSpecimen = specimen.idSpecimen WHERE analysis.analysisCode = '$codeIn'";
        $result = $conexion->query($getAnalysis);
        $count = mysqli_num_rows($result);

        if($count > 0){
            $row = $result->fetch_assoc();
            $stringTest = $row['title'];
        } else {
            $message = "No se encontraron resultados";
        }
    }
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
    <div class="contentCenter">
        <form id="searchForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <div class="form-group">
                <label for="analysisCode">&emsp;Código de análisis</label>
                <input type="text" class="form-control" id="analysisCode" name="analysisCode" aria-describedby="emailHelp" placeholder="i.e. G2SC21OB93" required="true">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
        </form>
        <?php
            echo "<br/><h4>" . $message . "</h4>";
            
            if ($count > 0) {
            ?>
                <label class="formTitle">Información de análisis</label><br/>
                <table class="table" border="1">
                    <tr>
                        <th>Titulo</th>
                        <th>Tipo</th>
                        <th>Emisor</th>
                        <th>Receptor</th>
                        <th>Código de analisis</th>
                        <th>Fecha de registro</th>
                        <th>Ejemplar Nombre-Alias</th>
                        <th>Código de muestra</th>
                        <th>Acciones</th>
                    </tr>
                    <tr>
                        <td><?php echo $row['title']?></td>
                        <td>
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
                        <td><?php echo $row['sender']?></td>
                        <td><?php echo $row['receiver']?></td>
                        <td><?php echo $row['analysisCode']?></td>
                        <td><?php echo $row['registrationDate']?></td>
                        <td><?php echo $row['name']?> - <?php echo $row['alias']?></td>
                        <td><?php echo $row['sampleCode']?></td>
                        <td>
                        <?php
                            if ($row['status'] == 1) {
                        ?>
                            <a href="<?php echo "analysisDetail.php?opc=". $row['analysisCode'] ?> " class="link_detail">Ver resultado</a>
                        <?php
                            } else {
                                echo "En espera de resultados";
                        }
                        ?>
                        </td>
                    </tr>
                </table>
            <?php
                $result->free();
                $conexion->close();
            }
        ?>
    </div>
<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="../js/vendor/bootstrap.js"></script>
    <script src="../js/main.js"></script>
    <?php
        include('footer.php');
    ?>
</body>
</html>