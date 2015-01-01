<!DOCTYPE HTML>
<html>
<head>
		<title>Datos Usuario</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" href="Hoja_Estilo.css" />
	<link href='http://fonts.googleapis.com/css?family=Russo+One' rel='stylesheet'>
	<link href='http://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet' type='text/css'>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body {
	background-image: url(images/bg.jpg);
}
#apDiv1 {
	position:absolute;
	left:577px;
	top:136px;
	width:112px;
	height:108px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:409px;
	top:269px;
	width:474px;
	height:72px;
	z-index:1;
}
#apDiv3 {
	position:absolute;
	left:288px;
	top:139px;
	width:461px;
	height:78px;
	z-index:2;
}
.Estilo1 {color: #FFFFFF}
#apDiv4 {
	position:absolute;
	left:549px;
	top:588px;
	width:259px;
	height:34px;
	z-index:3;
}
-->
</style></head>
<body>
<form method="get" action="autentificar.php" id="formulario">
<div id="apDiv2">
  <h1>Acceso de Usuario</h1>
</div>
<div id="apDiv3"><img src="images/header.jpg" alt="header" width="702" height="82"></div>

<center>
<h1>&nbsp;</h1>
<div id='textoPr'>
  <p><br>
      <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><br>
    <br>
        </p>
  <table summary="" >

<tr>
<td><span class="Estilo1">Usuario:</span> </td>
<td><input type="text" name="username"></td>
</tr>
<tr>
<td><span class="Estilo1">Clave: </span></td>
<td><input type="password" name="password"></td>
</tr>

	<?php
  	
				if(isset($_REQUEST['vacio']))
				{
					echo "<tr><font color='red' size=+1>Uno o mas campos esta vacio</font></tr>";
				}
				else if(isset($_REQUEST['usuario']))
				{
				   echo "<tr><font color='red' size=+1>Este Usuario No Existe</font></tr>";
				}
				
	?>

</table>
<input type="submit" id="btnSubmit" value="Ingresar ">
<br>
</div>

</center>

</body>
</html>