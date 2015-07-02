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
cargarCabecera('Blog',3); //3 significa q es la pagi desarrollada num "3".

?>
   <br>		
   <div class="container">

            <!-- Blog Post Content Column -->
            <br>
            <div class="col-lg-8 well">
<?php

$maxelempag = 1; //Número de elementos por pagina, POR EL MOMENTO FALLA CON MAS DE 2, A LA HORA DE GUARDAR LOS COMENTARIOS EN LA NOTICIA CORRECTA.
cargarPostBlogGA($maxelempag); //carga las noticias posteadas, y sus mensajes relacionados.
cargarPaginacionBlogGA($maxelempag);
?>
<script type="text/javascript">
$(document).ready(function(){ //Sistema Jquery y Ajax para recoger variables trás un evento de un atributo.
 $("#btnFormPost").click(function(){

            var funPost = 3;
            var tit = $("#tituloPost").val();
            var cont = $("#contenidoPost").val();
            var limg = $("#linkimgPost").val();
            var lenla = $("#linkEnlaPost").val();
            var categ = $("#categoriaPost").val();
            //alert('titu: '+tit+' Contenido: '+cont+' linkImg: '+limg+' linkEnla: '+lenla+' Categoria: '+categ);

            if(tit != "" && cont != "" && categ != ''){ //el tipo submit funcionaria si llamaramos a una función JS en
                $.ajax({                                // el action del formulario, xo com lo hacemos a traves del evento
                    type: "post",                       // onclick del button.lo arreglamos incorporando un if condicionando 
                    url: "funciones_out3.php",          // q campos no pueden ir vacios.
                    data: {funcion: funPost, titulo: tit, contenido: cont, linkimg: limg, linkEnla: lenla, categoria: categ},
                    success: function(mensaje){
                        $("#alertBlog").html(mensaje);
                    },
                    error: function(){
                        //alert("Error AJAX, al retornar datos..");
                    }
                });
                setTimeout(function(){ window.location = "indexga.php"}, 5000); //Posteas una Noticia sale el mensaje 5sg y recarga la pagina, y aparece tu noticia.
            }else{
                var mensCampOblig = "<br><div class='alert alert-warning alert-dismissible' role='alert'>";
                    mensCampOblig += "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>";
                    mensCampOblig += "<strong>Atención!</strong> Título, contenido y categoría son campos obligatorios.</div>";
                                    
                $("#alertBlog").html(mensCampOblig);
            }
  });

 $("#btnFormComentPost").click(function(){

            var funPost = 4; //Función en "funciones_out2.php" para guardar el comment realizado en una noticia en concreto.
            var texcom = $("#textComent").val(); // recoge el valor del contenido de la etiqueta o elemento referenciado x su id.
            var idblog = $("#divComment").attr("value"); //CAda form para incluir un comentario tiene en su "value" el id de la noticia que se esta comentando.          
            //alert(idblog);                            //*** recoger valor del atributo de un elemento html.  
            var flag=0;
            if(texcom != ""){
                $.ajax({
                    type: "post",
                    url: "funciones_out3.php",
                    data: {funcion: funPost, comentario: texcom, idBlog: idblog},
                    success: function(mensaje){
                        $("#alertMensPost").html(mensaje);
                    },
                    error: function(){
                        alert("Error al retornar datos..");
                    }
                });
                //IMPOSTANTISIIIIMO: CONSIGO PARAR LA EJECUCION PARA QUE SE VEA EL MENSAJE DEL RECUPERADO DE LA PARTE SERVIDOR, Y RECARGO LA PAGINA PARA QUE CARGE LO NUEVO.
                setTimeout(function(){ window.location = "indexga.php?npag=<?php $npag=1; if(isset($_GET['npag'])){ echo $_GET['npag'];}else{ echo $npag; } if(isset($_GET['cat'])){ echo '&cat='.$_GET['cat']; } ?>"}, 5000);
            }else{
                var mensComeVacio = "<div class='alert-sm alert-warning alert-dismissible' role='alert'>";
                    mensComeVacio += "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>";
                    mensComeVacio += "<strong>Atención!</strong>Comentario Vacio!..No seas vag@ ti@!.</div>";
                                    
                $("#alertMensPost").html(mensComeVacio);
            }
  });
});

function sleep(millisegundos) {
    var inicio = new Date().getTime();
    while ((new Date().getTime() - inicio) < millisegundos){};
}

