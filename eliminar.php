<?php

require_once ('class.ConsultaSql.inc.php');
require_once('class.seguridad.php');
require_once 'class.audiovisual.php';

$consulta = new Consulta();
$seguridad = new security();
$audiovisual = new Audiovisual();

$id = $_REQUEST['id'];
$server = $_REQUEST['server'];

$query = "DELETE FROM solicitud WHERE id_solicitud LIKE $id";


$audiovisual->SetAudiovisual($id);
$consulta->GetConsulta($query);

if($consulta->RowsNums() >= 1)
{
	header('Location:' . $seguridad->GetServer($server));
	
}
else if($consulta->RowsNums() <=0)
{
	header('Location:' . $seguridad->GetServer($server));

}

$consulta->CloseConection();


?>