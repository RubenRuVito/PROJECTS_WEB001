<?php
//Pagina comun para cada usuario, el index de los galobicos
require_once 'funciones.php';
//session_start();
// con el error 2.
if(!isset($_SESSION['id'])){
    switch($_GET['p']){//controlamos la navegación a la hora de mostrar mensajes al usuario en la barra NAVBAR común.
        case 1: header('location: index.php?mnsl=1a');
	            exit();
		   break;
        case 2: header('location: formRegistro.php?mnsl=1a');
                exit();
		break;
        case 3: header('location: index.php?mnsl=1a');
                exit();
		break;
        case 4: header('location: index.php?mnsl=1a');
                exit();
		break;
        case 5: header('location: index.php?mnsl=1a');
                exit();
		break;
	case '' || null: header('location: index.php');
                exit();
		break;

    }
}
//echo 'Hola!' . $_SESSION['nom'] . ' ' . $_SESSION['ape'] . '.';
cargarCabecera('Real Galobo C.F.',4);
?>
   <br><br>		
   <div class="container-left"> 
            
                <div class="well" style="background: #A00303;">
                    <h1 class="text-center" style="color: black; font-size: 720%; font-family: Cursive;"><img data-src="holder.js/300x300" src="imgruvio/escudoRGrr02.jpg"><strong>Real Galobo C.F.</strong><img data-src="holder.js/10x10" src="imgruvio/escudoRGrr02.jpg"></h1>
                </div>
                <script type="text/javascript">
                    //document.writeln("<p>"+screen.width+" x "+screen.height+"</p>");// Resolución del Navegador y personalizamos el Canvas.
                    //document.writeln("<canvas class='row container' id='theMatrix' width="+screen.width+" height='+200+'></canvas>");
                </script>
            
            <!-- Blog Post Content Column -->
            <div id="TablonNoti" class="col-md-4 well">

<?php 
$maxelempag = 1; //Número de elementos por pagina, POR EL MOMENTO FALLA CON MAS DE 2, A LA HORA DE GUARDAR LOS COMENTARIOS EN LA NOTICIA CORRECTA.
cargarNoticiasRG($maxelempag); //carga las noticias posteadas, y sus mensajes relacionados.
cargarPaginacionNotiRG($maxelempag);
?>
<script type="text/javascript">

$(document).ready(function(){
 $("#btnFormMens").click(function(){

            var funPost = 3; //Función en "funciones_out2.php" para guardar el comment realizado en una noticia en concreto.
            var texcom = $("#textComent").val(); // recoge el valor del contenido de la etiqueta o elemento referenciado x su id.
            var idNoti = $("#divComment").attr("value"); //CAda form para incluir un comentario tiene en su "value" el id de la noticia que se esta comentando.          
                                      //*** recoger valor del atributo de un elemento html.  

            if(texcom != ""){
                $.ajax({
                    type: "post",
                    url: "funciones_out2.php",
                    data: {funcion: funPost, comentario: texcom, idNoticia: idNoti},
                    success: function(mensaje){
                        $("#alertMens").html(mensaje);
                    },
                    error: function(){
                        //alert("Error al retornar datos..");
                    }
                });
                setTimeout(function(){ window.location = "realGalobo.php?npag=<?php $npag=1; if(isset($_GET['npag'])){ echo $_GET['npag'];}else{ echo $npag; } ?>"}, 5000);
            }else{
                var mensComeVacio = "<div class='alert-sm alert-warning alert-dismissible' role='alert'>";
                    mensComeVacio += "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>";
                    mensComeVacio += "<strong>Atención!</strong>Comentario Vacio!..No seas vag@ ti@!.</div>";
                                    
                $("#alertMens").html(mensComeVacio);
            }
  });
 });
</script>

            </div>

            <div class="col-md-6 well">
                <div class="table-responsive well">
                    <label for="" class="control-label">Clasificación:</label>
                    <table class="table table-striped table-bordered table-hover" style="" border="" width="">
                   <!-- <table class="table table-responsive table-striped table-bordered"> -->
                        <thead>
                            <tr>
                                <th class="text-center">Pos:</th>
                                <th class="text-center">Equipo:</th>
                                <th class="text-center">Puntos:</th>
                                <th class="text-center">PJ:</th>
                                <th class="text-center">PG:</th>
                                <th class="text-center">PE:</th>
                                <th class="text-center">PP:</th>
                                <th class="text-center">GF:</th>
                                <th class="text-center">GC:</th>
                            </tr>
                        </thead>
                        <tbody>

<?php cargarTablaClasificacion(); ?>                    

                        </tbody>
                    </table>
                </div>

           <!-- <div class="table-responsive well"> -->
                <div class="table-responsive well">
                    <label for="" class="control-label">Resultados y próximos encuentros por jornadas:</label>

