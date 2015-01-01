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
	  $id = $_SESSION['uid'];
	  
	  echo "<b><font color='black' size=+1> Facultda de $facultad</font></b>";
	
	?>
 </span></div>
<div id="apDiv9"><img src="images/user.png" alt="usuario" width="45" height="39" /></div>
<div id="apDiv10">
<?php 

 echo "<b><font color='black' size=+1> $nombre $apellido </font></b>";

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
				 		echo  "<li><a href='administrar.php'>Administrar solicitud</a></li>";
                  		echo  "<li><a href='usuario.php'>Agregar usuario</a></li>";
				  }
                ?>
                <li><a href="solicitud.php">Agregar Solicitud</a></li>
                 <li><a href="logout.php">Cerrar Sesion</a></li>
              </ul>
            </div>
	      </div>
	    </div>
	    <p> <img src="images/banner1.jpg" width="960" height="194" /></p>
        
	

	    <form method="get" action="agregar_equipo.php">
	    
	    <div align="center">
	    <br />
	    <br />
	    <font color="brown" size=+2><b>Administracion de Equipos</b></font>	
	    <br />
	    <br />
	    <input type="submit" name="agregar" value="Agregar Nuevo Equipo" />	
	    <br />	
	    <br />	
	    
		<?php
		
		$query = "SELECT 
		audiovisual.id_audiovisual as id,
		audiovisual.prestado , 
		audiovisual.estado ,
		audiovisual.id_usuario,
		audiovisual.fecha,
		marca.marca,
		modelo.modelo,
		tipo.tipo 
		FROM audiovisual
		LEFT JOIN marca ON audiovisual.id_marca = marca.id_marca
		LEFT JOIN modelo ON audiovisual.id_modelo = modelo.id_modelo
		LEFT JOIN tipo ON audiovisual.id_tipo = tipo.id_tipo ORDER BY tipo.tipo";
		
		obtenerdatos($query);

		
		
		function obtenerdatos($query)
		{
		  	
		   require_once ('class.ConsultaSql.inc.php');
			
		
		 
		   $colores = array( 0=> 'white' , 1=>'Gray');
		   $valor = 0;
		   
		   $consulta = new Consulta();
		   $consulta->GetConsulta($query);
		  
		  
		    echo "<font color='brown' size=+2><b>Administrar Cañon </b></font>";
		    echo "<table border='0' >";
			echo "<tr>";
			echo "<td bgcolor='Silver' ><font color='black'>Tipo  </font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Modelo  </font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Marca </font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Prestado  </font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Docente Prestado  </font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Fecha Prestamo</font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Estado  </font></td>";
			echo "<td bgcolor='Silver'><font color='black'></font></td>";
			echo "<td bgcolor='Silver'><font color='black'></font></td>";
			echo "<tr>";
			
			
			while ($a = $consulta->Resultado()) 
			{
				    	
				   
				    if($a['tipo'] == 'Canion'){
						
					echo "<tr>";
					echo "<td bgcolor='$colores[$valor]'><font color='black'>$a[tipo]</font></td>";
					echo "<td bgcolor='$colores[$valor]'><font color='black'>$a[modelo]</font></td>";
					echo "<td bgcolor='$colores[$valor]'><font color='black'>$a[marca]</font></td>";
					
				
					if($a['prestado'] == 1)
						echo "<td bgcolor='$colores[$valor]'><font color='black'><input type='checkbox' value='1' name='laptopprestado' checked /></font></td>";
					else
						echo "<td bgcolor='$colores[$valor]'><font color='black'>No</font></td>";	
						
					if($a['id_usuario'] == NULL)
						echo "<td bgcolor='$colores[$valor]'><font color='black'>Libre</font></td>";
					else
						echo "<td bgcolor='$colores[$valor]'><font color='black'>$a[id_usuario]</font></td>";
						
					
					echo "<td bgcolor='$colores[$valor]'><font color='black'>$a[fecha]</font></td>";	
					
					
					if($a['estado'] == 1)
						echo "<td bgcolor='$colores[$valor]'><font color='black'>Activo</font></td>";
					else
						echo "<td bgcolor='$colores[$valor]'><font color='black'>No Activo</font></td>";	
						

			
					echo "<td bgcolor='$colores[$valor]'><a href='modificar_equipo.php?id=$a[id]'>Modificar</a></td>";
					echo "<td bgcolor='$colores[$valor]'><a href='eliminar_equipo.php?id=$a[id]'>Eliminar</a></td>";
					echo "<tr>";
					
					}
				 
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
		
			
            echo "<br><br><br><br>";
            
            $consulta->CloseConection();
            
           $valor = 0;
		   $consulta = new Consulta();
		   $consulta->GetConsulta($query);
		  
		  
		    echo "<font color='brown' size=+2><b>Administrar Laptop </b></font>";
		    echo "<table border='0' >";
			echo "<tr>";
			echo "<td bgcolor='Silver' ><font color='black'>Tipo  </font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Modelo  </font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Marca </font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Prestado  </font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Docente Prestado  </font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Fecha Prestamo</font></td>";
			echo "<td bgcolor='Silver'><font color='black'>Estado  </font></td>";
			echo "<td bgcolor='Silver'><font color='black'></font></td>";
			echo "<td bgcolor='Silver'><font color='black'></font></td>";
			echo "<tr>";
			
			
			while ($a = $consulta->Resultado()) 
			{
				    	
				   
				    if($a['tipo'] == 'Laptop'){
						
					echo "<tr>";
					echo "<td bgcolor='$colores[$valor]'><font color='black'>$a[tipo]</font></td>";
					echo "<td bgcolor='$colores[$valor]'><font color='black'>$a[modelo]</font></td>";
					echo "<td bgcolor='$colores[$valor]'><font color='black'>$a[marca]</font></td>";
					
				
					if($a['prestado'] == 1)
						echo "<td bgcolor='$colores[$valor]'><font color='black'><input type='checkbox' value='1' name='laptopprestado' checked /></td>";
					else
						echo "<td bgcolor='$colores[$valor]'><font color='black'>No</font></td>";
						
					if($a['id_usuario'] == NULL)
						echo "<td bgcolor='$colores[$valor]'><font color='black'>Libre</font></td>";
					else
						echo "<td bgcolor='$colores[$valor]'><font color='black'>$a[id_usuario]</font></td>";	
					
					echo "<td bgcolor='$colores[$valor]'><font color='black'>$a[fecha]</font></td>";			
					
					if($a['estado'] == 1)
						echo "<td bgcolor='$colores[$valor]'><font color='black'>Activo</font></td>";
					else
						echo "<td bgcolor='$colores[$valor]'><font color='black'>No Activo</font></td>";	
						

			
					echo "<td bgcolor='$colores[$valor]'><a href='modificar_equipo.php?id=$a[id]'>Modificar</a></td>";
					echo "<td bgcolor='$colores[$valor]'><a href='eliminar_equipo.php?id=$a[id]'>Eliminar</a></td>";
					echo "<tr>";
					
					}
				 
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
				echo "<img src='images/icono_caja_busqueda' /><font color='blue'>   " . $consulta->RowsNums() ." Registro(s) encontrado(s) Cañon y Laptop </font>";
			}
			
            echo "<br><br><br><br>";
            
            $consulta->CloseConection();
            
            
			
			return null;
		}
		
		
		?>
	 
		</form>
		</div>
      </div>
  </div>
</body>
</html>