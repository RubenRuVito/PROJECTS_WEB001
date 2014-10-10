<?php 
require_once 'funciones.php';

if(!isset($_SESSION['id'])){
    switch($_GET['p']){//controlamos la navegación a la hora de mostrar mensajes al usuario en la barra NAVBAR común, en la ventana correspondiente
        case 1: header('location: index.php?mnsl=1a');//En principio Solamente para las paginas en donde no estemos logueados(index y formRegistro..)
                exit();
        case 2: header('location: formRegistro.php?mnsl=1a');
                exit();
    }
}

cargarCabecera('Galobicom - Quiniela GA!',5); // ubi: "funciones_out.php".
$maxelempag = 2;
cargarClasificacionQuiniGa($maxelempag);
cargarPaginacionQunielaGa($maxelempag);

?>
	<div class="row">
		<div class="col-md-6 well" style="border-radius: 10px;">
			<h2 class="text-top text-center" style="font-family: cusrsive; color: black">JueGA! - Realiza tu Quiniela</h2>
			<form class="form-horizontal" role="form" name="form" id="formGuardar" onsubmit="recogerValidarInfoQuiniela()" method="">
                <div class="form-group">
                    <div class="col-sm-10">
                      	<label for="" class="control-label">Jornadas Configuradas [sin Resultados]:</label>
                    </div>
                    <div id="" class="col-sm-8">

<?php generaComboJornadasQuinielaGa(); // ubi: "funciones_out.php"?>
                                    
                    </div>
                </div>

<script type="text/javascript">

var QuiniParti01;  //código xa recoger los valores seleccionados en cada grupo de 3 radiobuttons.
var QuiniParti02;
var QuiniParti03;
function valorQuiniPartido01(valor){
    QuiniParti01 = valor.value;
}
function valorQuiniPartido02(valor){
    QuiniParti02 = valor.value;  
}
function valorQuiniPartido03(valor){
    QuiniParti03 = valor.value;
}
//...AÑADIR TANTAS FUNCIONES COMO PARTIDOS POR JORNADA,Y RECOGER ASI EL VALOR DE LA QUINIELA DE CADA PARTIDO.

 
 $(document).ready(function(){ //Sistema Jquery y Ajax para recoger variables trás un evento de un elemento.
  $("#combJorQuini").change(function(){   
            
            var funJor = 0; //opción que le vamos a pasar al archivo php para saber q función realizar.
            var valJor = $("#combJorQuini").val(); //value del elemento select seleccionado, el cual enviaremos al archivo php.
            //alert(funcionJor);
            //alert(valJor);
            if(valJor!=''){ //si selecciona el value=0("Elige Jornada") no haga nada y le saque un mns al user.
                $.ajax({ //Funcion ajax para la cual configuramos sus parámetros para indicarle el que,como queremos que realice y donde redireccionar.
                    type: "post",   
                    url: "funciones_out3.php",    //Entrada del AJAX,configu de parámetros y donde redireccionar y que valores enviar.
                    dataType: "html",
                    data: {funcion: funJor, value: valJor},
                    success: function(datosTabla){   //Salida del AJAX, lo que "escupe" el archivo al que hemos redireccionado, y
                        $("#tablaQuiniJor").html(datosTabla); // le indicamos donde queremos que lo "escupa", indicandole 
                    },                                      // el "id" del atributo o etiqueta en el que queremos que pinte la Salida.
                    error: function(){
                        alert("Error al cargar datos..");
                    }
                });
            }
  });

 $("#combQuiniHecha").change(function(){
        var funJor = 2;
        var valJor = $("#combQuiniHecha").val();
        alert(valJor);
        if(valJor!=''){ //si selecciona el value=0("Elige Jornada") no haga nada y le saque un mns al user.
                $.ajax({ //Funcion ajax para la cual configuramos sus parámetros para indicarle el que,como queremos que realice y donde redireccionar.
                    type: "post",   
                    url: "funciones_out3.php",    //Entrada del AJAX,configu de parámetros y donde redireccionar y que valores enviar.
                    dataType: "html",
                    data: {funcion: funJor, value: valJor},
                    success: function(datosTabla){   //Salida del AJAX, lo que "escupe" el archivo al que hemos redireccionado, y
                        $("#divMisQuinielas").html(datosTabla); // le indicamos donde queremos que lo "escupa", indicandole 
                    },                                      // el "id" del atributo o etiqueta en el que queremos que pinte la Salida.
                    error: function(){
                        alert("Error al cargar datos..");
                    }
                });
            }

 });
});

function recogerValidarInfoQuiniela(){

            var funPost = 1;
            var valJor = $("#combJorQuini").val();
            var idPrimerPartiTabla = $("#idPart").text(); // consigo traer el id del primer partido,los siguientes son consecutivos(siempre..en principio SI!)
            var idJug01 = $("#jugador01").val();
            var idJug02 = $("#jugador02").val();
            var idJug03 = $("#jugador03").val();

            alert(funPost);
            alert(idPrimerPartiTabla);
            alert('ValJor: '+valJor+'RAdio1: '+QuiniParti01+' Radio2: '+QuiniParti02+' Radio3: '+QuiniParti03+' IdJuga01: '+idJug01+' IdJuga02: '+idJug02+' IdJuga03: '+idJug03);
            
            $.ajax({
                    type: "post",
                    url: "funciones_out3.php",
                    dataType: "html",
                    data: {funcion: funPost, numJor: valJor, idPartPrimer: idPrimerPartiTabla, idJug01: idJug01, idJug02: idJug02, idJug03: idJug03
                            , Qpart01: QuiniParti01, Qpart02: QuiniParti02, Qpart03: QuiniParti03},
                    success: function(mensaje){
                        $("#mensajeValida").html(mensaje);
                        
                    },
                    error: function(){
                        alert("Error AJAX, al retornar datos..");
                    }
                });

 }