<?php generaComboJornadas(); ?>  

<script type="text/javascript">
 
 $(document).ready(function(){ //Sistema Jquery y Ajax para recoger variables trás un evento de un elemento.
  $("#combJornadas").change(function(){   
            
            var funJor = 0; //opción que le vamos a pasar al archivo php para saber q función realizar.
            var valJor = $("#combJornadas").val(); //value del elemento select seleccionado, el cual enviaremos al archivo php.
        
            if(valJor!=''){ //si selecciona el value=0("Elige Jornada") no haga nada y le saque un mns al user.
                $.ajax({ //Funcion ajax para la cual configuramos sus parámetros para indicarle el que,como queremos que realice y donde redireccionar.
                    type: "post",   
                    url: "funciones_out2.php",    //Entrada del AJAX,configu de parámetros y donde redireccionar y que valores enviar.
                    dataType: "html",
                    data: {funcion: funJor, value: valJor},
                    success: function(datosTabla){   //Salida del AJAX, lo que "escupe" el archivo al que hemos redireccionado, y
                        $("#tablaResultadosJor").html(datosTabla); // le indicamos donde queremos que lo "escupa", indicandole 
                    },                                      // el "id" del atributo o etiqueta en el que queremos que pinte la Salida.
                    error: function(){
                        //alert("Error al cargar datos..");
                    }
                });
            }
  });
 });
</script>

                    <br>
                    <table id="" class="table table-striped table-bordered table-hover" style="" border="" width="">
                   <!-- <table class="table table-responsive table-striped table-bordered"> -->
                        <thead>    
                         <tr>
                            <th class="text-center">Jornada</th>
                            <th class="text-center">Equipo Local</th>
                            <th class="text-center">Equipo Visit.</th>
                            <th class="text-center">Resultado</th>
                            <th class="text-center">Fecha y Hora</th>
                            <th class="text-center">Terreno de Juego</th>
                         </tr>
                        </thead> 
                        <tbody id="tablaResultadosJor">  
                        
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive well">
                    <label for="" class="control-label">Resultados por Equipos:</label>

<?php  generaComboEquipos(); ?>

<script type="text/javascript">
 
 $(document).ready(function(){ //Sistema Jquery y Ajax para recoger variables trás un evento de un atributo.
 $("#combEquipos01").change(function(){   
            
            var funEqui = 1; //opción que le vamos a pasar al archivo php para indicarle q función realizar.
            var valEqui = $("#combEquipos01").val(); //value del elemento select seleccionado, el cual enviaremos al archivo php.
            
            if(valEqui!=''){ //si selecciona el value=0("Elige Jornada") no haga nada y le saque un mns al user.
                $.ajax({ //Funcion ajax para la cual configuramos sus parámetros para indicarle el que,como queremos que realice y donde redireccionar.
                    type: "post",   
                    url: "funciones_out2.php",    //Entrada del AJAX,configu de parámetros y donde redireccionar y que valores enviar.
                    dataType: "html",
                    data: {funcion: funEqui, value: valEqui},
                    success: function(datosTabla){   //Salida del AJAX, lo que "escupe" el archivo al que hemos redireccionado, y
                        $("#tablaResultadosEqui").html(datosTabla); // le indicamos donde queremos que lo "escupa", indicandole 
                    },                                      // el "id" del atributo o etiqueta en el que queremos que pinte la Salida.
                    error: function(){
                        //alert("Error al cargar datos..");
                    }
                });
            }
 });

$("#btnFormNoti").click(function(){

            var funPost = 2;
            var tit = $("#titulo").val();
            var cont = $("#contenido").val();
            var limg = $("#linkimg").val();
            var lenla = $("#linkEnla").val();

            if(tit != "" && cont != ""){
                $.ajax({
                    type: "post",
                    url: "funciones_out2.php",
                    data: {funcion: funPost, titulo: tit, contenido: cont, linkimg: limg, linkEnla: lenla},
                    success: function(mensaje){
                        $("#alertNoti").html(mensaje);
                        
                    },
                    error: function(){
                        //alert("Error AJAX, al retornar datos..");
                    }
                });
                setTimeout(function(){ window.location = "realGalobo.php"}, 5000); //Posteas una Noticia recarga la pagina, y aparece tu noticia.
            }else{
                var mensCampOblig = "<br><div class='alert alert-warning alert-dismissible' role='alert'>";
                    mensCampOblig += "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>";
                    mensCampOblig += "<strong>Atención!</strong> Título y noticia son campos obligatorios.</div>";
                                    
                $("#alertNoti").html(mensCampOblig);
            }
 });
 });
