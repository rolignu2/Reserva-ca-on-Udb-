<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
	<title>Facultad de Ingenieria </title>
	<link rel="stylesheet" media="screen" type="text/css" href="style.css" />
	
	<script src="EstaticRequest.js" language="JavaScript"></script>
	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	left:599px;
	top:10px;
	width:70px;
	height:92px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:178px;
	top:16px;
	width:116px;
	height:111px;
	z-index:1;
}
#apDiv3 {
	position:absolute;
	left:413px;
	top:377px;
	width:425px;
	height:255px;
	z-index:2;
}
#apDiv4 {
	position:absolute;
	left:541px;
	top:469px;
	width:193px;
	height:25px;
	z-index:3;
}
#apDiv5 {
	position:absolute;
	left:541px;
	top:511px;
	width:195px;
	height:25px;
	z-index:4;
}
#apDiv6 {
	position:absolute;
	left:697px;
	top:369px;
	width:271px;
	height:52px;
	z-index:2;
}
#apDiv7 {
	position:absolute;
	left:958px;
	top:20px;
	width:48px;
	height:34px;
	z-index:2;
}
#apDiv8 {
	position:absolute;
	left:673px;
	top:25px;
	width:275px;
	height:37px;
	z-index:3;
}
#apDiv9 {
	position:absolute;
	left:961px;
	top:67px;
	width:48px;
	height:38px;
	z-index:4;
}
#apDiv10 {
	position:absolute;
	left:673px;
	top:74px;
	width:276px;
	height:38px;
	z-index:5;
}
-->
    </style>
</head>

  <body>
  	<?php
	session_start(); //no tocar inicio de sesion 
	
	if(!isset($_SESSION['user']))
	{
	  	header("Location: index.php");
		exit();
	} 
	
	?>
  
<div id="apDiv2"><img src="images/reserva.jpg" width="115" height="109" /></div>
<div id="apDiv7"> <img src="images/facultad.png" alt="facultad" width="41" height="35" /></div>
<div id="apDiv8"><span class="cls">
<?php
	
	  $nombre = $_SESSION['nombre'];
	  $apellido = $_SESSION['apellido'];
	  $rol = $_SESSION['rol'];
	  $facultad = $_SESSION['facultad'];
	  
	  echo "<b><font color='black' size=+1> Facultda de $facultad</font></b>";
	
	?>
 </span></div>
<div id="apDiv9"><img src="images/user.png" alt="usuario" width="45" height="39" /></div>
<div id="apDiv10">
<?php 

 echo "<b><font color='black' size=+1> $nombre $apellido</font></b>";

