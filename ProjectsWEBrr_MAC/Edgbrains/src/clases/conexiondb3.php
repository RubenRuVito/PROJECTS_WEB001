<table border="1" cellspacing=1 cellpadding=2 style="font-size: 8pt"><tr>
<td><font face="verdana"><b>Codigo Curso</b></font></td>
<td><font face="verdana"><b>Cliente</b></font></td>
<td><font face="verdana"><b>Importe</b></font></td>
<td><font face="verdana"><b>Fecha</b></font></td>
</tr>


<?php
//Crear conexion
$db = new mysqli('edgbrains.com','dioxinet2','do79py8o','edg_dbadmi');
 
//comprobar conexion..
if($db->connect_errno > 0){
    die('Imposible conectar [' . $db->connect_error . ']');
    // Error...No conectado
}else{
    echo "Conectado..";
    // conectado con la bbdd  
}

$sql="SELECT id_curso_solicitado FROM cv_solicitud_curso_verano WHERE id_usuario='290'";

if(!$resultado = $db->query($sql)){
    die('Ocurrio un error ejecutando el query [' . $db->error . ']');
}
echo '<br/>';
echo 'Resultados:';
while($row = $resultado->fetch_assoc()){
    
    // $fila es un arreglo asociativo con todos los campos que se pusieron en el select
    
    //echo '<br/>';
    //echo $row['id_curso_solicitado'] . '<br/>';
    echo "<tr><td width=\"25%\"><font face=\"verdana\">" . $row['id_curso_solicitado'] . "</font></td>";
    
}
$db->close();

?>