</script>
                    
                    <br>
                    <table class="table table-striped table-bordered table-hover" style="" border="" width="">
                   <!-- <table class="table table-responsive table-striped table-bordered"> -->
                        <thead>
                         <tr>
                            <th class="text-center">Jornada</th>
                            <th class="text-center">Equipo Local</th>
                            <th class="text-center">Equipo Visit.</th>
                            <th class="text-center">Resultado</th>
                         </tr>
                        </thead>
                        <tbody id="tablaResultadosEqui">
                        
                        </tbody>
                    </table>
                </div>



<script type="text/javascript">

$(document).ready(function(){ //Sistema Jquery y Ajax para recoger variables trás un evento de un atributo.
    var codigoHtmlPintarA = "<label for='' class=''>Goles equipo Local:</label>";
        codigoHtmlPintarA += "<select id='golA' class='form-control' disabled>";
        codigoHtmlPintarA += "<option value=''>Selecciona número de goles</option>";
        codigoHtmlPintarA += "</select>";
    var codigoHtmlPintarB = "<label for='' class=''>Goles equipo Visitante:</label>";
        codigoHtmlPintarB += "<select id='golB' class='form-control' disabled>";
        codigoHtmlPintarB += "<option value=''>Selecciona número de goles</option>";
        codigoHtmlPintarB += "</select>";

    var codigoHtmlPaintDisableJugadoresComb = "<label for='' class=''>Jugador con MOJO:</label>";
        codigoHtmlPaintDisableJugadoresComb += "<select id='selJugadores' class='form-control' disabled>";
        codigoHtmlPaintDisableJugadoresComb += "<option value=''>Selecciona al jugador que ha mojado</option>";
        codigoHtmlPaintDisableJugadoresComb += "</select>";

    var codigoHtmlPintarGolJugador = "<label for='' class=''>Número de goles:</label><select id='golJugador' class='form-control' required>";
        codigoHtmlPintarGolJugador += "<option value=''>Selecciona número de goles.</option><option value='1'>1</option><option value='2'>2</option>";
        codigoHtmlPintarGolJugador += "<option value='3'>3</option><option value='4'>4</option><option value='5'>5</option>";
        codigoHtmlPintarGolJugador += "<option value='6'>6</option><option value='7'>7</option><option value='8'>8</option>";
        codigoHtmlPintarGolJugador += "<option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='18'>18</option><option value='21'>21</option>";
        codigoHtmlPintarGolJugador += "</select>";
    var codigoHtmlPintarGolJugadorKO = "<label for='' class=''>Número de goles:</label><select id='golJugador' class='form-control' disabled>";
        codigoHtmlPintarGolJugadorKO += "<option value=''>Selecciona número de goles.</option>";
        codigoHtmlPintarGolJugadorKO += "</select>";

    var pintarSelNumJugGolOK = "<label for='' class=''>Cuantos Jugadores diferentes han Marcado:</label>";
        pintarSelNumJugGolOK += "<select id='selNumJugadoresGol' class='form-control' required>";
        pintarSelNumJugGolOK += "<option value=''>Selecciona cuantos jugadores han marcado gol:</option>";
        pintarSelNumJugGolOK += "<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option>";
        pintarSelNumJugGolOK += "<option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option>";
        pintarSelNumJugGolOK += "</select>";
    var pintarSelNumJugGolKO = "<label for='' class=''>Cuantos Jugadores diferentes han Marcado:</label>";
        pintarSelNumJugGolKO += "<select id='selNumJugadoresGol' class='form-control' disabled>";
        pintarSelNumJugGolKO += "<option value=''>Selecciona cuantos jugadores han marcado gol:</option>";
        pintarSelNumJugGolKO += "<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option>";
        pintarSelNumJugGolKO += "<option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option>";
        pintarSelNumJugGolKO += "</select>"; 

    var pintarDivJugadoresGolKO = "";
    var pintarDivCamposBoadiOK = "<select id='selCamposBoa' class='form-control' required>";
        	  pintarDivCamposBoadiOK += "<option value=''>Selecciona el terreno de juego:</option>";
          pintarDivCamposBoadiOK += "<option value='1'>CD FÚTBOL 7</option>";
          pintarDivCamposBoadiOK += "<option value='2'>FÚTBOL 7 1-A</option>";
	  pintarDivCamposBoadiOK += "<option value='3'>FÚTBOL 7 1-B</option>";
          pintarDivCamposBoadiOK += "</select>";
    var pintarDivCamposBoadiKO = "<label for='' class='' style='font-family: cursive;'>Puedes consultarlo en la sección (Resultados y próximos encuentros por jornadas)..o_O</label>";

 $("#combJorGuardar").change(function(){
        var fun = 4;
        var valJorGuar = $("#combJorGuardar").val();
       
        if(valJorGuar!=''){
            $.ajax({
                type: "post",
                datatype: "html",
                url: "funciones_out2.php",
                data: {valueJor: valJorGuar, funcion: fun},
                success: function(datosComboA){
                    $("#combEquiAguar").html(datosComboA);
                    $("#combEquiBguar").html(""); //Vaciar el 3combo "equipo B", ya q es dependiente del 2ºcombo y este del 1ºcombo.
                    $("#divGolA").html(codigoHtmlPintarA);
                    $("#divGolB").html(codigoHtmlPintarB);
                    $("#divNumJugadoresGol").html(pintarSelNumJugGolKO);
                    $("#divFormGroupNumJugol").html(pintarDivJugadoresGolKO);
                },
                error: function(){
                    //alert("Error AJAX, al retornar datos..");
                }
            });
        }else{
            $("#combEquiAguar").html("");
            $("#combEquiBguar").html("");
            $("#divGolA").html(codigoHtmlPintarA);
            $("#divGolB").html(codigoHtmlPintarB);
            $("#quiniela").html("<h2> 1-X-2</h2>");
            $("#divNumJugadoresGol").html(pintarSelNumJugGolKO);
            $("#divFormGroupNumJugol").html(pintarDivJugadoresGolKO);
        }
 });

 $("#combEquiAguar").change(function(){
        var fun = 5;
        var valEquiAguar = $("#combEquiAguar").val();
        var valJorGuar = $("#combJorGuardar").val();
        if(valEquiAguar!=''){
            $.ajax({
                type: "post",
                datatype: "html",
                url: "funciones_out2.php",
                data: {value: valEquiAguar, valueJor: valJorGuar, funcion: fun},
                 success: function(datosComboB){
                    $("#combEquiBguar").html(datosComboB);
                    $("#divGolA").html(codigoHtmlPintarA);
                    $("#divGolB").html(codigoHtmlPintarB);
                    $("#divNumJugadoresGol").html(pintarSelNumJugGolKO);
                    $("#divFormGroupNumJugol").html(pintarDivJugadoresGolKO);
                },
                error: function(){
                    //alert("Error AJAX, al retornar datos..");
                }
            });
        }else{
            $("#combEquiBguar").html("");
            $("#divGolA").html(codigoHtmlPintarA);
            $("#divGolB").html(codigoHtmlPintarB);
            $("#quiniela").html("<h2> 1-X-2</h2>");
            $("#divNumJugadoresGol").html(pintarSelNumJugGolKO);
            $("#divFormGroupNumJugol").html(pintarDivJugadoresGolKO);
            
        }
 });

 $("#combEquiBguar").change(function(){
        
        var idEquiB = $("#combEquiBguar").val();
        var idEquiA = $("#combEquiAguar").val();
        var numJortext = $("#combJorGuardar option:selected").text(); //recuperas el texto del option seleccionado.
        
        if(idEquiB != '' && numJortext.indexOf('Configurar') == -1){ // queremos q se vaya al else si contiene la cadena "Configurar" (Configurar siguiente...).
            var codigoHtmlPintarOKA = "<label for='' class=''>Goles equipo Local:</label><select id='golA' class='form-control' required>";
                codigoHtmlPintarOKA += "<option value=''>Selecciona número de goles.</option><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option>";
                codigoHtmlPintarOKA += "<option value='3'>3</option><option value='4'>4</option><option value='5'>5</option>";
                codigoHtmlPintarOKA += "<option value='6'>6</option><option value='7'>7</option><option value='8'>8</option>";
                codigoHtmlPintarOKA += "<option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='18'>18</option><option value='21'>21</option>";
                codigoHtmlPintarOKA += "</select>";
            var codigoHtmlPintarOKB = "<label for='' class=''>Goles equipo Visitante:</label><select id='golB' class='form-control' required>";
                codigoHtmlPintarOKB += "<option value=''>Selecciona número de goles.</option><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option>";
                codigoHtmlPintarOKB += "<option value='3'>3</option><option value='4'>4</option><option value='5'>5</option>";
                codigoHtmlPintarOKB += "<option value='6'>6</option><option value='7'>7</option><option value='8'>8</option>";
                codigoHtmlPintarOKB += "<option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='18'>18</option><option value='21'>21</option>";
                codigoHtmlPintarOKB += "</select>";       
            $("#divGolA").html(codigoHtmlPintarOKA);
            $("#divGolB").html(codigoHtmlPintarOKB);
            $("#divNumJugadoresGol").html(pintarSelNumJugGolKO);
            $("#divFormGroupNumJugol").html(pintarDivJugadoresGolKO);
            $("#divCamposBoa").html(pintarDivCamposBoadiKO);
        }else{
            $("#divGolA").html(codigoHtmlPintarA);
            $("#divGolB").html(codigoHtmlPintarB);
            $("#quiniela").html("<h2> 1-X-2</h2>");
            $("#divNumJugadoresGol").html(pintarSelNumJugGolKO);
            $("#divFormGroupNumJugol").html(pintarDivJugadoresGolKO);
        }
        var funcion = 6;
        $.ajax({
            type: "post",
            datatype: "html",
            url: "funciones_out2.php",
            data: {idB: idEquiB, idA: idEquiA, funcion: funcion},
            success: function(datosFechaHora){
                $("#divFecHora").html(datosFechaHora);
            },
            error: function(){
                 //alert("Error AJAX, al retornar datos..");
            }
        });

 });

 $("#divGolA").change(function(){      //Hacer calculo para que aparezca el valos de la quiniela 1,x,2.
        var idEquiA = $("#combEquiAguar").val();
        var idEquiB = $("#combEquiBguar").val();
        var a = $("#golA").val();
        var b = $("#golB").val();
        if(a!='' && b!=''){
            if(a==b){
                $("#quiniela").html("<h2>  [X]</h2>");
            }else if(a<b){
                $("#quiniela").html("<h2>  [2]</h2>");
            }else{
                $("#quiniela").html("<h2>  [1]</h2>");
            }
        }
        if(a!='' && a!=0 && idEquiA==1 ){ //id del Real galobo en la tabla equipos. 
            var funcion = 8; //CArgamos el div de goleadores con los nombres de los jugadores en un select + un campo num goles..
            
            $("#divNumJugadoresGol").html(pintarSelNumJugGolOK);
            $("#divFormGroupNumJugol").html(pintarDivJugadoresGolKO);
        }else if(idEquiB!=1){
            $("#divNumJugadoresGol").html(pintarSelNumJugGolKO);
            $("#divFormGroupNumJugol").html(pintarDivJugadoresGolKO);
        }

 });

 $("#divGolB").change(function(){ //Hacer calculo para que aparezca el valos de la quiniela 1,x,2.
        var idEquiA = $("#combEquiAguar").val();
        var idEquiB = $("#combEquiBguar").val();
        var a = $("#golA").val();
        var b = $("#golB").val();
        if(a!='' && b!=''){
            if(a==b){
                $("#quiniela").html("<h2>  [X]</h2>");
            }else if(a<b){
                $("#quiniela").html("<h2>  [2]</h2>");
            }else{
                $("#quiniela").html("<h2>  [1]</h2>");
            }
        }
        if(b!='' && b!=0 && idEquiB==1 ){ //id del Real galobo en la tabla equipos. 
            var funcion = 8; //CArgamos el div de goleadores con los nombres de los jugadores en un select + un campo num goles..
              
            $("#divNumJugadoresGol").html(pintarSelNumJugGolOK);
            $("#divFormGroupNumJugol").html(pintarDivJugadoresGolKO);
        }else if(idEquiA!=1){
            $("#divNumJugadoresGol").html(pintarSelNumJugGolKO);
            $("#divFormGroupNumJugol").html(pintarDivJugadoresGolKO);
        }
        
 });

 $("#divNumJugadoresGol").change(function(){
        var funcion = 8;
        var numJugaGol = $("#selNumJugadoresGol").val();

        if(numJugaGol!=''){
            $.ajax({
                    type: "post",
                    datatype: "html",
                    url: "funciones_out2.php",
                    data: {funcion: funcion, numJuGol: numJugaGol},
                    success: function(datosJugadoresGol){
                          $("#divFormGroupNumJugol").html(datosJugadoresGol);
                    },
                    error: function(){
                        //alert("Error AJAX, al retornar datos..");
                    }
                });
        }else{
            $("#divFormGroupNumJugol").html(pintarDivJugadoresGolKO);
        }

 });

 $("#selJorGoleadores").change(function(){ //hacer funcion en archivo php para guardar
        var funcion = 9;
        var numJor = $("#selJorGoleadores").val();
        $.ajax({
                    type: "post",
                    datatype: "html",
                    url: "funciones_out2.php",
                    data: {funcion: funcion, numJor: numJor},
                    success: function(datosJugadoresGolJor){
                          $("#goleadoresJor").html(datosJugadoresGolJor);
                    },
                    error: function(){
                        //alert("Error AJAX, al retornar datos..");
                    }
                });
 });

 $("#btnGuardarRes").click(function(){ 
    var funcion = 7;
    var numJor = $("#combJorGuardar").val();
    var numJortext = $("#combJorGuardar option:selected").text(); //recuperas el texto del option seleccionado.
    var numJorLast = $("#combJorGuardar option:last").val(); //recuperas el texto del ultimo option del select
    var idEquiA = $("#combEquiAguar").val();
    var idEquiB = $("#combEquiBguar").val();
    var golA = $("#golA").val();
    var golB = $("#golB").val();
    var jsonidJugadoresGol = JSON.encode(idJugadoresGol); //Array de id de jugadores que han marcado gol.codificado para
    var jsongoles = JSON.encode(goles);                 // poder ser enviado por ajax.

    var fecHora = $("#fechorapart").val(); // fecha recuperada del datetime-local de html5, con formato "yyyy-mm-ddThh:mm"
    var campo = $("#selCamposBoa").val();
    
    var fha = new Date();
    var dia = fha.getDate().toString();
    if(dia.length == 1){ dia='0'+dia;}
    var mes = (fha.getMonth())+1;// 1º al mes le sumamos 1 xq cero es "Enero". y lo Convirtiendo la fecha del sistema o actual en String para
    if(mes.toString().length == 1){ mes='0'+mes;} // poder compararla con la fecha recuperada del datetime-local de html5.

    var fecHoraActual = fha.getFullYear().toString()+"-"+mes+"-"+dia+"T"+fha.getHours().toString()+":"+fha.getMinutes().toString();
    
   // alert("Jornada: "+numJor+"-"+numJortext+"-"+numJorLast+" idA: "+idEquiA+" idB: "+idEquiB+" GolA: "+golA+" GolB: "+golB);
   // alert("fecha y Hora: "+fecHora+" Campo: "+campo);

    if(numJor!='' && numJor!=null && idEquiA!='' && idEquiB!='' && idEquiA!=null && idEquiB!=null){
        if(numJortext.indexOf('Configurar')!= -1){ //significa q contiene la cadena..
            if(fecHora > fecHoraActual){ 
                    $.ajax({
                        type: "post",
                        datatype: "html",
                        url: "funciones_out2.php",
                        data: {funcion: funcion, jornada: numJor, idA: idEquiA, idB: idEquiB, golA: golA, golB: golB, fecHora: fecHora, campo: campo, arayIdJug: jsonidJugadoresGol, arayGoles: jsongoles},
                        success: function(mensajeFun7){  
                            $("#mensajeValida").html(mensajeFun7);
                        },
                        error: function(){
                            //alert("Error AJAX, al retornar datos..");
                            $("#mensajeValida").html(mensajeFun7);
                        }
                    });
                    setTimeout(function(){ window.location = "realGalobo.php"}, 5000);
            }else{
                $("#mensajeValida").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> La fecha es Pasada a la actual.</div>");
            }
        }else{
            campo='';
            $.ajax({
                type: "post",
                datatype: "html",
                url: "funciones_out2.php",
                data: {funcion: funcion, jornada: numJor, idA: idEquiA, idB: idEquiB, golA: golA, golB: golB, fecHora: fecHora, campo: campo, arayIdJug: jsonidJugadoresGol, arayGoles: jsongoles},
                success: function(mensajeFun7){  
                    $("#mensajeValida").html(mensajeFun7);     
                },
                error: function(){
                    //alert("Error AJAX, al retornar datos..");
                }
            });
            setTimeout(function(){ window.location = "realGalobo.php"}, 5000);
        }
    }else{
         $("#mensajeValida").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> Algún Campo Obligatorio sin Informar</div>");
    }

 });
});