</script>
             <div class="well">
                    <h3><strong>Formulario de Post:</strong></h3>
                    <div role="form" id="formBlogGa">
                        <div class="form-group">
                            <label for="" class="control-label">Título del Post:</label>
                            <input type="text" class="form-control" id="tituloPost" maxlength="80" required></input>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Redactar Texto del Post:</label>
                            <textarea class="form-control" rows="10" id="contenidoPost" maxlength="5000" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">link de imagen:</label>
                            <input type="text" class="form-control" id="linkimgPost" maxlength="250"></input>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">link enlace externo:</label>
                            <input type="text" class="form-control" id="linkEnlaPost" maxlength="250"></input>
                        </div>
                        <div class="form-group">
                            
                                <label for="" class="control-label">Categoría del Post:</label>
                                <select id="categoriaPost" class="form-control" required>
                                    <option value=''>Elige Categoría:</option>
                                    <option value='musica'>Música.</option>
                                    <option value='cineyseries'>Cine & Series.</option>
                                    <option value='libros'>Libros.</option>
                                    <option value='aireLibre'>Aire Libre.</option>
                                    <option value='humor'>Humor.</option>
                                    <option value='actualidad'>Actualidad.</option>
                                    <option value='gastronomia'>Gastronomía.</option>
                                    <option value='rico'>Muy Rico!.</option>
                                    <option value='ga'>Muy GA!.</option>
                                    <option value='galobos'>Galob@s.</option>
                                    <option value='galobosWorld'>Galob@s por el Mundo.</option>
                                    <option value='entretenimiento'>Entretenimiento.</option>
                                </select>
                        </div>
                         <div class="form-group">
                                <button type="submit" id="btnFormPost" class="btn btn-primary">Postealó!</button>
                        </div>
                        <!-- <button type="submit" id="btnFormPost" class="btn btn-primary">Postealó!</button> -->
                        <div id="alertBlog">
<!-- <script type="text/javascript"> sleep(5000); </script> -->
                        </div>
                    </div>
                </div>
               
            </div>

            <!-- Blog Sidebar Widgets Column -->
            
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control" Placeholder="" disabled></input>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" disabled>
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                     <p style="font-family: cursive;">En construcción..</p>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Categorias del Blog:</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="indexga.php">Todas Las Categorias</a>
                                </li>
                                <li><a href="indexga.php?cat=musica">Música</a>
                                </li>
                                <li><a href="indexga.php?cat=cineyseries">Cine & Series</a>
                                </li>
                                <li><a href="indexga.php?cat=libros">Libros</a>
                                </li>
                                <li><a href="indexga.php?cat=airelibre">Aire Libre</a>
                                </li>
                                <li><a href="indexga.php?cat=humor">Humor</a>
                                </li>
                                <li><a href="indexga.php?cat=actualidad">Actualidad</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="indexga.php?cat=gastronomia">Gastronomía</a>
                                </li>
                                <li><a href="indexga.php?cat=rico">Muy Rico!</a>
                                </li>
                                <li><a href="indexga.php?cat=ga">Muy GA!</a>
                                </li>
                                <li><a href="indexga.php?cat=galobos">Galob@s</a>
                                </li>
                                <li><a href="indexga.php?cat=galobosWorld">Galob@s por el Mundo</a>
                                </li>
                                <li><a href="indexga.php?cat=entretenimiento">Entretenimiento</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                     <p style="font-family: cursive;">De momento son las categorías o géneros que han salido sobre la marcha,
                      os invito a que me envieis vuestras sugerencias a este correo: <a type="mail" href="mailto:admin@galobicom.esy.es">admin@galobicom.esy.es</a></p>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Blog con "taras" Ups!!</h4>
                    <p>Zona Blog en la que podéis Postear en las diferentes categorías, con un máximo de 5 post por mes
                    y 5 comentarios por post y mes también, de hay lo de las Taras..sorry! pero es lo que hay. Espero
                    que os divirtáis como yo lo he hecho al crearlo, e imaginandome a la vez (bastante dificil xcierto.), los post mágicos, gigantes y maravillosos
                    que van a salir de mentes como las vuestras. Adelante Postéate Algo! si te atreves..o_O!!</p>
                </div>
                <div class="well">
                    <h4>Formulario de Post:</h4>
                    <p>- Imagenes: tienen que ser tipo Link, es decir imagenes que tengais por ejemplo en una cuenta pública tipo Instagram,flicker.. 
                     o subidas por otros usuarios y tengan un acceso público, seleccionando y copiando la "url" en el espacio habilitado para las imagenes.</p>
                    <p>- Links Externos: si quieres referenciar un artículo o sitio web externo debes informar el campo habilitado para ello con la "url.</p>
                </div>

            </div>

        </div>
        <br>

<?php
cargarPie();

?>