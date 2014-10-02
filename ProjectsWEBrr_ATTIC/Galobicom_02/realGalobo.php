<?php
//Pagina comun para cada usuario, el index de los galobicos
require_once 'funciones.php';
//session_start();
// con el error 2.
if(!isset($_SESSION['id'])){
    switch($_GET['p']){//controlamos la navegación a la hora de mostrar mensajes al usuario en la barra NAVBAR común.
        case 1: header('location: index.php?mnsl=1a');
	            exit();
        case 2: header('location: formRegistro.php?mnsl=1a');
                exit();
        case 3: header('location: indexga.php?mnsl=1a');
                exit();
    }
}
//echo 'Hola!' . $_SESSION['nom'] . ' ' . $_SESSION['ape'] . '.';
cargarCabecera('Hola! Galob@!',4);
?>
   <br><br>		
   <div class="container-left"> 
            
                <div class="well" style="background: #A00303;">
                    <h1 class="text-center" style="color: black; font-size: 720%; font-family: Cursive;"><img src="img/ball_small.jpg"><strong>Real Galobo C.F.</strong><img src="img/ball_small.jpg"></h1>
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
            var idNoti = $("#formCom").attr("value"); //CAda form para incluir un comentario tiene en su "value" el id de la noticia que se esta comentando.          
            alert(idNoti);                            //*** recoger valor del atributo de un elemento html.  

            if(texcom != ""){
                $.ajax({
                    type: "post",
                    url: "funciones_out2.php",
                    data: {funcion: funPost, comentario: texcom, idNoticia: idNoti},
                    success: function(mensaje){
                        $("#alertMens").html(mensaje);
                        //$("#TablonNoti").html();
                    },
                    error: function(){
                        alert("Error al retornar datos..");
                    }
                });
                window.location = "realGalobo.php?npag=<?php $npag=1; if(isset($_GET['npag'])){ echo $_GET['npag'];}else{ echo $npag; } ?>";
            }else{
                //alert("comentario vacio.");
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
                    <label for="inputPasswordReg2" class="control-label">Clasificación:</label>
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
                    <label for="inputPasswordReg2" class="control-label">Resultados por jornadas:</label>

<?php generaComboJornadas(); ?>  

<script type="text/javascript">
 
 $(document).ready(function(){ //Sistema Jquery y Ajax para recoger variables trás un evento de un elemento.
  $("#combJornadas").change(function(){   
            
            var funJor = 0; //opción que le vamos a pasar al archivo php para saber q función realizar.
            var valJor = $("#combJornadas").val(); //value del elemento select seleccionado, el cual enviaremos al archivo php.
            //alert(funcionJor);
            //alert(valueJor);
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
                        alert("Error al cargar datos..");
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
                            <th class="text-center">Equipo A</th>
                            <th class="text-center">Equipo B</th>
                            <th class="text-center">Resultado</th>
                            <th class="text-center">Fecha y Hora</th>
                         </tr>
                        </thead> 
                        <tbody id="tablaResultadosJor">  
                        
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive well">
                    <label for="inputPasswordReg2" class="control-label">Resultados por Equipos:</label>

<?php  generaComboEquipos(); ?>

<script type="text/javascript">
 
 $(document).ready(function(){ //Sistema Jquery y Ajax para recoger variables trás un evento de un atributo.
 $("#combEquipos01").change(function(){   
            
            var funEqui = 1; //opción que le vamos a pasar al archivo php para indicarle q función realizar.
            var valEqui = $("#combEquipos01").val(); //value del elemento select seleccionado, el cual enviaremos al archivo php.
            //alert(funcionJor);
            //alert(valueJor);
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
                        alert("Error al cargar datos..");
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
                        alert("Error AJAX, al retornar datos..");
                    }
                });
                window.location = "realGalobo.php"; //Posteas una Noticia recarga la pagina, y aparece tu noticia.
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
                            <th class="text-center">Equipo A</th>
                            <th class="text-center">Equipo B</th>
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
        codigoHtmlPintarGolJugador += "<option value='9'>9</option><option value='10'>10</option><option value='11'>11</option>";
        codigoHtmlPintarGolJugador += "</select>";
    var codigoHtmlPintarGolJugadorKO = "<label for='' class=''>Número de goles:</label><select id='golJugador' class='form-control' disabled>";
        codigoHtmlPintarGolJugadorKO += "<option value=''>Selecciona número de goles.</option>";
        codigoHtmlPintarGolJugadorKO += "</select>";

 $("#combJorGuardar").change(function(){
        var fun = 4;
        var valJorGuar = $("#combJorGuardar").val();
        alert(valJorGuar);
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
                },
                error: function(){
                    alert("Error AJAX, al retornar datos..");
                }
            });
        }else{
            $("#combEquiAguar").html("");
            $("#combEquiBguar").html("");
            $("#divGolA").html(codigoHtmlPintarA);
            $("#divGolB").html(codigoHtmlPintarB);
            $("#quiniela").html("<h2> 1-X-2</h2>");
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
                },
                error: function(){
                    alert("Error AJAX, al retornar datos..");
                }
            });
        }else{
            $("#combEquiBguar").html("");
            $("#divGolA").html(codigoHtmlPintarA);
            $("#divGolB").html(codigoHtmlPintarB);
            $("#quiniela").html("<h2> 1-X-2</h2>");
            
        }
 });

 $("#combEquiBguar").change(function(){
        
        var idEquiB = $("#combEquiBguar").val();
        var idEquiA = $("#combEquiAguar").val();
        var numJortext = $("#combJorGuardar option:selected").text(); //recuperas el texto del option seleccionado.
        alert(numJortext);
        if(idEquiB != '' && numJortext.indexOf('Configurar') == -1){ // queremos q se vaya al else si contiene la cadena "Configurar" (Configurar siguiente...).
            var codigoHtmlPintarOKA = "<label for='' class=''>Goles equipo Local:</label><select id='golA' class='form-control' required>";
                codigoHtmlPintarOKA += "<option value=''>Selecciona número de goles.</option><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option>";
                codigoHtmlPintarOKA += "<option value='3'>3</option><option value='4'>4</option><option value='5'>5</option>";
                codigoHtmlPintarOKA += "<option value='6'>6</option><option value='7'>7</option><option value='8'>8</option>";
                codigoHtmlPintarOKA += "<option value='9'>9</option><option value='10'>10</option><option value='11'>11</option>";
                codigoHtmlPintarOKA += "</select>";
            var codigoHtmlPintarOKB = "<label for='' class=''>Goles equipo Visitante:</label><select id='golB' class='form-control' required>";
                codigoHtmlPintarOKB += "<option value=''>Selecciona número de goles.</option><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option>";
                codigoHtmlPintarOKB += "<option value='3'>3</option><option value='4'>4</option><option value='5'>5</option>";
                codigoHtmlPintarOKB += "<option value='6'>6</option><option value='7'>7</option><option value='8'>8</option>";
                codigoHtmlPintarOKB += "<option value='9'>9</option><option value='10'>10</option><option value='11'>11</option>";
                codigoHtmlPintarOKB += "</select>";       
            $("#divGolA").html(codigoHtmlPintarOKA);
            $("#divGolB").html(codigoHtmlPintarOKB);
        }else{
            $("#divGolA").html(codigoHtmlPintarA);
            $("#divGolB").html(codigoHtmlPintarB);
            $("#quiniela").html("<h2> 1-X-2</h2>");
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
                 alert("Error AJAX, al retornar datos..");
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
            $.ajax({
                type: "post",
                datatype: "html",
                url: "funciones_out2.php",
                data: {funcion: funcion},
                success: function(datosJugadores){
                      $("#divJugadores").html(datosJugadores);
                },
                error: function(){
                    alert("Error AJAX, al retornar datos..");
                }
            }); 
            $("#divGoles").html(codigoHtmlPintarGolJugadorKO); 
        }else if(idEquiB!=1){
            $("#divJugadores").html(codigoHtmlPaintDisableJugadoresComb);
            $("#divGoles").html(codigoHtmlPintarGolJugadorKO);
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
            $.ajax({
                type: "post",
                datatype: "html",
                url: "funciones_out2.php",
                data: {funcion: funcion},
                success: function(datosJugadores){
                      $("#divJugadores").html(datosJugadores);
                },
                error: function(){
                    alert("Error AJAX, al retornar datos..");
                }
            });  
            $("#divGoles").html(codigoHtmlPintarGolJugadorKO);
        }else if(idEquiA!=1){
            $("#divJugadores").html(codigoHtmlPaintDisableJugadoresComb);
            $("#divGoles").html(codigoHtmlPintarGolJugadorKO);
        }
        
 });

 $("#divJugadores").change(function(){ //método para que pinte el selec de num de goles x jugador, solo cuando en el partido
        var idJugador = $("#selJugadores").val(); // uno de los equipos sea el realgalobo o id=1.
        if(idJugador!=''){
            $("#divGoles").html(codigoHtmlPintarGolJugador); 
        }else{
            $("#divGoles").html(codigoHtmlPintarGolJugadorKO);
        }
 });

 $("#btnGuardarRes").click(function(){ //hacer funcion en archivo php para guardar
        var jor = $("#combJorGuardar").val();
        var ideA = $("#").val();
        var ideB = $("#").val();
        var gA = $("#").val();
        var gB = $("#").val();
        var fecHor = $("#").val();


 });
});