var numJugaGol = $("#selNumJugadoresGol").val(); 
var idJugadoresGol = [];
var goles = [];
function valoresIdJugadoresGol(valor){   //Problema: Si en los select de jugadores Goleadores, eliges en uno de ellos a un jugador
    idJugadoresGol.push(valor.value);    // y luego a otro, el id del jugador no se resetea y se estaría guardando el id de los 2
}                                       // cuando lo correcto es enviar o guardar solo uno.
function valoresGolesJugador(valor){
    goles.push(valor.value);
}

/* Función para guardar resultados x medio del "submit"
function recogerValidarInfoPartido(){
    var funcion = 7;
    var numJor = $("#combJorGuardar").val();
    var numJortext = $("#combJorGuardar option:selected").text(); //recuperas el texto del option seleccionado.
    var numJorLast = $("#combJorGuardar option:last").val(); //recuperas el texto del ultimo option del select
    var idEquiA = $("#combEquiAguar").val();
    var idEquiB = $("#combEquiBguar").val();
    var golA = $("#golA").val();
    var golB = $("#golB").val();
    var jsonidJugadoresGol = JSON.encode(idJugadoresGol); //Array de id de jugadores que han marcado gol.codificado para
    var jsongoles = JSON.encode(goles);                 // poder ser enviado por ajax.

    var fecHora = $("#fechorapart").val(); // fecha recuperada del datetime-local de html5, con formato "yyyy-mm-ddThh:mm"
    var campo = $("#selCamposBoa").val();
    
    var fha = new Date();
    var dia = fha.getDate().toString();
    if(dia.length == 1){ dia='0'+dia;}
    var mes = (fha.getMonth())+1;// 1º al mes le sumamos 1 xq cero es "Enero". y lo Convirtiendo la fecha del sistema o actual en String para
    if(mes.toString().length == 1){ mes='0'+mes;} // poder compararla con la fecha recuperada del datetime-local de html5.

    var fecHoraActual = fha.getFullYear().toString()+"-"+mes+"-"+dia+"T"+fha.getHours().toString()+":"+fha.getMinutes().toString();
    
    if(numJortext.indexOf('Configurar')!= -1){ //significa q contiene la cadena..
        if(fecHora > fecHoraActual){ 
                $.ajax({
                    type: "post",
                    datatype: "html",
                    url: "funciones_out2.php",
                    data: {funcion: funcion, jornada: numJor, idA: idEquiA, idB: idEquiB, golA: golA, golB: golB, fecHora: fecHora, campo: campo, arayIdJug: jsonidJugadoresGol, arayGoles: jsongoles},
                    success: function(mensajeFun7){  
                        $("#mensajeValida").html(mensajeFun7);
                    },
                    error: function(){
                        //alert("Error AJAX, al retornar datos..");
                        $("#mensajeValida").html(mensajeFun7);
                    }
                });
                setTimeout(function(){ window.location = "realGalobo.php"}, 5000);
        }else{
            $("#mensajeValida").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> La fecha es Pasada a la actual.</div>");
        }
    }else{
        campo='';
        $.ajax({
            type: "post",
            datatype: "html",
            url: "funciones_out2.php",
            data: {funcion: funcion, jornada: numJor, idA: idEquiA, idB: idEquiB, golA: golA, golB: golB, fecHora: fecHora, campo: campo, arayIdJug: jsonidJugadoresGol, arayGoles: jsongoles},
            success: function(mensajeFun7){  
                $("#mensajeValida").html(mensajeFun7);     
            },
            error: function(){
                //alert("Error AJAX, al retornar datos..");
            }
        });
        setTimeout(function(){ window.location = "realGalobo.php"}, 5000);
    }
}*/
</script>

                <div class="well">
                    <h3> [Sistema Central - Gestión de Datos]</h3> 
                    <p class="text-left" style="font-family: architect;">- Introducción de los datos de la Jornada, configuración de la siguiente y de partidos aplazados :[Only Admin..]</p>
                    <div class="row">
                        <form class="form-horizontal" role="form" name="form" id="formGuardar" onsubmit="recogerValidarInfoPartido()" method="">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label for="" class="control-label">Número de la Jornada:</label>
                                </div>   
                                <div id="" class="col-sm-6">

