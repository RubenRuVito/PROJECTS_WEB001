<?php 
//CREANDO INSTANCIA DE OBJETOS, EJECUTANDO MÉTODOS 
//Y VISUALIZANDO VALORES DE SUS PROPIEDADES.
//include 'vehiculo.php';//Solo Metodos y propiedades de su propia clase
include 'coche.php';//Accede A sus Metodos y propiedades y hereda los dela clase padre
                    //"vehiculo", pudiendo tb acceder a ellos.

$vehiculo1=new vehiculo('negro',20,50);
echo 'Color: ' . $vehiculo1->getColor();
$vehiculo1->cambiarColor('azul');
//$vehiculo1->frenar(); no podriamos accedr a este metodo ya que esta en la subclase
echo '<br>Velocidad: ' . $vehiculo1->getVelocidad();
echo '<br>Color: ' . $vehiculo1->getColor();

$coche1=new coche('verde',25,55);
echo '<br>Velocidad: ' . $coche1->getVelocidad();//podemos acceder al metodo de la clase padre.
echo '<br>Color: ' . $coche1->getColor();// """"
$coche1->acelerar();
$coche1->acelerar();
$coche1->acelerar();
$coche1->cambiarColor('amarillo');//podemos acceder al metodo de la clase padre.
$coche1->frenar();
echo '<br>Velocidad: ' . $coche1->getVelocidad();
echo '<br>Color: ' . $coche1->getColor();
?>