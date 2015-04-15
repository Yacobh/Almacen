<?php
// Realizamos la conexión con la base de datos

if (isset($_POST["busqueda"]))
{
	include_once 'class_conexion_1.php';
	if ($_POST['busqueda'] == '')
        { 
               echo "<br><img src='imagenes/Alerta_png.png' border='0'>";   
               echo("&nbsp;<font size=2>Debe escribir por lo menos una palabra para busqueda</font>");
        }
        else
	{
		$dato=$_POST["busqueda"];
		//echo $dato."<br>";
		$conecta = new conexion("localhost","root","","orinoco");
		$sql="SELECT * FROM equipamiento WHERE MATCH (Bien, Serial, Descripcion) AGAINST ('$dato' IN BOOLEAN MODE)";
		$datos=mysql_query($sql) or die();  
//		echo $datos."<br>";
		$campos=mysql_num_fields($datos); 
//		echo $campos."<br>";
		$filas = mysql_num_rows($datos);
//		echo $filas."<br>";

//Si no hay resultados
		if ($filas==0)
			echo "No hay Resultados";
		else
		{
// Encabezado con los titulos de columna

		echo "<tr>";
		for ($i = 0; $i < $campos; $i++) 
		
		  { 	$nombre=mysql_field_name($datos, $i);                         
			$nombre_mayuscula = ucwords($nombre);
			  echo "<th>".$nombre_mayuscula."</th>";
		  }         
		echo "<th>"."Acción"."</th>";                     
		echo "<tr>";
	
// Recorrido de la Tabla (mysql) presentada en una tabla html
		while ($row=mysql_fetch_array($datos)) 
		  { echo "<tr class='basic-grey'>";
		    for ($i = 0; $i < $campos; $i++) 
			echo  "<td>".$row[$i]."</td>";
			echo "<td>"."<a style=\"text-decoration:underline;cursor:pointer;\" onclick=\"listar('$row[0]')\">Listar</a>"."</td>";
			echo "</tr>";
		  }	
		}
	}
}
?>
