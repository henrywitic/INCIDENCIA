<?php session_start();?>
<?php
 require 'conexion.php';
 $consulta=" select tb_usuario.usu_sesion, tb_usuario.usu_tipo, tb_usuario.usu_nombres, "
	 	  ."        tb_usuario.usu_apellidos, tb_usuario.usu_codigo, tb_usuario.usu_activo, "
	 	  ."        tb_oficina.ofi_codigo, tb_oficina.ofi_nombre"
	      ." from tb_usuario, tb_oficina "
	 	  ." where tb_usuario.usu_sesion = '" .$_POST["username"]."'"
	 	  ."  and  tb_usuario.usu_password = '" . $_POST["pass"] ."'"
	 	  ."  and  (tb_usuario.usu_tipo = 'C' OR tb_usuario.usu_tipo = 'A')"
	 	  ."  and  tb_usuario.ofi_codigo=tb_oficina.ofi_codigo";
 $sql=pg_query($conbd,$consulta);
 if(pg_numrows($sql)>=1){
    while($rowd = pg_fetch_array($sql)){ /////
	 $_SESSION["usuarioticket"]			= $rowd[0];
	 $_SESSION["tipousuarioticket"]		= $rowd[1];
	 $_SESSION["nombreticket"]   		= $rowd[2];
	 $_SESSION["apellidosticket"]  		= $rowd[3];
	 $_SESSION["codigoticket"]  		= $rowd[4];
	 $_SESSION["activoticket"]  		= $rowd[5];
	 $_SESSION["oficinacodigoticket"]	= $rowd[6];
	 $_SESSION["oficinanombreticket"]	= $rowd[7];
	}
	header('Location:frame.php');
	exit();	
 }
 else{
 	header('Location:login.html');
 }
?>