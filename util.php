<?php
 // funcion generadoras de codigos, ingreso nombre de tabla y 
 // y la longitud del codigo a generar
 function generacod($tabla, $longitud){
  // variable de conexion
  // consulta para obtener el valor correlativo del codigo
  $strSQL =  " SELECT * "
  			." FROM tb_utilidad "
			." WHERE uti_tabla='".$tabla."'";
  // resultado de consulta
  $rs = pg_query($strSQL);
  //recorrido de registros para obtener el valor
  while($rowutil=pg_fetch_array($rs)){	
     $valor = $rowutil['uti_valor'];
  }
  $codigo= str_pad($valor, $longitud, "0", STR_PAD_LEFT);
  //$codigo="00099-".$tabla;;
  return $codigo;
 }
 
 function fill_cero($cadena, $longitud){
   // generacion de la cadena con relleno de ceros a la izquierda
   $nueva_cadena= substr("00000000000000000000000".$cadena,0 ,$longitud); 
   return $nueva_cadena;
 }
 
 function actualizautilidad($tabla){
   $strSQL =    " UPDATE tb_utilidad "
    		   ." SET uti_valor = uti_valor +1 "
		   	   ." WHERE uti_tabla='".$tabla."'";
   pg_query($strSQL) or die("Error de actualizacion de utilidad ...");
 }  
 
 function redondeado ($numero, $decimales) {
  $factor = pow(10, $decimales);
  return (round($numero*$factor)/$factor); 
 }
 
 function diasEntreFechas($fechainicio, $fechafin){
    return ((strtotime($fechafin)-strtotime($fechainicio))/86400);
}
?>
