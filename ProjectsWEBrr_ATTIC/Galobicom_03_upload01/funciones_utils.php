<?php
//Funciones y métodos útiles.
require_once 'funciones.php';
require_once ("class/class.phpmailer.php");
require_once('class/class.smtp.php');

function enviarEmailRegistro($nombre,$apellidos,$email,$codigoAlta){ //envio de email con phpMailer.
    
    $urlActivar = 'http://localhost/ProjectsWEBrr_ATTIC/Galobicom_02/activarUser.php?cod=';
    $mnsHTML = '<html>';
    $mnsHTML .= '<head>';
    $mnsHTML .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
    $mnsHTML .= '<title>Título</title>';
    $mnsHTML .= '</head>';
    $mnsHTML .= '<body>';
    $mnsHTML .= '<p>GALOBICOM - Activar usuario: <h1>Hola! '.$nombre.' '.$apellidos.'.</p>';
    $mnsHTML .= '<center>';
    $mnsHTML .= '</h1><strong>Gracias por registrarte en GALOBICOM</strong>. Para completar el registro, tienes que confirmar que has recibido este email haciendo click en el siguiente enlace:<p style="text-align: center;"><a href="'.$urlActivar.''.$codigoAlta.'">Activar Usuario.</a></p>';
    $mnsHTML .= '</center>';
    $mnsHTML .= '</body>';
    $mnsHTML .= '</html>';
    $mnsHTML = utf8_decode($mnsHTML);
    $subject = utf8_decode("Nuevo usuario - Proceso de activación.");
   
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->PluginDir = "class/";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
      $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->Username = "rubenruvito@gmail.com";
    $mail->Password = "1983rugaral01";
    $mail->From = "admin@galobi.com";
    $mail->FromName = "AdminGalobico";
    $mail->AddAddress($email);
    $mail->IsHTML(true);
    $mail->SMTPDebug = 2;
    $mail->Subject = $subject;
    //$mail->Body = ("<b>Pruebas PhpMailer, siiiiiiiiii</b>");
    $mail->Body = ($mnsHTML);
    //$mail->AltBody = ("Pruebas PhpMailer");
    if(!$mail->Send())
    {
    
    echo 'ERROR'.$mail->ErrorInfo;
    }else{
        echo 'Correo enviado';
    }
}

function generarCodigoAlta($long,$esp){//Metodo para generar el código de alta..
    $semilla = array();
    $semilla[] = array('a','e','i','o','u');
    $semilla[] = array('b','c','d','f','g','h','j','k','l','m','n','p','q','r','s','t','v','w','x','y','z');
    $semilla[] = array('0','1','2','3','4','5','6','7','8','9');
    $semilla[] = array('A','E','I','O','U');
    $semilla[] = array('B','C','D','F','G','H','J','K','L','M','N','P','Q','R','S','T','V','W','X','Y','Z');
    $semilla[] = array('0','1','2','3','4','5','6','7','8','9');

    if ($esp){ 
        $semilla[] = array('$','#','%','&amp;','@','-','?','¿','!','¡','+','-','*');
    }
 
    // creamos la clave con la longitud indicada
    for ($bucle=0; $bucle<$long; $bucle++)
    {
        // seleccionamos un subarray al azar
        $valor = mt_rand(0, count($semilla)-1);
        // selecccionamos una posición al azar dentro del subarray
        $posicion = mt_rand(0,count($semilla[$valor])-1);
        // cogemos el carácter y lo agregamos a la clave
        $clave .= $semilla[$valor][$posicion];
    }
    // devolvemos la clave
    return $clave;
}

