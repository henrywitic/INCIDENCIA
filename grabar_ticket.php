<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Registro de Tareas </title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/custom.css">
</head>
<?php
function generacodigo(){
	$r1=strval(rand(1,10000));
	$r2=strval(rand(1,10000));
	$r3=strval(rand(1,10000));
	$codigo="TK-".substr("00000000000000000000$r1$r2$r3",-17);
	return $codigo;
} 
?>
<?php
	if (empty($_POST['add_trabajador'])){
		echo "falso=";
		$errors[] = "desconocido .";
	} elseif (!empty($_POST['add_trabajador'])){
	require_once ("conexion.php");//Contiene funcion que conecta a la base de datos
	//require_once ("../../util.php");
	$tic_fecha 	= pg_escape_string($conbd,(strip_tags($_POST["add_fecha"],ENT_QUOTES)));
	$tic_hora	= pg_escape_string($conbd,(strip_tags($_POST["add_hora"],ENT_QUOTES)));
	$tic_min 	= pg_escape_string($conbd,(strip_tags($_POST["add_min"],ENT_QUOTES)));
	$tic_estado	= pg_escape_string($conbd,(strip_tags($_POST["add_estado"],ENT_QUOTES)));
	$tic_dispositivo= strtoupper(pg_escape_string($conbd,(strip_tags($_POST["add_dispositivo"],ENT_QUOTES))));	
	$tic_asunto	= strtoupper(pg_escape_string($conbd,(strip_tags($_POST["add_asunto"],ENT_QUOTES))));	
	$tic_trabajador	= pg_escape_string($conbd,(strip_tags($_POST["add_trabajador"],ENT_QUOTES)));	
	$tic_numero	=generacodigo();
	// REGISTER data into database
	
	$sql="INSERT INTO tb_ticket (tic_numero,tic_fecha, tic_hora, tic_asunto, est_codigo, usu_codigo, dis_codigo) "
							." VALUES  ('".$tic_numero."',"
										."'".$tic_fecha."',"
										."'".substr("00".$tic_hora,-2).":".substr("00".$tic_min,-2)."',"
										."'".$tic_asunto."',"
										.$tic_estado.","
										.$tic_trabajador.","
										.$tic_dispositivo.")";
		
		$rs = pg_query($conbd,$sql);
		if ($rs) {
			$messages[] = "El Ticket se agrego con éxito.<br> Se remitio al personal de soiporte para su atencion";
		} else {
			$errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
		}
		if (isset($errors)){		
					?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Error!</strong> 
							<?php
								foreach ($errors as $error) {
										echo $error;
									}
							?>
					</div>
					<?php
		}
	if (isset($messages)){	
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
							}
							?>
				</div>
				<?php
	}
}
?>
<a href="index.php">volver</a>