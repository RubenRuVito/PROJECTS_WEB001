<?php
require 'funciones.php';

?>
<script type="text/javascript">

 	$(document).ready(function(){ //Sistema Jquery y Ajax para recoger variables trás un evento de un elemento.
  		$("#btnAceptarModal01").click(function(){
  			var funcion = 7;
  			var emailReg = $("#emailRegis").val();
  			var newPas1 = $("#nuevoPass").val();
  			var newPas2 = $("#nuevoPass2").val();

  			//var patronPass = '#^[A-Za-z0-9]{8,20}$#';
  			var patronPass = /[A-Za-z0-9]{8,20}/;

  			//alert ("Email: "+emailReg+" Pas1: "+newPas1+" Pas2: "+newPas2);

  			if(emailReg!=''){
  				if(newPas1!='' && newPas2!=''){
  					if(newPas1 == newPas2){
  						if(patronPass.test(newPas1)){
  							//Aqui va la chicha de AJAX..
  							//alert('todo ok reseteamos la pass enviando la info por AJAX..');
  							$.ajax({ //Funcion ajax para la cual configuramos sus parámetros para indicarle el que,como queremos que realice y donde redireccionar.
                    			type: "post",   
			                    url: "funciones_out3.php",    //Entrada del AJAX,configu de parámetros y donde redireccionar y que valores enviar.
			                    dataType: "html",
			                    data: {funcion: funcion, emailreg: emailReg, pass: newPas1},
			                    success: function(datosTabla){   //Salida del AJAX, lo que "escupe" el archivo al que hemos redireccionado, y
			                        $("#mensajeModal01").html(datosTabla); // le indicamos donde queremos que lo "escupa", indicandole 
			                    },                                      // el "id" del atributo o etiqueta en el que queremos que pinte la Salida.
			                    error: function(){
			                        //alert("Error al cargar datos..");
			                    }

			                });
  						}else{
  							$("#mensajeModal01").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> Las contraseña No cumple el patrón. [de 8 a 15 caracteres, solo letras y números]</div>");
  						}
  					}else{
  						//alert("Passwords insertado diferentes.");
  						$("#mensajeModal01").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> Las contraseñas no coinciden.</div>");
  					}
  				}else{
  					//alert('Campos "e-mail" y "Contraseñas", obligatorios.');
  					$("#mensajeModal01").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> Campos 'contraseñas', obligatorios.</div>");
  				}
  			}else{
  				//alert('Campos "e-mail" obligatorio.');
  				$("#mensajeModal01").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> Campo 'e-mail', obligatorio.</div>");
  			}
  	    });
	});
 	</script>
 	
<?php

cargarCabecera('Crear Cuenta',2);

?>
<script type="text/javascript">

 	$(document).ready(function(){ //Sistema Jquery y Ajax para recoger variables trás un evento de un elemento.
  		$("#btnAceptarModal01").click(function(){
  			var funcion = 7;
  			var emailReg = $("#emailRegis").val();
  			var newPas1 = $("#nuevoPass").val();
  			var newPas2 = $("#nuevoPass2").val();

  			//var patronPass = '#^[A-Za-z0-9]{8,20}$#';
  			var patronPass = /[A-Za-z0-9]{8,20}/;

  			//alert ("Email: "+emailReg+" Pas1: "+newPas1+" Pas2: "+newPas2);

  			if(emailReg!=''){
  				if(newPas1!='' && newPas2!=''){
  					if(newPas1 == newPas2){
  						if(patronPass.test(newPas1)){
  							//Aqui va la chicha de AJAX..
  							//alert('todo ok reseteamos la pass enviando la info por AJAX..');
  							$.ajax({ //Funcion ajax para la cual configuramos sus parámetros para indicarle el que,como queremos que realice y donde redireccionar.
                    			type: "post",   
			                    url: "funciones_out3.php",    //Entrada del AJAX,configu de parámetros y donde redireccionar y que valores enviar.
			                    dataType: "html",
			                    data: {funcion: funcion, emailreg: emailReg, pass: newPas1},
			                    success: function(datosTabla){   //Salida del AJAX, lo que "escupe" el archivo al que hemos redireccionado, y
			                        $("#mensajeModal01").html(datosTabla); // le indicamos donde queremos que lo "escupa", indicandole 
			                    },                                      // el "id" del atributo o etiqueta en el que queremos que pinte la Salida.
			                    error: function(){
			                        //alert("Error al cargar datos..");
			                    }

			                });
  						}else{
  							$("#mensajeModal01").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> Las contraseña No cumple el patrón. [de 8 a 15 caracteres, solo letras y números]</div>");
  						}
  					}else{
  						//alert("Passwords insertado diferentes.");
  						$("#mensajeModal01").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> Las contraseñas no coinciden.</div>");
  					}
  				}else{
  					//alert('Campos "e-mail" y "Contraseñas", obligatorios.');
  					$("#mensajeModal01").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> Campos 'contraseñas', obligatorios.</div>");
  				}
  			}else{
  				//alert('Campos "e-mail" obligatorio.');
  				$("#mensajeModal01").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> Campo 'e-mail', obligatorio.</div>");
  			}
  	    });
	});
 	</script>
 	
<?php

cargarFormRegistro();
if(isset($_GET['mnsr'])){
	switch($_GET['mnsr']){
		case '0a': cargarAlerts('success','','Usuario registrado correctamente,[identificate en la barra de inicio..]'); 
					break;
		case '0b': cargarAlerts('success','','Proceso de registro realizado al 50%, Para finalizar, activa tu cuenta en el email que recibirás en tu bandeja de entrada como SPAM..'); 
					break;
		case '0c': cargarAlerts('success','','Cambio de contraseña satisfactorio,[identificate en la barra de inicio, con su nueva contraseña]');
				break;
		case '1a': cargarAlerts('danger','','Error en Base de Datos(db), inténtelo de nuevo más tarde');
				break;
		case '1b': cargarAlerts('danger','','Hacking!?No grácias!Usuario NO registrado..regístrate hijoPuta!');
				break;
		case '2a': cargarAlerts('warning','','Datos de formulario incorrectos!.[Ayuda: -Las cuentas de correo deben de ser "hotmail","gmail" o "yahoo". -Nombre y Apellidos 1ªletra mayúcula. - Password entre 8 y 15 carácteres.]');
				break;
		case '2b': cargarAlerts('warning','','Las Password introducidas no son idénticas.');
				break;
		case '2c': cargarAlerts('warning','','El Usuario ya esta registrado, o está pendiente de confirmar correo de activacón en su bandeja de entrada.');
				break;
	}
}
cargarPie();
?>