// JavaScript Document
 
// Función para recoger los datos de PHP según el navegador, se usa siempre.
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
 
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}
 
if (!xmlhttp && typeof XMLHttpRequest !='undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
 
//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatosEmpleado(){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  //recogemos los valores de los inputs
  ced=document.nuevo_empleado.cedula.value;
  nom=document.nuevo_empleado.nombre.value;
  ape=document.nuevo_empleado.apellido.value;
  are=document.nuevo_empleado.area.value;
  car=document.nuevo_empleado.cargo.value;
 
  //instanciamos el objetoAjax
  ajax=objetoAjax();
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "registro.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		divResultado.innerHTML = ajax.responseText;
  		//llamar a funcion para limpiar los inputs
		LimpiarCampos();
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("cedula="+ced+"&nombre="+nom+"&apellido="+ape+"&area="+are+"&cargo="+car);
}
 
 function eliminar(id)
 {

               divResultado = document.getElementById('resultado');
               ajax=objetoAjax();

               ajax.open("GET", "eliminar.php?id="+id,true);
               //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  
             ajax.onreadystatechange=function() {
	          //la función responseText tiene todos los datos pedidos al servidor
  	         if (ajax.readyState==4) {
  		     //mostrar resultados en esta capa
		     divResultado.innerHTML = ajax.responseText;
  		     //llamar a funcion para limpiar los inputs
                    LimpiarCampos();
			                 }
                                                }
	ajax.send(null);        
}
   
//función para limpiar los campos
function LimpiarCampos(){
  document.nuevo_empleado.cedula.value="";  
  document.nuevo_empleado.nombre.value="";
  document.nuevo_empleado.apellido.value="";
  document.nuevo_empleado.area.value="";
  document.nuevo_empleado.cargo.value="";
  document.nuevo_empleado.cedula.focus();
}

function mueveReloj(){
  var fecha = new Date()
  var hora = fecha.getHours()
  var minuto = fecha.getMinutes()
  var segundo = fecha.getSeconds()
  if (hora < 10) {hora = "0" + hora}
  if (minuto < 10) {minuto = "0" + minuto}
  if (segundo < 10) {segundo = "0" + segundo}
  var ahorita = hora + ":" + minuto + ":" + segundo

    document.form_reloj.reloj.value = ahorita
    setTimeout("mueveReloj()",1000) 
}


function BuscarEquipamiento() {
    return false;
}

function listar () {
  alert(estado);
}


var fila = 0;
function pulsar(e) {
  tab = document.getElementById('tabla');
  filas = tab.getElementsByTagName('tr');
  if (e.keyCode==38 && fila>0) num=-1;
   else if(e.keyCode==40 && fila<filas.length-1) num=1;
   else return;
  filas[fila].style.background = 'white';
  fila+=num;
  filas[fila].style.background = 'grey';
 }
/*
$(document).ready(function(){
  $('#tramo').click(function(){
    alert("Bien: " + $('#tramo').text());
    $(this).hide();
  });
});
*/
 

function buscarDato(){
  resul = document.getElementById('resultado');
  bus=document.frmbusqueda.dato.value;
   
  ajax=objetoAjax();
  ajax.open("POST", "busqueda_automatica.php",true);
  ajax.onreadystatechange=function() {
    if (ajax.readyState==4) {
      resul.innerHTML = ajax.responseText
    }
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("busqueda="+bus)
}
