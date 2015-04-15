<?php      
 $cod = date ("dmY");  
 include_once 'class_conexion_1.php';
 $conectado = new conexion("localhost","root","","orinoco"); 
 $sql1 = mysql_query('select * from pauta');
 $total = mysql_num_rows($sql1); 
 $total++;        
    switch ($total) 
     {
              case (($total < 10)):
                $cod1 = $cod.'-000'.$total;
              break;
              case (($total >= 10 && $total < 100)):
                $cod1 = $cod.'-00'.$total;
              break;
              case (($total >= 100 && $total < 1000)):
                $cod1 = $cod.'-0'.$total;
              break;
              case (($total >= 1000 && $total < 10000)):
                $cod1 = $cod.'-'.$total;
              break;
     } 
echo '<input class="DatoIndependiente" name="cod1" value="'.$cod1.' "onfocus="window.document.form_reloj.estatus.blur()"></input>';
?>
