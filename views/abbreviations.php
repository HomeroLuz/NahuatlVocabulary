
<!--
	@Autor: Homero Luz
-->
<!DOCTYPE html>
<html lang="en">
<head>	
	<title>Abreviaturas</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class=" ">
	<?php
		session_start();
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			include('menu.php');
		} else {
			include('menuAnonymous.php');
		}
	?>	
	<label><h3>&ensp;ABREVIATURAS</h3></label><br/>
	<hr/>
	<div class="table-responsive">
		<table>
			<tbody>
				<tr>
					<td>adj.</td>
					<td>Adjetivo</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>adj. calif.</td>
					<td>Adjetivo calificativo</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>adv.</td>
					<td>Adverbio</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>adv. a.</td>
					<td>Adverbio de afirmación</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>adv. c.</td>
					<td>Adverbio de cantidad</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>adv. l.</td>
					<td>Adverbio de lugar</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>adv. m.</td>
					<td>Adverbio de modo</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>adv. n.</td>
					<td>Adverbio de negación</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>adv. t.</td>
					<td>Adverbio de tiempo</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>af.</td>
					<td>Afirmación</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>aux.</td>
					<td>Auxiliar</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>conj.</td>
					<td>Conjunción</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>dim.</td>
					<td>Diminutivo</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>f.</td>
					<td>Femenino</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>int.</td>
					<td>Interrogativo</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>g.</td>
					<td>Gentilicio</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>m.</td>
					<td>Modo</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>morf.</td>
					<td>Morfema</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>n.</td>
					<td>Nombre</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>neg.</td>
					<td>Negación</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>neol.</td>
					<td>Neologismo</td>
					<td>pref. dim.</td>
					<td>Prefijo diminutivo</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>pref. n.</td>
					<td>Prefijo negativo</td>
				</tr>
				<tr>
					<td>pref.</td>
					<td>Prefijo</td>
					<td>pref. pron. pos.</td>
					<td>Prefijo pronominal posesivo</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>pref. pron. ref.</td>
					<td>Prefijo pronominal reflexivo</td>
				</tr>
				<tr>
					<td>pref. d.</td>
					<td>Prefijo demostrativo</td>
					<td>pref.</td>
					<td>Prefijo pronominal verbal</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>prep.</td>
					<td>Preposición</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>pres.</td>
					<td>Presente</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>pret.</td>
					<td>Pretérito</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>pres. p.</td>
					<td>Presente progresivo</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>pron. d.</td>
					<td>Pronombre demostrativo</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>pron. i.</td>
					<td>Pronombre indefinido</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>pron. interr.</td>
					<td>Pronombre interrogativo</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>pron. p.</td>
					<td>Pronombre personal</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>pron. r.</td>
					<td>Pronombre relativo</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>r.</td>
					<td>Relativo</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>t. lit.</td>
					<td>Traducción literal</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>vb.</td>
					<td>Verbo</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>vb. d.</td>
					<td>Verbo directo</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>vb. frec.</td>
					<td>Verbo de frecuencia</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>vb. t.</td>
					<td>Verbo transitivo</td>
				</tr>
			</tbody>
		</table>
	</div>
		
	<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
	<script src="../js/vendor/bootstrap.js"></script>
	<script src="../js/main.js"></script>
	<?php
		include('footer.php');
	?>
</body>
</html>


