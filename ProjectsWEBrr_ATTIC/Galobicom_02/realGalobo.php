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
                    <h1 class="text-center" style="color: black; font-size: 110px; font-family: Cursive;"><img src="img/ball_small.jpg"><strong>Real Galobo C.F.</strong><img src="img/ball_small.jpg"></h1>
                </div>
            
            <!-- Blog Post Content Column -->
            <div id="TablonNoti" class="col-md-4 well">

<?php 
$maxelempag = 1; //Numero de elementos por pagina, POR EL MOMENTO FALLA CON MAS DE 2, A LA HORA DE GUARDAR LOS COMENTARIOS EN LA NOTICIA CORRECTA.
cargarNoticiasRG($maxelempag); 
cargarPaginacion($maxelempag);
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
                window.location = "realGalobo.php?npag=<?php if(isset($_GET['npag'])){ echo $_GET['npag'];} ?>";
            }else{
                alert("comentario vacio.");
            }
 });
 });
</script>

                <!-- Comment 
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment 
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment 
                    </div>
                </div> -->


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
            if(valJor!=0){ //si selecciona el value=0("Elige Jornada") no haga nada y le saque un mns al user.
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
            }else{
                alert("Selecciona un número tontako!!");
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
            if(valEqui!=0){ //si selecciona el value=0("Elige Jornada") no haga nada y le saque un mns al user.
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
            }else{
                alert("Selecciona un número tontako!!");
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
                window.location = "realGalobo.php";
            }else{
                alert("titulo y contenido obligatorios..");
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
    var codigoHtmlPintar = "<select id='golA' class='form-control' disabled>";
        codigoHtmlPintar += "<option value='0'>0</option>";
        codigoHtmlPintar += "</select>";
 $("#combJorGuardar").change(function(){
        var fun = 4;
        var valJorGuar = $("#combJorGuardar").val();
        alert(valJorGuar);
        if(valJorGuar!=0){
            $.ajax({
                type: "post",
                datatype: "html",
                url: "funciones_out2.php",
                data: {valueJor: valJorGuar, funcion: fun},
                success: function(datosComboA){
                    $("#combEquiAguar").html(datosComboA);
                    $("#combEquiBguar").html(""); //Vaciar el 3combo "equipo B", ya q es dependiente del 2ºcombo y este del 1ºcombo.
                    $("#divGolA").html(codigoHtmlPintar);
                    $("#divGolB").html(codigoHtmlPintar);
                },
                error: function(){
                    alert("Error AJAX, al retornar datos..");
                }
            });
        }else{
            $("#combEquiAguar").html("");
            $("#combEquiBguar").html("");
            $("#divGolA").html(codigoHtmlPintar);
            $("#divGolB").html(codigoHtmlPintar);
            alert("prueba con otro elemento!!..venga tu puedes..o_O");
        }
 });

 $("#combEquiAguar").change(function(){
        var fun = 5;
        var valEquiAguar = $("#combEquiAguar").val();
        var valJorGuar = $("#combJorGuardar").val();
        alert(valEquiAguar);
        alert(valJorGuar);
        if(valEquiAguar!=0){
            $.ajax({
                type: "post",
                datatype: "html",
                url: "funciones_out2.php",
                data: {value: valEquiAguar, valueJor: valJorGuar, funcion: fun},
                 success: function(datosComboB){
                    $("#combEquiBguar").html(datosComboB);
                    $("#divGolA").html(codigoHtmlPintar);
                    $("#divGolB").html(codigoHtmlPintar);
                },
                error: function(){
                    alert("Error AJAX, al retornar datos..");
                }
            });
        }else{
            $("#combEquiBguar").html("");
            $("#divGolA").html(codigoHtmlPintar);
            $("#divGolB").html(codigoHtmlPintar);
            alert("prueba con otro elemento!!..venga tu puedes..o_O");
        }
 });

 $("#combEquiBguar").change(function(){
        var valEquiB = $("#combEquiBguar").val();
        if(valEquiB != 0){
            var codigoHtmlPintarOK = "<select id='golA' class='form-control'>";
                codigoHtmlPintarOK += "<option value='0'>0</option><option value='1'>1</option><option value='2'>2</option>";
                codigoHtmlPintarOK += "<option valie='3'>3</option><option valie='4'>4</option><option valie='5'>5</option>";
                codigoHtmlPintarOK += "<option valie='6'>6</option><option valie='7'>7</option><option valie='8'>8</option>";
                codigoHtmlPintarOK += "<option valie='9'>9</option><option valie='10'>10</option><option valie='11'>11</option>";
                codigoHtmlPintarOK += "</select>";       
            $("#divGolA").html(codigoHtmlPintarOK);
            $("#divGolB").html(codigoHtmlPintarOK);
        }else{
            $("#divGolA").html(codigoHtmlPintar);
            $("#divGolB").html(codigoHtmlPintar);
            alert("prueba con otro elemento!!..venga tu puedes..o_O");
        }
 });

 $("#golA").change(function(){ //Hacer calculo para que aparezca el valos de la quiniela 1,x,2.


 });
 $("#golB").change(function(){ //Hacer calculo para que aparezca el valos de la quiniela 1,x,2.
    
 });


 $("#btnGuardar").click(function(){ //hacer funcion en archivo php para guardar
        var jor = $("#combJorGuardar").val();
        var ideA = $("#").val();
        var ideB = $("#").val();
        var gA = $("#").val();
        var gB = $("#").val();
        var fecHor = $("#").val();


 });
});
</script>

                <div class="well">
                    <p>Introducir Resultados de la jornada:[xx]</p>
                    <div class="row">
                        <form class="form-horizontal" role="form" name="form" action="" method="">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label for="" class="control-label">Jornada número:</label>
                                </div>   
                                <div id="" class="col-sm-6">

