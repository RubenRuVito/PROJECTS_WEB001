<?php
if(!is_dir('ficheros'){//comprueba si existe el fichero..
	mkdir('ficheros');//si no existe lo crea..
}

//Crear un fichero o su puntero o manejador..
$archivo = fopen('C:/xampp/htdocs/ProjectsWEBrr_ATTIC/Practicas/ficheros/config.ini','a');
fwrite($archivo,,"hola\r\n");//escribe en el fichero añadiendo x el final..\r\n->retorno de carro y salto de linea xa win.
fclose($archivo);//cerrar archivo despues de interactuar con el.

$archivo = fopen('C:/xampp/htdocs/ProjectsWEBrr_ATTIC/Practicas/ficheros/config.ini','r');//abrir en solo modo lectura.
while(!foof($archivo)){//leer el archivo hasta el final..con la funcion foof.
	echo nl2br(fgets($archivo));//escribe linea x linea en pantalla y nl2br(convierte los \n en <br>) y fgets(lee x linea).
}
fclose($archivo);

$archivo = fopen('C:/xampp/htdocs/ProjectsWEBrr_ATTIC/Practicas/ficheros/config.ini','r');//abrir en solo modo lectura.
$arrayLinea = array();
while(!foof($archivo)){//leer el archivo hasta el final..con la funcion foof.
	array_push($arrayLinea,trim(fgets($archivo)));//Crea un array con cada linea del fichero y elimina los espacios en blanco(trim) y fgets(lee x linea).
}
array_pop($arrayLinea);//consigue q print_r muestre el ultimo contenido del array.
fclose($archivo);
print_r($arrayLinea);//muestra el contenido del array, excepto el ultimo.
//otra manera de escribirlo x pantalla		
$archivo2 = file_get_contents('C:/xampp/htdocs/ProjectsWEBrr_ATTIC/Practicas/ficheros/config.ini');//recoge todo el archivo sin necesidad de abrirlo antes..
echo nl2br($archivo2);
?>