?>
</div>
<div id="container">
      <div id="body_space">
        <div id="header">
          <div id="logo-block">
		    <!-- type your logo and small slogan here -->
            <p align="center" id="logo"> Reservas
            	<span class="logoblue">Equipo
            		
            	</span>
            </p>
            <p align="center" id="slogan"><?php echo "Sistema de reserva de activos. Usuario: $rol ";  ?></p>
			<!-- end logo and small slogan -->
		  </div>
		  <div class="cls"></div>
  		  <div id="top-nav-bg">
            <div id="top-nav">
			  <!-- start top navigation bar -->
              <ul>
                <li><a href="main.php">Home</a></li>
                <?php 
                  if($_SESSION['rol'] == "administrador" || $_SESSION['rol'] == 'root'){
				        echo  "<li><a href='equipos.php'>Equipos disponibles</a></li>";
                  		echo  "<li><a href='usuario.php'>Agregar usuario</a></li>";
				  }
                ?>
                <li><a href="solicitud.php">Agregar Agregar Solicitud</a></li>
                 <li><a href="logout.php">Cerrar Sesion</a></li>
              </ul>
			  <!-- end top navigation bar -->
            </div>
	      </div>
	    </div>
	    <p> <img src="images/banner1.jpg" width="960" height="194" /></p>

	
	    <div align="center">
	    <font color="Red" size=+2>Aministrar Prestamos</font>
	    <br><br>
	    <font color="blue">Buscar Prestamo </font><input type="text" name='buscar' style="-moz-border-left-colors:" onkeyup="GetRequest(this.value , 'request' , 'buscar.php?id=')"/>
		<div id='request'>
			
		<?php
		
	      $fecha_cambiada = mktime(0,0,0,date("m"),date("d")+6,date("Y"));
		  $fechaN = date("Y-m-d", $fecha_cambiada);
		  $fechafinal = $fechaN;
		  
		  $hoy = date('Y-m-d');
		  $diaFin = date("d", $fecha_cambiada);
		  $diaIni = date('d');
		  $mes = date('M');
		
		  $query = "SELECT solicitud.id_solicitud,
		  solicitud.descripcion , 
		  solicitud.fecha_solicitud , 
		  solicitud.hora_inicio ,
		  solicitud.hora_final ,
		  solicitud.canion,
		  solicitud.laptop,
		  solicitud.aula,
		  solicitud.estado_solicitud,
		  usuario.id_usuario 
		  FROM solicitud 
		  LEFT OUTER JOIN usuario ON solicitud.id_usuario = usuario.id_usuario
		  WHERE solicitud.fecha_solicitud between '$hoy' AND '$fechafinal'";
		
		  $dia = date('d');
		  $find = date('d') + 6;
		  $mes = date('M');
		
		  echo "<br><font color='green' size=+1>Semana del $diaIni al $diaFin de $mes </font><br><br>";
		
		   obtenerdatos($query)
		
		?>
		
			
		</div>

		
		
		<?php
		
	
		
		function obtenerdatos($query)
		{
		  	
		  require_once ('class.ConsultaSql.inc.php');
			
		   $consulta = new Consulta();
		   $consulta2 = new Consulta();
		   $consulta3 = new Consulta();
		   
		   
		   $query1 = "SELECT audiovisual.id_audiovisual , modelo.modelo , marca.marca FROM audiovisual
	   		LEFT OUTER JOIN tipo ON audiovisual.id_tipo = tipo.id_tipo
	   		LEFT OUTER JOIN marca ON audiovisual.id_marca = marca.id_marca
	   		LEFT OUTER JOIN modelo ON audiovisual.id_modelo = modelo.id_modelo
	   		WHERE estado like 1 and prestado like 0 and tipo.tipo like 'Canion' ";
	   		
	   	   $query2 = "SELECT audiovisual.id_audiovisual , modelo.modelo , marca.marca FROM audiovisual
	   		LEFT OUTER JOIN tipo ON audiovisual.id_tipo = tipo.id_tipo
	   		LEFT OUTER JOIN marca ON audiovisual.id_marca = marca.id_marca
	   		LEFT OUTER JOIN modelo ON audiovisual.id_modelo = modelo.id_modelo
	   		WHERE estado like 1 and prestado like 0 and tipo.tipo like 'Laptop' ";
		   
		   $consulta->GetConsulta($query);
		   $consulta2->GetConsulta($query1);
		   $consulta3->GetConsulta($query2);
		   
			
		   $colores = array( 0=> 'white' , 1=>'Gray');
		   $valor = 0;
		   
		  
		  
		    echo "<table border='0' >";
			echo "<tr>";
			echo "<td bgcolor='Silver' ><font color='black'>Descripcion de Uso</font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Rango de Hora </font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Cañon </font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Laptop</font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Local</font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Fecha de Solicitud</font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Solicitante</font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Estado Solicitud</font></td>";
			echo "<td bgcolor='Silver'><font color='black'></font></td>";
			echo "<td bgcolor='Silver'><font color='black'></font></td>";
			echo "<tr>";
			
			
			while ($a = $consulta->Resultado()) 
			{
				   
				    
					echo "<tr>";
					echo "<td bgcolor='$colores[$valor]'><font color='black'>$a[descripcion]</font></td>";
					echo "<td bgcolor='$colores[$valor]'><font color='black'>$a[hora_inicio] - $a[hora_final]</font></td>";
					if($a['canion'] == 1)
						echo "<td bgcolor='$colores[$valor]'><font color='black'>Si</font></td>";
					else
						echo "<td bgcolor='$colores[$valor]'><font color='black'>No</font></td>";
					
					if($a['laptop'] == 1)
						echo "<td bgcolor='$colores[$valor]'><font color='black'>Si</font></td>";
					else
						echo "<td bgcolor='$colores[$valor]'><font color='black'>No</font></td>";	

					echo "<td bgcolor='$colores[$valor]'><font color='black'>$a[aula]</font></td>";
				    echo "<td bgcolor='$colores[$valor]'><font color='black'>$a[fecha_solicitud]</font></td>";
                    echo "<td bgcolor='$colores[$valor]'><font color='black'>$a[id_usuario]</font></td>";
                 
					if($a['estado_solicitud'] == 1)
					{
						echo "<form method='get' action='GuardarAdministrar.php'>";
						echo "<td bgcolor='$colores[$valor]'><input type='checkbox' name='optestado' value='1' checked /><input type='hidden' name='id' value='$a[id_solicitud]'/>";
						echo "  <input type='submit' value='Guardar' name='save'/></td>";
					    echo "</form>";
					}
					else
					{
						echo "<form method='get' action='GuardarAdministrar.php'>";
						echo "<td bgcolor='$colores[$valor]'><input type='checkbox' name='optestado' value='1' /><input type='hidden' name='id' value='$a[id_solicitud]'/>";
						echo "  <input type='submit' value='Guardar' name='save'/>";
						echo "<input type='hidden' name='fecha_solicitud' value='$a[fecha_solicitud]'/>";
						echo "<input type='hidden' name='hinicio' value='$a[hora_inicio]'/>";
						echo "<input type='hidden' name='hfinal' value='$a[hora_final]'/>";
						echo "<input type='hidden' name='uid' value='$a[id_usuario]'/>";
						echo "<br><select name='canion'>";
						echo "<option value=''>Cañon</option>";
						while($c = $consulta2->Resultado())
						{
							echo "<option value='$c[id_audiovisual]'>$c[marca]:$c[modelo]</option>";
						}
						 
						echo "</select>";
					    echo "<br><select name='laptop'>";
						echo "<option value=''>Laptop</option>";
						while($c = $consulta3->Resultado())
						{
							echo "<option value='$c[id_audiovisual]'>$c[marca]:$c[modelo]</option>";
						}
						echo "</select><br></td>";
						echo "</form>";
					}
					
					
					echo "<td bgcolor='$colores[$valor]'><a href='modificar.php?id=$a[id_solicitud]&server=$_SERVER[REQUEST_URI]'>Modificar</a></td>";
					echo "<td bgcolor='$colores[$valor]'><a href='eliminar.php?id=$a[id_solicitud]&server=$_SERVER[REQUEST_URI]'>Eliminar</a></td>";
					
					echo "<tr>";
				    
				    
				    if($valor == 1 ) 
				    		$valor = 0;
					else 
						$valor++;

			}
			
			
            echo "</table>";
			
			if($consulta->RowsNums() == 0)
			{
              echo "<img src='images/icono_advertencia' /><font color='black'>    No se encontro Registro </font>";
			}
			else {
				echo "<br><br>";
				echo "<img src='images/icono_caja_busqueda' /><font color='blue'>   " . $consulta->RowsNums() ." Registro(s) encontrado(s)</font>";
			}
			
            echo "<br><br>";
            
            $consulta->CloseConection();
			
			return null;
		}
		
	
		
		?>
		</div>
		
      </div>
  </div>
</body>
</html>