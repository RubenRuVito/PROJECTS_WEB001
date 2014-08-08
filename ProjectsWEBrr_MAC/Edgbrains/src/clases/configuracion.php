Class configuracion
{
private $_domain;
private $_userdb;
private $_passdb;
private $_hostdb;
private $_db;
 
static $_instance;
 
private function __construct(){
require 'config.php';
$this-&gt;_domain=$domain;
$this-&gt;_userdb=$user;
$this-&gt;_passdb=$password;
$this-&gt;_hostdb=$host;
$this-&gt;_db=$db;
}
 
private function __clone(){ }
 
public static function getInstance(){
if (!(self::$_instance instanceof self)){
self::$_instance=new self();
}
return self::$_instance;
}
 
public function getUserDB(){
$var=$this-&gt;_userdb;
return $var;
}
 
public function getHostDB(){
$var=$this-&gt;_hostdb;
return $var;
}
 
public function getPassDB(){
$var=$this-&gt;_passdb;
return $var;
}
 
public function getDB(){
$var=$this-&gt;_db;
return $var;
}
 
}