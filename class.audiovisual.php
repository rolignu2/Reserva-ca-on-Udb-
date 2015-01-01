

<?php


class Audiovisual extends Consulta
{

	private $query = "";
	
	private function ExisteCanion()
	{
	   
	   $this->query = "SELECT * FROM audiovisual
	   LEFT OUTER JOIN tipo ON audiovisual.id_tipo = tipo.id_tipo
	   WHERE estado like 1 and prestado like 0 and tipo.tipo like 'Canion' ";
	   
	   $this->GetConsulta($this->query);
	   $this->Resultado();
	   
	   if($this->RowsNums() >= 1) return TRUE;
	   else  return FALSE;
	   
	}
	
	private function ExisteLaptop()
	{
		
	   $this->query = "SELECT * FROM audiovisual
	   LEFT OUTER JOIN tipo ON audiovisual.id_tipo = tipo.id_tipo
	   WHERE estado like 1 and prestado like 0 and tipo.tipo like 'Laptop' ";
	   
	   $this->GetConsulta($this->query);
	   $this->Resultado();
	   
	   if($this->RowsNums() >= 1) return TRUE;
	   else  return FALSE;
		
	}
	
	
	public function VerificarAudivisual()
	{
		$arreglo = array( 'canion' => FALSE , 'laptop' => FALSE);
		
		if($this->ExisteCanion() == TRUE)
		{
			$arreglo['canion'] = TRUE;
		}
		
		if($this->ExisteLaptop() == TRUE)
		{
			$arreglo['laptop'] = TRUE;
		}
		
		return $arreglo;
		
	}
	
	public function ActualizarAudiovisual($id_usuario , $fecha , $horaini , $horafin , $canion = false , $laptop = false)
	{
			
	$existentes = $this->VerificarAudivisual();
		
   		if($laptop == TRUE){
		
		if($existentes['laptop'] == TRUE)
		{
			  	
			 $this->query = "SELECT id_audiovisual FROM audiovisual
	   		 LEFT OUTER JOIN tipo ON audiovisual.id_tipo = tipo.id_tipo
	   		 WHERE estado like 1 and prestado like 0 and tipo.tipo like 'Laptop' ";
			 
	  	     $this->GetConsulta($this->query);
	   		 $resultado = $this->Resultado();		
				
			 $this->query = "UPDATE audiovisual
	  		 LEFT OUTER JOIN tipo ON audiovisual.id_tipo = tipo.id_tipo
	  		 SET audiovisual.prestado = 1,
	  		 audiovisual.id_usuario = '$id_usuario', 
	  		 audiovisual.fecha ='$fecha',
	  		 audiovisual.horainicio = '$horaini',
	  		 audiovisual.horafin = '$horafin'
	         WHERE estado like 1 and tipo.tipo like 'Laptop' and audiovisual.id_audiovisual = '$resultado[id_audiovisual]' ";
	   
	         $this->GetConsulta($this->query);
			
		}
	}
   
   if($canion == TRUE){
		
		if($existentes['canion'] == TRUE)
		{
			 	
			 $this->query = "SELECT id_audiovisual FROM audiovisual
	   		 LEFT OUTER JOIN tipo ON audiovisual.id_tipo = tipo.id_tipo
	   		 WHERE estado like 1 and prestado like 0 and tipo.tipo like 'Canion' ";
			 
	  	     $this->GetConsulta($this->query);
	   		 $resultado = $this->Resultado();		
				
			 $this->query = "UPDATE audiovisual
	  		 LEFT OUTER JOIN tipo ON audiovisual.id_tipo = tipo.id_tipo
	  		 SET audiovisual.prestado = 1,
	  		 audiovisual.id_usuario = '$id_usuario',
	  		 audiovisual.fecha ='$fecha',
	  		 audiovisual.horainicio = '$horaini',
	  		 audiovisual.horafin = '$horafin'
	         WHERE estado like 1 and tipo.tipo like 'Canion' and audiovisual.id_audiovisual = '$resultado[id_audiovisual]' ";
	   
	         $this->GetConsulta($this->query);
			
		}
   }
   
		
}


	public function SetAudiovisual( $id_solicitud )
{
	
	$this->query = "SELECT id_usuario , fecha_solicitud , hora_inicio , hora_final
	FROM solicitud WHERE id_solicitud LIKE '$id_solicitud' ";
	
	 
	$this->GetConsulta($this->query);
	$resultado = $this->Resultado();	
		
	
	$this->query = "UPDATE audiovisual 
	SET prestado = 0,
	id_usuario = NULL,
	fecha = NULL,
	horainicio = NULL,
	horafin=NULL
	WHERE id_usuario LIKE '$resultado[id_usuario]' 
	AND fecha LIKE '$resultado[fecha_solicitud]' 
	AND horainicio LIKE '$resultado[hora_inicio]' 
	AND horafin LIKE '$resultado[hora_final]' ";
	
	$this->GetConsulta($this->query);		
}


	public function Actualizar($id_usuario , $fecha , $horaini , $horafin , $canion  , $laptop )
	{
	
   		if(!empty($laptop) ){
				
			 $this->query = "UPDATE audiovisual
	  		 LEFT OUTER JOIN tipo ON audiovisual.id_tipo = tipo.id_tipo
	  		 SET audiovisual.prestado = 1,
	  		 audiovisual.id_usuario = '$id_usuario', 
	  		 audiovisual.fecha ='$fecha',
	  		 audiovisual.horainicio = '$horaini',
	  		 audiovisual.horafin = '$horafin'
	         WHERE estado like 1 and tipo.tipo like 'Laptop' and audiovisual.id_audiovisual = '$laptop' ";
	   
	         $this->GetConsulta($this->query);
			
		}
   
   if(!empty($canion)){
			 	
				
			 $this->query = "UPDATE audiovisual
	  		 LEFT OUTER JOIN tipo ON audiovisual.id_tipo = tipo.id_tipo
	  		 SET audiovisual.prestado = 1,
	  		 audiovisual.id_usuario = '$id_usuario',
	  		 audiovisual.fecha ='$fecha',
	  		 audiovisual.horainicio = '$horaini',
	  		 audiovisual.horafin = '$horafin'
	         WHERE estado like 1 and tipo.tipo like 'Canion' and audiovisual.id_audiovisual = '$canion' ";
	   
	         $this->GetConsulta($this->query);
   }
   
		
}

	
	
}

?>