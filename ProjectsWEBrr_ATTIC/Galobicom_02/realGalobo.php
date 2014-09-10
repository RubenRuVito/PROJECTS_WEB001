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
            <div class="col-md-4 well">

                <!-- Blog Post -->

                <!-- Title -->
                <h2>Título de la Noticia..</h2>
                
                <!-- Author -->
                <p class="lead">
                    by <a href="#">Ruvito_O</a>
                </p>

                

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
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
                        <!-- End Nested Comment -->
                    </div>
                </div>

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
 function valorSelectJornadas(){
    var comboJor = document.getElementById('jornada');
    var valueComboJor = comboJor.value;
 }
 
 $(document).ready(function(){   
 $("#jornadas").change(function(){ //  click(function(){
            
            var funcionJor = 0;
            var valueJor = $("#jornadas").val();
            //alert(funcionJor);
            //alert(valueJor);
            if(valueJor!=0){
                $.ajax({
                    type: "post",   
                    url: "funciones_out2.php",
                    dataType: "html",
                    data: {funcionJor: funcionJor, valueJor: valueJor},
                    success: function(datosTabla){
                        $("#tablaResultadosJor").html(datosTabla);
                    },
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

                    <br></br>
                    <table id="" class="table table-striped table-bordered table-hover" style="" border="" width="">
                   <!-- <table class="table table-responsive table-striped table-bordered"> -->
                        <Thead>    
                         <tr>
                            <th class="text-center">Jornada</th>
                            <th class="text-center">Equipo A</th>
                            <th class="text-center">Equipo B</th>
                            <th class="text-center">Resultado</th>
                         </tr>
                        <tbody id="tablaResultadosJor">  
                        
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive well">
                    <label for="inputPasswordReg2" class="control-label">Resultados por Equipos:</label>

<?php  generaComboEquipos(); ?>

                    <!-- <select class="form-control">
                                        <option>EquipoA</option>
                                        <option>EquipoB</option>
                                        <option>EquipoC</option>
                                        <option>4</option>
                                        <option>5</option>
                    </select> 
                    <button type="submit" class="btn btn-info">Aceptar</button> -->
                    <br></br>
                    <table class="table table-striped table-bordered table-hover" style="" border="" width="">
                   <!-- <table class="table table-responsive table-striped table-bordered"> -->
                        <tr>
                        <th>Jornada</th>
                        <th>Equipo A</th>
                        <th>Equipo B</th>
                        <th>Resultado</th>
                        </tr>
                        <tr>
                        <td class="text-center">1</td>
                        <td>Real Galobo C.F.</td>
                        <td>Los de Siempre C.F.</td>
                        <td class="text-center">5-0</td>
                        </tr>
                         </tr>
                        <tr>
                        <td class="text-center">2</td>
                        <td>Mi Nabo de Kiev C.F.</td>
                        <td>Real Galobo C.F.</td>
                        <td class="text-center">0-5</td>
                        </tr>
                    </table>
                </div>

                <div class="well">
                    <h3><strong>Postear Noticia:</strong></h3>
                    <form role="form">
                        <div class="form-group">
                            <label for="inputPasswordReg2" class="control-label">Título de la Noticia:</label>
                            <input type="text" class="form-control" ></input>
                        </div>
                        <div class="form-group">
                            <label for="inputPasswordReg2" class="control-label">Redactar Noticia:</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputPasswordReg2" class="control-label">link de imagen:</label>
                            <input type="text" class="form-control" ></input>
                        </div>
                        <div class="form-group">
                            <label for="inputPasswordReg2" class="control-label">link enlace externo:</label>
                            <input type="text" class="form-control" ></input>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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