<?php generaComboJornadasGuardarRG(); ?>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label for="" class="">Equipo Local:</label>
                                </div>   
                                <div id="divSeleEquiA" class="col-sm-12">
                                    <select id='combEquiAguar' class='form-control' onchange='' required>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label for="" class="">Equipo Visitante:</label>
                                </div>   
                                <div class="col-sm-12">
                                    <select id='combEquiBguar' class="form-control" required>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="divGolA" class="col-sm-6">
                                    <label for="" class="">Goles equipo Local:</label>
                                    <select id="golA" class="form-control" disabled> <!-- Select dinámico, x jquery -->
                                        <option value=''>Selecciona número de goles</option>
                                    </select>
                                </div>
                                <div id="divGolB" class="col-sm-6">
                                    <label for="" class="">Goles equipo Visitante:</label>
                                    <select id="golB" class="form-control" disabled> <!-- Select dinámico, x jquery -->
                                        <option value=''>Selecciona número de goles</option> 
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div id="divNumJugadoresGol" class="col-sm-8">
                                    <label for="" class="">Cuantos Jugadores diferentes han Marcado:</label>
                                    <select id="selNumJugadoresGol" class="col-sm-6 form-control" disabled> <!-- Select dinámico, x jquery -->
                                        <option value=''>Selecciona cuantos jugadores han marcado gol:</option>
                                        <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option>
                                        <option value='4'>4</option><option value='5'>5</option><option value='6'>6</option>
                                        <option value='7'>7</option><option value='8'>8</option><option value='9'>9</option>
                                    </select>
                                </div>
                            </div>

                            <div id="divFormGroupNumJugol" class="form-group">
                          
                            </div>

                            <div class="form-group">
                                <div id="divFecHora" class="col-sm-6">
                                    <label class="">Fecha y hora del Encuentro:</label>
                                    <input class="form-control" type="datetime-local" id="fechorapart" required></input>
                                </div>
                            
                                <div class="col-sm-6">
                                    <label for="" class=""><br>Valor Quiniela:</label>
                                    <label for="" id="quiniela" class="" value=""><h2> 1-X-2</h2></label>
                                </div>
                                <div><label for="" class="col-sm-9">Terreno de juego donde se disputará el encuentro:</label></div>
                                <div id="divCamposBoa" class="col-sm-6">
                                    
                                    <select id="selCamposBoa" class="form-control" required> <!-- Select dinámico, x jquery -->
                                        <option value=''>Selecciona el terreno de juego:</option>
                                        <option value='1'>CD FÚTBOL 7</option>
                                        <option value='2'>FÚTBOL 7 1-A</option>
					<option value='3'>FÚTBOL 7 1-B</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
