<!--
    @Autor: Homero Luz
-->
<?php
    include('../config/config.php');
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Vocabulario Náhuatl-Español</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/main.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--Header-->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                        <h1 class="textoH1 tamtex1">Vocabulario Náhuatl-Español</h1>
                        <h5 class="texto tamtex2">Náhuatl o Nahua el idioma de los Mexicas (Aztecas)</h5>
                    </div>
                    <div class="hidden-xs col-sm-6 col-md-4 col-lg-4 centrar">
                        <a href="#"><img src="../img/port3.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </header>
        
         <!--Barra de Navegacion-->
        <?php
            session_start();
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        ?>
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Cambiar Navegacion</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <?php
                        if($_SESSION['type'] == 0){
                    ?>
                        <ul class="nav navbar-nav">
                            <li><a href="../index.php">Inicio</a></li>
                            <li><a href="../views/abbreviations.php">Abreviaturas</a></li>
                            <li><a href="../views/wordInformationRegister.php">Registrar nueva palabra</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="logout.php">Cerrar sesión</a></li>
                        </ul>
                    <?php
                        } else if($_SESSION['type'] == 1){ 
                    ?>
                        <ul class="nav navbar-nav">
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="logout.php">Cerrar sesión</a></li>
                        </ul>
                    <?php
                        }
                    ?>
                </div>
            </nav>
        <?php
            } else {
        ?>
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Cambiar Navegacion</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="../views/login.php" class="navbar-brand">Ingresar</a>
                </div>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="../index.php">Inicio</a></li>
                        <li><a href="../views/abbreviations.php">Abreviaturas</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Acerca de</a></li>
                    </ul>
                </div>
            </nav>
        <?php
            }
        ?>

        <div class="container">
            <section class="color2">
                <?php 
                    $searchFilter = $_REQUEST['searchFilter'];

                    if (empty($searchFilter)) {
                        header("location: ../index.php");
                    }
                ?>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?php 
                            //Paginador
                            $sqlIndexPaginator = "SELECT Count(*) as total_index FROM wordinformation WHERE vocabularyWord LIKE '%$searchFilter%' OR meaningSpanish LIKE '%$searchFilter%'";
                            $countPaginator = $conexion->query($sqlIndexPaginator);
                            $resultPaginator = mysqli_fetch_array($countPaginator);
                            $totalRegister = $resultPaginator['total_index'];

                            $itemsPerPage = 10;

                            if (empty($_GET['pageNumber'])) {
                                $pageNumber = 1;
                            } else{
                                $pageNumber = $_GET['pageNumber'];
                            }

                            $since = ($pageNumber - 1) * $itemsPerPage;
                            $totalPages = ceil($totalRegister / $itemsPerPage);

                            $wordInformationList = "SELECT idWordInformation, vocabularyWord, wordAbbreviation, meaningSpanish, usageExample, registrationDate FROM wordinformation WHERE vocabularyWord LIKE '%$searchFilter%' OR meaningSpanish LIKE '%$searchFilter%' 
                                ORDER BY vocabularyWord ASC
                                LIMIT $since, $itemsPerPage";
                            $result = $conexion->query($wordInformationList);
                        ?>
                        <h3>Realizar busqueda página: <?php echo $pageNumber; ?></h3>
                        <form action="c_searchWord.php" method="get" class="form_search">
                            <input type="text" name="searchFilter" id="searchFilter" placeholder="Buscar" class="form-control">
                            <input type="submit" value="Buscar" class="btn btn_primary btn_search"
                            >
                        </form>
                        <hr>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>Náhuatl</th>
                                    <th>Significado en Español</th>
                                    <th></th>
                                    <!-- <th>Acciones</th> -->
                                </tr>
                                <?php
                                    $count = $result->num_rows;
                                    if($count > 0){
                                        $i = ($pageNumber * $itemsPerPage + 1) - ($itemsPerPage);
                                        while ($row = $result->fetch_array()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $row['vocabularyWord']?>, <?php echo $row['wordAbbreviation']?></td>
                                                <td><?php echo $row['meaningSpanish']?></td>
                                                <td><?php echo $row['usageExample']?></td>
                                            </tr>
                                        <?php
                                        $i++;    
                                        }
                                    }
                                    $result->free();
                                    $countPaginator->free();
                                    $conexion->close();
                                ?>
                            </table>
                        </div>
                        <?php 
                            if ($totalRegister != 0) {
                        ?>
                        <div class="paginator">
                            <ul class="col-md-12 col-sm-6 col-xs-12">
                                <?php 
                                    if ($pageNumber != 1) {


                                ?>
                                <li><a href="?pageNumber=<?php echo 1; ?>&searchFilter=<?php echo $searchFilter; ?>">|<</a></li>
                                <li><a href="?pageNumber=<?php echo $pageNumber - 1; ?>&searchFilter=<?php echo $searchFilter; ?>"><<</a></li>
                                <?php 
                                    }

                                    for ($i=1; $i <= $totalPages; $i++) { 
                                        if ($i == $pageNumber) {
                                            echo '<li class="pageSelected">'.$i.'</li>';
                                        } else{
                                            echo '<li><a href="?pageNumber='.$i.'&searchFilter='.$searchFilter.'">'.$i.'</a></li>';    
                                        }
                                    }

                                    if ($pageNumber != $totalPages) {
                                ?>
                                <li><a href="?pageNumber=<?php echo $pageNumber + 1;?>&searchFilter=<?php echo $searchFilter; ?>">>></a></li>
                                <li><a href="?pageNumber=<?php echo $totalPages; ?>&searchFilter=<?php echo $searchFilter; ?>">>|</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
            </section><br/>

            <!--Slider-->
            <section id="miSlide" class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#miSlide" data-slide-to="0" class="active"></li>
                    <li data-target="#miSlide" data-slide-to="1"></li>
                    <li data-target="#miSlide" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img src="../img/banner1.jpg" class="adaptar">
                    </div>
                    <div class="item">
                        <img src="../img/banner2.jpg" class="adaptar">
                    </div>
                    <div class="item">
                        <img src="../img/banner3.jpg" class="adaptar">
                    </div>
                    <div class="item">
                        <img src="../img/banner4.jpg" class="adaptar">
                    </div>
                </div>

                <a href="#miSlide" class="left carousel-control" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a href="#miSlide" class="right carousel-control" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </section><br>

            <section>
                <div class="row">
                    <div class="hidden-xs col-sm-6 col-md-6 col-lg-6">
                        <br><br><img src="../img/centerImg.jpg" class="img-responsive">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <h3>EL IDIOMA NÁHUATL</h3><hr>
                        <p align="justify">Podemos afirmar que en México, después del español, el náhuatl es la lengua con mayor número de hablantes y la que más ha influido en el español mexicano, como puede apreciarse en numerosos nahuatlismos que ya forman parte de la lengua castellana, tales como: tomate, petate, metate, aguacate, chocolate, atole…, y otros que se refieren a diversos utensilios, comidas, nombres de personas y de animales, así como expresiones cotidianas.

                        Lo mismo puede decirse de la toponimia mexicana, que se extiende a lo largo y ancho del territorio nacional. Nombres de estados, ciudades importantes, municipios y pueblos están en lengua náhuatl. A modo de ejemplo podemos citar algunos, pues la lista es inmensa: Culiacán, Jalisco, Michoacán, Tuxpan, Oaxaca, Tuxtepec, Acapulco, Tehuantepec, Cuajimalpa, Iztacalco, Huejutla, Ixmiquilpan, Huauchinango, Chicontepec, Teziutlán.

                        A pesar de las políticas de homogeneización cultural y lingüística que predominaron en el siglo pasado para integrarlos a la sociedad nacional, los pueblos nahuas de hoy mantienen diversos aspectos de su patrimonio cultural milenario. Así, en diversas regiones del país pueden apreciarse tradiciones y costumbres que los nahuas mantienen y preservan como parte de su identidad comunitaria y regional.<br></p>
                    </div>
                </div>
            </section>
        </div>

        <section class="color1">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><br><br><br>
                        <h3>LA ESCRITURA</h3><hr>
                        <p align="justify">La escritura nahua prehispánica era como un conjunto de elementos pictográficos, ideográficos y fonéticos. La fase más elemental, la pictográfica, es la simple expresión objetiva, por ejemplo, si se deseaba indicar un árbol, se dibujaba el árbol. En la ideográfica se utilizaba un glifo para señalar un concepto difícil de dibujar, por ejemplo, en el caso del habla, se pintaba una vírgula que salía de la boca de un individuo. En la escritura fonética se dibujaba la figura de un objeto para indicar un sonido, que muchas veces no tenía conexión con el objeto, por ejemplo, el símbolo para el agua indicaba el sonido de la “a”; un frijol indicaba la “e”.<br></p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                         <h3>LA NUMERACIÓN</h3><hr>
                        <p align="justify">Los números de los aztecas estaban representados por diversos símbolos, en ciertos casos existían varios símbolos para identificar un mismo número.
                        Características del sistema de numeración azteca:<br/>
                        – Empleaban un sistema vigesimal, o sea, de base 20.<br/>
                        – Al escribir dos o más símbolos juntos, se suman los valores asignados a cada símbolo. Un símbolo puede repetirse hasta nueve veces.<br></p>
                    </div>
                </div>
            </div><br>
        </section>

        <section class="color2">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                       
                    </div>
                </div>
            </div><br>
        </section>

        <footer class="color4">
            <center>
                <div class="container"><br>
                    <p>Powered by Homero Luz</p>
                    </br>
                </div>
            </center>
        </footer>
        
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="../js/vendor/bootstrap.js"></script>
        <script src="../js/main.js"></script>
    </body>
</html>
ss