/* Clase encargada de gestionar las conexiones a la base de datos */

Class conexiondb{
 
private $servidor;
private $usuario;
private $password;
private $base_datos;
private $link;
private $stmt;
private $array;
 
static $_instance;
 
/*La funcion construct es privada para evitar que el objeto pueda ser creado mediante new*/

private function __construct(){
	$this-&gt;setConexion();
	$this-&gt;conectar();
}
 
/*Metodo para establecer los parametros de la conexion*/

private function setConexion(){
	$conf = configuracion::getInstance();
	$this-&gt;servidor=$conf-&gt;getHostDB();
	$this-&gt;base_datos=$conf-&gt;getDB();
	$this-&gt;usuario=$conf-&gt;getUserDB();
	$this-&gt;password=$conf-&gt;getPassDB();
}
 
/*Evitamos el clonaje del objeto. Patron Singleton*/

private function __clone(){ }
 
/*Funcion encargada de crear, si es necesario, el objeto. Esta es la funcion que debemos llamar desde fuera de la clase para instanciar el objeto, y as��, poder utilizar sus m��todos*/

public static function getInstance(){
	if (!(self::$_instance instanceof self)){
	self::$_instance=new self();
	}
return self::$_instance;
}
 
/*Realiza la conexion a la base de datos.*/
private function conectar(){
	$this-&gt;link=mysql_connect($this-&gt;servidor, $this-&gt;usuario, $this-&gt;password);
	mysql_select_db($this-&gt;base_datos,$this-&gt;link);
	@mysql_query("SET ID_USUARIO,ID_ALUMNO,ID_CURSO_SOLICITADO 'utf8'");
}
 
/*Metodo para ejecutar una sentencia sql*/

public function ejecutar($sql){
	$this-&gt;stmt=mysql_query($sql,$this-&gt;link);
	return $this-&gt;stmt;
}
 
/*Metodo para obtener una fila de resultados de la sentencia sql*/

public function obtener_fila($stmt,$fila){
	if ($fila==0){
	$this-&gt;array=mysql_fetch_array($stmt);
	}else{
	mysql_data_seek($stmt,$fila);
	$this-&gt;array=mysql_fetch_array($stmt);
	}
return $this-&gt;array;
}
 
//Devuelve el ultimo id del insert introducido
public function lastID(){
	return mysql_insert_id($this-&gt;link);
}
 
}
