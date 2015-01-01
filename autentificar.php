
<?php

require_once('class.seguridad.php');
require_once ('class.ConsultaSql.inc.php');


$seguridad = new security();
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$campos = array(0 => $username , 1 => $password);

if($seguridad->EstaVacio($campos) >=1)
{
	header("Location: index.php?vacio=1");
	exit();
}


$consulta = new Consulta();

$query = "SELECT 
usuario.id_usuario as id,
usuario.nombre as unombre , 
usuario.apellido as uapellido ,
usuario.facultad as facultad, 
seguridad.usuario as user ,
seguridad.clave as pass,
rol.rol as rol
FROM usuario
LEFT OUTER JOIN seguridad ON usuario.id_seguridad = seguridad.id_seguridad
LEFT OUTER JOIN rol ON usuario.id_rol = rol.id_rol
WHERE seguridad.usuario LIKE '$username' AND seguridad.clave LIKE '$password'";


$consulta->GetConsulta($query);
if($consulta->Resultado() == FALSE)
{
	header("Location: index.php?usuario=0");
	exit();
}


session_start();

$consulta->GetConsulta($query);
$arreglo = $consulta->Resultado();

$_SESSION['uid'] = $arreglo['id'];
$_SESSION['nombre'] = $arreglo['unombre'];
$_SESSION['apellido'] = $arreglo['uapellido'];
$_SESSION['user'] = $arreglo['user'];
$_SESSION['password'] = $arreglo['pass'];
$_SESSION['rol'] = $arreglo['rol'];
$_SESSION['facultad'] = $arreglo['facultad'];

//echo $seguridad->GetAbb($arreglo['unombre'] , $arreglo['uapellido']);
//echo $seguridad->Random();

header("Location: main.php");

?>