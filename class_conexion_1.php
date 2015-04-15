<?php  
class conexion{
    public $servidor;
    public $usuario;
    public $clave;
    public $bd;
                        
     function __construct($servidor,$usuario,$clave,$bd){
       $this->servidor=$servidor;
       $this->usuario=$usuario;
       $this->clave=$clave;
       $this->bd=$bd;
       
       mysql_connect("$this->servidor","$this->usuario","$this->clave") or die('NO SE PUDO CONECTAR: ' . mysql_error());
       mysql_select_db($bd) or die('NO SE PUDO SELECCIONAR LA BASE DE DATOS'); 
      
                                                         }    
    function mostrar($tabla){
       $this->tabla=$tabla;    
       $sql=" select * from $tabla"; //código MySQL
       $datos=mysql_query($sql);  
       $campos=mysql_num_fields($datos); 
       echo $campos;echo '<br>';
              
       while ($row=mysql_fetch_array($datos)) {  //Bucle para ver todos los registros
        for ($i = 0; $i < $campos; $i++) {       /*Bucle para recorrer los campos de la tabla*/
          $nombre=mysql_field_name($datos, $i);  /*funcion que devuelve nombre del campo*/
          echo $nombre.": ".$row[$nombre]." ";   /*Imprime en pantalla nombre de campo y el valor*/
                                        }
          echo '<br>';                          /*Salto de linea entre un registro y otro de la tabla*/
                                  }
                          }                                        
              }            
?>