function updatesTablaEquipos($idEquipoA,$idEquipoB,$golA,$golB){ //Método para informar la tabla equipos, partiendo de  
    $conect=conectarDB01();                                                //la acción click, para aceptar Un partido Completo.
    //echo "<p>idEquiA: ".$idEquipoA."idEquiB: ".$idEquipoB."</p>";
    if($golA == $golB){
            $quiniela = 0;
        }else if($golA < $golB){
            $quiniela = 2;
        }else{
            $quiniela = 1;
        }
    $arayIdEquipos[] = $idEquipoA;
    array_push($arayIdEquipos,$idEquipoB);
    $flagActualizado=0;
    for($cnt=0; $cnt<count($arayIdEquipos);$cnt++){
        //echo "<p>idEqui: ".$arayIdEquipos[$cnt]."</p>";
        $idEquipo = $arayIdEquipos[$cnt];
        $consEqui = $conect->query("SELECT puntos,jugados,ganados,empatados,perdidos,gol_favor,gol_contra FROM equipos WHERE id_equipo='$idEquipo'; ");
        $regEquipo = mysqli_fetch_assoc($consEqui);
        $editJug = $regEquipo['jugados']+1;
        $editGolA = $regEquipo['gol_favor']+$golA;
        $editGolB = $regEquipo['gol_favor']+$golB;
        if($quiniela==0){
            $editPunt = $regEquipo['puntos']+1;
            $editEmp = $regEquipo['empatados']+1;
            $updateEqui = $conect->query("UPDATE equipos SET puntos='$editPunt',jugados='$editJug',empatados='$editEmp',gol_favor='$editGolA',gol_contra='$editGolB' WHERE id_equipo='$idEquipo'; ");
        }elseif($quiniela==1){
            if($flagActualizado == 0){
                $editPunt = $regEquipo['puntos']+3;
                $editGan = $regEquipo['ganados']+1;
                $updateEqui = $conect->query("UPDATE equipos SET puntos='$editPunt',jugados='$editJug',ganados='$editGan',gol_favor='$editGolA',gol_contra='$editGolB' WHERE id_equipo='$idEquipo'; ");
                $flagActualizado++;//El siguiente update el flujo se dirija al else para hacer el update(perdedor) al equipo visitante.
            }else{
                $editPerd = $regEquipo['perdidos']+1;
                $updateEqui = $conect->query("UPDATE equipos SET jugados='$editJug',perdidos='$editPerd',gol_favor='$editGolB',gol_contra='$editGolA' WHERE id_equipo='$idEquipo'; ");
            }
        }else{
            if($flagActualizado == 0){
                $editPerd = $regEquipo['perdidos']+1;
                $updateEqui = $conect->query("UPDATE equipos SET jugados='$editJug',perdidos='$editPerd',gol_favor='$editGolA',gol_contra='$editGolB' WHERE id_equipo='$idEquipo'; ");
                $flagActualizado++;//El siguiente update el flujo se dirija al else para hacer el update(Ganador) Al equipo Visitante.  
            }else{
                $editPunt = $regEquipo['puntos']+3;
                $editGan = $regEquipo['ganados']+1;
                $updateEqui = $conect->query("UPDATE equipos SET puntos='$editPunt',jugados='$editJug',ganados='$editGan',gol_favor='$editGolB',gol_contra='$editGolA' WHERE id_equipo='$idEquipo'; ");
               
            }
        }
        if($consEqui && $updateEqui){    
            //actualizado registro o equipo correctamente,mensaje para el user.
        }
    }
}

function updateTablaJugadoresGol($idPartidoRes,$numJornada,$arayIdJug,$arayGol){ //metodo q recoge los datos para la tabla "jugadores_goles",
        $idUsuario = $_SESSION['id'];                                           // y registra que jugador en q partido y los goles marcados.
        
       for($cnt=0;$cnt<count($arayIdJug);$cnt++){  //DEBUG CASERO 
            echo "----";
            echo "<p>".$arayIdJug[$cnt]."-".$arayGol[$cnt]."</p>";
        
        } 
        $conexion = conectarDB01();
        for($cnt=0;$cnt<count($arayIdJug);$cnt++){
            $valIdJu = $arayIdJug[$cnt];
            $valGol = $arayGol[$cnt];            
            $consInsert = $conexion->query("INSERT INTO jugadores_goles (idfk_jugador,idfk_resultado,goles) VALUES ('$valIdJu','$idPartidoRes','$valGol'); ");
        }
        desconectarDB01($conexion); 
}

