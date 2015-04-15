<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" /> 
<!--	
	<link href="estilo.css" rel="stylesheet" type="text/css">
	<link href="estilo20.css" rel="stylesheet" type="text/css">
	<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
		<script language="JavaScript" type="text/javascript" src="javascript/ajax1.js"></script>
	
-->	

	<link href="estilos/estilo1.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script language="JavaScript" type="text/javascript" src="jquery-2.1.1.js"></script>
<!--	 <script src="jquery-ui-1.11.2/jquery-ui.js"></script>  -->
 <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script language="JavaScript" type="text/javascript" src="javascript/ajax1.js"></script>
	
 <style>
h1 { padding: .2em; margin: 0; }
</style>

</head>

<!--
  *   
** ****  
 *) *) *
 *  * 	 *
 * *       *
 *  *
 *   *
 *   *
 *  *
 * *
 **
 *
-->	
<body onload="mueveReloj()" onkeydown = "pulsar(event)"> 
<!-- contenedor -->
<div class="contenedor">
<!-- cabecera -->
<header>
<!-- Datos primarios de la asignacion -->
	<h1>Registro de Asignación</h1>

</header>
	<hgroup id="DatoPrimario">
		<form name="form_reloj">
		<h3>Codigo correlativo: <?php include 'php/correlativo.php';?> </h3>
		<h3>Estatus de la asignación:  <?php include 'php/estatus.php';?> </h3>
		<h3>Hora del sistema: <input class="DatoIndependiente" type="text" name="reloj" size="12" onfocus="window.document.form_reloj.reloj.blur()"> </h3>
		</form>	
	</hgroup>
<!-- Barra de navegacion -->

<nav>
	<ul>
		<li><a id="myLink" href="#" onclick="CargaEquipoA();return false;">Equipo A</a></li>
		<li><a id="myLink" href="#" onclick="CargaEquipoB();return false;">Equipo B</a></li>
		<li><a id="myLink" href="formatoc.php" onclick="CargaEquipoC();return false;">Equipo C</a></li>
	</ul>
</nav>

<!-- Sección de datos de la asignacion -->
<section>
	<article>
		<form name="asignacion" action="" onsubmit="" class="" >
		Tipo de uso:<SELECT name="Tipo_de_uso">
						<OPTION value="pauta">Pauta</OPTION>
						<OPTION value="Nota de Prensa">Nota de prensa</OPTION>
						<OPTION value="reparacion">Reparación</OPTION>
						<option value="otro">otro</option>
		</SELECT> <br>
		Uso:<br>
			
			<textarea rows="4" cols="50" name="comment">Introduzca el uso aqui..</textarea>
			<br>
		Estado: <SELECT name="estado">
						<OPTION value="Bolivar">Bolivar</OPTION>
						<OPTION value="Delta Amacuro">Delta Amacuro</OPTION>
						<OPTION value="Amazonas">Amazonas</OPTION>
						<OPTION value="otro">otro</option>
		</SELECT> Municipio: <SELECT></SELECT> Ciudad:<SELECT></SELECT> <br>
		Lugar:  <input type="text" name="lugar"><br>
		Productor:<SELECT></SELECT><br>
		Seguridad:<SELECT></SELECT><br>
		Observacion:<br><textarea rows="4" cols="50" name="comment">Introduzca sus comentarios aqui..</textarea><br>
		<input type="submit" value="Cancelar" class="button"> <input type="submit" value="Asignar" class="button">	
	</form>
	</article>
</section>
<!-- Sección de equipos para la asignación -->
<SECTION>
	<!-- Cuadro de busqueda de equipos-->
	<article>
		<!-- Búsqueda de equipos -->
		<form name="cargar_bien_para_salida" method="post" action=""  class="basic-grey">
			Descripción del equipo, número de bien o serial <input type="text" name="busqueda"><br>
			<input type="submit" value="Buscar" class="button">
		</form>
		<!-- listado de equipos buscados -->
		<table id="tabla">
 			<?php include 'consulta2.php'; ?> 
		</table>
	</article>
	<!-- Listado de equipos para asignacion-->
	<article>
	</article>
</SECTION>
<SECTION>
aqui vamos a colocar los bienes que se carguen 
</SECTION>
</div></body>
</html>
