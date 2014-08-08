<html>
<?php
/*Incluimos el fichero de la clase Db*/
require 'conexiondb.class.php';
/*Incluimos el fichero de la clase Conf*/
require 'configuracion.class.php';
 
/*Creamos la instancia del objeto. Ya estamos conectados*/
$bd=conexiondb::getInstance();
 
/*Creamos una query sencilla*/
$sql='SELECT ID_USUARIO,ID_ALUMNO,ID_CURSO_SOLICITADO FROM CV_SOLICITUD_CURSO_VERANO';
 
/*Ejecutamos la query*/
$stmt=$bd-&gt;ejecutar($sql);
 
/*Realizamos un bucle para ir obteniendo los resultados*/
while ($x=$bd-&gt;obtener_fila($stmt,0)){
echo $x['ID_USUARIO,ID_ALUMNO,ID_CURSO_SOLICITADO'].'
';
}
?>
</html>