function updateTablaPuntosQuiniela($idPartidoRes,$numJornada,$quiniela,$arayIdJug,$arayGol){

        echo "<p>idPartiRes: ".$idPartidoRes." Quiniela:".$quiniela." numIdsJug: ".count($arayIdJug)."</p>";
        $idUser = $_SESSION['id'];
        $conex = conectarDB01();
        $consQuinielas = $conex->query("SELECT id_quinielaga,idfk_user,idfk_resultado,jornada,ids_goleadores,quiniela_user FROM quinielaga WHERE idfk_resultado='$idPartidoRes'; ");
        if($consQuinielas){
            while($regisQuini = mysqli_fetch_assoc($consQuinielas)){
                $puntosQuini = 0;
                echo "<p>QuiniUser: ".$regisQuini['quiniela_user']." </p>"; 
                if($regisQuini['quiniela_user'] == $quiniela){
                    $puntosQuini = $puntosQuini +10; //Acierta la quieniela de ese partido con id=idPartidoRes.
                     echo "<p>puntosQuini: ".$puntosQuini."</p>";
                }
                $cadIdsGoleadores = $regisQuini['ids_goleadores'];
                $idUserQuini = $regisQuini['idfk_user'];
                if($cadIdsGoleadores != ''){
                    $arayIdsGoleadores=explode(",", $cadIdsGoleadores);
                    for($cnt=0;$cnt<count($arayIdsGoleadores);$cnt++){
                        $idJugador = $arayIdsGoleadores[$cnt];
                        echo "<p>idJugador: ".$idJugador."</p>";
                        $consGoleador = $conex->query("SELECT goles FROM jugadores_goles WHERE idfk_jugador='$idJugador' AND idfk_resultado='$idPartidoRes'; ");
                        if($consGoleador->num_rows > 0){
                            $regisJugadorGoleador = mysqli_fetch_assoc($consGoleador);
                            $goles = $regisJugadorGoleador['goles'];
                            echo "<p>goles: ".$goles."</p>";
                            $consJugador = $conex->query("SELECT posicion FROM jugadoresga WHERE id_jugador='$idJugador'; ");
                            $regisJugador = mysqli_fetch_assoc($consJugador);
                            If($regisJugador['posicion']==='DEL'){
                                $puntosJugador = 3;
                            }else if($regisJugador['posicion']==='DEF'){
                                $puntosJugador = 8;
                            }else if($regisJugador['posicion']==='CNT'){
                                $puntosJugador = 5;
                            }else{
                                $puntosJugador = 50; //POT
                            }
                            $puntosQuini = $puntosQuini + ($goles * $puntosJugador);
                            echo "<p>PuntosQuini: ".$puntosQuini."</p>";
                        }
                    }
                }
                echo "<p>idUserQuini: ".$idUserQuini."</p>";
                $consPuntosQuini = $conex->query("SELECT puntosQuini FROM puntos_quiniela WHERE idfk_user='$idUserQuini'; ");
                    
                if($consPuntosQuini->num_rows > 0){
                    $regisPuntosQuini = mysqli_fetch_assoc($consPuntosQuini);
                    $puntosQuiniFinal = $regisPuntosQuini['puntosQuini'] + $puntosQuini;
                    echo "<p>Puntosfinales: ".$puntosQuiniFinal."</p>";
                    $updatePuntosQuini = $conex->query("UPDATE puntos_quiniela SET puntosQuini='$puntosQuiniFinal' WHERE idfk_user='$idUserQuini';; "); //DESARROLLAR LAS FUNCIONES DE PORCENTAJES DE ACIERTOS..
                    echo "<p>Update: ".$updatePuntosQuini."</p>";
                }else{
                    $insertPuntosQuini = $conex->query("INSERT INTO puntos_quiniela (id_puntosQuini,idfk_user,puntosQuini,efect_quiniela,efect_goleadores,efect_total) VALUES ('','$idUserQuini','$puntosQuini','','','')   ; ");
                    echo "<p>insert: ".$insertPuntosQuini."</p>";
                }
            }
        }
}
?>