<?php 
if(isset($_SESSION['id'])){
    if($_SESSION['nivAcceso']==1){
?>
                                    <button type="button" id="btnGuardarRes" class="btn btn-info">Aceptar</button>
                                    <h3 style="font-family: cursive">Eres EL ELEGIDO.</h3>
<?php 
    }else{
?>
                                    <button type="submit" id="btnGuardarRes" class="btn btn-info" disabled>Aceptar</button>
                                    <h3 style="font-family: cursive">No eres EL ELEGIDO.</h3>
<?php
    }
}
?>
                                </div>
                                <div id="mensajeValida" class="col-sm-9">
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="well">
                    <h3><strong>Postear Noticia:</strong></h3>
                    <form role="form" id="formNoticiaRG">
                        <div class="form-group">
                            <label for="" class="control-label">Título de la Noticia:</label>
                            <input type="text" class="form-control" id="titulo" maxlength="80" required></input>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Redactar Noticia:</label>
                            <textarea class="form-control" rows="4" id="contenido" maxlength="700" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">link de imagen:</label>
                            <input type="text" class="form-control" id="linkimg" maxlength="250"></input>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">link enlace externo:</label>
                            <input type="text" class="form-control" id="linkEnla" maxlength="250"></input>
                        </div>
                        <button type="button" id="btnFormNoti" class="btn btn-primary">Postealó!</button>
                        <div id="alertNoti"></div>
                    </form>
                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            
            <div class="col-md-2 well">

                <div class="table-responsive">
                    <label for="" class="control-label">Killers:</label>
                    <table class="table table-striped table-bordered table-hover" style="" border="" width="">
                   <!-- <table class="table table-responsive table-striped table-bordered"> -->
                        <thead>
                            <tr>
                                <th class="text-center">Jugador:</th>
                                <th class="text-center">Goles:</th>        
                        </thead>
                        <tbody>