</script>
                <div class="form-group">
                    <!-- AQUÍ PINTARA EL FORMULARIO CON LOS PARTIDOS QUE SE JUEGAN EN LA JORNADA SELECCIONADA Y COMBO QUINIELA,
                    POSIBILIDAD DE AÑADIR COMBO CON LOS NOMBRES DE LOS JUGADORES Y ELEGIR 3 POSIBLES MARCADORES CON SU PUNTUACION --> 
                    
                    <table id="" class="table table-responsive table-striped table-bordered table-hover" style="" border="" width="">
                   <!-- <table class="table table-responsive table-striped table-bordered"> -->
                        <thead>    
                         <tr>
                            <th class="text-center">Id.Partido</th>
                            <th class="text-center">Jornada</th>
                            <th class="text-center">Equipo Local</th>
                            <th class="text-center">Equipo Visit.</th>
                            <th class="text-center">1-X-2</th>
                            
                         </tr>
                        </thead> 
                        <tbody id="tablaQuiniJor">  
                        
                        </tbody>
                    </table>
                  </div>
                  <div class="col-md-6 form-group">
                        <label for="" class="">Elige Tus posibles Goleadores:</label>
                                    <select id="jugador01" class="form-control" required> <!-- Select dinámico, x jquery -->
 <?php cargarCombosJugadoresQuiniRG(); ?>                                       
                                    </select>
                                    <br>
                                    <select id="jugador02" class="form-control" required> <!-- Select dinámico, x jquery -->
<?php cargarCombosJugadoresQuiniRG(); ?> 
                                    </select>
                                    <br>
                                    <select id="jugador03" class="form-control" required> <!-- Select dinámico, x jquery -->
<?php cargarCombosJugadoresQuiniRG(); ?> 
                                    </select>
                                    <br>
                    <div class="row col-sm-3">
                        <button type="submit" id="btnGuardarQuini" class="btn btn-info">Aceptar</button>
                    </div>
                                    
                 </div>
                </form>

                 <div class="col-sm-6">
                    <br>
                        <table id="" class="table table-striped table-bordered table-hover" style="" border="" width="">
                   <!-- <table class="table table-responsive table-striped table-bordered"> -->
                        <thead>    
                         <tr>
                            <th class="text-center">1-X-2</th>
                            <th class="text-center">10 Puntos</th>               
                         </tr>
                        </thead>
                        <tbody id="tablaPuntos1"> 
                         <tr> 
                            
                         </tr>  
                        </tbody>
                    </table>
                         <table id="" class="table table-striped table-bordered table-hover table-small" style="" border="" width="">
                   <!-- <table class="table table-responsive table-striped table-bordered"> -->
                        <thead>    
                         <tr>
                            <th class="text-center">Posición:</th>
                            <th class="text-center">Puntuación:</th>    
                         </tr>
                        </thead>
                        <tbody id="tablaPuntos2"> 
                         <tr> 
                            <td class="text-center">POT</td>
                            <td class="text-center">50</td>
                        </tr> 
                        <tr> 
                            <td class="text-center">DEF</td>
                            <td class="text-center">8</td>
                        </tr> 
                        <tr> 
                            <td class="text-center">CNT</td>
                            <td class="text-center">5</td>
                        </tr> 
                        <tr> 
                            <td class="text-center">DEL</td>
                            <td class="text-center">3</td>
                        </tr>
                        </tbody>
                    </table>
                 </div>
                
                 <div class="row col-md-12 fom-group"> <!--Explicacion de como funciona la quiniela puntuaciones x acertar y todo eso..-->   
                    <p><strong>Instrucciones:</strong> Una quiniela sencillita e intuitiva, que podreis hacer solo una vez para las
                    Jornadas futuras, que se hayan configurado y esten habilitadas; como veis tiene un plus o añadido, pujar por los tres 
                    posibles Killers o goleadores del equipo, hay varias posiblilidades y perputaciones, ya que puedes elegir diferentes jugadores o apostar por el mismo, e aquí
                    donde entra en juego la estrategía, ya que si eliges, por ejemplo, a un mismo goleador en las tres casillas, y este marcará,
                    tu puntuación sería triple, más los aciertos en la quiniela tradicional. Despues de destriparos las oscuras y complicadisimas 
                    entrañas de este miniComunio, que es muy GA!, solo falta que os fijeis en las tablas de puntuaciones,y hagais vuestra apuesta
                    perfecta, suerte..<p>
                 </div>   
                  <div class="row col-sm-12">
                    <div id="mensajeValida" >
                           <p>dsaaaaaaaaaaaaaafffffffffansdfknadsñfnñasdfñasdngadksñgn</p>          
                    </div>
                 </div>
            	
            
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-5 well" style="border-radius: 10px;">
           <div class="form">
            <div class="col-md-12 form-group">
    			<h2 class="text-top text-center" style="font-family: cusrsive; color: black">Ver mis Quinielas</h2>
            </div>
            <div class="col-md-8 form-group">
<?php generarComboQuinielasHechas() ?>
            </div>
              
            <div class="row form-group" id="divMisQuinielas">
                
               <!-- <table id="" class="table table-striped table-bordered table-hover" style="" border="" width="">
                  
                         <tr>
                            <th class="text-center">Local:</th>
                            <th class="text-center">Visitante:</th>
                            <th class="text-center">1-X-2</th>
                         </tr>
                        </thead> 
                        <tbody id="misQuinielas">  
                        
                        </tbody>
                    </table> -->
            </div>

         </div>
	  </div>
	</div>

<?php
cargarPie();
?>