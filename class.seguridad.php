

<?php

/*FUNCIONES NECESARIAS */


class security
{

	
	function __construct(){}
	
	public function GetHorasClases($name)
	{
		$h = 6;
		$m = 50;
		
		echo "<select name='$name'>";
		
		echo "<option value=6:10:00>6:10:00</option>";
		
		  for($i = 0 ; $i < 15 ; $i++)
		  {
			$arr = array();
			
			array_push($arr , $h);
			array_push($arr , $m);
			array_push($arr , "00");
						
			$HoraT = implode(":", $arr);
			$h +=1;
			
			echo "<option value=$HoraT>$HoraT</option>";	
			
			if($m < 40)
				$m += 40;
			else 
			    $m = 10;
			
			
		  }
				
		echo "</select>";
	}
	
	
	public function GetServer($param)
	{
		$arreglo = explode("/", $param);
		$conteo =  count($arreglo);
        return $arreglo[$conteo - 1];
	}
	
	
	public function EstaVacio($params)
	{
		
	   if(is_array($params))
	   {
	   	
		$cont = 0;
	   	 
		 foreach ($params as $key => $value) {
			 if(empty($value))
			 {
			 	$cont++;
			 }
		 }
		 
		 return $cont;
	   }
	   else 
	   {
		   if(empty($params)) return 1;
	   }
	}
	
	
	public function Random()
	{
		
		$arreglo = array();
	
		for($i = 0 ; $i < 2; $i++)
		{
			$valor = rand(100,999);
			array_push($arreglo , $valor);
		}
	
		$numero = implode("", $arreglo);
	
		return $numero;
	}
	
	public function GetAbb($param1 , $param2)
	{
		
		$arreglo = array();
		$arrver = explode(" ", $param2);
		$valor = "";
		
		if(is_array($arrver) AND array_count_values($arrver) >= 2)
		{
			array_push($arreglo ,  strtoupper($param2[0]));
			array_push($arreglo , strtoupper($param2[1]));
		
			$valor = implode("", $arreglo);
		}
		else {
					
			array_push($arreglo ,  strtoupper($param2[0]));
			array_push($arreglo , strtoupper($param2[1]));
		
			$valor = implode("", $arreglo);
		}

		return $valor;
	}
	
	
	
public function aulas()
{
	
$aulas=array
(
"A" =>array
   (
    $A[0]="A11",
    $A[1]="A12",
    $A[2]="A13b",
    $A[3]="A15a",
    $A[4]="A15b",
    $A[5]="A16a",
    $A[6]="A16b",
    $A[7]="A17a",
    $A[8]="A17b",
    $A[9]="A21",
    $A[10]="A22",
    $A[11]="A23",
    $A[12]="A24",
    $A[13]="A25",
    $A[14]="A26",
    $A[15]="A31", 
    $A[16]="A32a",
    $A[17]="A32b",
    $A[18]="A33",
    $A[19]="A34a",
    $A[20]="A34b",
    $A[21]="A35a",
    $A[22]="A35b",
    $A[23]="A36a",
    $A[24]="A36b",
    $A[25]="A37",
	$A[26]="MAGNA-A"
   ),
"B" =>array
   (
    $B[0]="B15a",
    $B[1]="B15b",
    $B[2]="B16",
    $B[3]="B21",
    $B[4]="B22",
    $B[5]="B23",
    $B[6]="B24",
    $B[7]="B25",
    $B[8]="B26",
    $B[9]="B31",
    $B[10]="B32",
    $B[11]="B33",
    $B[12]="B34a",
    $B[13]="B34b",
    $B[14]="B35",
    $B[15]="B36",
    $B[16]="B37",
    $B[17]="MAGNA-B"	
   ),
"C" =>array
   (
    $C[0]="C11",
    $C[1]="C12",
    $C[2]="C21",
    $C[3]="C22",
    $C[4]="C23",
    $C[5]="C24",
    $C[6]="C25",
    $C[7]="C26",
    $C[8]="C27",
    $C[9]="C31",
    $C[10]="C32",
    $C[11]="C33",
    $C[12]="C34",
    $C[13]="C35",
    $C[14]="C36",
    $C[15]="C37",
    $C[16]="MAGNA-C"
   )
);

return $aulas;

}
	
}

?>