<?php
require ('class.ConsultaSql.inc.php');
require_once 'class.audiovisual.php';

$activo = NULL;
$sid = $_GET['id'];

if(!isset($_GET['optestado']))
	$activo = 0;
else if(isset($_GET['optestado']))
	$activo = $_GET['optestado'];

$ecanion = NULL;
$elaptop = NULL;

if(empty($_GET['canion']))$ecanion=0;
else $ecanion=1;

if(empty($_GET['laptop']))$elaptop=0;
else $elaptop=1;


$query = "UPDATE solicitud SET 
estado_solicitud = '$activo',
canion = $ecanion,
laptop = $elaptop
WHERE id_solicitud LIKE '$sid'";
 
$consulta = new Consulta();
$audiovisual = new Audiovisual();

if($activo== 0)
{
	$audiovisual->SetAudiovisual($sid);
}
else
{
	
	$uid = $_GET['uid'];
	$fecha = $_GET['fecha_solicitud'];
	$hinicio = $_GET['hinicio'];
	$hfinal = $_GET['hfinal'];
	$idcanion = $_GET['canion'];
	$idlaptop = $_GET['laptop'];
	$audiovisual->Actualizar($uid , $fecha , $hinicio , $hfinal , $idcanion  , $idlaptop );
}

$consulta->GetConsulta($query);

header("Location: administrar.php");

?>