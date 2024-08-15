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
<style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 36px;
}
-->
</style>
</head>
<body>
	<br>
	<table width="65%" border="0" align="center">
    <tr align="right">
      <td align="right" background="images/logo_fondo.png" bgcolor="#990000"><div align="left"><a href="login.html"></a>&nbsp;&nbsp;&nbsp;<img src="images/logo_comunidad.png" width="433" height="111"></div></td>
      <td width="8%" align="right" background="images/logo_fondo.png"><img src="images/logoinstitucional.jpeg" width="87" height="111"><a href="login.html"></a></td>
      <td width="2%" align="right" valign="bottom"><a href="login.html"></a></td>
      <td width="3%" align="right" valign="bottom"><a href="login.html"><img src="images/login.ico" alt="" width="30"></a></td>
    </tr>
</table>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Ingreso <b>Ticket </b></h2>
					</div>
                </div>
            </div>
			<div class='clearfix'></div>
			<hr>
			<form name="ver_trabajador" id="ver_trabajador" action="grabar_ticket.php" method="post">
					<?php
					include "conexion.php";	
					date_default_timezone_set("America/Lima");				
					?>					
					<div class="form-group">
							<label>Trabajador</label>
							<select class="form-control" name="add_trabajador" id="add_trabajador" required>
								<option value="" selected>-- Seleccione datos del Trabajador. --</option>
								<?php
									$sqld="SELECT * FROM tb_usuario where usu_tipo<>'A' Order by usu_apellidos ";
										 
									$resultd=pg_query($conbd,$sqld);
									while($rowd = pg_fetch_array($resultd)){
									?>
								<option value="<?php echo $rowd['usu_codigo'];?>"><?php echo $rowd['usu_apellidos'].", ".$rowd['usu_nombres'];?></option>
								<?php
									 }
									?>
   							</select>	
					</div>
					<div class="form-group">
							<label>Fecha</label>
							<input type="text" name="add_fecha"  id="add_fecha" class="form-control" value="<?php echo date('d-m-Y');?>" required >		
					</div>		
					<div class="form-group">
							<label>Hora</label>
							<select class="form-control" name='add_hora' id="add_hora" required>
								<option value="<?php echo date('h');?>" selected><?php echo date('h');?></option>
							</select>
							:
							<select class="form-control" name='add_min' id="add_min" required>
								<option value="<?php echo date('i');?>" selected><?php echo date('i');?></option>
							</select>
					</div>
					<div class="form-group">
							<label>Dispositivo</label>
							<select class="form-control" name="add_dispositivo" id="add_dispositivo" required>
								<option value="" selected>-- Seleccione datos del Dispositivo. --</option>
								<?php
									$sqld="SELECT * FROM tb_dispositivo Order by dis_nombre ";
										 
									$resultd=pg_query($conbd,$sqld);
									while($rowd = pg_fetch_array($resultd)){
									?>
								<option value="<?php echo $rowd['dis_codigo'];?>"><?php echo $rowd['dis_nombre'];?></option>
								<?php
									 }
									?>
   							</select>	
					</div>
					<div class="form-group">
							<label>Asunto</label>
							<input type="text" name="add_asunto"  id="add_asunto" class="form-control" value="" required >		
					</div>
					<div class="form-group">
							<label>Estado</label>
							<select class="form-control" name='add_estado' id="add_estado" required>
								<option value="1" selected>NUEVO</option>
   							</select>		
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Grabar tickets ">
					</div>
		  </form>			
        </div>
    </div>	
</body>
</html>
