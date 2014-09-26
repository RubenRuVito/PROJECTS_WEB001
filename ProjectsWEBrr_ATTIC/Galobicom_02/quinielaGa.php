<?php 
require_once 'funciones.php';

cargarCabecera('Galobicom - Quiniela GA!',5); // ubi: "funciones_out.php".
cargarClasificacionQuiniGa();

?>
	<div class="row">
		<div class="col-md-6 well" style="border-radius: 10px;">
			<h2 class="text-top text-center" style="font-family: cusrsive; color: black">JueGA! - Realiza tu Quiniela</h2>
			<form class="form-horizontal" role="form" name="form" id="formGuardar" onsubmit="recogerValidarInfoPartido()" method="">
                <div class="form-group">
                    <div class="col-sm-10">
                      	<label for="" class="control-label">Jornadas Configuradas [sin Resultados]:</label>
                    </div>
                    <div id="" class="col-sm-6">

<?php generaComboJornadasQuinielaGa(); // ubi: "funciones_out.php"?>
                                    
                    </div>
                </div>
            	<div class="form-group">
            		<!-- AQUÍ PINTARA EL FORMULARIO CON LOS PARTIDOS QUE SE JUEGAN EN LA JORNADA SELECCIONADA Y COMBO QUINIELA,
            		POSIBILIDAD DE AÑADIR COMBO CON LOS NOMBRES DE LOS JUGADORES Y ELEGIR 3 POSIBLES MARCADORES CON SU PUNTUACION --> 

<script type="text/javascript">
 
 $(document).ready(function(){ //Sistema Jquery y Ajax para recoger variables trás un evento de un elemento.
  $("#combJorQuini").change(function(){   
            
            var funJor = 0; //opción que le vamos a pasar al archivo php para saber q función realizar.
            var valJor = $("#combJorQuini").val(); //value del elemento select seleccionado, el cual enviaremos al archivo php.
            //alert(funcionJor);
            alert(valJor);
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
 });
</script>

                    
                    <table id="" class="table table-striped table-bordered table-hover" style="" border="" width="">
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
                  <div class="form-group">
                        <label for="" class="">Elige Tus posibles Goleadores:</label>
                                    <select id="jugador1" class="form-control" disabled> <!-- Select dinámico, x jquery -->
                                        <option value=''>Selecciona Jugador1</option>
                                    </select>
                                    <select id="jugador2" class="form-control" disabled> <!-- Select dinámico, x jquery -->
                                        <option value=''>Selecciona Jugador2</option>
                                    </select>
                                    <select id="jugador3" class="form-control" disabled> <!-- Select dinámico, x jquery -->
                                        <option value=''>Selecciona Jugador3</option>
                                    </select>
                        <div class="col-sm-3">
                        	<button type="submit" id="btnGuardarQuini" class="btn btn-info">Aceptar</button>
                        </div>
                        <div id="mensajeValida" class="col-sm-9">
                                    
                        </div>
                  </div>

            	
            </form>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-5 well" style="border-radius: 10px;">
			<h2 class="text-top text-center" style="font-family: cusrsive; color: black">Ver mis Quinielas</h2>
		</div>
	</div>

<?php
cargarPie();
?>