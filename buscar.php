

<?php

require ('class.ConsultaSql.inc.php');

$carnet = $_REQUEST['id'];


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
		  WHERE solicitud.id_usuario LIKE '$carnet' ORDER BY solicitud.fecha_solicitud";

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
                    
					$script = "'GuardarAdministrar.php'";
                 
					if($a['estado_solicitud'] == 1)
					{
						echo "<form method='get' action='$script' name='frm1'>";
						echo "<td bgcolor='$colores[$valor]'><input type='checkbox' name='optestado' value='1' checked /><input type='hidden' name='id' value='$a[id_solicitud]'/>";
						echo "  <input type='submit' value='Guardar' name='save'/></td>";
					    echo "</form>";
					}
					else
					{
						
						echo "<form method='get' action='GuardarAdministrar.php' name='frm1' >";
						echo "<td bgcolor='$colores[$valor]'><input type='checkbox' name='optestado' value='1' /><input type='hidden' name='id' value='$a[id_solicitud]'/>";
						echo "<input type='submit' value='Guardar' name='save'/>";
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

?>