function recogerValidarInfoPartido(){
    var funcion = 7;
    var numJor = $("#combJorGuardar").val();
    var numJortext = $("#combJorGuardar option:selected").text(); //recuperas el texto del option seleccionado.
    var numJorLast = $("#combJorGuardar option:last").val(); //recuperas el texto del ultimo option del select
    var idEquiA = $("#combEquiAguar").val();
    var idEquiB = $("#combEquiBguar").val();
    var golA = $("#golA").val();
    var golB = $("#golB").val();
    var fecHora = $("#fechorapart").val(); // fecha recuperada del datetime-local de html5, con formato "yyyy-mm-ddThh:mm"
    
    alert("Jornada: "+numJor+"-"+numJortext+"-"+numJorLast+" idA: "+idEquiA+" idB: "+idEquiB+" GolA: "+golA+" GolB: "+golB);
    alert(fecHora);
    
    var fha = new Date();
    var dia = fha.getDate().toString();
    if(dia.length == 1){ dia='0'+dia;}
    var mes = (fha.getMonth())+1;// 1º al mes le sumamos 1 xq cero es "Enero". y lo Convirtiendo la fecha del sistema o actual en String para
    if(mes.toString().length == 1){ mes='0'+mes;} // poder compararla con la fecha recuperada del datetime-local de html5.

    var fecHoraActual = fha.getFullYear().toString()+"-"+mes+"-"+dia+"T"+fha.getHours().toString()+":"+fha.getMinutes().toString();
    alert(fecHoraActual);
    
    if(numJortext.indexOf('Configurar')!= -1){ //significa q contiene la cadena..
        if(fecHora > fecHoraActual){ 
                $.ajax({
                    type: "post",
                    datatype: "html",
                    url: "funciones_out2.php",
                    data: {funcion: funcion, jornada: numJor, idA: idEquiA, idB: idEquiB, golA: golA, golB: golB, fecHora: fecHora},
                    success: function(mensajeFun7){  
                        $("#mensajeValida").html(mensajeFun7);
                    },
                    error: function(){
                        alert("Error AJAX, al retornar datos..");
                        $("#mensajeValida").html(mensajeFun7);
                    }
                });
        }else{
            alert("Selecciona un fecha futura..");
            $("#mensajeValida").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> La fecha es Pasada a la actual.</div>");
        }
    }else{
        $.ajax({
            type: "post",
            datatype: "html",
            url: "funciones_out2.php",
            data: {funcion: funcion, jornada: numJor, idA: idEquiA, idB: idEquiB, golA: golA, golB: golB, fecHora: fecHora},
            success: function(mensajeFun7){  
                $("#mensajeValida").html(mensajeFun7);
                       
            },
            error: function(){
                alert("Error AJAX, al retornar datos..");
            }
        });
    }
    //setTimeout('return 0',400000000);
    //sleep(4000);
    /*$(document).ready(function(){
        
    });*/
}
</script>

                <div class="well">
                    <h3> [Sistema Central - Introducción de Datos]</h3> 
                    <p class="text-left" style="font-family: architect;">- Introdución de los datos de la Jornada, configuración de la siguiente y de partidos aplazados :[Only Admin..]</p>
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
<!-- DESARROLLANDING -->
                            <div class="form-group">
                                <div id="divJugadores" class="col-sm-6">
                                    <label for="" class="">Jugador con MOJO:</label>
                                    <select id="selJugadores" class="form-control" disabled> <!-- Select dinámico, x jquery -->
                                        <option value=''>Selecciona al jugador que ha mojado</option>
                                    </select>
                                </div>
                                <div id="divGoles" class="col-sm-6">
                                    <label for="" class="">Número de goles:</label>
                                    <select id="goles" class="form-control" disabled> <!-- Select dinámico, x jquery -->
                                        <option value=''>Selecciona número de goles</option> 
                                    </select>
                                </div>
                            </div>
<!-- fin desarro.. -->
                            <div class="form-group">
                                <div id="divFecHora" class="col-sm-6">
                                    <label class="">Fecha y hora del Encuentro:</label>
                                    <input class="form-control" type="datetime-local" id="fechorapart" required></input>
                                </div>
                            
                                <div class="col-sm-6">
                                    <label for="" class=""><br>Valor Quiniela:</label>
                                    <label for="" id="quiniela" class="" value=""><h2> 1-X-2</h2></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <button type="submit" id="btnGuardarRes" class="btn btn-info">Aceptar</button>
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
                        <button type="submit" id="btnFormNoti" class="btn btn-primary">Postealó!</button>
                        <div id="alertNoti"></div>
                    </form>
                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            
            <div class="col-md-2 well">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>quiniela si o no Realizada, con enlace para administrar:</h4>
                    <div class="input-group">
                        
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
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
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <br>

<?php
cargarPie();

?>