<?php generaComboJornadasGuardarRG(); ?>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label for="" class="">Equipo A:</label>
                                </div>   
                                <div id="divSeleEquiA" class="col-sm-12">
                                    <select id='combEquiAguar' class='form-control' onchange=''>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label for="" class="">Equipo B:</label>
                                </div>   
                                <div class="col-sm-12">
                                    <select id='combEquiBguar' class="form-control">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="" class="">Goles equipo A:</label>
                                </div> 
                                <div class="col-sm-6">
                                    <label for="" class="">Goles equipo B:</label>
                                </div>   
                                <div id="divGolA" class="col-sm-6">
                                    <select id="golA" class="form-control" disabled>
                                        <option value="0">0</option> <!-- <option value="1">1</option><option value="2">2</option>
                                        <option valie="3">3</option><option valie="4">4</option><option valie="5">5</option>
                                        <option valie="6">6</option><option valie="7">7</option><option valie="8">8</option>
                                        <option valie="9">9</option><option valie="10">10</option><option valie="11">11</option> -->
                                    </select>
                                </div>
                                <div id="divGolB" class="col-sm-6">
                                    <select id="golB" class="form-control" disabled>
                                        <option value="0">0</option> <!-- <option value="1">1</option><option value="2">2</option>
                                        <option valie="3">3</option><option valie="4">4</option><option valie="5">5</option>
                                        <option valie="6">6</option><option valie="7">7</option><option valie="8">8</option>
                                        <option valie="9">9</option><option valie="10">10</option><option valie="11">11</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label class="">Fecha y hora del Encuentro:</label>
                                    <input class="form-control" type="datetime-local" id="fechorapart"></input>
                                </div>
                            
                                <br></br>
                                <div class="col-sm-6">
                                    <label for="" class="">Valor Quiniela:</label>
                                    <label for="" id="quiniela" class="">1-X-2</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-5">
                                    <button type="button" id="btnGuardar" class="btn btn-info">Aceptar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="well">
                    <h3><strong>Postear Noticia:</strong></h3>
                    <form role="form" id="formNoticiaRG">
                        <div class="form-group">
                            <label for="inputPasswordReg2" class="control-label">Título de la Noticia:</label>
                            <input type="text" class="form-control" id="titulo" maxlength="80"></input>
                        </div>
                        <div class="form-group">
                            <label for="inputPasswordReg2" class="control-label">Redactar Noticia:</label>
                            <textarea class="form-control" rows="4" id="contenido" maxlength="700"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputPasswordReg2" class="control-label">link de imagen:</label>
                            <input type="text" class="form-control" id="linkimg" maxlength="250"></input>
                        </div>
                        <div class="form-group">
                            <label for="inputPasswordReg2" class="control-label">link enlace externo:</label>
                            <input type="text" class="form-control" id="linkEnla" maxlength="250"></input>
                        </div>
                        <button type="button" id="btnFormNoti" class="btn btn-primary">Postealó!</button>
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

                <div class="well">
                    <p>Introducir Resultados de la jornada:[xx]</p>
                    <div class="row">
                        <form class="form-horizontal" role="form" name="form" action="registro.php" method="post">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label for="inputPasswordReg2" class="control-label">Jornada número</label>
                                </div>   
                                <div class="col-sm-6">
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label for="inputPasswordReg2" class="control-label">Equipo A:</label>
                                </div>   
                                <div class="col-sm-12">
                                    <select class="form-control">
                                        <option>kfgmnklsdfgnlkdsfnldksnkldsngkldsngkldsngkldnsfgklndsklfgndsklf</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label for="inputPasswordReg2" class="control-label">Equipo B:</label>
                                </div>   
                                <div class="col-sm-12">
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label for="inputPasswordReg2" class="control-label">Goles equipo A:</label>
                                </div>   
                                <div class="col-sm-6">
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label for="inputPasswordReg2" class="control-label">Goles equipo B:</label>
                                </div>   
                                <div class="col-sm-6">
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label for="inputPasswordReg2" class="control-label">Valor Quiniela:</label>
                                </div>
                                 <div class="col-sm-10">
                                    <label for="inputPasswordReg2" class="control-label">1-X-2</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3">
                                    <button type="submit" class="btn btn-info">Aceptar</button>
                                </div>
                            </div>
                        </form>
                    </div>
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