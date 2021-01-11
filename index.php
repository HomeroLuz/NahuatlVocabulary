<!--
    @Autor: Homero Luz
-->
<?php
    /*include('/config/config.php');*/
    include('config/config.php');

    $wordInformationList = "SELECT idWordInformation, vocabularyWord, wordAbbreviation, meaningSpanish, usageExample, registrationDate FROM wordinformation ORDER BY vocabularyWord ASC";
    $result = $conexion->query($wordInformationList);
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
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">

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
                        <a href="#"><img src="img/port3.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </header>
        
        <!--Barra de Navegacion-->
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Cambiar Navegacion</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="views/login.php" class="navbar-brand">Ingresar</a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- <li><a href="views/userRegister.php">Registrarse</a></li> -->
                </ul>

                <form class="navbar-form navbar-left">
                    <!-- <div class="form-group">
                        <input type="text" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Buscar</button> -->
                </form>

                <ul class="nav navbar-nav navbar-right">
                    <!-- <li><a href="#">Acerca de</a></li> -->
                </ul>
            </div>
        </nav>

        <div class="container">
            <!--Slider-->
            <section id="miSlide" class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#miSlide" data-slide-to="0" class="active"></li>
                    <li data-target="#miSlide" data-slide-to="1"></li>
                    <li data-target="#miSlide" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img src="img/banner1.jpg" class="adaptar">
                    </div>
                    <div class="item">
                        <img src="img/banner2.jpg" class="adaptar">
                    </div>
                    <div class="item">
                        <img src="img/banner3.jpg" class="adaptar">
                    </div>
                    <div class="item">
                        <img src="img/banner4.jpg" class="adaptar">
                    </div>
                </div>

                <a href="#miSlide" class="left carousel-control" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a href="#miSlide" class="right carousel-control" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </section><br>

            <section class="color2">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h3>Realizar busqueda</h3><hr>
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
                                    $i = 1;
                                    while ($row = $result->fetch_array()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['vocabularyWord']?>, <?php echo $row['wordAbbreviation']?>.</td>
                                            <td><?php echo $row['meaningSpanish']?></td>
                                            <td><?php echo $row['usageExample']?></td>
                                        </tr>
                                    <?php
                                    $i++;    
                                    }
                                }
                                $result->free();
                                $conexion->close();
                            ?>
                        </table>
                    </div>
                </div>
            </section><br/>

            <section>
                <div class="row">
                    <div class="hidden-xs col-sm-6 col-md-6 col-lg-6">
                        <br><br><img src="img/centerImg.jpg" class="img-responsive">
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


        
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
ss