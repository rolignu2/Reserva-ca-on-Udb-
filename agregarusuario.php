
<?php

require ('class.ConsultaSql.inc.php');
require ('class.seguridad.php');


$seguridad = new security();
$consulta = new Consulta();

$usuario = $_GET['usuario'];
$verusuario = $_GET['userok'];
$password = $_GET['pass2'];
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$facutad = $_GET['optfacultad'];
$roles = $_GET['ruser'];

$arreglo = array(0=> $nombre , 1=> $apellido , 2=>$facutad);


if($seguridad->EstaVacio($arreglo) >=1)
{
	header("Location: usuario.php?campos=0");
	exit();
}
if($verusuario == 'false')
{
	header("Location: usuario.php?campos=1");
	exit();
}

$uid = $seguridad->GetAbb($nombre, $apellido) . $seguridad->Random();


$query= "INSERT INTO usuario (id_usuario , nombre , apellido , Facultad , id_seguridad , id_rol)
VALUES ('$uid' , '$nombre' , '$apellido' , '$facutad' , '$uid' , '$uid' )";

$consulta->GetConsulta($query);

$query= "INSERT INTO seguridad (id_seguridad , usuario , clave)
VALUES ('$uid' , '$usuario' , '$password')";

$consulta->GetConsulta($query);

$query= "INSERT INTO rol (id_rol , rol )
VALUES ('$uid' , '$roles' )";

$consulta->GetConsulta($query);

$consulta->CloseConection();

header("Location: usuario.php?campos=2");
exit();

?>