<?php cargarTablaGoleadoresRG(); ?>                    

                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <label for="" class="control-label">Killers Por Jornada:</label>
                    <select id="selJorGoleadores" class="col-sm-3 form-control" > <!-- Select dinámico, x jquery -->
                        <option value=''>Elige Jornada:</option> 
<?php cargarComboGoleadoresPorJornada(); ?>
                    </select>
                    <table class="table table-striped table-bordered table-hover" style="" border="" width="">
                   <!-- <table class="table table-responsive table-striped table-bordered"> -->
                        <thead>
                            <tr>
                                <th class="text-center">Jugador:</th>
                                <th class="text-center">Goles:</th>        
                        </thead>
                        <tbody id="goleadoresJor">                    

                        </tbody>
                    </table>
                </div>
                <div class="row well">
                    <h4>Zona Real Galobo C.F.:</h4>
                    <p>Espacio en el que podrás consultar los datos más significativos, de la liga donde juega nuestro equipo de fútbol, 
                        con la posibilidad de informar de cualquier noticia relacionada o no con el mundo del fútbol Mundial, Continental, 
                        Occidental, Nacional y como no, Municipal.</p>
                    <p>Funcionamiento muy intuitivo y dinámico, con el añadido de poder participar al juego de la quiniela que es muy ga! con una
                        particularidad, que a parte de puntuar por los partidos de la jornada acertados en el 1-X-2 tradicional,
                        podrás seleccionar los jugadores de nuestro equipo que crees que harán diana cada jornada, y puntuar en función de su posición.</p>
                </div>
                <div class="row well">
                    <h4>Formulario de Noticia:</h4>
                    <p>- Imagenes: tienen que ser tipo Link, es decir imagenes que tengais por ejemplo en una cuenta pública tipo Instagram,flicker.. 
                     o subidas por otros usuarios y tengan un acceso público, seleccionando y copiando la "url" en el espacio habilitado para las imagenes.</p>
                    <p>- Links Externos: si quieres referenciar un artículo o sitio web externo debes informar el campo habilitado para ello, con la "url".</p>
                </div>

                <!-- Blog Search Well 
                <div class="well">
                    <h4>quiniela si o no Realizada, con enlace para administrar:</h4>
                    <div class="input-group">
                        
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        
                    </div>
                     /.input-group 
                </div>

                 Blog Categories Well
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    /.row
                </div> -->

                <!-- Side Widget Well -->
                

            </div>

        </div>
        <br>

<?php
cargarPie();

?>