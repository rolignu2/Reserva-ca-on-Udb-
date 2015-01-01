<?php

require ('class.ConsultaSql.inc.php');

$usuario = $_REQUEST['usuario'];
$query = "SELECT * FROM usuario WHERE id_usuario LIKE '$usuario' ";
$consulta = new Consulta();
$consulta->GetConsulta($query);
$consulta->Resultado();

if($consulta->RowsNums() >=1)
{
	echo "<input type='hidden' name='userok' value='true'/><img src='images/check.png' width='25' height='25'/>";
}
else {
	echo "<input type='hidden'  name='userok' value='false'/><img src='images/equis.png' width='25' height='25'/>";
}

$consulta->CloseConection();


?>
