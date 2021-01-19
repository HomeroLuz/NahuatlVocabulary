<!--
    @Autor: Homero Luz
-->
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
                <li><a href="abbreviations.php">Abreviaturas</a></li>
                <li><a href="wordInformationRegister.php">Registrar nueva palabra</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="../controller/logout.php">Cerrar sesión</a></li>
            </ul>
        <?php
        	} else if($_SESSION['type'] == 1){ 
        ?>
        	<ul class="nav navbar-nav">
	        </ul>

	        <ul class="nav navbar-nav navbar-right">
                <li><a href="../controller/logout.php">Cerrar sesión</a></li>
	        </ul>
	    <?php
	    	}
	    ?>
    </div>
</nav>